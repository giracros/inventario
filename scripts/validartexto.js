function validartexto()
{
  var cedula=document.getElementById("Cedula").value;
  var correo=document.getElementById("Email").value;
  var retorno=true;
  if(cedula=="")
  {
    alert("Ingrese un valor");
    document.getElementById("Cedula").focus();
    retorno= false;
  }
  else if (isNaN(cedula))
  {
   alert("Ingrese un valor numerico");
   document.getElementById("Cedula").select();
    document.getElementById("Cedula").focus();
    retorno=false;
  }
  return retorno;
}