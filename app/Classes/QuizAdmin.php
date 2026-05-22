<?php

require_once 'Database.php';

class QuizAdmin
{

    private $conn;

    public function __construct()
    {

        $this->conn = Database::conectar();
    }

    public function criarQuiz(
        $titulo,
        $curso,
        $imagem,
        $adminId
    ) {

        $sql = $this->conn->prepare(

            "INSERT INTO quizzes
        (
        titulo,
        curso,
        imagem,
        criado_por
        )

        VALUES
        (
        :titulo,
        :curso,
        :imagem,
        :admin
        )"

        );

        $sql->execute([

            ':titulo' => $titulo,
            ':curso' => $curso,
            ':imagem' => $imagem,
            ':admin' => $adminId

        ]);

        return $this->conn->lastInsertId();
    }

    public function salvarPergunta(
        $quizId,
        $pergunta
    ) {

        $sql = $this->conn->prepare(

            "INSERT INTO perguntas
        (
        quiz_id,
        pergunta
        )

        VALUES
        (
        :quiz,
        :pergunta
        )"

        );

        $sql->execute([

            ':quiz' => $quizId,
            ':pergunta' => $pergunta

        ]);

        return $this->conn->lastInsertId();
    }

    public function salvarOpcao(

        $perguntaId,
        $texto,
        $imagem,
        $correta

    ) {

        $sql = $this->conn->prepare(

            "INSERT INTO opcoes
        (
        pergunta_id,
        texto,
        imagem,
        correta
        )

        VALUES
        (
        :pergunta,
        :texto,
        :imagem,
        :correta
        )"

        );

        return $sql->execute([

            ':pergunta' => $perguntaId,
            ':texto' => $texto,
            ':imagem' => $imagem,
            ':correta' => $correta

        ]);
    }

    public function excluirQuiz($id)
    {

        $sql = $this->conn->prepare(

            "DELETE FROM quizzes
        WHERE id=:id"

        );

        return $sql->execute([

            ':id' => $id

        ]);
    }
}
