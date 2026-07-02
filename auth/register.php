<?php
session_start();

require_once "../class/user.php";

$user = new User();

if (isset($_POST['register'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($user->register($nama, $username, $password, $role)) {
        echo "<script>
                alert('Registrasi berhasil!');
                window.location='login.php';
              </script>";
    } else {
        echo "<script>
                alert('Registrasi gagal!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | SIPERPUS</title>

    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/auth.css">

</head>

<body>

<div class="auth-container">

    <!-- ================= LEFT ================= -->

    <div class="auth-left">

        <img src="../assets/img/logo.png" class="logo" alt="Logo SIPERPUS">

        <h2>Buat Akun Baru</h2>

        <p class="subtitle">
            Lengkapi data di bawah untuk membuat akun baru di Sistem Informasi Perpustakaan.
        </p>

        <form method="POST">

            <div class="form-group">

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    placeholder="Nama Lengkap"
                    required>

            </div>

            <div class="form-group">

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="Username"
                    required>

            </div>

            <div class="form-group">

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Password"
                    required>

            </div>

            <div class="form-group">

                <select
                    name="role"
                    class="form-control"
                    required>

                    <option value="">-- Pilih Role --</option>

                    <option value="admin">Admin</option>

                    <option value="petugas">Petugas</option>

                </select>

            </div>

            <button
                type="submit"
                name="register"
                class="btn">

                Daftar

            </button>

        </form>

        <p class="bottom-text">

            Sudah memiliki akun?

            <a href="login.php">Masuk Sekarang</a>

        </p>

    </div>

    <!-- ================= RIGHT ================= -->

    <div class="auth-right">

        <div class="auth-content">

            <img
                src="../assets/img/logo.png"
                class="logo-panel"
                alt="Logo SIPERPUS">

            <h1>SIPERPUS</h1>

            <p>

                Bergabunglah dan mulai kelola data perpustakaan
                dengan sistem yang mudah, cepat, dan efisien.

            </p>

            <ul>

                <li>📚 Kelola Data Buku</li>

                <li>👥 Kelola Data Anggota</li>

                <li>📝 Kelola Peminjaman</li>

                <li>📊 Cetak Laporan</li>

            </ul>

        </div>

    </div>

</div>

</body>

</html>