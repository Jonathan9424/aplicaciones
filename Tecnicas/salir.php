<?php
session_start();
session_destroy();
unset($_COOKIE['nombre'],$_COOKIE['nouser'],$_COOKIE['apellido'],$_COOKIE['prog']);
header('Location: index.php');
?>