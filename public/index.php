<?php
require_once '../config/config.php';
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

<header class="menu">
    <div class="logo">
        <img src="assets/img/senai.png" alt="SENAI">
        <span>Quiz Interativo</span>
    </div>
</header>

<main class="container">

    <section class="intro">
        <h1>Explore o que criamos</h1>
        <p>
            Este projeto foi desenvolvido durante o curso de Desenvolvimento de Sistemas,
            aplicando conceitos de backend com PHP, organização em classes e lógica de programação.
        </p>
        <p class="destaque">
            Escolha um tema e teste seus conhecimentos.
        </p>
    </section>

    <section class="temas">

        <a href="quiz.php?tema=harry" class="card">
            <img src="assets/img/harry.jpg" alt="Harry Potter">
            <div class="card-info">
                <h2>Harry Potter</h2>
            </div>
        </a>

        <a href="quiz.php?tema=barbie" class="card">
            <img src="assets/img/barbie.jpg" alt="Barbie">
            <div class="card-info">
                <h2>Barbie</h2>
            </div>
        </a>

        <a href="quiz.php?tema=teenwolf" class="card">
            <img src="assets/img/teenwolf.jpg" alt="Teen Wolf">
            <div class="card-info">
                <h2>Teen Wolf</h2>
            </div>
        </a>

    </section>

</main>

</body>
</html>