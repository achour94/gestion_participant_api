<?php

use App\Connection;
use App\Model\Participant;
use App\Table\ParticipantTable;

require './vendor/autoload.php';

//required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$dataz = file_get_contents("php://input");
if(isset($dataz) && !empty($dataz)){
$data = json_decode($dataz);
//var_dump($_POST);
//var_dump($data);
}

$pdo= Connection::getPDO();
$participant = new Participant();


if(!empty($data)){
    $participantTable = new ParticipantTable($pdo);
    
    $participant->setNom($data->nom);
    $participant->setPrenom($data->prenom);
    $participant->setEmail($data->email);
    $participant->setDateDeNaissance($data->dateDeNaissance);
    $participant->setSexe($data->sexe);
    $participant->setSituationF($data->situationF);
    $participant->setID($data->id);
    //var_dump($participant);
    $pdo->beginTransaction();
    $participantTable->updateParticipant($participant);
    $pdo->commit();
}
?>