<?php
require("../_config.php");
require_once("../controladores/funs.php");
require_once("../lib/alerts.php");
require("../lib/fun_varclean.php");
if(isset($_POST['username']) && isset($_POST['idmodulo'])) {
    $username = VarClean($_POST['username']);
    $idmodulo = $_POST['idmodulo'];
  
    if (USUARIOS_permisos_eliminar($username, $idmodulo) == TRUE){
        swal("Se ha retirado el permiso con exito el usuario $username","success","false","","USUARIOS_permisos('".$username."')");
    } else {
        swal("Error al eliminar el permiso $idmodulo  al usuario $username","danger","false","","USUARIOS_permisos('".$username."')");
    }
    
} else {
    swal("Error de parametros para eliminar permiso  usuario","danger","false","","GET_usuarios()");
}

?>