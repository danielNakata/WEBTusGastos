<?php


    class Conexion{

        public $host = "127.0.0.1";
        public $port = "3306";
        public $user = "root";
        public $pass = "";
        public $name = "controlgastos";
        public $link = "";
        public $isConnected = true;


        function creaConexion(){
            $this->link = mysqli_connect($this->host.":".$this->port,$this->user, $this->pass, $this->name);
            $this->isConnected = true;
            if(!$this->link){
            $this->isConnected = false;
            }
        }

        function getConexion(){
            return $this->link;
        }

        function getIsConnected(){
            return $this->isConnected;
        }


    }


?>