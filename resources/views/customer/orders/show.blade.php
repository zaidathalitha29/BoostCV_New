
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #1C2434;
            --ink-soft: #4B5468;
            --paper: #FBFAF7;
            --white: #FFFFFF;
            --line: #E4E1D8;
            --navy: #223A66;
            --navy-deep: #16264A;
            --gold: #C98A2C;
            --gold-soft: #F3E2C2;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
        }

        .main {
            max-width: 1000px;
            margin: auto;
            padding: 40px 25px;
        }

        h3, h5 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
        }

        h3 {
            font-size: 30px;
            margin: 15px 0 8px;
        }

        h5 {
            font-size: 19px;
            margin-bottom: 15px;
        }

        .subtitle {
            color: var(--ink-soft);
            font-size: 14px;
            line-height: 1.7;
        }

        .back {
            color: var(--navy);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back:hover {
            color: var(--gold);
        }

        .card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 26px;
            margin-top: 25px;
            box-shadow: 0 5px 20px rgba(22, 38, 74, .05);
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
            color: var(--ink-soft);
        }

        .order-number h5 {
            margin-top: 5px;
            margin-bottom: 0;
            word-break: break-word;
        }

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
            border-top: 1px solid var(--line);
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
            overflow-wrap: anywhere;
        }

        td:first-child {
            width: 35%;
            color: var(--ink-soft);
        }

        .payment-info {
            padding: 15px;
            border-radius: 8px;
            background: #F4F6F9;
            font-size: 13px;
            color: var(--ink-soft);
            line-height: 1.7;
        }

        .payment-success {
            background: #E5F4E9;
            color: #246B3E;
        }

        .payment-warning {
            background: #FFF3D9;
            color: #805A16;
        }

        .payment-danger {
            background: #FCE8E8;
            color: #A52B2B;
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
            cursor: pointer;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
        }

        .btn-danger {
            background: white;
            color: #B63B3B;
            border-color: #B63B3B;
        }

        .btn-danger:hover {
            background: #B63B3B;
            color: white;
        }

        .btn-success {
            background: #287B50;
            color: white;
        }

        .btn-success:hover {
            background: #1F633F;
        }

        .btn-secondary {
            background: #F0F0ED;
            color: var(--ink);
        }

        .btn-secondary:hover {
            background: #E2E2DC;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-top: 18px;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert-success {
            background: #E5F4E9;
            color: #246B3E;
        }

        .alert-danger {
            background: #FCE8E8;
            color: #A52B2B;
        }

        @media (max-width: 600px) {
            .main {
                padding: 25px 14px;
            }

            .card {
                padding: 18px;
            }

            h3 {
                font-size: 25px;
            }

            td:first-child {
                width: 40%;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<main class="main">

    <a href="{{ route('customer.orders') }}" class="back">
        &larr; Kembali ke Pesanan
    </a>

    <h3>Detail Pesanan</h3>

    <p class="subtitle">
        Informasi lengkap pesanan layanan CV kamu.
    </p>

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
                <td>
                    {{ optional(optional($order->creator)->user)->name ?? '-' }}
                </td>
            </tr>

            <tr>
                <td>Nama Pemesan</td>
                <td>{{ $order->customer_name }}</td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>
                    Rp {{ number_format($order->price, 0, ',', '.') }}
                </td>
            </tr>

            <tr>
                <td>Catatan</td>
                <td>{{ $order->customer_notes ?: '-' }}</td>
            </tr>
        </table>

        <hr class="divider">

        <h5>Informasi Pembayaran</h5>

        @if($order->payment)

            @if($order->payment->status == 'verified')

                <div class="payment-info payment-success">
                    <strong>Pembayaran berhasil diverifikasi.</strong>
                    <br>
                    Terima kasih, pembayaran pesanan kamu sudah dikonfirmasi Admin.
                </div>

            @elseif($order->payment->status == 'pending_verification')

                <div class="payment-info payment-warning">
                    <strong>Pembayaran sedang diperiksa.</strong>
                    <br>
                    Bukti pembayaran sudah dikirim. Silakan tunggu verifikasi Admin.
                </div>

            @elseif($order->payment->status == 'rejected')

                <div class="payment-info payment-danger">
                    <strong>Pembayaran ditolak.</strong>
                    <br>
                    Silakan periksa kembali pembayaran dan kirim ulang bukti pembayaran.
                    @if($order->payment->verification_note)
                        <br>
                        Catatan Admin: {{ $order->payment->verification_note }}
                    @endif
                </div>

            @else

                <div class="payment-info">
                    Status pembayaran:
                    {{ ucfirst(str_replace('_', ' ', $order->payment->status)) }}
                </div>

            @endif

        @else

            <div class="payment-info">
                Belum ada data pembayaran untuk pesanan ini.
            </div>

        @endif

    </div>


    <div class="card">

        <h5>Aksi Pesanan</h5>

        <div class="actions">

            {{-- TOMBOL PEMBAYARAN --}}
            @if(
                $order->status == 'pending_payment' &&
                (
                    !$order->payment ||
                    in_array($order->payment->status, ['unpaid', 'rejected'])
                )
            )
                <a href="{{ route('customer.payments.create', $order->id) }}"
                   class="btn btn-primary">
                    Bayar Sekarang
                </a>
            @endif


            {{-- PEMBATALAN --}}
            @if(!in_array($order->status, ['completed', 'cancelled']))
                <a href="{{ route('customer.cancellations.create', $order->id) }}"
                   class="btn btn-danger">
                    Ajukan Pembatalan
                </a>
            @endif


            {{-- REVISI --}}
            @if(in_array($order->status, ['revision', 'completed']))
                <a href="{{ route('customer.revisions.create', $order->id) }}"
                   class="btn btn-primary">
                    Ajukan Revisi
                </a>
            @endif


            {{-- DOWNLOAD HASIL --}}
            @if($order->status == 'completed' && $order->result_file)
                <a href="{{ route('customer.download', $order->id) }}"
                   class="btn btn-success">
                    Download Hasil CV
                </a>
            @endif


            {{-- KEMBALI --}}
            <a href="{{ route('customer.orders') }}"
               class="btn btn-secondary">
                Kembali ke Daftar Pesanan
            </a>

        </div>

    </div>

</main>

</body>
</html>
