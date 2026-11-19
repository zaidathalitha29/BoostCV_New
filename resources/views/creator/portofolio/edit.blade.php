
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Portofolio - BoostCV</title>

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
            padding: 30px 20px;
            flex-shrink: 0;
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

        .menu a {
            display: block;
            color: #DCE2EF;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 9px;
            margin-bottom: 7px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--navy);
            color: white;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: white;
            padding: 20px 35px;
            border-bottom: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h2 {
            font-family: 'Fraunces', serif;
            font-size: 23px;
        }

        .content {
            padding: 35px;
            max-width: 950px;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            font-family: 'Fraunces', serif;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .page-title p {
            color: var(--ink-soft);
            font-size: 14px;
        }

        .form-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 28px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        input,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--line);
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: var(--navy);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .current-image {
            margin-bottom: 12px;
        }

        .current-image img {
            width: 180px;
            height: 130px;
            object-fit: cover;
            border-radius: 9px;
            border: 1px solid var(--line);
        }

        .help-text {
            display: block;
            color: var(--ink-soft);
            font-size: 12px;
            margin-top: 7px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
        }

        .btn-secondary {
            background: #F0EEE8;
            color: var(--ink);
        }

        .error {
            color: #B42318;
            font-size: 12px;
            margin-top: 6px;
        }

        @media (max-width: 768px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .menu {
                display: flex;
                overflow-x: auto;
                gap: 5px;
            }

            .menu a {
                white-space: nowrap;
            }

            .content {
                padding: 22px 16px;
            }

            .topbar {
                padding: 18px;
            }
        }
    </style>
</head>
<body>

<div class="layout">

    <aside class="sidebar">
        <div class="brand">Boost<span>CV</span></div>

        <nav class="menu">
            <a href="{{ route('creator.dashboard') }}">Dashboard</a>
            <a href="{{ route('creator.profile') }}">Profil Saya</a>
            <a href="{{ route('creator.services.index') }}">Layanan Saya</a>
            <a href="{{ route('creator.portofolio.index') }}" class="active">Portofolio</a>
            <a href="{{ route('creator.orders.index') }}">Pesanan</a>
            <a href="{{ route('creator.reviews.index') }}">Ulasan</a>
            <a href="{{ route('creator.notifications.index') }}">Notifikasi</a>
            <a href="{{ route('creator.earnings.index') }}">Pendapatan</a>
            <a href="{{ route('creator.payouts.index') }}">Pencairan Dana</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Keluar
            </a>
        </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </aside>

    <main class="main">

        <header class="topbar">
            <h2>Edit Portofolio</h2>
            <span>Creator</span>
        </header>

        <section class="content">

            <div class="page-title">
                <h1>Edit Portofolio</h1>
                <p>Perbarui informasi dan hasil karya portofolio kamu.</p>
            </div>

            <div class="form-card">

                @if ($errors->any())
                    <div style="background:#FEECEB; padding:15px; border-radius:8px; margin-bottom:20px;">
                        <strong>Periksa kembali data yang kamu masukkan.</strong>
                        <ul style="padding-left:20px; margin-top:8px;">
                            @foreach ($errors->all() as $error)
                                <li class="error">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('creator.portofolio.update', $portofolio->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Judul Portofolio</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $portofolio->title) }}"
                            placeholder="Masukkan judul portofolio"
                            required
                        >
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea
                            id="description"
                            name="description"
                            placeholder="Ceritakan tentang hasil karya kamu"
                        >{{ old('description', $portofolio->description) }}</textarea>
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar Saat Ini</label>

                        @if ($portofolio->image)
                            <div class="current-image">
                                <img src="{{ asset('storage/' . $portofolio->image) }}" alt="Gambar portofolio">
                            </div>
                        @else
                            <p class="help-text">Belum ada gambar portofolio.</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image">Ganti Gambar Portofolio</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <small class="help-text">Kosongkan jika tidak ingin mengganti gambar.</small>
                        @error('image')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('creator.portofolio.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

        </section>
    </main>
</div>

</body>
</html>
