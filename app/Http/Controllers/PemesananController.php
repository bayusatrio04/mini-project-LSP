<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;


class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
    }

    public function index($id)
    {
        $event = Event::find($id);
        $categories = Category::all();

        if (!$event) {
            return redirect('/')->with('error', 'Event tidak ditemukan!');
        }

        if ($event->total_tickets < 1) {
            return redirect('/')->with('error', 'Stok tiket event sudah habis!');
        } else {
            $data = [
                'user_login' => get_user_login(),
                'event' => $event
            ];

            return view('customer.beli_tiket', $data, compact('categories'));
        }
    }

    public function beli_tiket(Request $request, $id_event)
    {



        $validator = Validator::make($request->all(), [
            'jml_beli' => ['required', 'numeric', 'min:1', 'max:2'],

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = get_user_login();
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $event = Event::find($id_event);

        // $pembelian = Transaction::where('id_event', $id_event)->where('id_user', get_user_login()->id)->whereIn('status_transaction', [0, 1, 3])->first();
        $pembelian = Transaction::where('id_event', $id_event)
            ->where('id_user', $user->id)
            ->whereIn('status_transaction', [0, 1, 3])
            ->first();

        // dd($pembelian->qty);

        if ($pembelian) {
            //cek apakah sudah beli sebanyak 2x?

            if ($pembelian->qty + $request->jml_beli > 2) {
                return back()->with('error', 'Kamu hanya dibolehkan membeli tiket sebanyak 2x!');
            } else {

                $data_transaction = [
                    'qty' => $pembelian->qty + $request->jml_beli,
                    'total_transaction' => $pembelian->total_transaction + ($event->ticket_price * $request->jml_beli)
                ];


                $pembelian->update($data_transaction);

                $this->upd_stock_event($id_event, $request->jml_beli);

                return back()->with('success', 'Tiket berhasil dibeli, segera lakukan pembayaran!');
            }
        } else {

            if ($request->jml_beli > 2) {
                return back()->with('error', 'Kamu hanya dibolehkan membeli tiket sebanyak 2x!');
            } else {

                $data_transaction = [
                    'id_event' => $id_event,
                    'id_user' => get_user_login()->id,
                    'qty' => $request->jml_beli,
                    'total_transaction' => $event->ticket_price * $request->jml_beli,
                ];


                Transaction::create($data_transaction);
                $this->upd_stock_event($id_event, $request->jml_beli);

                return back()->with('success', 'Tiket berhasil dibeli, segera lakukan pembayaran!');
            }
        }
    }

    private function upd_stock_event($id_event, $jml_beli)
    {

        $event = Event::find($id_event);

        $data_event = [
            'total_tickets' => $event->total_tickets - $jml_beli,
        ];

        $event->update($data_event);
    }

    public function pembayaran()
    {

        $transaksiBelumBayar = Transaction::get_transaksi_belum_bayar();

        // Update status pembayaran jika sudah melebihi satu hari
        foreach ($transaksiBelumBayar as $transaksi) {
            $tanggalPembayaran = Carbon::parse($transaksi->created_at);
            $sekarang = Carbon::now();

            // Periksa apakah sudah melebihi satu hari
            if ($tanggalPembayaran->diffInDays($sekarang) >= 1) {
                // Update status pembayaran menjadi dibatalkan atau sesuai kebutuhan
                $transaksi->update(['status_transaction' => 2]);

                $event = Event::find($transaksi->id_event);
                $event->update(['total_tickets' => $event->total_tickets + $transaksi->qty]);
            }
        }


        $user = get_user_login();
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $data = [
            'user_login' => get_user_login(),
            'transaksi' => $transaksiBelumBayar
        ];


        return view('customer.pembayaran_tiket', $data);
    }

    public function batal($id_transaksi)
    {

        $transaksi = Transaction::find($id_transaksi);

        $event = Event::find($transaksi->id_event);

        $data_event = [
            'total_tickets' => $event->total_tickets + $transaksi->qty
        ];

        $event->update($data_event);

        $data_transaksi = [
            'status_transaction' => 2
        ];

        $transaksi->update($data_transaksi);


        return back()->with('success', 'Transaksi berhasil dibatalkan');
    }

    public function bayar_tiket(Request $request)
    {


        $transaksi = Transaction::find($request->id_transaksi);

        $attributes = [
            'status_transaction' => 1
        ];


        // Update the user's picture if a new one is uploaded
        if ($request->hasFile('bukti_bayar')) {

            if ($transaksi->bukti_bayar) {
                Storage::disk('public')->delete($transaksi->bukti_bayar);
            }


            $image = $request->file('bukti_bayar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('bukti_bayar', $imageName, 'public');
            $attributes['bukti_bayar'] = $imagePath;
        }


        // Update the tranasction record
        $transaksi->update($attributes);

        return back()->with('success', 'Bukti bayar berhasil diunggah!');
    }

    public function riwayat_transaksi()
    {
        $user = get_user_login();
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $data = [
            'user_login' => get_user_login(),
            'transaksi' => Transaction::get_transaksi_riwayat()
        ];


        return view('customer.riwayat_transaksi', $data);
    }

    public function refund($id)
    {

        $transaction = Transaction::find($id);
        $event = Event::find($transaction->id_event);

        // Check if today is one day before the event start date
        $today = Carbon::now();
        $eventStartDate = Carbon::parse($event->start_date);

        // dd($today->diffInMinutes($eventStartDate));

        if ($today->diffInMinutes($eventStartDate) < 1440) {
            // If today is H-1 or less, prevent refund
            return back()->with('error', 'Tidak dapat melakukan refund satu hari sebelum acara dimulai.');
        } else {

            $data = [
                'status_transaction' => 4
            ];

            $transaction->update($data);

            return back()->with('success', 'Sedang proses pengajuan refund, mohon ditunggu!');
        }
    }
}
