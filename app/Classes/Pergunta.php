<?php

class Pergunta {
    private string $texto;
    private array $opcoes;
    private int $correta;

    public function __construct(string $texto, array $opcoes, int $correta) {
        $this->texto = $texto;
        $this->opcoes = $opcoes;
        $this->correta = $correta;
    }

    public function getTexto(): string {
        return $this->texto;
    }

    public function getOpcoes(): array {
        return $this->opcoes;
    }

    public function isCorreta(int $resposta): bool {
        return $resposta === $this->correta;
    }
}