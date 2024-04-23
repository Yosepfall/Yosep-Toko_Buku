<?php
session_start();

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah username dan password kosong
    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("Location: login.php?error=empty_fields");
        exit();
    } else {
        // Lakukan proses autentikasi (contoh sederhana, bisa diganti sesuai kebutuhan)
        $username = $_POST['email'];
        $password = $_POST['password'];

        // Misalnya, lakukan pengecekan sederhana
        if ($username === "kasir" && $password === "12345") {
            // Autentikasi berhasil, atur sesi dan redirect ke halaman selamat datang
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            // Autentikasi gagal, redirect kembali ke halaman login dengan pesan kesalahan
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    }
}
?>
