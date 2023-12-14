<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Transaction;

class AdminController extends Controller
{
    public function dashboards()
    {
        $userCount = User::where('isadmin', 0)->count();
        $transactionCount = Transaction::count();
        $totalTransactionAmount = Transaction::sum('total_transaction');

        $unpaidCount = Transaction::where('status_transaction', '0')->count();
        $paidCount = Transaction::where('status_transaction', '1')->count();
        $canceledCount = Transaction::where('status_transaction', '2')->count();
        $paymentReceivedCount = Transaction::where('status_transaction', '3')->count();
        $refundProcessingCount = Transaction::where('status_transaction', '4')->count();
        $refundSuccessCount = Transaction::where('status_transaction', '5')->count();

        return view("admin.dashboard", [
            'userCount' => $userCount,
            'transactionCount' => $transactionCount,
            'unpaidCount' => $unpaidCount,
            'paidCount' => $paidCount,
            'canceledCount' => $canceledCount,
            'paymentReceivedCount' => $paymentReceivedCount,
            'refundProcessingCount' => $refundProcessingCount,
            'refundSuccessCount' => $refundSuccessCount,

            'totalTransactionAmount' => $totalTransactionAmount,
        ]);
    }
    public function orders(Request $request)
    {
        $status = $request->input('status', null);

        if ($status !== null) {
            $transaction = Transaction::where('status_transaction', $status)->get();
            $isEmpty = $transaction->isEmpty();
        } else {
            $transaction = Transaction::all();
            $isEmpty = $transaction->isEmpty();
        }

        $groupedTransactions = $transaction->groupBy('status_transaction');
        $transactionCount = Transaction::count();
        return view("admin.orders" ,   compact('transaction', 'isEmpty') ,[
            'transactionCount'=> $transactionCount,
        ]);
    }

    public function products()
    {
        return view("admin.products");
    }


    public function customers()
    {
        $users = User::paginate(3);
        $userCount = User::where('isadmin', 0)->count();

        return view("admin.customers", compact('users', 'userCount'));
    }
}
