<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: ../dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIPERPUS</title>

    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/auth.css">
</head>

<body>

    <div class="auth-container">

        <!-- ================= LEFT ================= -->

        <div class="auth-left">

            <img src="../assets/img/logo.png" class="logo" alt="Logo SIPERPUS">

            <h2>Selamat Datang Kembali</h2>

            <p class="subtitle">
                Silakan masuk untuk mengakses Sistem Informasi Perpustakaan.
            </p>

            <form action="proses_login.php" method="POST">

                <div class="form-group">
                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan Username"
                        required>
                </div>

                <div class="form-group">
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan Password"
                        required>
                </div>

                <button type="submit" class="btn">
                    Masuk
                </button>

            </form>

            <p class="bottom-text">
                Belum memiliki akun?
                <a href="register.php">Daftar Sekarang</a>
            </p>

        </div>

        <!-- ================= RIGHT ================= -->

        <div class="auth-right">

            <div class="auth-content">

                <img src="../assets/img/logo.png" class="logo-panel" alt="Logo SIPERPUS">

                <h1>SIPERPUS</h1>

                <p>
                    Kelola perpustakaan dengan lebih mudah,
                    cepat, dan efisien melalui satu sistem terintegrasi.
                </p>

                <ul>

                    <li>📚 Manajemen Buku</li>

                    <li>👥 Data Anggota</li>

                    <li>📝 Peminjaman Buku</li>

                    <li>📊 Laporan Perpustakaan</li>

                </ul>

            </div>

        </div>

    </div>

</body>

</html>