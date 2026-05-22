<?php

require_once '../config/config.php';
require_once '../app/Classes/Database.php';
require_once '../app/Classes/Resultado.php';

if (
    !isset($_SESSION['usuario_id'])
) {

    header("Location:../index.php");
    exit;
}

$quizId =
    $_SESSION['quiz_finalizado'];

$acertos =
    $_SESSION['pontuacao'];

$total =
    $_SESSION['indice'];

$erros =
    $total - $acertos;

$porcentagem =
    $total > 0
    ?
    ($acertos / $total) * 100
    :
    0;


/* pegar nome do quiz */

$conn =
    Database::conectar();

$sql =
    $conn->prepare(

        "SELECT titulo
FROM quizzes
WHERE id=:id"

    );

$sql->execute([

    ':id' => $quizId

]);

$quiz =
    $sql->fetch(
        PDO::FETCH_ASSOC
    );


/* salvar banco */

$resultadoObj =
    new Resultado();

$resultadoObj->salvar(

    $_SESSION['usuario_id'],
    $quizId,
    $acertos,
    $erros,
    $porcentagem

);


/* mensagens */

if ($porcentagem == 100) {

    $titulo =
        "Excelente desempenho";

    $mensagem =
        "Treinamento concluído com aproveitamento máximo.";
} elseif ($porcentagem >= 70) {

    $titulo =
        "Muito bom";

    $mensagem =
        "Você apresentou bom domínio do conteúdo.";
} elseif ($porcentagem >= 40) {

    $titulo =
        "Em desenvolvimento";

    $mensagem =
        "Continue reforçando o conteúdo.";
} else {

    $titulo =
        "Revisão recomendada";

    $mensagem =
        "Uma nova tentativa pode ajudar.";
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>

        Resultado

    </title>

    <link
        rel="stylesheet"
        href="assets/css/resultado.css">

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

                    RESULTADO

                </span>

            </div>

        </div>

    </header>

    <main class="resultado-wrapper">

        <div class="resultado-box">

            <h1>

                <?= $quiz['titulo'] ?>

            </h1>

            <h2 class="titulo">

                <?= $titulo ?>

            </h2>

            <p class="mensagem">

                <?= $mensagem ?>

            </p>

            <div class="placar">

                <p>

                    <strong>

                        Acertos

                    </strong>

                    <?= $acertos ?>

                </p>

                <p>

                    <strong>

                        Erros

                    </strong>

                    <?= $erros ?>

                </p>

                <p>

                    <strong>

                        Aproveitamento

                    </strong>

                    <?= round(
                        $porcentagem
                    ) ?>%

                </p>

            </div>

            <a
                href="index.php"
                class="btn-voltar">

                Voltar ao início

            </a>

        </div>

    </main>

</body>

</html>

<?php

unset(

    $_SESSION['quiz_' . $quizId],
    $_SESSION['acertos_' . $quizId],
    $_SESSION['pontuacao'],
    $_SESSION['indice'],
    $_SESSION['quiz_finalizado']

);

?>