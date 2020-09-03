<?php

require './vendor/autoload.php';
use App\Connection;
use App\Table\ParticipantTable;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$pdo = Connection::getPDO();
$list = (new ParticipantTable($pdo))->allObj();

echo json_encode($list);

?>