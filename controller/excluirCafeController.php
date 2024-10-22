<?php
include_once '../model/cafeModel.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $cafeModel = new CafeModel();
    $result = $cafeModel->excluirCafe($id);

    if ($result) {
        header("Location: /index.php");
        exit();
    } else {
        echo "Erro ao excluir registro: " . $result->error;
    }

    $stmt->close();
}

$conn->close();
?>