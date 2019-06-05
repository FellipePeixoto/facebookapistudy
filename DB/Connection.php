<?php
    class Connection{
        var $addrs;
        var $userName;
        var $password;
        var $dataBase;

        function __construct(){
            $this->addrs = "localhost";
            $this->userName = "sistema";
            $this->password = "wysbreanalua";
            $this->dataBase = "tetroysdb";
        }

        function connect(){
            return new mysqli($this->addrs, $this->userName, $this->password, $this->dataBase);
        }
    }
?>