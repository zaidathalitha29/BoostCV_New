<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan | BoostCV</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #FBFAF7;
            color: #1C2434;
            margin: 0;
            padding: 35px 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #FFFFFF;
            padding: 35px;
            border: 1px solid #E4E1D8;
            border-radius: 14px;
        }

        h1 {
            margin-top: 0;
            font-size: 27px;
        }

        .subtitle {
            color: #4B5468;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #E4E1D8;
            border-radius: 7px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #223A66;
        }

        .error {
            color: #B42318;
            font-size: 13px;
            margin-top: 6px;
        }

        .thumbnail-preview {
            width: 150px;
            margin-top: 10px;
            border-radius: 8px;
            display: block;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #223A66;
            color: white;
        }

        .btn-secondary {
            background: #F3E2C2;
            color: #1C2434;
        }

        @media (max-width: 600px) {
            .container {
                padding: 22px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Edit Layanan</h1>
    <p class="subtitle">Perbarui informasi layanan yang kamu tawarkan.</p>

    <form action="{{ route('creator.services.update', $service->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Layanan</label>
            <input type="text" name="title"
                   value="{{ old('title', $service->title) }}"
                   required>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" required>
                <option value="">Pilih kategori</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi Layanan</label>
            <textarea name="description" required>{{ old('description', $service->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" min="0" step="1000"
                   value="{{ old('price', $service->price) }}"
                   required>
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Estimasi Pengerjaan (Hari)</label>
            <input type="number" name="estimated_days" min="1"
                   value="{{ old('estimated_days', $service->estimated_days) }}"
                   required>
            @error('estimated_days')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Batas Revisi</label>
            <input type="number" name="revision_limit" min="0"
                   value="{{ old('revision_limit', $service->revision_limit) }}"
                   required>
            @error('revision_limit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Thumbnail Layanan</label>

            @if ($service->thumbnail)
                <img
                    src="{{ asset('storage/' . $service->thumbnail) }}"
                    alt="Thumbnail layanan"
                    class="thumbnail-preview">
                <p>Thumbnail saat ini</p>
            @endif

            <input type="file" name="thumbnail" accept=".jpg,.jpeg,.png">
            <small>Kosongkan jika tidak ingin mengganti thumbnail.</small>

            @error('thumbnail')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="buttons">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('creator.services.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

</body>
</html>
