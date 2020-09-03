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
$participant = new ParticipantTable($pdo);

if(isset($_GET['email'])){
    $exist = $participant->exists("email", $_GET['email']);
}

if($exist) {
    echo json_encode(
        array("message"=>true)
    );
} else { // if unable to create participant, notify user
    echo json_encode(
        array("message"=>false)
    );
}