
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajukan Pencairan - BoostCV Creator</title>

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
            margin-bottom: 30px;
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

        .back {
            display: inline-block;
            color: var(--navy);
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .back:hover { color: var(--gold); }

        .form-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 28px;
            max-width: 700px;
        }

        .form-card h2 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
            font-size: 23px;
            margin-bottom: 8px;
        }

        .form-card > p {
            color: var(--ink-soft);
            font-size: 13px;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .balance {
            background: var(--gold-soft);
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .balance span {
            display: block;
            font-size: 12px;
            color: var(--ink-soft);
        }

        .balance strong {
            display: block;
            font-family: 'Fraunces', serif;
            font-size: 25px;
            color: var(--navy-deep);
            margin-top: 7px;
        }

        .form-group { margin-bottom: 20px; }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 9px;
            color: var(--ink);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: white;
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--gold);
        }

        .form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .error {
            color: #A83232;
            font-size: 12px;
            margin-top: 6px;
        }

        .form-note {
            background: #F8F5EE;
            border: 1px solid var(--line);
            padding: 14px;
            border-radius: 9px;
            color: var(--ink-soft);
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            background: var(--gold);
            color: var(--navy-deep);
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
        }

        .btn:hover { background: #D99B42; }

        .btn-secondary {
            background: white;
            border: 1px solid var(--line);
            color: var(--ink-soft);
        }

        .btn-secondary:hover { background: #F5F3ED; }

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
            .form-card { padding: 20px; }
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
                <h1>Ajukan Pencairan</h1>
                <p>Isi informasi rekening dan jumlah dana yang ingin dicairkan.</p>
            </div>

            <div class="profile">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'Creator' }}</span>
            </div>
        </div>

        <a href="{{ route('creator.payouts.index') }}" class="back">
            &larr; Kembali ke Pencairan Dana
        </a>

        <section class="form-card">
            <h2>Formulir Pencairan Dana</h2>
            <p>Pastikan informasi rekening dan jumlah pencairan sudah benar sebelum mengirim pengajuan.</p>

            <div class="balance">
                <span>Saldo Tersedia</span>
                <strong>Rp{{ number_format($availableBalance ?? 0, 0, ',', '.') }}</strong>
            </div>

            <form action="{{ route('creator.payouts.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="amount">Jumlah Pencairan (Rp)</label>
                    <input
                        type="number"
                        id="amount"
                        name="amount"
                        value="{{ old('amount') }}"
                        min="1"
                        max="{{ $availableBalance ?? '' }}"
                        placeholder="Contoh: 150000"
                        required
                    >
                    @error('amount')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bank_name">Nama Bank</label>
                    <select id="bank_name" name="bank_name" required>
                        <option value="">-- Pilih Bank --</option>
                        @foreach(['BCA', 'BRI', 'BNI', 'Mandiri', 'BSI', 'BTN', 'Bank Jago', 'Lainnya'] as $bank)
                            <option value="{{ $bank }}" {{ old('bank_name') == $bank ? 'selected' : '' }}>
                                {{ $bank }}
                            </option>
                        @endforeach
                    </select>
                    @error('bank_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="account_number">Nomor Rekening</label>
                    <input
                        type="text"
                        id="account_number"
                        name="account_number"
                        value="{{ old('account_number') }}"
                        placeholder="Masukkan nomor rekening"
                        required
                    >
                    @error('account_number')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="account_name">Nama Pemilik Rekening</label>
                    <input
                        type="text"
                        id="account_name"
                        name="account_name"
                        value="{{ old('account_name') }}"
                        placeholder="Masukkan nama sesuai rekening"
                        required
                    >
                    @error('account_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="notes">Catatan (Opsional)</label>
                    <textarea
                        id="notes"
                        name="notes"
                        placeholder="Tambahkan catatan jika diperlukan"
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-note">
                    Pastikan nama pemilik rekening sesuai dengan data rekening tujuan.
                    Pengajuan akan diproses sesuai ketentuan pencairan dana BoostCV.
                </div>

                <div class="actions">
                    <button type="submit" class="btn">Kirim Pengajuan</button>
                    <a href="{{ route('creator.payouts.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </section>
    </main>
</div>

</body>
</html>
