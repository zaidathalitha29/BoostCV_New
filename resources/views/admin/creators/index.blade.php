<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Creator - BoostCV</title>

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

        .btn-detail {
            background: #223A66;
            color: #fff;
            border-radius: 7px;
            padding: 6px 12px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-detail:hover {
            background: #1C2434;
            color: #fff;
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

        <h2 class="page-title mt-3">Kelola Creator</h2>
        <p class="text-muted">Daftar creator yang terdaftar di BoostCV.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-card mb-4">
        <form action="{{ route('admin.creators.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-5">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama atau email creator..."
                        value="{{ request('search') }}"
                    >
                </div>

                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        Cari
                    </button>

                    <a href="{{ route('admin.creators.index') }}" class="btn btn-outline-secondary">
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
                        <th>Nama Creator</th>
                        <th>Email</th>
                        <th>Spesialisasi</th>
                        <th>Status</th>
                        <th>Tanggal Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($creators as $creator)
                        <tr>
                            <td>{{ $loop->iteration + ($creators->firstItem() ?? 0) - 1 }}</td>

                            <td>
                                <strong>{{ $creator->user->name ?? '-' }}</strong>
                            </td>

                            <td>{{ $creator->user->email ?? '-' }}</td>

                            <td>
                                {{ $creator->specialization ?? $creator->expertise ?? '-' }}
                            </td>

                            <td>
                                @php
                                    $status = $creator->status ?? 'unknown';
                                    $badgeClass = [
                                        'approved' => 'success',
                                        'pending' => 'warning',
                                        'rejected' => 'danger'
                                    ][$status] ?? 'secondary';
                                @endphp

                                <span class="badge bg-{{ $badgeClass }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td>
                                {{ $creator->created_at ? $creator->created_at->format('d/m/Y') : '-' }}
                            </td>

                            <td>
                                @if(\Illuminate\Support\Facades\Route::has('admin.creators.show'))
                                    <a href="{{ route('admin.creators.show', $creator->id) }}" class="btn-detail">
                                        Detail
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada creator.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($creators, 'links'))
            <div class="mt-3">
                {{ $creators->links() }}
            </div>
        @endif
    </div>

</div>

</body>
</html>