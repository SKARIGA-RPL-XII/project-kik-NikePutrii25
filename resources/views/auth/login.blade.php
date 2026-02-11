<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="login-page">
        <div class="login-bg"></div>

        <div class="login-card">
            <img src="{{ asset('images/LogoFiks.png') }}" alt="Logo" class="logo">

            <div class="login-header">
                <h1>Selamat Datang Kembali</h1>
                <p>Silakan masuk untuk mengelola data setoran susu dan melihat laporan pendapatan Anda.</p>
            </div>

            <form action="{{ route('login.process') }}" method="POST" class="login-form">
                @csrf

                <div class="form-group">
                    <label>Email <span>*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email"
                        class="@error('email') is-invalid @enderror">

                    @error('email')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Password <span>*</span></label>
                    <input type="password" name="password" placeholder="Masukkan password"
                        class="@error('password') is-invalid @enderror">

                    @error('password')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <div class="remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ingat Saya</label>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>

            <div class="register">
                <span>Belum Punya Akun?</span>
                <a href="/register">Daftar</a>
            </div>
        </div>
    </div>

</body>

</html>