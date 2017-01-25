<?php
include('funciones.php');
$base= new Funciones();

//control para atributos de registro al sistema
if (isset($_POST['rol'],
          $_POST['id'],
          $_POST['nombre'],
          $_POST['apellidos'],
          $_POST['email'],
          $_POST['sexo'],
          $_POST['tel'],
          $_POST['programa'],
          $_POST['sede'],
          $_POST['usuario'],
          $_POST['passin'],
          $_POST['passcon'])and
    $_POST['rol']!="" and 
    $_POST['id']!="" and
    $_POST['nombre']!="" and 
    $_POST['apellidos']!="" and 
    $_POST['email']!="" and 
    $_POST['sexo']!="" and 
    $_POST['tel']!="" and 
    $_POST['programa']!="" and 
    $_POST['sede']!="" and 
    $_POST['usuario']!="" and 
    $_POST['passin']!="" and 
    $_POST['passcon']!="") {
    if ($_POST['passin']===$_POST['passcon']) {
        $rol=$_POST['rol'];
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $email=$_POST['email'];
        $sexo=$_POST['sexo'];
        $tel=$_POST['tel'];
        $programa=$_POST['programa'];
        $sede=$_POST['sede'];
        $nick=$_POST['usuario'];
        $pass=$_POST['passin'];

        $query="insert into usuario values(0,$rol,'$nombre ','$apellidos ','$email','$sexo','$tel',$programa,$sede,'$nick','$pass','$id')";

        if ($base->accionPrincipal($query)) {
?>
<script type="text/javascript">
    alert("Se ha regitrado con Exito!!");
    location.href="http://localhost/Tecnicas/index.php";
</script>
<?php
        }else{
?>
<script type="text/javascript">
    alert("Error de registro");
    location.href="http://localhost/Tecnicas/registro.php";
</script>
<?php
        }

    }else{
?>
<script type="text/javascript">
    alert("No coinciden las Contraseñas");
    location.href="http://localhost/Tecnicas/registro.php";
</script>        
<?php
    }

}else{
?>
<script type="text/javascript">
    alert("Datos incorrectos o campos vacios");
    location.href="http://localhost/Tecnicas/registro.php";
</script>
<?php
}
?>