<?php
//                               ####     ##
//    ####                      ##        ##
//   ##  ##                     ##
//  ##        #####   ## ###   #####    ####      ######
//  ##       ##   ##  ###  ##   ##        ##     ##   ##
//  ##       ##   ##  ##   ##   ##        ##     ##   ##
//   ##  ##  ##   ##  ##   ##   ##        ##     ##   ##
//    ####    #####   ##   ##   ##      ######    ######
//                              #                     ##
//                                                #####
//===| PARAMETROS PRINCIPALES PARA EL SISTEMA |=======
//


date_default_timezone_set('Mexico/General');
// date_default_timezone_set('Europe/Madrid');


//CREDENCIALES DE TU BASE DE DATOS
$dbhost = 'localhost';	
$dbuser = 'root';
$dbpass = ''; 
$dbname = 'jjpedraza_sbadmin';


$dbpm_dbhost = 'localhost';	
$dbpm_dbuser = 'root';
$dbpm_dbpass = ''; 
$dbpm_dbname = 'jjpedraza_sbadmin';

//CONFIGURACION DE TU CORREO SMTP
$CORREO_DISPONIBLE = TRUE; //FALSE = desactiva el uso y TRUE activa el uso de correo para notificaciones y mas..
$CORREO_HOST = "";
$CORREO_USERNAME = "";
$CORREO_PASSWORD  = "";
$CORREO_SMTP_PORT = "465";
$CORREO_RESPONSE = $CORREO_USERNAME; //Corre desde se envia, este servira para cuando le den responder
$CORREO_RESPONSENAME="ProParts"; // nombre, aparece como nombre del usuario de correo en las bandejas de entrada




//FOOTER PARA EL CORREO
$FooterCorreo = 
"   <br><b>Correo enviado desde la plataforma</b>
";


//-------------------------------------------------------------------------------------
// DE AQUI EN ADELANTE PRECAUCION CON ESTOS PARAMETROS
// CONSULTE CON SU PROGRAMADOR

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

$db_pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$db_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (function_exists('mysqli_connect')) {
    $db = new mysqli($dbhost,$dbuser,$dbpass,$dbname); $acentos = $db->query("SET NAMES 'utf8'");  global $db;
}else{echo "ERROR db0";}
           
if (function_exists('mysqli_connect')) {
    $dbpm = new mysqli($dbpm_dbhost,$dbpm_dbuser,$dbpm_dbpass,$dbpm_dbname); $acentospm = $dbpm->query("SET NAMES 'utf8'");  global $dbpm;
}else{echo "ERROR dbpm";}

$Fecha = date('Y-m-d'); $Hora =  date ("H:i:s");



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$URLWebsite = "";

?>