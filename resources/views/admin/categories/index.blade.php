<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Kategori - BoostCV</title>

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

        .form-control {
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

        <h2 class="page-title mt-3">Kelola Kategori</h2>
        <p class="text-muted">Daftar kategori layanan di BoostCV.</p>
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
        <h5 class="mb-3">Tambah Kategori</h5>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-9">
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama kategori"
                        value="{{ old('name') }}"
                        required
                    >

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Tambah Kategori
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="content-card">
        <h5 class="mb-3">Daftar Kategori</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Layanan</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration + ($categories->firstItem() ?? 0) - 1 }}</td>

                            <td>
                                <strong>{{ $category->name }}</strong>
                            </td>

                            <td>
                                {{ $category->services_count ?? 0 }}
                            </td>

                            <td>
                                {{ $category->created_at ? $category->created_at->format('d/m/Y') : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($categories, 'links'))
            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

</div>

</body>
</html>