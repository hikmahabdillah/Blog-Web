<?php
include 'config.php';  // Menghubungkan dengan file koneksi

try {
    $stmt = $conn->query("SELECT * FROM Posts");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Title: " . $row['Title'] . "<br>";
        echo "Content: " . $row['Content'] . "<br>";
        echo "Published Date: " . $row['PublishedDate'] . "<br><hr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
