<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Customer - BoostCV</title>

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

        /* SIDEBAR */

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--navy-deep);
            color: white;
            padding: 28px 20px;
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-size: 29px;
            font-weight: 700;
            color: white;
            padding: 5px 10px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.18);
            margin-bottom: 28px;
        }

        .logo span {
            color: var(--gold);
        }

        .menu-title {
            color: #AAB7CE;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            margin: 0 0 12px 10px;
        }

        .menu {
            margin-bottom: 27px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #D8DFEC;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--navy);
            color: white;
        }

        .menu a.active {
            border-left: 3px solid var(--gold);
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.18);
            padding-top: 18px;
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid #D98B75;
            color: #F0B5A5;
            padding: 12px;
            border-radius: 25px;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #8B3C36;
            color: white;
        }

        /* MAIN CONTENT */

        .main {
            margin-left: 260px;
            padding: 25px 30px 45px;
            min-height: 100vh;
        }

        /* HEADER */

        .topbar {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 18px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h2 {
            font-family: 'Fraunces', serif;
            font-size: 21px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .topbar p {
            color: var(--ink-soft);
            font-size: 12px;
        }

        .profile {
            width: 42px;
            height: 42px;
            border: 1px solid var(--gold);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--navy);
            font-family: 'Fraunces', serif;
            font-weight: 600;
            background: var(--paper);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .notification-btn {
            position: relative;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--line);
            border-radius: 50%;
            background: var(--paper);
            color: var(--navy);
            font-size: 18px;
        }

        .notification-count {
            position: absolute;
            top: -5px;
            right: -5px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 20px;
            background: #C94B3C;
            color: white;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-name {
            font-size: 12px;
            font-weight: 600;
            color: var(--ink);
        }

        .profile-label {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: var(--ink-soft);
            font-weight: 400;
        }

        /* WELCOME */

        .welcome {
            background: var(--navy-deep);
            border-radius: 12px;
            padding: 30px;
            color: white;
            margin-bottom: 23px;
        }

        .welcome h1 {
            font-family: 'Fraunces', serif;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
            color: white;
        }

        .welcome p {
            color: #D0D9E9;
            font-size: 13px;
            line-height: 1.8;
            max-width: 550px;
            margin-bottom: 20px;
        }

        .btn-gold {
            display: inline-block;
            background: var(--gold);
            color: white;
            padding: 11px 20px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-gold:hover {
            background: #A96E1B;
            color: white;
        }

        /* STATISTICS */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 23px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 11px;
            padding: 22px;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-card p {
            color: var(--ink-soft);
            font-size: 13px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 9px;
            background: var(--gold-soft);
            color: var(--navy);
            font-size: 17px;
        }

        .stat-card h2 {
            font-family: 'Fraunces', serif;
            color: var(--navy);
            font-size: 30px;
            font-weight: 600;
        }

        .stat-card small {
            display: block;
            color: var(--ink-soft);
            font-size: 11px;
            margin-top: 6px;
        }

        /* CONTENT SECTION */

        .section {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 11px;
            padding: 23px;
            margin-bottom: 23px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .section-header h3 {
            font-family: 'Fraunces', serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--ink);
        }

        .section-header a {
            color: var(--navy);
            font-size: 12px;
            font-weight: 600;
        }

        .description {
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 18px;
        }

        .btn-primary {
            display: inline-block;
            background: var(--navy);
            color: white;
            padding: 11px 19px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
            color: white;
        }

        /* RECOMMENDED SERVICES */

        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .service-card {
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 17px;
            background: var(--white);
        }

        .service-card h4 {
            color: var(--navy);
            font-family: 'Fraunces', serif;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .service-card p {
            color: var(--ink-soft);
            font-size: 11px;
            line-height: 1.7;
            margin-bottom: 12px;
        }

        .service-price {
            color: var(--gold);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 13px;
        }

        .service-card .btn-primary {
            padding: 9px 13px;
        }

        /* ORDERS */

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 17px 10px;
            border-bottom: 1px solid var(--line);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-info strong {
            display: block;
            font-size: 13px;
            color: var(--ink);
            margin-bottom: 6px;
        }

        .order-info small {
            color: var(--ink-soft);
            font-size: 11px;
        }

        .status {
            display: inline-block;
            background: var(--gold-soft);
            color: #805817;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .empty {
            text-align: center;
            padding: 35px 10px;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 12px;
        }

        .empty h4 {
            font-family: 'Fraunces', serif;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .empty p {
            color: var(--ink-soft);
            font-size: 12px;
            margin-bottom: 17px;
            line-height: 1.7;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #E5F3E9;
            color: #25643A;
        }

        .alert-danger {
            background: #FBE8E5;
            color: #963C32;
        }

        /* FOOTER */

        .footer {
            color: var(--ink-soft);
            font-size: 11px;
            text-align: center;
            padding: 10px;
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 18px;
            }

            .logo {
                margin-bottom: 18px;
                padding-bottom: 15px;
            }

            .menu {
                margin-bottom: 12px;
            }

            .menu a {
                display: inline-flex;
                padding: 10px;
                font-size: 11px;
            }

            .menu-title {
                margin-top: 12px;
            }

            .sidebar-bottom {
                margin-top: 10px;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .service-grid {
                grid-template-columns: 1fr;
            }

            .profile-name {
                display: none;
            }

            .welcome {
                padding: 23px;
            }

            .welcome h1 {
                font-size: 23px;
            }

            .topbar h2 {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .main {
                padding: 13px;
            }

            .section {
                padding: 18px;
            }

            .order-item {
                align-items: flex-start;
            }

            .section-header {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="logo">Boost<span>CV</span></div>

        <p class="menu-title">OVERVIEW</p>
        <nav class="menu">
            <a href="{{ route('customer.dashboard') }}" class="active">
                <span class="menu-icon">⌂</span> Dashboard
            </a>
        </nav>

        <p class="menu-title">LAYANAN CUSTOMER</p>
        <nav class="menu">
            <a href="{{ route('customer.services') }}">
                <span class="menu-icon">▣</span> Cari Jasa CV
            </a>
            <a href="{{ route('customer.orders') }}">
                <span class="menu-icon">▤</span> Pesanan Saya
            </a>
            <a href="{{ route('customer.history') }}">
                <span class="menu-icon">◷</span> Riwayat Pesanan
            </a>
        </nav>

        <p class="menu-title">PENGELOLAAN PESANAN</p>
        <nav class="menu">
            <a href="{{ route('customer.cancellations.index') }}">
                <span class="menu-icon">×</span> Pembatalan
            </a>
            <a href="{{ route('customer.revisions.index') }}">
                <span class="menu-icon">↻</span> Revisi
            </a>
        </nav>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">↪ Keluar</button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h2>Halo, {{ $user->name }}!</h2>
                <p>Selamat datang kembali di BoostCV.</p>
            </div>

            <div class="topbar-actions">
                <a href="#pesanan-terbaru" class="notification-btn" aria-label="Lihat aktivitas pesanan">
                    🔔
                    @if(isset($unreadNotifications) && $unreadNotifications > 0)
                        <span class="notification-count">{{ $unreadNotifications }}</span>
                    @endif
                </a>

                <div class="profile-wrap">
                    <div class="profile">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="profile-name">
                        {{ $user->name }}
                        <span class="profile-label">Customer BoostCV</span>
                    </div>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <section class="welcome">
            <h1>Wujudkan CV Profesionalmu!</h1>
            <p>
                Temukan Creator terbaik dan buat CV yang menarik,
                profesional, serta sesuai dengan tujuan kariermu.
                Mulai perjalanan kariermu bersama BoostCV.
            </p>
            <a href="{{ route('customer.services') }}" class="btn-gold">
                Temukan Layanan CV →
            </a>
        </section>

        <section class="stats">

            <div class="stat-card">
                <div class="stat-top">
                    <p>Pesanan Aktif</p>
                    <div class="stat-icon">▣</div>
                </div>
                <h2>{{ $activeOrders }}</h2>
                <small>Pesanan yang sedang diproses</small>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <p>Pesanan Selesai</p>
                    <div class="stat-icon">✓</div>
                </div>
                <h2>{{ $completedOrders }}</h2>
                <small>Pesanan berhasil diselesaikan</small>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <p>Menunggu Pembayaran</p>
                    <div class="stat-icon">◷</div>
                </div>
                <h2>{{ $pendingPaymentOrders ?? 0 }}</h2>
                <small>Pesanan yang perlu dibayar</small>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <p>Menunggu Revisi</p>
                    <div class="stat-icon">↻</div>
                </div>
                <h2>{{ $revisionOrders ?? 0 }}</h2>
                <small>Pesanan dalam proses revisi</small>
            </div>

        </section>

        <section class="section">
            <div class="section-header">
                <h3>Temukan Layanan CV</h3>
            </div>

            <p class="description">
                Pilih layanan pembuatan CV berdasarkan kebutuhanmu.
                Temukan Creator melalui pengalaman dan portofolio mereka.
            </p>

            <a href="{{ route('customer.services') }}" class="btn-primary">
                Jelajahi Layanan
            </a>
        </section>

        <section class="section">
            <div class="section-header">
                <h3>Rekomendasi Layanan CV</h3>
                <a href="{{ route('customer.services') }}">Lihat Semua →</a>
            </div>

            @if(isset($recommendedServices) && $recommendedServices->count() > 0)
                <div class="service-grid">
                    @foreach($recommendedServices as $service)
                        <div class="service-card">
                            <h4>{{ $service->title }}</h4>

                            <p>
                                {{ \Illuminate\Support\Str::limit(
                                    $service->description ?? 'Layanan pembuatan CV profesional sesuai kebutuhanmu.',
                                    90
                                ) }}
                            </p>

                            <div class="service-price">
                                Rp{{ number_format($service->price ?? 0, 0, ',', '.') }}
                            </div>

                            <a href="{{ route('customer.services') }}" class="btn-primary">
                                Lihat Layanan
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="description">
                    Layanan dari Creator yang telah disetujui Admin akan tampil di sini.
                </p>

                <a href="{{ route('customer.services') }}" class="btn-primary">
                    Jelajahi Semua Layanan
                </a>
            @endif
        </section>

        <section class="section" id="pesanan-terbaru">
            <div class="section-header">
                <h3>Pesanan Terbaru</h3>
                <a href="{{ route('customer.orders') }}">Lihat Semua →</a>
            </div>

            @forelse($latestOrders as $order)
                <div class="order-item">
                    <div class="order-info">
                        <strong>
                            {{ $order->service_title ?? ($order->service->title ?? '-') }}
                        </strong>

                        <small>
                            Nomor Pesanan: {{ $order->order_number }}
                        </small>
                    </div>

                    <span class="status">
                        @php
                            $statusLabels = [
                                'pending_payment' => 'Menunggu Pembayaran',
                                'payment_rejected' => 'Pembayaran Ditolak',
                                'in_progress' => 'Sedang Dikerjakan',
                                'revision' => 'Sedang Direvisi',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan'
                            ];
                        @endphp

                        {{ $statusLabels[$order->status] ?? ucfirst(str_replace('_', ' ', $order->status)) }}
                    </span>
                </div>
            @empty
                <div class="empty">
                    <div class="empty-icon">📄</div>
                    <h4>Belum Ada Pesanan</h4>
                    <p>
                        Kamu belum memiliki pesanan.
                        Yuk, mulai pesan layanan CV pertamamu!
                    </p>
                    <a href="{{ route('customer.services') }}" class="btn-primary">
                        Mulai Pesan
                    </a>
                </div>
            @endforelse
        </section>

        <div class="footer">
            © {{ date('Y') }} BoostCV. All rights reserved.
        </div>

    </main>

</body>
</html>
