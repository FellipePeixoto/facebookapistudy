<?php
    class Connection{
        var $addrs;
        var $userName;
        var $password;
        var $dataBase;
        public $conn;

        function __construct(){
            $this->addrs = "localhost";
            $this->userName = "sistema";
            $this->password = "wysbreanalua";
            $this->dataBase = "tetroysdb";
        }


        function connect(){
            $conn = new mysqli($this->addrs, $this->userName, $this->password, $this->dataBase);
            print_r($conn);
            return $conn;
        }

        function close(){
            $this->conn->close();
        }
    }
?>