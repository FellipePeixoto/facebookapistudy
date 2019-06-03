<?php
    include "DB/Connection.php";

    class PlayerController{

        function default_conn(){
            $conn = new Connection();

            if ($conn->connect()->connect_error)
                die("Conexão com banco falhou: " . $conn->connect_error);

            print_r($conn);
            return $conn;
        }

        function create($player){
            $conn = $this->default_conn();

            $query = $conn->conn->prepare("INSERT INTO PLAYERS (nickName, userId) VALUES (?, ?)");
            $query->bind_param("si",$player->userName, $player->userId);

            $query->execute();

            $conn->close();
            $query->close();
        }

        function read($userId){
            $conn = $this->default_conn();

            $query = $conn->conn->prepare("SELECT * FROM PLAYERS WHERE userId = ?");
            $query->bind_param("i",$userId);

            $data = $query->execute();

            $conn->close();
            $query->close();

            $player = null;

            if ($data)
            {
                $player = new Player();
                $player->userName = $data['nickName'];
                $player->userId = $data['userId'];
                $player->userScore = $data['playerScore'];
            }

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