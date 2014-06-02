<html>
    <head>
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script language="javascript" type="text/javascript" src="scripts/validariniciosesion.js"></script>
    </head>
    <body>
        <form action="vista/validarusuario.php" method="post">

            <table cellpadding="0" cellspacing="0" border="1" class="tablainformes1">
                <tr><th class="titulo" colspan="2">Ingreso Al Sistema</th></tr>
                <tr class="celda">
                    <td align="right" heigth="75" width="40%">User</td>
                    <td align="left" >
                        <input name="Usuario" id="Usuario" />
                    </td>
                </tr>
                <tr class="celda">
                    <td align="right" heigth="60%">Password</td>
                    <td align="left" >
                        <input type="password" name="Contrasena" id="Contrasena" />
                    </td>
                </tr>
                <tr >
                    <th class="titulo" colspan="2">
                        <input type="submit" value="Ingresar"/>
                    </th>
                </tr >
            </table>
        </form>
    </center>
</body>
</html>