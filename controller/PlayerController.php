<?php
    include "DB/Connection.php";

    class PlayerController{

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
            $query->bind_param("ss",$player->userName, $player->userId);

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

            print_r($player);

            return $player;
        }

        function read_4Bests(){
            
        }

        function update_Score(){

        }

        function delete(){
            
        }
    }
?>