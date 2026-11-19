<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #FBFAF7;
            color: #1C2434;
            font-family: 'Inter', sans-serif;
        }

        .main {
            max-width: 950px;
            margin: auto;
            padding: 40px 25px;
        }

        h3, h5 {
            color: #16264A;
            font-family: 'Fraunces', serif;
        }

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
            padding: 25px;
            margin-top: 25px;
            box-shadow: 0 5px 20px rgba(22,38,74,.05);
        }

        .divider {
            border: none;
            border-top: 1px solid #E4E1D8;
            margin: 20px 0;
        }

        .order-number {
            color: #687184;
            font-size: 12px;
        }

        .order-number strong {
            display: block;
            color: #16264A;
            font-size: 17px;
            margin-top: 6px;
        }

        .badge {
            display: inline-block;
            background: #E2EAF8;
            color: #223A66;
            padding: 8px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .header-order {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        table { width: 100%; border-collapse: collapse; }

        td {
            padding: 12px 8px;
            font-size: 13px;
            line-height: 1.6;
            vertical-align: top;
        }

        td:first-child { width: 35%; color: #687184; }

        .info-box {
            background: #F4F2EC;
            border-radius: 9px;
            padding: 15px;
            margin-top: 12px;
            font-size: 13px;
            line-height: 1.7;
        }

        .btn {
            display: inline-block;
            background: #223A66;
            color: white;
            padding: 10px 17px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover { background: #16264A; color: white; }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-top: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #DFF2E5;
            color: #247443;
        }

        .alert-danger {
            background: #FCE4E4;
            color: #A52B2B;
        }

        .review-form {
            margin-top: 15px;
        }

        .review-form label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 9px;
            color: #223A66;
        }

        .rating-select {
            width: 100%;
            max-width: 220px;
            padding: 11px;
            border: 1px solid #E4E1D8;
            border-radius: 8px;
            margin-bottom: 18px;
            font-family: 'Inter', sans-serif;
        }

        .review-form textarea {
            width: 100%;
            min-height: 110px;
            padding: 12px;
            border: 1px solid #E4E1D8;
            border-radius: 8px;
            resize: vertical;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .review-form textarea:focus,
        .rating-select:focus {
            outline: none;
            border-color: #223A66;
        }

        .stars {
            color: #D69B28;
            font-size: 21px;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .review-comment {
            color: #687184;
            font-size: 13px;
            line-height: 1.7;
            white-space: pre-line;
        }

        .error-text {
            color: #A52B2B;
            font-size: 12px;
            margin-top: -12px;
            margin-bottom: 15px;
        }

        @media(max-width: 600px) {
            .main { padding: 25px 14px; }
            .card { padding: 18px; }
            h3 { font-size: 25px; }
            td:first-child { width: 40%; }
        }
    </style>
</head>
<body>

<main class="main">

    <a href="{{ route('customer.history') }}" class="back">
        &larr; Kembali ke Riwayat Pesanan
    </a>

    <h3>Detail Riwayat Pesanan</h3>
    <p class="subtitle">
        Informasi lengkap transaksi pesanan layanan CV kamu.
    </p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">

        <div class="header-order">
            <div class="order-number">
                Nomor Pesanan
                <strong>{{ $order->order_number }}</strong>
            </div>

            <span class="badge">
                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
            </span>
        </div>

        <hr class="divider">

        <h5>Informasi Layanan</h5>

        <table>
            <tr>
                <td>Nama Layanan</td>
                <td>{{ $order->service_title }}</td>
            </tr>
            <tr>
                <td>Creator</td>
                <td>{{ optional(optional($order->creator)->user)->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Pemesan</td>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>Rp {{ number_format($order->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Tanggal Pesanan</td>
                <td>{{ $order->created_at->format('d F Y, H:i') }}</td>
            </tr>
            <tr>
                <td>Catatan Pesanan</td>
                <td>{{ $order->customer_notes ?: '-' }}</td>
            </tr>
        </table>

        <hr class="divider">

        <h5>Informasi Pembayaran</h5>

        @if($order->payment)
            <div class="info-box">
                Data pembayaran sudah tercatat.
            </div>
        @else
            <div class="info-box">
                Belum ada data pembayaran.
            </div>
        @endif

        <hr class="divider">

        <h5>Catatan Creator</h5>

        <div class="info-box">
            {{ $order->creator_note ?: 'Belum ada catatan dari Creator.' }}
        </div>

        <hr class="divider">

        <h5>Ulasan Layanan</h5>

        @if($order->review)

            <div class="info-box">
                <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        {{ $i <= $order->review->rating ? '★' : '☆' }}
                    @endfor
                </div>

                <p class="review-comment">
                    {{ $order->review->comment ?: 'Tidak ada komentar.' }}
                </p>

                <p style="font-size:11px;color:#687184;margin-top:12px;">
                    Dikirim pada:
                    {{ $order->review->created_at->format('d F Y, H:i') }}
                </p>
            </div>

        @elseif($order->status === 'completed')

            <p class="subtitle" style="margin-bottom:15px;">
                Pesanan sudah selesai. Berikan penilaian untuk layanan Creator.
            </p>

            <form
                action="{{ route('customer.history.review.store', $order->id) }}"
                method="POST"
                class="review-form"
            >
                @csrf

                <label for="rating">Rating</label>

                <select name="rating" id="rating" class="rating-select" required>
                    <option value="">Pilih rating</option>
                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 - Sangat Baik</option>
                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 - Baik</option>
                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 - Cukup</option>
                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 - Kurang</option>
                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 - Sangat Kurang</option>
                </select>

                @error('rating')
                    <p class="error-text">{{ $message }}</p>
                @enderror

                <label for="comment">Komentar</label>

                <textarea
                    name="comment"
                    id="comment"
                    placeholder="Bagikan pengalaman kamu menggunakan layanan ini..."
                >{{ old('comment') }}</textarea>

                @error('comment')
                    <p class="error-text">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn">
                    Kirim Ulasan
                </button>
            </form>

        @else

            <div class="info-box">
                Ulasan baru dapat diberikan setelah pesanan berstatus selesai.
            </div>

        @endif

        <hr class="divider">

        <a href="{{ route('customer.history') }}" class="btn">
            Kembali ke Riwayat Pesanan
        </a>

    </div>

</main>

</body>
</html>
