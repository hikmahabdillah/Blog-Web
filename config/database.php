<?php
function connectDatabase()
{
  $serverName = "DESKTOP-OF0MEVA\\SQLEXPRESS"; // Nama atau IP server SQL Server
  $database = "BlogWebsite";
  
  try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database;");
    return $conn;
  } catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
  }
}

// phpinfo();
