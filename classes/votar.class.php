<?php


class Votar
{
    private $pdo;
    private $id;
    private $nota;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertVoto($id, $votar)
    {
        $sql = "Insert INTO votos SET id_filme=:id_filme,nota = :nota";
        $sql= $this->pdo->prepare($sql);
        $sql->bindValue(":id_filme", $id);
        $sql->bindValue(":nota",$votar);
        $sql->execute();

        $this->AtualizarMedia($id);
    }

    private function AtualizarMedia($id)
    {
        $sql = "UPDATE filmes SET media = (SELECT (SUM(nota) / COUNT(*) ) FROM votos where votos.id_filme = filmes.idfilmes) where idfilmes = :id_filmes";
        $sql= $this->pdo->prepare($sql);
        $sql->bindValue(":id_filmes", $id);
        $sql->execute();
        header("Location: index.php");
        exit;
    }

}