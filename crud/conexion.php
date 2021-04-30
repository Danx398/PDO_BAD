<?php
    class Conexion{
        public function conectar(){
            $conexion = new PDO("mysql:host=localhost:3307;dbname=pdof", "root", "");
            return $conexion;
        }
    }
?>