<?php
require("../_config.php");
require("../controladores/funs.php");
require("../lib/fun_varclean.php");
if (isset($_POST['username'])){
    $username = VarClean($_POST['username']);    
    echo '<h3>Permisos de <b>'.$username.'</b></h3>';
    $sql = "
    SELECT 
        m.idmodulo,
        m.modulo,
        (SELECT IF(COUNT(*) >= 1, 'SI', 'NO') FROM modulos_permisos WHERE iduser = '".$username."' AND idmodulo = m.idmodulo) AS permiso,
        IF ((SELECT COUNT(*) FROM modulos_permisos WHERE iduser = '".$username."' AND idmodulo = m.idmodulo) = 1,
            CONCAT('<button class=\"btn btn-danger\" onclick=\"USUARIOS_permisos_eliminar(', m.idmodulo, ',\'".$username."\');\">Cancelar</button>'),    
            CONCAT('<button class=\"btn btn-success\" onclick=\"USUARIOS_permisos_agregar(', m.idmodulo, ',\'".$username."\');\">Agregar</button>')
        ) AS accion        
    FROM modulos m
    WHERE disable = 0";    

    SQLtoTable($sql);



} else{
    swal("Selecciona un usuario ","warning","false","","GET_usuarios()");
    exit();
}

?>

<div class="container">
  </div>
