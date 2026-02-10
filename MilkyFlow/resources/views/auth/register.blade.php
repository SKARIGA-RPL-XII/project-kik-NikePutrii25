<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>

    <div class="register-page">
        <div class="register-bg"></div>

        <div class="register-card">
            <img src="{{ asset('images/LogoFiks.png') }}" alt="Logo" class="logo">

            <div class="register-header">
                <h1>Buat Akun Baru</h1>
                <p>Daftarkan akun Anda untuk mulai mencatat setoran susu dan memantau pendapatan secara berkala.</p>
            </div>

            <form action="{{ route('register.process') }}" method="POST" class="register-form">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label>Nama <span class="required">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Password <span class="required">*</span></label>
                        <input type="password" name="password" id="passwordInput" required>

                        <small id="passwordHint" class="password-hint">
                            Minimal 8 karakter
                        </small>

                        @error('password')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password <span class="required">*</span></label>
                        <input type="password" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>No HP <span class="required">*</span></label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Alamat <span class="required">*</span></label>
                    <textarea name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn-register">Daftar</button>
            </form>

            <div class="login">
                <span>Sudah Punya Akun?</span>
                <a href="/login">Login</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('passwordInput');
            const passwordHint = document.getElementById('passwordHint');

            if (!passwordInput || !passwordHint) {
                console.log('passwordInput / passwordHint tidak ditemukan');
                return;
            }

            passwordInput.addEventListener('input', function () {
                if (this.value.length >= 8) {
                    passwordHint.style.display = 'none';
                } else {
                    passwordHint.style.display = 'block';
                    passwordHint.textContent = 'Minimal 8 karakter';
                }
            });
        });
    </script>

</body>

</html>