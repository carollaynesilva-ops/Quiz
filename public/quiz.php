<?php
require_once '../config/config.php';

require_once '../app/Classes/Quiz.php';
require_once '../app/Classes/Pergunta.php';
require_once '../app/Controllers/QuizController.php';

// pegar tema
$temaEscolhido = $_GET['tema'] ?? null;

if (!$temaEscolhido) {
    header("Location: index.php");
    exit;
}

// reset se trocar tema
if (!isset($_SESSION['tema']) || $_SESSION['tema'] !== $temaEscolhido) {
    session_destroy();
    session_start();
    $_SESSION['tema'] = $temaEscolhido;
}

// carregar dados
$arquivoTema = "../app/Data/{$temaEscolhido}.php";

if (!file_exists($arquivoTema)) {
    die("Tema inválido");
}

$dados = require $arquivoTema;

$quiz = new Quiz($dados);
$controller = new QuizController($quiz);

// resposta
if ($_POST && isset($_POST['resposta'])) {
    $resposta = (int)$_POST['resposta'];

    if ($resposta >= 0) {
        $controller->responder($resposta);
    } else {
        $_SESSION['indice']++;
    }
}

// terminou?
if ($controller->terminou()) {
    header("Location: resultado.php");
    exit;
}

$pergunta = $controller->getPerguntaAtual();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Quiz</title>

    <!-- CSS base -->
    <link rel="stylesheet" href="assets/css/quiz.css">

    <!-- CSS do tema -->
    <link rel="stylesheet" href="assets/css/<?= $temaEscolhido ?>.css">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>

<body class="<?= $temaEscolhido ?>">

    <div class="quiz-container">

        <div class="topo">
            <div class="barra">
                <div class="progresso"
                    style="width: <?= (($_SESSION['indice'] ?? 0) / $quiz->total()) * 100 ?>%">
                </div>
            </div>

            <div class="timer" id="timer">10</div>
        </div>

        <h2 class="pergunta">
            <?= $pergunta->getTexto(); ?>
        </h2>

        <form method="POST" class="opcoes" id="formQuiz">

            <?php foreach ($pergunta->getOpcoes() as $i => $opcao): ?>

                <button type="button" class="btn-opcao" data-value="<?= $i ?>">

                    <div class="imagem-opcao">
                        <img src="assets/img/<?= $opcao['img'] ?>" alt="">
                    </div>

                    <div class="texto-opcao">
                        <?= $opcao['texto'] ?>
                    </div>

                </button>

            <?php endforeach; ?>

            <input type="hidden" name="resposta" id="resposta">

        </form>

    </div>

    <script src="assets/js/script.js"></script>

</body>

</html>