
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BoostCV</title>

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
            max-width: 400px;
            background: #ffffff;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.08);
        }

        /* Logo */
        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 30px;
        }

        .logo span {
            color: #1e293b;
        }

        /* Heading */
        .login-header h2 {
            font-size: 24px;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .login-header p {
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
            padding: 12px 14px;
            border: 1px solid #dbe3ef;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Button */
        .btn-login {
            width: 100%;
            padding: 13px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 5px;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        /* Register */
        .register-link {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: #64748b;
        }

        .register-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
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
            .login-container {
                padding: 25px;
            }

            .login-header h2 {
                font-size: 21px;
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

        <!-- Heading -->
        <div class="login-header">
            <h2>Selamat datang kembali!</h2>
            <p>
                Masuk ke akunmu dan lanjutkan perjalanan
                membangun karier impianmu.
            </p>
        </div>

        <!-- Login Form -->
        <form action="#" method="POST">

            <div class="form-group">
                <label for="username">Email atau Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan email atau username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="btn-login">
                Masuk
            </button>

        </form>

        <!-- Register Link -->
        <div class="register-link">
            Belum punya akun?
            <a href="register.html">Daftar sekarang</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2026 BoostCV. Build your future.
        </div>

    </div>

</body>
</html>
