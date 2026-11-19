
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail Pesanan - BoostCV</title>

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

        .detail-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
        }

        .detail-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 24px;
        }

        .card-title {
            font-family: 'Fraunces', serif;
            font-size: 19px;
            color: var(--navy-deep);
            margin-bottom: 20px;
        }

        .detail-row {
            padding: 13px 0;
            border-bottom: 1px solid var(--line);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: var(--ink-soft);
            font-size: 11px;
            margin-bottom: 7px;
        }

        .detail-value {
            color: var(--ink);
            font-size: 13px;
            font-weight: 600;
            line-height: 1.7;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
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

        .description {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .status-form {
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid var(--line);
        }

        .status-form label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: var(--paper);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--gold);
            background: white;
        }

        .form-hint {
            font-size: 10px;
            color: var(--ink-soft);
            line-height: 1.7;
            margin-top: 9px;
        }

        .btn-primary {
            display: inline-block;
            width: 100%;
            margin-top: 15px;
            background: var(--navy);
            color: white;
            padding: 12px 18px;
            border-radius: 7px;
            border: none;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
        }

        .btn-secondary {
            display: inline-block;
            padding: 11px 17px;
            background: white;
            color: var(--ink-soft);
            border: 1px solid var(--line);
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 20px;
        }

        .footer {
            color: var(--ink-soft);
            font-size: 11px;
            text-align: center;
            padding: 25px 10px;
        }

        @media (max-width: 950px) {
            .detail-grid {
                grid-template-columns: 1fr;
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
            .detail-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    @php
        $user = auth()->user();

        $statusClass = [
            'pending' => 'status-pending',
            'accepted' => 'status-accepted',
            'process' => 'status-process',
            'processing' => 'status-process',
            'completed' => 'status-completed',
            'cancelled' => 'status-cancelled',
        ][$order->status] ?? 'status-pending';
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
                <h2>Detail Pesanan</h2>
                <p>Periksa informasi lengkap pesanan Customer.</p>
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
            <h1>Detail Pesanan #{{ $order->id }}</h1>
            <p>
                Informasi layanan, Customer, dan status pesanan.
            </p>
        </div>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-danger">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="detail-grid">

            <section class="detail-card">

                <h3 class="card-title">Informasi Pesanan</h3>

                <div class="detail-row">
                    <div class="detail-label">Nomor Pesanan</div>
                    <div class="detail-value">#{{ $order->id }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Nama Layanan</div>
                    <div class="detail-value">
                        {{ $order->service->title ?? $order->service->name ?? '-' }}
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Tanggal Pesanan</div>
                    <div class="detail-value">
                        {{ $order->created_at ? $order->created_at->format('d F Y, H:i') : '-' }}
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Harga Pesanan</div>
                    <div class="detail-value">
                        Rp{{ number_format($order->total_price ?? $order->price ?? 0, 0, ',', '.') }}
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Status Pesanan</div>
                    <div class="detail-value">
                        <span class="status {{ $statusClass }}">
                            {{ ucfirst($order->status ?? 'pending') }}
                        </span>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Catatan Customer</div>
                    <div class="description">
                        {{ $order->notes ?? $order->description ?? 'Tidak ada catatan dari Customer.' }}
                    </div>
                </div>

            </section>

            <section class="detail-card">

                <h3 class="card-title">Informasi Customer</h3>

                <div class="detail-row">
                    <div class="detail-label">Nama Customer</div>
                    <div class="detail-value">
                        {{ $order->customer->name ?? 'Customer' }}
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email Customer</div>
                    <div class="detail-value">
                        {{ $order->customer->email ?? '-' }}
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Tanggal Pemesanan</div>
                    <div class="detail-value">
                        {{ $order->created_at ? $order->created_at->format('d M Y') : '-' }}
                    </div>
                </div>

                <div class="status-form">

                    <h3 class="card-title">Perbarui Status</h3>

                    <form
                        action="{{ route('creator.orders.update', $order->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')

                        <label for="status">Status Pesanan</label>

                        <select
                            name="status"
                            id="status"
                            class="form-control"
                            required
                        >
                            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>
                                Menunggu
                            </option>

                            <option value="accepted" {{ old('status', $order->status) == 'accepted' ? 'selected' : '' }}>
                                Diterima
                            </option>

                            <option value="processing" {{ old('status', $order->status) == 'processing' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>
                                Dibatalkan
                            </option>
                        </select>

                        <p class="form-hint">
                            Pilih status sesuai perkembangan pengerjaan pesanan.
                            Perubahan akan disimpan setelah tombol ditekan.
                        </p>

                        <button type="submit" class="btn-primary">
                            Simpan Status
                        </button>

                    </form>

                </div>

            </section>

        </div>

        <a href="{{ route('creator.orders.index') }}" class="btn-secondary">
            ← Kembali ke Pesanan
        </a>

        <div class="footer">
            © {{ date('Y') }} BoostCV. All rights reserved.
        </div>

    </main>

</body>
</html>
