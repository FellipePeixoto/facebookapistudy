<?PHP
include "controller/PlayerController.php";

$playerController = new PlayerController();
$players = $playerController->read_4Bests(($_GET['id']));

header('Content-type: application/json');
echo json_encode($players);
?>