<?php

require_once 'config/config.php';

require_once 'app/Classes/Database.php';

if (!isset($_SESSION['usuario_id'])) {

    header("Location:index.php");
    exit;
}

if ($_SESSION['tipo'] != 'admin') {

    header("Location:index.php");
    exit;
}

$conn = Database::conectar();

$sql = $conn->query(

    "SELECT

u.nome_completo,
t.nome AS tema,
r.acertos,
r.erros,
r.porcentagem,
r.data_realizacao

FROM resultados r

INNER JOIN usuarios u
ON r.usuario_id=u.id

INNER JOIN temas t
ON r.tema_id=t.id

ORDER BY r.data_realizacao DESC"

);

$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>SYS.RES | Dashboard</title>

    <link rel="stylesheet"
        href="login/css/dashboard.css">

</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="public/assets/img/senai.png">

            <div class="logo-text">

                <h2>SYS.<span>RES</span></h2>

                <span>PAINEL ADMINISTRATIVO</span>

            </div>

        </div>

        <div class="usuario">

            <?= $_SESSION['nome'] ?>

        </div>

    </header>


    <main class="container">

        <div class="dashboard-box">

            <h1>

                Resultados dos Funcionários

            </h1>

            <table>

                <thead>

                    <tr>

                        <th>Funcionário</th>
                        <th>Tema</th>
                        <th>Acertos</th>
                        <th>Erros</th>
                        <th>%</th>
                        <th>Data</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($resultados as $resultado): ?>

                        <tr>

                            <td>

                                <?= $resultado['nome_completo'] ?>

                            </td>

                            <td>

                                <?= $resultado['tema'] ?>

                            </td>

                            <td>

                                <?= $resultado['acertos'] ?>

                            </td>

                            <td>

                                <?= $resultado['erros'] ?>

                            </td>

                            <td>

                                <?= round(
                                    $resultado['porcentagem']
                                ) ?>%

                            </td>

                            <td>

                                <?= date(

                                    'd/m/Y H:i',

                                    strtotime(
                                        $resultado['data_realizacao']
                                    )

                                ) ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </main>

</body>

</html>