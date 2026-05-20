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
        $temaId,
        $acertos,
        $erros,
        $porcentagem

    ) {

        $sql = $this->conn->prepare(

            "INSERT INTO resultados(

            usuario_id,
            tema_id,
            acertos,
            erros,
            porcentagem

        )

        VALUES(

            :usuario,
            :tema,
            :acertos,
            :erros,
            :porcentagem

        )"

        );

        return $sql->execute([

            ':usuario' => $usuarioId,
            ':tema' => $temaId,
            ':acertos' => $acertos,
            ':erros' => $erros,
            ':porcentagem' => $porcentagem

        ]);
    }
}
