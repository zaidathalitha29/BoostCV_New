
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | BoostCV</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #eff6ff;
            padding: 30px 20px;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(37, 99, 235, 0.08);
        }

        /* Logo */
        .logo {
            font-size: 27px;
            font-weight: 800;
            color: #2563eb;
            margin-bottom: 30px;
            letter-spacing: -1px;
        }

        .logo span {
            color: #1e293b;
        }

        /* Header */
        .register-header h2 {
            font-size: 25px;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .register-header p {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        /* Form */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dbe3ef;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
            color: #1e293b;
        }

        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-group input::placeholder {
            color: #a0aec0;
        }

        /* Error */
        .error-message {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* Button */
        .btn-register {
            width: 100%;
            padding: 14px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 5px;
        }

        .btn-register:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #64748b;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 700;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            margin-top: 30px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .register-container {
                padding: 28px 24px;
            }

            .register-header h2 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <div class="register-container">

        <!-- Logo -->
        <div class="logo">
            Boost<span>CV.</span>
        </div>

        <!-- Header -->
        <div class="register-header">
            <h2>Buat akun baru</h2>
            <p>
                Mulai langkahmu menuju karier impian
                bersama BoostCV.
            </p>
        </div>

        <!-- Error Register -->
        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Register Form -->
        <form action="{{ route("#") }}" method="POST">

            @csrf
            <!-- Nama Lengkap -->
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                @error('password')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn-register">
                Daftar
            </button>

        </form>

        <!-- Login Link -->
        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login sekarang</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} BoostCV. Build your future.
        </div>

    </div>

</body>
</html>
