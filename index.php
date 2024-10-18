<?php
include_once 'modal/cafeModal.php';

$db = new CafeModal();
$tiposDeCafe = $db->getTiposDeCafe();
$cafes = $db->getCafes();
$db->closeConnection();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cafeicultura</title>
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand poetsen-one-regular" href="#">Folhas do café</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Início</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tipos de café
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if ($tiposDeCafe->num_rows > 0) {
                                    while ($row = $tiposDeCafe->fetch_assoc()) {
                                        echo "<li><a class='dropdown-item' href='#'>" . $row["nome"] . "</a></li>";
                                    }
                                } else {
                                    echo "<li><a class='dropdown-item' href='#'>Nenhum tipo de café encontrado</a></li>";
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contato</a>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#modalCadastro">
                        Cadastrar novo cafe
                    </button>

                    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalCadastroLabel">Cadastrar novo café</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="dto/cadastroCafeDto.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="nome" class="col-form-label" style="color: black">Nome:</label>
                                            <input type="text" class="form-control" id="nome" name="nome">
                                        </div>
                                        <div class="mb-3">
                                            <label for="descricao" class="col-form-label"
                                                style="color: black">Descricao:</label>
                                            <textarea class="form-control" id="descricao" name="descricao"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="imagem">Imagem do Café:</label>
                                            <input type="file" id="imagem" name="imagem" accept="image/*" required>
                                        </div>
                                        <input type="submit" value="Cadastrar Café">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section id="main-carousel">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="src/imagens/quemsomos-marcela.jpg" class="d-block w-100 carousel-item-img"
                            alt="Aprenda mais sobre os tipos de café!">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="poetsen-one-regular">Estudando os tipos de café!</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="src/imagens/quemsomos-roberta.jpg" class="d-block w-100 carousel-item-img">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="poetsen-one-regular">Saiba qual é o café certo para você!</h2>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section>
            <h2 class="poetsen-one-regular">Estudando os tipos de café!</h2>
            <h4>Saiba qual é o café certo para você na hora de plantar!
            </h4>
        </section>
        <section id="main-receitas">
            <?php
            if ($cafes->num_rows > 0) {
                while ($row = $cafes->fetch_assoc()) {
                    echo "<div class='card'>
                            <img src='src/imagens/" . $row["imagem"] . "' class='card-img-top' alt=' " . $row["nome"] . " '>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row["nome"] . "</h5>
                                <p class='card-text'>" . $row["descricao"] . "</p>
                                <a href='#' class='btn btn-primary'>Ver receita</a>
                                <a href='dto/excluirCafeDto.php?id=" . $row["idcafes"] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este item?\");'>Excluir</a>
                            </div>
                        </div>";
                }
            } else {
                echo "<p>Nenhum café encontrado</p>";
            }
            ?>
        </section>
    </main>
    <footer class="d-flex align-items-center justify-content-center">
        <p>contato:<a href="cafeicultura@ifes.edu.br">cafeicultura@ifes.edu.br</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>