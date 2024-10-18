<?php
include_once '../modal/cafeModal.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $diretorio = '../src/imagens/';
        
        $nomeImagem = uniqid() . '.jpg';

        $caminhoImagem = $diretorio . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
            $cafeModal = new CafeModal();

            $result = $cafeModal->cadastrarCafe($nome, $descricao, $nomeImagem);

            if ($result) {
                header('Location: ../index.php');
            } else {
                echo "Erro ao cadastrar café.";
            }

            $cafeModal->closeConnection();
        } else {
            echo "Erro ao mover o arquivo da imagem.";
        }
    } else {
        echo "Nenhuma imagem foi enviada.";
    }
} else {
    echo "Método de requisição inválido.";
}
