<?php

require_once '../config/config.php';

$tema = $_GET['tema'] ?? null;

if (!$tema) {

    header("Location:index.php");
    exit;
}

$arquivoCurso = "../app/Cursos/{$tema}.php";

if (!file_exists($arquivoCurso)) {

    die("Curso não encontrado");
}

$curso = require $arquivoCurso;

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>

        <?= $curso['titulo'] ?>

    </title>

    <link rel="stylesheet"href="assets/css/curso.css">
    <script src="assets/js/script.js"></script>
</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="assets/img/senai.png">

            <div class="logo-text">

                <h2>Corporate Training</h2>

                <span>

                    TREINAMENTO

                </span>

            </div>

        </div>

    </header>

    <main class="curso-wrapper">

        <div class="curso-box">

            <h1>

                <?= $curso['titulo'] ?>

            </h1>

            <p class="descricao">

                <?= $curso['descricao'] ?>

            </p>

            <?php foreach ($curso['conteudo'] as $bloco): ?>

                <div class="aula">

                    <h2>

                        <?= $bloco['titulo'] ?>

                    </h2>

                    <p>

                        <?= $bloco['texto'] ?>

                    </p>

                </div>

            <?php endforeach; ?>

            <a

                href="quiz.php?tema=<?= $tema ?>"

                class="btn-iniciar">

                Iniciar Avaliação

            </a>

        </div>

    </main>

</body>

</html>