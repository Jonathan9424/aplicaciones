<?php
include('funciones.php');
$base =new Funciones();
if (isset($_POST['descrip'],$_POST['id_user'])and $_POST['descrip']!="" and $_POST['id_user']!="") {
    $texto=$_POST['descrip'];
    $usuario=$_POST['id_user'];

    if (strlen($texto)<199) {
        $query="update proyecto set observaciones='$texto' where id_tutor='".$_COOKIE['nouser']."' and id_user='".$usuario."'";
        if ($base->accionPrincipal($query)) {
?>
<script type="text/javascript">
    alert("Observacion ingresada con Exito!");
    location.href="docente.php";
</script>
<?php
        }else{
?>
<script type="text/javascript">
    alert("Error al igresar observacion...");
    location.href="docente.php?pagina=eproy";
</script>
<?php
        }
    }else{
?>
<script type="text/javascript">
    alert("el texto supera el limite de caracteres \n se permite hasta 200");
    location.href="docente.php?pagina=eproy";
</script>
<?php
    }
}else{
?>
<script type="text/javascript">
    alert("Campos vacios o datos incorrectos");
    location.href="docente.php?pagina=eproy";
</script>
<?php

}
?>