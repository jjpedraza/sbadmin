<?php
require("../_config.php");
require_once("../controladores/funs.php");
require_once("../lib/alerts.php");
require("../lib/fun_varclean.php");
if(isset($_POST['username']) && isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['correo'])) {
    $username = VarClean($_POST['username']);
    $nombre = VarClean($_POST['nombre']);
    $telefono = VarClean($_POST['telefono']);
    $correo = VarClean($_POST['correo']);
    $password = $_POST['password'];
    if (USUARIOS_crear($username, $nombre, $telefono, $correo, $password) == TRUE){
        swal("Se ha creado con exito el usuario $username","success","false","","GET_usuarios()");
    } else {
        swal("Error al crear al usuario $username","danger","false","","GET_usuarios()");
    }
    
} else {
    swal("Error de parametros para crear usuario","danger","false","","");
}

?>