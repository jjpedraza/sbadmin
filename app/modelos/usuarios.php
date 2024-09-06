<?php
require("../_config.php");
require_once("../controladores/funs.php");
require_once("../lib/alerts.php");
echo '<h4>Usuarios <button class="btn btn-success" onclick="USUARIOS_nuevo();" style="margin:0px;padding:10px; padding-top:0px; padding-bottom:0px;"><b style="font-size:18pt; font-weight:bold;">+</b></button></h4>';
$sql = 'SELECT 
            u.iduser,
            u.nombre,            
            CONCAT("<button class=\'btn btn-primary\' onclick=\'GET_USUARIOS_editar(\"", u.iduser, "\")\'> <i class=\'fas fa-edit\'></i></button>") AS Editar,
            CONCAT("<button class=\'btn btn-warning\' onclick=\'USUARIOS_permisos(\"", u.iduser, "\")\'> <i class=\'fas fa-cogs\'></i></button>") AS Permisos,
            CONCAT("<button class=\'btn btn-danger\' onclick=\'USUARIOS_eliminar(\"", u.iduser, "\")\'> <i class=\'fas fa-trash-alt\'></i></button>") AS Eliminar
        FROM usuarios u';

SQLtoTable($sql);

?>