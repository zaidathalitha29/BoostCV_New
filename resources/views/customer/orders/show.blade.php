<div class="container py-4">

    <div class="mb-4">
        <a href="{{ route('customer.orders') }}" class="text-decoration-none">
            &larr; Kembali ke Pesanan
        </a>
        <h3 class="mt-3">Detail Pesanan</h3>
        <p class="text-muted">Informasi lengkap pesanan layanan CV kamu.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <div class="d-flex justify-content-between flex-wrap">
                <div>
                    <small class="text-muted">Nomor Pesanan</small>
                    <h5>{{ $order->order_number }}</h5>
                </div>

                <div>
                    <span class="badge badge-primary">
                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                    </span>
                </div>
            </div>

            <hr>

            <h5>Informasi Layanan</h5>

            <table class="table table-borderless">
                <tr>
                    <td width="35%">Nama Layanan</td>
                    <td>: {{ $order->service_title }}</td>
                </tr>
                <tr>
                    <td>Creator</td>
                    <td>:
                        {{ optional(optional($order->creator)->user)->name ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td>: {{ $order->customer_name }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>: Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>: {{ $order->customer_notes ?: '-' }}</td>
                </tr>
            </table>

            <hr>

            <h5>Informasi Pembayaran</h5>

            @if($order->payment)
                <p class="text-success">
                    Data pembayaran sudah tercatat.
                </p>
            @else
                <p class="text-muted">
                    Belum ada data pembayaran.
                </p>
            @endif

        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-3">Aksi Pesanan</h5>

            @if(!in_array($order->status, ['completed', 'cancelled']))
                <a href="{{ route('customer.cancellations.create', $order->id) }}"
                   class="btn btn-outline-danger mb-2">
                    Ajukan Pembatalan
                </a>
            @endif

            @if(in_array($order->status, ['revision', 'completed']))
                <a href="{{ route('customer.revisions.create', $order->id) }}"
                   class="btn btn-outline-primary mb-2">
                    Ajukan Revisi
                </a>
            @endif

            @if($order->status == 'completed')
                <a href="{{ route('customer.download', $order->id) }}"
                   class="btn btn-success mb-2">
                    Download Hasil CV
                </a>
            @endif

            <a href="{{ route('customer.orders') }}"
               class="btn btn-secondary mb-2">
                Kembali ke Daftar Pesanan
            </a>

        </div>
    </div>

</div>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - BoostCV</title>

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
            background: var(--paper);
            color: var(--text);
            font-family: 'Inter', sans-serif;
        }

        .main {
            max-width: 1000px;
            margin: auto;
            padding: 40px 25px;
        }

        h3, h5 {
            font-family: 'Fraunces', serif;
            color: var(--navy-dark);
        }

        h3 { font-size: 30px; margin: 15px 0 8px; }
        h5 { font-size: 19px; margin-bottom: 15px; }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .back {
            color: var(--navy);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back:hover { color: var(--gold); }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 26px;
            margin-top: 25px;
            box-shadow: 0 5px 20px rgba(22,38,74,.05);
        }

        .header-order {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .order-number {
            font-size: 12px;
            color: var(--muted);
        }

        .order-number h5 { margin-top: 5px; }

        .badge {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 20px;
            background: #E2EAF8;
            color: var(--navy);
            font-size: 11px;
            font-weight: 700;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 22px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 12px 8px;
            font-size: 13px;
            vertical-align: top;
            line-height: 1.6;
        }

        td:first-child {
            width: 35%;
            color: var(--muted);
        }

        .payment-info {
            padding: 15px;
            border-radius: 8px;
            background: #F4F6F9;
            font-size: 13px;
            color: var(--muted);
        }

        .payment-success {
            background: #E5F4E9;
            color: #246B3E;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid transparent;
            transition: .2s;
        }

        .btn-primary { background: var(--navy); color: white; }
        .btn-primary:hover { background: var(--navy-dark); }

        .btn-danger { background: white; color: #B63B3B; border-color: #B63B3B; }
        .btn-danger:hover { background: #B63B3B; color: white; }

        .btn-success { background: #287B50; color: white; }
        .btn-success:hover { background: #1F633F; }

        .btn-secondary { background: #F0F0ED; color: var(--text); }
        .btn-secondary:hover { background: #E2E2DC; }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-top: 18px;
            font-size: 13px;
        }

        .alert-success { background: #E5F4E9; color: #246B3E; }
        .alert-danger { background: #FCE8E8; color: #A52B2B; }

        @media(max-width: 600px) {
            .main { padding: 25px 14px; }
            .card { padding: 18px; }
            h3 { font-size: 25px; }
            td:first-child { width: 40%; }
            .actions { flex-direction: column; }
            .actions .btn { text-align: center; }
        }
    </style>
</head>
<body>

<main class="main">

    <a href="{{ route('customer.orders') }}" class="back">
        &larr; Kembali ke Pesanan
    </a>

    <h3>Detail Pesanan</h3>
    <p class="subtitle">Informasi lengkap pesanan layanan CV kamu.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">

        <div class="header-order">
            <div class="order-number">
                Nomor Pesanan
                <h5>{{ $order->order_number }}</h5>
            </div>

            <span class="badge">
                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
            </span>
        </div>

        <hr class="divider">

        <h5>Informasi Layanan</h5>

        <table>
            <tr>
                <td>Nama Layanan</td>
                <td>{{ $order->service_title }}</td>
            </tr>
            <tr>
                <td>Creator</td>
                <td>{{ optional(optional($order->creator)->user)->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Pemesan</td>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>Rp {{ number_format($order->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td>{{ $order->customer_notes ?: '-' }}</td>
            </tr>
        </table>

        <hr class="divider">

        <h5>Informasi Pembayaran</h5>

        @if($order->payment)
            <div class="payment-info payment-success">
                Data pembayaran sudah tercatat.
            </div>
        @else
            <div class="payment-info">
                Belum ada data pembayaran.
            </div>
        @endif

    </div>

    <div class="card">
        <h5>Aksi Pesanan</h5>

        <div class="actions">

            @if(!in_array($order->status, ['completed', 'cancelled']))
                <a href="{{ route('customer.cancellations.create', $order->id) }}" class="btn btn-danger">
                    Ajukan Pembatalan
                </a>
            @endif

            @if(in_array($order->status, ['revision', 'completed']))
                <a href="{{ route('customer.revisions.create', $order->id) }}" class="btn btn-primary">
                    Ajukan Revisi
                </a>
            @endif

           @if($order->status == 'completed' && $order->result_file)
                <a href="{{ route('customer.download', $order->id) }}" class="btn">
                    Download Hasil CV
                </a>
            @endif

            <a href="{{ route('customer.orders') }}" class="btn btn-secondary">
                Kembali ke Daftar Pesanan
            </a>

        </div>
    </div>

</main>

</body>
</html>
