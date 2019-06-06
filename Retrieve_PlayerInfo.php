<?PHP
include "controller/PlayerController.php";

$playerController = new PlayerController();
$player = $playerController->read($_GET['id']);

header('Content-type: application/json');
echo json_encode($player);
?>