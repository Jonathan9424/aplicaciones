<?php
$base =new Funciones();
$fquery="select * from facultad";
$pquery="select * from programa";
$facultad=$base->accionPrincipal($fquery);
$programa=$base->accionPrincipal($pquery);
?>
<!--Formulario para alta de proyecto-->
<div id="sproyec">
    <div>
        <form action="alumno.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend align="center">Alta de Proyecto</legend>
                <label for="nombre">Nombre </label> <input type="text" name="nombre" id="nombre"><br><br>
                <label for="descrip">Descripcion del proyecto </label><br><br><textarea id="descrip" name="descrip"></textarea><br><br>
                <label for="programa">Programa</label>
                <input type="hidden" name="estado" value="4">
                <select name="programa" id="programa">
                    <?php
                    while($fila=mysqli_fetch_array($programa)){
                        echo "<option value=".$fila['id_prog'].">".$fila['nom_programa']."</option>";
                    }
                    ?>
                </select><br><br>
                <label for="facultad">Facultad</label>
                <select name="facultad" id="facultad">
                   <option>seleccione...</option>
                    <?php
                    while($fila=mysqli_fetch_array($facultad)){
                        echo "<option value=".$fila['id_facultad'].">".$fila['nom_facultad']."</option>";
                    }
                    ?>
                </select>

            </fieldset><br>
            <input type="submit" value="Subir" class="boton">
        </form>
    </div>
</div>
<!--Fin formulario-->