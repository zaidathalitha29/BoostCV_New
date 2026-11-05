<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BoostCV</title>

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
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
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
            margin-bottom: 35px;
            letter-spacing: -1px;
        }

        .logo span {
            color: #1e293b;
        }

        /* Header */
        .login-header h2 {
            font-size: 25px;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .login-header p {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 9px;
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
        .btn-login {
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

        .btn-login:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* Register */
        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #64748b;
        }

        .register-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 700;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            margin-top: 35px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 28px 24px;
            }

            .login-header h2 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <!-- Logo -->
        <div class="logo">
            Boost<span>CV.</span>
        </div>

        <!-- Header -->
        <div class="login-header">
            <h2>Selamat datang kembali!</h2>
            <p>
                Masuk ke akunmu dan lanjutkan perjalanan
                membangun karier impianmu bersama BoostCV.
            </p>
        </div>

        <!-- Error Login -->
        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">

            @csrf

            <!-- Email / Username -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
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

            <!-- Login Button -->
            <button type="submit" class="btn-login">
                Masuk
            </button>

        </form>

        <!-- Register Link -->
        <div class="register-link">
            Belum punya akun?
            <a href="{{ route('#') }}">Daftar sekarang</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} BoostCV. Build your future.
        </div>

    </div>

</body>
</html>
