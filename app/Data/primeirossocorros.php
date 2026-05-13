<?php
require_once __DIR__ . '/../Classes/Pergunta.php';

return [

    new Pergunta(
        "Qual deve ser a primeira atitude ao encontrar uma pessoa desacordada",
        [
            ["texto" => "Dar água imediatamente", "img" => "agua.jpg"],
            ["texto" => "Verificar se o local é seguro e chamar ajuda", "img" => "seguro.jpg"],
            ["texto" => " Levantar a pessoa rapidamente", "img" => "levantando.jpg"],
            ["texto" => " Oferecer algum medicamento", "img" => "remedio.jpg"]
        ],
        1
    ),

    new Pergunta(
        "Em caso de sangramento intenso, o que deve ser feito?",
        [
            ["texto" => "Fazer compressão no ferimento com um pano limpo", "img" => "pano.jpg"],
            ["texto" => "lavar o local continuamente com água", "img" => "lavar.jpg"],
            ["texto" => "Aplicar pomada no machucado médica", "img" => "pomada.jpg"],
            ["texto" => "Movimentar o membro lesionado constantemente", "img" => "movimento.jpg"]
        ],
        0
    ),

    new Pergunta(
        "O que NÃO deve ser feito em caso de queimadura?",
        [
            ["texto" => "Resfriar a área com água corrente", "img" => "torneira.jpg"],
            ["texto" => "Cobrir com pano limpo após os primeiros cuidados", "img" => "curativo.jpg"],
            ["texto" => "Passar pasta de dente ou manteiga na queimadura", "img" => "pasta.jpg"],
            ["texto" => "Procurar atendimento dependendo da gravidade", "img" => "hospital.jpg"]
        ],
        2
    ),

    new Pergunta(
        "Em uma situação de engasgo grave, qual atitude pode ajudar a desobstruir as vias aéreas?",
        [
            ["texto" => "Fazer a pessoa beber água rapidamente", "img" => "beber_agua.jpg"],
            ["texto" => "Deitar a pessoa imediatamente no chão", "img" => "deitar.jpg"],
            ["texto" => "Realizar compressões abdominais adequadas", "img" => "compressao.jpg"],
            ["texto" => "Pedir para a pessoa correr", "img" => "correr.jpg"]
        ],
        2
    ),

    new Pergunta(
        "Qual é o número do SAMU no Brasil?",
        [
            ["texto" => "190", "img" => "190.jpg"],
            ["texto" => "193", "img" => "193.jpg"],
            ["texto" => "188", "img" => "188.jpg"],
            ["texto" => "192", "img" => "192.jpg"]
        ],
        3
    )

];
