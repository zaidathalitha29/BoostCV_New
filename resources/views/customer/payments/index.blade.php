
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - BoostCV</title>

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
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
        }

        .main {
            max-width: 750px;
            margin: auto;
            padding: 40px 20px;
        }

        h3, h5 {
            font-family: 'Fraunces', serif;
            color: var(--navy-deep);
        }

        h3 {
            font-size: 30px;
            margin: 15px 0 8px;
        }

        h5 {
            font-size: 19px;
            margin-bottom: 18px;
        }

        .back {
            color: var(--navy);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .subtitle {
            color: var(--ink-soft);
            font-size: 14px;
            line-height: 1.7;
        }

        .card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 25px;
            margin-top: 25px;
            box-shadow: 0 5px 20px rgba(22, 38, 74, .05);
        }

        .order-info {
            background: #F4F2EC;
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 25px;
        }

        .order-info p {
            font-size: 13px;
            color: var(--ink-soft);
            margin-bottom: 9px;
        }

        .order-info p:last-child {
            margin-bottom: 0;
        }

        .price {
            color: var(--navy);
            font-size: 23px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
            color: var(--ink);
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            background: white;
            color: var(--ink);
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--navy);
        }

        .hint {
            color: var(--ink-soft);
            font-size: 11px;
            margin-top: 7px;
            line-height: 1.6;
        }

        .error {
            color: #B63B3B;
            font-size: 12px;
            margin-top: 6px;
        }

        .notice {
            background: #FFF4DF;
            color: #805817;
            border-radius: 8px;
            padding: 13px;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary {
            background: var(--navy);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
        }

        .btn-secondary {
            background: #F0F0ED;
            color: var(--ink);
        }

        .alert {
            padding: 14px;
            border-radius: 8px;
            margin-top: 18px;
            font-size: 13px;
        }

        .alert-danger {
            background: #FCE8E8;
            color: #A52B2B;
        }

        @media(max-width: 600px) {
            .main {
                padding: 25px 14px;
            }

            .card {
                padding: 18px;
            }

            h3 {
                font-size: 25px;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<main class="main">

    <a href="{{ route('customer.orders.show', $order->id) }}" class="back">
        &larr; Kembali ke Detail Pesanan
    </a>

    <h3>Pembayaran Pesanan</h3>

    <p class="subtitle">
        Lengkapi informasi pembayaran dan unggah bukti pembayaran kamu.
    </p>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="padding-left: 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <h5>Ringkasan Pesanan</h5>

        <div class="order-info">
            <p>Nomor Pesanan: <strong>{{ $order->order_number }}</strong></p>

            <p>Layanan: <strong>{{ $order->service_title }}</strong></p>

            <p>Total Pembayaran:</p>

            <div class="price">
                Rp {{ number_format($order->price, 0, ',', '.') }}
            </div>
        </div>

        <div class="notice">
            Pastikan kamu melakukan pembayaran sesuai informasi rekening atau
            akun pembayaran resmi BoostCV. Jangan mengirim bukti pembayaran
            sebelum transaksi benar-benar dilakukan.
        </div>

        <form action="{{ route('customer.payments.store', $order->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="method">Metode Pembayaran</label>

                <select name="method" id="method" required>
                    <option value="">-- Pilih Metode Pembayaran --</option>

                    <option value="bank_transfer"
                        {{ old('method') == 'bank_transfer' ? 'selected' : '' }}>
                        Transfer Bank
                    </option>

                    <option value="e_wallet"
                        {{ old('method') == 'e_wallet' ? 'selected' : '' }}>
                        E-Wallet
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="provider">Nama Bank / E-Wallet</label>

                <input type="text"
                       name="provider"
                       id="provider"
                       value="{{ old('provider') }}"
                       placeholder="Contoh: BCA, BRI, DANA, OVO"
                       maxlength="255">

            </div>

            <div class="form-group">
                <label for="account_name">Nama Pemilik Rekening / Akun</label>

                <input type="text"
                       name="account_name"
                       id="account_name"
                       value="{{ old('account_name') }}"
                       placeholder="Masukkan nama pemilik akun"
                       maxlength="255">
            </div>

            <div class="form-group">
                <label for="proof_file">Bukti Pembayaran</label>

                <input type="file"
                       name="proof_file"
                       id="proof_file"
                       accept=".jpg,.jpeg,.png"
                       required>

                <p class="hint">
                    Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                </p>
            </div>

            <div class="actions">

                <button type="submit" class="btn btn-primary">
                    Kirim Bukti Pembayaran
                </button>

                <a href="{{ route('customer.orders.show', $order->id) }}"
                   class="btn btn-secondary">
                    Batal
                </a>

            </div>

        </form>

    </div>

</main>

</body>
</html>
