<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [
    new Pergunta(
        "Qual a cor principal da Barbie?",
        ["Azul", "Preto", "Rosa", "Verde"],
        2
    ),
    new Pergunta(
        "A Barbie é conhecida por ser?",
        ["Detetive", "Versátil", "Vilã", "Robô"],
        1
    )
];