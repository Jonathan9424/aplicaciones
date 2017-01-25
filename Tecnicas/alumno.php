<?php
session_start();
include('funciones.php');
if (isset($_SESSION['nombre'],$_SESSION['pass'])) {
    if ($_COOKIE['cont']==0) {
        setcookie('cont',1);
?>
<script type="text/javascript">alert("Bienvenido: <?php echo $_COOKIE['nombre']." ".$_COOKIE['apellido']; ?>");</script>
<?php
    }
    if (isset($_GET['pagina'])and $_GET['pagina']!="") {
        $pagina=$_GET['pagina'];
    }else{
        $pagina=null;
    }

    if (isset($_POST['nombre'],$_POST['descrip'],$_POST['programa'],$_POST['facultad'],$_POST['estado'])and $_POST['nombre']!="" and $_POST['descrip']!="" and $_POST['programa']!="" and $_POST['facultad']!="" and $_POST['estado']!="") {
        $nombre=$_POST['nombre'];
        $descrip=$_POST['descrip'];
        $programa=$_POST['programa'];
        $facultad=$_POST['facultad'];
        $estado=$_POST['estado'];
        $pquery="insert into proyecto values(0,'$nombre','$descrip',$programa,$facultad,'$estado',' ',".$_COOKIE['nouser'].",null)";
        $base =new Funciones();
        if ($base->accionPrincipal($pquery)) {
?>
<script type="text/javascript">alert("Proyecto anclado exitosamente!!");</script>
<?php
        }
    }else{
        $exito=null;
    }
?>
<!--Alumno Start-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio en modo alumno</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="estiloscss/ealumno.css" type="text/css">
    </head>
    <body>
        <div id="alumno">
            <header>
                <hr size="8">
                <div class="imagen">
                    <span> <?php echo $_COOKIE['nombre']." ".$_COOKIE['apellido']."  ";?> - </span>
                    <span><a href="alumno.php?pagina=perfil" id="perfil">Ver Perfil</a></span>
                    <a href="salir.php" class="salir"><input type="submit" value="Salir de session" onclick="alert('sesion finalizada');"></a>
                    <h2>Ingreso al sistema Alumnos</h2>
                </div>
                <hr size="8">      
            </header>
            <aside>
                <ul>
                    <li><a href="alumno.php">Inicio</a></li>
                    <li><a href="alumno.php?pagina=sproy">Subir proyecto</a></li>
                    <li><a href="alumno.php?pagina=eproy">Estado del proyecto</a></li>
                </ul>
            </aside>
            <section>
                <?php
    if ($pagina=="sproy") {
        include('sproyecto.php');
    }elseif($pagina=="eproy"){
        include('eproyecto.php');
    }elseif($pagina=="perfil"){
        include('perfil.php');
    }else{
        echo "<img src='estiloscss/img/bienvenida.jpg' width='100%'>";
    }
                ?>
            </section>
            <footer>
                <?php include('footer.php');?>
            </footer>
        </div>
    </body>
</html>
<!--Fin pagina alumno-->
<?php
}else{
?>
<script type="text/javascript">
    alert("aun no haz iniciado sesion\nInicia con un usuario o contraeña y/o cree una cuenta");
    location.href="index.php";
</script>
<?php
}
?>

