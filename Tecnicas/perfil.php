<?php
$base =new Funciones();
if (isset($_COOKIE['nouser'])and $_COOKIE['nouser']!="") {
    $id=$_COOKIE['nouser'];
    $filas=$base->usuario("id_user",$id); //consulta para usuarios
    $rol=$base->rol("id_rol",$filas['id_rol']); //consulta para el rol con base al usuario
    $prog=$base->programa("id_prog",$filas['id_prog']); // consulta programa con base al usuario
    $sede=$base->sede("id_sede",$filas['id_sede']); //consulta sede con base al usuario
?>
<!--Atributos del perfil-->
<style>
    label{
        display: inline-block;
        width: 100px;
    }
</style>
<div>
    <fieldset>
        <legend>Perfil</legend>
        <label for="nombre"><b>NRC: </b></label><span><?php echo $filas['id_alum'];?></span><br><br>
        <label for="nombre"><b>Nombre: </b></label><span><?php echo $filas['nombre'];?></span><br><br>
        <label for="nombre"><b>Apellidos </b></label><span><?php echo $filas['apellidos'];?></span><br><br>
        <label for="nombre"><b>Rol: </b></label><span><?php echo $rol['nom_rol'];?></span><br><br>
        <label for="nombre"><b>Correo: </b></label><span><?php echo $filas['email'];?></span><br><br>
        <label for="nombre"><b>Sexo: </b></label><span><?php echo $filas['sexo'];?></span><br><br>
        <label for="nombre"><b>telefono: </b></label><span><?php echo $filas['telefono'];?></span><br><br>
        <label for="nombre"><b>programa: </b></label><span><?php echo $prog['nom_programa'];?></span><br><br>
        <label for="nombre"><b>sede: </b></label><span><?php echo $sede['nombre_sede'];?></span><br><br>
        <label for="nombre"><b>usuario: </b></label><span><?php echo $filas['nick'];?></span><br><br>
    </fieldset>
</div>
<!--Fin atributos-->
<?php
}else{
?>
<script type="text/javascript">
    alert("autentiquese para ver su perfil");
    location.href="index.php";
</script>
<?php
}
?>