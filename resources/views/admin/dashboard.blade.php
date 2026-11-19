<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BoostCV</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #223A66;
            --navy-dark: #192D50;
            --gold: #C98A2C;
            --gold-light: #F8EBD5;
            --background: #F7F8FC;
            --text: #1C2434;
            --muted: #788196;
            --border: #EAEDF3;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 28px 18px;
            background: var(--navy);
            color: white;
            overflow-y: auto;
            z-index: 1000;
        }

        .brand {
            font-family: 'Fraunces', serif;
            font-size: 29px;
            font-weight: 700;
            padding: 0 10px;
            margin-bottom: 38px;
        }

        .menu-label {
            color: #AAB9D3;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            padding: 0 12px;
            margin: 22px 0 12px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #DCE5F3;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 5px;
            font-size: 13px;
            transition: .2s;
        }

        .sidebar a i {
            font-size: 17px;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.15);
            color: white;
        }

        .sidebar a.active {
            border-left: 3px solid var(--gold);
        }

        .sidebar-bottom {
            margin-top: 35px;
            padding: 15px 10px 0;
            border-top: 1px solid rgba(255,255,255,.15);
        }

        .logout-btn {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(255,255,255,.4);
            border-radius: 9px;
            background: transparent;
            color: white;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,.12);
        }

        .main-content {
            margin-left: 250px;
            padding: 35px 38px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .welcome-label {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 7px;
        }

        .welcome-title {
            font-family: 'Fraunces', serif;
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .welcome-description {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            background: white;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .profile-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--gold-light);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .profile-name {
            font-size: 12px;
            font-weight: 700;
            margin: 0;
        }

        .profile-role {
            color: var(--muted);
            font-size: 10px;
            margin: 3px 0 0;
        }

        .section-heading {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .stat-card {
            position: relative;
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 21px;
            height: 100%;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(34,58,102,.07);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .icon-blue {
            background: #E8EEFA;
            color: #31558F;
        }

        .icon-gold {
            background: #F8EBD5;
            color: #B7791F;
        }

        .icon-green {
            background: #E1F3EA;
            color: #26865A;
        }

        .icon-purple {
            background: #EFE8FA;
            color: #7651A8;
        }

        .icon-red {
            background: #FBE8E8;
            color: #C14C4C;
        }

        .icon-cyan {
            background: #E2F3F7;
            color: #27869A;
        }

        .stat-label {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 7px;
        }

        .stat-value {
            color: var(--navy);
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        .section-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 24px;
            height: 100%;
        }

        .quick-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 15px;
            border: 1px solid var(--border);
            border-radius: 11px;
            text-decoration: none;
            color: var(--text);
            margin-bottom: 10px;
            transition: .2s;
        }

        .quick-link:hover {
            border-color: var(--gold);
            background: #FFFCF6;
            color: var(--navy);
        }

        .quick-link-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .quick-link-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #F1F3F8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy);
            font-size: 17px;
        }

        .quick-link-title {
            font-size: 12px;
            font-weight: 700;
            margin: 0;
        }

        .quick-link-description {
            font-size: 10px;
            color: var(--muted);
            margin: 4px 0 0;
        }

        .btn-gold {
            background: var(--gold);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 10px 16px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-gold:hover {
            background: #AD7220;
            color: white;
        }

        .welcome-banner {
            background: linear-gradient(115deg, #223A66, #36598E);
            border-radius: 16px;
            padding: 25px 28px;
            color: white;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner h3 {
            font-family: 'Fraunces', serif;
            font-size: 23px;
            margin-bottom: 8px;
        }

        .welcome-banner p {
            color: #DCE5F3;
            font-size: 12px;
            margin: 0;
        }

        .banner-decoration {
            position: absolute;
            right: 35px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 75px;
            opacity: .13;
        }

        .footer-text {
            color: #9AA3B2;
            font-size: 11px;
            text-align: center;
            margin-top: 35px;
        }

        @media (max-width: 991px) {
            .sidebar {
                width: 210px;
            }

            .main-content {
                margin-left: 210px;
                padding: 28px 22px;
            }
        }

        @media (max-width: 767px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                padding: 18px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .menu-label {
                margin-top: 15px;
            }

            .sidebar-bottom {
                margin-top: 15px;
            }

            .main-content {
                margin-left: 0;
                padding: 24px 15px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .welcome-title {
                font-size: 28px;
            }

            .banner-decoration {
                right: 15px;
                font-size: 55px;
            }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="brand">BoostCV.</div>

    <div class="menu-label">MENU UTAMA</div>

    <a href="{{ route('admin') }}" class="active">
        <i class="bi bi-grid-1x2-fill"></i>
        Dashboard
    </a>

    <a href="{{ route('admin.orders.index') }}">
        <i class="bi bi-receipt"></i>
        Kelola Pesanan
    </a>

    <a href="{{ route('admin.payments.index') }}">
        <i class="bi bi-credit-card"></i>
        Kelola Pembayaran
    </a>

    <div class="menu-label">MANAJEMEN</div>

    <a href="{{ route('admin.users.index') }}">
        <i class="bi bi-people"></i>
        Kelola Pengguna
    </a>

    <a href="{{ route('admin.services.index') }}">
        <i class="bi bi-briefcase"></i>
        Kelola Layanan
    </a>

    <a href="{{ route('admin.categories.index') }}">
        <i class="bi bi-tags"></i>
        Kelola Kategori
    </a>

    <a href="{{ route('admin.cancellations.index') }}">
        <i class="bi bi-x-circle"></i>
        Pembatalan
    </a>

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

<main class="main-content">

    <div class="topbar">
        <div>
            <p class="welcome-label">Panel Administrator</p>
            <h1 class="welcome-title">Dashboard Admin</h1>
            <p class="welcome-description">Selamat datang di pusat pengelolaan BoostCV.</p>
        </div>

        <div class="admin-profile">
            <div class="profile-icon">
                <i class="bi bi-person-fill"></i>
            </div>
            <div>
                <p class="profile-name">{{ auth()->user()->name ?? 'Administrator' }}</p>
                <p class="profile-role">Administrator</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="welcome-banner">
        <h3>Selamat Datang di BoostCV!</h3>
        <p>Kelola pengguna, layanan, pesanan, dan transaksi melalui satu dashboard.</p>
        <i class="bi bi-bar-chart-line-fill banner-decoration"></i>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="section-heading mb-0">Ringkasan Platform</h5>
        <span class="text-muted small">Statistik keseluruhan</span>
    </div>

    <div class="row g-3 mb-4">

        <div class="col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-blue">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div class="stat-label">Total Pengguna</div>
                <h3 class="stat-value">{{ \App\User::count() }}</h3>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-purple">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                </div>
                <div class="stat-label">Total Creator</div>
                <h3 class="stat-value">{{ \App\Creator::count() }}</h3>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-gold">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                </div>
                <div class="stat-label">Total Layanan</div>
                <h3 class="stat-value">{{ \App\Service::count() }}</h3>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-cyan">
                        <i class="bi bi-receipt"></i>
                    </div>
                </div>
                <div class="stat-label">Total Pesanan</div>
                <h3 class="stat-value">{{ \App\Order::count() }}</h3>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-red">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                </div>
                <div class="stat-label">Menunggu Verifikasi</div>
                <h3 class="stat-value">{{ \App\Payment::where('status', 'pending_verification')->count() }}</h3>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-green">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                </div>
                <div class="stat-label">Pembayaran Terverifikasi</div>
                <h3 class="stat-value">{{ \App\Payment::where('status', 'verified')->count() }}</h3>
            </div>
        </div>

    </div>

    <div class="row g-3">

        <div class="col-lg-7">
            <div class="section-card">
                <h5 class="section-heading">Akses Cepat</h5>

                <a href="{{ route('admin.orders.index') }}" class="quick-link">
                    <div class="quick-link-left">
                        <div class="quick-link-icon">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div>
                            <p class="quick-link-title">Kelola Pesanan</p>
                            <p class="quick-link-description">Pantau seluruh pesanan Customer</p>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a href="{{ route('admin.payments.index') }}" class="quick-link">
                    <div class="quick-link-left">
                        <div class="quick-link-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <div>
                            <p class="quick-link-title">Kelola Pembayaran</p>
                            <p class="quick-link-description">Periksa dan verifikasi pembayaran</p>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a href="{{ route('admin.users.index') }}" class="quick-link">
                    <div class="quick-link-left">
                        <div class="quick-link-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <p class="quick-link-title">Kelola Pengguna</p>
                            <p class="quick-link-description">Lihat dan atur akun pengguna</p>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a href="{{ route('admin.services.index') }}" class="quick-link">
                    <div class="quick-link-left">
                        <div class="quick-link-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div>
                            <p class="quick-link-title">Kelola Layanan</p>
                            <p class="quick-link-description">Periksa dan kelola layanan Creator</p>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="section-card">
                <h5 class="section-heading">Administrasi</h5>
                <p class="text-muted small mb-4">
                    Akses pengaturan dan pengelolaan platform BoostCV.
                </p>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-semibold">Kategori Layanan</span>
                        <i class="bi bi-tags text-muted"></i>
                    </div>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                        Kelola Kategori
                    </a>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-semibold">Permintaan Pembatalan</span>
                        <i class="bi bi-x-circle text-muted"></i>
                    </div>
                    <a href="{{ route('admin.cancellations.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                        Kelola Pembatalan
                    </a>
                </div>

                <div class="pt-3 border-top">
                    <p class="text-muted small mb-2">Butuh memeriksa transaksi?</p>
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-gold w-100">
                        <i class="bi bi-arrow-right-circle me-2"></i>
                        Buka Pembayaran
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="footer-text">
        © {{ date('Y') }} BoostCV. Admin Dashboard.
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>