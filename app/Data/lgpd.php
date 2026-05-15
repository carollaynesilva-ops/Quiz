<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [

    new Pergunta(

        "O que é Wi-Fi?",

        [

            [
                "texto" => "Um cabo de energia",
                "img" => "cabo.jpg"
            ],

            [
                "texto" => "Uma internet sem fio",
                "img" => "wifi.jpg"
            ],

            [
                "texto" => "Um tipo de monitor",
                "img" => "monitor.jpg"
            ],

            [
                "texto" => "Um aplicativo de celular",
                "img" => "app.jpg"
            ]

        ],

        1

    ),

    new Pergunta(

        "Qual cuidado ajuda na segurança digital?",

        [

            [
                "texto" => "Usar a mesma senha",
                "img" => "senha.jpg"
            ],

            [
                "texto" => "Compartilhar senhas",
                "img" => "compartilhar.jpg"
            ],

            [
                "texto" => "Atualizar programas e usar senhas fortes",
                "img" => "seguranca_senha.jpg"
            ],

            [
                "texto" => "Desativar antivírus",
                "img" => "antivirus.jpg"
            ]

        ],

        2

    ),

    new Pergunta(

        "Qual é a principal função de um navegador?",

        [

            [
                "texto" => "Editar imagens",
                "img" => "imagem.jpg"
            ],

            [
                "texto" => "Acessar conteúdos online",
                "img" => "navegador.jpg"
            ],

            [
                "texto" => "Melhorar áudio",
                "img" => "audio.jpg"
            ],

            [
                "texto" => "Criar hardware",
                "img" => "hardware.jpg"
            ]

        ],

        1

    ),

    new Pergunta(

        "Qual dispositivo é usado para armazenar arquivos?",

        [

            [
                "texto" => "Mouse",
                "img" => "mouse.jpg"
            ],

            [
                "texto" => "Teclado",
                "img" => "teclado.jpg"
            ],

            [
                "texto" => "SSD",
                "img" => "ssd.jpg"
            ],

            [
                "texto" => "Webcam",
                "img" => "webcam.jpg"
            ]

        ],

        2

    ),

    new Pergunta(

        "Qual peça é o “cérebro” do computador?",

        [

            [
                "texto" => "Mouse",
                "img" => "mouse2.jpg"
            ],

            [
                "texto" => "Monitor",
                "img" => "monitor.jpg"
            ],

            [
                "texto" => "Processador",
                "img" => "processador.jpg"
            ],

            [
                "texto" => "Caixa de som",
                "img" => "som.jpg"
            ]

        ],

        2

    )
];
