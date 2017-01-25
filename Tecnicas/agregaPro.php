<?php
session_start();
if (isset($_SESSION['nombre'],$_SESSION['pass'])and $_SESSION['nombre']!="" and $_SESSION['pass']!="") {
    echo "aun sigues activo con la sesion: ".$_SESSION['nombre'];
}else{
    echo "no hay session activa";
}
?>