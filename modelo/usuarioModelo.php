<?php

require "conexion.php"; 

class usuarioModelo
{

    public static function mdlInsertar($nombre, $apellido, int $genero, $respuesta)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(nombre,apellido,genero,respuesta)VALUES(:nombre,:apellido,:genero,:respuesta)");
            $objRespuesta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $objRespuesta->bindParam(":apellido", $apellido, PDO::PARAM_STR);
            $objRespuesta->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $objRespuesta->bindParam(":genero", $genero, PDO::PARAM_STR);
            $objRespuesta->bindParam(":respuesta",$respuesta, PDO::PARAM_STR);
            
            if ($objRespuesta->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "error";
            }
            $objRespuesta = null;
        } catch (Exception $e) {
            $mensaje = $e;
        }

        return $mensaje;0
    }   

    public static function mdlListarUsuario(){
        $ObjRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario");
        $ObjRespuesta->execute();
        $listaUsuario = $ObjRespuesta->fetchAll();
        $ObjRespuesta = null;
        return $listaUsuario;
    }

    
}