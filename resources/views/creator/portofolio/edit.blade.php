<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Portfolio | BoostCV</title>
</head>
<body>

    <h1>Edit Portfolio</h1>

    <form action="{{ route('portfolio.update', $portfolio->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label>Judul Portfolio</label>
            <input type="text" name="title"
                   value="{{ old('title', $portfolio->title) }}" required>

            @error('title')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Deskripsi</label>
            <textarea name="description">{{ old('description', $portfolio->description) }}</textarea>

            @error('description')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Gambar Portfolio Baru (Opsional)</label>
            <input type="file" name="image" accept="image/*">

            @if ($portfolio->image)
                <p>Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $portfolio->image) }}"
                     width="150" alt="Gambar Portfolio">
            @endif

            @error('image')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>File Karya Baru (Opsional)</label>
            <input type="file" name="file_path">

            @if ($portfolio->file_path)
                <p>File karya sudah tersedia.</p>
            @endif

            @error('file_path')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Link Proyek</label>
            <input type="url" name="project_url"
                   value="{{ old('project_url', $portfolio->project_url) }}">

            @error('project_url')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>

        <a href="{{ route('portfolio.index') }}">Kembali</a>

    </form>

</body>
</html>