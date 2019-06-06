<?php
    include "DB/Connection.php";
    include "model/Player.php";

    class PlayerController {

        function default_conn(){
            $obj = new Connection();
            $conn = $obj->connect();

            if ($conn->connect_error)
                die("Conexão com banco falhou: " . $conn->connect_error);

            return $conn;
        }

        function create($player){
            $conn = $this->default_conn();

            $query = $conn->prepare("INSERT INTO PLAYER (nickName, userId) VALUES (?, ?)");
            $query->bind_param("ss", $player->userName, $player->userId);

            $query->execute();

            $conn->close();
            $query->close();
        }

        function read($userId){

            $sql = "SELECT * FROM PLAYER WHERE userId = ?";

            $player = null;

            $conn = $this->default_conn();

            $query = $conn->prepare($sql);

            $query->bind_param("s",$userId);

            $query->execute();

            $result = $query->get_result();

            if ($result->num_rows > 0)
            {
                if ($row = $result->fetch_assoc())
                {
                    $player = new Player();
                    $player->id = $row['id_player'];
                    $player->userName = $row['nickName'];
                    $player->userId = $row['userId'];
                    $player->userScore = $row['playerScore'];
                }
            }

            return $player;
        }

        function read_4Bests($id){

            $sql = "SELECT userId, nickName, playerScore FROM PLAYER_TOP4";

            $players = [];

            $conn = $this->default_conn();

            $query = $conn->prepare($sql);

            $query->execute();

            $result = $query->get_result();

            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    array_push($players, $row);
                }
            }

            array_push($players, $this->read($id));

            return $players;
        }

        function update_Score($score, $userId) {

            $player = $this->read($userId);

            if ($player->userScore >= $score)
                die();

            $sql = "UPDATE PLAYER SET playerScore = ? WHERE userId = ?";

            $conn = $this->default_conn();

            $query = $conn->prepare($sql);

            $query->bind_param("is", $score, $userId);

            $query->execute();
        }

        function delete(){
            
        }
    }
?>