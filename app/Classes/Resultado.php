<?php

require_once 'Database.php';

class Resultado
{

    private $conn;

    public function __construct()
    {

        $this->conn = Database::conectar();
    }

    public function salvar(
        $usuarioId,
        $id,
        $acertos,
        $erros,
        $porcentagem,
        $tipo = 'tema'
    ) {

        if ($tipo == 'tema') {

            $sql = $this->conn->prepare(

                "INSERT INTO resultados
        (
            usuario_id,
            tema_id,
            acertos,
            erros,
            porcentagem
        )

        VALUES
        (
            :usuario,
            :id,
            :acertos,
            :erros,
            :porcentagem
        )"

            );
        } else {

            $sql = $this->conn->prepare(

                "INSERT INTO resultados
        (
            usuario_id,
            quiz_id,
            acertos,
            erros,
            porcentagem
        )

        VALUES
        (
            :usuario,
            :id,
            :acertos,
            :erros,
            :porcentagem
        )"

            );
        }

        return $sql->execute([

            ':usuario' => $usuarioId,
            ':id' => $id,
            ':acertos' => $acertos,
            ':erros' => $erros,
            ':porcentagem' => $porcentagem

        ]);
    }
}
