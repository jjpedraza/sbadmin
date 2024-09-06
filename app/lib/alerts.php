<?php

function swal($mensaje, $tipo = null, $toast = 'false', $ok_href = "", $funJs="", $IdUser="") {
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js'></script>";
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css'>";
 echo "<script>";

  // Generar una cadena aleatoria
  $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);

  // Agregar configuración para reproducir sonidos
  echo "const successSound".$randomString." = new Audio('audios/success.wav');";
  echo "const warningSound".$randomString." = new Audio('audios/warning.wav');";
  echo "const errorSound".$randomString." = new Audio('audios/error.wav');";
  echo "const infoSound".$randomString." = new Audio('audios/information2.wav');";
  echo "const defaultSound".$randomString." = new Audio('audios/blip.wav');";

  // Verificar si se especificó un tipo de alerta y generar la alerta correspondiente
  if ($tipo === 'success') {
    echo "Swal.fire({
      icon: 'success',
      didOpen: () => {
        successSound".$randomString.".play();
      },
      html: '$mensaje',
    
      toast: $toast,
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        const confirmButton = Swal.getConfirmButton();
        confirmButton.href = '$ok_href';
      }
    });";
    
    
  } elseif ($tipo === 'warning') {
    echo "Swal.fire({
      icon: 'warning',
      didOpen: () => {
        warningSound".$randomString.".play();
      },
      html: '$mensaje',
   
      toast: $toast,
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        const confirmButton = Swal.getConfirmButton();
        confirmButton.href = '$ok_href';
      }
    });";
   
    
  } elseif ($tipo === 'danger') {
    echo "Swal.fire({
      icon: 'error',
      didOpen: () => {
        errorSound".$randomString.".play();
      },
      html: '$mensaje',

      toast: $toast,
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        const confirmButton = Swal.getConfirmButton();
        confirmButton.href = '$ok_href';
      }
    });";
   
   
  } elseif ($tipo === 'info') {
    echo "Swal.fire({
      icon: 'info',
      didOpen: () => {
        infoSound".$randomString.".play();
      },
      html: '$mensaje',
      timer: 5000,
      timerProgressBar: true,
      toast: $toast,
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        const confirmButton = Swal.getConfirmButton();
        confirmButton.href = '$ok_href';
      }
    });";
  
    
  } else {
    // Si no se especifica un tipo, mostrar una alerta genérica
    echo "Swal.fire({
      text: '$mensaje',
      timer: 5000,
      timerProgressBar: true,
      toast: $toast,
      showConfirmButton: true,
      confirmButtonText: 'OK',
      didRender: () => {
        const confirmButton = Swal.getConfirmButton();
        confirmButton.href = '$ok_href';
      }
    });";
   
  }

  if ($funJs==""){} else{
    echo $funJs.";";
  }

  echo "</script>";

  Historia($mensaje, $tipo, $IdUser);  
}


?>