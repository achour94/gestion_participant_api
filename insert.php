<?php
//required headers

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require './vendor/autoload.php';

use App\Connection;
use App\Model\Participant;
use App\Table\ParticipantTable;

//date_default_timezone_set("Asia/Kolkata");

//get posted data
$dataz = file_get_contents("php://input");
if(isset($dataz) && !empty($dataz)){
$data = json_decode($dataz);
//var_dump($_POST);
//var_dump($data);
}
//var_dump($data->nom);

$pdo = Connection::getPDO();
$participant = new Participant();


if(!empty($data)){
    $participantTable = new ParticipantTable($pdo);
    
    $participant->setNom($data->nom);
    $participant->setPrenom($data->prenom);
    $participant->setEmail($data->email);
    $participant->setDateDeNaissance($data->dateDeNaissance);
    $participant->setSexe($data->sexe);
    $participant->setSituationF($data->situationF);
    //var_dump($participant);
    $pdo->beginTransaction();
    $participantTable->createParticipant($participant);
    $pdo->commit();
}
if($participant->getID()) {
    echo json_encode(
        array("message"=>"Participant was created.")
    );
} else { // if unable to create participant, notify user
    echo json_encode(
        array("message"=>"Unable to create product.")
    );
}
?>