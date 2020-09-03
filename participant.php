<?php
//required headers
require './vendor/autoload.php';
use App\Connection;
use App\Table\ParticipantTable;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-ALlow-Mehods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");


$pdo = Connection::getPDO();
$id = isset($_GET['id']) ? $_GET['id'] : die();
$participant = (new ParticipantTable($pdo))->find($id);

$participantArr = array(
    "id" => $id,
    "nom" => $participant->getNom(),
    "prenom" => $participant->getPrenom(),
    "email" => $participant->getEmail(),
    "dateDeNaissance" => $participant->getDateDeNaissance(),
    "sexe" => $participant->getSexe(),
    "situationF" => $participant->getSituationF(),
    "actif" => $participant->getActif()
);

print_r(json_encode($participantArr));
