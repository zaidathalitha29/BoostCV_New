<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pesanan - BoostCV</title>

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

        .back-link {
            display: inline-block;
            color: var(--navy);
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 22px;
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

        .form-card {
            max-width: 750px;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .form-control {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--line);
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: var(--ink);
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--navy);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 110px;
        }

        .help-text {
            display: block;
            color: #8A8F9B;
            font-size: 12px;
            margin-top: 7px;
        }

        .error {
            color: #B42318;
            font-size: 12px;
            margin-top: 7px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 8px;
            border: none;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
        }

        .btn-secondary {
            background: var(--gold-soft);
            color: var(--ink);
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

            .form-card {
                padding: 22px;
            }

            .button-group {
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
            <a href="{{ route('creator.orders.index') }}" class="active">Pesanan</a>
            <a href="{{ route('creator.reviews.index') }}">Ulasan</a>

            <div class="menu-title">Keuangan</div>

            <a href="{{ route('creator.earnings.index') }}">Pendapatan</a>
            <a href="{{ route('creator.payouts.index') }}">Pencairan Dana</a>

            <div class="menu-title">Lainnya</div>

            <a href="{{ route('creator.notifications.index') }}">Notifikasi</a>

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
            <h2>Edit Pesanan</h2>
            <div class="user-info">
                {{ auth()->user()->name ?? 'Creator' }}
            </div>
        </header>

        <a href="{{ route('creator.orders.index') }}" class="back-link">
            ← Kembali ke Pesanan
        </a>

        <section class="page-heading">
            <h1>Perbarui Pesanan</h1>
            <p>Ubah status pesanan sesuai dengan perkembangan pengerjaan.</p>
        </section>

        <div class="form-card">

            <form action="{{ route('creator.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $order->customer->name ?? 'Pelanggan' }}"
                        readonly
                    >
                </div>

                <div class="form-group">
                    <label>Jasa yang Dipesan</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $order->service->title ?? $order->service->name ?? 'Jasa' }}"
                        readonly
                    >
                </div>

                <div class="form-group">
                    <label for="status">Status Pesanan</label>

                    <select name="status" id="status" class="form-control" required>
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>
                            Sedang Dikerjakan
                        </option>

                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                            Dibatalkan
                        </option>
                    </select>

                    @error('status')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <span class="help-text">
                        Pilih status terbaru dari pesanan pelanggan.
                    </span>
                </div>

                <div class="form-group">
                    <label for="notes">Catatan Pesanan</label>

                    <textarea
                        name="notes"
                        id="notes"
                        class="form-control"
                        placeholder="Tambahkan catatan jika diperlukan..."
                    >{{ old('notes', $order->notes ?? '') }}</textarea>

                    @error('notes')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('creator.orders.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>

    </main>
</div>
</body>
</html>