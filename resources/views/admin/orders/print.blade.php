<!-- resources/views/orders/receipt.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Orders</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #f26f29;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f26f29;
            color: #fff;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bukti Orders</h1>

        <table>
            <tr>
                <th>ID Transaction</th>
                <td>#{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Nama Pembeli</th>
                <td>{{ $order->user->name }}</td>
            </tr>
            <tr>
                <th>Nama Event</th>
                <td>{{ $order->event->title }}</td>
            </tr>
            <tr>
                <th>Jenis Event</th>
                <td>{{ $order->event->category_events }}</td>
            </tr>
            <tr>
                <th>Category Tiket</th>
                <td>{{ $order->event->subCategory_events }}</td>
            </tr>
            <tr>
                <th>Tanggal Mulai Event</th>
                <td>{{ format_date($order->event->start_date) }}</td>
            </tr>
            <tr>
                <th>Tanggal Berakhir Event</th>
                <td>{{ format_date($order->event->end_date) }}</td>
            </tr>
            <tr>
                <th>Jam start Event</th>
                <td>{{ format_time($order->event->start_date) }} - {{ format_time($order->event->end_date) }} WIB</td>
            </tr>
            <tr>
                <th>Jumlah Tiket</th>
                <td>{{ $order->qty }}</td>
            </tr>
            <tr>
                <th>Total Pembayaran</th>
                <td>{{ rupiah($order->total_transaction) }}</td>
            </tr>

        </table>



        <div class="footer">
            Terima kasih atas pembelian Anda. Hubungi kami jika Anda memiliki pertanyaan.
        </div>
    </div>
</body>
</html>
