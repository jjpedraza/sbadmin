<?php
session_start();
require("../_config.php");
require("../controladores/login.php");
require_once("../lib/alerts.php");
$IdUser = $_POST['IdUser'];
$password = $_POST['password'];

if (LOGIN_validate($IdUser, $password) == TRUE){
    //  swal("Login Correcto", "success", "false", "../index.php?login=ok", "");
    $_SESSION['IdUser'] = $IdUser;       
    // date_default_timezone_set('Europe/Madrid');
    $_SESSION['iniciada'] = date ("H:i:s");
    $_SESSION['login'] = 1;
    echo '<script>';    
    echo 'window.location.href = "index.php?ok=login";';
    echo '</script>';
} else {
    swal("Login Incorrecto", "danger", "false", "../index.php?login=false", "");
}
?>