<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portfolio Creator | BoostCV</title>
</head>
<body>

    <h1>Portfolio Saya</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <a href="{{ route('portfolio.create') }}">
        + Tambah Portfolio
    </a>

    <hr>

    @forelse ($portfolios as $portfolio)

        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px;">

            <h2>{{ $portfolio->title }}</h2>

            <p>{{ $portfolio->description }}</p>

            @if ($portfolio->image)
                <img
                    src="{{ asset('storage/' . $portfolio->image) }}"
                    width="200"
                    alt="Gambar Portfolio"
                >
            @endif

            @if ($portfolio->project_url)
                <p>
                    <a href="{{ $portfolio->project_url }}" target="_blank">
                        Lihat Proyek
                    </a>
                </p>
            @endif

            <a href="{{ route('portfolio.edit', $portfolio->id) }}">
                Edit
            </a>

            <form action="{{ route('portfolio.destroy', $portfolio->id) }}"
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

        <p>Belum ada portfolio. Silakan tambahkan portfolio pertama kamu.</p>

    @endforelse

</body>
</html>