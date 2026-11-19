
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Pelanggan - BoostCV</title>

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
            max-width: 1200px;
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

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(30, 40, 80, 0.04);
        }

        .summary-card p {
            color: #8990a5;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .summary-card h2 {
            font-size: 28px;
            font-weight: 700;
        }

        .star {
            color: #f5b942;
        }

        .section-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 18px rgba(30, 40, 80, 0.04);
        }

        .section-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .rating-row {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .rating-label {
            width: 45px;
            font-size: 13px;
            color: #697087;
        }

        .progress {
            flex: 1;
            height: 9px;
            background: #edf0f6;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: #f5b942;
            border-radius: 20px;
        }

        .rating-count {
            width: 30px;
            text-align: right;
            color: #8990a5;
            font-size: 13px;
        }

        .review-item {
            padding: 22px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-top {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .customer-name {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .review-date {
            color: #9ba1b2;
            font-size: 12px;
        }

        .review-comment {
            color: #687087;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .review-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .order-number {
            color: #8990a5;
            font-size: 12px;
        }

        .btn-detail {
            text-decoration: none;
            color: #5c63d8;
            border: 1px solid #dfe1fa;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-detail:hover {
            background: #f1f1ff;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-state .empty-icon {
            font-size: 45px;
            color: #c7cad8;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            font-size: 17px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #8990a5;
            font-size: 13px;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child > span,
        .pagination nav > div:last-child > a {
            display: inline-flex;
            padding: 8px 13px;
            margin: 3px;
            border-radius: 7px;
            background: white;
            color: #596078;
            text-decoration: none;
            border: 1px solid #e8eaf1;
            font-size: 13px;
        }

        .pagination nav > div:last-child span[aria-current="page"] span {
            background: #252b42;
            color: white;
        }

        @media (max-width: 768px) {
            .summary {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 25px;
            }

            .container {
                padding: 25px 15px;
            }

            .section-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Ulasan Pelanggan</h1>
            <p>Lihat penilaian dan komentar dari pelanggan atas layananmu.</p>
        </div>

        <a href="{{ route('creator.dashboard') }}" class="btn-back">
            Kembali ke Dashboard
        </a>
    </div>

    <div class="summary">

        <div class="summary-card">
            <p>Total Ulasan</p>
            <h2>{{ $totalReviews }}</h2>
        </div>

        <div class="summary-card">
            <p>Rata-rata Rating</p>
            <h2>
                {{ number_format($averageRating, 1) }}
                <span class="star">★</span>
            </h2>
        </div>

        <div class="summary-card">
            <p>Nama Creator</p>
            <h2 style="font-size: 21px;">
                {{ $creator->display_name }}
            </h2>
        </div>

    </div>

    <div class="section-card">
        <h3 class="section-title">Distribusi Rating</h3>

        @foreach($ratingCounts as $rating => $count)
            <div class="rating-row">

                <div class="rating-label">
                    {{ $rating }} <span class="star">★</span>
                </div>

                <div class="progress">
                    <div class="progress-bar"
                        style="width: {{ $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0 }}%;">
                    </div>
                </div>

                <div class="rating-count">
                    {{ $count }}
                </div>

            </div>
        @endforeach
    </div>

    <div class="section-card">

        <h3 class="section-title">Daftar Ulasan</h3>

        @forelse($reviews as $review)

            <div class="review-item">

                <div class="review-top">

                    <div>
                        <div class="customer-name">
                            {{ $review->customer->name ?? 'Pelanggan' }}
                        </div>

                        <div class="star">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= $review->rating ? '★' : '☆' }}
                            @endfor
                        </div>
                    </div>

                    <div class="review-date">
                        {{ $review->created_at->format('d M Y') }}
                    </div>

                </div>

                <p class="review-comment">
                    {{ $review->comment ?: 'Pelanggan tidak memberikan komentar.' }}
                </p>

                <div class="review-footer">

                    <span class="order-number">
                        Pesanan:
                        {{ $review->order->order_number ?? '-' }}
                    </span>

                    <a href="{{ route('creator.reviews.show', $review->id) }}"
                       class="btn-detail">
                        Lihat Detail
                    </a>

                </div>

            </div>

        @empty

            <div class="empty-state">
                <div class="empty-icon">☆</div>
                <h3>Belum Ada Ulasan</h3>
                <p>Ulasan pelanggan akan muncul di halaman ini setelah pelanggan memberikan penilaian.</p>
            </div>

        @endforelse

        <div class="pagination">
            {{ $reviews->links() }}
        </div>

    </div>

</div>

</body>
</html>
