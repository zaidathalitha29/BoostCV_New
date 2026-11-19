
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pesanan Masuk - BoostCV</title>

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

        .alert-success,
        .alert-danger {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .alert-success {
            background: #E7F4E9;
            color: #28623A;
        }

        .alert-danger {
            background: #FBE8E5;
            color: #963C32;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
            margin-bottom: 23px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 11px;
            padding: 19px;
        }

        .stat-card p {
            font-size: 11px;
            color: var(--ink-soft);
            margin-bottom: 10px;
        }

        .stat-card h3 {
            font-family: 'Fraunces', serif;
            font-size: 27px;
            color: var(--navy-deep);
        }

        .table-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 22px;
            overflow-x: auto;
        }

        .table-heading {
            font-family: 'Fraunces', serif;
            font-size: 19px;
            color: var(--navy-deep);
            margin-bottom: 17px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            background: var(--paper);
            color: var(--ink-soft);
            font-size: 11px;
            font-weight: 600;
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid var(--line);
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid var(--line);
            font-size: 12px;
            color: var(--ink);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-number {
            font-weight: 600;
            color: var(--navy);
        }

        .customer-name {
            font-weight: 600;
        }

        .service-name {
            color: var(--ink-soft);
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
            background: #FFF1D8;
            color: #93601D;
        }

        .status-accepted {
            background: #E4EDF9;
            color: #284F83;
        }

        .status-process {
            background: #E9E4F7;
            color: #614B91;
        }

        .status-completed {
            background: #E4F3E8;
            color: #28623A;
        }

        .status-cancelled {
            background: #FBE8E5;
            color: #963C32;
        }

        .btn-detail {
            display: inline-block;
            padding: 8px 12px;
            background: var(--navy);
            color: white;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 600;
        }

        .btn-detail:hover {
            background: var(--navy-deep);
        }

        .empty-state {
            text-align: center;
            padding: 45px 15px;
        }

        .empty-state h3 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 20px;
            margin-bottom: 9px;
        }

        .empty-state p {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.7;
        }

        .footer {
            color: var(--ink-soft);
            font-size: 11px;
            text-align: center;
            padding: 25px 10px;
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
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .table-card {
                padding: 15px;
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
            <a href="{{ route('creator.dashboard') }}">
                <span class="menu-icon">⌂</span> Dashboard
            </a>
        </nav>

        <p class="menu-title">PENGELOLAAN CREATOR</p>

        <nav class="menu">
            <a href="{{ route('creator.profile') }}">
                <span class="menu-icon">♙</span> Profil Saya
            </a>

            <a href="{{ route('creator.services.index') }}">
                <span class="menu-icon">▣</span> Layanan Saya
            </a>

            <a href="{{ route('creator.portofolio.index') }}">
                <span class="menu-icon">▤</span> Portofolio
            </a>
        </nav>

        <p class="menu-title">AKTIVITAS</p>

        <nav class="menu">
            <a href="{{ route('creator.orders.index') }}" class="active">
                <span class="menu-icon">▧</span> Pesanan Masuk
            </a>

            <a href="{{ route('creator.reviews.index') }}">
                <span class="menu-icon">☆</span> Ulasan Customer
            </a>

            <a href="{{ route('creator.notifications.index') }}">
                <span class="menu-icon">♧</span> Notifikasi
            </a>
        </nav>

        <p class="menu-title">KEUANGAN</p>

        <nav class="menu">
            <a href="{{ route('creator.earnings.index') }}">
                <span class="menu-icon">Rp</span> Pendapatan
            </a>

            <a href="{{ route('creator.payouts.index') }}">
                <span class="menu-icon">⇧</span> Pencairan Dana
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
                <h2>Pesanan Masuk</h2>
                <p>Kelola pesanan layanan dari Customer.</p>
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
            <h1>Pesanan Masuk</h1>
            <p>
                Pantau seluruh pesanan dan periksa detail permintaan
                dari Customer.
            </p>
        </div>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-danger">{{ session('error') }}</div>
        @endif

        @php
            $allOrders = $orders ?? collect();

            $totalOrders = $allOrders->count();
            $pendingOrders = $allOrders->where('status', 'pending')->count();
            $completedOrders = $allOrders->where('status', 'completed')->count();
        @endphp

        <div class="stats-grid">

            <div class="stat-card">
                <p>Total Pesanan</p>
                <h3>{{ $totalOrders }}</h3>
            </div>

            <div class="stat-card">
                <p>Menunggu Konfirmasi</p>
                <h3>{{ $pendingOrders }}</h3>
            </div>

            <div class="stat-card">
                <p>Pesanan Selesai</p>
                <h3>{{ $completedOrders }}</h3>
            </div>

        </div>

        <section class="table-card">

            <h3 class="table-heading">Daftar Pesanan Customer</h3>

            @if(isset($orders) && $orders->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Customer</th>
                            <th>Layanan</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($orders as $order)

                            @php
                                $statusClass = [
                                    'pending' => 'status-pending',
                                    'accepted' => 'status-accepted',
                                    'process' => 'status-process',
                                    'processing' => 'status-process',
                                    'completed' => 'status-completed',
                                    'cancelled' => 'status-cancelled',
                                ][$order->status] ?? 'status-pending';
                            @endphp

                            <tr>
                                <td class="order-number">
                                    #{{ $order->id }}
                                </td>

                                <td class="customer-name">
                                    {{ $order->customer->name ?? 'Customer' }}
                                </td>

                                <td class="service-name">
                                    {{ $order->service->title ?? $order->service->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $order->created_at ? $order->created_at->format('d M Y') : '-' }}
                                </td>

                                <td>
                                    Rp{{ number_format($order->total_price ?? $order->price ?? 0, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="status {{ $statusClass }}">
                                        {{ ucfirst($order->status ?? 'pending') }}
                                    </span>
                                </td>

                                <td>
                                    <a
                                        href="{{ route('creator.orders.show', $order->id) }}"
                                        class="btn-detail"
                                    >
                                        Detail
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                @if(method_exists($orders, 'links'))
                    <div style="margin-top: 20px;">
                        {{ $orders->links() }}
                    </div>
                @endif

            @else

                <div class="empty-state">
                    <h3>Belum Ada Pesanan</h3>
                    <p>
                        Saat ini belum ada pesanan dari Customer.
                        Pesanan baru akan ditampilkan di halaman ini.
                    </p>
                </div>

            @endif

        </section>

        <div class="footer">
            © {{ date('Y') }} BoostCV. All rights reserved.
        </div>

    </main>

</body>
</html>
