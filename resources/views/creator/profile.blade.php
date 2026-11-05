<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Creator | BoostCV</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        h1 {
            color: #333;
        }

        .profile {
            margin-top: 25px;
        }

        .profile p {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .button {
            display: inline-block;
            padding: 10px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Profil Creator</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    
            @if (session('error'))
                <p style="color: red;">
                    {{ session('error') }}
                </p>
            @endif

    @if ($creator)

        <div class="profile">

            @if ($creator->photo)
                <img src="{{ asset('storage/' . $creator->photo) }}"
                     class="photo"
                     alt="Foto Creator">
            @endif

            <h2>{{ $creator->display_name }}</h2>

            <p><strong>Profesi:</strong> {{ $creator->profession }}</p>

            <p><strong>Bio:</strong> {{ $creator->bio }}</p>

            <p><strong>Lokasi:</strong> {{ $creator->location }}</p>

            <p><strong>Telepon:</strong> {{ $creator->phone }}</p>

            <p><strong>Website:</strong> {{ $creator->website }}</p>

            <p><strong>Instagram:</strong> {{ $creator->instagram }}</p>

            <p><strong>LinkedIn:</strong> {{ $creator->linkedin }}</p>

            <a href="{{ route('creator.edit') }}">Edit Profil</a>
        </div>

    @else

        <p>Profil Creator belum tersedia.</p>

    @endif

</div>

</body>
</html>
