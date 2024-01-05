<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use PDF;

class OrdersAdminController extends Controller
{
    public function orders()
    {

        //ada perubahan

        $data = [

            'transaksi' => Transaction::all()
        ];

        // dd($data['transaksi']);
        return view('admin.orders', $data);
    }
    public function show($id)
    {

        // Di dalam controller
        $transactions = Transaction::with('event')->findOrFail($id);


        return view('admin.orders.show', compact('transactions'));
    }

    public function update(Request $request, $id)
    {

        try {
            $transaction = Transaction::findOrFail($id);

            //Kalo == 1 Ubah status transaksi menjadi "Dibayar"
            if ($transaction->status_transaction == 1) {
                $transaction->update(['status_transaction' => 3]);
            }
            // Kalo == 4 Ubah status transaksi menjadi "Refund"
            if ($transaction->status_transaction == 4) {
                $transaction->update(['status_transaction' => 5]);
            }

            return back()->with('success', 'Update berhasil!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengupdate transaksi. Error: ' . $e->getMessage());
        }
    }



    public function destroy($id)
    {
        $order = Transaction::findOrFail($id);
        $order->delete();
        return back()->with('success', 'Berhasil Hapus Orderan Ticket');
    }

    public function print($id)
    {
        $order = Transaction::findOrFail($id);
        return view('admin.orders.print', compact('order'));
    }
    public function download($id)
    {
        $order = Transaction::findOrFail($id);
        $pdf = PDF::loadView('admin.orders.print', compact('order'));

        return $pdf->download('bukti_orders.pdf');
    }
}
