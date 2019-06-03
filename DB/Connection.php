<?php
    class Connection{
        $servername = "localhost";
        $username = "TETROYS";
        $password = "wysbreanalua";

        public $conn;

        function connect(){
            $conn = new mysqli(this->$servername, this->$username, this->$password);
            return $conn;
        }

        function close(){
            $conn->close();
        }
    }
?>