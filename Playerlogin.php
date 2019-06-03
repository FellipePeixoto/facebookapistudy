<?php
include 'model/Player.php';
include 'controller/PlayerController.php';

public $player;

$playerController = new PlayerController();
$this->player = $playerController()->read($userId);
if (!$this->player){
    //TODO: Chamar o ingame
    die();
}
return false;
$playerController = new PlayerController();
$playerController()->create($userName,$userId);
?>