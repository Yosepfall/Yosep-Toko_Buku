<?php
session_start(); // Mulai sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, redirect ke halaman login
    header("Location: login_form.php");
    exit();
}
?>

<?php include '../../layout/header.php'; ?>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<p>This is the welcome page. You are logged in as a cashier.</p>
<a href="logout.php">Logout</a>

<?php include '../../layout/footer.php'; ?>
