<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Portofolio | BoostCV</title>
</head>
<body>

    <h1>Edit Portofolio</h1>

    <form action="{{ route('portofolio.update', $portofolio->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label>Judul Portofolio</label>
            <input type="text" name="title"
                   value="{{ old('title', $portofolio->title) }}" required>

            @error('title')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Deskripsi</label>
            <textarea name="description">{{ old('description', $portofolio->description) }}</textarea>

            @error('description')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Gambar Portofolio Baru (Opsional)</label>
            <input type="file" name="image" accept="image/*">

            @if ($portofolio->image)
                <p>Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $portofolio->image) }}"
                     width="150" alt="Gambar Portofolio">
            @endif

            @error('image')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>File Karya Baru (Opsional)</label>
            <input type="file" name="file_path">

            @if ($portofolio->file_path)
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
                   value="{{ old('project_url', $portofolio->project_url) }}">

            @error('project_url')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>

        <a href="{{ route('portofolio.index') }}">Kembali</a>

    </form>

</body>
</html>