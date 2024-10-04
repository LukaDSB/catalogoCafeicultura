<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de receitas</h1>
    <form action="file.php" method="post" enctype="multipart/form-data">
        <p>
            <input name="imagem" id="imagem" type="file" required>
        </p>
        <p>
            <input type="submit" value="Enviar imagem">
        </p>
    </form>
</body>
</html>