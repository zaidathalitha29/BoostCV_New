<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portofolio Saya - BoostCV</title>

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

        .profile-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
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

        .profile-name {
            font-size: 12px;
            font-weight: 600;
        }

        .profile-label {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: var(--ink-soft);
            font-weight: 400;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 23px;
        }

        .page-heading h1 {
            font-family: 'Fraunces', serif;
            font-size: 27px;
            color: var(--navy-deep);
            margin-bottom: 8px;
        }

        .page-heading p {
            font-size: 13px;
            color: var(--ink-soft);
            line-height: 1.7;
        }

        .btn-primary {
            display: inline-block;
            background: var(--navy);
            color: white;
            padding: 12px 18px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
        }

        .alert-success {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            background: #E7F4E9;
            color: #28623A;
            font-size: 12px;
        }

        .alert-danger {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            background: #FBE8E5;
            color: #963C32;
            font-size: 12px;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .portfolio-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
            transition: 0.2s;
        }

        .portfolio-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(28,36,52,0.07);
        }

        .portfolio-image {
            width: 100%;
            height: 185px;
            object-fit: cover;
            display: block;
            background: var(--gold-soft);
        }

        .image-placeholder {
            width: 100%;
            height: 185px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--gold-soft);
            color: var(--navy);
            font-size: 38px;
        }

        .portfolio-content {
            padding: 17px;
        }

        .portfolio-content h3 {
            font-family: 'Fraunces', serif;
            font-size: 18px;
            color: var(--navy-deep);
            margin-bottom: 8px;
        }

        .portfolio-content p {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 14px;
        }

        .portfolio-date {
            color: #858B98;
            font-size: 10px;
            margin-bottom: 15px;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            border-top: 1px solid var(--line);
            padding-top: 13px;
        }

        .btn-edit {
            flex: 1;
            text-align: center;
            padding: 9px;
            background: var(--gold-soft);
            color: var(--navy-deep);
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        .btn-delete {
            flex: 1;
            padding: 9px;
            background: #FBE8E5;
            color: #963C32;
            border: none;
            border-radius: 6px;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }

        .empty-state {
            background: var(--white);
            border: 1px dashed var(--line);
            border-radius: 12px;
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 21px;
            margin-bottom: 9px;
        }

        .empty-state p {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .footer {
            color: var(--ink-soft);
            font-size: 11px;
            text-align: center;
            padding: 25px 10px;
        }

        @media (max-width: 1100px) {
            .portfolio-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

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

            .profile-name {
                display: none;
            }
        }

        @media (max-width: 520px) {
            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .portfolio-grid {
                grid-template-columns: 1fr;
            }

            .btn-primary {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    @php
        $user = auth()->user();
    @endphp

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            Boost<span>CV</span>
        </div>

        <p class="menu-title">OVERVIEW</p>

        <nav class="menu">
            <a href="{{ route('creator.dashboard') }}">
                <span class="menu-icon">⌂</span>
                Dashboard
            </a>
        </nav>

        <p class="menu-title">PENGELOLAAN CREATOR</p>

        <nav class="menu">
            <a href="{{ route('creator.profile') }}">
                <span class="menu-icon">♙</span>
                Profil Saya
            </a>

            <a href="{{ route('creator.services.index') }}">
                <span class="menu-icon">▣</span>
                Layanan Saya
            </a>

            <a href="{{ route('creator.portofolio.index') }}" class="active">
                <span class="menu-icon">▤</span>
                Portofolio
            </a>
        </nav>

        <p class="menu-title">AKTIVITAS</p>

        <nav class="menu">
            <a href="{{ route('creator.orders.index') }}">
                <span class="menu-icon">▧</span>
                Pesanan Masuk
            </a>

            <a href="{{ route('creator.reviews.index') }}">
                <span class="menu-icon">☆</span>
                Ulasan Customer
            </a>

            <a href="{{ route('creator.notifications.index') }}">
                <span class="menu-icon">♧</span>
                Notifikasi
            </a>
        </nav>

        <p class="menu-title">KEUANGAN</p>

        <nav class="menu">
            <a href="{{ route('creator.earnings.index') }}">
                <span class="menu-icon">Rp</span>
                Pendapatan
            </a>

            <a href="{{ route('creator.payouts.index') }}">
                <span class="menu-icon">⇧</span>
                Pencairan Dana
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

    <!-- MAIN CONTENT -->
    <main class="main">

        <header class="topbar">
            <div>
                <h2>Portofolio Saya</h2>
                <p>Kelola dan tampilkan hasil pekerjaan terbaikmu.</p>
            </div>

            <div class="profile-wrap">
                <div class="profile">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="profile-name">
                    {{ $user->name }}
                    <span class="profile-label">Creator BoostCV</span>
                </div>
            </div>
        </header>

        <div class="page-heading">
            <div>
                <h1>Portofolio Saya</h1>
                <p>
                    Tampilkan hasil pekerjaan untuk membantu Customer
                    mengenal kualitas layananmu.
                </p>
            </div>

            <a href="{{ route('creator.portofolio.create') }}" class="btn-primary">
                + Tambah Portofolio
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(isset($portfolios) && $portfolios->count() > 0)

            <div class="portfolio-grid">

                @foreach($portfolios as $portfolio)

                    <article class="portfolio-card">

                        @if(!empty($portfolio->image))
                            <img
                                src="{{ asset('storage/' . $portfolio->image) }}"
                                alt="{{ $portfolio->title }}"
                                class="portfolio-image"
                            >
                        @else
                            <div class="image-placeholder">
                                ▤
                            </div>
                        @endif

                        <div class="portfolio-content">

                            <h3>{{ $portfolio->title }}</h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit($portfolio->description, 110) }}
                            </p>

                            <div class="portfolio-date">
                                Ditambahkan:
                                {{ $portfolio->created_at->format('d M Y') }}
                            </div>

                            <div class="card-actions">

                                <a
                                    href="{{ route('creator.portofolio.edit', $portfolio->id) }}"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('creator.portofolio.destroy', $portfolio->id) }}"
                                    method="POST"
                                    style="flex: 1;"
                                    onsubmit="return confirm('Yakin ingin menghapus portofolio ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-delete" style="width: 100%;">
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

            @if(method_exists($portfolios, 'links'))
                <div style="margin-top: 25px;">
                    {{ $portfolios->links() }}
                </div>
            @endif

        @else

            <div class="empty-state">
                <div class="empty-icon">▤</div>

                <h3>Belum Ada Portofolio</h3>

                <p>
                    Kamu belum menambahkan portofolio.
                    Mulai tampilkan hasil pekerjaanmu agar Customer
                    bisa melihat contoh karya yang pernah kamu buat.
                </p>

                <a href="{{ route('creator.portofolio.create') }}" class="btn-primary">
                    + Tambah Portofolio Pertama
                </a>
            </div>

        @endif

        <div class="footer">
            © {{ date('Y') }} BoostCV. All rights reserved.
        </div>

    </main>

</body>
</html>