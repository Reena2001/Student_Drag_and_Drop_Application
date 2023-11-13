<?php
$servername = "localhost";
$username = "root";
$password = "Reena9801";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    foreach ($data as $index => $item) {
        $stmt = $conn->prepare("UPDATE students SET sort_rank = ? WHERE id = ?");
        $stmt->bind_param('ii', $item['sort_rank'], $item['id']);
        $stmt->execute();
    }

    $stmt->close();
}

$conn->close();
?>
