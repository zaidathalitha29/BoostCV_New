<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Profil Creator | BoostCV</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 7px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        textarea {
            height: 100px;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Buat Profil Creator</h1>
    <p>Lengkapi informasi profil profesional kamu.</p>

    <form action="{{ route('creator.store') }}" method="POST">
        @csrf

        <label>Nama Creator</label>
        <input type="text" name="display_name"
               value="{{ old('display_name') }}" required>

        <label>Bio</label>
        <textarea name="bio">{{ old('bio') }}</textarea>

        <label>Profesi</label>
        <input type="text" name="profession"
               value="{{ old('profession') }}">

        <label>Lokasi</label>
        <input type="text" name="location"
               value="{{ old('location') }}">

        <label>Nomor Telepon</label>
        <input type="text" name="phone"
               value="{{ old('phone') }}">

        <label>Website</label>
        <input type="url" name="website"
               value="{{ old('website') }}">

        <label>Instagram</label>
        <input type="text" name="instagram"
               value="{{ old('instagram') }}">

        <label>LinkedIn</label>
        <input type="text" name="linkedin"
               value="{{ old('linkedin') }}">

        <button type="submit">Simpan Profil</button>

    </form>

</div>

</body>
</html>