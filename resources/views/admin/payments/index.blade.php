<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pembayaran - BoostCV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #F7F8FC; color: #1C2434; }
        .sidebar { min-height: 100vh; background: #223A66; color: white; padding: 28px 18px; }
        .brand { font-family: 'Fraunces', serif; font-size: 27px; font-weight: 700; margin-bottom: 35px; }
        .sidebar a { display: flex; gap: 12px; align-items: center; color: #E4EAF4; text-decoration: none; padding: 12px 14px; border-radius: 9px; margin-bottom: 7px; font-size: 13px; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,.15); color: white; }
        .main-content { padding: 35px; }
        .page-title { font-family: 'Fraunces', serif; font-size: 32px; font-weight: 600; }
        .section-card { background: white; border: 1px solid #ECE9E2; border-radius: 15px; padding: 24px; }
        .btn-gold { background: #C98A2C; color: white; border: none; }
        .btn-gold:hover { background: #AD7220; color: white; }
        .table th { color: #788196; font-size: 11px; text-transform: uppercase; white-space: nowrap; }
        .table td { vertical-align: middle; font-size: 13px; }
        .status-badge { display: inline-block; padding: 6px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; white-space: nowrap; }
        .status-pending_verification { background: #FFF3CD; color: #856404; }
        .status-verified { background: #D1E7DD; color: #146C43; }
        .status-rejected { background: #F8D7DA; color: #842029; }
        .status-unpaid { background: #E9ECEF; color: #495057; }
        .status-refund_pending { background: #DCEBFF; color: #174A8B; }
        .status-refunded { background: #E2D9F3; color: #59359A; }
        @media(max-width:767px) {
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
            <a href="{{ route('admin') }}"><i class="bi bi-grid"></i> Dashboard</a>
            <a href="{{ route('admin.orders.index') }}"><i class="bi bi-receipt"></i> Kelola Pesanan</a>
            <a href="{{ route('admin.payments.index') }}" class="active"><i class="bi bi-credit-card"></i> Kelola Pembayaran</a>
            <hr class="border-light opacity-25">
            <small class="text-white-50 d-block mb-3">MANAJEMEN</small>
            <a href="{{ route('admin.users.index') }}"><i class="bi bi-people"></i> Kelola Pengguna</a>
            <a href="{{ route('admin.services.index') }}"><i class="bi bi-briefcase"></i> Kelola Layanan</a>
            <a href="{{ route('admin.categories.index') }}"><i class="bi bi-tags"></i> Kelola Kategori</a>
            <a href="{{ route('admin.cancellations.index') }}"><i class="bi bi-x-circle"></i> Pembatalan</a>
            <hr class="border-light opacity-25">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm w-100">Keluar</button>
            </form>
        </aside>

        <main class="col-md-9 col-lg-10 main-content">
            <div class="mb-4">
                <p class="text-muted mb-1">Panel Administrator</p>
                <h1 class="page-title">Kelola Pembayaran</h1>
                <p class="text-muted">Periksa transaksi dan verifikasi bukti pembayaran Customer.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="section-card">
                <form action="{{ route('admin.payments.index') }}" method="GET" class="row g-2 mb-4">
                    <div class="col-md-5">
                        <select name="status" class="form-select">
                            <option value="">Semua Status Pembayaran</option>
                            <option value="unpaid" {{ request('status') == 'unpaid' ? 'selected' : '' }}>Belum Dibayar</option>
                            <option value="pending_verification" {{ request('status') == 'pending_verification' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                            <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                            <option value="refund_pending" {{ request('status') == 'refund_pending' ? 'selected' : '' }}>Menunggu Refund</option>
                            <option value="refunded" {{ request('status') == 'refunded' ? 'selected' : '' }}>Refund Selesai</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-gold w-100">Terapkan Filter</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('admin.payments.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Pesanan</th>
                                <th>Customer</th>
                                <th>Creator</th>
                                <th>Metode</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $payment)
                                <tr>
                                    <td class="fw-semibold">
                                        {{ optional($payment->order)->order_number ?? '-' }}
                                    </td>
                                    <td>
                                        {{ optional(optional($payment->order)->customer)->name ?? optional($payment->order)->customer_name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ optional(optional($payment->order)->creator)->display_name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $payment->method ?: '-' }}
                                        @if($payment->provider)
                                            <div class="text-muted small">{{ $payment->provider }}</div>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">
                                        Rp{{ number_format((float) $payment->amount, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <span class="status-badge status-{{ $payment->status }}">
                                            {{ ucwords(str_replace('_', ' ', $payment->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $payment->created_at ? $payment->created_at->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-sm btn-outline-primary">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                        Belum ada data pembayaran.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $payments->appends(request()->query())->links() }}
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>