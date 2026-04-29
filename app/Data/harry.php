<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [
    new Pergunta(
        "Qual casa o Harry pertence?",
        ["Sonserina", "Grifinória", "Corvinal", "Lufa-Lufa"],
        1
    ),
    new Pergunta(
        "Quem é o melhor amigo dele?",
        ["Draco", "Rony", "Snape", "Voldemort"],
        1
    )
];