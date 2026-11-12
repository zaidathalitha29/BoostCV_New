<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Saya | BoostCV</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #FBFAF7;
            color: #1C2434;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            color: #223A66;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #4B5468;
            margin-bottom: 20px;
        }

        .add-button {
            display: inline-block;
            background: #223A66;
            color: white;
            padding: 12px 18px;
            border-radius: 7px;
            text-decoration: none;
            margin: 10px 0 25px;
        }

        .add-button:hover {
            background: #16264A;
        }

        .service-card {
            background: white;
            border: 1px solid #E4E1D8;
            border-radius: 10px;
            padding: 22px;
            margin-bottom: 16px;
        }

        .service-card h3 {
            margin-top: 0;
            color: #223A66;
        }

        .service-card p {
            line-height: 1.6;
        }

        .price {
            color: #223A66;
            font-weight: bold;
            font-size: 17px;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-draft {
            background: #F1F1F1;
            color: #555555;
        }

        .status-pending {
            background: #FFF3CD;
            color: #856404;
        }

        .status-approved {
            background: #D4EDDA;
            color: #155724;
        }

        .status-rejected {
            background: #F8D7DA;
            color: #721C24;
        }

        .alert-success {
            background: #E8F5E9;
            color: #256B38;
            padding: 12px 16px;
            border-radius: 7px;
            margin: 20px 0;
        }

        .alert-error {
            background: #FCE8E6;
            color: #B42318;
            padding: 12px 16px;
            border-radius: 7px;
            margin: 20px 0;
        }

        .rejection-note {
            background: #FFF5F5;
            border-left: 4px solid #B42318;
            padding: 12px;
            border-radius: 5px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .edit-button,
        .delete-button {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .edit-button {
            background: #F3E2C2;
            color: #1C2434;
        }

        .edit-button:hover {
            background: #EBD5A9;
        }

        .delete-button {
            background: #FCE8E6;
            color: #B42318;
        }

        .delete-button:hover {
            background: #F8D7DA;
        }

        .empty-state {
            background: white;
            border: 1px dashed #C9C5BA;
            border-radius: 10px;
            padding: 35px;
            text-align: center;
            color: #4B5468;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 14px;
            }

            .service-card {
                padding: 17px;
            }

            .action-buttons {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Layanan Saya</h1>

    <p class="subtitle">
        Daftar layanan yang kamu tawarkan di BoostCV.
    </p>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('creator.services.create') }}" class="add-button">
        + Tambah Layanan
    </a>

    @forelse ($services as $service)

        <div class="service-card">

            <h3>{{ $service->title }}</h3>

            <p>{{ $service->description }}</p>

            <p class="price">
                Rp {{ number_format($service->price, 0, ',', '.') }}
            </p>

            <p>
                <strong>Kategori:</strong>
                {{ $service->category->name ?? 'Tidak ada kategori' }}
            </p>

            <p>
                <strong>Estimasi Pengerjaan:</strong>
                {{ $service->estimated_days }} hari
            </p>

            <p>
                <strong>Batas Revisi:</strong>
                {{ $service->revision_limit }} kali
            </p>

            <p>
                <strong>Status:</strong>

                <span class="status status-{{ $service->status }}">
                    {{ ucfirst($service->status) }}
                </span>
            </p>

            @if ($service->status == 'rejected' && $service->admin_note)
                <div class="rejection-note">
                    <strong>Alasan Penolakan:</strong>
                    <p>{{ $service->admin_note }}</p>
                </div>
            @endif

            <div class="action-buttons">

                <a href="{{ route('creator.services.edit', $service->id) }}"
                   class="edit-button">
                    Edit
                </a>

                <form action="{{ route('creator.services.destroy', $service->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-button">
                        Hapus
                    </button>

                </form>

            </div>

        </div>

    @empty

        <div class="empty-state">
            <h3>Belum Ada Layanan</h3>
            <p>Kamu belum menambahkan layanan apa pun.</p>
            <p>Tekan tombol Tambah Layanan untuk memulai.</p>
        </div>

    @endforelse

</div>

</body>
</html>
