
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
            overflow-y: auto;
            z-index: 100;
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-size: 29px;
            font-weight: 700;
            color: white;
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
            transition: .2s;
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
            background: var(--white);
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
            font-weight: 600;
        }

        .topbar p {
            font-size: 12px;
            color: var(--ink-soft);
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

        .page-heading {
            margin-bottom: 23px;
        }

        .page-heading h1 {
            font-family: 'Fraunces', serif;
            font-size: 29px;
            color: var(--navy-deep);
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
            margin-bottom: 28px;
        }

        .search-form {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 220px auto;
            gap: 12px;
        }

        .search-form input,
        .search-form select {
            width: 100%;
            min-width: 0;
            padding: 13px;
            border: 1px solid var(--line);
            border-radius: 7px;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            background: white;
            color: var(--ink);
            outline: none;
        }

        .search-form input:focus,
        .search-form select:focus {
            border-color: var(--navy);
        }

        .btn-search {
            border: none;
            background: var(--navy);
            color: white;
            padding: 13px 22px;
            border-radius: 7px;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 12px;
            transition: .2s;
        }

        .btn-search:hover {
            background: var(--navy-deep);
        }

        .search-actions {
            margin-top: 13px;
        }

        .btn-reset {
            color: var(--ink-soft);
            font-size: 12px;
            font-weight: 600;
        }

        .btn-reset:hover {
            color: var(--gold);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .section-heading h3 {
            font-family: 'Fraunces', serif;
            font-size: 21px;
            color: var(--navy-deep);
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
            display: flex;
            flex-direction: column;
            transition: .2s;
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(28,36,52,.08);
        }

        .service-image {
            height: 175px;
            background: linear-gradient(135deg, var(--navy-deep), var(--navy));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-soft);
            font-size: 42px;
            overflow: hidden;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .service-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .category {
            display: inline-block;
            width: fit-content;
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
            color: var(--navy-deep);
            margin-bottom: 9px;
            line-height: 1.4;
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
            margin-bottom: 14px;
            font-size: 11px;
            color: var(--ink-soft);
        }

        .creator strong {
            color: var(--navy);
        }

        .service-meta {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .meta-item {
            flex: 1;
            background: var(--paper);
            border: 1px solid var(--line);
            padding: 10px 8px;
            border-radius: 7px;
            text-align: center;
        }

        .meta-item span {
            display: block;
            color: var(--ink-soft);
            font-size: 10px;
            margin-bottom: 5px;
        }

        .meta-item strong {
            color: var(--navy);
            font-size: 12px;
        }

        .price-label {
            color: var(--ink-soft);
            font-size: 11px;
            margin-bottom: 4px;
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
            margin-top: auto;
            background: var(--navy);
            color: white;
            text-align: center;
            padding: 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
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

        .empty-icon {
            font-size: 40px;
            margin-bottom: 12px;
        }

        .empty h3 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            margin-bottom: 8px;
        }

        .empty p {
            font-size: 13px;
            color: var(--ink-soft);
            line-height: 1.7;
        }

        .empty a {
            display: inline-block;
            margin-top: 18px;
            background: var(--navy);
            color: white;
            padding: 11px 20px;
            border-radius: 7px;
            font-size: 12px;
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

        @media(max-width: 1100px) {
            .service-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
            }

            .sidebar-bottom {
                position: static;
                margin-top: 10px;
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

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media(max-width: 480px) {
            .main {
                padding: 13px;
            }

            .topbar {
                padding: 15px;
            }

            .page-heading h1 {
                font-size: 25px;
            }

            .service-content {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
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
            <h2>Cari Layanan CV</h2>
            <p>Temukan layanan terbaik untuk kebutuhan kariermu.</p>
        </div>

        <div class="profile">
            {{ strtoupper(substr($user->name ?? 'C', 0, 1)) }}
        </div>
    </header>

    @if(session('success'))
        <div style="background:#E5F3E9;color:#25643A;padding:13px 16px;border-radius:8px;margin-bottom:18px;font-size:13px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background:#FBE8E5;color:#963C32;padding:13px 16px;border-radius:8px;margin-bottom:18px;font-size:13px;">
            {{ session('error') }}
        </div>
    @endif

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
                placeholder="Cari judul, deskripsi, atau nama Creator..."
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

        @if(request('search') || request('category'))
            <div class="search-actions">
                <a href="{{ route('customer.services') }}" class="btn-reset">
                    ✕ Hapus pencarian dan filter
                </a>
            </div>
        @endif

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

                        @if($service->thumbnail)
                            <img
                                src="{{ asset('storage/' . $service->thumbnail) }}"
                                alt="Thumbnail {{ $service->title }}"
                                loading="lazy"
                            >
                        @else
                            ✦
                        @endif

                    </div>

                    <div class="service-content">

                        <span class="category">
                            {{ optional($service->category)->name ?? 'Umum' }}
                        </span>

                        <h4>{{ $service->title }}</h4>

                        <p class="service-description">
                            {{ \Illuminate\Support\Str::limit($service->description, 110) }}
                        </p>

                        <div class="creator">
                            Creator:
                            <strong>
                                {{ optional($service->creator)->display_name
                                    ?: optional(optional($service->creator)->user)->name
                                    ?: 'Creator BoostCV' }}
                            </strong>
                        </div>

                        <div class="service-meta">

                            <div class="meta-item">
                                <span>Estimasi</span>
                                <strong>
                                    {{ $service->estimated_days }} Hari
                                </strong>
                            </div>

                            <div class="meta-item">
                                <span>Batas Revisi</span>
                                <strong>
                                    {{ $service->revision_limit }} Kali
                                </strong>
                            </div>

                        </div>

                        <div class="price-label">Harga layanan</div>

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

                    <div class="empty-icon">📄</div>

                    <h3>Layanan Belum Tersedia</h3>

                    <p>
                        Belum ada layanan yang sesuai dengan pencarianmu.
                        Silakan coba kata kunci atau kategori lain.
                    </p>

                    @if(request('search') || request('category'))
                        <a href="{{ route('customer.services') }}">
                            Lihat Semua Layanan
                        </a>
                    @endif

                </div>

            @endforelse

        </div>

        <div class="pagination">
            {{ $services->links() }}
        </div>

    </section>

    <footer class="footer">
        © {{ date('Y') }} BoostCV. All rights reserved.
    </footer>

</main>

</body>
</html>
