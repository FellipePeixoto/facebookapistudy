<?php
include 'model/Player.php';
include 'controller/PlayerController.php';

$player = null;

$playerController = new PlayerController();
$player = $playerController->read("JSOPIJDAOSDJASOU");

if ($player != null){
    //TODO: Chamar o ingame
    die();
}

$player = new Player();
$player->userName = "Jose carlos da silva";
$player->userId = "JSOPIJDAOSDJASOU";

$playerController->create($player);
?>