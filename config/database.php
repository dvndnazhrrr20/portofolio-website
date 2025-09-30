<?php
// Pengaturan Database dari Variabel Lingkungan Railway
$host = getenv('MYSQLHOST');
$db_name = getenv('MYSQLDATABASE');
$username = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');
$port = getenv('MYSQLPORT');

// Buat koneksi
try {
    $pdo = new PDO("mysql:host={$host};port={$port};dbname={$db_name}", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>