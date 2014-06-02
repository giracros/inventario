<?php
class CtrCliente
{
    var $ObjCliente;
    var $resultado;
    function CtrCliente($ObjClienteIn)
    {
        $this->ObjCliente=$ObjClienteIn;
    }
//----------METODO PARA MODIFICAR---------------------------------------
    function modificar()
    {
        $Cedula=$this->ObjCliente->getCedula();
        $Nombre=$this->ObjCliente->getNombre();
        $Apellidos=$this->ObjCliente->getApellidos();
        $Direccion=$this->ObjCliente->getDireccion();
        $Telefono=$this->ObjCliente->getTelefono();
        $Celular=$this->ObjCliente->getCelular();
        $Email=$this->ObjCliente->getEmail();
        //---------ARCHIVO PARA CONECTARNOS A LA BASE DE DATOS------------------
        include("../conexionbd/conexion.php");
        //--------CONSULTA PARA modificar----------------------------
        $consulta="call modificarcliente('$Cedula','$Nombre','$Apellidos','$Direccion','$Telefono','$Celular','$Email')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado)
        {
            $this->resultado=$resultado;
        }
        else
        {
            return $conexion;
        }
    }

//----------METODO PARA INSERTAR---------------------------------------
        function insertar()
    {
        $Cedula=$this->ObjCliente->getCedula();
        $Nombre=$this->ObjCliente->getNombre();
        $Apellidos=$this->ObjCliente->getApellidos();
        $Direccion=$this->ObjCliente->getDireccion();
        $Telefono=$this->ObjCliente->getTelefono();
        $Celular=$this->ObjCliente->getCelular();
        $Email=$this->ObjCliente->getEmail();
        //---------ARCHIVO PARA CONECTARNOS A LA BASE DE DATOS------------------
        include("../conexionbd/conexion.php");
        //--------CONSULTA PARA INSERTAR UN CLIENTE----------------------------
        $consulta="call insertarcliente('$Cedula','$Nombre','$Apellidos','$Direccion','$Telefono','$Celular','$Email')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado)
        {
            $this->resultado=$resultado;
        }
        else
        {
            return $conexion;
        }
    }
//----------METODO PARA CONSULTAR---------------------------------------
    function consultar()
    {
        $Cedula=$this->ObjCliente->getCedula();
        //---------ARCHIVO PARA CONECTARNOS A LA BASE DE DATOS------------------
        include("../conexionbd/conexion.php");
        //--------CONSULTA PARA INSERTAR UN CLIENTE----------------------------
        $consulta="call consultarcliente('$Cedula')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado)
        {
            $this->resultado=$resultado;
        }
        else
        {
            return $conexion;
        }
    }
//----------METODO PARA CONSULTAR---------------------------------------
    function consultaringreso()
    {
        $Cedula=$this->ObjCliente->getCedula();
        //---------ARCHIVO PARA CONECTARNOS A LA BASE DE DATOS------------------
        include("../conexionbd/conexion.php");
        //--------CONSULTA PARA INSERTAR UN CLIENTE----------------------------
        $consulta="call consultarclienteingreso('$Cedula')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado)
        {
            $this->resultado=$resultado;
        }
        else
        {
            return $conexion;
        }
    }

//----------METODO PARA LISTAR CLIENTES-------------------------------------
    function listar()
    {
        //---------ARCHIVO PARA CONECTARNOS A LA BASE DE DATOS------------------
        include("../conexionbd/conexion.php");
        //--------CONSULTA PARA INSERTAR UN CLIENTE----------------------------
        $consulta="call listar_clientes()";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado)
        {
            $this->resultado=$resultado;
        }
        else
        {
            return $conexion;
        }
    }
   //----------METODO PARA ELIMINAR---------------------------------------
    function eliminar()
    {
        $Cedula=$this->ObjCliente->getCedula();
       //---------ARCHIVO PARA CONECTARNOS A LA BASE DE DATOS------------------
        include("../conexionbd/conexion.php");
        //--------CONSULTA PARA eliminar----------------------------
        $consulta="call eliminarcliente('$Cedula')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado)
        {
            $this->resultado=$resultado;
        }
        else
        {
            return $conexion;
        }
    }



//---------METODO PARA RETORNAR RESUTLADOS--------------------------------------
    function getResultado()
    {
        return $this->resultado;
    }
}
?>