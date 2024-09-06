<?php
require_once("config.php");



function Toast($Texto, $Tipo="")
{
  
   echo '<script src="lib/custom/jquery.toast.min.js"></script>';
   echo '<link rel="stylesheet" href="lib/custom/jquery.toast.min.css">';
    LogNote($Tipo.":".$Texto);
    // Generar una cadena aleatoria
    $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
    echo "<script>";
    echo "const successSound" . $randomString . " = new Audio('audios/success.mp3');";
    echo "const warningSound" . $randomString . " = new Audio('audios/warning.mp3');";
    echo "const errorSound" . $randomString . " = new Audio('audios/error.mp3');";
    echo "const infoSound" . $randomString . " = new Audio('audios/information.wav');";
    echo "const defaultSound" . $randomString . " = new Audio('audios/blip.wav');";
    echo  "</script>";
    switch ($Tipo) {
        case "":
            echo "<script>";
            echo "$.toast('" . $Texto . "');   ";
            // echo 'backgroundColor: "#ff5200";';
            echo "defaultSound" . $randomString . ".play();";
            echo "</script>";
            break;

        case "information": //Informativo
            echo "<script>";
            echo "
            $.toast({
                heading: 'Information',
                text: '" . $Texto . "',
                showHideTransition: 'slide',
                icon: 'info',
                backgroundColor: '#ff5200'
            });
            infoSound" . $randomString . ".play();
            ";
            echo "</script>";
            break;

        
        case "error": //Warning
            echo "<script>";
            echo "
            $.toast({
                heading: 'Error',
                text: '" . $Texto . "',
                showHideTransition: 'slide',
                backgroundColor: '#ff5200',
                icon: 'warning'
            });
            warningSound" . $randomString . ".play();
            ";

            echo "</script>";
            break;

        case "success": //Success
            echo "<script>";
            echo "
            $.toast({
                heading: 'Success',
                text: '" . $Texto . "',
                showHideTransition: 'slide',
                icon: 'success',
                backgroundColor: '#ff5200'
            });
            successSound" . $randomString . ".play();
            ";
            echo "</script>";
            break;

        case 5: //fijo
            echo "<script>";
            echo "
            $.toast({
                heading: '',
                text: '" . $Texto . "',
                hideAfter: false
            });
            defaultSound" . $randomString . ".play();
            ";
            echo "</script>";
            break;

        default:
            echo "<script>";
            echo "$.toast('" . $Texto . "');   ";
            echo "defaultSound" . $randomString . ".play();";
            echo "</script>";
    }
}

function swal($mensaje, $tipo = null, $toast = 'false', $ok_href = "", $funJs="") {
// echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
  // echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js'></script>";
  // echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css'>";
  // echo '<link href="lib/custom/datatable/datatables.min.css" rel="stylesheet"/> 
  // <script src="lib/custom/datatable/datatables.min.js"></script> ';

  echo "<script>";

  // Generar una cadena aleatoria
  $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);

  // Agregar configuración para reproducir sonidos
  echo "const successSound".$randomString." = new Audio('audios/success.mp3');";
  echo "const warningSound".$randomString." = new Audio('audios/warning.mp3');";
  echo "const errorSound".$randomString." = new Audio('audios/error.mp3');";
  echo "const infoSound".$randomString." = new Audio('audios/information.wav');";
  echo "const defaultSound".$randomString." = new Audio('audios/blip.wav');";

  // Verificar si se especificó un tipo de alerta y generar la alerta correspondiente
  if ($tipo === 'success') {
    echo "Swal.fire({
      icon: 'success',
      html: '$mensaje',
    
      timerProgressBar: true,
      toast: $toast,
      didOpen: () => {
        successSound".$randomString.".play();
      },
      showConfirmButton: true,
        confirmButtonText: 'OK',";
        if ($ok_href<>""){
        echo "didRender: () => {
          Swal.getConfirmButton().addEventListener('click', () => {
            window.location.href = '$ok_href';
          });
        }";
      }
      echo "});";
    
  } elseif ($tipo === 'warning') {
    echo "Swal.fire({
      icon: 'warning',
      html: '$mensaje',
    
      timerProgressBar: true,
      toast: $toast,
      didOpen: () => {
        warningSound".$randomString.".play();
      },
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        Swal.getConfirmButton().addEventListener('click', () => {
          window.location.href = '$ok_href';
        });
      }
    });";
   
  } elseif ($tipo === 'danger') {
    echo "Swal.fire({
      icon: 'danger',
      html: '$mensaje',
    
      timerProgressBar: true,
      toast: $toast,
      didOpen: () => {
        successSound".$randomString.".play();
      },
      showConfirmButton: true,
        confirmButtonText: 'OK',";
        if ($ok_href<>""){
        echo "didRender: () => {
          Swal.getConfirmButton().addEventListener('click', () => {
            window.location.href = '$ok_href';
          });
        }";
      }
      echo "});";

    
  } elseif ($tipo === 'info') {
    echo "Swal.fire({
      icon: 'info',
      html: '$mensaje',
     
      timerProgressBar: true,
      toast: $toast,
      didOpen: () => {
        infoSound".$randomString.".play();
      },
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        Swal.getConfirmButton().addEventListener('click', () => {
          window.location.href = '$ok_href';
        });
      }
    });";
   
  } else {
    // Si no se especifica un tipo, mostrar una alerta genérica
    echo "Swal.fire({
      text: '$mensaje',
      timer: 5000,
      timerProgressBar: true,
      toast: $toast,
      didOpen: () => {
        defaultSound".$randomString.".play();
      },
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        Swal.getConfirmButton().addEventListener('click', () => {
          window.location.href = '$ok_href';
        });
      }
    });";
   
  }

  if ($funJs==""){} else{
    echo $funJs.";";
  }
  echo "</script>";

  
  LogNote("".$mensaje);
}


// Función para mostrar el loader
function showLoader() {
  echo '<script>
    document.querySelector(\'.loader-container\').style.display = \'flex\';
  </script>';
}

// Función para ocultar el loader
function hideLoader() {
  echo '<script>
    document.querySelector(\'.loader-container\').style.display = \'none\';
  </script>';
}

function ValidateUser($UserName){
require("config.php");
  $UserName = $db->real_escape_string($UserName);
  
  $query = "SELECT username FROM users WHERE user='$UserName' AND disable=0";
  $result = $db->query($query);

  // Verificar si se encontró el username
  if ($result->num_rows > 0) {
    // El username existe y está habilitado
    return TRUE;
  } else {
    // El username no existe o está deshabilitado
    return FALSE;
  }

  // Cerrar la conexión a la base de datos
  $db->close();
}

function ValidateLogin($UserName, $Password){
  require("config.php");
    $UserName = $db->real_escape_string($UserName);
    
    $query = "SELECT usersame, password FROM users WHERE user='$UserName' AND password='$Password' disable=0";
    $result = $db->query($query);
  
    // Verificar si se encontró el username
    if ($result->num_rows > 0) {
      // El username existe y está habilitado
      return TRUE;
    } else {
      // El username no existe o está deshabilitado
      return FALSE;
    }
  
    // Cerrar la conexión a la base de datos
    $db->close();
  }

function CrearUsuario($username, $password, $nombre, $mail, $telefono) {
require("config.php");
    global $db;
    $fecha_registro = date("Y-m-d");
    $activo = 1;
    $deshabilitado = 0;
    $codigodeActivacion = StringGenerate($len=5);
    
    $stmt = $db->prepare("INSERT INTO users (user, password, email, nombre, date_reg, active, disable, tel, codigoactivacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
    if (!$stmt) {
        return FALSE;
    }
    $stmt->bind_param("sssssssss", $username, $password, $mail, $nombre, $fecha_registro, $activo, $deshabilitado, $telefono, $codigodeActivacion);
    if (!$stmt->execute()) {
        return FALSE;
    }
    $msg = "Tu codigo de activacion de tu correo es <b>".$codigodeActivacion."</b>";
    if (EnviarCorreo($mail, "Valida tu Correo",$msg,"",$username)==TRUE){

    } else {
      Historia("Error al enviar el correo a ".$mail." sobre la activacion de su correo","","PROBLEMA");
    }
    return TRUE;
}





function Historia($descripcion, $user, $tag="") {
require("config.php");
  global $db;

  $fecha = date('Y-m-d');
  $hora = date('H:i:s');

  $stmt = $db->prepare("INSERT INTO historia (fecha, hora, username, tag, descripcion) VALUES (?, ?, ?, ?, ?)");

  if ($stmt === false) {
      return false;
  }

  $stmt->bind_param("sssss", $fecha, $hora, $user, $tag, $descripcion);

  if ($stmt->execute() === false) {
      return false;
  }

  $stmt->close();

  return true;
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


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function EnviarCorreo($Correo, $Asunto, $Mensaje, $URLadjunto="", $IdUser=""){
  require("config.php");
  $Mensaje .= $FooterCorreo;

  // $Correo = "printepolis@gmail.com";
  // $Asunto = "Test";
  // $Mensaje = "Hola <b>Mundo</b>";
  
  // Cargar PHPMailer
      require_once ('lib/custom/phpmailer/src/Exception.php');
      require_once ('lib/custom/phpmailer/src/PHPMailer.php');
      require_once ('lib/custom/phpmailer/src/SMTP.php');
  
      // Crear una nueva instancia de PHPMailer
      $mail = new PHPMailer(true);
  
      try {
          // Configurar el servidor SMTP

          $mail->isSMTP();
          $mail->Host       = $mail_Host;
          $mail->SMTPAuth   = $mail_SMTPAuth;
          $mail->Username   = $mail_Username;
          $mail->Password   = $mail_Password;
          $mail->SMTPSecure = $mail_SMTPSecure;
          $mail->Port       = $mail_Port;
          $mail->SMTPDebug = 0; 
          $mail->Debugoutput = 'html';
          $mail->isHTML(true);

            
          // Configurar los destinatarios y el contenido del correo electrónico
          $mail->setFrom($mail_Responder, $Responder);
          $mail->addAddress($Correo);          
          // $mail->addCC('vichsoriano@gmail.com');
          // $mail->addBCC('printepolis@gmail.com');
          $mail->Subject = $Asunto;
          $mail->Body    = $Mensaje;
          // Adjuntar el archivo
          if (!empty($URLadjunto)) {
            $mail->addAttachment($URLadjunto);
        }

          // Enviar el correo electrónico
          $mail->send();
  
          $sql ="INSERT INTO correos (correo,asunto,contenido,fecha,hora,iduser) VALUES(
            '$Correo','$Asunto','$Mensaje','$Fecha','$Hora','$IdUser'

          )
          ";
          $r = mysqli_query($db, $sql);              
          
          return TRUE;
      } catch (Exception $e) {
          return FALSE;
          Historia("Informacion sobre El Error de Envio: ".$Correo." sobre la activacion de su correo ".$e->getMessage(),"","PROBLEMA");
      }
}



function Pesos($valor){
	return "$".number_format($valor,2,'.',',');
}  

function Width($imagen){
  $info = getimagesize($imagen);
  if ($info) {
    $ancho = $info[0];  // Ancho de la imagen
    $alto = $info[1];  
    return $ancho;
  } else {
    return "";
  }
}


function Height($imagen){
  $info = getimagesize($imagen);
  if ($info) {
    $ancho = $info[0];  // Ancho de la imagen
    $alto = $info[1];  
    return $alto;
  } else {
    return "";
  }
}



function UnPoco($string, $limite = 100) {
  $trimmedString = trim($string); // Elimina los espacios en blanco al inicio y al final del texto
  
  if (strlen($trimmedString) <= $limite) {
      return $trimmedString; // Devuelve el texto completo si tiene 100 caracteres o menos
  } else {
      $substring = substr($trimmedString, 0, $limite); // Obtiene los primeros 100 caracteres
      $lastSpaceIndex = strrpos($substring, ' '); // Encuentra la posición del último espacio en esos caracteres
      
      if ($lastSpaceIndex !== false) {
          $substring = substr($substring, 0, $lastSpaceIndex); // Recorta la cadena hasta el último espacio
      }
      
      return $substring."..."; // Devuelve los primeros 100 caracteres que forman palabras completas
  }
}

function getUrlFragment($url = '') {
  if (empty($url)) {
      $url = $_SERVER['REQUEST_URI'];
  }

  // Obtener el fragmento de la URL
  $fragment = isset(parse_url($url)['fragment']) ? parse_url($url)['fragment'] : '';

  // Obtener la palabra después del #
  $words = explode('#', $fragment);
  $word = isset($words[1]) ? $words[1] : '';

  return $word;
}

function Convert_AutoPlay($StringVideoYoutube) {
  $autoplayAdded = false;
  $autoplayParam = '?autoplay=1';
  
  // Buscar el inicio y fin del atributo src del iframe
  $srcStart = strpos($StringVideoYoutube, 'src="') + 5;
  $srcEnd = strpos($StringVideoYoutube, '"', $srcStart);
  $src = substr($StringVideoYoutube, $srcStart, $srcEnd - $srcStart);
  
  // Verificar si ya se ha agregado el parámetro autoplay
  if (strpos($src, 'autoplay=1') !== false) {
    // El parámetro ya existe, no es necesario hacer nada
    return $StringVideoYoutube;
  }
  
  // Verificar si el enlace ya tiene parámetros
  if (strpos($src, '?') !== false) {
    // El enlace ya tiene otros parámetros, agregar el parámetro autoplay con un "&"
    $src = str_replace('?', '?'.$autoplayParam.'&', $src);
    $autoplayAdded = true;
  } else {
    // El enlace no tiene otros parámetros, agregar el parámetro autoplay con un "?"
    $src = $src.$autoplayParam;
    $autoplayAdded = true;
  }
  
  // Reemplazar el atributo src del iframe con el enlace modificado
  if ($autoplayAdded) {
    $StringVideoYoutube = substr_replace($StringVideoYoutube, $src, $srcStart, $srcEnd - $srcStart);
  }
  
  return $StringVideoYoutube;
}

function hora12($hora) {
  $hora_formato_12 = date("h:i:s A", strtotime($hora));
  return $hora_formato_12;
}

function TiempoDesde($FechaInicial) {
  $fechaActual = new DateTime();
  $fechaInicial = new DateTime($FechaInicial);
  $intervalo = $fechaInicial->diff($fechaActual);

  $anios = $intervalo->y;
  $meses = $intervalo->m;
  $semanas = floor($intervalo->days / 7);
  $dias = $intervalo->days % 7;

  $tiempoTranscurrido = "";

  if ($anios > 0) {
      $tiempoTranscurrido .= $anios . (($anios == 1) ? " año" : " años") . ", ";
  }

  if ($meses > 0) {
      $tiempoTranscurrido .= $meses . (($meses == 1) ? " mes" : " meses") . ", ";
  }

  if ($semanas > 0) {
      $tiempoTranscurrido .= $semanas . (($semanas == 1) ? " semana" : " semanas") . ", ";
  }

  if ($dias > 0) {
      $tiempoTranscurrido .= $dias . (($dias == 1) ? " día" : " días");
  }

  return $tiempoTranscurrido;
}


// Función para convertir un número a letras (solo funciona para números hasta 999,999.99)
function convertirNumeroALetras($numero, $moneda) {
  $unidades = array('Cero', 'Un', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve', 'Diez', 'Once', 'Doce', 'Trece', 'Catorce', 'Quince', 'Dieciséis', 'Diecisiete', 'Dieciocho', 'Diecinueve', 'Veinte', 30 => 'Treinta', 40 => 'Cuarenta', 50 => 'Cincuenta', 60 => 'Sesenta', 70 => 'Setenta', 80 => 'Ochenta', 90 => 'Noventa', 100 => 'Cien', 200 => 'Doscientos', 300 => 'Trescientos', 400 => 'Cuatrocientos', 500 => 'Quinientos', 600 => 'Seiscientos', 700 => 'Setecientos', 800 => 'Ochocientos', 900 => 'Novecientos');
  $centenas = array(100 => 'Ciento', 200 => 'Doscientos', 300 => 'Trescientos', 400 => 'Cuatrocientos', 500 => 'Quinientos', 600 => 'Seiscientos', 700 => 'Setecientos', 800 => 'Ochocientos', 900 => 'Novecientos');
  $monedas = array('pesos', 'peso', 'pesos');
  $conector = 'con';
  $separadorDecimal = 'con';
  $mayorMil = 'Mil';

  $converted = '';
  if (($numero >= 0 && (int) $numero < 0) || (int) $numero < 0 - PHP_INT_MAX) {
      // overflow
      trigger_error('convertNumberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING);
      return $converted;
  }

  switch (true) {
      case $numero < 21:
          $unidad = ($numero == 1) ? ' ' . $moneda : ' ' . $monedas[2];
          $converted = $unidades[$numero] . $unidad;
          break;
      case $numero < 100:
          $div_decena = floor($numero / 10) * 10;
          $unidad = $numero % 10;
          $converted = $unidades[$div_decena];
          if ($unidad) {
              $converted .= ' y ' . $unidades[$unidad];
          }
          $converted .= ' ' . $monedas[2];
          break;
      case $numero < 1000:
          $div_centena = floor($numero / 100) * 100;
          $mod_centena = $numero % 100;
          $converted = $centenas[$div_centena];
          if ($mod_centena) {
              $converted .= ' ' . convertirNumeroALetras($mod_centena, '');
          }
          $converted .= ' ' . $monedas[2];
          break;
      case $numero < 2000:
          $div_millar = floor($numero / 1000);
          $mod_millar = $numero % 1000;
          $converted = $mayorMil;
          if ($mod_millar) {
              $converted .= ' ' . convertirNumeroALetras($mod_millar, '');
          }
          $converted .= ' ' . $monedas[2];
          break;
      case $numero < 1000000:
          $div_millar = floor($numero / 1000);
          $mod_millar = $numero % 1000;
          $converted = convertirNumeroALetras($div_millar, '') . ' ' . $mayorMil;
          if ($mod_millar) {
              $converted .= ' ' . convertirNumeroALetras($mod_millar, '');
          }
          $converted .= ' ' . $monedas[2];
          break;
  }

  return $converted;
}
// function verificarFechaLimite($fechaLimite) {
//   $fechaActual = date('Y-m-d'); // Obtiene la fecha actual en el formato 'YYYY-MM-DD'

//   if ($fechaActual >= $fechaLimite) {
//     // La fecha actual es posterior a la fecha límite
//     // Detener la carga de la sección y mostrar un mensaje de error o realizar alguna otra acción
//     die("Error al cargar. #404 load file error.");
//   }
// }
// $fechaLimite = '2023-06-11';


function verificarFechaLimite($fechaLimite) {
  $fechaActual = date('Y-m-d'); // Obtiene la fecha actual en el formato 'YYYY-MM-DD'

  // if ($fechaActual >= $fechaLimite) {
  //   // La fecha actual es posterior a la fecha límite
  //   // Detener la carga de la sección y mostrar un mensaje de error o realizar alguna otra acción
  //   die("Error al cargar. #404 load file error.");
  // }
}
$fechaLimite = '2020-06-11';


function LogNote($Nota, $IdUser= "") {  
  // if ($IdUser== ""){
  //   global $IdUser;      
  // }
  
  // $directorio = dirname(__FILE__) . '/logs';
  // $fecha = date('Y-m-d');
  // $hora = date('H:i:s');
  // $nombreArchivo = $directorio . '/' . $fecha . '.txt';

  // // Verificar si el archivo ya existe
  // if (!file_exists($nombreArchivo)) {
  //     // Crear un nuevo archivo si no existe
  //     if (!is_dir($directorio)) {
  //         mkdir($directorio, 0777, true);
  //     }
  //     touch($nombreArchivo);
  // }

  // // Escribir la nota en el archivo
  // $contenido = "$fecha|$hora|$IdUser|$Nota\n";
  // file_put_contents($nombreArchivo, $contenido, FILE_APPEND);
}




function ObtenerData($query, $Compatibilidad = 'datatable') {
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
      $tabla = '<table id="TablaReporte" class="table table-striped" width="100%">';
      $tabla .= '<thead><tr>';
      foreach ($columnas as $columna) {
          $tabla .= '<th>' . $columna . '</th>';
      }
      $tabla .= '</tr></thead>';

      $tabla .= '<tbody>';
      foreach ($registros as $registro) {
          $tabla .= '<tr>';
          foreach ($registro as $valor) {
              $tabla .= '<td>' . $valor . '</td>';
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


function CrearPDF($Tabla, $Titulo, $Orientacion) {
  global $IdUser;
  // Incluye la librería TCPDF
  require_once('../lib/tcpdf/examples/tcpdf_include.php');

  // Crea una nueva instancia de TCPDF
  $pdf = new TCPDF($Orientacion, 'mm', 'A4', true, 'UTF-8', false);

  // Establece el título del documento
  $pdf->SetTitle($Titulo);

  // Establece el encabezado y pie de página
  $pdf->SetHeaderData('', 0, $Titulo, 'Impreso por: ' . $IdUser);
  $pdf->setFooterData(array(0, 0, 0), array(255, 255, 255));

  // Establece el margen
  $pdf->SetMargins(15, 35, 15);

  // Establece la paginación
  $pdf->SetPrintFooter(true);
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  $pdf->setFooterMargin(10);
  $pdf->setFooterData(array(0, 0, 0), array(255, 255, 255));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

  // Agrega una nueva página
  $pdf->AddPage();

  // Escribe el contenido (tabla) en el PDF
  $pdf->writeHTML($Tabla);

  // Obtiene el número total de páginas
  $numeroPaginas = $pdf->getNumPages();

  // Establece el pie de página con el número de página actual y total
  for ($i = 1; $i <= $numeroPaginas; $i++) {
      $pdf->setPage($i);
      $pdf->Footer();
  }

  // Cierra el documento PDF y lo devuelve como una cadena
  // return $pdf->Output('', 'S');

  // Obtiene el contenido del PDF como una cadena
  $pdfContent = $pdf->Output('', 'S');

  // Genera el iframe para mostrar el PDF embebido
  $iframe = '<iframe src="data:application/pdf;base64,' . base64_encode($pdfContent) . '" width="100%" height="500px; border: 0px;"></iframe>';

  // Retorna el iframe con el contenido del PDF
  return $iframe;
}


function Reporte_TengoPermiso($IdReporte, $IdUser){
require("config.php");
$sql = "select count(*) as n from reporte_permisos where username='".$IdUser."' and idreporte='".$IdReporte."'";
// echo $sql;
$rc= $db-> query($sql);
  if($f = $rc -> fetch_array())
  {
    if ($f['n']<=0){
      return FALSE;
    }else {
      return TRUE;
    }
  } else {
    return FALSE;
  }

}



function UsuarioPermiso($IdUser, $IdModulo, $Tipo){
require("config.php");  
$sql = "select * from user_permisos where IdUser='".$IdUser."' and IdModulo='".$IdModulo."'";  
$r= $db-> query($sql);
if($f = $r -> fetch_array())
{
  switch ($Tipo) {
    case "view":
        if ($f['pview'] == 0){
          return FALSE;
        } else {
          return TRUE;
        }
        break;
    case "edit":
      if ($f['pedit'] == 0){
        return FALSE;
      } else {
        return TRUE;
      }
        break;
    case "delete":
      if ($f['pdelete'] == 0){
        return FALSE;
      } else {
        return TRUE;
      }
        break;
    
    case "new":
      if ($f['pnew'] == 0){
        return FALSE;
      } else {
        return TRUE;
      } 
        break;
    default:
       return FALSE;
}
} else {
  return FALSE;
}

}




function PasswordActual($username){
  require("config.php");
  $sql = "select * from clientes where correo='".$username."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['nip'];
    } else {
      return '';
    }
  
}

function DiasSuscrito($IdUser, $info=FALSE){
require("config.php");
$DiasGRATIS = 5;

$sql = "
SELECT 
	c.correo as iduser,
	c.nombre as cliente,
	c.fechaderegistro,
	DATEDIFF(CURDATE(),c.fechaderegistro) as diasdesdeelregistro,
	IF(DATEDIFF(CURDATE(),c.fechaderegistro)>=5,0,
		5-DATEDIFF(CURDATE()
		,c.fechaderegistro)) as diasgratis,	
	
	ifnull((select fin from suscripciones where iduser=c.correo and fin>=CURDATE()  limit 1),'') as findesuscripcion,
	ifnull(DATEDIFF((select fin from suscripciones where iduser=c.correo and fin>=CURDATE()  limit 1),CURDATE()),0) as diasdesuscripcion
	
	
from clientes c 

where correo='".$IdUser."'
";
// echo $sql;
$rc= $db-> query($sql);
  if($f = $rc -> fetch_array())
  {
    $DiasGratis = $f['diasgratis'];
    $DiasDeSuscripcion = $f['diasdesuscripcion'];
    $DiasSuscrito = $DiasGratis + $DiasDeSuscripcion;
    if ($info==FALSE){
      return $DiasSuscrito;
    } else {
      return '<span title="Gratis='.$DiasGratis.' | Suscripcion='.$DiasDeSuscripcion.'">'.$DiasSuscrito.'<span>';
    }

  } else {
    return 0;
  }


}






function ExisteElCorreo($correo){
  require("config.php");
  $sql = "
  select count(*) as n  
  from clientes where correo='".$correo."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      if ($f['n']>0){
        return TRUE;
      } else {
        return FALSE;
      }
    } else {
      return FALSE;
    }
  
  
}

function config($data){
  require("config.php");
  $sql = "
  select *
  from config where data='".$data."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['value'];
    } else {
      return FALSE;
    }
  

}



function IdInfoPago_next(){
  require("config.php");
  $sql = "
  select (ifnull(max(idinfopago),0) + 1) as n from informedepagos";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['n'];
    } else {
      return 0;
    }
  

}


function IdEscuela_next(){
  require("config.php");
  $sql = "
  select (ifnull(max(idescuela),0) + 1) as n from escuelas";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['n'];
    } else {
      return 0;
    }
  

}

function idalumno_next(){
  require("config.php");
  $sql = "
  select (ifnull(max(idalumno),0) + 1) as n from alumnos";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['n'];
    } else {
      return 0;
    }
  

}

function idtutor_next(){
  require("config.php");
  $sql = "
  select (ifnull(max(idtutor),0) + 1) as n from tutores";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['n'];
    } else {
      return 0;
    }
  

}

function ExisteEscuela($idescuela){
  require("config.php");
  $sql = "
  select count(*) as n from escuelas where idescuela='".$idescuela."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      if ($f['n']<=0){
        return FALSE;
      } else {
        return TRUE;
      }
    } else {
      return FALSE;
    }
  

}



function ObtenerIdEscuela($IdUser){
  require("config.php");
  $sql = "
  select * from escuelas where iduser='".$IdUser."' limit 1";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['idescuela'];
    } else {
      return '';
    }
  

}

function Saldo($IdUser){
  require("config.php");
  $sql = "
  select * from clientes where correo='".$IdUser."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['saldosms'];
    } else {
      return 0;
    }
  

}

function Alumnos($IdUser){
  require("config.php");
  $IdEscuela = ObtenerIdEscuela($IdUser);
  $sql = "
  select count(*) as n from alumnos where  idescuela='".$IdEscuela."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['n'];
    } else {
      return 0;
    }
  

}

function Tutores($IdUser){
  require("config.php");
  $IdEscuela = ObtenerIdEscuela($IdUser);
  $sql = "
  select count(*) as n from tutores where idescuela='".$IdEscuela."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['n'];
    } else {
      return 0;
    }
  

}


function CostoSMS(){
  require("config.php");
  // $IdEscuela = ObtenerIdEscuela($IdUser);
  $sql = "
  select * from config where data='sms_costo'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      return $f['value'];
    } else {
      return 0;
    }
  

}


function convertGrado($numero) {
  switch ($numero) {
      case 1:
          return "Primer Grado";
      case 2:
          return "Segundo Grado";
      case 3:
          return "Tercer Grado";
      case 4:
          return "Cuarto Grado";
      case 5:
          return "Quinto Grado";
      case 6:
          return "Sexto Grado";
      case 7:
          return "Septimo Grado" ;
      case 8:
          return "Octavo Grado ";
      case 9:
          return "Noveno Grado";
      case 10:
          return "Decimo Grado";
      default:
          return "";
  }
}



function ExisteGrupo($IdEscuela, $Grado, $Grupo, $Turno){
  require("config.php");
  $sql = "
  select count(*) as n from grupos where idescuela='".$IdEscuela."' and grado='".$Grado."' and grupo='".$Grupo."' and turno='".$Turno."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      if ($f['n']<=0){
        return FALSE;
      } else {
        return TRUE;
      }
    } else {
      return FALSE;
    }
  

}



function MatriculaExiste($IdEscuela, $Matricula){
  require("config.php");
  $sql = "
  select count(*) as n from alumnos where idescuela='".$IdEscuela."' and matricula='".$Matricula."'";
  // echo $sql;
  $rc= $db-> query($sql);
    if($f = $rc -> fetch_array())
    {
      if ($f['n']<=0){
        return FALSE;
      } else {
        return TRUE;
      }
    } else {
      return FALSE;
    }
  

}

function EnviarSMS($texto, $numero, $idalumno, $idescuela, $IdUser){
require("config.php");
if ($numero==""){
  Toast("NO SE ENVIO, el telefono esta vacio ","danger");
    } else {
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://smsclouds.cloud/api/v3/campaign',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'
    {"text":"'.$texto.'",
        "recipients":[
            {"cellphone":"'.$numero.'"}
            ],
        "campaign_name":"my campaign",
        "route":85,
        "country":1,
        "encode":false,
        "long_message":false}',

    CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$APIKEYSMS,
    'Content-Type: application/json',
    'Accept: application/json'
    ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    // echo $response;

    // Decodificar la respuesta JSON en un arreglo asociativo
    $data = json_decode($response, true);

    // Verificar si el mensaje se envió correctamente
    if ($data['message'] === 'Completado Correctamente') {
      $sql ="INSERT INTO sms (sms,  telefono,  idalumno,  fecha,  hora,  iduser,  idescuela  ) 
      VALUES(
        '$texto','$numero','$idalumno','$Fecha','$Hora','$IdUser','$idescuela'
      )
      ";
      $r = mysqli_query($db, $sql);  

      //Actualizar Saldo
      $costo = config("sms_costoventa");
      $saldoactual = Saldo($IdUser);

    $SaldoNuevo = $saldoactual - $costo;
    $sqli = "UPDATE clientes SET saldosms='".$SaldoNuevo."' WHERE correo='".$IdUser."'";
    $ri = mysqli_query($db, $sqli);  


        return TRUE;
        // echo 'El mensaje se envió correctamente.' . PHP_EOL;
        // echo 'Detalles del envío:' . PHP_EOL;
        // echo 'Campaña: ' . $data['campaign_name'] . PHP_EOL;
        // echo 'Ruta: ' . $data['route'] . PHP_EOL;
        // echo 'País: ' . $data['country'] . PHP_EOL;
        // echo 'Cantidad de destinatarios: ' . $data['recipients_count'] . PHP_EOL;
        // echo 'Saldo restante: ' . $data['balance'] . PHP_EOL;
    } else {
        echo 'Error al enviar el mensaje: ' . $data['message'] . PHP_EOL;
        return FALSE;
    }
  }










// RESPONSE

// {
//   "message": "Completado Correctamente",
//   "campaign": 8528238,
//   "campaign_name": " my first campaign",
//   "route": "Premium 2 Masiva",
//   "country": "Mexico",
//   "scheduled_date": null,
//   "recipients_count": 3,
//   "encode": false,
//   "long_message": false,
//   "balance": 470539.043
// }
}


function xd($idescuela, $idalumno="") {
  require("config.php");    
    
  $sql = "INSERT INTO xd (idescuela, idalumno, fecha, hora) VALUES(
    '$idescuela', '$idalumno','$Fecha','$Hora'
  )";
   $r = mysqli_query($db, $sql);              
   if ($r) {
    return TRUE;
   } else {
    return FALSE;
   }
  }


  function MiTopeDeAlumnos($IdUser){
    require("config.php");
    $sql = "
    select * from suscripciones where iduser='".$IdUser."' and fin>=curdate() limit 1";
    // echo $sql;
    $rc= $db-> query($sql);
    if($f = $rc -> fetch_array()){
      return $f['maximoalumnos'];
    } else {
      return 0;
    }
    
  }


  
function AlumnosCapturados($IdEscuela){
  require("config.php");
  $sql = "
  select count(*) as n from alumnos where idescuela='".$IdEscuela."'";
  // echo $sql;
  $rc= $db-> query($sql);
  if($f = $rc -> fetch_array()){
    return $f['n'];
  } else {
    return 0;
  }
  
}



function Vespertino($IdEscuela){
  require("config.php");
  $sql = "
  select * from escuelas where idescuela='".$IdEscuela."'";
  // echo $sql;
  $rc= $db-> query($sql);
  if($f = $rc -> fetch_array()){
    if ($f['vespertino']==0){
      return FALSE;
    } else {
      return TRUE;
    }
  } else {
    return FALSE;
  }
  
}


function Matutino($IdEscuela){
  require("config.php");
  $sql = "
  select * from escuelas where idescuela='".$IdEscuela."'";
  // echo $sql;
  $rc= $db-> query($sql);
  if($f = $rc -> fetch_array()){
    if ($f['matutino']==0){
      return FALSE;
    } else {
      return TRUE;
    }
  } else {
    return FALSE;
  }
  
}

function Grados($IdEscuela){
  require("config.php");
  $sql = "
  select * from escuelas where idescuela='".$IdEscuela."'";
  // echo $sql;
  $rc= $db-> query($sql);
  if($f = $rc -> fetch_array()){
    return $f['grados'];
  } else {
    return '0';
  }
  
}


?>



