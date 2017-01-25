<?php
include('funciones.php');
$base =new Funciones();
$fquery="select * from sede";
$pquery="select * from programa";
$rquery="select * from rol";
$sede=$base->accionPrincipal($fquery);
$programa=$base->accionPrincipal($pquery);
$rol=$base->accionPrincipal($rquery);
?>
<!--Document Start-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro de Usuario</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="estiloscss/estiloRe.css" type="text/css">
    </head>
    <body>
        <header>
            <hr size="8">
            <div class="imagen"><h2>Registro al sistema</h2></div>
            <hr size="8">
        </header>
        <main id="cuerpo">
            <div>
                <!--Register Form-->
                <form action="R.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Registo de participantes</legend>
                        <label for="rol">Rol </label>
                        <select id="rol" name="rol">
                            <?php
                            while($fila=mysqli_fetch_array($rol)){
                                if ($fila['id_rol']==1 or $fila['id_rol']==2) {
                                    echo "<option value=".$fila['id_rol'].">".$fila['nom_rol']."</option>";
                                }
                            }
                            ?>
                        </select><br><br>
                        <label for="id">ID</label><input type="text" name="id" id="id"><br><br>
                        <label for="nombre">Nombre </label><input type="text" name="nombre" id="nombre"><br><br>
                        <label for="apellidos">Apellidos </label><input type="text" name="apellidos" id="apellidos"><br><br>
                        <label for="mail">Correo </label><input type="email" name="email" id="email"><br><br>
                        <label for="sexo">Sexo </label><br>
                        <input type="radio" name="sexo" id="sexo" value="M">Masculino<br>
                        <input type="radio" name="sexo" id="sexo" value="F">Femenino<br><br>
                        <label for="tel">Telefono </label><input type="text" name="tel" id="tel" pattern="[0-9]{1,10}" placeholder="number"><br><br>
                        <label for="programa">Programa </label>
                        <select id="programa" name="programa">
                            <?php
                            while($fila=mysqli_fetch_array($programa)){
                                echo "<option value=".$fila['id_prog'].">".$fila['nom_programa']."</option>";
                            }
                            ?>
                        </select><br><br>
                        <label for="sede">Sede </label>
                        <select id="sede" name="sede">
                            <?php
                            while($fila=mysqli_fetch_array($sede)){
                                echo "<option value=".$fila['id_sede'].">".$fila['nombre_sede']."</option>";
                            }
                            ?>
                        </select><br><br>
                        <label for="usuario">Usuario </label><input type="text" name="usuario" id="usuario"><br><br>
                        <label for="passin">Contraseña </label><input type="password" name="passin" id="passin" placeholder="password"><br><br>
                        <label for="passcon">Confirma la Contrase&ntilde;a </label><input type="password" name="passcon" id="passcon" placeholder="confirm password"><br>
                    </fieldset><br>
                    <input type="submit" value="Registrar" id="botonR">
                </form>
                <!--End Register Form-->
                <br><button><a href="index.php">Atr&atilde;s</a></button>
            </div>
        </main>
        <footer>
            <?php include('footer.php');?>
        </footer>
    </body>
</html>    