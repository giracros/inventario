<?php

class Cliente {

    var $Cedula, $Nombre, $Apellidos, $Direccion, $Telefono, $Celular, $Email;

    function __construct() {
        
    }

//--------METODOS SET-----------------------------------------------------------
    function setCedula($Cedula) {
        $this->Cedula = $Cedula;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setCelular($Celular) {
        $this->Celular = $Celular;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

//--------METODOS GET-----------------------------------------------------------
    function getCedula() {
        return $this->Cedula;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellidos() {
        return $this->Apellidos;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getCelular() {
        return $this->Celular;
    }

    function getEmail() {
        return $this->Email;
    }

}

?>