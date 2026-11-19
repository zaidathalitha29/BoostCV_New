
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulir Pemesanan - BoostCV</title>

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
            background: var(--paper);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
        }

        a {
            text-decoration: none;
        }

        .main {
            max-width: 1100px;
            margin: auto;
            padding: 40px 25px;
            min-height: 100vh;
        }

        .back {
            display: inline-block;
            color: var(--navy);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .back:hover {
            color: var(--gold);
        }

        h1, h2, h3, h4 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
        }

        .page-title {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.8;
        }

        .row {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: 25px;
            margin-top: 28px;
            align-items: start;
        }

        .card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 26px;
            box-shadow: 0 5px 20px rgba(22,38,74,.04);
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 18px;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--line);
            margin: 18px 0;
        }

        .service-image {
            width: 100%;
            height: 175px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--navy-deep), var(--navy));
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-soft);
            font-size: 45px;
            margin-bottom: 18px;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category {
            display: inline-block;
            color: #805817;
            background: var(--gold-soft);
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .service-title {
            font-size: 22px;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .info {
            font-size: 12px;
            line-height: 2.2;
            color: var(--ink-soft);
        }

        .info strong {
            color: var(--ink);
        }

        .creator-box {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 17px;
        }

        .creator-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--gold-soft);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
            overflow: hidden;
        }

        .creator-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .creator-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--navy);
        }

        .creator-profession {
            font-size: 11px;
            color: var(--ink-soft);
            margin-top: 4px;
        }

        .price-label {
            font-size: 12px;
            color: var(--ink-soft);
        }

        .price {
            color: var(--navy);
            font-family: 'Fraunces', serif;
            font-size: 28px;
            font-weight: 700;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: var(--navy-deep);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .form-control {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 13px;
            background: #FFFEFC;
            color: var(--ink);
            transition: .2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,138,44,.13);
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
        }

        .form-help {
            display: block;
            color: var(--ink-soft);
            font-size: 11px;
            line-height: 1.7;
            margin-top: 7px;
        }

        .invalid-feedback {
            display: block;
            color: #B52B2B;
            font-size: 11px;
            margin-top: 6px;
        }

        .is-invalid {
            border-color: #B52B2B;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 12px;
            line-height: 1.7;
        }

        .alert-error {
            background: #FCE8E8;
            color: #A52B2B;
            border: 1px solid #F2CACA;
        }

        .alert-success {
            background: #E7F5E9;
            color: #256B37;
            border: 1px solid #C9E8CE;
        }

        .btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 13px;
            border-radius: 8px;
            border: none;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
            transition: .2s;
        }

        .btn-primary {
            background: var(--gold);
            color: white;
        }

        .btn-primary:hover {
            background: #A96E1B;
        }

        .btn-secondary {
            background: #F0F0ED;
            color: var(--ink);
        }

        .btn-secondary:hover {
            background: #E2E2DC;
        }

        .notice {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 13px;
            color: var(--ink-soft);
            font-size: 11px;
            line-height: 1.8;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            color: var(--ink-soft);
            font-size: 11px;
            margin-top: 35px;
        }

        @media(max-width: 750px) {
            .main {
                padding: 25px 14px;
            }

            .row {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 25px;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

@php
    $creator = $service->creator;

    $creatorName = optional($creator)->display_name
        ?: optional(optional($creator)->user)->name
        ?: 'Creator BoostCV';
@endphp

<main class="main">

    <a href="{{ route('customer.services.show', $service->id) }}" class="back">
        ← Kembali ke Detail Layanan
    </a>

    <h1 class="page-title">Formulir Pemesanan</h1>

    <p class="subtitle">
        Lengkapi informasi berikut untuk memesan layanan pembuatan CV.
    </p>

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        <!-- RINGKASAN LAYANAN -->
        <section class="card">

            <h2 class="card-title">Ringkasan Layanan</h2>

            <div class="service-image">
                @if($service->thumbnail)
                    <img
                        src="{{ asset('storage/' . $service->thumbnail) }}"
                        alt="{{ $service->title }}"
                    >
                @else
                    ✦
                @endif
            </div>

            <span class="category">
                {{ optional($service->category)->name ?? 'Umum' }}
            </span>

            <h3 class="service-title">
                {{ $service->title }}
            </h3>

            <div class="info">
                <p>
                    Estimasi Pengerjaan:
                    <strong>{{ $service->estimated_days }} hari</strong>
                </p>

                <p>
                    Batas Revisi:
                    <strong>{{ $service->revision_limit }} kali</strong>
                </p>
            </div>

            <div class="creator-box">

                <div class="creator-avatar">
                    @if($creator && $creator->photo)
                        <img
                            src="{{ asset('storage/' . $creator->photo) }}"
                            alt="{{ $creatorName }}"
                        >
                    @else
                        {{ strtoupper(substr($creatorName, 0, 1)) }}
                    @endif
                </div>

                <div>
                    <p class="creator-name">{{ $creatorName }}</p>

                    <p class="creator-profession">
                        {{ optional($creator)->profession ?? 'Creator BoostCV' }}
                    </p>
                </div>

            </div>

            <hr class="divider">

            <p class="price-label">Total Harga Layanan</p>

            <div class="price">
                Rp {{ number_format($service->price, 0, ',', '.') }}
            </div>

            <div class="notice">
                Pastikan kamu sudah membaca deskripsi layanan dan memahami
                estimasi pengerjaan serta batas revisi sebelum membuat pesanan.
            </div>

        </section>

        <!-- FORM PEMESANAN -->
        <section class="card">

            <h2 class="card-title">Data Pemesan</h2>

            <hr class="divider">

            <form
                action="{{ route('customer.orders.store', $service->id) }}"
                method="POST"
            >
                @csrf

                <div class="form-group">

                    <label for="customer_name">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="customer_name"
                        id="customer_name"
                        class="form-control @error('customer_name') is-invalid @enderror"
                        value="{{ old('customer_name', auth()->user()->name) }}"
                        placeholder="Masukkan nama lengkap"
                        maxlength="255"
                        required
                    >

                    @error('customer_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="customer_notes">
                        Catatan Pesanan
                    </label>

                    <textarea
                        name="customer_notes"
                        id="customer_notes"
                        class="form-control @error('customer_notes') is-invalid @enderror"
                        placeholder="Contoh: Saya membutuhkan CV untuk melamar pekerjaan."
                        maxlength="1000"
                    >{{ old('customer_notes') }}</textarea>

                    @error('customer_notes')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <small class="form-help">
                        Jelaskan kebutuhan atau informasi tambahan untuk
                        pembuatan CV. Bagian ini boleh dikosongkan.
                    </small>

                </div>

                <button type="submit" class="btn btn-primary">
                    Buat Pesanan →
                </button>

                <a
                    href="{{ route('customer.services.show', $service->id) }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </form>

        </section>

    </div>

    <footer class="footer">
        © {{ date('Y') }} BoostCV. All rights reserved.
    </footer>

</main>

</body>
</html>
