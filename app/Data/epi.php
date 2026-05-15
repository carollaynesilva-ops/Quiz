<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [

    new Pergunta(
        "Qual é a principal finalidade do uso de EPIs no ambiente de trabalho?",
        [
            ["texto" => " Padronizar a vestimenta dos funcionários", "img" => "padrao.jpg"],
            ["texto" => "Aumentar a produtividade da equipe", "img" => "produtividade.jpg"],
            ["texto" => "Proteger o trabalhador contra possíveis riscos e acidentes", "img" => "protecao.jpg"],
            ["texto" => "Facilitar a identificação dos setores da empresa", "img" => "identifica.jpg"]
        ],
        2
    ),

    new Pergunta(

        "Qual dos itens abaixo pode ser considerado um EPI?",

        [

            ["texto" => "Crachá funcional", "img" => "cracha.jpg"],
            ["texto" => "Luva de proteção","img" => "luva.jpg" ],
            ["texto" => "Uniforme social","img" => "uniforme.jpg"],
            ["texto" => "Relógio de ponto", "img" => "relogio.jpg"]

        ],
        1

    ),

    new Pergunta(

        "Em atividades com risco elétrico, qual EPI é mais adequado?",

        [

            [
                "texto" => "Luva de tecido comum",
                "img" => "luva-tecido.jpg"
            ],

            [
                "texto" => "Luva isolante de borracha",
                "img" => "luva-borracha.jpg"
            ],

            [
                "texto" => "Luva descartável de plástico",
                "img" => ".luva-plastico.jpg"
            ],

            [
                "texto" => "Luva térmica doméstica",
                "img" => ".luva-termica.jpg"
            ]

        ],

        1

    ),

    new Pergunta(

        "O uso incorreto dos EPIs pode causar:",

        [

            [
                "texto" => "Maior durabilidade dos equipamentos",
                "img" => "durabilidade.jpg"
            ],

            [
                "texto" => "Redução dos custos da empresa",
                "img" => "custos.jpg"
            ],

            [
                "texto" => "Exposição do trabalhador a acidentes",
                "img" => "acidente.jpg"
            ],

            [
                "texto" => "Melhor aproveitamento do tempo",
                "img" => "tempo.jpg"
            ]

        ],

        2

    ),

    new Pergunta(

        "Quem é responsável por fornecer os EPIs aos funcionários?",

        [

            [
                "texto" => "O próprio trabalhador",
                "img" => "trabalhador.jpg"
            ],

            [
                "texto" => "O sindicato da categoria",
                "img" => "sindicato.jpg"
            ],

            [
                "texto" => "A empresa empregadora",
                "img" => "empresa.jpg"
            ],

            [
                "texto" => "O técnico terceirizado",
                "img" => "tecnico.jpg"
            ]

        ],

        2

    ),

    new Pergunta(

        "Antes de utilizar um EPI, o trabalhador deve:",

        [

            [
                "texto" => "Ajustá-lo e verificar as condições",
                "img" => "verificar.jpg"
            ],

            [
                "texto" => "Usá-lo apenas em atividades longas",
                "img" => "atividade.jpg"
            ],

            [
                "texto" => "Compartilhar com colegas",
                "img" => "colegas.jpg"
            ],

            [
                "texto" => "Modificá-lo para conforto",
                "img" => "conforto.jpg"
            ]

        ],

        0

    ),

    new Pergunta(

        "Qual equipamento é indicado para proteção dos olhos?",

        [

            [
                "texto" => "Óculos de descanso",
                "img" => "oculos-descanso.jpg"
            ],

            [
                "texto" => "Máscara descartável",
                "img" => "mascara.jpg"
            ],

            [
                "texto" => "Óculos de proteção",
                "img" => "oculos-protecao.jpg"
            ],

            [
                "texto" => "Protetor auricular",
                "img" => "protetor.jpg"
            ]

        ],

        2

    ),

    new Pergunta(

        "O uso adequado dos EPIs ajuda a:",

        [

            [
                "texto" => "Diminuir falhas operacionais",
                "img" => "falhas.jpg"
            ],

            [
                "texto" => "Evitar acidentes e preservar a saúde",
                "img" => "seguranca.jpg"
            ],

            [
                "texto" => "Melhorar o desempenho administrativo",
                "img" => "administrativo.jpg"
            ],

            [
                "texto" => "Reduzir manutenção preventiva",
                "img" => "manutencao.jpg"
            ]

        ],

        1

    ),

];
