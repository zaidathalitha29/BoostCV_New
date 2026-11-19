<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - BoostCV</title>

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
            padding: 24px;
        }

        .btn-navy {
            background: #223A66;
            color: white;
        }

        .btn-navy:hover {
            background: #182B4D;
            color: white;
        }

        .table th {
            color: #6B7280;
            font-size: 12px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
            font-size: 13px;
        }

        .role {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
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
    </style>
</head>
<body>

<div class="container py-4">

    <div class="mb-4">
        <a href="{{ route('admin') }}" class="text-decoration-none text-muted">
            &larr; Kembali ke Dashboard
        </a>

        <h1 class="page-title mt-3 mb-1">Kelola Pengguna</h1>

        <p class="text-muted mb-0">
            Lihat informasi akun pengguna yang terdaftar di BoostCV.
        </p>
    </div>

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

    <div class="content-card mb-4">

        <form action="{{ url()->current() }}" method="GET">

            <div class="row g-3 align-items-end">

                <div class="col-md-5">
                    <label class="form-label fw-semibold">Cari Pengguna</label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Cari nama atau email..."
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Filter Role</label>

                    <select name="role" class="form-select">
                        <option value="">Semua Role</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="creator" {{ request('role') == 'creator' ? 'selected' : '' }}>
                            Creator
                        </option>
                        <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>
                            Customer
                        </option>
                    </select>
                </div>

                <div class="col-md-auto">
                    <button type="submit" class="btn btn-navy">
                        Cari
                    </button>

                    <a href="{{ url()->current() }}" class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>

            </div>

        </form>

    </div>

    <div class="content-card">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Daftar Pengguna</h5>

            <span class="text-muted small">
                Total: {{ $users->total() }} pengguna
            </span>
        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)

                        <tr>

                            <td>
                                {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                            </td>

                            <td class="fw-semibold">
                                {{ $user->name }}
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td>
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
                            </td>

                            <td>
                                {{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}
                            </td>

                            <td>
                                @if(\Illuminate\Support\Facades\Route::has('admin.users.show'))
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                       class="btn btn-sm btn-navy">
                                        Detail
                                    </a>
                                @else
                                    <span class="text-muted small">Belum tersedia</span>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                Belum ada data pengguna.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $users->appends(request()->query())->links() }}
        </div>

    </div>

</div>

</body>
</html>