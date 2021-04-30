<?php
    require_once "conexion.php";
    class Crud extends Conexion{
        public function mostrardatos(){
            $sql = "SELECT id, nombre, sueldo, edad, fRegistro FROM t_crud";
            //resolución de ambito
            $query= Conexion::conectar() -> prepare($sql);
            $query-> execute();
            return $query->fetchAll();
            $query->default;
        }
        public function insertarDatos($datos){
            $sql="INSERT INTO t_crud (nombre, sueldo, edad, fRegistro)
                                    VALUES (:nombre, :sueldo, :edad, :fRegistro)";
            $query = Conexion::conectar() -> prepare($sql);
            $query -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $query -> bindParam(":sueldo", $datos["sueldo"], PDO::PARAM_STR);
            $query -> bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
            $query -> bindParam(":fRegistro", $datos["fecha"], PDO::PARAM_STR);
            return $query->execute();
            $query->default;
        }
        public function obtenerDatos($id){
            $sql="SELECT id, nombre, sueldo, edad, fRegistro FROM t_crud where id=:id";
            $query = Conexion::conectar()->prepare($sql);
            $query -> bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
            $query->default;    
        }
        public function actualizarDatos($datos){
            $sql ="UPDATE t_crud set 
            nombre = :nombre, sueldo = :sueldo, edad = :edad, fRegistro = :fRegistro where id=:id";
            $query=Conexion::conectar()->prepare($sql);
            $query -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $query -> bindParam(":sueldo", $datos["sueldo"], PDO::PARAM_STR);
            $query -> bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
            $query -> bindParam(":fRegistro", $datos["fecha"], PDO::PARAM_STR);
            $query -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
            return $query->execute();
            $query->default;
        }
        public function eliminarDatos($id){
            $sql ="DELETE from t_crud where id=:id";
            $query = Conexion::conectar()->prepare($sql);
            $query -> bindParam(":id", $id, PDO::PARAM_INT);
            return $query->execute();
            $query->default;
        }
    }
?>