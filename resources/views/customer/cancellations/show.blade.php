<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembatalan - BoostCV</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #FBFAF7;
            color: #1C2434;
            font-family: 'Inter', sans-serif;
        }

        .main { max-width: 850px; margin: auto; padding: 40px 25px; }

        h3, h5 { font-family: 'Fraunces', serif; color: #16264A; }
        h3 { font-size: 30px; margin: 15px 0 8px; }
        h5 { font-size: 19px; margin-bottom: 15px; }

        .subtitle { color: #687184; font-size: 14px; line-height: 1.7; }

        .back {
            color: #223A66;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .card {
            background: white;
            border: 1px solid #E4E1D8;
            border-radius: 14px;
            padding: 26px;
            margin-top: 25px;
            box-shadow: 0 5px 20px rgba(22,38,74,.05);
        }

        .divider { border: none; border-top: 1px solid #E4E1D8; margin: 20px 0; }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .badge {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-pending { background: #FFF0CF; color: #946000; }
        .badge-approved { background: #DFF2E5; color: #247443; }
        .badge-rejected { background: #FCE4E4; color: #A52B2B; }
        .badge-default { background: #EAECEF; color: #555E6B; }

        .number { color: #687184; font-size: 12px; }
        .number strong { display: block; color: #16264A; font-size: 17px; margin-top: 6px; }

        .info {
            background: #F4F2EC;
            padding: 16px;
            border-radius: 9px;
            font-size: 13px;
            line-height: 1.8;
            white-space: pre-line;
        }

        table { width: 100%; border-collapse: collapse; }
        td { padding: 12px 8px; font-size: 13px; vertical-align: top; line-height: 1.6; }
        td:first-child { width: 35%; color: #687184; }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            background: #223A66;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
        }

        .btn:hover { background: #16264A; color: white; }

        @media(max-width: 600px) {
            .main { padding: 25px 14px; }
            .card { padding: 18px; }
            h3 { font-size: 25px; }
            td:first-child { width: 40%; }
        }
    </style>
</head>
<body>

<main class="main">

    <a href="{{ route('customer.cancellations') }}" class="back">
        &larr; Kembali ke Pengajuan Pembatalan
    </a>

    <h3>Detail Pengajuan Pembatalan</h3>
    <p class="subtitle">
        Informasi dan perkembangan pengajuan pembatalan pesanan kamu.
    </p>

    <div class="card">

        <div class="header">
            <div class="number">
                Nomor Pesanan
                <strong>{{ optional($cancellation->order)->order_number ?? '-' }}</strong>
            </div>

            @php
                $statusLabels = [
                    'pending' => 'Menunggu Persetujuan',
                    'approved' => 'Disetujui',
                    'rejected' => 'Ditolak'
                ];

                $statusColors = [
                    'pending' => 'pending',
                    'approved' => 'approved',
                    'rejected' => 'rejected'
                ];
            @endphp

            <span class="badge badge-{{ $statusColors[$cancellation->status] ?? 'default' }}">
                {{ $statusLabels[$cancellation->status] ?? ucfirst($cancellation->status) }}
            </span>
        </div>

        <hr class="divider">

        <h5>Informasi Pesanan</h5>

        <table>
            <tr>
                <td>Layanan</td>
                <td>{{ optional($cancellation->order)->service_title ?? '-' }}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    @if($cancellation->order)
                        Rp {{ number_format($cancellation->order->price, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <td>Tanggal Pengajuan</td>
                <td>{{ $cancellation->created_at->format('d F Y, H:i') }}</td>
            </tr>
        </table>

        <hr class="divider">

        <h5>Alasan Pembatalan</h5>

        <div class="info">{{ $cancellation->reason }}</div>

        <hr class="divider">

        <a href="{{ route('customer.cancellations') }}" class="btn">
            Kembali ke Daftar Pengajuan
        </a>

    </div>

</main>
</body>
</html>
