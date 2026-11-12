<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Portfolio | BoostCV</title>
</head>
<body>

    <h1>Tambah Portfolio</h1>

    <form action="{{ route('portfolio.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div>
            <label>Judul Portfolio</label>
            <input type="text" name="title"
                   value="{{ old('title') }}" required>
            @error('title')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Deskripsi</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Gambar Portfolio</label>
            <input type="file" name="image" accept="image/*">
            @error('image')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>File Karya</label>
            <input type="file" name="file_path">
            @error('file_path')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Link Proyek</label>
            <input type="url" name="project_url"
                   value="{{ old('project_url') }}">
            @error('project_url')
                <p style="color:red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan Portfolio</button>

        <a href="{{ route('portfolio.index') }}">Kembali</a>

    </form>

</body>
</html>