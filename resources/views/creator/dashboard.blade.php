<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Creator | BoostCV</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,0..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
        }

        h1, h2, h3, h4 {
            font-family: 'Fraunces', serif;
            color: var(--ink);
        }

        a {
            color: var(--navy);
            text-decoration: none;
        }

        /* Layout utama */
        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            padding: 30px 20px;
            background: var(--navy-deep);
            flex-shrink: 0;
        }

        .sidebar-brand {
            margin-bottom: 45px;
            font-family: 'Fraunces', serif;
            font-size: 25px;
            font-weight: 600;
            color: white;
        }

        .sidebar-brand span {
            color: var(--gold);
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sidebar-menu a {
            padding: 12px 15px;
            border-radius: 8px;
            color: #C9D3E6;
            font-size: 14px;
            transition: 0.2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--navy);
            color: white;
        }

        .sidebar-menu .menu-disabled {
            padding: 12px 15px;
            color: #8998B5;
            font-size: 14px;
        }

        /* Konten utama */
        .main-content {
            flex: 1;
            min-width: 0;
            padding: 40px;
        }

        .dashboard-header {
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            margin: 0 0 8px;
            font-size: 32px;
        }

        .dashboard-header p {
            margin: 0;
            color: var(--ink-soft);
        }

        /* Ringkasan aktivitas */
        .section-title {
            margin-bottom: 0;
            font-size: 24px;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .card {
            padding: 25px;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 10px;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(22, 38, 74, 0.08);
        }

        .card h3 {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: var(--ink-soft);
            font-size: 14px;
            font-weight: 500;
        }

        .card p {
            margin: 12px 0 0;
            font-family: 'Fraunces', serif;
            color: var(--navy);
            font-size: 30px;
            font-weight: 600;
        }

        /* Tabel pesanan */
        .recent-orders {
            margin-top: 35px;
            padding: 25px;
            overflow-x: auto;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 10px;
        }

        .recent-orders h2 {
            margin: 0 0 20px;
            font-size: 23px;
        }

        .orders-table {
            width: 100%;
            min-width: 550px;
            border-collapse: collapse;
        }

        .orders-table th,
        .orders-table td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            font-size: 13px;
        }

        .orders-table th {
            color: var(--ink-soft);
            font-weight: 600;
        }

        .orders-table td {
            color: var(--ink);
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .empty-orders {
            text-align: center !important;
            color: var(--ink-soft) !important;
        }

        /* Tampilan tablet */
        @media (max-width: 768px) {
            .sidebar {
                width: 190px;
                padding: 25px 12px;
            }

            .main-content {
                padding: 25px 15px;
            }
        }

        /* Tampilan HP */
        @media (max-width: 576px) {
            .dashboard-layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .sidebar-brand {
                margin-bottom: 20px;
            }

            .sidebar-menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .main-content {
                padding: 25px 15px;
            }

            .dashboard-header h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard-layout">

        <!-- Sidebar kiri -->
        <aside class="sidebar">

            <div class="sidebar-brand">
                Boost<span>CV</span>
            </div>

            <nav class="sidebar-menu">

                <a href="{{ route('creator.dashboard') }}" class="active">
                    Dashboard
                </a>

                <a href="{{ route('creator.profile') }}">
                    Profil Saya
                </a>

                <a href="{{ route('portfolio.index') }}">
                    Portfolio
                </a>

               <a href="{{ route('creator.services.index') }}">
                    Layanan Saya
                </a>

                <span class="menu-disabled">
                    Pesanan
                </span>

                <a href="{{ route('logout') }}">
                    Keluar
                </a>

            </nav>

        </aside>

        <!-- Konten kanan -->
        <main class="main-content">

            <!-- Header dashboard -->
            <div class="dashboard-header">
                <h1>Dashboard Creator</h1>
                <p>Selamat datang di BoostCV!</p>
            </div>

            <!-- Ringkasan aktivitas -->
            <h2 class="section-title">Ringkasan Aktivitas</h2>

            <div class="dashboard-cards">

                <div class="card">
                    <h3>Total Layanan</h3>
                    <p>{{ $totalServices }}</p>
                </div>

                <div class="card">
                    <h3>Menunggu Persetujuan</h3>
                    <p>{{ $pendingServices }}</p>
                </div>

                <div class="card">
                    <h3>Layanan Disetujui</h3>
                    <p>{{ $approvedServices }}</p>
                </div>

                <div class="card">
                    <h3>Total Portfolio</h3>
                    <p>{{ $totalPortfolios }}</p>
                </div>

                <div class="card">
                    <h3>Total Pesanan</h3>
                    <p>{{ $totalOrders }}</p>
                </div>

            </div>

            <!-- Pesanan terbaru -->
            <div class="recent-orders">

                <h2>Pesanan Terbaru</h2>

                <table class="orders-table">

                    <thead>
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($recentOrders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->service_title }}</td>
                                <td>
                                    Rp {{ number_format($order->price, 0, ',', '.') }}
                                </td>
                                <td>{{ ucfirst($order->status) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-orders">
                                    Belum ada pesanan.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</body>
</html>
