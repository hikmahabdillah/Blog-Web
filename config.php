<?php
try {
  $serverName = "DESKTOP-OF0MEVA\\SQLEXPRESS"; // Nama atau IP server SQL Server
  $database = "BlogWebsite"; // Nama database

  // Menggunakan Trusted Connection untuk otentikasi Windows
  $conn = new PDO("sqlsrv:server=$serverName;Database=$database;");
  // echo "Koneksi berhasil!";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

// phpinfo();
?>
