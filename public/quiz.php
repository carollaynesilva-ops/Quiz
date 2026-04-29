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
    $controller->responder((int)$_POST['resposta']);
}

// terminou?
if ($controller->terminou()) {
    header("Location: resultado.php");
    exit;
}

$pergunta = $controller->getPerguntaAtual();
?>

<link rel="stylesheet" href="assets/css/<?= $temaEscolhido ?>.css">

<h2><?= $pergunta->getTexto(); ?></h2>

<form method="POST">
    <?php foreach ($pergunta->getOpcoes() as $i => $opcao): ?>
        <button name="resposta" value="<?= $i ?>">
            <?= $opcao ?>
        </button>
    <?php endforeach; ?>
</form>