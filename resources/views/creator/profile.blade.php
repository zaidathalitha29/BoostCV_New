
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Creator - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            color: inherit;
        }

        button {
            font-family: inherit;
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
            font-size: 31px;
            font-weight: 700;
            color: white;
            padding: 5px 10px 28px;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .logo span {
            color: var(--gold);
        }

        .menu-title {
            color: #AAB7CE;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            margin: 0 0 13px 8px;
        }

        .menu {
            margin-bottom: 27px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #D8DFEC;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            transition: .2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,.08);
            color: white;
        }

        .menu a.active {
            background: linear-gradient(110deg, #D99A37, #C98A2C);
            color: white;
            box-shadow: 0 5px 15px rgba(201,138,44,.2);
        }

        .menu-icon {
            width: 21px;
            text-align: center;
            font-size: 15px;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,.18);
            padding-top: 20px;
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: 1px solid #D98B75;
            color: #F0B5A5;
            padding: 13px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .logout-btn:hover {
            background: #8B3C36;
            color: white;
        }

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 110px;
            padding: 24px 38px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--line);
            background: rgba(251,250,247,.95);
        }

        .topbar h1 {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            color: var(--navy-deep);
            margin-bottom: 5px;
        }

        .topbar p {
            color: var(--ink-soft);
            font-size: 13px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--gold);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Fraunces', serif;
            font-size: 23px;
        }

        .user-name {
            font-family: 'Fraunces', serif;
            font-size: 16px;
            font-weight: 600;
        }

        .user-role {
            display: block;
            margin-top: 3px;
            color: var(--ink-soft);
            font-family: 'Inter', sans-serif;
            font-size: 11px;
        }

        .content {
            padding: 27px 36px 35px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #E5F3E9;
            color: #25643A;
        }

        .alert-danger {
            background: #FBE8E5;
            color: #963C32;
        }

        /* PROFILE HERO */

        .hero-card {
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(28,36,52,.045);
            margin-bottom: 28px;
        }

        .hero-main {
            display: flex;
            align-items: center;
            gap: 30px;
            padding: 30px;
            min-width: 0;
        }

        .photo-wrap {
            position: relative;
            width: 190px;
            height: 190px;
            flex-shrink: 0;
        }

        .profile-photo {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 4px solid var(--gold);
            overflow: hidden;
            background: var(--paper);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy);
            font-family: 'Fraunces', serif;
            font-size: 65px;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-edit {
            position: absolute;
            right: 0;
            bottom: 5px;
            width: 43px;
            height: 43px;
            border: 4px solid white;
            border-radius: 50%;
            background: var(--navy-deep);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .hero-info {
            min-width: 0;
        }

        .hero-info h2 {
            font-family: 'Fraunces', serif;
            font-size: 34px;
            color: var(--navy-deep);
            margin-bottom: 9px;
            overflow-wrap: anywhere;
        }

        .profession-badge {
            display: inline-block;
            background: var(--gold);
            color: white;
            padding: 8px 18px;
            border-radius: 25px;
            font-family: 'Fraunces', serif;
            font-size: 15px;
            margin-bottom: 17px;
        }

        .hero-details {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 25px;
            margin-bottom: 17px;
        }

        .hero-detail {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            color: var(--ink);
        }

        .hero-detail i {
            color: var(--navy);
        }

        .hero-bio {
            color: var(--ink-soft);
            font-size: 14px;
            line-height: 1.8;
            max-width: 550px;
            margin-bottom: 17px;
            overflow-wrap: anywhere;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--ink-soft);
            transition: .2s;
        }

        .social-links a:hover {
            color: var(--gold);
        }

        .social-links i {
            font-size: 19px;
        }

        .social-links .instagram {
            color: #D94683;
        }

        .social-links .linkedin {
            color: #0A66C2;
        }

        /* STATISTICS */

        .hero-stats {
            border-left: 1px solid var(--line);
            margin: 25px 0;
            padding: 0 28px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 25px;
        }

        .edit-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 13px 19px;
            border-radius: 9px;
            background: var(--navy-deep);
            color: white;
            font-family: 'Fraunces', serif;
            font-size: 15px;
            transition: .2s;
            margin-bottom: 3px;
        }

        .edit-button:hover {
            background: var(--navy);
            transform: translateY(-2px);
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 17px;
        }

        .stat-icon {
            width: 38px;
            color: var(--navy);
            font-size: 23px;
            text-align: center;
        }

        .stat-label {
            color: var(--ink-soft);
            font-size: 13px;
            margin-bottom: 4px;
        }

        .stat-value {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 24px;
            font-weight: 700;
        }

        /* TABS */

        .profile-tabs {
            display: flex;
            align-items: center;
            gap: 5px;
            border-bottom: 1px solid var(--line);
            margin-bottom: 29px;
            overflow-x: auto;
        }

        .profile-tabs a {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 22px;
            border-radius: 30px 30px 0 0;
            color: var(--ink-soft);
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: .2s;
        }

        .profile-tabs a:hover {
            color: var(--navy);
            background: #F1EEE8;
        }

        .profile-tabs a.active {
            color: white;
            background: var(--navy-deep);
            box-shadow: 0 3px 0 var(--gold);
        }

        /* SECTION */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-heading h2 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 25px;
            margin-bottom: 5px;
        }

        .section-heading p {
            color: var(--ink-soft);
            font-size: 13px;
        }

        .view-all {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 11px 17px;
            border: 1px solid #C8C9CE;
            border-radius: 25px;
            color: var(--navy);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            transition: .2s;
        }

        .view-all:hover {
            border-color: var(--gold);
            background: var(--gold-soft);
        }

        /* PORTFOLIO PREVIEW */

        .portfolio-panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 13px;
            padding: 28px;
            margin-bottom: 25px;
        }

        .portfolio-empty {
            min-height: 190px;
            border: 1px dashed #D8D2C6;
            border-radius: 11px;
            background: #FDFCF9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 25px;
        }

        .portfolio-empty-icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            background: var(--gold-soft);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 13px;
        }

        .portfolio-empty h3 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 19px;
            margin-bottom: 7px;
        }

        .portfolio-empty p {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.7;
            max-width: 430px;
            margin-bottom: 16px;
        }

        .portfolio-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--navy-deep);
            color: white;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        .portfolio-button:hover {
            background: var(--navy);
        }

        /* PERSONAL INFORMATION */

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            margin-bottom: 27px;
        }

        .detail-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 13px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(28,36,52,.025);
        }

        .detail-card h3 {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Fraunces', serif;
            font-size: 20px;
            color: var(--navy-deep);
            margin-bottom: 23px;
        }

        .detail-card h3 i {
            font-size: 19px;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 135px 15px minmax(0, 1fr);
            gap: 9px;
            margin-bottom: 17px;
            font-size: 13px;
            line-height: 1.7;
        }

        .detail-row:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            color: var(--ink);
            font-weight: 500;
        }

        .detail-separator {
            color: var(--ink-soft);
        }

        .detail-value {
            color: var(--ink-soft);
            overflow-wrap: anywhere;
        }

        .about-text {
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .about-divider {
            border: 0;
            border-top: 1px solid var(--line);
            margin: 20px 0;
        }

        .website-link {
            color: var(--navy);
            font-size: 13px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .footer {
            border-top: 1px solid var(--line);
            color: var(--ink-soft);
            font-size: 11px;
            text-align: center;
            padding: 22px;
        }

        @media (max-width: 1100px) {
            .hero-card {
                grid-template-columns: 1fr;
            }

            .hero-stats {
                border-left: 0;
                border-top: 1px solid var(--line);
                margin: 0;
                padding: 22px 30px;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
            }

            .edit-button {
                grid-column: 1 / -1;
                justify-self: start;
            }
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .content {
                padding: 22px;
            }

            .hero-main {
                gap: 20px;
                padding: 23px;
            }

            .photo-wrap {
                width: 145px;
                height: 145px;
            }

            .hero-info h2 {
                font-size: 27px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 17px;
            }

            .logo {
                padding-bottom: 15px;
                margin-bottom: 15px;
            }

            .menu {
                margin-bottom: 12px;
            }

            .menu a {
                display: inline-flex;
                padding: 9px 10px;
                font-size: 11px;
            }

            .menu-title {
                margin-top: 10px;
            }

            .sidebar-bottom {
                margin-top: 10px;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 18px;
                min-height: 85px;
            }

            .topbar h1 {
                font-size: 23px;
            }

            .topbar-user .user-name,
            .topbar-user .user-role {
                display: none;
            }

            .content {
                padding: 17px;
            }

            .hero-main {
                flex-direction: column;
                align-items: flex-start;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .edit-button {
                width: 100%;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .detail-row {
                grid-template-columns: 110px 10px minmax(0, 1fr);
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
    $displayName = $creator->display_name ?? $user->name;
    $serviceCount = $creator->services()->count();
    $portfolioCount = $creator->portofolios()->count();
    $orderCount = $creator->orders()->count();
@endphp

<aside class="sidebar">

    <div class="logo">Boost<span>CV</span></div>

    <p class="menu-title">OVERVIEW</p>

    <nav class="menu">
        <a href="{{ route('creator.dashboard') }}">
            <span class="menu-icon"><i class="fa-solid fa-house"></i></span>
            Dashboard
        </a>
    </nav>

    <p class="menu-title">PENGELOLAAN CREATOR</p>

    <nav class="menu">
        <a href="{{ route('creator.profile') }}" class="active">
            <span class="menu-icon"><i class="fa-solid fa-user"></i></span>
            Profil Saya
        </a>

        <a href="{{ route('creator.services.index') }}">
            <span class="menu-icon"><i class="fa-solid fa-grip"></i></span>
            Layanan Saya
        </a>

        <a href="{{ route('creator.portofolio.index') }}">
            <span class="menu-icon"><i class="fa-regular fa-image"></i></span>
            Portofolio
        </a>
    </nav>

    <p class="menu-title">AKTIVITAS</p>

    <nav class="menu">
        <a href="{{ route('creator.orders.index') }}">
            <span class="menu-icon"><i class="fa-solid fa-bag-shopping"></i></span>
            Pesanan Masuk
        </a>

        <a href="{{ route('creator.reviews.index') }}">
            <span class="menu-icon"><i class="fa-solid fa-star"></i></span>
            Ulasan Customer
        </a>

        <a href="{{ route('creator.notifications.index') }}">
            <span class="menu-icon"><i class="fa-solid fa-bell"></i></span>
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
            <span class="menu-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></span>
            Pencairan Dana
        </a>
    </nav>

    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                &nbsp; Keluar
            </button>
        </form>
    </div>

</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h1>Profil Creator</h1>
            <p>Kelola informasi profil profesionalmu.</p>
        </div>

        <div class="topbar-user">
            <div class="user-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <div>
                <div class="user-name">{{ $user->name }}</div>
                <span class="user-role">Creator BoostCV</span>
            </div>

            <i class="fa-solid fa-chevron-down" style="font-size:12px;color:var(--ink-soft);"></i>
        </div>
    </header>

    <div class="content">

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- PROFILE HERO -->
        <section class="hero-card">

            <div class="hero-main">

                <div class="photo-wrap">
                    <div class="profile-photo">
                        @if($creator->photo)
                            <img src="{{ asset('storage/' . $creator->photo) }}"
                                 alt="Foto {{ $displayName }}">
                        @else
                            {{ strtoupper(substr($displayName, 0, 1)) }}
                        @endif
                    </div>

                    <a href="{{ route('creator.edit') }}"
                       class="photo-edit"
                       title="Edit foto profil">
                        <i class="fa-solid fa-camera"></i>
                    </a>
                </div>

                <div class="hero-info">
                    <h2>{{ $displayName }}</h2>

                    <span class="profession-badge">
                        {{ $creator->profession ?: 'Creator BoostCV' }}
                    </span>

                    <div class="hero-details">
                        @if($creator->location)
                            <div class="hero-detail">
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $creator->location }}
                            </div>
                        @endif

                        @if($creator->phone)
                            <div class="hero-detail">
                                <i class="fa-solid fa-phone"></i>
                                {{ $creator->phone }}
                            </div>
                        @endif
                    </div>

                    <p class="hero-bio">
                        {{ $creator->bio ?: 'Belum ada deskripsi profil. Tambahkan informasi tentang dirimu agar Customer lebih mengenal layanan profesionalmu.' }}
                    </p>

                    <div class="social-links">
                        @if($creator->instagram)
                            <a href="{{ \Illuminate\Support\Str::startsWith($creator->instagram, ['http://', 'https://']) ? $creator->instagram : 'https://instagram.com/' . ltrim($creator->instagram, '@') }}"
                               target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-instagram instagram"></i>
                                Instagram
                            </a>
                        @endif

                        @if($creator->linkedin)
                            <a href="{{ \Illuminate\Support\Str::startsWith($creator->linkedin, ['http://', 'https://']) ? $creator->linkedin : 'https://linkedin.com/in/' . $creator->linkedin }}"
                               target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-linkedin linkedin"></i>
                                LinkedIn
                            </a>
                        @endif
                    </div>
                </div>

            </div>

            <div class="hero-stats">

                <a href="{{ route('creator.edit') }}" class="edit-button">
                    <i class="fa-solid fa-pen"></i>
                    Edit Profil
                </a>

                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Layanan</div>
                        <div class="stat-value">{{ $serviceCount }}</div>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fa-solid fa-folder"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Portofolio</div>
                        <div class="stat-value">{{ $portfolioCount }}</div>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Pesanan</div>
                        <div class="stat-value">{{ $orderCount }}</div>
                    </div>
                </div>

            </div>

        </section>

        <!-- PROFILE TABS -->
        <nav class="profile-tabs">
            <a href="{{ route('creator.portofolio.index') }}" class="active">
                <i class="fa-regular fa-image"></i>
                Portofolio
            </a>

            <a href="{{ route('creator.services.index') }}">
                <i class="fa-solid fa-grip"></i>
                Layanan Saya
            </a>

            <a href="#about">
                <i class="fa-solid fa-user"></i>
                Tentang Saya
            </a>
        </nav>

        <!-- PORTFOLIO PREVIEW -->
        <section class="portfolio-panel">

            <div class="section-heading">
                <div>
                    <h2>Portofolio Saya</h2>
                    <p>Kumpulan karya dan hasil pekerjaan profesionalmu.</p>
                </div>

                <a href="{{ route('creator.portofolio.index') }}" class="view-all">
                    Lihat Semua
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="portfolio-empty">
                <div class="portfolio-empty-icon">
                    <i class="fa-solid fa-images"></i>
                </div>

                <h3>{{ $portfolioCount > 0 ? 'Portofoliomu Siap Dilihat' : 'Mulai Tampilkan Karyamu' }}</h3>

                <p>
                    {{ $portfolioCount > 0
                        ? 'Kamu sudah memiliki ' . $portfolioCount . ' karya portofolio. Buka halaman portofolio untuk melihat dan mengelolanya.'
                        : 'Tambahkan karya terbaikmu agar Customer dapat melihat kemampuan dan pengalaman profesionalmu.' }}
                </p>

                <a href="{{ route('creator.portofolio.index') }}" class="portfolio-button">
                    <i class="fa-solid fa-folder-open"></i>
                    Kelola Portofolio
                </a>
            </div>

        </section>

        <!-- PERSONAL INFORMATION -->
        <section class="details-grid" id="about">

            <div class="detail-card">
                <h3>
                    <i class="fa-solid fa-user"></i>
                    Informasi Pribadi
                </h3>

                <div class="detail-row">
                    <span class="detail-label">Nama Lengkap</span>
                    <span class="detail-separator">:</span>
                    <span class="detail-value">{{ $displayName }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-separator">:</span>
                    <span class="detail-value">{{ $user->email }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Nomor Telepon</span>
                    <span class="detail-separator">:</span>
                    <span class="detail-value">{{ $creator->phone ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Profesi</span>
                    <span class="detail-separator">:</span>
                    <span class="detail-value">{{ $creator->profession ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Lokasi</span>
                    <span class="detail-separator">:</span>
                    <span class="detail-value">{{ $creator->location ?: '-' }}</span>
                </div>
            </div>

            <div class="detail-card">
                <h3>
                    <i class="fa-solid fa-briefcase"></i>
                    Tentang Saya
                </h3>

                <p class="about-text">
                    {{ $creator->bio ?: 'Belum ada deskripsi tentang Creator ini. Tambahkan bio melalui menu Edit Profil agar Customer dapat mengenalmu lebih jauh.' }}
                </p>

                @if($creator->website)
                    <hr class="about-divider">

                    <a href="{{ $creator->website }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="website-link">
                        <i class="fa-solid fa-globe"></i>
                        Kunjungi Website
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                @endif
            </div>

        </section>

    </div>

    <footer class="footer">
        © {{ date('Y') }} BoostCV. All rights reserved.
    </footer>

</main>

</body>
</html>
