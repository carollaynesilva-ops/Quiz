<?php

require_once 'config/config.php';

require_once 'app/Classes/Database.php';

require_once 'app/Classes/Usuario.php';

if ($_POST) {

    $usuarioObj = new Usuario();

    $usuarioObj->cadastrar(

        $_POST['nome'],
        $_POST['data'],
        $_POST['usuario'],
        $_POST['senha']

    );

    header("Location:index.php");

    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>SYS.RES | Cadastro</title>

    <link rel="stylesheet" href="login/css/login.css">

</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="public/assets/img/senai.png">

            <div class="logo-text">

                <h2>SYS.<span>RES</span></h2>

                <span>CADASTRO DE USUÁRIO</span>

            </div>

        </div>

    </header>

    <main class="container">

        <div class="login-box">

            <h1>Criar Conta</h1>

            <p class="subtitulo">

                Preencha os dados abaixo

            </p>

            <form method="POST" id="formCadastro">

                <div class="campo">

                    <label>Nome Completo</label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        required>

                </div>

                <div class="campo">

                    <label>Data de nascimento</label>

                    <input
                        type="date"
                        id="data"
                        name="data"
                        required>

                </div>

                <div class="campo">

                    <label>Nome de usuário</label>

                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        required>

                </div>

                <div class="campo">

                    <label>Senha</label>

                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        required>

                </div>

                <div class="campo">

                    <label>Confirmar senha</label>

                    <input
                        type="password"
                        id="confirmarSenha"
                        required>

                </div>

                <button type="submit">

                    Criar Conta

                </button>

            </form>

            <p class="cadastro-link">

                Já possui conta?

                <a href="index.php">

                    Entrar

                </a>

            </p>

            <p id="mensagemErro"></p>

        </div>

    </main>

    <script src="login/js/cadastro.js"></script>

</body>

</html>