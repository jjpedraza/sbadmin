<?php
require("../_config.php");
require_once("../controladores/funs.php");
require_once("../lib/alerts.php");
require("../lib/fun_varclean.php");
if(isset($_POST['username']) ) {
    $username = VarClean($_POST['username']);

    if (USUARIOS_eliminar($username) == TRUE){
        swal("Se ha eliminado con exito al usuario $username","success","false","","GET_usuarios()", $IdUser);
    } else {
        swal("Error al eliminar al usuario $username","danger","false","","", $IdUser);
    }
    
} else {
    swal("Error de parametros al elminar al  usuario","danger","false","","", $IdUser);
}

?>