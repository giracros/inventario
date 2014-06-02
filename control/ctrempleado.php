<?php
class CtrEmpleado
{
    var $ObjEmpleado;
    var $resultado;

    function CtrEmpleado($ObjEmpleadoIn)
    {
     $this->ObjEmpleado=$ObjEmpleadoIn;
    }
    function GetResultado()
    {
      return $this->resultado;
    }
    function insertar()
    {
     $CodEmpleado=$this->ObjEmpleado->GetCodigo();
     $Nombre=$this->ObjEmpleado->GetNombre();
     $consulta="call insertarEmpleado('$CodEmpleado','$nombre')";
     $resultado=mysqli_query($conexion,$consulta);
     if($resultado)
     {
       return $this->resultado=$resultado;
     }
     else
     {
       return $conexion;
     }

    }

}
?>
