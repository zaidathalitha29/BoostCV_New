
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail Layanan - BoostCV</title>

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

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--navy-deep);
            padding: 28px 20px;
            color: white;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 100;
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-size: 29px;
            font-weight: 700;
            padding: 5px 10px 25px;
            border-bottom: 1px solid rgba(255,255,255,.18);
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
            margin-bottom: 25px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #D8DFEC;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 8px;
            font-size: 13px;
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

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,.18);
            padding-top: 18px;
        }

        .logout-btn {
            width: 100%;
            padding: 12px;
            background: transparent;
            border: 1px solid #D98B75;
            color: #F0B5A5;
            border-radius: 25px;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: #8B3C36;
            color: white;
        }

        .main {
            margin-left: 260px;
            padding: 25px 30px 45px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 18px 22px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .topbar h2 {
            font-family: 'Fraunces', serif;
            font-size: 21px;
        }

        .topbar p {
            color: var(--ink-soft);
            font-size: 12px;
            margin-top: 5px;
        }

        .profile {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            background: var(--gold-soft);
            color: var(--navy);
            border: 1px solid var(--gold);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
        }

        .breadcrumb {
            margin-bottom: 20px;
            font-size: 12px;
            color: var(--ink-soft);
        }

        .breadcrumb a {
            color: var(--navy);
            font-weight: 600;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(280px, 1fr);
            gap: 22px;
            align-items: start;
        }

        .card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .service-banner {
            height: 240px;
            background: linear-gradient(135deg, var(--navy-deep), var(--navy));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-soft);
            font-size: 55px;
            margin-bottom: 23px;
            overflow: hidden;
        }

        .service-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category {
            display: inline-block;
            background: var(--gold-soft);
            color: #805817;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        h1, h2, h3 {
            font-family: 'Fraunces', serif;
        }

        .service-title {
            font-size: 30px;
            color: var(--navy-deep);
            margin-bottom: 13px;
            line-height: 1.4;
        }

        .description {
            font-size: 13px;
            color: var(--ink-soft);
            line-height: 1.9;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .card h3 {
            font-size: 20px;
            color: var(--navy-deep);
            margin-bottom: 17px;
        }

        .creator-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .creator-avatar {
            width: 55px;
            height: 55px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--gold-soft);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Fraunces', serif;
            font-size: 23px;
            font-weight: 700;
            overflow: hidden;
        }

        .creator-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .creator-name {
            font-weight: 700;
            font-size: 15px;
            color: var(--navy);
            margin-bottom: 5px;
        }

        .creator-profession {
            color: var(--ink-soft);
            font-size: 11px;
        }

        .creator-description {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .price-label {
            color: var(--ink-soft);
            font-size: 12px;
            margin-bottom: 7px;
        }

        .price {
            font-family: 'Fraunces', serif;
            color: var(--navy);
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid var(--line);
            font-size: 12px;
        }

        .info-row:last-of-type {
            border-bottom: none;
        }

        .info-row span:first-child {
            color: var(--ink-soft);
        }

        .info-row strong {
            color: var(--navy);
            text-align: right;
        }

        .notice {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 13px;
            margin-top: 20px;
            font-size: 11px;
            color: var(--ink-soft);
            line-height: 1.7;
        }

        .btn-back {
            display: inline-block;
            background: var(--navy);
            color: white;
            padding: 11px 17px;
            border-radius: 7px;
            font-size: 12px;
            margin-top: 20px;
            transition: .2s;
        }

        .btn-back:hover {
            background: var(--navy-deep);
            color: white;
        }

        .footer {
            text-align: center;
            color: var(--ink-soft);
            font-size: 11px;
            margin-top: 35px;
        }

        @media(max-width: 1000px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .sidebar-bottom {
                margin-top: 10px;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .service-title {
                font-size: 25px;
            }
        }

        @media(max-width: 480px) {
            .main {
                padding: 13px;
            }

            .card {
                padding: 18px;
            }

            .service-banner {
                height: 190px;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
    $creator = $service->creator;
    $creatorName = $creator->display_name
        ?? optional($creator->user)->name
        ?? 'Creator BoostCV';
@endphp

<aside class="sidebar">

    <div class="logo">Boost<span>CV</span></div>

    <p class="menu-title">OVERVIEW</p>

    <nav class="menu">
        <a href="{{ route('customer.dashboard') }}">
            <span>⌂</span>
            Dashboard
        </a>
    </nav>

    <p class="menu-title">LAYANAN CUSTOMER</p>

    <nav class="menu">
        <a href="{{ route('customer.services') }}" class="active">
            <span>▣</span>
            Cari Jasa CV
        </a>

        <a href="{{ route('customer.orders') }}">
            <span>▤</span>
            Pesanan Saya
        </a>

        <a href="{{ route('customer.history') }}">
            <span>◷</span>
            Riwayat Pesanan
        </a>
    </nav>

    <p class="menu-title">PENGELOLAAN PESANAN</p>

    <nav class="menu">
        <a href="{{ route('customer.cancellations.index') }}">
            <span>×</span>
            Pembatalan
        </a>

        <a href="{{ route('customer.revisions.index') }}">
            <span>↻</span>
            Revisi
        </a>
    </nav>

    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                ↪ Keluar
            </button>
        </form>
    </div>

</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h2>Detail Layanan</h2>
            <p>Informasi lengkap layanan pembuatan CV.</p>
        </div>

        <div class="profile">
            {{ strtoupper(substr($user->name ?? 'C', 0, 1)) }}
        </div>
    </header>

    <div class="breadcrumb">
        <a href="{{ route('customer.dashboard') }}">Dashboard</a>
        /
        <a href="{{ route('customer.services') }}">Cari Jasa CV</a>
        /
        Detail Layanan
    </div>

    <div class="detail-grid">

        <div>

            <section class="card">

                <div class="service-banner">

                    @if($service->thumbnail)
                        <img
                            src="{{ asset('storage/' . $service->thumbnail) }}"
                            alt="Thumbnail {{ $service->title }}"
                        >
                    @else
                        ✦
                    @endif

                </div>

                <span class="category">
                    {{ optional($service->category)->name ?? 'Umum' }}
                </span>

                <h1 class="service-title">
                    {{ $service->title }}
                </h1>

                <p class="description">
                    {{ $service->description ?: 'Belum ada deskripsi layanan.' }}
                </p>

            </section>

            <section class="card">

                <h3>Informasi Creator</h3>

                <div class="creator-header">

                    <div class="creator-avatar">

                        @if($creator && $creator->photo)
                            <img
                                src="{{ asset('storage/' . $creator->photo) }}"
                                alt="Foto {{ $creatorName }}"
                            >
                        @else
                            {{ strtoupper(substr($creatorName, 0, 1)) }}
                        @endif

                    </div>

                    <div>
                        <div class="creator-name">
                            {{ $creatorName }}
                        </div>

                        <div class="creator-profession">
                            {{ $creator->profession ?? 'Creator BoostCV' }}
                        </div>
                    </div>

                </div>

                <p class="creator-description">
                    {{ $creator->bio ?? 'Creator ini belum menambahkan deskripsi profil.' }}
                </p>

            </section>

        </div>

        <div>

            <section class="card">

                <p class="price-label">Harga Layanan</p>

                <div class="price">
                    Rp {{ number_format($service->price, 0, ',', '.') }}
                </div>

                <div class="info-row">
                    <span>Kategori</span>
                    <strong>
                        {{ optional($service->category)->name ?? 'Umum' }}
                    </strong>
                </div>

                <div class="info-row">
                    <span>Estimasi Pengerjaan</span>
                    <strong>
                        {{ $service->estimated_days }} Hari
                    </strong>
                </div>

                <div class="info-row">
                    <span>Batas Revisi</span>
                    <strong>
                        {{ $service->revision_limit }} Kali
                    </strong>
                </div>

                <div class="info-row">
                    <span>Penyedia Layanan</span>
                    <strong>{{ $creatorName }}</strong>
                </div>

                <div class="notice">
                    Periksa deskripsi, harga, estimasi pengerjaan, dan batas revisi
                    sebelum melanjutkan pemesanan.
                </div>

                <a
                    href="{{ route('customer.services') }}"
                    class="btn-back"
                >
                    ← Kembali ke Daftar Layanan
                </a>

            </section>

        </div>

    </div>

    <footer class="footer">
        © {{ date('Y') }} BoostCV. All rights reserved.
    </footer>

</main>

</body>
</html>
