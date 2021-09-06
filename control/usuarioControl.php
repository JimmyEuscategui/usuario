<?php

include_once "../modelo/usuarioModelo.php";

class usuarioControl
{

    public $idUsuario;
    public $nombre;
    public $apellido;
    public $direccion;
    public $genero;
    public $respuesta;

    public function ctrInsertar()
    {
        $ObjRespuesta = usuarioModelo::mdlInsertar($this->nombre, $this->apellido, $this->direccion, $this->genero, $this->respuesta);
        echo json_encode($ObjRespuesta);
    }

    public function ctrModificar()
    {

    }

    public function ctrEliminar()
    {
        
    }

    public function ctrListarUsuario()
    {
        $ObjRespuesta = usuarioModelo::mdlListarUsuario();
        echo json_encode($ObjRespuesta);
    }

}

if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["genero"]) && isset($_post["respuesta"])) {
    $objUsuario = new usuarioControl();
    $objUsuario->nombre = $_POST["curso"];
    $objUsuario->apellido = $_POST["apellido"];
    $objUsuario->direccion = $_POST["direccion"];
    $objUsuario->genero = $_POST["genero"];
    $objUsuario->respuesta = $_POST["respuesta"];
    $objUsuario->ctrInsertar();
}

if (isset($_POST["listaUsuario"]) == "ok"){
    $ObjListarUsuario = new usuarioControl();
    $ObjListarUsuario->ctrListarUsuario();
 }