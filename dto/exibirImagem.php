<?php
include_once '../modal/cafeModal.php';

if (isset($_GET['id'])) {
    $idCafe = $_GET['id'];

    // Instanciar a classe CafeModal
    $db = new CafeModal();

    // Buscar a imagem no banco de dados
    $stmt = $db->conn->prepare("SELECT imagem, tipo_imagem FROM cafes WHERE idcafes = ?");
    $stmt->bind_param("i", $idCafe);
    $stmt->execute();
    $stmt->bind_result($imagem, $tipoImagem);
    $stmt->fetch();

    // Definir o cabeçalho apropriado e exibir a imagem
    header("Content-Type: " . $tipoImagem);
    echo $imagem;

    // Fechar a conexão
    $stmt->close();
    $db->closeConnection();
}
