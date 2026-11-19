
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna - BoostCV</title>

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
            font-size: 32px;
            font-weight: 600;
        }

        .content-card {
            background: white;
            border: 1px solid #ECE9E2;
            border-radius: 15px;
            padding: 25px;
        }

        .detail-label {
            color: #777F8F;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .detail-value {
            font-weight: 600;
            margin-bottom: 20px;
            overflow-wrap: anywhere;
        }

        .role {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .role-admin {
            background: #E9E1FA;
            color: #6741A5;
        }

        .role-creator {
            background: #DCEBFF;
            color: #24548C;
        }

        .role-customer {
            background: #DDF5E6;
            color: #217443;
        }

        .role-other {
            background: #E9EDF3;
            color: #4B5468;
        }

        .btn-navy {
            background: #223A66;
            color: white;
        }

        .btn-navy:hover {
            background: #182B4D;
            color: white;
        }
    </style>
</head>
<body>

<div class="container py-4">

    <div class="mb-4">
        <a href="{{ route('admin.users.index') }}" class="text-decoration-none text-muted">
            &larr; Kembali ke Daftar Pengguna
        </a>

        <h1 class="page-title mt-3 mb-1">Detail Pengguna</h1>

        <p class="text-muted mb-0">
            Informasi lengkap akun pengguna BoostCV.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-lg-8">

            <div class="content-card">

                <h5 class="fw-bold mb-4">Informasi Akun</h5>

                <div class="row">

                    <div class="col-md-6">
                        <div class="detail-label">Nama Lengkap</div>
                        <div class="detail-value">
                            {{ $user->name ?? '-' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">
                            {{ $user->email ?? '-' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-label">Role Pengguna</div>
                        <div class="detail-value">
                            @if($user->role == 'admin')
                                <span class="role role-admin">Admin</span>
                            @elseif($user->role == 'creator')
                                <span class="role role-creator">Creator</span>
                            @elseif($user->role == 'customer')
                                <span class="role role-customer">Customer</span>
                            @else
                                <span class="role role-other">
                                    {{ ucfirst($user->role ?? 'Tidak diketahui') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-label">Tanggal Bergabung</div>
                        <div class="detail-value">
                            {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-label">Terakhir Diperbarui</div>
                        <div class="detail-value">
                            {{ $user->updated_at ? $user->updated_at->format('d/m/Y H:i') : '-' }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="content-card">

                <h5 class="fw-bold mb-3">Ringkasan Akun</h5>

                <div class="mb-3">
                    <div class="detail-label">ID Pengguna</div>
                    <div class="detail-value">
                        #{{ $user->id }}
                    </div>
                </div>

                <div class="mb-3">
                    <div class="detail-label">Nama Pengguna</div>
                    <div class="detail-value">
                        {{ $user->name ?? '-' }}
                    </div>
                </div>

                <div>
                    <div class="detail-label">Status Akun</div>
                    <div class="detail-value">
                        <span class="role role-customer">Terdaftar</span>
                    </div>
                </div>

                <a href="{{ route('admin.users.index') }}" class="btn btn-navy w-100">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>