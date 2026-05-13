<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [

    new Pergunta(
        "Qual casa o Harry pertence?",
        [
            ["texto" => "Sonserina", "img" => "sonserina.jpg"],
            ["texto" => "Grifinória", "img" => "grifinoria.jpg"],
            ["texto" => "Corvinal", "img" => "corvinal.jpg"],
            ["texto" => "Lufa-Lufa", "img" => "lufalufa.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Qual é o nome completo do Harry?",
        [
            ["texto" => "Harry James Potter", "img" => "harry.jpg"],
            ["texto" => "Harry Sirius Potter", "img" => "harry2.jpg"],
            ["texto" => "Harry Alvo Potter", "img" => "harry3.jpg"],
            ["texto" => "Harry Remus Potter", "img" => "harry4.jpg"]
        ],
        0 // mostra a resposta correta(isso é um array querida)
    ),

    new Pergunta(
        "Quem é o diretor de Hogwarts?",
        [
            ["texto" => "Snape", "img" => "snape.jpg"],
            ["texto" => "Dumbledore", "img" => "dumbledore.jpg"],
            ["texto" => "Hagrid", "img" => "hagrid.jpg"],
            ["texto" => "Draco", "img" => "draco.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Qual o nome do melhor amigo do Harry?",
        [
            ["texto" => "Draco", "img" => "draco.jpg"],
            ["texto" => "Rony", "img" => "rony.jpg"],
            ["texto" => "Neville", "img" => "neville.jpg"],
            ["texto" => "Cedrico", "img" => "cedrico.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Qual feitiço desarma o oponente?",
        [
            ["texto" => "Avada Kedavra", "img" => "varinha.jpg"],
            ["texto" => "Expecto Patronum", "img" => "varinha.jpg"],
            ["texto" => "Expelliarmus", "img" => "varinha.jpg"],
            ["texto" => "Lumos", "img" => "varinha.jpg"]
        ],
        2
    )

];