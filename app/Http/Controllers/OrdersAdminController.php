<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use PDF;

class OrdersAdminController extends Controller
{
    public function orders()
    {

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

    public function update(Request $request, Transaction $order)
    {

        $order->update(['status_transaction' => 3]);

        return back()->with('success', 'Konfirmasi pembayaran berhasil!');
    }
    public function refund(Request $request, Transaction $order)
    {

        $order->update(['status_transaction' => 5]);

        return back()->with('success', 'Konfirmasi Refund berhasil!');
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
