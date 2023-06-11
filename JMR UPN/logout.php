<?php
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Arahkan ke halaman index.php setelah logout
echo "<script>alert('Logout Berhasil');</script>";
echo "<script>window.location.href = 'index.php';</script>";
exit();
?>