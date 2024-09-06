<?php
require("../_seguridad.php");
require("../_config.php");
require_once("../controladores/funs.php");
require_once("../lib/alerts.php");
require("../lib/fun_varclean.php");
if( isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['correo'])) {
   $username = $IdUser;
    $nombre = VarClean($_POST['nombre']);
    $telefono = VarClean($_POST['telefono']);
    $correo = VarClean($_POST['correo']);
    $password = VarClean($_POST['password']);

    if (USUARIOS_editar($username, $nombre, $telefono, $correo, $password) == TRUE){
         //subir foto
         if ( isset($_FILES['url_foto']) && !empty($_FILES['url_foto']['name'])) {
            $foto = $_FILES['url_foto'];
            $upload_directory = '../fotos/'; // Directorio donde se guardarán las fotos
            $extension_alta = pathinfo($foto['name'], PATHINFO_EXTENSION);

            // Obtener información de la foto        
            $foto_name = "perfil_".$IdUser.".".$extension_alta;
            $foto_tmp_name = $foto['tmp_name'];
            
            // Mover la foto al directorio de subida
            $url = $upload_directory.$foto_name;
            // echo "URL: ".$url;
            if (move_uploaded_file($foto_tmp_name, $upload_directory . $foto_name)) {
                if (MiPerfil_updateurl($IdUser, $foto_name)==TRUE){
                    echo "Foto subida";
                } else {
                   echo "error al subir la foto";
                }
            } 
        }   
        swal("Se ha actualizado con exito el usuario $username","success","false","","MiPerfil('".$IdUser."')");
    } else {
        swal("Error al actualizar al usuario $username","danger","false","","MiPerfil('".$IdUser."')");
    }
    
} else {
    swal("Error de parametros para actualizar usuario","danger","false","","");
}

?>