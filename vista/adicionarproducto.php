<?php
$j=$_GET["j"];//---------VARIABLE PARA IDENTIFICAR EL NUMERO DE LA DIV CREADA POR EL AJAX-------------------
?>
<input type="hidden" name="Pos[]" id="Pos" value="<?php echo $j?>">
<table width="783" border="0" cellpadding="0" cellspacing="0" class="rayas1" >
    <tr width="200">
        <td width="70" align="left"><input  size="4" name="Codigo[]" id="Codigo" value="0"></td>
        <td width="70" align="left"><input  size="6" name="NombreP[]" id="NombreP" value="0"></td>
        <td width="70" align="left"><input size="4" name="Precio[]" id="Precio" value=""></td>
        <td width="20"><label onclick="quitardivs('DivHija<?php echo $j;?>')"><img width='20' src="../imagenes/eliminar.ico"></label></td>
    </tr>
</table>