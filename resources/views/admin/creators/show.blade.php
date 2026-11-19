<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Creator - BoostCV</title>

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
            padding: 25px;
            margin-bottom: 20px;
        }

        .label-text {
            color: #7b8190;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .value-text {
            font-weight: 600;
            margin-bottom: 20px;
            overflow-wrap: anywhere;
        }

        .btn-back {
            background: #223A66;
            color: #fff;
            border-radius: 8px;
            padding: 9px 18px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #1C2434;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container py-4">

    <div class="mb-4">
        <a href="{{ route('admin.creators.index') }}" class="btn-back">
            &larr; Kembali
        </a>

        <h2 class="page-title mt-4">Detail Creator</h2>
        <p class="text-muted">Informasi lengkap creator BoostCV.</p>
    </div>

    <div class="content-card">
        <h5 class="mb-4">Informasi Akun</h5>

        <div class="row">
            <div class="col-md-6">
                <div class="label-text">Nama Creator</div>
                <div class="value-text">
                    {{ $creator->user->name ?? '-' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="label-text">Email</div>
                <div class="value-text">
                    {{ $creator->user->email ?? '-' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="label-text">ID Creator</div>
                <div class="value-text">
                    {{ $creator->id }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="label-text">Status</div>
                <div class="value-text">
                    {{ ucfirst($creator->status ?? '-') }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="label-text">Spesialisasi</div>
                <div class="value-text">
                    {{ $creator->specialization ?? $creator->expertise ?? '-' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="label-text">Tanggal Bergabung</div>
                <div class="value-text">
                    {{ $creator->created_at ? $creator->created_at->format('d M Y') : '-' }}
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
