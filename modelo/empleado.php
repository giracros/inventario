
<?php
class Empleado
{
    var $CodEmpleado,$Nombre,$Apellido,$Documento,$Direccion,$Telefono,$Celular,$Email;
    function __contruct()
    {

    }
//----Metodos para retornar valores---------------------------------------------
function GetCodEmpleado()
{
  return $this->CodEmpleado;
}
//----------metodos para enviar resultado

function SetCodEmpleado($CodEmpleado)
{
  $this->CodEmpleado=$codEmpleado;
}

}
?>
