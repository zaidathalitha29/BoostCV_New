
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail Portofolio - BoostCV</title>

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

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: var(--navy-deep);
            padding: 28px 20px;
            color: white;
            overflow-y: auto;
        }

        .brand {
            font-family: 'Fraunces', serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 42px;
        }

        .brand span {
            color: var(--gold);
        }

        .menu-title {
            color: #AAB5CB;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 25px 12px 12px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 6px;
            color: #DCE2EF;
            text-decoration: none;
            font-size: 13px;
            border-radius: 8px;
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

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 82px;
            background: white;
            border-bottom: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 32px;
        }

        .topbar h2 {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .notification {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--line);
            border-radius: 50%;
            color: var(--navy);
            text-decoration: none;
            font-size: 17px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            background: var(--gold-soft);
            color: var(--navy-deep);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-info strong {
            display: block;
            font-size: 13px;
        }

        .user-info small {
            color: var(--ink-soft);
            font-size: 11px;
        }

        .content {
            padding: 30px;
            max-width: 1200px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            margin-bottom: 7px;
        }

        .page-heading p {
            font-size: 13px;
            color: var(--ink-soft);
        }

        .card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 25px;
        }

        .portfolio-image {
            width: 100%;
            max-height: 430px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .no-image {
            width: 100%;
            height: 260px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #F0EEE8;
            color: var(--ink-soft);
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .portfolio-title {
            font-family: 'Fraunces', serif;
            font-size: 26px;
            margin-bottom: 14px;
        }

        .description {
            color: var(--ink-soft);
            font-size: 14px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .meta {
            border-top: 1px solid var(--line);
            margin-top: 25px;
            padding-top: 18px;
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .meta-item small {
            display: block;
            color: var(--ink-soft);
            font-size: 11px;
            margin-bottom: 5px;
        }

        .meta-item strong {
            font-size: 13px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 19px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
        }

        .btn-secondary {
            background: #F0EEE8;
            color: var(--ink);
        }

        .btn-danger {
            background: #FCE8E6;
            color: #B42318;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .content {
                padding: 22px;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .menu {
                display: flex;
                overflow-x: auto;
                gap: 5px;
            }

            .menu a {
                white-space: nowrap;
            }

            .menu-title {
                display: none;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 20px 15px;
            }

            .user-info {
                display: none;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">Boost<span>CV</span></div>

    <nav class="menu">

        <p class="menu-title">Menu Utama</p>

        <a href="{{ route('creator.dashboard') }}">Dashboard</a>
        <a href="{{ route('creator.profile') }}">Profil Saya</a>
        <a href="{{ route('creator.services.index') }}">Layanan Saya</a>
        <a href="{{ route('creator.portofolio.index') }}" class="active">Portofolio</a>

        <p class="menu-title">Aktivitas</p>

        <a href="{{ route('creator.orders.index') }}">Pesanan</a>
        <a href="{{ route('creator.reviews.index') }}">Ulasan</a>
        <a href="{{ route('creator.notifications.index') }}">Notifikasi</a>

        <p class="menu-title">Keuangan</p>

        <a href="{{ route('creator.earnings.index') }}">Pendapatan</a>
        <a href="{{ route('creator.payouts.index') }}">Pencairan Dana</a>

        <p class="menu-title">Akun</p>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Keluar
        </a>

    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

</aside>

<main class="main">

    <header class="topbar">

        <h2>Detail Portofolio</h2>

        <div class="topbar-right">

            <a href="{{ route('creator.notifications.index') }}" class="notification">
                ♧
            </a>

            <div class="user-profile">
                <div class="avatar">C</div>

                <div class="user-info">
                    <strong>Creator</strong>
                    <small>Creator Account</small>
                </div>
            </div>

        </div>

    </header>

    <section class="content">

        <div class="page-heading">
            <div>
                <h1>Detail Portofolio</h1>
                <p>Lihat informasi lengkap hasil karya yang telah kamu tambahkan.</p>
            </div>

            <a href="{{ route('creator.portofolio.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <div class="card">

            @if ($portofolio->image)
                <img
                    src="{{ asset('storage/' . $portofolio->image) }}"
                    alt="{{ $portofolio->title }}"
                    class="portfolio-image"
                >
            @else
                <div class="no-image">
                    Belum ada gambar portofolio
                </div>
            @endif

            <h2 class="portfolio-title">
                {{ $portofolio->title }}
            </h2>

            <div class="description">
                {{ $portofolio->description ?: 'Belum ada deskripsi portofolio.' }}
            </div>

            <div class="meta">

                <div class="meta-item">
                    <small>Tanggal Dibuat</small>
                    <strong>
                        {{ $portofolio->created_at ? $portofolio->created_at->format('d M Y') : '-' }}
                    </strong>
                </div>

                <div class="meta-item">
                    <small>Terakhir Diperbarui</small>
                    <strong>
                        {{ $portofolio->updated_at ? $portofolio->updated_at->format('d M Y') : '-' }}
                    </strong>
                </div>

            </div>

            <div class="actions">

                <a href="{{ route('creator.portofolio.edit', $portofolio->id) }}"
                   class="btn btn-primary">
                    Edit Portofolio
                </a>

                <form
                    action="{{ route('creator.portofolio.destroy', $portofolio->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus portofolio ini?')"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Hapus Portofolio
                    </button>
                </form>

                <a href="{{ route('creator.portofolio.index') }}"
                   class="btn btn-secondary">
                    Kembali ke Daftar
                </a>

            </div>

        </div>

    </section>

</main>

</body>
</html>
