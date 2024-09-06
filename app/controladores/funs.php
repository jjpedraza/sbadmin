<?php
function ObtenerData($query, $Compatibilidad = 'datatable', $tabla="TablaReporte") {
  // Variable de conexión a la base de datos
  global $db;

  // Ejecuta la consulta
  $result = mysqli_query($db, $query);

  // Verifica si hay resultados
  if (!$result) {
      die('Error al ejecutar la consulta: ' . mysqli_error($db));
  }

  // Obtiene las columnas
  $columnas = array();
  while ($columna = mysqli_fetch_field($result)) {
      $columnas[] = $columna->name;
  }

  // Obtiene los registros
  $registros = array();
  while ($registro = mysqli_fetch_assoc($result)) {
      $registros[] = $registro;
  }

  // Verifica la compatibilidad solicitada
  if ($Compatibilidad === 'datatable') {
      // Crea la tabla HTML con los datos obtenidos
      $tabla = '<table id="'.$tabla.'" class="table table-hover" width="100%">';
      $tabla .= '<thead><tr>';
      foreach ($columnas as $columna) {
          $tabla .= '<th>' . $columna . '</th>';
      }
      $tabla .= '</tr></thead>';

      $tabla .= '<tbody>';
      foreach ($registros as $registro) {
          $tabla .= '<tr>';
          foreach ($registro as $valor) {
              $tabla .= '<td class="">' . $valor . '</td>';
          }
          $tabla .= '</tr>';
      }
      $tabla .= '</tbody>';

      $tabla .= '</table>';
  } elseif ($Compatibilidad === 'pdf') {
      // Crea la tabla HTML con los datos obtenidos para TCPDF
      $tabla = '<table cellpadding="3">';
      $tabla .= '<tr>';
      foreach ($columnas as $columna) {
          $tabla .= '<th style="background-color: #ccc; text-align: center;">' . $columna . '</th>';
      }
      $tabla .= '</tr>';

      foreach ($registros as $registro) {
          $tabla .= '<tr>';
          foreach ($registro as $valor) {
              $tabla .= '<td style="text-align: center;">' . $valor . '</td>';
          }
          $tabla .= '</tr>';
      }

      $tabla .= '</table>';
  } elseif ($Compatibilidad === 'excel') {
      // Inicia la salida de datos para Excel
      header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
      header('Content-Disposition: attachment; filename=reporte.xls');

      // Genera la tabla HTML para Excel
      $tabla = '<table>';
      $tabla .= '<tr>';
      foreach ($columnas as $columna) {
          $tabla .= '<th>' . $columna . '</th>';
      }
      $tabla .= '</tr>';

      foreach ($registros as $registro) {
          $tabla .= '<tr>';
          foreach ($registro as $valor) {
              $tabla .= '<td>' . $valor . '</td>';
          }
          $tabla .= '</tr>';
      }

      $tabla .= '</table>';

      // Imprime la tabla HTML para Excel
      echo $tabla;

      // Finaliza la ejecución del script después de la exportación
      exit();
  } else {
      die('Compatibilidad no válida');
  }

  // Retorna la tabla HTML
  return $tabla;
  
}

function StringGenerate($len=4){    
    $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $cadena_base .= '0123456789' ;
    // $cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
   
    $password = '';
    $limite = strlen($cadena_base) - 1;
   
    for ($i=0; $i < $len; $i++)
      $password .= $cadena_base[rand(0, $limite)];
   
    return $password;
}
  
function SQLtoTable($sql, $IdTabla="", $buttons= 'true'){
    if ($IdTabla == ""){
        $IdTabla = StringGenerate(6);
    }     
    echo ObtenerData($sql, "datatable",$IdTabla); 
    echo '<script>DATATABLE_active("'.$IdTabla.'", '.$buttons.');</script>';

}

function USUARIOS_crear($username, $nombre, $telefono, $correo, $password){
    require("../_config.php");
    if (strtolower($username) == "admin") {
        return FALSE;
    } else {
     
        $sql="INSERT INTO usuarios (iduser, nombre, telefono, correo, password) VALUES ('".$username."','".$nombre."','".$telefono."','".$correo."','".$password."')";
        $sql_limpia = mysqli_real_escape_string($db, $sql);
        try {
            if ($db->query($sql)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (mysqli_sql_exception $e) {
            // Capturando el error
            $error_message = $e->getMessage();
            // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
            // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
            echo "Error al ejecutar la consulta: " . $error_message;
            Historia("ERROR AL CREAR EL USUARIO ".$username." (".$sql_limpia.") ".$error_message, "ERROR");
            return FALSE;
        }
    }
}

function Historia($descripcion, $tipo = "", $IdUser=""){
    require("../_config.php");
    
    // Escapar la variable
    $descripcion_limpia = mysqli_real_escape_string($db, $descripcion);


    $sql="INSERT INTO historia (descripcion, tipo, fecha, hora, iduser) VALUES ('".$descripcion_limpia."','".$tipo."','".$Fecha."','".$Hora."','".$IdUser."')";
    
    try {
        if ($db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    } catch (mysqli_sql_exception $e) {
        // Capturando el error
        // $error_message = $e->getMessage();
        // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
        // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
        // echo "Error al ejecutar la consulta: " . $error_message;
        return FALSE;
    }
}


function USUARIOS_eliminar($username){
    require("../_config.php");
    if (strtolower($username) == "admin") {
        return FALSE;
    } else {

        
        $sql="DELETE FROM usuarios WHERE iduser='".$username."'";
        
        try {
            if ($db->query($sql)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (mysqli_sql_exception $e) {
            // Capturando el error
            $error_message = $e->getMessage();
            // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
            // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
            echo "Error al ejecutar la consulta: " . $error_message;
            Historia("ERROR AL ELIMINAR EL USUARIO ".$username." ".$error_message, "ERROR");
            return FALSE;
        }
    }
}


function USUARIOS_editar($username, $nombre, $telefono, $correo, $password){
    require("../_config.php");
    
        $sql="INSERT INTO usuarios (iduser, nombre, telefono, correo) VALUES ('".$username."','".$nombre."','".$telefono."','".$correo."')";

        $sql = "
        UPDATE usuarios SET 
        nombre = '".$nombre."',
        telefono = '".$telefono."',
        correo = '".$correo."',
        password = '".$password."'

        WHERE iduser='".$username."'

        ";
        $sql_limpia = mysqli_real_escape_string($db, $sql);
        try {
            if ($db->query($sql)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (mysqli_sql_exception $e) {
            // Capturando el error
            $error_message = $e->getMessage();
            // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
            // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
            echo "Error al ejecutar la consulta: " . $error_message;
            Historia("ERROR AL ACTUALIZAR EL USUARIO ".$username." (".$sql_limpia.") ".$error_message, "ERROR");
            return FALSE;
        }
    
}

function USUARIOS_permisos_eliminar($username, $idmodulo) {
    require("../_config.php");


        
        $sql="DELETE FROM modulos_permisos WHERE iduser='".$username."' and idmodulo='".$idmodulo."'";
        // echo $sql;
        try {
            if ($db->query($sql)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (mysqli_sql_exception $e) {
            // Capturando el error
            $error_message = $e->getMessage();
            // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
            // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
            echo "Error al ejecutar la consulta: " . $error_message;
            Historia("ERROR AL ELIMINAR EL PERMISO $idmodulo del Usuario ".$username." ".$error_message, "ERROR");
            return FALSE;
        }
    
}



function USUARIOS_permisos_agregar($username, $idmodulo) {
    require("../_config.php");


        
        
        $sql = "
            INSERT INTO modulos_permisos (iduser, idmodulo) VALUES ('".$username."','".$idmodulo."')
        ";
        // echo $sql;
        try {
            if ($db->query($sql)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (mysqli_sql_exception $e) {
            // Capturando el error
            $error_message = $e->getMessage();
            // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
            // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
            echo "Error al ejecutar la consulta: " . $error_message;
            Historia("ERROR AL AGREGAR EL PERMISO $idmodulo del Usuario ".$username." ".$error_message, "ERROR");
            return FALSE;
        }
    
}

function ActualizarPassword($password_actual, $password_nuevo, $IdUser){
    require("../_config.php");
    
        $sql = "SELECT * FROM usuarios WHERE iduser='".$IdUser."' and disable=0";    
        echo $sql;
        $rp= $db-> query($sql);
        if($f = $rp -> fetch_array())
        {
            $password = $f['password'];
        }
        if ($password_actual == $password){
            
            $sql = "
                UPDATE usuarios SET password ='".$password_nuevo."' WHERE iduser='".$IdUser."'
            ";
            echo $sql;
            try {
                if ($db->query($sql)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } catch (mysqli_sql_exception $e) {
                // Capturando el error
                $error_message = $e->getMessage();
                // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
                // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
                echo "Error al ejecutar la consulta: " . $error_message;
                Historia("ERROR AL AGREGAR EL PERMISO $idmodulo del Usuario ".$IdUser." ".$error_message, "ERROR");
                return FALSE;
            }
        } else {
            echo "El password $password no es igual al actual $password_actual";
            return FALSE;
        }
   
}

function MiPerfil_updateurl($IdUser, $url_foto){
    require("../_config.php");
    
    $sql = "UPDATE usuarios SET url_foto='".$url_foto."' WHERE iduser='".$IdUser."'";    
  
        try {
            if ($db->query($sql)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (mysqli_sql_exception $e) {
            // Capturando el error
            $error_message = $e->getMessage();
            // Puedes manejar el error de alguna manera, como registrar en un archivo de registro, mostrar un mensaje al usuario, etc.
            // Aquí simplemente vamos a mostrar el mensaje de error en la pantalla
            echo "Error al ejecutar la consulta: " . $error_message;
            Historia("ERROR AL AGREGAR EL PERMISO $idmodulo del Usuario ".$IdUser." ".$error_message, "ERROR");
            return FALSE;
        }
  
}

function MiFoto( $IdUser){
    require("../_config.php");    
    $sql = "SELECT * FROM usuarios WHERE iduser='".$IdUser."' and disable=0";    
    echo $sql;
    $rp= $db-> query($sql);
    if($f = $rp -> fetch_array())
    {
        return $f['url_foto'];
    } else { return "";}

}
?>