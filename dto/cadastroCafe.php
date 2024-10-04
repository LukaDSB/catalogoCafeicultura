<?php
    $servername = "localhost";
    $username = "root";
    $password = "*Movorurari123";
    $dbname = "projetocafe";

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];


    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    if (empty($nome)) {
        echo "Erro: O campo nome da receita não pode estar vazio.";
    }

    $sql = "INSERT INTO cafes (nome, descricao)
    VALUES ('" . $nome ."','" . $descricao . "')";

    if (mysqli_query($conn, $sql)) {
        header("Location: /index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>  