
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Saya - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #1C2434;
            --ink-soft: #687185;
            --paper: #FBFAF7;
            --white: #FFFFFF;
            --line: #E9E5DC;
            --navy: #223A66;
            --navy-deep: #16264A;
            --gold: #C98A2C;
            --gold-soft: #F5E8CF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
        }

        a {
            text-decoration: none;
        }

        /* HEADER */

        .topbar {
            background: var(--navy-deep);
            padding: 19px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-family: 'Fraunces', serif;
            font-size: 27px;
            font-weight: 700;
        }

        .logo span {
            color: var(--gold);
        }

        .back-link {
            color: #E1E7F1;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .back-link:hover {
            color: var(--gold);
        }

        /* MAIN */

        .main {
            max-width: 1180px;
            margin: auto;
            padding: 48px 25px 65px;
            min-height: calc(100vh - 145px);
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .eyebrow {
            color: var(--gold);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .page-heading h1 {
            font-family: 'Fraunces', serif;
            font-size: 35px;
            color: var(--navy-deep);
            margin-bottom: 9px;
        }

        .subtitle {
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.8;
        }

        /* INTRO CARD */

        .intro-card {
            background: var(--navy-deep);
            border-radius: 15px;
            padding: 27px 30px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            overflow: hidden;
            position: relative;
        }

        .intro-card::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border: 1px solid rgba(255,255,255,.10);
            border-radius: 50%;
            right: 65px;
            top: -100px;
        }

        .intro-text {
            position: relative;
            z-index: 1;
        }

        .intro-text h2 {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            color: white;
            margin-bottom: 8px;
        }

        .intro-text p {
            color: #D2DAE8;
            font-size: 12px;
            line-height: 1.8;
            max-width: 560px;
        }

        .intro-icon {
            width: 66px;
            height: 66px;
            flex-shrink: 0;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.20);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
            position: relative;
            z-index: 1;
        }

        /* ALERT */

        .alert {
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #E5F4E9;
            color: #246B3E;
        }

        .alert-danger {
            background: #FCE8E8;
            color: #A52B2B;
        }

        /* ORDER CARD */

        .order-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 6px 24px rgba(22,38,74,.04);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .section-heading h3 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 21px;
        }

        .order-count {
            background: var(--gold-soft);
            color: #805817;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* TABLE */

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        th {
            background: #F6F4EF;
            color: var(--navy);
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            padding: 15px 13px;
            white-space: nowrap;
        }

        th:first-child {
            border-radius: 8px 0 0 8px;
        }

        th:last-child {
            border-radius: 0 8px 8px 0;
        }

        td {
            padding: 17px 13px;
            border-bottom: 1px solid #F0EEE8;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr:hover td {
            background: #FCFAF5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-number {
            color: var(--navy);
            font-weight: 700;
        }

        .service-name {
            font-weight: 600;
            color: var(--ink);
        }

        .price {
            color: var(--gold);
            font-weight: 700;
            white-space: nowrap;
        }

        /* STATUS */

        .badge {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-warning {
            background: #FFF0CF;
            color: #946000;
        }

        .badge-danger {
            background: #FCE4E4;
            color: #A52B2B;
        }

        .badge-primary {
            background: #E2EAF8;
            color: var(--navy);
        }

        .badge-info {
            background: #DDF3F5;
            color: #176C79;
        }

        .badge-success {
            background: #DFF2E5;
            color: #247443;
        }

        .badge-secondary {
            background: #EAECEF;
            color: #555E6B;
        }

        /* BUTTON */

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
            white-space: nowrap;
            border: none;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
            color: white;
            transform: translateY(-1px);
        }

        .btn-gold {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 8px;
            background: var(--gold);
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-gold:hover {
            background: #A96E1B;
            transform: translateY(-2px);
        }

        /* EMPTY STATE */

        .empty {
            text-align: center;
            padding: 48px 20px 42px;
        }

        .empty-illustration {
            width: 105px;
            height: 105px;
            margin: 0 auto 23px;
            border-radius: 50%;
            background: #F8EEDB;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 43px;
            position: relative;
        }

        .empty-illustration::after {
            content: "";
            position: absolute;
            width: 118px;
            height: 118px;
            border: 1px dashed #DCC69F;
            border-radius: 50%;
        }

        .empty h2 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 26px;
            margin-bottom: 11px;
        }

        .empty > p {
            max-width: 490px;
            margin: 0 auto 24px;
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.8;
        }

        /* STEPS */

        .steps {
            max-width: 650px;
            margin: 35px auto 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 13px;
            text-align: left;
        }

        .step {
            padding: 16px 13px;
            background: #FBFAF7;
            border: 1px solid var(--line);
            border-radius: 10px;
        }

        .step-number {
            width: 27px;
            height: 27px;
            border-radius: 50%;
            background: var(--gold-soft);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .step h4 {
            font-family: 'Fraunces', serif;
            color: var(--navy);
            font-size: 14px;
            margin-bottom: 6px;
        }

        .step p {
            color: var(--ink-soft);
            font-size: 10px;
            line-height: 1.7;
        }

        /* PAGINATION */

        .pagination {
            margin-top: 25px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        /* FOOTER */

        .footer {
            text-align: center;
            padding: 22px 15px;
            color: var(--ink-soft);
            font-size: 11px;
            border-top: 1px solid var(--line);
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {
            .topbar {
                padding: 17px 20px;
            }

            .main {
                padding: 32px 17px 45px;
            }

            .page-heading h1 {
                font-size: 29px;
            }

            .intro-card {
                padding: 23px;
            }

            .steps {
                grid-template-columns: 1fr;
                max-width: 400px;
            }

            .order-card {
                padding: 18px;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 23px;
            }

            .back-link {
                font-size: 10px;
            }

            .main {
                padding: 27px 13px 40px;
            }

            .page-heading h1 {
                font-size: 26px;
            }

            .intro-card {
                padding: 19px;
            }

            .intro-text h2 {
                font-size: 19px;
            }

            .intro-icon {
                width: 48px;
                height: 48px;
                font-size: 22px;
            }

            .section-heading h3 {
                font-size: 18px;
            }

            .empty {
                padding: 40px 8px;
            }

            .empty h2 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="topbar">
        <a href="{{ route('customer.dashboard') }}" class="logo">
            Boost<span>CV</span>
        </a>

        <a href="{{ route('customer.dashboard') }}" class="back-link">
            ← Kembali ke Dashboard
        </a>
    </header>

    <main class="main">

        <!-- PAGE HEADING -->
        <section class="page-heading">
            <div class="eyebrow">CUSTOMER AREA</div>
            <h1>Pesanan Saya</h1>
            <p class="subtitle">
                Kelola dan pantau perjalanan pesanan layanan CV kamu bersama BoostCV.
            </p>
        </section>

        <!-- INTRO -->
        <section class="intro-card">
            <div class="intro-text">
                <h2>Perjalanan Karier Dimulai dari Sini!</h2>
                <p>
                    Pantau proses pembuatan CV, lihat perkembangan pesanan,
                    dan temukan semua informasi pesananmu dalam satu tempat.
                </p>
            </div>

            <div class="intro-icon">📋</div>
        </section>

        <!-- ALERT -->
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

        <!-- ORDER LIST -->
        <section class="order-card">

            <div class="section-heading">
                <h3>Daftar Pesanan</h3>

                <span class="order-count">
                    {{ $orders->total() }} Pesanan
                </span>
            </div>

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
                                    <td>
                                        {{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}
                                    </td>

                                    <td class="order-number">
                                        {{ $order->order_number }}
                                    </td>

                                    <td class="service-name">
                                        {{ $order->service_title ?? ($order->service->title ?? '-') }}
                                    </td>

                                    <td>
                                        {{ optional(optional($order->creator)->user)->name ?? '-' }}
                                    </td>

                                    <td class="price">
                                        Rp{{ number_format($order->price, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <span class="badge badge-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                            {{ $statusLabels[$order->status] ?? ucfirst(str_replace('_', ' ', $order->status)) }}
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('customer.orders.show', $order->id) }}"
                                           class="btn btn-primary">
                                            Detail →
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

                <!-- EMPTY STATE -->
                <div class="empty">

                    <div class="empty-illustration">
                        📋
                    </div>

                    <h2>Belum Ada Pesanan</h2>

                    <p>
                        Sepertinya kamu belum memiliki pesanan saat ini.
                        Jangan khawatir! Temukan Creator profesional dan mulai
                        buat CV yang sesuai dengan tujuan kariermu.
                    </p>

                    <a href="{{ route('customer.services') }}" class="btn-gold">
                        Jelajahi Layanan CV &nbsp; →
                    </a>

                    <div class="steps">

                        <div class="step">
                            <div class="step-number">1</div>
                            <h4>Pilih Layanan</h4>
                            <p>
                                Temukan layanan CV yang sesuai dengan kebutuhanmu.
                            </p>
                        </div>

                        <div class="step">
                            <div class="step-number">2</div>
                            <h4>Buat Pesanan</h4>
                            <p>
                                Pilih Creator dan lakukan pemesanan layanan.
                            </p>
                        </div>

                        <div class="step">
                            <div class="step-number">3</div>
                            <h4>Pantau Pesanan</h4>
                            <p>
                                Lihat perkembangan pesanan sampai CV selesai dibuat.
                            </p>
                        </div>

                    </div>

                </div>

            @endif

        </section>

    </main>

    <footer class="footer">
        © {{ date('Y') }} BoostCV. All rights reserved.
    </footer>

</body>
</html>
