<?php
require_once '../config/config.php';





// mapeamento dos temas
require_once '../app/Classes/Resultado.php';


$temaBanco = [

    'epi' => 1,
    'primeirossocorros' => 2,
    'lgpd' => 3,
    'incendio' => 4

];




$acertos = $_SESSION['pontuacao'] ?? 0;
$total = $_SESSION['indice'] ?? 0;
$erros = $total - $acertos;

$tema = $_SESSION['tema'] ?? 'default';

$porcentagem = $total > 0 ? ($acertos / $total) * 100 : 0;

// salva resultado no banco

$usuarioId = $_SESSION['usuario_id'];

$temaId = $temaBanco[$tema];

$resultadoObj = new Resultado();

$resultadoObj->salvar(

    $usuarioId,
    $temaId,
    $acertos,
    $erros,
    $porcentagem

);

$titulo = "";
$mensagem = "";

/* ========================= */
/* PRIMEIROS SOCORROS */
/* ========================= */

if ($tema === "primeirossocorros") {

    if ($porcentagem == 100) {

        $titulo = "Socorrista de Elite";
        $mensagem = "Você demonstrou excelente preparo.";
    } elseif ($porcentagem >= 70) {

        $titulo = "Atendimento Eficiente";
        $mensagem = "Você conhece bem os procedimentos.";
    } elseif ($porcentagem >= 40) {

        $titulo = "Em Treinamento";
        $mensagem = "Você já possui uma boa base.";
    } else {

        $titulo = "Precisa Revisar";
        $mensagem = "Primeiros socorros exigem atenção.";
    }
}

/* ========================= */
/* EPI */
/* ========================= */ elseif ($tema === "epi") {

    if ($porcentagem == 100) {

        $titulo = "Especialista em Segurança";
        $mensagem = "Uso de EPIs dominado com excelência.";
    } elseif ($porcentagem >= 70) {

        $titulo = "Profissional Consciente";
        $mensagem = "Você entende bem a importância dos EPIs.";
    } elseif ($porcentagem >= 40) {

        $titulo = "Conhecimento Básico";
        $mensagem = "Ainda existem pontos para reforçar.";
    } else {

        $titulo = "Atenção à Segurança";
        $mensagem = "Revisar os EPIs é fundamental.";
    }
}

/* ========================= */
/* LGPD */
/* ========================= */ elseif ($tema === "lgpd") {

    if ($porcentagem == 100) {

        $titulo = "Proteção Total";
        $mensagem = "Você domina segurança e tecnologia.";
    } elseif ($porcentagem >= 70) {

        $titulo = "Usuário Consciente";
        $mensagem = "Bom conhecimento digital.";
    } elseif ($porcentagem >= 40) {

        $titulo = "Em Evolução";
        $mensagem = "Continue reforçando a segurança digital.";
    } else {

        $titulo = "Risco Digital";
        $mensagem = "Talvez seja melhor não clicar em links suspeitos.";
    }
}

/* ========================= */
/* INCÊNDIO */
/* ========================= */ elseif ($tema === "incendio") {

    if ($porcentagem == 100) {

        $titulo = "Brigadista Master";
        $mensagem = "Excelente controle em situações de emergência.";
    } elseif ($porcentagem >= 70) {

        $titulo = "Prevenção Eficiente";
        $mensagem = "Você conhece bem os protocolos.";
    } elseif ($porcentagem >= 40) {

        $titulo = "Treinamento Inicial";
        $mensagem = "Ainda há procedimentos para revisar.";
    } else {

        $titulo = "Alerta de Emergência";
        $mensagem = "A brigada talvez esteja preocupada com você.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Resultado</title>

    <link rel="stylesheet" href="assets/css/resultado.css">

</head>

<body class="<?= $tema ?>">

    <!-- MENU -->

    <header class="menu">

        <div class="logo">

            <img src="assets/img/senai.png" alt="SENAI">

            <div class="logo-text">

                <h2>SYS.<span>RES</span></h2>

                <span>RESULTADO DO TREINAMENTO</span>

            </div>

        </div>

    </header>

    <!-- CONTEÚDO -->

    <main class="resultado-wrapper">

        <div class="resultado-box">

            <h1>RESULTADO FINAL</h1>

            <h2 class="titulo">

                <?= $titulo ?>

            </h2>

            <p class="mensagem">

                <?= $mensagem ?>

            </p>

            <!-- PLACAR -->

            <div class="placar">

                <p>

                    <strong>Acertos</strong>

                    <?= $acertos ?>

                </p>

                <p>

                    <strong>Erros</strong>

                    <?= $erros ?>

                </p>

                <p>

                    <strong>Aproveitamento</strong>

                    <?= round($porcentagem) ?>%

                </p>

            </div>

            <!-- BOTÃO -->

            <a href="index.php" class="btn-voltar">

                Voltar ao início

            </a>

        </div>

    </main>

</body>

</html>
<?php

unset(
    $_SESSION['pontuacao'],
    $_SESSION['indice'],
    $_SESSION['tema']
);

?>