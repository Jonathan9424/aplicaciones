<?php
include('funciones.php');
$base =new Funciones();
if(isset($_POST['elimina'],$_POST['idproy'])and $_POST['elimina']=="eliminar" and $_POST['idproy']!=""){
    $idproy=$_POST['idproy'];
    
    $query="delete from proyecto where id_proy=$idproy";
    if ($base->accionPrincipal($query)) {
        ?>
        <script type="text/javascript">
            alert("eliminacion Exitosa!!");
            location.href="alumno.php";
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert("Error al eliminar!!");
            location.href="alumno.php";
        </script>
        <?php
    }
    
}
?>