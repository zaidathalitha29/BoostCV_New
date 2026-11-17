
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pemesanan - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #223A66;
            --navy-dark: #16264A;
            --gold: #C98A2C;
            --paper: #FBFAF7;
            --white: #FFFFFF;
            --text: #1C2434;
            --muted: #687184;
            --border: #E4E1D8;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: var(--paper);
            color: var(--text);
            font-family: 'Inter', sans-serif;
        }

        .main {
            max-width: 1100px;
            margin: auto;
            padding: 40px 25px;
        }

        h3, h5 {
            font-family: 'Fraunces', serif;
            color: var(--navy-dark);
        }

        h3 { font-size: 30px; margin: 15px 0 8px; }
        h5 { font-size: 19px; margin-bottom: 15px; }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .back {
            color: var(--navy);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back:hover { color: var(--gold); }

        .row {
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            gap: 25px;
            margin-top: 28px;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 26px;
            box-shadow: 0 5px 20px rgba(22,38,74,.05);
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 18px 0;
        }

        .category {
            color: var(--muted);
            font-size: 13px;
            margin: 8px 0 20px;
        }

        .info {
            font-size: 13px;
            line-height: 2;
        }

        .price-label {
            font-size: 12px;
            color: var(--muted);
        }

        .price {
            color: var(--navy);
            font-size: 26px;
            font-weight: 700;
            margin-top: 5px;
        }

        label {
            display: block;
            color: var(--navy-dark);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .form-group { margin-bottom: 20px; }

        .form-control {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 13px;
            background: #FFFEFC;
            color: var(--text);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,138,44,.13);
        }

        textarea.form-control {
            min-height: 125px;
            resize: vertical;
        }

        .invalid-feedback {
            display: block;
            color: #B52B2B;
            font-size: 12px;
            margin-top: 6px;
        }

        .is-invalid { border-color: #B52B2B; }

        .btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            margin-top: 10px;
            transition: .2s;
        }

        .btn-primary { background: var(--navy); color: white; }
        .btn-primary:hover { background: var(--navy-dark); }

        .btn-secondary {
            background: #F0F0ED;
            color: var(--text);
        }

        .btn-secondary:hover { background: #E2E2DC; }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 13px;
            background: #FCE8E8;
            color: #A52B2B;
        }

        @media(max-width: 750px) {
            .main { padding: 25px 14px; }
            .row { grid-template-columns: 1fr; }
            h3 { font-size: 25px; }
        }
    </style>
</head>
<body>

<main class="main">

    <a href="{{ route('customer.services.show', $service->id) }}" class="back">
        &larr; Kembali ke Detail Layanan
    </a>

    <h3>Formulir Pemesanan</h3>
    <p class="subtitle">Lengkapi informasi berikut untuk memesan layanan CV.</p>

    @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif

    <div class="row">

        <div class="card">
            <h5>Ringkasan Layanan</h5>
            <hr class="divider">

            <h5>{{ $service->title }}</h5>

            <p class="category">
                {{ $service->category->name ?? 'Tanpa Kategori' }}
            </p>

            <div class="info">
                <p>Creator:
                    <strong>{{ optional(optional($service->creator)->user)->name ?? '-' }}</strong>
                </p>

                <p>Batas Revisi:
                    <strong>{{ $service->revision_limit }} kali</strong>
                </p>
            </div>

            <hr class="divider">

            <span class="price-label">Total Harga</span>
            <div class="price">
                Rp {{ number_format($service->price, 0, ',', '.') }}
            </div>
        </div>

        <div class="card">
            <h5>Data Pemesan</h5>
            <hr class="divider">

            <form action="{{ route('customer.orders.store', $service->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="customer_name">Nama Lengkap</label>

                    <input type="text"
                           name="customer_name"
                           id="customer_name"
                           class="form-control @error('customer_name') is-invalid @enderror"
                           value="{{ old('customer_name', auth()->user()->name) }}"
                           placeholder="Masukkan nama lengkap">

                    @error('customer_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="customer_notes">Catatan Pesanan</label>

                    <textarea name="customer_notes"
                              id="customer_notes"
                              class="form-control @error('customer_notes') is-invalid @enderror"
                              placeholder="Contoh: Saya membutuhkan CV untuk melamar pekerjaan.">{{ old('customer_notes') }}</textarea>

                    @error('customer_notes')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <small class="subtitle">
                        Jelaskan kebutuhan atau informasi tambahan untuk pembuatan CV.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    Buat Pesanan
                </button>

                <a href="{{ route('customer.services.show', $service->id) }}" class="btn btn-secondary">
                    Batal
                </a>

            </form>
        </div>

    </div>
</main>

</body>
</html>
