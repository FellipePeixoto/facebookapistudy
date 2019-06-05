<?php
include "controller/PlayerController.php";

$player = new PlayerController();
$player->update_score($_POST['score'], $_POST['id']);
?>