<?php

class QuizController {
    private Quiz $quiz;

    public function __construct(Quiz $quiz) {
        $this->quiz = $quiz;

        $_SESSION['indice'] ??= 0;
        $_SESSION['pontuacao'] ??= 0;
    }

    public function responder(int $resposta): void {
        $indice = $_SESSION['indice'];

        if ($this->quiz->verificar($indice, $resposta)) {
            $_SESSION['pontuacao']++;
        }

        $_SESSION['indice']++;
    }

    public function getPerguntaAtual(): ?Pergunta {
        return $this->quiz->getPergunta($_SESSION['indice']);
    }

    public function terminou(): bool {
        return $_SESSION['indice'] >= $this->quiz->total();
    }

    public function getPontuacao(): int {
        return $_SESSION['pontuacao'];
    }
}