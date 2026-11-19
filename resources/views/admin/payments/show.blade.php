<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran - BoostCV</title>
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
        .section-card { background: white; border: 1px solid #ECE9E2; border-radius: 15px; padding: 24px; margin-bottom: 20px; }
        .detail-label { color: #788196; font-size: 12px; margin-bottom: 6px; }
        .detail-value { font-size: 14px; font-weight: 600; overflow-wrap: anywhere; }
        .btn-gold { background: #C98A2C; color: white; border: none; }
        .btn-gold:hover { background: #AD7220; color: white; }
        .status-badge { display: inline-block; padding: 7px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .status-pending_verification { background: #FFF3CD; color: #856404; }
        .status-verified { background: #D1E7DD; color: #146C43; }
        .status-rejected { background: #F8D7DA; color: #842029; }
        .status-unpaid { background: #E9ECEF; color: #495057; }
        .status-refund_pending { background: #DCEBFF; color: #174A8B; }
        .status-refunded { background: #E2D9F3; color: #59359A; }
        .proof-image { max-width: 100%; max-height: 430px; object-fit: contain; border: 1px solid #EAEDF3; border-radius: 12px; padding: 8px; background: #FAFAFA; }
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
                <h1 class="page-title">Detail Pembayaran</h1>
                <p class="text-muted">Periksa informasi transaksi dan bukti pembayaran.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="section-card">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                    <div>
                        <div class="detail-label">Nomor Pesanan</div>
                        <h4 class="fw-bold">{{ optional($payment->order)->order_number ?? '-' }}</h4>
                    </div>
                    <span class="status-badge status-{{ $payment->status }}">
                        {{ ucwords(str_replace('_', ' ', $payment->status)) }}
                    </span>
                </div>

                <hr>

                <h5 class="fw-bold mb-3">Informasi Pembayaran</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-label">Metode Pembayaran</div>
                        <div class="detail-value">{{ $payment->method ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Provider</div>
                        <div class="detail-value">{{ $payment->provider ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Nama Pemilik Akun</div>
                        <div class="detail-value">{{ $payment->account_name ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Jumlah Pembayaran</div>
                        <div class="detail-value text-success fs-5">
                            Rp{{ number_format((float) $payment->amount, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Tanggal Pembayaran</div>
                        <div class="detail-value">{{ $payment->created_at ? $payment->created_at->format('d M Y, H:i') : '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Tanggal Verifikasi</div>
                        <div class="detail-value">{{ $payment->verified_at ? $payment->verified_at->format('d M Y, H:i') : '-' }}</div>
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mb-3">Informasi Customer</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-label">Nama Customer</div>
                        <div class="detail-value">
                            {{ optional(optional($payment->order)->customer)->name ?? optional($payment->order)->customer_name ?? '-' }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Email Customer</div>
                        <div class="detail-value">{{ optional(optional($payment->order)->customer)->email ?? '-' }}</div>
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mb-3">Informasi Layanan</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-label">Nama Layanan</div>
                        <div class="detail-value">
                            {{ optional(optional($payment->order)->service)->title ?? optional($payment->order)->service_title ?? '-' }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Creator</div>
                        <div class="detail-value">
                            {{ optional(optional($payment->order)->creator)->display_name ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <h5 class="fw-bold mb-3">Bukti Pembayaran</h5>

                @if($payment->proof_file)
                    <div class="mb-3">
                        <img
                            src="{{ asset('storage/' . $payment->proof_file) }}"
                            alt="Bukti Pembayaran"
                            class="proof-image"
                        >
                    </div>

                    <a href="{{ asset('storage/' . $payment->proof_file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-box-arrow-up-right me-1"></i>
                        Buka Bukti Pembayaran
                    </a>
                @else
                    <p class="text-muted mb-0">Belum ada bukti pembayaran yang diunggah.</p>
                @endif
            </div>

            @if($payment->verification_note)
                <div class="section-card">
                    <h5 class="fw-bold mb-3">Catatan Verifikasi</h5>
                    <p class="text-muted mb-0">{{ $payment->verification_note }}</p>
                </div>
            @endif

            @if($payment->status === 'pending_verification')
                <div class="section-card">
                    <h5 class="fw-bold mb-3">Tindakan Administrator</h5>
                    <p class="text-muted small">
                        Pastikan nominal dan bukti pembayaran sudah sesuai sebelum mengambil tindakan.
                    </p>

                    <form action="{{ route('admin.payments.verify', $payment->id) }}" method="POST" class="mb-4">
                        @csrf
                        <button type="submit" class="btn btn-success"
                                onclick="return confirm('Apakah kamu yakin ingin memverifikasi pembayaran ini?')">
                            <i class="bi bi-check-circle me-1"></i>
                            Verifikasi Pembayaran
                        </button>
                    </form>

                    <hr>

                    <h6 class="fw-bold mb-3">Tolak Pembayaran</h6>
                    <form action="{{ route('admin.payments.reject', $payment->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="verification_note" class="form-label small fw-semibold">
                                Alasan Penolakan
                            </label>
                            <textarea
                                name="verification_note"
                                id="verification_note"
                                class="form-control"
                                rows="4"
                                maxlength="1000"
                                required
                                placeholder="Tuliskan alasan pembayaran ditolak..."
                            >{{ old('verification_note') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah kamu yakin ingin menolak pembayaran ini?')">
                            <i class="bi bi-x-circle me-1"></i>
                            Tolak Pembayaran
                        </button>
                    </form>
                </div>
            @endif

            <a href="{{ route('admin.payments.index') }}" class="btn btn-gold">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Daftar Pembayaran
            </a>
        </main>
    </div>
</div>
</body>
</html>