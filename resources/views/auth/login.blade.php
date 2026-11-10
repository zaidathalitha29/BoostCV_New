<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk — BoostCV</title>
    <meta name="description" content="Masuk ke akun BoostCV dan kelola kebutuhan CV profesionalmu.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        :root {
            --ink: #1C2434;
            --ink-soft: #4B5468;
            --paper: #FBFAF7;
            --paper-raised: #FFFFFF;
            --line: #E4E1D8;
            --navy: #223A66;
            --navy-deep: #16264A;
            --gold: #C98A2C;
            --gold-soft: #F3E2C2;
            --danger: #B42318;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: var(--navy);
        }

        a:hover {
            color: var(--navy-deep);
            text-decoration: none;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container-narrow {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .navbar {
            background: var(--paper) !important;
            border-bottom: 1px solid var(--line);
            padding: 18px 0;
        }

        .navbar-brand {
            font-family: 'Fraunces', serif;
            font-size: 23px;
            font-weight: 600;
            color: var(--ink) !important;
        }

        .navbar-brand span {
            color: var(--navy);
        }

        .navbar-nav .nav-link {
            color: var(--ink-soft) !important;
            font-size: 15px;
            font-weight: 500;
            padding: 8px 16px !important;
        }

        .navbar-nav .nav-link:hover {
            color: var(--ink) !important;
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 22px;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--navy);
            border-color: var(--navy);
            color: #fff !important;
        }

        .btn-primary:hover {
            background: var(--navy-deep);
            border-color: var(--navy-deep);
            transform: translateY(-1px);
        }

        .login-section {
            flex: 1;
            padding: 70px 0 90px;
        }

        .login-wrapper {
            max-width: 1080px;
            margin: 0 auto;
        }

        .login-row {
            min-height: 620px;
        }

        .login-intro {
            padding: 35px 55px 35px 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: var(--navy);
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .eyebrow::before {
            content: "";
            width: 28px;
            height: 1px;
            background: var(--gold);
        }

        .login-intro h1 {
            font-family: 'Fraunces', serif;
            font-size: 48px;
            line-height: 1.12;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 20px;
            max-width: 500px;
        }

        .login-intro h1 em {
            color: var(--navy);
            font-style: italic;
        }

        .login-intro .intro-text {
            color: var(--ink-soft);
            font-size: 16px;
            line-height: 1.7;
            max-width: 460px;
            margin-bottom: 34px;
        }

        .benefit-list {
            margin-top: 25px;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 20px;
        }

        .benefit-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 8px;
            background: var(--gold-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .benefit-content strong {
            display: block;
            color: var(--ink);
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .benefit-content span {
            display: block;
            color: var(--ink-soft);
            font-size: 13.5px;
            line-height: 1.5;
        }

        .login-card {
            background: var(--paper-raised);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 42px 40px;
            box-shadow: 0 22px 55px rgba(22, 38, 74, 0.08);
        }

        .login-card-header {
            margin-bottom: 30px;
        }

        .login-card-header h2 {
            font-family: 'Fraunces', serif;
            color: var(--ink);
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .login-card-header p {
            color: var(--ink-soft);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: var(--ink);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            height: 46px;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: #fff;
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            padding: 10px 14px;
            box-shadow: none !important;
        }

        .form-control::placeholder {
            color: #9A9FA9;
        }

        .form-control:focus {
            border-color: var(--navy);
            box-shadow: 0 0 0 3px rgba(34, 58, 102, 0.08) !important;
        }

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        .invalid-feedback {
            font-size: 12px;
            margin-top: 6px;
            color: var(--danger);
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 6px 0 22px;
        }

        .custom-control-label {
            color: var(--ink-soft);
            font-size: 13px;
            cursor: pointer;
        }

        .custom-control-input:checked ~ .custom-control-label::before {
            border-color: var(--navy);
            background-color: var(--navy);
        }

        .forgot-password {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy);
        }

        .forgot-password:hover {
            color: var(--navy-deep);
        }

        .login-btn {
            width: 100%;
            height: 48px;
            margin-top: 4px;
            font-size: 14px;
        }

        .register-text {
            text-align: center;
            margin-top: 23px;
            margin-bottom: 0;
            color: var(--ink-soft);
            font-size: 13.5px;
        }

        .register-text a {
            color: var(--navy);
            font-weight: 700;
        }

        .simple-footer {
            padding: 22px 0;
            border-top: 1px solid var(--line);
            color: #778091;
            font-size: 12px;
            text-align: center;
            background: var(--paper);
        }

        @media (max-width: 991px) {
            .login-intro {
                padding-right: 20px;
            }

            .login-intro h1 {
                font-size: 42px;
            }

            .login-card {
                padding: 35px 30px;
            }
        }

        @media (max-width: 767px) {
            .container-narrow {
                padding-left: 20px;
                padding-right: 20px;
            }

            .navbar {
                padding: 14px 0;
            }

            .login-section {
                padding: 45px 0 60px;
            }

            .login-row {
                min-height: auto;
            }

            .login-intro {
                padding: 0 0 35px;
            }

            .login-intro h1 {
                font-size: 36px;
            }

            .login-intro .intro-text {
                font-size: 15px;
            }

            .login-card {
                padding: 32px 25px;
            }

            .login-card-header h2 {
                font-size: 27px;
            }
        }

        @media (max-width: 480px) {
            .login-intro h1 {
                font-size: 32px;
            }

            .login-card {
                padding: 28px 20px;
            }

            .remember-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>
</head>

<body>
<div class="login-page">
    <nav class="navbar navbar-light">
        <div class="container-narrow w-100">
            <div class="d-flex align-items-center justify-content-between">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Boost<span>CV</span>
                </a>

                <a href="{{ route('register') }}" class="btn btn-primary">
                    Daftar
                </a>
            </div>
        </div>
    </nav>

    <section class="login-section">
        <div class="container-narrow">
            <div class="login-wrapper">
                <div class="row align-items-center login-row">
                    <div class="col-lg-6">
                        <div class="login-intro">
                            <div class="eyebrow">
                                Selamat datang kembali
                            </div>

                            <h1>
                                Kembali ke
                                <em>perjalananmu.</em>
                            </h1>

                            <p class="intro-text">
                                Masuk ke akun BoostCV untuk melanjutkan proses
                                mencari creator dan mendapatkan CV yang sesuai
                                dengan kebutuhanmu.
                            </p>

                            <div class="benefit-list">
                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        ✓
                                    </div>

                                    <div class="benefit-content">
                                        <strong>
                                            Lanjutkan dari yang terakhir
                                        </strong>

                                        <span>
                                            Akses kembali akun dan proses yang
                                            sedang kamu kerjakan.
                                        </span>
                                    </div>
                                </div>

                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        ✦
                                    </div>

                                    <div class="benefit-content">
                                        <strong>
                                            Temukan layanan yang tepat
                                        </strong>

                                        <span>
                                            Pilih layanan CV sesuai kebutuhan
                                            dan tujuan kariermu.
                                        </span>
                                    </div>
                                </div>

                                <div class="benefit-item">
                                    <div class="benefit-icon">
                                        →
                                    </div>

                                    <div class="benefit-content">
                                        <strong>
                                            Kelola semuanya di BoostCV
                                        </strong>

                                        <span>
                                            Nikmati proses yang lebih sederhana
                                            dalam satu platform.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="login-card">
                            <div class="login-card-header">
                                <h2>
                                    Masuk ke akun
                                </h2>

                                <p>
                                    Masukkan email dan password untuk melanjutkan.
                                </p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">
                                        Email
                                    </label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">
                                        Password
                                    </label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="remember-row">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="remember">
                                            Ingat saya
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))

                                        <a class="forgot-password" href="{{ route('password.request') }}">
                                            Lupa password?
                                        </a>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary login-btn">
                                    Masuk
                                </button>

                                <p class="register-text">
                                    Belum punya akun?
                                    <a href="{{ route('register') }}">
                                        Buat akun di sini
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="simple-footer">
        <div class="container-narrow">
            &copy; {{ date('Y') }} BoostCV.
            All rights reserved.
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>