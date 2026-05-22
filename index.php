<?php

require_once 'config/config.php';

require_once 'app/Classes/Database.php';
require_once 'app/Classes/Usuario.php';

$erro = "";

if ($_POST) {

    $usuarioObj = new Usuario();

    $dados = $usuarioObj->login(

        $_POST['usuario_id'],
        $_POST['senha']

    );

    if ($dados) {

        // salva dados do usuário na sessão
        $_SESSION['usuario_id'] = $dados['id'];

        $_SESSION['nome'] = $dados['nome_completo'];

        $_SESSION['tipo'] = $dados['tipo'];

        // redireciona para área dos quizzes
        header("Location: public/index.php");

        exit;
    }

    $erro = "Usuário ou senha inválidos";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Corporate Training | Login</title>

    <link rel="stylesheet" href="login/css/login.css">

    <script src="login/js/login.js"></script>

</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="public/assets/img/senai.png" alt="Logo">

            <div class="logo-text">

                <h2>SYS.<span>RES</span></h2>

                <span>SISTEMA DE TREINAMENTOS</span>

            </div>

        </div>

    </header>

    <main class="container">

        <div class="login-box">

            <h1>Acessar Sistema</h1>

            <p class="subtitulo">

                Entre para iniciar os treinamentos corporativos

            </p>

            <form method="POST">

                <div class="campo">

                    <label>Usuário</label>

                    <input
                        type="text"
                        name="usuario_id"
                        placeholder="Digite seu usuário"
                        required>

                </div>

                <div class="campo">

                    <label>Senha</label>

                    <input
                        type="password"
                        name="senha"
                        placeholder="Digite sua senha"
                        required>

                </div>

                <button type="submit">

                    Entrar

                </button>

                <?php if (!empty($erro)): ?>

                    <p id="mensagemErro">

                        <?= $erro ?>

                    </p>

                <?php endif; ?>

            </form>

            <div class="separador">

                <span>ou</span>

            </div>

            <a href="admin.php" class="btn-admin">

                Acesso Administrador

            </a>

            <p class="cadastro-link">

                Não tem uma conta?

                <a href="cadastro.php">

                    Cadastre-se

                </a>

            </p>

        </div>

    </main>

</body>

</html>