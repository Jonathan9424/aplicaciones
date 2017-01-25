<?php
session_start();
include('funciones.php');
$base =new Funciones();
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
?>
<!--Prueba Start-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio en modo alumno</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="estiloscss/ealumno.css" type="text/css">
    </head>
    <body>
        <div>
            <header>
                <hr size="8">
                <div class="imagen">
                    <span> <?php echo $_COOKIE['nombre']." ".$_COOKIE['apellido']."  ";?> - </span>
                    <span><a href="docente.php?pagina=perfil" id="perfil">Ver Perfil</a></span>
                    <a href="salir.php" class="salir"><input type="submit" value="Salir de session" onclick="alert('sesion finalizada');"></a>
                    <h2>Ingreso al sistema Docente</h2>
                </div>
                <hr size="8">      
            </header>
            <aside>
                <ul>
                    <li><a href="docente.php">Inicio</a></li>
                    <li><a href="docente.php?pagina=bproy">Buscar proyecto</a></li>
                    <li><a href="docente.php?pagina=eproy">Estado del proyecto</a></li>
                </ul>
            </aside>
            <section>
                <?php
    if ($pagina=="bproy") {
        $tabla=$base->proyecto($_COOKIE['prog']);
        echo $tabla;
    }elseif($pagina=="eproy"){
        include('edocente.php');
    }elseif($pagina=="vproy"){
        include('verProyec.php');
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