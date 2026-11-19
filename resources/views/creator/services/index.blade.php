<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Layanan Saya - BoostCV</title>

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

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 14px;
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
            color: var(--ink);
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
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
        }

        .alert-success {
            background: #E5F3E9;
            color: #25643A;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .alert-danger {
            background: #FBE8E5;
            color: #963C32;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 23px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 19px;
        }

        .stat-card p {
            color: var(--ink-soft);
            font-size: 11px;
            margin-bottom: 10px;
        }

        .stat-card h3 {
            color: var(--navy);
            font-family: 'Fraunces', serif;
            font-size: 27px;
        }

        .table-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
        }

        .table-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--line);
        }

        .table-header h3 {
            font-family: 'Fraunces', serif;
            font-size: 18px;
            color: var(--navy-deep);
            margin-bottom: 5px;
        }

        .table-header p {
            color: var(--ink-soft);
            font-size: 11px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #F6F4EF;
            color: var(--ink-soft);
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            padding: 15px;
            white-space: nowrap;
        }

        td {
            padding: 15px;
            border-top: 1px solid var(--line);
            font-size: 11px;
            color: var(--ink);
            vertical-align: middle;
        }

        .service-name {
            font-weight: 600;
            color: var(--navy);
            font-size: 12px;
        }

        .category-text {
            color: var(--ink-soft);
        }

        .price {
            font-weight: 700;
            color: var(--navy);
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-pending {
            background: #FFF0D7;
            color: #95620F;
        }

        .status-active {
            background: #E5F3E9;
            color: #25643A;
        }

        .status-rejected {
            background: #FBE8E5;
            color: #963C32;
        }

        .status-inactive {
            background: #EAECEF;
            color: #566070;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-action {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 5px;
            font-size: 10px;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: var(--gold-soft);
            color: #805817;
        }

        .btn-delete {
            background: #FBE8E5;
            color: #963C32;
        }

        .empty-state {
            text-align: center;
            padding: 45px 20px;
        }

        .empty-state .empty-icon {
            font-size: 38px;
            margin-bottom: 13px;
        }

        .empty-state h3 {
            font-family: 'Fraunces', serif;
            color: var(--navy);
            font-size: 20px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: var(--ink-soft);
            font-size: 12px;
            margin-bottom: 20px;
        }

        .footer {
            color: var(--ink-soft);
            font-size: 11px;
            text-align: center;
            padding: 20px 10px;
        }

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .stats-grid {
                grid-template-columns: 1fr;
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

            <a href="{{ route('creator.services.index') }}" class="active">
                <span class="menu-icon">▣</span>
                Layanan Saya
            </a>

            <a href="{{ route('creator.portofolio.index') }}">
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

            <a href="#">
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
            <a href="#">
                <span class="menu-icon">Rp</span>
                Pendapatan
            </a>

            <a href="#">
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
                <h2>Layanan Saya</h2>
                <p>Kelola layanan CV yang kamu tawarkan.</p>
            </div>

            <div class="topbar-actions">
                <div class="profile-wrap">
                    <div class="profile">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <div class="profile-name">
                        {{ $user->name }}
                        <span class="profile-label">Creator BoostCV</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-heading">
            <div>
                <h1>Layanan Saya</h1>
                <p>
                    Tambahkan dan kelola layanan pembuatan CV yang kamu tawarkan
                    kepada Customer.
                </p>
            </div>

            <a href="{{ route('creator.services.create') }}" class="btn-primary">
                + Tambah Layanan
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

        <!-- STATISTIK -->
        <div class="stats-grid">

            <div class="stat-card">
                <p>Total Layanan</p>
                <h3>{{ $services->count() }}</h3>
            </div>

            <div class="stat-card">
                <p>Layanan Aktif</p>
                <h3>
                    {{ $services->where('status', 'active')->count() }}
                </h3>
            </div>

            <div class="stat-card">
                <p>Menunggu Persetujuan</p>
                <h3>
                    {{ $services->where('status', 'pending')->count() }}
                </h3>
            </div>

        </div>

        <!-- TABEL LAYANAN -->
        <section class="table-card">

            <div class="table-header">
                <h3>Daftar Layanan</h3>
                <p>Semua layanan yang telah kamu tambahkan.</p>
            </div>

            @if($services->count() > 0)

                <div class="table-responsive">

                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($services as $index => $service)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>
                                        <div class="service-name">
                                            {{ $service->title ?? $service->name }}
                                        </div>
                                    </td>

                                    <td class="category-text">
                                        {{ $service->category->name ?? '-' }}
                                    </td>

                                    <td class="price">
                                        Rp{{ number_format($service->price, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        @if($service->status === 'active')
                                            <span class="status status-active">
                                                Aktif
                                            </span>
                                        @elseif($service->status === 'pending')
                                            <span class="status status-pending">
                                                Menunggu
                                            </span>
                                        @elseif($service->status === 'rejected')
                                            <span class="status status-rejected">
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="status status-inactive">
                                                {{ ucfirst($service->status ?? 'Tidak aktif') }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="action-group">

                                            <a
                                                href="{{ route('creator.services.edit', $service->id) }}"
                                                class="btn-action btn-edit">
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('creator.services.destroy', $service->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn-action btn-delete">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            @else

                <div class="empty-state">
                    <div class="empty-icon">▣</div>

                    <h3>Belum Ada Layanan</h3>

                    <p>
                        Kamu belum memiliki layanan. Mulai tambahkan layanan
                        pertamamu sekarang.
                    </p>

                    <a href="{{ route('creator.services.create') }}"
                       class="btn-primary">
                        + Tambah Layanan
                    </a>
                </div>

            @endif

        </section>

        <div class="footer">
            © {{ date('Y') }} BoostCV. All rights reserved.
        </div>

    </main>

</body>
</html>