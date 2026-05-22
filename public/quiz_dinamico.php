<?php

require_once '../config/config.php';
require_once '../app/Classes/Database.php';

if (!isset($_SESSION['usuario_id'])) {

    header("Location:../index.php");
    exit;
}

if (!isset($_GET['id'])) {

    header("Location:index.php");
    exit;
}

$quizId = (int)$_GET['id'];

$conn = Database::conectar();

/* iniciar sessão */

if (!isset($_SESSION['quiz_' . $quizId])) {

    $_SESSION['quiz_' . $quizId] = 0;
    $_SESSION['acertos_' . $quizId] = 0;
}

/* pegar perguntas */

$sql = $conn->prepare(

    "SELECT *
FROM perguntas
WHERE quiz_id=:id"

);

$sql->execute([

    ':id' => $quizId

]);

$perguntas = $sql->fetchAll(PDO::FETCH_ASSOC);


/* VERIFICA SE EXISTEM PERGUNTAS */

if (empty($perguntas)) {

    die("Este quiz ainda não possui perguntas cadastradas.");
}

$total = count($perguntas);

$indice = $_SESSION['quiz_' . $quizId];


/* terminou */

if ($indice >= $total) {

    $_SESSION['pontuacao'] =
        $_SESSION['acertos_' . $quizId];

    $_SESSION['indice'] = $total;

    $_SESSION['quiz_finalizado'] = $quizId;

    header(
        "Location:resultado_dinamico.php"
    );

    exit;
}

$perguntaAtual =
    $perguntas[$indice];


/* opções */

$sql = $conn->prepare(

    "SELECT *
FROM opcoes
WHERE pergunta_id=:id"

);

$sql->execute([

    ':id' => $perguntaAtual['id']

]);

$opcoes =
    $sql->fetchAll(PDO::FETCH_ASSOC);


/* resposta */

if ($_POST && isset($_POST['resposta'])) {

    $resposta = $_POST['resposta'];

    foreach ($opcoes as $opcao) {

        if (
            $opcao['id'] == $resposta
            &&
            $opcao['correta'] == 1
        ) {

            $_SESSION['acertos_' . $quizId]++;
        }
    }

    $_SESSION['quiz_' . $quizId]++;

    header(
        "Location:quiz_dinamico.php?id=" . $quizId
    );

    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Quiz</title>

    <link
        rel="stylesheet"
        href="assets/css/quiz.css">

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

                    AVALIAÇÃO

                </span>

            </div>

        </div>

        <button
            id="themeToggle"
            class="theme-btn">

            ☀

        </button>

    </header>

    <main class="quiz-wrapper">

        <div class="quiz-container">

            <div class="topo">

                <div class="barra">

                    <div
                        class="progresso"
                        style="width:
<?= ($indice / $total) * 100 ?>%">

                    </div>

                </div>

                <div
                    class="timer"
                    id="timer">

                    15

                </div>

            </div>

            <h2 class="pergunta">

                <?= $perguntaAtual['pergunta'] ?>

            </h2>

            <form
                method="POST"
                class="opcoes"
                id="formQuiz">

                <?php foreach (
                    $opcoes
                    as $opcao
                ): ?>

                    <button
                        type="button"
                        class="btn-opcao"
                        data-value="<?= $opcao['id'] ?>">

                        <div class="texto-opcao">

                            <?= $opcao['texto'] ?>

                        </div>

                    </button>

                <?php endforeach; ?>

                <input
                    type="hidden"
                    name="resposta"
                    id="resposta">

            </form>

        </div>

    </main>

    <script src="assets/js/script.js"></script>

</body>

</html>