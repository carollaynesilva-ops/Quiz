<?php

require_once '../config/config.php';
require_once '../app/Classes/Database.php';

$curso = null;
$tema = $_GET['tema'] ?? null;
$id = $_GET['id'] ?? null;

/* ========================= */
/* CURSOS FIXOS */
/* ========================= */

if ($tema) {

    $arquivoCurso = "../app/Cursos/{$tema}.php";

    if (!file_exists($arquivoCurso)) {

        die("Curso não encontrado");
    }

    $curso = require $arquivoCurso;
}

/* ========================= */
/* CURSOS DO ADMIN */
/* ========================= */ elseif ($id) {

    $conn = Database::conectar();

    $sql = $conn->prepare(

        "SELECT *
    FROM quizzes
    WHERE id=:id"

    );

    $sql->execute([

        ':id' => $id

    ]);

    $quiz = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$quiz) {

        die("Curso não encontrado");
    }

    $curso = [

        'titulo' => $quiz['titulo'],

        'descricao' => 'Treinamento criado pela empresa.',

        'conteudo' => [

            [

                'titulo' => 'Conteúdo',

                'texto' => $quiz['curso']

            ]

        ],

        'imagem' => $quiz['imagem']

    ];
} else {

    header("Location:index.php");
    exit;
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>

        <?= $curso['titulo'] ?>

    </title>

    <link rel="stylesheet"
        href="assets/css/curso.css">

    <script
        src="assets/js/script.js">
    </script>

</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="assets/img/senai.png">

            <div class="logo-text">

                <h2>

                    Corporate Training

                </h2>

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

            <?php if (isset($curso['imagem']) && !empty($curso['imagem'])): ?>

                <div class="curso-imagem">

                    <img
                        src="assets/img/<?= $curso['imagem'] ?>"
                        alt="">

                </div>

            <?php endif; ?>

            <?php foreach ($curso['conteudo'] as $bloco): ?>

                <div class="aula">

                    <h2>

                        <?= $bloco['titulo'] ?>

                    </h2>

                    <p>

                        <?= nl2br(
                            $bloco['texto']
                        ) ?>

                    </p>

                </div>

            <?php endforeach; ?>

            <?php if ($tema): ?>

                <a
                    href="quiz.php?tema=<?= $tema ?>"
                    class="btn-iniciar">

                    Iniciar Avaliação

                </a>

            <?php else: ?>

                <a
                    href="quiz_dinamico.php?id=<?= $_GET['id'] ?>"
                    class="btn-iniciar">

                    Iniciar Avaliação

                </a>

            <?php endif; ?>

        </div>

    </main>

</body>

</html>