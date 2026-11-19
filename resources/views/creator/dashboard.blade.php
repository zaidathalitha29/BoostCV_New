<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Creator - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --ink: #1C2434;
            --ink-soft: #788196;
            --paper: #F7F8FC;
            --white: #FFFFFF;
            --line: #EAEDF3;
            --navy: #223A66;
            --navy-deep: #192D50;
            --gold: #C98A2C;
            --gold-soft: #F8EBD5;
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

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--navy-deep);
            color: white;
            padding: 27px 18px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-size: 29px;
            font-weight: 700;
            color: white;
            padding: 5px 10px 25px;
            border-bottom: 1px solid rgba(255,255,255,.15);
            margin-bottom: 27px;
        }

        .logo span {
            color: var(--gold);
        }

        .menu-title {
            color: #AAB7CE;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            margin: 0 0 12px 10px;
        }

        .menu {
            margin-bottom: 23px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #D8DFEC;
            padding: 12px 13px;
            margin-bottom: 5px;
            border-radius: 9px;
            font-size: 12px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--navy);
            color: white;
        }

        .menu a.active {
            border-left: 3px solid var(--gold);
        }

        .menu a i {
            width: 20px;
            font-size: 16px;
            text-align: center;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,.15);
            padding-top: 18px;
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid rgba(255,255,255,.4);
            color: white;
            padding: 11px;
            border-radius: 9px;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,.12);
        }

        .main {
            margin-left: 250px;
            padding: 30px 35px 45px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 27px;
        }

        .topbar h2 {
            font-family: 'Fraunces', serif;
            font-size: 28px;
            margin-bottom: 7px;
        }

        .topbar p {
            color: var(--ink-soft);
            font-size: 12px;
        }

        .profile-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 11px;
            padding: 9px 14px;
        }

        .profile {
            width: 39px;
            height: 39px;
            border: 1px solid var(--gold);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--navy);
            font-weight: 700;
            background: var(--gold-soft);
        }

        .profile-name {
            font-size: 12px;
            font-weight: 700;
        }

        .profile-label {
            display: block;
            margin-top: 4px;
            font-size: 10px;
            color: var(--ink-soft);
            font-weight: 400;
        }

        .welcome {
            background: linear-gradient(115deg, var(--navy-deep), #36598E);
            border-radius: 15px;
            padding: 29px;
            color: white;
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-family: 'Fraunces', serif;
            font-size: 26px;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #DCE5F3;
            font-size: 12px;
            line-height: 1.8;
            max-width: 600px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 27px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 13px;
            padding: 21px;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 17px;
        }

        .stat-icon {
            width: 41px;
            height: 41px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            background: var(--gold-soft);
            color: var(--navy);
            font-size: 18px;
        }

        .stat-card p {
            color: var(--ink-soft);
            font-size: 11px;
            margin-bottom: 7px;
        }

        .stat-card h2 {
            font-family: 'Fraunces', serif;
            color: var(--navy);
            font-size: 27px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 18px;
        }

        .section {
            background: white;
            border: 1px solid var(--line);
            border-radius: 13px;
            padding: 22px;
            margin-bottom: 20px;
        }

        .menu-card {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 0;
            border-bottom: 1px solid var(--line);
        }

        .menu-card:last-child {
            border-bottom: none;
        }

        .menu-card-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: var(--gold-soft);
            color: var(--navy);
            font-size: 17px;
        }

        .menu-card-info {
            flex: 1;
        }

        .menu-card-info h4 {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .menu-card-info p {
            color: var(--ink-soft);
            font-size: 10px;
            line-height: 1.6;
        }

        .menu-card a {
            color: var(--navy);
            font-size: 17px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid var(--line);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-info strong {
            display: block;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .order-info small {
            color: var(--ink-soft);
            font-size: 10px;
        }

        .status {
            display: inline-block;
            background: var(--gold-soft);
            color: #805817;
            padding: 7px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .empty {
            text-align: center;
            padding: 25px 10px;
            color: var(--ink-soft);
            font-size: 12px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .alert-success {
            background: #E5F3E9;
            color: #25643A;
        }

        .alert-danger {
            background: #FBE8E5;
            color: #963C32;
        }

        .footer {
            color: #9AA3B2;
            font-size: 10px;
            text-align: center;
            padding: 15px;
        }

        @media (max-width: 1000px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 17px;
            }

            .logo {
                margin-bottom: 18px;
            }

            .menu a {
                display: inline-flex;
                padding: 10px;
                font-size: 11px;
            }

            .menu {
                margin-bottom: 12px;
            }

            .sidebar-bottom {
                margin-top: 12px;
            }

            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar h2 {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-card h2 {
                font-size: 22px;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .section {
                padding: 17px;
            }

            .profile-wrap {
                width: 100%;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
@endphp

<aside class="sidebar">

    <div class="logo">
        Boost<span>CV.</span>
    </div>

    <p class="menu-title">MENU CREATOR</p>

    <nav class="menu">
        <a href="{{ route('creator.dashboard') }}" class="active">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <a href="{{ route('creator.profile') }}">
            <i class="bi bi-person-circle"></i>
            Profil Saya
        </a>

        <a href="{{ route('creator.portofolio.index') }}">
            <i class="bi bi-images"></i>
            Portofolio
        </a>

        <a href="{{ route('creator.services.index') }}">
            <i class="bi bi-briefcase"></i>
            Layanan Saya
        </a>

        <a href="{{ route('creator.orders.index') }}">
            <i class="bi bi-receipt"></i>
            Pesanan
        </a>

        <a href="{{ route('creator.reviews.index') }}">
            <i class="bi bi-star"></i>
            Ulasan
        </a>

        <a href="{{ route('creator.notifications.index') }}">
            <i class="bi bi-bell"></i>
            Notifikasi
        </a>

        <a href="{{ route('creator.earnings.index') }}">
            <i class="bi bi-wallet2"></i>
            Pendapatan
        </a>

        <a href="{{ route('creator.payouts.index') }}">
            <i class="bi bi-cash-coin"></i>
            Pencairan Dana
        </a>
    </nav>

    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-left me-2"></i>
                Keluar
            </button>
        </form>
    </div>

</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h2>Halo, {{ $user->name ?? 'Creator' }}!</h2>
            <p>Selamat datang di Dashboard Creator BoostCV.</p>
        </div>

        <div class="profile-wrap">
            <div class="profile">
                {{ strtoupper(substr($user->name ?? 'C', 0, 1)) }}
            </div>

            <div class="profile-name">
                {{ $user->name ?? 'Creator' }}
                <span class="profile-label">Creator BoostCV</span>
            </div>
        </div>
    </header>

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

    <section class="welcome">
        <h1>Selamat Datang, Creator!</h1>
        <p>
            Kelola profil, portofolio, layanan, pesanan, dan pendapatan
            kamu melalui dashboard Creator BoostCV.
        </p>
    </section>

    <h3 class="section-title">Ringkasan Aktivitas</h3>

    <section class="stats">

        <div class="stat-card">
            <div class="stat-top">
                <p>Total Layanan</p>
                <div class="stat-icon">
                    <i class="bi bi-briefcase"></i>
                </div>
            </div>
            <h2>{{ $totalServices ?? 0 }}</h2>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <p>Total Pesanan</p>
                <div class="stat-icon">
                    <i class="bi bi-receipt"></i>
                </div>
            </div>
            <h2>{{ $totalOrders ?? 0 }}</h2>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <p>Ulasan</p>
                <div class="stat-icon">
                    <i class="bi bi-star"></i>
                </div>
            </div>
            <h2>{{ $totalReviews ?? 0 }}</h2>
        </div>

    </section>

    <div class="content-grid">

        <section class="section">
            <h3 class="section-title">Menu Pengelolaan</h3>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Profil Creator</h4>
                    <p>Atur informasi dan identitas profil Creator kamu.</p>
                </div>
                <a href="{{ route('creator.profile') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-images"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Portofolio</h4>
                    <p>Tampilkan hasil karya dan pengalaman kamu.</p>
                </div>
                <a href="{{ route('creator.portofolio.index') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-briefcase"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Layanan Saya</h4>
                    <p>Kelola layanan yang kamu tawarkan kepada Customer.</p>
                </div>
                <a href="{{ route('creator.services.index') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-receipt"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Pesanan</h4>
                    <p>Pantau dan kelola pesanan dari Customer.</p>
                </div>
                <a href="{{ route('creator.orders.index') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

        </section>

        <section class="section">
            <h3 class="section-title">Informasi Creator</h3>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-star"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Ulasan Customer</h4>
                    <p>Lihat penilaian dan ulasan dari Customer.</p>
                </div>
                <a href="{{ route('creator.reviews.index') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-wallet2"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Pendapatan</h4>
                    <p>Pantau informasi pendapatan dari pesanan.</p>
                </div>
                <a href="{{ route('creator.earnings.index') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Pencairan Dana</h4>
                    <p>Kelola permintaan pencairan pendapatan.</p>
                </div>
                <a href="{{ route('creator.payouts.index') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="menu-card">
                <div class="menu-card-icon">
                    <i class="bi bi-bell"></i>
                </div>
                <div class="menu-card-info">
                    <h4>Notifikasi</h4>
                    <p>Lihat informasi dan pemberitahuan terbaru.</p>
                </div>
                <a href="{{ route('creator.notifications.index') }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

        </section>

    </div>

    <section class="section">
        <h3 class="section-title">Pesanan Terbaru</h3>

        @forelse($recentOrders ?? [] as $order)
            <div class="order-item">
                <div class="order-info">
                    <strong>
                        {{ $order->order_number ?? 'Pesanan #' . $order->id }}
                    </strong>
                    <small>
                        {{ $order->customer_name ?? optional($order->customer)->name ?? 'Customer' }}
                        · Rp{{ number_format((float) ($order->price ?? 0), 0, ',', '.') }}
                    </small>
                </div>

                <span class="status">
                    {{ ucfirst(str_replace('_', ' ', $order->status ?? '-')) }}
                </span>
            </div>
        @empty
            <div class="empty">
                Belum ada pesanan terbaru.
            </div>
        @endforelse
    </section>

    <footer class="footer">
        © {{ date('Y') }} BoostCV. Creator Dashboard.
    </footer>

</main>

</body>
</html>