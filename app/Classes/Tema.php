<?php

class Tema {
    private string $nome;
    private string $css;

    public function __construct(string $nome, string $css) {
        $this->nome = $nome;
        $this->css = $css;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCss(): string {
        return $this->css;
    }
}