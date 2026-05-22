<?php

require_once 'config/config.php';

require_once 'app/Classes/QuizAdmin.php';

if (
    !isset($_SESSION['usuario_id'])
) {

    header(
        "Location:index.php"
    );

    exit;
}

if (
    $_SESSION['tipo'] != 'admin'
) {

    header(
        "Location:index.php"
    );

    exit;
}

if (
    !isset($_GET['id'])
) {

    header(
        "Location:dashboard.php"
    );

    exit;
}

$quizObj =
    new QuizAdmin();

$quizObj->excluirQuiz(

    $_GET['id']

);

header(
    "Location:dashboard.php"
);

exit;
