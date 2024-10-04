<?php
    $servername = "localhost";
    $username = "root";
    $password = "*Movorurari123";
    $dbname = "frutoefruta";

    $nomereceita = $_POST['nomereceita'];
    $descricao = $_POST['descricao'];


    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO receita (nomereceita, descricao)
    VALUES ('" . $nomereceita ."','" . $descricao . "')";

    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>  