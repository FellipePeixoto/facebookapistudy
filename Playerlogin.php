<?php
include 'controller/PlayerController.php';

$id = $_POST['id'];
$name = $_POST['name'];

$player = null;

$playerController = new PlayerController();
$player = $playerController->read($id);

if ($player != null)
    exit;

$player = new Player();
$player->userId = $id;
$player->userName = $name;

$playerController->create($player);
exit;
?>