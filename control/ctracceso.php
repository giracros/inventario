<?php

class CtrAcceso {

    var $ObjAcceso;
    var $resultado;

    function CtrAcceso($ObjAccesoIn) {
        $this->ObjAcceso = $ObjAccesoIn;
    }

//----------METODO PARA BUSCAR EL USUARIO---------------------------------------
    function validarusuario() {
        $PKUsuario = $this->ObjAcceso->getPKUsuario();
        $Password = $this->ObjAcceso->getPassword();
        //-------ARCHIVO PARA CONECTARNOS A LA BASE DE DATOS--------------------
        include("../conexion/conexion.php");
        //---------CONSULTA PARA VALIDAR EL USUARIO-----------------------------
        $resultado = mysqli_query($conexion, "call validarusuario('$PKUsuario','$Password')");
        if (!$resultado) {
            return $conexion;
        } else {
            $this->resultado = $resultado;
        }
    }

//-----------METODO PARA RETORNAR RESULTADOS------------------------------------
    function getResultado() {
        return $this->resultado;
    }

}

?>