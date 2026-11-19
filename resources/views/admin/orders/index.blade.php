<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - BoostCV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #FBFAF7; color: #1C2434; }
        .sidebar { min-height: 100vh; background: #223A66; color: white; padding: 28px 18px; }
        .brand { font-family: 'Fraunces', serif; font-size: 27px; font-weight: 700; margin-bottom: 35px; }
        .sidebar a { display: block; color: #E4EAF4; text-decoration: none; padding: 12px 14px; border-radius: 9px; margin-bottom: 7px; font-size: 14px; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.15); color: white; }
        .main-content { padding: 35px; }
        .page-title { font-family: 'Fraunces', serif; font-size: 32px; font-weight: 600; }
        .section-card { background: white; border: 1px solid #ECE9E2; border-radius: 15px; padding: 24px; }
        .btn-gold { background: #C98A2C; color: white; border: none; }
        .btn-gold:hover { background: #AD7220; color: white; }
        .table th { color: #6B7280; font-size: 12px; text-transform: uppercase; white-space: nowrap; }
        .table td { vertical-align: middle; font-size: 13px; }
        .status-badge { display: inline-block; padding: 6px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; white-space: nowrap; }
        .status-pending_payment { background: #FFF3CD; color: #856404; }
        .status-in_progress { background: #DCEBFF; color: #174A8B; }
        .status-completed { background: #D1E7DD; color: #146C43; }
        .status-cancelled { background: #F8D7DA; color: #842029; }
        @media (max-width: 767px) {
            .sidebar { min-height: auto; }
            .main-content { padding: 22px 15px; }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 sidebar">
            <div class="brand">BoostCV.</div>
            <small class="text-white-50 d-block mb-3">MENU ADMIN</small>
            <a href="{{ route('admin') }}">Dashboard</a>
            <a href="{{ route('admin.orders.index') }}" class="active">Kelola Pesanan</a>
            <a href="{{ route('admin.payments.index') }}">Kelola Pembayaran</a>
            <hr class="border-light opacity-25">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm w-100">Keluar</button>
            </form>
        </aside>

        <main class="col-md-9 col-lg-10 main-content">
            <div class="mb-4">
                <p class="text-muted mb-1">Panel Administrator</p>
                <h1 class="page-title">Kelola Pesanan</h1>
                <p class="text-muted">Lihat dan pantau seluruh pesanan Customer.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="section-card">
                <form action="{{ route('admin.orders.index') }}" method="GET" class="row g-2 mb-4">
                    <div class="col-md-5">
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari nomor pesanan..."
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending_payment" {{ request('status') == 'pending_payment' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-gold flex-fill">Filter</button>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Customer</th>
                                <th>Creator</th>
                                <th>Layanan</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td class="fw-semibold">{{ $order->order_number }}</td>
                                    <td>{{ optional($order->customer)->name ?? $order->customer_name ?? '-' }}</td>
                                    <td>{{ optional($order->creator)->display_name ?? '-' }}</td>
                                    <td>{{ optional($order->service)->title ?? $order->service_title ?? '-' }}</td>
                                    <td>Rp{{ number_format((float) $order->price, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $order->status }}">
                                            {{ ucwords(str_replace('_', ' ', $order->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at ? $order->created_at->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Belum ada data pesanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>