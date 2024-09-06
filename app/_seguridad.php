<?php
session_start();
if (isset($_SESSION['IdUser'])){

} else {
	header("location: login.php?e=notcredetial");
	exit(); die();
}
date_default_timezone_set('Mexico/General');
$IdUser = $_SESSION['IdUser'];
$HoraIniciada = $_SESSION['iniciada'];
$HoraActual = date("H:i:s");  

$MinutosParaCerrar =  "20";
// Convertir la hora iniciada y la hora actual en objetos DateTime
$horaIniciadaObj = new DateTime($HoraIniciada);
$horaActualObj = new DateTime($HoraActual);

// Calcular la diferencia entre la hora actual y la hora iniciada en minutos
$diferenciaMinutos = $horaActualObj->diff($horaIniciadaObj)->i;
// echo "Hora Iniciada: ".$HoraIniciada. "<br>";
// echo "Hora Actual: ".$HoraActual. "<br>";
// echo "Minutos transcurridos: ".$diferenciaMinutos;

// Verificar si han pasado los minutos para cerrar la sesión
if ($diferenciaMinutos >= $MinutosParaCerrar) {
    // Cerrar la sesión
    session_unset();
    session_destroy();
    
    // Redirigir a la página de inicio de sesión
    header("Location: logout.php");
    exit;
} else {
    // echo "<br>Aún no han pasado los minutos para cerrar la sesión. (".$diferenciaMinutos.")";

}
?>