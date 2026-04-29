<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [

    new Pergunta(
        "O Scott é o quê?",
        [
            ["texto" => "Vampiro", "img" => "scott.jpg"],
            ["texto" => "Lobisomem", "img" => "scott.jpg"],
            ["texto" => "Fantasma", "img" => "scott.jpg"],
            ["texto" => "Humano", "img" => "scott.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Quem é o melhor amigo do Scott?",
        [
            ["texto" => "Derek", "img" => "stiles.jpg"],
            ["texto" => "Stiles", "img" => "stiles.jpg"],
            ["texto" => "Jackson", "img" => "jackson.jpg"],
            ["texto" => "Peter", "img" => "peter.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Quem mordeu o Scott?",
        [
            ["texto" => "Derek", "img" => "derek.jpg"],
            ["texto" => "Peter", "img" => "peter.jpg"],
            ["texto" => "Stiles", "img" => "stiles.jpg"],
            ["texto" => "Lydia", "img" => "lydia.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Qual o nome da cidade?",
        [
            ["texto" => "Beacon Hills", "img" => "cidade.jpg"],
            ["texto" => "Riverdale", "img" => "cidade.jpg"],
            ["texto" => "Mystic Falls", "img" => "cidade.jpg"],
            ["texto" => "Gotham", "img" => "cidade.jpg"]
        ],
        0
    ),

    new Pergunta(
        "Scott se torna qual tipo de lobisomem?",
        [
            ["texto" => "Alpha", "img" => "scott.jpg"],
            ["texto" => "Beta", "img" => "scott.jpg"],
            ["texto" => "Omega", "img" => "scott.jpg"],
            ["texto" => "Humano", "img" => "scott.jpg"]
        ],
        0
    )

];