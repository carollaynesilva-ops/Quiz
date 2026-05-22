<?php

require_once 'config/config.php';

require_once 'app/Classes/Database.php';

require_once 'app/Classes/Usuario.php';

$erro = "";

if ($_POST) {

    $usuarioObj = new Usuario();

    $dados = $usuarioObj->login(

        "admin",
        $_POST['senha']

    );
    var_dump($dados);
    if ($dados && $dados['tipo'] == "admin") {

        $_SESSION['usuario_id'] = $dados['id'];

        $_SESSION['nome'] = $dados['nome_completo'];

        $_SESSION['tipo'] = $dados['tipo'];

        header("Location: dashboard.php");

        exit;
    }

    $erro = "Senha incorreta";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Corporate Training | Admin</title>

    <link rel="stylesheet" href="login/css/admin.css">
    
</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="public/assets/img/senai.png">

            <div class="logo-text">

                <h2>SYS.<span>RES</span></h2>

                <span>ÁREA RESTRITA</span>

            </div>

        </div>
        
    </header>

    <main class="container">

        <div class="login-box">

            <h1>Painel Administrativo</h1>

            <p class="subtitulo">

                Área protegida do sistema

            </p>

            <form method="POST">

                <div class="campo">

                    <label>Senha administrativa</label>

                    <input
                        type="password"
                        name="senha"
                        placeholder="Digite a senha"
                        required>

                </div>

                <button type="submit">

                    Entrar

                </button>

            </form>

            <?php if ($erro): ?>

                <p id="mensagemErro">

                    <?= $erro ?>

                </p>

            <?php endif; ?>

            <p id="mensagemErro"></p>

        </div>

    </main>


</body>

</html>