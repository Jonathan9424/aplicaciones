<?php
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
        <script type="text/javascript">alert("hola soy alumno: <?php echo $_COOKIE['nombre']; ?>");</script>
        <link rel="stylesheet" href="estiloscss/ealumno.css" type="text/css">
    </head>
    <body>
        <div>
            <header>
                <hr size="8">
                <div class="imagen">
                    <spam> hola <?php //echo $_COOKIE['nombre']." ";?></spam>
                    <a href="salir.php" class="salir"><input type="submit" value="Salir de session" onclick="alert('haz salido');"></a>
                    <h2>Ingreso al sistema Alumnos</h2>
                </div>
                <hr size="8">      
            </header>
            <aside>
                <ul>
                    <li><a href="prueba.php?pagina=sproy">Subir proyecto</a></li>
                    <li><a href="prueba.php?pagina=eproy">Estado del proyecto</a></li>
                </ul>
            </aside>
            <section>
                <?php
                if ($pagina=="sproy") {
                    include('sproyecto.php');
                }elseif($pagina=="eproy"){
                    echo "eproy";
                }else{
                    echo "imagen";
                }
                ?>
            </section>
            <footer>

            </footer>
        </div>
    </body>
</html>