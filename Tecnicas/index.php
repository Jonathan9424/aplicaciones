<?php
session_start();
include('funciones.php');
$base = new Funciones();

if (isset($_POST['usuario'],$_POST['pass'])and $_POST['usuario']!="" and $_POST['pass']!="") {
    $usuario=$base->escape($_POST['usuario']);
    $pass=$base->escape($_POST['pass']);
    $query="select id_user,id_rol,nombre,apellidos,id_prog from usuario where nick='$usuario' and password='$pass'";
    $result=$base->accionPrincipal($query);
    if (mysqli_num_rows($result)>0) {
        $arr=mysqli_fetch_array($result);
        $_SESSION['nombre']=$usuario;
        $_SESSION['pass']=$pass;
        setcookie('nouser',$arr['id_user']);
        setcookie('nombre',strstr($arr['nombre']," ",true));
        setcookie('apellido',strstr($arr['apellidos']," ",true));
        setcookie('prog',$arr['id_prog']);
        setcookie('cont',0);
        if ($arr['id_rol']==1) {
            header('Location: http://localhost/Tecnicas/alumno.php');
        }elseif($arr['id_rol']==2){
            header('Location: docente.php');
        }else{
            $error="Comite";    
        }
    }else{
        $error="usuario no registrado";
    }
}else{
    $error=null;
}
?>

<!-- Document start -->
<!DOCTYPE  html>
<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="estiloscss/estilos.css" type="text/css">
    </head>
    <body>
        <video autoplay muted loop preload="auto" poster="estiloscss/img/uniminuto.jpg"><source src="estiloscss/img/institucionalco.mp4" type="video/mp4"></video>
        <header>
            <div class="chead"><h4>Sistema de gestion de proyectos de grado</h4></div>
        </header>    
        <div id="general">
            <div id="medio">
                <fieldset>
                    <div>
                        <form action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
                            <fieldset>
                                <legend align="center">Ingreso</legend>
                                <label for="usuario">USUARIO </label><input type="text" id="usuario" name="usuario" autofocus><br><br>
                                <label for="contra">CONTRASEÑA </label><input type="password" id="contra" name="pass"><br>
                            </fieldset><br>
                            <input type="submit" value="Ingresar" class="boton">
                        </form>
                        <p><?php echo $error; ?></p>
                        <br><p>¿No tiene una cuenta? <a href="registro.php" onclick="">Cree una</a></p>
                    </div>
                </fieldset>
            </div>
        </div>
        <hr size="3">
        <footer>
            <?php include('footer.php');?>
        </footer>
    </body>
</html>
