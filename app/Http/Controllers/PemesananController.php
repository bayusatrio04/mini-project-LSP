<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        //cek apakah stok masih ada? kalau sudah habis tidak bisa akses

        if ($event->total_tickets < 1) {

            return redirect('/')->with('error', 'Stok tiket event sudah habis!');
        } else {

            $data = [
                'user_login' => get_user_login(),
                'event' => $event
            ];


            return view('customer.beli_tiket', $data);
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

        $event = Event::find($id_event);

        $data_event = [
            'total_tickets' => $event->total_tickets - $request->jml_beli,
        ];
        $event->update($data_event);




        $pembelian = Transaction::where('id_event', $id_event)->where('id_user', get_user_login()->id)->first();

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


                return back()->with('success', 'Tiket berhasil dibeli, segera lakukan pembayaran!');
            }
        }

        // if ($pembelian->qty >= 2) {
        //     return back()->with('error', 'Kamu hanya boleh membeli tiket sebnayak 2 kali!');
        // } else {
        // }
        // dd($id_event);
    }
}
