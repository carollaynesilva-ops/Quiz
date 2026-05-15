<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [

    new Pergunta(

        "Qual é a primeira atitude ao identificar um princípio de incêndio?",

        [

            [
                "texto" => "Continuar trabalhando normalmente",
                "img" => "trabalho.jpg"
            ],

            [
                "texto" => "Apagar o fogo sem avaliar riscos",
                "img" => "apagar.jpg"
            ],

            [
                "texto" => "Acionar o alarme e comunicar",
                "img" => "alarme.jpg"
            ],

            [
                "texto" => "Abrir portas e janelas",
                "img" => "janelas.jpg"
            ]

        ],

        2

    ),

    new Pergunta(

        "Qual extintor é indicado para equipamentos elétricos?",

        [

            [
                "texto" => "Extintor de água",
                "img" => "extintor_agua.jpg"
            ],

            [
                "texto" => "Extintor de espuma",
                "img" => "espuma.jpg"
            ],

            [
                "texto" => "Extintor de CO₂",
                "img" => "co2.jpg"
            ],

            [
                "texto" => "Extintor de areia",
                "img" => "areia.jpg"
            ]

        ],

        2

    ),

    new Pergunta(

        "Qual atitude deve ser evitada durante uma evacuação?",

        [

            [
                "texto" => "Seguir orientações da brigada",
                "img" => "brigada.jpg"
            ],

            [
                "texto" => "Correr e empurrar pessoas",
                "img" => "empurrar.jpg"
            ],

            [
                "texto" => "Manter a calma",
                "img" => "calma.jpg"
            ],

            [
                "texto" => "Usar saídas de emergência",
                "img" => "saida.jpg"
            ]

        ],

        1

    ),

    new Pergunta(

        "Para que serve a brigada de incêndio?",

        [

            [
                "texto" => "Prevenir e combater incêndios",
                "img" => "brigada.jpg"
            ],

            [
                "texto" => "Realizar manutenção elétrica",
                "img" => "manutencao.jpg"
            ],

            [
                "texto" => "Fiscalizar produtividade",
                "img" => "produtividade.jpg"
            ],

            [
                "texto" => "Controlar visitantes",
                "img" => "visitante.jpg"
            ]

        ],

        0

    ),

    new Pergunta(

        "Qual é a função da sinalização de emergência?",

        [

            [
                "texto" => "Decorar ambientes",
                "img" => "decoracao.jpg"
            ],

            [
                "texto" => "Indicar rotas e equipamentos",
                "img" => "sinalizacao.jpg"
            ],

            [
                "texto" => "Organizar setores",
                "img" => "setores.jpg"
            ],

            [
                "texto" => "Identificar funcionários",
                "img" => "funcionarios.jpg"
            ]

        ],

        1

    )
];
