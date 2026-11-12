<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan | BoostCV</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: #FBFAF7;
            color: #1C2434;
        }

        .container {
            max-width: 750px;
            margin: auto;
            padding: 32px;
            background: #FFFFFF;
            border: 1px solid #E4E1D8;
            border-radius: 12px;
        }

        h2 {
            margin-top: 0;
            color: #223A66;
        }

        .subtitle {
            color: #4B5468;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #E4E1D8;
            border-radius: 7px;
            font-size: 14px;
            font-family: inherit;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        button, .back-button {
            padding: 12px 20px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        button {
            background: #223A66;
            color: white;
        }

        .back-button {
            background: #F3E2C2;
            color: #1C2434;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Tambah Layanan</h2>
    <p class="subtitle">
        Lengkapi informasi layanan yang ingin kamu tawarkan.
    </p>

    <form action="{{ route('creator.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="form-group">
            <label>Nama Layanan</label>
            <input type="text" name="title" placeholder="Contoh: Jasa Pembuatan CV">        
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Deskripsi Layanan</label>
            <textarea name="description" placeholder="Jelaskan layanan yang kamu tawarkan..."></textarea>        
        </div>

        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" placeholder="Contoh: 50000">        
        </div>

        <div class="form-group">
            <label>Estimasi Pengerjaan (Hari)</label>
            <input type="number" name="estimated_days" value="3" min="1">
        </div>

        <div class="form-group">
            <label>Batas Revisi</label>
            <input type="number" name="revision_limit" value="1" min="0">
        </div>

        <div class="form-group">
            <label>Thumbnail Layanan</label>
            <input type="file" name="thumbnail" accept="image/*">
        </div>

        <div class="buttons">
            <a href="{{ route('creator.services.index') }}"
               class="back-button">Kembali</a>

            <button type="submit">Simpan Layanan</button>
        </div>

    </form>

</div>

</body>
</html>
