<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifikasi - BoostCV</title>

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

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--navy-deep);
            color: white;
            padding: 28px 20px;
            position: fixed;
            height: 100vh;
        }

        .brand {
            font-family: 'Fraunces', serif;
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .brand span {
            color: var(--gold);
        }

        .menu-title {
            font-size: 11px;
            color: #AAB4C8;
            margin: 25px 12px 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu a {
            display: block;
            color: #DCE2ED;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 5px;
            border-radius: 8px;
            font-size: 13px;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--navy);
            color: white;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 30px 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .topbar h2 {
            font-family: 'Fraunces', serif;
            font-size: 25px;
        }

        .user-info {
            font-size: 13px;
            color: var(--ink-soft);
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-family: 'Fraunces', serif;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: var(--ink-soft);
            font-size: 14px;
        }

        .notification-list {
            display: grid;
            gap: 14px;
        }

        .notification-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            padding: 22px;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 12px;
            text-decoration: none;
            color: var(--ink);
            transition: .2s;
        }

        .notification-card:hover {
            border-color: var(--gold);
            transform: translateY(-2px);
        }

        .notification-card.unread {
            background: #FFFDF8;
            border-left: 4px solid var(--gold);
        }

        .notification-content h3 {
            font-size: 15px;
            margin-bottom: 7px;
        }

        .notification-content p {
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.6;
        }

        .notification-date {
            color: #8A8F9B;
            font-size: 12px;
            white-space: nowrap;
        }

        .empty-state {
            background: white;
            border: 1px dashed var(--line);
            border-radius: 14px;
            padding: 55px 20px;
            text-align: center;
            color: var(--ink-soft);
        }

        .empty-state h3 {
            font-family: 'Fraunces', serif;
            color: var(--ink);
            margin-bottom: 10px;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
                padding: 25px 20px;
            }
        }

        @media (max-width: 600px) {
            .layout {
                display: block;
            }

            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 22px 16px;
            }

            .topbar {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }

            .notification-card {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">Boost<span>CV</span></div>

        <div class="menu">
            <div class="menu-title">Menu Utama</div>

            <a href="{{ route('creator.dashboard') }}">Dashboard</a>
            <a href="{{ route('creator.profile') }}">Profil Saya</a>
            <a href="{{ route('creator.services.index') }}">Jasa Saya</a>
            <a href="{{ route('creator.portofolio.index') }}">Portofolio</a>
            <a href="{{ route('creator.orders.index') }}">Pesanan</a>
            <a href="{{ route('creator.reviews.index') }}">Ulasan</a>

            <div class="menu-title">Keuangan</div>

            <a href="{{ route('creator.earnings.index') }}">Pendapatan</a>
            <a href="{{ route('creator.payouts.index') }}">Pencairan Dana</a>

            <div class="menu-title">Lainnya</div>

            <a href="{{ route('creator.notifications.index') }}" class="active">Notifikasi</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="width:100%;text-align:left;background:none;border:none;color:#DCE2ED;padding:12px;font-size:13px;cursor:pointer;">
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <h2>Notifikasi</h2>
            <div class="user-info">
                {{ auth()->user()->name ?? 'Creator' }}
            </div>
        </header>

        <section class="page-heading">
            <h1>Notifikasi Saya</h1>
            <p>Lihat informasi terbaru mengenai pesanan, ulasan, dan aktivitas akunmu.</p>
        </section>

        @if(isset($notifications) && $notifications->count() > 0)

            <div class="notification-list">

                @foreach($notifications as $notification)

                    <a href="{{ route('creator.notifications.show', $notification->id) }}"
                       class="notification-card {{ empty($notification->read_at) ? 'unread' : '' }}">

                        <div class="notification-content">
                            <h3>
                                {{ $notification->title ?? 'Notifikasi Baru' }}
                            </h3>

                            <p>
                                {{ $notification->message ?? $notification->body ?? 'Ada informasi baru untuk akunmu.' }}
                            </p>
                        </div>

                        <div class="notification-date">
                            {{ $notification->created_at ? $notification->created_at->format('d M Y, H:i') : '-' }}
                        </div>

                    </a>

                @endforeach

            </div>

        @else

            <div class="empty-state">
                <h3>Belum Ada Notifikasi</h3>
                <p>Notifikasi terbaru akan muncul di halaman ini.</p>
            </div>

        @endif

    </main>

</div>
</body>
</html>