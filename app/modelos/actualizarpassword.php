<?php
require("../_seguridad.php");
require("../_config.php");

require_once("../controladores/funs.php");
require_once("../lib/alerts.php");
require("../lib/fun_varclean.php");
if(isset($_POST['password_actual']) && isset($_POST['password_nuevo']) ) {    
    
    $password_actual = VarClean($_POST['password_actual']);
    $password_nuevo = VarClean($_POST['password_nuevo']);    
    if (ActualizarPassword($password_actual, $password_nuevo, $IdUser) == TRUE){
        swal("Se ha actualizado con exito $username","success","false","","Home()");
    } else {
        swal("Error al crear actualizar el password de usuario $username","danger","false","","Home()");
    }
    
} else {
    swal("Error de parametros","danger","false","","Home()");
}

?>