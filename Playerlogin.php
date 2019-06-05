<?php
include 'model/Player.php';
include 'controller/PlayerController.php';
ob_start();

$id = $_COOKIE["id"];
$name = $_COOKIE["name"];

$player = null;

$playerController = new PlayerController();
$player = $playerController->read($id);

if ($player != null){
    //TODO: Chamar o ingame
    header("Location:ingame.html");
    die();
}

$player = new Player();
$player->userId = $id;
$player->userName = $name;

$playerController->create($player);
header("Location:ingame.html");
?>