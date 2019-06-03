<?php
include 'model/Player.php';
include 'controller/PlayerController.php';

$userId = "JSOPIJDAOSDJASOU";
$player;

$playerController = new PlayerController();
$player = $playerController->read($userId);
if (!$this->player){
    //TODO: Chamar o ingame
    die();
}

$playerController = new PlayerController();
$playerController()->create($userName,$userId);
?>