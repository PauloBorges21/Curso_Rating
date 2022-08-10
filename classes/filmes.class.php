<?php


class Filmes
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function GetAll()
    {
        $filmes=[];
        $sql = "SELECT * FROM filmes";
        $sql = $this->pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return $filmes = $sql->fetchAll();
        } else {
            return [];
        }
    }
}