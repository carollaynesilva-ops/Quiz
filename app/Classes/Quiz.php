<?php

class Quiz {
    private array $perguntas;

    public function __construct(array $perguntas) {
        $this->perguntas = $perguntas;
    }

    public function getPergunta(int $indice): ?Pergunta {
        return $this->perguntas[$indice] ?? null;
    }

    public function total(): int {
        return count($this->perguntas);
    }

    public function verificar(int $indice, int $resposta): bool {
        return $this->perguntas[$indice]->isCorreta($resposta);
    }
}