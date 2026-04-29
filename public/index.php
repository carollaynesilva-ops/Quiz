<?php
require_once '../config/config.php';
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Game Quiz</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>

    <header class="menu">
        <div class="logo">
            <img src="assets/img/senai.png" alt="SENAI">
            <span>GameQuiz</span>
        </div>
    </header>


    <main class="hero">

        <div class="hero-content">
            <h1>Teste seu conhecimento</h1>
            <p>
                Um mini game desenvolvido com base no que aprendemos em Desenvolvimento de Sistemas.<br>
                Backend em PHP, estrutura organizada e interatividade — tudo aplicado em um quiz temático.<br><br>
            </p>
        </div>

        <div class="games">

            <a href="quiz.php?tema=harry" class="game-card harry">
                <div class="overlay"></div>
                <h2>Harry Potter</h2>
            </a>

            <a href="quiz.php?tema=barbie" class="game-card barbie">
                <div class="overlay"></div>
                <h2>Barbie</h2>
            </a>

            <a href="quiz.php?tema=teenwolf" class="game-card teenwolf">
                <div class="overlay"></div>
                <h2>Teen Wolf</h2>
            </a>

        </div>

    </main>

</body>

</html>