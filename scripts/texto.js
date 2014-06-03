function validartexto()
{
var cedula=document.getElementById("cedula").value;
if(cedula==="")
{
alert("Ingrese un valor");
document.getElementById("cedula").focus();
return false;
}
}