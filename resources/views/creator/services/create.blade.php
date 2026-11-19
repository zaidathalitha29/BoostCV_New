<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Layanan - BoostCV</title>

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

        .form-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 28px;
            max-width: 950px;
        }

        .form-section-title {
            font-family: 'Fraunces', serif;
            font-size: 19px;
            color: var(--navy-deep);
            margin-bottom: 8px;
        }

        .form-description {
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 23px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 12px;
            font-weight: 600;
            color: var(--ink);
        }

        .required {
            color: #C94B3C;
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
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: var(--gold);
            background: white;
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
            line-height: 1.7;
        }

        .form-hint {
            font-size: 10px;
            color: var(--ink-soft);
        }

        .file-input {
            padding: 10px;
            cursor: pointer;
        }

        .error-message {
            color: #C0392B;
            font-size: 11px;
        }

        .alert-danger {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            background: #FBE8E5;
            color: #963C32;
            font-size: 12px;
        }

        .form-divider {
            border: none;
            border-top: 1px solid var(--line);
            margin: 28px 0;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 28px;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
            padding: 12px 21px;
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
            background: white;
            color: var(--ink-soft);
            border: 1px solid var(--line);
            padding: 12px 21px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background: var(--paper);
        }

        .footer {
            color: var(--ink-soft);
            font-size: 11px;
            text-align: center;
            padding: 20px 10px;
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
            .form-card {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions a,
            .form-actions button {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @php
        $user = auth()->user();
    @endphp

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

            <a href="{{ route('creator.reviews.index') }}">
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
            <a href="{{ route('creator.earnings.index') }}">
                <span class="menu-icon">Rp</span>
                Pendapatan
            </a>

            <a href="{{ route('creator.payouts.index') }}">
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

    <main class="main">

        <header class="topbar">
            <div>
                <h2>Tambah Layanan</h2>
                <p>Buat layanan baru untuk Customer BoostCV.</p>
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
            <h1>Tambah Layanan Baru</h1>
            <p>
                Isi informasi layanan secara lengkap agar Customer memahami
                jasa yang kamu tawarkan.
            </p>
        </div>

        @if($errors->any())
            <div class="alert-danger">
                <strong>Periksa kembali data yang kamu masukkan:</strong>
                <ul style="margin: 8px 0 0 18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="form-card">

            <h3 class="form-section-title">Informasi Layanan</h3>

            <p class="form-description">
                Masukkan detail layanan yang ingin kamu tawarkan kepada Customer.
            </p>

            <form action="{{ route('creator.services.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="title">
                            Nama Layanan <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Jasa Pembuatan CV Profesional"
                            required
                        >

                        @error('title')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">
                            Kategori <span class="required">*</span>
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            class="form-control"
                            required
                        >
                            <option value="">Pilih kategori layanan</option>

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">
                            Harga Layanan <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            class="form-control"
                            value="{{ old('price') }}"
                            placeholder="Contoh: 50000"
                            min="0"
                            required
                        >

                        @error('price')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="description">
                            Deskripsi Layanan <span class="required">*</span>
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="form-control"
                            placeholder="Jelaskan layanan, manfaat, dan hasil yang akan diterima Customer..."
                            required
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="thumbnail">Gambar Layanan</label>

                        <input
                            type="file"
                            id="thumbnail"
                            name="thumbnail"
                            class="form-control file-input"
                            accept=".jpg,.jpeg,.png"
                        >

                        <span class="form-hint">
                            Gunakan gambar JPG, JPEG, atau PNG.
                        </span>

                        @error('thumbnail')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <hr class="form-divider">

                <h3 class="form-section-title">Informasi Tambahan</h3>

                <p class="form-description">
                    Tambahkan informasi waktu pengerjaan dan jumlah revisi layanan.
                </p>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="estimated_days">
                            Estimasi Pengerjaan <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="estimated_days"
                            name="estimated_days"
                            class="form-control"
                            value="{{ old('estimated_days') }}"
                            placeholder="Contoh: 2"
                            min="1"
                            required
                        >

                        <span class="form-hint">
                            Masukkan estimasi dalam satuan hari.
                        </span>

                        @error('estimated_days')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="revision_limit">
                            Jumlah Revisi <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="revision_limit"
                            name="revision_limit"
                            class="form-control"
                            value="{{ old('revision_limit') }}"
                            placeholder="Contoh: 2"
                            min="0"
                            required
                        >

                        @error('revision_limit')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">

                    <a href="{{ route('creator.services.index') }}"
                       class="btn-secondary">
                        Batal
                    </a>

                    <button type="submit" class="btn-primary">
                        Simpan Layanan
                    </button>

                </div>

            </form>

        </section>

        <div class="footer">
            © {{ date('Y') }} BoostCV. All rights reserved.
        </div>

    </main>

</body>
</html>