<?php

require_once '../config/config.php';
require_once '../app/Classes/Database.php';


$conn = Database::conectar();

$usuarioId = $_SESSION['usuario_id'];

$sql = $conn->prepare(

    "SELECT r.*

FROM resultados r

INNER JOIN (

    SELECT

        usuario_id,

        tema_id,

        quiz_id,

        MAX(data_realizacao) AS ultima_data

    FROM resultados

    WHERE usuario_id = :usuario

    GROUP BY

        tema_id,

        quiz_id

) ultimos

ON r.usuario_id = ultimos.usuario_id

AND IFNULL(r.tema_id,0)
=
IFNULL(ultimos.tema_id,0)

AND IFNULL(r.quiz_id,0)
=
IFNULL(ultimos.quiz_id,0)

AND r.data_realizacao =
ultimos.ultima_data"

);

$sql->execute([

    ':usuario' => $usuarioId

]);

$historico =
    $sql->fetchAll(PDO::FETCH_ASSOC);

$treinamentoPendente = null;

foreach ($historico as $item) {

    if ($item['porcentagem'] < 60) {

        $treinamentoPendente = true;

        break;
    }
}

$sql = $conn->query(

    "SELECT *
FROM quizzes
ORDER BY criado_em DESC"

);

$novosQuizzes = $sql->fetchAll(
    PDO::FETCH_ASSOC
);



if (!isset($_SESSION['usuario_id'])) {

    header("Location:../index.php");

    exit;
}

$conn = Database::conectar();

$sql = $conn->query(

    "SELECT *
FROM quizzes
ORDER BY criado_em DESC"

);

$quizzes = $sql->fetchAll(
    PDO::FETCH_ASSOC
);

?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corporate Training</title>

    <!-- Fonte moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/home.css">
    <script src="assets/js/script.js"></script>
</head>

<body>

    <header class="menu">

        <div class="logo">

            <img src="assets/img/senai.png" alt="SENAI">

            <div class="logo-text">

                <h2>Corporate Training</h2>
                <span>Plataforma de Treinamentos</span>

            </div>

        </div>

        <div class="acoes-header">

            <button id="themeToggle" class="theme-btn">
                ☀
            </button>

            <a href="../logout.php" class="logout-btn">

                Sair

            </a>

        </div>

    </header>

    <main class="container">

        <section class="intro">

            <span class="tag">Treinamento Empresarial</span>

            <h1>
                Capacitação Interativa
                para Empresas
            </h1>

            <p>
                Plataforma desenvolvida para treinamentos corporativos,
                permitindo avaliar conhecimentos essenciais de forma
                prática, rápida e interativa.
            </p>

        </section>

        <?php if ($treinamentoPendente): ?>

            <div class="alerta-refazer">

                ⚠ Você possui um treinamento com menos de 60%.
                Conclua-o novamente para continuar.

            </div>

        <?php endif; ?>

        <?php

        $notasTreinamentos = [];

        $sql = $conn->prepare(

            "SELECT r.tema_id,
            r.porcentagem

     FROM resultados r

     INNER JOIN (

         SELECT
             tema_id,
             MAX(data_realizacao) AS ultima_data

         FROM resultados

         WHERE usuario_id = :usuario

         GROUP BY tema_id

     ) ultimos

     ON r.tema_id = ultimos.tema_id
     AND r.data_realizacao = ultimos.ultima_data

     WHERE r.usuario_id = :usuario"

        );

        $sql->execute([
            ':usuario' => $usuarioId
        ]);

        foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $resultado) {

            $notasTreinamentos[$resultado['tema_id']] = $resultado['porcentagem'];
        }

        $sql->execute([

            ':usuario' => $usuarioId

        ]);

        foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $resultado) {

            $notasTreinamentos[$resultado['tema_id']] = $resultado['nota'];
        }
        ?>

        <section class="temas">

            <?php

            $cursos = [

                [
                    'id' => 2,
                    'tema' => 'primeirossocorros',
                    'imagem' => 'primeiros-socorros.jpg',
                    'categoria' => 'Segurança',
                    'titulo' => 'Primeiros Socorros',
                    'descricao' => 'Conhecimentos básicos para agir em emergências.'
                ],

                [
                    'id' => 1,
                    'tema' => 'epi',
                    'imagem' => 'epi.jpg',
                    'categoria' => 'Proteção',
                    'titulo' => "EPI's",
                    'descricao' => 'Uso correto de equipamentos de proteção individual.'
                ],

                [
                    'id' => 3,
                    'tema' => 'lgpd',
                    'imagem' => 'lgpd.png',
                    'categoria' => 'Segurança Digital',
                    'titulo' => 'LGPD',
                    'descricao' => 'Proteção de dados e boas práticas digitais.'
                ],

                [
                    'id' => 4,
                    'tema' => 'incendio',
                    'imagem' => 'incendio.png',
                    'categoria' => 'Emergência',
                    'titulo' => 'Prevenção de Incêndio',
                    'descricao' => 'Procedimentos básicos em situações de incêndio.'
                ]

            ];

            foreach ($cursos as $curso):

                $nota =
                    $notasTreinamentos[$curso['id']] ?? null;

                $reprovado =
                    $nota !== null
                    &&
                    $nota < 60;

            ?>

                <a
                    href="curso.php?tema=<?= $curso['tema'] ?>"
                    class="card">

                    <img
                        src="assets/img/<?= $curso['imagem'] ?>"
                        alt="">

                    <div class="card-info">

                        <span class="categoria">

                            <?= $curso['categoria'] ?>

                        </span>

                        <h2>

                            <?= $curso['titulo'] ?>

                        </h2>

                        <p>

                            <?= $curso['descricao'] ?>

                        </p>

                        <?php if ($nota !== null): ?>

                            <div class="status-curso
<?= $reprovado
                                ? 'reprovado'
                                : 'aprovado' ?>">

                                <?= $reprovado
                                    ? '❌ Refaça este treinamento'
                                    : '✅ Concluído' ?>

                            </div>

                        <?php endif; ?>

                    </div>

                </a>

            <?php endforeach; ?>

        </section>

        <!-- OUTROS CURSOS -->

        <section class="outros-wrapper">

            <div class="outros-container">

                <div class="titulo-cursos">

                    <h2>Outros Disponíveis</h2>

                    <span>
                        Treinamentos adicionados pela empresa
                    </span>

                </div>

                <div class="cards-novos">

                    <?php foreach ($novosQuizzes as $quiz): ?>

                        <div class="novo-card">

                            <div class="novo-img">

                                <?php if (!empty($quiz['imagem'])): ?>

                                    <img
                                        src="assets/img/<?= $quiz['imagem'] ?>"
                                        alt="">

                                <?php else: ?>

                                    <img
                                        src="assets/img/default.jpg"
                                        alt="">

                                <?php endif; ?>

                            </div>

                            <div class="novo-conteudo">

                                <h3>

                                    <?= $quiz['titulo'] ?>

                                </h3>

                                <p>

                                    <?= substr(
                                        $quiz['curso'],
                                        0,
                                        80
                                    ) ?>...

                                </p>

                                <a
                                    href="curso.php?id=<?= $quiz['id'] ?>"
                                    class="btn-curso">

                                    Acessar treinamento

                                </a>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>
    </main>
    <script src="assets/js/script.js"></script>
</body>

</html>