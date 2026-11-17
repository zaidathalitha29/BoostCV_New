<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portofolio Creator | BoostCV</title>
</head>
<body>

    <h1>Portofolio Saya</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <a href="{{ route('portofolio.create') }}">
        + Tambah Portofolio
    </a>

    <hr>

    @forelse ($portofolios as $portofolio)

        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px;">

            <h2>{{ $portofolio->title }}</h2>

            <p>{{ $portofolio->description }}</p>

            @if ($portofolio->image)
                <img
                    src="{{ asset('storage/' . $portofolio->image) }}"
                    width="200"
                    alt="Gambar Portofolio"
                >
            @endif

            @if ($portofolio->project_url)
                <p>
                    <a href="{{ $portofolio->project_url }}" target="_blank">
                        Lihat Proyek
                    </a>
                </p>
            @endif

            <a href="{{ route('portofolio.edit', $portofolio->id) }}">
                Edit
            </a>

            <form action="{{ route('portofolio.destroy', $portofolio->id) }}"
                  method="POST"
                  style="display: inline;">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>

            </form>

        </div>

    @empty

        <p>Belum ada portofolio. Silakan tambahkan portofolio pertama kamu.</p>

    @endforelse

</body>
</html>