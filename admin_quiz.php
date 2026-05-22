<?php

require_once 'config/config.php';

require_once 'app/Classes/QuizAdmin.php';

if (!isset($_SESSION['usuario_id'])) {

    header("Location:index.php");
    exit;
}

if ($_SESSION['tipo'] != "admin") {

    header("Location:index.php");
    exit;
}

if ($_POST) {

    $quizObj =
        new QuizAdmin();

    $imagem = "";

    if (
        isset($_FILES['cursoImagem'])
        &&
        $_FILES['cursoImagem']['name']
    ) {

        $imagem =
            time() .
            $_FILES['cursoImagem']['name'];

        move_uploaded_file(

            $_FILES['cursoImagem']['tmp_name'],

            "public/assets/img/" .
                $imagem

        );
    }

    $quizId =

        $quizObj->criarQuiz(

            $_POST['titulo'],

            $_POST['curso'],

            $imagem,

            $_SESSION['usuario_id']

        );

    foreach (
        $_POST['pergunta']
        as $i => $pergunta
    ) {

        $perguntaId =

            $quizObj
            ->salvarPergunta(

                $quizId,
                $pergunta

            );

        foreach (
            $_POST["opcao_" . ($i + 1)]
            as $j => $opcao
        ) {

            $correta =

                ($_POST["correta_" . ($i + 1)] == ($j + 1))

                ? 1
                : 0;

            $quizObj
                ->salvarOpcao(

                    $perguntaId,

                    $opcao,

                    "",

                    $correta

                );
        }
    }

    header(
        "Location:dashboard.php"
    );

    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>SYS.RES | Criar Quiz</title>

    <link rel="stylesheet"
        href="login/css/admin_quiz.css">

</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="public/assets/img/senai.png">

            <div class="logo-text">

                <h2>SYS.<span>RES</span></h2>

                <span>CRIAR TREINAMENTO</span>

            </div>

        </div>

    </header>

    <main class="container">

        <div class="quiz-box">

            <h1>Novo Treinamento</h1>

            <form
                id="quizForm"
                method="POST"
                enctype="multipart/form-data">

                <div class="campo">

                    <label>Título</label>

                    <input
                        type="text"
                        name="titulo"
                        required>

                </div>

                <div class="campo">

                    <label>Mini Curso</label>

                    <textarea
                        name="curso"
                        rows="6"
                        placeholder="Explique rapidamente o conteúdo..."></textarea>

                </div>

                <div class="campo">

                    <label>Imagem do curso</label>

                    <input
                        type="file"
                        name="cursoImagem">

                </div>

                <hr>

                <div id="perguntasContainer">

                </div>

                <button
                    type="button"
                    id="adicionarPergunta"
                    class="btn-add">

                    + Adicionar pergunta

                </button>

                <button
                    type="submit"
                    class="btn-salvar">

                    Salvar treinamento

                </button>

            </form>

        </div>

    </main>

    <script src="login/js/admin_quiz.js"></script>

</body>

</html>