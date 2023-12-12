<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $guarded = [];

    public static function get_transaksi_belum_bayar()
    {
        $events = Transaction::join('events', 'events.id', '=', 'transactions.id_event')
            ->where('transactions.id_user', get_user_login()->id)
            ->where('transactions.status_transaction', 0)
            ->select('events.title', 'transactions.*')
            ->get();

        return $events;
    }

    public static function get_transaksi_riwayat()
    {
        $events = Transaction::join('events', 'events.id', '=', 'transactions.id_event')
            ->where('transactions.id_user', get_user_login()->id)
            ->where('transactions.status_transaction', '!=', 0)
            ->select('events.title', 'transactions.*')
            ->get();

        return $events;
    }
}
