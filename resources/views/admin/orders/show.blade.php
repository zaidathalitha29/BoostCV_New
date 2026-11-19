<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - BoostCV</title>
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
        .section-card { background: white; border: 1px solid #ECE9E2; border-radius: 15px; padding: 24px; margin-bottom: 20px; }
        .detail-label { color: #6B7280; font-size: 12px; margin-bottom: 5px; }
        .detail-value { font-size: 14px; font-weight: 600; overflow-wrap: anywhere; }
        .btn-gold { background: #C98A2C; color: white; border: none; }
        .btn-gold:hover { background: #AD7220; color: white; }
        .status-badge { display: inline-block; padding: 7px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
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
                <h1 class="page-title">Detail Pesanan</h1>
                <p class="text-muted">Informasi lengkap pesanan Customer.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="section-card">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                    <div>
                        <div class="detail-label">Nomor Pesanan</div>
                        <h4 class="fw-bold mb-0">{{ $order->order_number }}</h4>
                    </div>
                    <span class="status-badge status-{{ $order->status }}">
                        {{ ucwords(str_replace('_', ' ', $order->status)) }}
                    </span>
                </div>

                <hr>

                <h5 class="fw-bold mb-3">Informasi Pesanan</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-label">Nama Layanan</div>
                        <div class="detail-value">{{ optional($order->service)->title ?? $order->service_title ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Harga</div>
                        <div class="detail-value">Rp{{ number_format((float) $order->price, 0, ',', '.') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Tanggal Pesanan</div>
                        <div class="detail-value">{{ $order->created_at ? $order->created_at->format('d M Y, H:i') : '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Mulai Dikerjakan</div>
                        <div class="detail-value">{{ $order->started_at ? $order->started_at->format('d M Y, H:i') : '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Tanggal Selesai</div>
                        <div class="detail-value">{{ $order->completed_at ? $order->completed_at->format('d M Y, H:i') : '-' }}</div>
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mb-3">Informasi Customer</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-label">Nama Customer</div>
                        <div class="detail-value">{{ optional($order->customer)->name ?? $order->customer_name ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Email Customer</div>
                        <div class="detail-value">{{ optional($order->customer)->email ?? '-' }}</div>
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mb-3">Informasi Creator</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-label">Nama Creator</div>
                        <div class="detail-value">{{ optional($order->creator)->display_name ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Email Creator</div>
                        <div class="detail-value">{{ optional(optional($order->creator)->user)->email ?? '-' }}</div>
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mb-3">Catatan Customer</h5>
                <p class="text-muted mb-0">
                    {{ $order->customer_notes ?: 'Tidak ada catatan dari Customer.' }}
                </p>

                <hr>

                <h5 class="fw-bold mb-3">Informasi Pembayaran</h5>
                @if($order->payment)
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-label">Metode Pembayaran</div>
                            <div class="detail-value">{{ $order->payment->method ?: '-' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Provider</div>
                            <div class="detail-value">{{ $order->payment->provider ?: '-' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Jumlah Pembayaran</div>
                            <div class="detail-value">Rp{{ number_format((float) $order->payment->amount, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Status Pembayaran</div>
                            <div class="detail-value">{{ ucwords(str_replace('_', ' ', $order->payment->status)) }}</div>
                        </div>
                        @if($order->payment->proof_file)
                            <div class="col-12">
                                <a href="{{ asset('storage/' . $order->payment->proof_file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    Lihat Bukti Pembayaran
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-muted mb-0">Belum ada informasi pembayaran.</p>
                @endif

                <hr>

                <h5 class="fw-bold mb-3">Hasil Pesanan</h5>
                @if($order->result_file)
                    <a href="{{ asset('storage/' . $order->result_file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        Lihat File Hasil
                    </a>
                @else
                    <p class="text-muted mb-0">Belum ada file hasil pesanan.</p>
                @endif

                <hr>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="detail-label">Jumlah Revisi</div>
                        <div class="detail-value">{{ $order->revisions->count() }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Permintaan Pembatalan</div>
                        <div class="detail-value">{{ $order->cancellationRequests->count() }}</div>
                    </div>
                </div>
            </div>

            <a href="{{ route('admin.orders.index') }}" class="btn btn-gold">
                Kembali ke Daftar Pesanan
            </a>
        </main>
    </div>
</div>
</body>
</html> 