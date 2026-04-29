<?php
require_once '../config/config.php';

$acertos = $_SESSION['pontuacao'] ?? 0;
$total = $_SESSION['indice'] ?? 0;
$erros = $total - $acertos;

$tema = $_SESSION['tema'] ?? 'default';

// mensagens
if ($acertos == $total && $total > 0) {
    $mensagem = "Perfeito. Você dominou esse tema.";
} elseif ($acertos >= $total / 2) {
    $mensagem = "Nada mal. Você está no caminho certo.";
} else {
    $mensagem = "Ok… talvez assistir/rever o tema ajude.";
}



$porcentagem = $total > 0 ? ($acertos / $total) * 100 : 0;

$titulo = "";
$mensagem = "";

// HARRY POTTER
if ($tema === "harry") {

    if ($porcentagem == 100) {
        $titulo = "Mestre de Hogwarts";
        $mensagem = "Dumbledore ficaria orgulhoso.";
    } elseif ($porcentagem >= 70) {
        $titulo = "Bruxo Avançado";
        $mensagem = "Você domina bem a magia.";
    } elseif ($porcentagem >= 40) {
        $titulo = "Estudante de Hogwarts";
        $mensagem = "Ainda tem o que aprender.";
    } else {
        $titulo = "Trouxa";
        $mensagem = "Talvez magia não seja seu forte.";
    }
}

// BARBIE
elseif ($tema === "barbie") {

    if ($porcentagem == 100) {
        $titulo = "Barbie Suprema";
        $mensagem = "Perfeita em todos os aspectos.";
    } elseif ($porcentagem >= 70) {
        $titulo = "Barbie Estilosa";
        $mensagem = "Você arrasa.";
    } elseif ($porcentagem >= 40) {
        $titulo = "Barbie em evolução";
        $mensagem = "Quase lá.";
    } else {
        $titulo = "Barbie iniciante";
        $mensagem = "Dá pra melhorar esse look.";
    }
}

// TEEN WOLF
elseif ($tema === "teenwolf") {

    if ($porcentagem == 100) {
        $titulo = "Alpha Supremo";
        $mensagem = "Liderança total.";
    } elseif ($porcentagem >= 70) {
        $titulo = "Beta Forte";
        $mensagem = "Você é respeitado.";
    } elseif ($porcentagem >= 40) {
        $titulo = "Beta iniciante";
        $mensagem = "Ainda aprendendo a controlar.";
    } else {
        $titulo = "Humano perdido";
        $mensagem = "Nem entrou na alcateia.";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Resultado</title>

    <link rel="stylesheet" href="assets/css/resultado.css">
    <link rel="stylesheet" href="assets/css/<?= $tema ?>.css">
</head>

<body class="resultado <?= $tema ?>">

    <div class="resultado-box">
        

        <h1>Resultado Final</h1>

        <h2 class="titulo"><?= $titulo ?></h2>
        <p class="mensagem"><?= $mensagem ?></p>

        <div class="placar">
            <p><strong>Acertos:</strong> <?= $acertos ?></p>
            <p><strong>Erros:</strong> <?= $erros ?></p>
        </div>

        <p class="mensagem"><?= $mensagem ?></p>

        <a href="index.php" class="btn-voltar">Jogar novamente</a>

    </div>

</body>

</html>

<?php session_destroy(); ?>