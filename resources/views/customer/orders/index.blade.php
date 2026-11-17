
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #223A66;
            --navy-dark: #16264A;
            --gold: #C98A2C;
            --paper: #FBFAF7;
            --white: #FFFFFF;
            --text: #1C2434;
            --muted: #687184;
            --border: #E4E1D8;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--text);
        }

        .main {
            max-width: 1150px;
            margin: auto;
            padding: 45px 25px;
        }

        .page-title { margin-bottom: 28px; }

        h1, h3, h5 {
            font-family: 'Fraunces', serif;
            color: var(--navy-dark);
        }

        h3 { font-size: 30px; margin-bottom: 8px; }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(22,38,74,.05);
        }

        .table-responsive { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #F4F2EC;
            color: var(--navy);
            text-align: left;
            font-size: 12px;
            padding: 15px 12px;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid #EEECE6;
            font-size: 13px;
            vertical-align: middle;
        }

        tr:hover td { background: #FBF8F0; }

        .badge {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-warning { background: #FFF0CF; color: #946000; }
        .badge-danger { background: #FCE4E4; color: #A52B2B; }
        .badge-primary { background: #E2EAF8; color: var(--navy); }
        .badge-info { background: #DDF3F5; color: #176C79; }
        .badge-success { background: #DFF2E5; color: #247443; }
        .badge-secondary { background: #EAECEF; color: #555E6B; }

        .btn {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-dark);
            color: white;
        }

        .empty {
            text-align: center;
            padding: 55px 15px;
        }

        .empty h5 { font-size: 22px; margin-bottom: 10px; }
        .empty p { color: var(--muted); margin-bottom: 20px; font-size: 13px; }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success { background: #E5F4E9; color: #246B3E; }
        .alert-danger { background: #FCE8E8; color: #A52B2B; }

        .pagination { margin-top: 20px; }

        @media(max-width: 600px) {
            .main { padding: 25px 14px; }
            h3 { font-size: 25px; }
            .card { padding: 15px; }
        }
    </style>
</head>
<body>

<main class="main">

    <div class="page-title">
        <h3>Pesanan Saya</h3>
        <p class="subtitle">Pantau semua pesanan layanan CV yang kamu buat.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">

        @if($orders->count() > 0)

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Pesanan</th>
                            <th>Layanan</th>
                            <th>Creator</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                            @php
                                $statusLabels = [
                                    'pending_payment' => 'Menunggu Pembayaran',
                                    'payment_rejected' => 'Pembayaran Ditolak',
                                    'in_progress' => 'Sedang Dikerjakan',
                                    'revision' => 'Dalam Revisi',
                                    'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan'
                                ];

                                $statusColors = [
                                    'pending_payment' => 'warning',
                                    'payment_rejected' => 'danger',
                                    'in_progress' => 'primary',
                                    'revision' => 'info',
                                    'completed' => 'success',
                                    'cancelled' => 'secondary'
                                ];
                            @endphp

                            <tr>
                                <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->service_title }}</td>
                                <td>{{ optional(optional($order->creator)->user)->name ?? '-' }}</td>
                                <td>Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge badge-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                        {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('customer.orders.show', $order->id) }}" class="btn btn-primary">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $orders->links() }}
            </div>

        @else

            <div class="empty">
                <h5>Belum Ada Pesanan</h5>
                <p>Kamu belum melakukan pemesanan layanan CV.</p>

                <a href="{{ route('customer.services') }}" class="btn btn-primary">
                    Cari Layanan CV
                </a>
            </div>

        @endif

    </div>
</main>

</body>
</html>
