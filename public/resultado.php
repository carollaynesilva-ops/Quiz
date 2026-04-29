<?php
require_once '../config/config.php';

$pontuacao = $_SESSION['pontuacao'] ?? 0;
$tema = $_SESSION['tema'] ?? '';

echo "<h1>Resultado: $pontuacao</h1>";

echo "<a href='index.php'>Voltar</a>";

session_destroy();