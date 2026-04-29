<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [

    new Pergunta(
        "Qual a cor principal da Barbie?",
        [
            ["texto" => "Azul", "img" => "barbie1.jpg"],
            ["texto" => "Rosa", "img" => "barbie2.jpg"],
            ["texto" => "Preto", "img" => "barbie3.jpg"],
            ["texto" => "Verde", "img" => "barbie4.jpg"]
        ],
        1
    ),

    new Pergunta(
        "A Barbie pode ser:",
        [
            ["texto" => "Apenas modelo", "img" => "barbie1.jpg"],
            ["texto" => "Qualquer profissão", "img" => "barbie2.jpg"],
            ["texto" => "Só médica", "img" => "barbie3.jpg"],
            ["texto" => "Nada", "img" => "barbie4.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Quem é o namorado da Barbie?",
        [
            ["texto" => "Ken", "img" => "ken.jpg"],
            ["texto" => "Ryan", "img" => "ken.jpg"],
            ["texto" => "Lucas", "img" => "ken.jpg"],
            ["texto" => "Jake", "img" => "ken.jpg"]
        ],
        0
    ),

    new Pergunta(
        "Qual estilo representa a Barbie?",
        [
            ["texto" => "Sombrio", "img" => "barbie1.jpg"],
            ["texto" => "Elegante e versátil", "img" => "barbie2.jpg"],
            ["texto" => "Medieval", "img" => "barbie3.jpg"],
            ["texto" => "Futurista", "img" => "barbie4.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Onde a Barbie mora?",
        [
            ["texto" => "Barbie Dreamhouse", "img" => "casa.jpg"],
            ["texto" => "Castelo", "img" => "casa.jpg"],
            ["texto" => "Apartamento simples", "img" => "casa.jpg"],
            ["texto" => "Floresta", "img" => "casa.jpg"]
        ],
        0
    )

];