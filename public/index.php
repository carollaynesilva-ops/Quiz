<?php

require_once '../config/config.php';
require_once '../app/Classes/Database.php';


$conn = Database::conectar();

$sql = $conn->query(

    "SELECT *
FROM quizzes
ORDER BY criado_em DESC"

);

$novosQuizzes = $sql->fetchAll(
    PDO::FETCH_ASSOC
);



if (!isset($_SESSION['usuario_id'])) {

    header("Location:../index.php");

    exit;
}

$conn = Database::conectar();

$sql = $conn->query(

    "SELECT *
FROM quizzes
ORDER BY criado_em DESC"

);

$quizzes = $sql->fetchAll(
    PDO::FETCH_ASSOC
);

?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corporate Training</title>

    <!-- Fonte moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/home.css">
    <script src="assets/js/script.js"></script>
</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="assets/img/senai.png" alt="SENAI">

            <div class="logo-text">

                <h2>Corporate Training</h2>
                <span>Plataforma de Treinamentos</span>

            </div>

        </div>

        <div class="acoes-header">

            <button id="themeToggle" class="theme-btn">
                ☀
            </button>

            <a href="../logout.php" class="logout-btn">

                Sair

            </a>

        </div>

    </header>

    <main class="container">

        <section class="intro">

            <span class="tag">Treinamento Empresarial</span>

            <h1>
                Capacitação Interativa
                para Empresas
            </h1>

            <p>
                Plataforma desenvolvida para treinamentos corporativos,
                permitindo avaliar conhecimentos essenciais de forma
                prática, rápida e interativa.
            </p>

        </section>

        <section class="temas">

            <!-- PRIMEIROS SOCORROS -->
            <a href="curso.php?tema=primeirossocorros" class="card">

                <img src="assets/img/primeiros-socorros.jpg" alt="Primeiros Socorros">

                <div class="card-info">

                    <span class="categoria">
                        Segurança
                    </span>

                    <h2>Primeiros Socorros</h2>

                    <p>
                        Conhecimentos básicos para agir em emergências.
                    </p>

                </div>

            </a>

            <!-- EPI -->
            <a href="curso.php?tema=epi" class="card">

                <img src="assets/img/epi.jpg" alt="EPI">

                <div class="card-info">

                    <span class="categoria">
                        Proteção
                    </span>

                    <h2>EPI's</h2>

                    <p>
                        Uso correto de equipamentos de proteção individual.
                    </p>

                </div>

            </a>

            <!-- LGPD -->
            <a href="curso.php?tema=lgpd" class="card">

                <img src="assets/img/lgpd.png" alt="LGPD">

                <div class="card-info">

                    <span class="categoria">
                        Segurança Digital
                    </span>

                    <h2>LGPD</h2>

                    <p>
                        Proteção de dados e boas práticas digitais.
                    </p>

                </div>

            </a>

            <!-- INCÊNDIO -->
            <a href="curso.php?tema=incendio" class="card">

                <img src="assets/img/incendio.png" alt="Incêndio">

                <div class="card-info">

                    <span class="categoria">
                        Emergência
                    </span>

                    <h2>Prevenção de Incêndio</h2>

                    <p>
                        Procedimentos básicos em situações de incêndio.
                    </p>

                </div>

            </a>

        </section>


        <!-- OUTROS CURSOS -->

        <section class="outros-wrapper">

            <div class="outros-container">

                <div class="titulo-cursos">

                    <h2>Outros Disponíveis</h2>

                    <span>
                        Treinamentos adicionados pela empresa
                    </span>

                </div>

                <div class="cards-novos">

                    <?php foreach ($novosQuizzes as $quiz): ?>

                        <div class="novo-card">

                            <div class="novo-img">

                                <?php if (!empty($quiz['imagem'])): ?>

                                    <img
                                        src="assets/img/<?= $quiz['imagem'] ?>"
                                        alt="">

                                <?php else: ?>

                                    <img
                                        src="assets/img/default.jpg"
                                        alt="">

                                <?php endif; ?>

                            </div>

                            <div class="novo-conteudo">

                                <h3>

                                    <?= $quiz['titulo'] ?>

                                </h3>

                                <p>

                                    <?= substr(
                                        $quiz['curso'],
                                        0,
                                        80
                                    ) ?>...

                                </p>

                                <a
                                    href="curso.php?id=<?= $quiz['id'] ?>"
                                    class="btn-curso">

                                    Acessar treinamento

                                </a>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>
    </main>
    <script src="assets/js/script.js"></script>
</body>

</html>