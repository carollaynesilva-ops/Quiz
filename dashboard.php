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


/* ESTATÍSTICAS */

$totalTreinamentos = count($resultados);

$media = 0;

if ($totalTreinamentos > 0) {

    $soma = array_sum(
        array_column(
            $resultados,
            'porcentagem'
        )
    );

    $media = $soma / $totalTreinamentos;
}

$funcionarios = array_unique(

    array_column(
        $resultados,
        'nome_completo'
    )

);

$totalFuncionarios = count($funcionarios);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Dashboard</title>

    <link rel="stylesheet"
        href="login/css/dashboard.css">

</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="public/assets/img/senai.png">

            <div class="logo-text">

                <h2>Corporate Training</h2>
                <span>PAINEL ADMINISTRATIVO</span>

            </div>

        </div>

        <div class="usuario-box">

            <span>

                <?= $_SESSION['nome'] ?>

            </span>

            <a href="logout.php">

                Sair

            </a>

        </div>

    </header>


    <main class="container">

        <div class="cards">

            <div class="card-info">

                <h3>Funcionários</h3>

                <p>

                    <?= $totalFuncionarios ?>

                </p>

            </div>

            <div class="card-info">

                <h3>Treinamentos</h3>

                <p>

                    <?= $totalTreinamentos ?>

                </p>

            </div>

            <div class="card-info">

                <h3>Média Geral</h3>

                <p>

                    <?= round($media) ?>%

                </p>

            </div>

        </div>


        <div class="dashboard-box">

            <h1>

                Resultados dos Funcionários

            </h1>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>Funcionário</th>
                            <th>Tema</th>
                            <th>Acertos</th>
                            <th>Erros</th>
                            <th>Desempenho</th>
                            <th>Data</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($resultados as $r): ?>

                            <tr>

                                <td>

                                    <?= $r['nome_completo'] ?>

                                </td>

                                <td>

                                    <?= $r['tema'] ?>

                                </td>

                                <td>

                                    <?= $r['acertos'] ?>

                                </td>

                                <td>

                                    <?= $r['erros'] ?>

                                </td>

                                <td>

                                    <div class="barra-container">

                                        <div
                                            class="barra-resultado"

                                            style="width:
<?= round($r['porcentagem']) ?>%">

                                        </div>

                                        <span>

                                            <?= round($r['porcentagem']) ?>%

                                        </span>

                                    </div>

                                </td>

                                <td>

                                    <?= date(

                                        'd/m/Y H:i',

                                        strtotime(
                                            $r['data_realizacao']
                                        )

                                    ) ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</body>

</html>