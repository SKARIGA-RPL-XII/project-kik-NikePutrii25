<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: #2563eb;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 18px;
            margin: 0;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            padding: 30px;
        }

        .alert-success {
            background: #e6fffa;
            color: #065f46;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .card h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .info {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h1>Dashboard User</h1>
        <a href="/logout">Logout</a>
    </div>

    <!-- CONTENT -->
    <div class="container">

        {{-- ALERT LOGIN BERHASIL --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <h2>Selamat Datang 👋</h2>

            <div class="info">
                <p><strong>Nama:</strong> {{ auth()->user()->nama }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Status Akun:</strong> {{ auth()->user()->status_akun }}</p>
            </div>

            <hr>

            <p>
                Dari dashboard ini, Anda dapat:
            </p>

            <ul>
                <li>📥 Menginput setoran susu</li>
                <li>📊 Melihat riwayat setoran</li>
                <li>💰 Melihat rekap pendapatan</li>
            </ul>

            <p style="margin-top: 15px; color:#888;">
                Silakan pilih menu untuk mulai menggunakan sistem.
            </p>
        </div>

    </div>

</body>
</html>
