<?php
$base=new Funciones();

//query para traer los todos los datos de proyecto
if (isset($_GET['idproy'])and $_GET['idproy']!="") {
    $pquery="select * from proyecto where id_proy=".$_GET['idproy'];
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
    }
?>
<!--inicio del perfil del proyecto-->
<div>
    <fieldset>
        <legend align="center">Informacion del Proyecto</legend><br>
        <label><b>Nombre del Proyecto:</b> </label><span><?php echo $file['nom_proyecto'];?></span><br><br>
        <label><b>Descipcion: </b></label><span><?php echo $file['descri_proyecto'];?></span><br><br>
        <label><b>Programa: </b></label><span><?php echo $profile['nom_programa'];?></span><br><br>
        <label><b>Facultad: </b></label><span><?php echo $ffile['nom_facultad'];?></span><br><br>
        <label><b>Estado Proyecto: </b></label><span><?php echo $efile['nom_estado'];?></span><br><br>
        <label><b>Observaciones: </b></label><span><?php echo $file['observaciones'];?></span><br><br>
        <label><b>Tutor: </b></label><span><?php echo $ufile['nombre']." ".$ufile['apellidos'];?></span>
    </fieldset>
</div><br>
<form action="eligePro.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="elige" value="elige">
    <input type="hidden" name="idproy" value="<?php echo $file['id_proy']?>">
    <input type="hidden" name="idtutor" value="<?php echo $_COOKIE['nouser']?>">
    <input type="submit" value="Elegir" class="boton">
</form>
<!--Fin del perfil del proyecto-->
<?php
}else{
    echo "no se ha selecionado proyecto";
}
?>
