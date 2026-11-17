
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cari Jasa CV - BoostCV</title>

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

        .menu a.active {
            border-left: 3px solid var(--gold);
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
            font-size: 12px;
            color: var(--ink-soft);
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

        .page-heading {
            margin-bottom: 22px;
        }

        .page-heading h1 {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.7;
        }

        .search-box {
            background: white;
            padding: 22px;
            border: 1px solid var(--line);
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .search-form {
            display: grid;
            grid-template-columns: 1fr 220px auto;
            gap: 12px;
        }

        .search-form input,
        .search-form select {
            width: 100%;
            padding: 13px;
            border: 1px solid var(--line);
            border-radius: 7px;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            background: white;
        }

        .btn-search {
            border: none;
            background: var(--navy);
            color: white;
            padding: 13px 22px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-search:hover {
            background: var(--navy-deep);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .section-heading h3 {
            font-family: 'Fraunces', serif;
            font-size: 21px;
        }

        .section-heading span {
            color: var(--ink-soft);
            font-size: 12px;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .service-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
            transition: .2s;
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(28,36,52,.08);
        }

        .service-image {
            height: 155px;
            background: linear-gradient(135deg, var(--navy-deep), var(--navy));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-soft);
            font-size: 42px;
        }

        .service-content {
            padding: 20px;
        }

        .category {
            display: inline-block;
            background: var(--gold-soft);
            color: #805817;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .service-content h4 {
            font-family: 'Fraunces', serif;
            font-size: 19px;
            margin-bottom: 9px;
        }

        .service-description {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.7;
            min-height: 60px;
            margin-bottom: 14px;
        }

        .creator {
            border-top: 1px solid var(--line);
            padding-top: 13px;
            margin-bottom: 15px;
            font-size: 11px;
            color: var(--ink-soft);
        }

        .price {
            font-family: 'Fraunces', serif;
            color: var(--navy);
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .btn-detail {
            display: block;
            background: var(--navy);
            color: white;
            text-align: center;
            padding: 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-detail:hover {
            background: var(--navy-deep);
            color: white;
        }

        .empty {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 50px 20px;
            text-align: center;
            grid-column: 1 / -1;
        }

        .empty h3 {
            font-family: 'Fraunces', serif;
            margin: 12px 0 8px;
        }

        .empty p {
            font-size: 13px;
            color: var(--ink-soft);
        }

        .pagination {
            margin-top: 25px;
        }

        .footer {
            text-align: center;
            color: var(--ink-soft);
            font-size: 11px;
            margin-top: 35px;
        }

        @media(max-width: 1000px) {
            .service-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

            .search-form {
                grid-template-columns: 1fr;
            }

            .service-grid {
                grid-template-columns: 1fr;
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
            <h2>Cari Layanan CV</h2>
            <p>Temukan layanan terbaik untuk kebutuhan kariermu.</p>
        </div>

        <div class="profile">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
    </header>

    <section class="page-heading">
        <h1>Temukan Layanan CV</h1>
        <p>
            Pilih layanan pembuatan CV yang sesuai dengan kebutuhanmu.
            Temukan Creator terbaik dan mulai persiapkan kariermu.
        </p>
    </section>

    <section class="search-box">

        <form action="{{ route('customer.services') }}" method="GET" class="search-form">

            <input
                type="text"
                name="search"
                placeholder="Cari layanan CV..."
                value="{{ request('search') }}"
            >

            <select name="category">
                <option value="">Semua Kategori</option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn-search">
                Cari Layanan
            </button>

        </form>

    </section>

    <section>

        <div class="section-heading">
            <h3>Daftar Layanan</h3>
            <span>{{ $services->total() }} layanan tersedia</span>
        </div>

        <div class="service-grid">

            @forelse($services as $service)

                <article class="service-card">

                    <div class="service-image">
                        ✦
                    </div>

                    <div class="service-content">

                        <span class="category">
                            {{ $service->category->name ?? 'Umum' }}
                        </span>

                        <h4>{{ $service->title }}</h4>

                        <p class="service-description">
                            {{ \Illuminate\Support\Str::limit($service->description, 110) }}
                        </p>

                        <div class="creator">
                            Creator:
                            {{ $service->creator->user->name ?? 'Creator BoostCV' }}
                        </div>

                        <div class="price">
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </div>

                        <a
                            href="{{ route('customer.services.show', $service->id) }}"
                            class="btn-detail"
                        >
                            Lihat Detail Layanan →
                        </a>

                    </div>

                </article>

            @empty

                <div class="empty">
                    <div style="font-size:40px;">📄</div>
                    <h3>Layanan Belum Tersedia</h3>
                    <p>
                        Belum ada layanan yang sesuai dengan pencarianmu.
                        Silakan coba kata kunci atau kategori lain.
                    </p>
                </div>

            @endforelse

        </div>

        <div class="pagination">
            {{ $services->appends(request()->query())->links() }}
        </div>

    </section>

    <footer class="footer">
        © {{ date('Y') }} BoostCV. All rights reserved.
    </footer>

</main>

</body>
</html>
