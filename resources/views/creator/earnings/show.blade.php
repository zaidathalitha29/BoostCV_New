
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pendapatan - BoostCV Creator</title>

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

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
        }

        .layout { display: flex; min-height: 100vh; }

        .sidebar {
            width: 250px;
            background: var(--navy-deep);
            color: white;
            padding: 30px 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .brand {
            font-family: 'Fraunces', serif;
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .brand span { color: var(--gold); }

        .menu-title {
            color: #AAB4C8;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 25px 12px 12px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #DCE2ED;
            padding: 13px 14px;
            border-radius: 9px;
            margin-bottom: 5px;
            font-size: 13px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--gold);
            color: var(--navy-deep);
            font-weight: 700;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 35px 45px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 15px;
        }

        .topbar h1 {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            color: var(--navy-deep);
        }

        .topbar p { color: var(--ink-soft); font-size: 13px; margin-top: 6px; }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--gold-soft);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .back {
            display: inline-block;
            color: var(--navy);
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .back:hover { color: var(--gold); }

        .panel {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 28px;
            max-width: 750px;
        }

        .panel h2 {
            font-family: 'Fraunces', serif;
            font-size: 24px;
            color: var(--navy-deep);
            margin-bottom: 24px;
        }

        .amount-box {
            background: var(--gold-soft);
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .amount-box p { color: var(--ink-soft); font-size: 13px; }

        .amount-box h3 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 32px;
            margin-top: 8px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 16px 0;
            border-bottom: 1px solid var(--line);
            font-size: 13px;
        }

        .detail-row:last-child { border-bottom: none; }

        .detail-row span:first-child { color: var(--ink-soft); }

        .detail-row strong {
            color: var(--navy-deep);
            text-align: right;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            background: var(--gold-soft);
            color: #805318;
        }

        .status.paid {
            background: #E2F2E7;
            color: #287044;
        }

        @media(max-width: 900px) {
            .sidebar { width: 210px; }
            .main { margin-left: 210px; width: calc(100% - 210px); padding: 25px; }
        }

        @media(max-width: 650px) {
            .layout { display: block; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .main { margin-left: 0; width: 100%; padding: 22px 15px; }
            .topbar { align-items: flex-start; flex-direction: column; }
            .detail-row { flex-direction: column; gap: 7px; }
            .detail-row strong { text-align: left; }
        }
    </style>
</head>
<body>

<div class="layout">
    <aside class="sidebar">
        <div class="brand">Boost<span>CV</span></div>

        <div class="menu">
            <div class="menu-title">Menu Creator</div>
            <a href="{{ route('creator.dashboard') }}">Dashboard</a>
            <a href="{{ route('creator.profile') }}">Profil Saya</a>
            <a href="{{ route('creator.services.index') }}">Kelola Jasa</a>
            <a href="{{ route('creator.portofolio.index') }}">Portofolio</a>
            <a href="{{ route('creator.orders.index') }}">Pesanan</a>
            <a href="{{ route('creator.reviews.index') }}">Ulasan</a>
            <a href="{{ route('creator.notifications.index') }}">Notifikasi</a>

            <div class="menu-title">Keuangan</div>
            <a href="{{ route('creator.earnings.index') }}" class="active">Pendapatan</a>
            <a href="{{ route('creator.payouts.index') }}">Pencairan Dana</a>

            <div class="menu-title">Akun</div>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Keluar
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </aside>

    <main class="main">
        <div class="topbar">
            <div>
                <h1>Detail Pendapatan</h1>
                <p>Informasi lengkap transaksi pendapatan kamu.</p>
            </div>

            <div class="profile">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'Creator' }}</span>
            </div>
        </div>

        <a href="{{ route('creator.earnings.index') }}" class="back">
            &larr; Kembali ke Pendapatan
        </a>

        <section class="panel">
            <h2>Informasi Transaksi</h2>

            <div class="amount-box">
                <p>Jumlah Pendapatan</p>
                <h3>Rp{{ number_format($earning->amount ?? 0, 0, ',', '.') }}</h3>
            </div>

            <div class="detail-row">
                <span>ID Pendapatan</span>
                <strong>#{{ $earning->id }}</strong>
            </div>

            <div class="detail-row">
                <span>Nama Layanan</span>
                <strong>
                    {{ $earning->order->service->title ?? $earning->order->service->name ?? 'Tidak tersedia' }}
                </strong>
            </div>

            <div class="detail-row">
                <span>ID Pesanan</span>
                <strong>{{ $earning->order_id ?? '-' }}</strong>
            </div>

            <div class="detail-row">
                <span>Tanggal Transaksi</span>
                <strong>
                    {{ $earning->created_at ? $earning->created_at->format('d M Y, H:i') : '-' }}
                </strong>
            </div>

            <div class="detail-row">
                <span>Status</span>
                <strong>
                    <span class="status {{ strtolower($earning->status ?? '') == 'paid' ? 'paid' : '' }}">
                        {{ ucfirst($earning->status ?? 'Menunggu') }}
                    </span>
                </strong>
            </div>

            <div class="detail-row">
                <span>Catatan</span>
                <strong>{{ $earning->notes ?? '-' }}</strong>
            </div>
        </section>
    </main>
</div>

</body>
</html>
