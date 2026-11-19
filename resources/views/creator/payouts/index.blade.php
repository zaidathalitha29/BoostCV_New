
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencairan Dana - BoostCV Creator</title>

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
            gap: 15px;
            margin-bottom: 35px;
        }

        .topbar h1 {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            color: var(--navy-deep);
        }

        .topbar p {
            color: var(--ink-soft);
            font-size: 13px;
            margin-top: 6px;
        }

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

        .balance-card {
            background: var(--navy-deep);
            color: white;
            border-radius: 15px;
            padding: 28px;
            margin-bottom: 28px;
        }

        .balance-card p {
            color: #DCE2ED;
            font-size: 13px;
        }

        .balance-card h2 {
            font-family: 'Fraunces', serif;
            font-size: 32px;
            margin: 12px 0 22px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            background: var(--gold);
            color: var(--navy-deep);
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .btn:hover { background: #D99B42; }

        .panel {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 24px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
        }

        .panel-header h2 {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            color: var(--navy-deep);
        }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            text-align: left;
            padding: 15px 12px;
            border-bottom: 1px solid var(--line);
            font-size: 13px;
        }

        th { color: var(--ink-soft); font-weight: 600; }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            background: var(--gold-soft);
            color: #805318;
        }

        .status.completed {
            background: #E2F2E7;
            color: #287044;
        }

        .status.rejected {
            background: #FBE5E5;
            color: #A83232;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: var(--ink-soft);
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #E2F2E7;
            color: #287044;
        }

        .alert-error {
            background: #FBE5E5;
            color: #A83232;
        }

        @media(max-width: 900px) {
            .sidebar { width: 210px; }
            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 25px;
            }
        }

        @media(max-width: 650px) {
            .layout { display: block; }
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main {
                margin-left: 0;
                width: 100%;
                padding: 22px 15px;
            }
            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
            .balance-card h2 { font-size: 26px; }
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
            <a href="{{ route('creator.earnings.index') }}">Pendapatan</a>
            <a href="{{ route('creator.payouts.index') }}" class="active">Pencairan Dana</a>

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
                <h1>Pencairan Dana</h1>
                <p>Kelola dan pantau pengajuan pencairan pendapatanmu.</p>
            </div>

            <div class="profile">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'Creator' }}</span>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <section class="balance-card">
            <p>Saldo Tersedia untuk Dicairkan</p>
            <h2>Rp{{ number_format($availableBalance ?? 0, 0, ',', '.') }}</h2>
            <a href="{{ route('creator.payouts.create') }}" class="btn">
                Ajukan Pencairan
            </a>
        </section>

        <section class="panel">
            <div class="panel-header">
                <h2>Riwayat Pencairan</h2>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jumlah</th>
                            <th>Metode</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($payouts ?? [] as $payout)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $payout->created_at ? $payout->created_at->format('d M Y') : '-' }}
                                </td>
                                <td>
                                    Rp{{ number_format($payout->amount ?? 0, 0, ',', '.') }}
                                </td>
                                <td>{{ $payout->method ?? $payout->bank_name ?? '-' }}</td>
                                <td>
                                    @php
                                        $status = strtolower($payout->status ?? 'pending');
                                    @endphp

                                    <span class="status {{ $status == 'completed' || $status == 'approved' ? 'completed' : ($status == 'rejected' ? 'rejected' : '') }}">
                                        {{ ucfirst($payout->status ?? 'Pending') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">
                                    Belum ada riwayat pencairan dana.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

</body>
</html>
