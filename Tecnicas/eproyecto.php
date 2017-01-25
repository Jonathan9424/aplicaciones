<?php
$base=new Funciones();

//query para traer los todos los datos de proyecto
$pquery="select * from proyecto where id_user=".$_COOKIE['nouser'];
$res=$base->accionPrincipal($pquery);
if (!mysqli_num_rows($res)<1) {
    $file=mysqli_fetch_array($res);

    //query para informacion referente a la facultad
    $ffile=$base->facultad("id_facultad",$file['facultad']);

    //query para informacion referente a programa
    $profile=$base->programa("id_prog",$file['programa']);

    //query para especificar en nombre el estado del proyecto
    $efile=$base->estadoP("id_estado",$file['estado_proy']);

    if (is_numeric($file['id_tutor'])) {
        $ufile=$base->usuario("id_user",$file['id_tutor']);
    }else{
        $ufile=null;
    }
}else{
    $file=null;
    $ffile=null;
    $profile=null;
    $ufile=null;
    $efile=null;
}
?>
<!--inicio perfil del proyecto para alumnos-->
<div>
    <fieldset>
        <legend align="center">Estado del Proyecto</legend><br>
        <label><b>Nombre del Proyecto:</b> </label><span><?php echo $file['nom_proyecto'];?></span><br><br>
        <label><b>Descipcion: </b></label><span><?php echo $file['descri_proyecto'];?></span><br><br>
        <label><b>Programa: </b></label><span><?php echo $profile['nom_programa'];?></span><br><br>
        <label><b>Facultad: </b></label><span><?php echo $ffile['nom_facultad'];?></span><br><br>
        <label><b>Estado Proyecto: </b></label><span><?php echo $efile['nom_estado'];?></span><br><br>
        <label><b>Observaciones: </b></label><span><?php echo $file['observaciones'];?></span><br><br>
        <label><b>Tutor: </b></label><span><?php echo $ufile['nombre']." ".$ufile['apellidos'];?></span>
    </fieldset>
</div><br>
<form action="EliminaPro.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="eliminar" name="elimina">
    <input type="hidden" value="<?php echo $file['id_proy'];?>" name="idproy">
    <input type="submit" value="Eliminar Proyecto" class="boton">
</form>
<!--Fin perfil del proyecto-->