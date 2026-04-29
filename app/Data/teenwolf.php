<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [
    new Pergunta(
        "O Scott é o quê?",
        ["Vampiro", "Lobisomem", "Fantasma", "Humano"],
        1
    ),
    new Pergunta(
        "Quem mordeu o Scott?",
        ["Derek", "Stiles", "Jackson", "Peter"],
        3
    )
];