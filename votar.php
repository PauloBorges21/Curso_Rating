<?php
require 'config.php';

require_once 'classes/votar.class.php';
$votar = new Votar($pdo);
$voto = filter_input(INPUT_GET, 'voto', FILTER_SANITIZE_STRING);
$idFilme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

if (!empty($voto) && !empty($idFilme)) {

    $voto = intval($voto);
    $idFilme = intval($idFilme);

if($voto >= 1 && $voto <= 5)
{
    $votar->insertVoto($idFilme, $voto);
} else {
    header("location: index.php");
}

} else {
    header("location: index.php");
    exit;
}