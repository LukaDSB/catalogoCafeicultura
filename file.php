<?php


salvarImagemConvertidaParaJPG("1");

?>


<?php
function salvarImagemConvertidaParaJPG($novoNomeArquivo) {
    // Verifica se um arquivo foi enviado corretamente
    if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
        echo "Erro: Nenhum arquivo foi enviado ou ocorreu um erro no upload.";
        return;
    }

    // Verifica se o arquivo temporário existe e é legível
    $arquivoTemporario = $_FILES["imagem"]["tmp_name"];
    if (!file_exists($arquivoTemporario) || !is_readable($arquivoTemporario)) {
        //echo "Erro: O arquivo temporário não está acessível.";
        return;
    }

    // Verifica se o arquivo é uma imagem real
    $verificarImagem = getimagesize($arquivoTemporario);
    if ($verificarImagem === false) {
        echo "O arquivo enviado não é uma imagem válida.";
        return;
    }

    // Diretório onde a imagem será salva
    $diretorioDestino = "uploads/";

    // Nome do arquivo a ser salvo (sem extensão)
    $nomeArquivoSemExtensao = pathinfo($novoNomeArquivo, PATHINFO_FILENAME);

    // Caminho completo para salvar como .jpg
    $caminhoCompleto = $diretorioDestino . $nomeArquivoSemExtensao . ".jpg";

    // Verifica se a pasta "uploads" existe, se não, cria
    if (!is_dir($diretorioDestino) && !mkdir($diretorioDestino, 0777, true)) {
        echo "Erro: Não foi possível criar o diretório de upload.";
        return;
    }

    // Identifica o tipo MIME da imagem
    $tipoImagem = $verificarImagem['mime'];

    switch ($tipoImagem) {
        case 'image/jpeg':
            // Se já for JPEG, apenas move para o destino
            if (move_uploaded_file($arquivoTemporario, $caminhoCompleto)) {
                echo "A imagem foi salva como JPG.";
            } else {
                echo "Erro ao mover o arquivo JPG.";
            }
            return;
        case 'image/png':
            // Se for PNG, converte para JPG
            $imagem = imagecreatefrompng($arquivoTemporario);
            break;
        case 'image/gif':
            // Se for GIF, converte para JPG
            $imagem = imagecreatefromgif($arquivoTemporario);
            break;
        case 'image/webp':
            // Se for WEBP, converte para JPG
            $imagem = imagecreatefromwebp($arquivoTemporario);
            break;
        default:
            echo "Erro: Formato de arquivo não suportado. Apenas JPG, PNG, GIF, e WEBP são aceitos.";
            return;
    }

    // Se a imagem foi carregada com sucesso, converte para JPG
    if (isset($imagem)) {
        if (imagejpeg($imagem, $caminhoCompleto, 100)) {
            echo "A imagem foi convertida e salva como " . htmlspecialchars($nomeArquivoSemExtensao) . ".jpg";
        } else {
            echo "Erro ao salvar a imagem convertida.";
        }
        // Libera a memória
        imagedestroy($imagem);
    } else {
        echo "Erro: Não foi possível criar a imagem a partir do arquivo enviado.";
    }
}

?>
