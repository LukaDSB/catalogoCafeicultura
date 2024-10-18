<?php
$servername = "localhost";
$username = "root";
$password = "*Movorurari123";
$dbname = "projetocafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cafes WHERE idcafes = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: /index.php");
        exit();
    } else {
        echo "Erro ao excluir registro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>