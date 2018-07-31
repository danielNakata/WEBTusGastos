<?php


    class Conexion{

        public $host = "fdb20.awardspace.com";
        public $port = "3306";
        public $user = "2789616_controlgastos";
        public $pass = "s02006480D";
        public $name = "2789616_controlgastos";
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
