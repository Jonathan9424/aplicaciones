<?php
include('funciones.php');
$base =new Funciones();

//control para el caso de elegir un programa
if (isset($_POST['idproy'],$_POST['idtutor'],$_POST['elige'])and $_POST['idproy']!="" and $_POST['idtutor']!="" and $_POST['elige']=="elige") {
    $idproy=$_POST['idproy'];
    $tutor=$_POST['idtutor'];
    $query="update proyecto set id_tutor=$tutor where id_proy=$idproy";
    if ($base->accionPrincipal($query)) {
        ?>
        <script type="text/javascript">
            alert("Eleccion Exitosa!!");
            location.href="docente.php";
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert("Error al intentar elegir el proyecto");
            location.href="docente.php?pagina=vproy";
        </script>
        <?php
    }
}

//control para el caso de desvincularse de un programa
if (isset($_POST['idproy'],$_POST['idtutor'],$_POST['elige'])and $_POST['idproy']!="" and $_POST['idtutor']!="" and $_POST['elige']=="elimina") {
    $idproy=$_POST['idproy'];
    $query="update proyecto set id_tutor=null where id_proy=$idproy";
    if ($base->accionPrincipal($query)) {
        ?>
        <script type="text/javascript">
            alert("Desvinculacion Exitosa!!");
            location.href="docente.php";
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert("Error al intentar elegir el proyecto");
            location.href="docente.php?pagina=vproy";
        </script>
        <?php
    }
}
?>