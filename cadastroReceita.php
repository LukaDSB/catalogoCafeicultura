<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de receitas</h1>
    <form action="postReceita.php" method="post">
        <p>
            <label for="nomereceita">Nome da receita:</label>
            <input type="text" name="nomereceita">
        </p>
        <p>
            <label for="descricao">Descricao da receita:</label>
            <input type="text" name="descricao">
        </p>
        <p>
            <button type="submit" formaction="postReceita.php">Enviar</button>
        </p>
    </form>
    
</body>
</html>