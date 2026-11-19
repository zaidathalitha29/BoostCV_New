<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Review - BoostCV</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #FBFAF7;
            color: #1C2434;
        }

        .page-title {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            font-weight: 700;
        }

        .content-card {
            background: #fff;
            border: 1px solid #e8e6e1;
            border-radius: 14px;
            padding: 24px;
        }

        .table th {
            color: #4B5468;
            font-size: 13px;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="container-fluid px-4 py-4">

    <div class="mb-4">
        <a href="{{ route('admin') }}" class="text-decoration-none">
            &larr; Kembali ke Dashboard
        </a>

        <h2 class="page-title mt-3">Kelola Review</h2>
        <p class="text-muted">Daftar ulasan pelanggan terhadap layanan creator.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-card mb-4">
        <form action="{{ route('admin.reviews.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-6">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama pelanggan atau layanan..."
                        value="{{ request('search') }}"
                    >
                </div>

                <div class="col-md-3">
                    <select name="rating" class="form-select">
                        <option value="">Semua Rating</option>
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                                {{ $i }} Bintang
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        Cari
                    </button>

                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Creator</th>
                        <th>Rating</th>
                        <th>Ulasan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration + ($reviews->firstItem() ?? 0) - 1 }}</td>

                            <td>
                                {{ $review->customer->name ?? $review->user->name ?? '-' }}
                            </td>

                            <td>
                                {{ $review->service->title ?? '-' }}
                            </td>

                            <td>
                                {{ $review->service->creator->user->name ?? '-' }}
                            </td>

                            <td>
                                <span class="text-warning">
                                    {{ str_repeat('★', max(0, min(5, (int) ($review->rating ?? 0)))) }}
                                </span>
                                <small>{{ $review->rating ?? 0 }}/5</small>
                            </td>

                            <td style="min-width: 220px;">
                                {{ $review->comment ?? $review->review ?? '-' }}
                            </td>

                            <td>
                                {{ $review->created_at ? $review->created_at->format('d/m/Y') : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada review.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($reviews, 'links'))
            <div class="mt-3">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>

</div>

</body>
</html>