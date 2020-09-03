<?php

use App\Connection;
use App\Model\Participant;
use App\Table\ParticipantTable;

require './vendor/autoload.php';
//required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Mehods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization ,X-Requested-With");

$pdo = Connection::getPDO();
$participantTable = new ParticipantTable($pdo);

$dataz = file_get_contents("php://input");
if(isset($dataz) && !empty($dataz)){
$data = json_decode($dataz);
//var_dump($_POST);
//var_dump($data);
}

if(isset($_GET['id'])){
    $participantTable = new ParticipantTable($pdo);

    //var_dump($data);
    $pdo->beginTransaction();
    $participantTable->deleteParticipant($_GET['id']);
    $pdo->commit();
}


?>

