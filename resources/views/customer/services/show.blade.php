
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
            width: 250px;
            min-height: 100vh;
            position: fixed;
            background: var(--navy-deep);
            padding: 28px 20px;
            color: white;
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
            letter-spacing: 1px;
            margin: 22px 0 12px 10px;
        }

        .menu a {
            display: block;
            color: #D8DFEC;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 8px;
            font-size: 13px;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--navy);
            color: white;
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 25px;
            left: 20px;
            right: 20px;
        }

        .logout-btn {
            width: 100%;
            padding: 12px;
            background: transparent;
            border: 1px solid #D98B75;
            color: #F0B5A5;
            border-radius: 25px;
            cursor: pointer;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 20px 23px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h2 {
            font-family: 'Fraunces', serif;
            font-size: 23px;
        }

        .topbar p {
            color: var(--ink-soft);
            font-size: 12px;
            margin-top: 5px;
        }

        .profile {
            width: 42px;
            height: 42px;
            background: var(--gold-soft);
            color: var(--navy);
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
            grid-template-columns: 1.6fr 1fr;
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
            height: 190px;
            background: linear-gradient(135deg, var(--navy-deep), var(--navy));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-soft);
            font-size: 55px;
            margin-bottom: 23px;
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
            margin-bottom: 13px;
        }

        .description {
            font-size: 13px;
            color: var(--ink-soft);
            line-height: 1.9;
            white-space: pre-line;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 17px;
        }

        .creator-name {
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .creator-description {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.8;
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

        .info-row:last-child {
            border-bottom: none;
        }

        .info-row span:first-child {
            color: var(--ink-soft);
        }

        .info-row strong {
            text-align: right;
        }

        .btn-order {
            display: block;
            background: var(--gold);
            color: white;
            padding: 14px;
            border-radius: 8px;
            text-align: center;
            font-size: 13px;
            font-weight: 700;
            margin-top: 20px;
        }

        .btn-order:hover {
            background: #A96E1B;
            color: white;
        }

        .btn-back {
            display: inline-block;
            background: var(--navy);
            color: white;
            padding: 11px 17px;
            border-radius: 7px;
            font-size: 12px;
            margin-top: 20px;
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

        @media(max-width: 900px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .sidebar-bottom {
                position: static;
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .service-title {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="logo">Boost<span>CV</span></div>

    <p class="menu-title">OVERVIEW</p>

    <nav class="menu">
        <a href="{{ route('customer.dashboard') }}">⌂ Dashboard</a>
    </nav>

    <p class="menu-title">LAYANAN CUSTOMER</p>

    <nav class="menu">
        <a href="{{ route('customer.services') }}" class="active">▣ Cari Jasa CV</a>
        <a href="{{ route('customer.orders') }}">▤ Pesanan Saya</a>
        <a href="{{ route('customer.history') }}">◷ Riwayat Pesanan</a>
    </nav>

    <p class="menu-title">PENGELOLAAN PESANAN</p>

    <nav class="menu">
        <a href="{{ route('customer.cancellations.index') }}">× Pembatalan</a>
        <a href="{{ route('customer.revisions.index') }}">↻ Revisi</a>
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
            <h2>Detail Layanan</h2>
            <p>Informasi lengkap layanan pembuatan CV.</p>
        </div>

        <div class="profile">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
    </header>

    <div class="breadcrumb">
        <a href="{{ route('customer.dashboard') }}">Dashboard</a>
        /
        <a href="{{ route('customer.services') }}">Cari Jasa CV</a>
        / Detail Layanan
    </div>

    <div class="detail-grid">

        <div>

            <section class="card">

                <div class="service-banner">✦</div>

                <span class="category">
                    {{ $service->category->name ?? 'Umum' }}
                </span>

                <h1 class="service-title">
                    {{ $service->title }}
                </h1>

                <p class="description">
                    {{ $service->description ?? 'Belum ada deskripsi layanan.' }}
                </p>

            </section>

            <section class="card">

                <h3>Informasi Creator</h3>

                <div class="creator-name">
                    {{ $service->creator->user->name ?? 'Creator BoostCV' }}
                </div>

                <p class="creator-description">
                    Layanan ini disediakan oleh Creator BoostCV.
                    Silakan lihat informasi layanan dan ketentuan
                    sebelum melakukan pemesanan.
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
                    <strong>{{ $service->category->name ?? 'Umum' }}</strong>
                </div>

                <div class="info-row">
                    <span>Batas Revisi</span>
                    <strong>{{ $service->revision_limit ?? 0 }} kali</strong>
                </div>

                <div class="info-row">
                    <span>Durasi Pengerjaan</span>
                    <strong>{{ $service->duration ?? '-' }}</strong>
                </div>

                <a
                    href="{{ route('customer.orders.create', $service->id) }}"
                    class="btn-order"
                >
                    Pesan Layanan Sekarang →
                </a>

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
