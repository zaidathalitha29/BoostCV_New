
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Ulasan - BoostCV</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f7f8fc;
            color: #252b42;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 40px 25px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #8990a5;
            font-size: 14px;
        }

        .btn-back {
            text-decoration: none;
            background: #252b42;
            color: white;
            padding: 11px 20px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #3b4565;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 22px;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(30, 40, 80, 0.04);
            margin-bottom: 22px;
        }

        .card-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 16px;
            border-bottom: 1px solid #edf0f5;
        }

        .info-group {
            margin-bottom: 25px;
        }

        .info-label {
            display: block;
            color: #9299ab;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #252b42;
        }

        .rating {
            color: #f5b942;
            font-size: 25px;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .rating-text {
            color: #8990a5;
            font-size: 12px;
        }

        .comment-box {
            background: #f7f8fc;
            border: 1px solid #edf0f5;
            padding: 20px;
            border-radius: 12px;
            color: #687087;
            font-size: 14px;
            line-height: 1.8;
        }

        .price {
            color: #4e59bd;
            font-size: 18px;
            font-weight: 700;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            background: #e8f7ef;
            color: #26945a;
            font-size: 12px;
            font-weight: 600;
        }

        .order-card {
            background: #f7f8fc;
            border-radius: 12px;
            padding: 18px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 25px 15px;
            }

            .header h1 {
                font-size: 25px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Detail Ulasan</h1>
            <p>Informasi lengkap penilaian dari pelanggan.</p>
        </div>

        <a href="{{ route('creator.reviews.index') }}" class="btn-back">
            Kembali ke Ulasan
        </a>
    </div>

    <div class="content-grid">

        <div class="card">

            <h3 class="card-title">Informasi Ulasan</h3>

            <div class="info-group">
                <span class="info-label">Nama Pelanggan</span>
                <div class="info-value">
                    {{ $review->customer->name ?? 'Pelanggan' }}
                </div>
            </div>

            <div class="info-group">
                <span class="info-label">Rating Pelanggan</span>

                <div class="rating">
                    @for($i = 1; $i <= 5; $i++)
                        {{ $i <= $review->rating ? '★' : '☆' }}
                    @endfor
                </div>

                <span class="rating-text">
                    {{ $review->rating }} dari 5 bintang
                </span>
            </div>

            <div class="info-group">
                <span class="info-label">Komentar Pelanggan</span>

                <div class="comment-box">
                    {{ $review->comment ?: 'Pelanggan tidak memberikan komentar.' }}
                </div>
            </div>

            <div class="info-group">
                <span class="info-label">Tanggal Ulasan</span>
                <div class="info-value">
                    {{ $review->created_at->format('d F Y, H:i') }}
                </div>
            </div>

        </div>

        <div class="card">

            <h3 class="card-title">Informasi Pesanan</h3>

            <div class="order-card">

                <div class="info-group">
                    <span class="info-label">Nomor Pesanan</span>
                    <div class="info-value">
                        {{ $review->order->order_number ?? '-' }}
                    </div>
                </div>

                <div class="info-group">
                    <span class="info-label">Nama Layanan</span>
                    <div class="info-value">
                        {{ $review->order->service_title ?? '-' }}
                    </div>
                </div>

                <div class="info-group">
                    <span class="info-label">Harga Pesanan</span>
                    <div class="price">
                        @if($review->order)
                            Rp {{ number_format($review->order->price, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </div>
                </div>

                <div class="info-group">
                    <span class="info-label">Status Pesanan</span>

                    @if($review->order)
                        <span class="status">
                            {{ ucfirst($review->order->status) }}
                        </span>
                    @else
                        <div class="info-value">-</div>
                    @endif
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
