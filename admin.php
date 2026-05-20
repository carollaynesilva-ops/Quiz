<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>SYS.RES | Admin</title>

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

            <form id="adminForm">

                <div class="campo">

                    <label>Senha administrativa</label>

                    <input
                        type="password"
                        id="adminSenha"
                        placeholder="Digite a senha"
                        required>

                </div>

                <button type="submit">

                    Entrar

                </button>

            </form>

            <p id="mensagemErro"></p>

        </div>

    </main>

    <script src="login/js/admin.js"></script>

</body>

</html>