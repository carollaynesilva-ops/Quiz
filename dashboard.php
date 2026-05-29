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

$funcionarioFiltro =
    $_GET['funcionario'] ?? '';

$treinamentoFiltro =
    $_GET['treinamento'] ?? '';

$statusFiltro =
    $_GET['status'] ?? '';

$query = "

SELECT

r.id,

u.nome_completo,

COALESCE(
t.nome,
q.titulo
) AS treinamento,

r.acertos,
r.erros,
r.porcentagem,
r.data_realizacao

FROM resultados r

INNER JOIN usuarios u
ON r.usuario_id=u.id

LEFT JOIN temas t
ON r.tema_id=t.id

LEFT JOIN quizzes q
ON r.quiz_id=q.id

WHERE 1=1

";

$params = [];


/* filtro funcionário */

if (!empty($funcionarioFiltro)) {

    $query .= "
AND u.nome_completo
LIKE :funcionario
";

    $params[':funcionario'] =
        "%" . $funcionarioFiltro . "%";
}


/* filtro treinamento */

if (!empty($treinamentoFiltro)) {

    $query .= "
AND (
t.nome LIKE :treinamento
OR
q.titulo LIKE :treinamento
)
";

    $params[':treinamento'] =
        "%" . $treinamentoFiltro . "%";
}


/* filtro status */

if ($statusFiltro == 'reprovado') {

    $query .= "
AND r.porcentagem < 60
";
} elseif ($statusFiltro == 'aprovado') {

    $query .= "
AND r.porcentagem >= 60
";
}


$query .= "
ORDER BY r.data_realizacao DESC
";

$sql =
    $conn->prepare($query);

$sql->execute($params);

$resultados =
    $sql->fetchAll(PDO::FETCH_ASSOC);


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

    $media =
        $soma /
        $totalTreinamentos;
}

$funcionarios = array_unique(

    array_column(
        $resultados,
        'nome_completo'
    )

);

$totalFuncionarios =
    count(
        $funcionarios
    );


$quizzes = $conn->query(

    "SELECT *
FROM quizzes
ORDER BY criado_em DESC"

)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>

        Dashboard

    </title>

    <link
        rel="stylesheet"
        href="login/css/dashboard.css">

</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="public/assets/img/senai.png">

            <div class="logo-text">

                <h2>

                    Corporate Training

                </h2>

                <span>

                    PAINEL ADMINISTRATIVO

                </span>

            </div>

        </div>

        <div class="usuario-box">

            <span>

                <?= $_SESSION['nome'] ?>

            </span>

            <a href="logout.php">

                Sair

            </a>

            <a
                href="admin_quiz.php"
                class="btn-criar">

                Criar Quiz

            </a>

        </div>

    </header>

    <main class="container">

        <div class="cards">

            <div class="card-info">

                <h3>

                    Funcionários

                </h3>

                <p>

                    <?= $totalFuncionarios ?>

                </p>

            </div>

            <div class="card-info">

                <h3>

                    Treinamentos

                </h3>

                <p>

                    <?= $totalTreinamentos ?>

                </p>

            </div>

            <div class="card-info">

                <h3>

                    Média Geral

                </h3>

                <p>

                    <?= round($media) ?>%

                </p>

            </div>

        </div>

        <div class="dashboard-box">

            <h1>

                Resultados dos Funcionários

            </h1>

            <form method="GET" class="filtros">

                <input
                    type="text"
                    name="funcionario"
                    placeholder="Pesquisar funcionário"
                    value="<?= $funcionarioFiltro ?>">

                <input
                    type="text"
                    name="treinamento"
                    placeholder="Pesquisar treinamento"
                    value="<?= $treinamentoFiltro ?>">

                <select name="status">

                    <option value="">

                        Todos resultados

                    </option>

                    <option
                        value="aprovado"

                        <?= $statusFiltro == 'aprovado'
                            ? 'selected'
                            : '' ?>>

                        Aprovados

                    </option>

                    <option
                        value="reprovado"

                        <?= $statusFiltro == 'reprovado'
                            ? 'selected'
                            : '' ?>>

                        Reprovados

                    </option>

                </select>

                <button type="submit">

                    Filtrar

                </button>

                <a
                    href="dashboard.php"
                    class="btn-limpar">

                    Limpar

                </a>

            </form>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>Funcionário</th>
                            <th>Treinamento</th>
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

                                    <?= $r['treinamento'] ?>

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

                                            <?php

                                            $porcentagem =
                                                round($r['porcentagem']);

                                            ?>

                                            <span class="

<?= $porcentagem < 60
                                ? 'reprovado'
                                : 'aprovado' ?>

">

                                                <?= $porcentagem ?>%

                                            </span>

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

    <div class="quizzes-box">

        <h2>

            Gerenciar Treinamentos

        </h2>

        <?php foreach ($quizzes as $quiz): ?>

            <div class="quiz-item">

                <div>

                    <strong>

                        <?= $quiz['titulo'] ?>

                    </strong>

                </div>

                <a
                    href="excluir_quiz.php?id=<?= $quiz['id'] ?>"
                    class="btn-excluir"
                    onclick="return confirm('Excluir este treinamento?')">

                    Excluir

                </a>

            </div>

        <?php endforeach; ?>

    </div>

</body>

</html>