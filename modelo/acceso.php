<?php

class Acceso {

    var $PKUsuario, $Password, $Nombre;

    function __construct() {
        
    }

//----------METODOS SET---------------------------------------------------------
    function setPKUsuario($PKUsuario) {
        $this->PKUsuario = $PKUsuario;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

//-------------METODOS GET------------------------------------------------------
    function getPKUsuario() {
        return $this->PKUsuario;
    }

    function getPassword() {
        return $this->Password;
    }

    function getNombre() {
        return $this->Nombre;
    }

}

?>