<?php

require_once 'Database.php';

class Usuario
{

    private $conn;

    public function __construct()
    {

        $this->conn = Database::conectar();
    }

    public function cadastrar(
        $nome,
        $data,
        $usuario,
        $senha,
        $tipo = 'funcionario'
    ) {

        $senhaHash = password_hash(
            $senha,
            PASSWORD_DEFAULT
        );

        $sql = $this->conn->prepare(

            "INSERT INTO usuarios
    (
        nome_completo,
        data_nascimento,
        usuario,
        senha,
        tipo
    )

    VALUES
    (
        :nome,
        :data,
        :usuario,
        :senha,
        :tipo
    )"

        );

        return $sql->execute([

            ':nome' => $nome,
            ':data' => $data,
            ':usuario' => $usuario,
            ':senha' => $senhaHash,
            ':tipo' => $tipo

        ]);
    }

    public function login(
        $usuario,
        $senha
    ) {

        $sql = $this->conn->prepare(

            "SELECT * FROM usuarios
        WHERE usuario=:usuario"

        );

        $sql->execute([

            ':usuario' => $usuario

        ]);

        $dados = $sql->fetch(PDO::FETCH_ASSOC);

        if (

            $dados &&
            password_verify(
                $senha,
                $dados['senha']
            )

        ) {

            return $dados;
        }

        return false;
    }
}
