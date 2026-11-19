<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Pembatalan - BoostCV</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #FBFAF7;
            color: #1C2434;
            font-family: 'Inter', sans-serif;
        }

        .main { max-width: 850px; margin: auto; padding: 40px 25px; }

        h3, h5 { font-family: 'Fraunces', serif; color: #16264A; }
        h3 { font-size: 30px; margin: 15px 0 8px; }
        h5 { font-size: 19px; margin-bottom: 15px; }

        .subtitle { color: #687184; font-size: 14px; line-height: 1.7; }

        .back {
            color: #223A66;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .card {
            background: white;
            border: 1px solid #E4E1D8;
            border-radius: 14px;
            padding: 26px;
            margin-top: 25px;
            box-shadow: 0 5px 20px rgba(22,38,74,.05);
        }

        .info {
            background: #F4F2EC;
            padding: 16px;
            border-radius: 9px;
            margin-bottom: 22px;
            font-size: 13px;
            line-height: 1.8;
        }

        .divider { border: none; border-top: 1px solid #E4E1D8; margin: 20px 0; }

        label {
            display: block;
            color: #16264A;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        textarea {
            width: 100%;
            min-height: 140px;
            resize: vertical;
            border: 1px solid #E4E1D8;
            border-radius: 8px;
            padding: 13px;
            font-family: inherit;
            font-size: 13px;
        }

        textarea:focus {
            outline: none;
            border-color: #C98A2C;
            box-shadow: 0 0 0 3px rgba(201,138,44,.13);
        }

        .invalid-feedback {
            color: #B52B2B;
            display: block;
            font-size: 12px;
            margin-top: 6px;
        }

        .is-invalid { border-color: #B52B2B; }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-danger { background: #B63B3B; color: white; }
        .btn-danger:hover { background: #942D2D; }
        .btn-secondary { background: #F0F0ED; color: #1C2434; }

        .alert {
            background: #FCE8E8;
            color: #A52B2B;
            padding: 14px 18px;
            border-radius: 8px;
            margin-top: 18px;
            font-size: 13px;
        }

        @media(max-width: 600px) {
            .main { padding: 25px 14px; }
            .card { padding: 18px; }
            h3 { font-size: 25px; }
            .btn { margin-bottom: 8px; }
        }
    </style>
</head>
<body>

<main class="main">

    <a href="{{ route('customer.orders.show', $order->id) }}" class="back">
        &larr; Kembali ke Detail Pesanan
    </a>

    <h3>Ajukan Pembatalan</h3>
    <p class="subtitle">
        Sampaikan alasan pembatalan pesanan kepada Admin.
    </p>

    @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif

    <div class="card">

        <h5>Informasi Pesanan</h5>

        <div class="info">
            <strong>Nomor Pesanan:</strong> {{ $order->order_number }}<br>
            <strong>Layanan:</strong> {{ $order->service_title }}<br>
            <strong>Harga:</strong> Rp {{ number_format($order->price, 0, ',', '.') }}<br>
            <strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $order->status)) }}
        </div>

        <form action="{{ route('customer.cancellations.store', $order->id) }}" method="POST">
            @csrf

            <div>
                <label for="reason">Alasan Pembatalan</label>

                <textarea name="reason"
                          id="reason"
                          class="@error('reason') is-invalid @enderror"
                          placeholder="Jelaskan alasan kamu ingin membatalkan pesanan...">{{ old('reason') }}</textarea>

                @error('reason')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <hr class="divider">

            <button type="submit" class="btn btn-danger">
                Kirim Pengajuan
            </button>

            <a href="{{ route('customer.orders.show', $order->id) }}" class="btn btn-secondary">
                Batal
            </a>
        </form>

    </div>

</main>
</body>
</html>
