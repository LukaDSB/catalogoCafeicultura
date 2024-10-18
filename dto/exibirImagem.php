<?php
include_once '../modal/cafeModal.php';

if (isset($_GET['id'])) {
    $idCafe = $_GET['id'];

    $db = new CafeModal();

    $stmt = $db->conn->prepare("SELECT imagem, tipo_imagem FROM cafes WHERE idcafes = ?");
    $stmt->bind_param("i", $idCafe);
    $stmt->execute();
    $stmt->bind_result($imagem, $tipoImagem);
    $stmt->fetch();

    header("Content-Type: " . $tipoImagem);
    echo $imagem;

    $stmt->close();
    $db->closeConnection();
}
