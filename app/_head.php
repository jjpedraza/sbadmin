<?php
// require_once("_seguridad.php");
require_once("_config.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ing. Juan José Pedraza">
    <meta name="description" content="Sistema">
    <title>ProParts</title>
    <!-- jquery -->
    <script src="lib/jquery/jquery.min.js"></script>
    
    
    <link rel="icon" type="image/png" href="favi.png">
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/estilacho.css"/>
    <link rel="stylesheet" href="css/menucustom.css"/>
    <script src="js/funs.js?r=<?php echo rand();?>"></script>    
    <script src="js/menu.js?r=<?php echo rand();?>"></script>    
    
    <!-- font awesome -->
    <link rel="stylesheet" href="lib/fontawesome-free/css/all.min.css"/>
    <script src="lib/fontawesome-free/js/all.min.js" ></script>

    
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    
    <!-- SweetAler2 -->
    <script src="lib/sweetalert2/sweetalert2.min.js" ></script>
    <link rel="stylesheet" href="lib/sweetalert2/sweetalert2.min.css">

       
    <!-- Bootstrap -->
    <!-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
     -->


    <!-- DataTable -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />  
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script> -->

    <!-- <link href="lib/datatable/datatables.min.css" rel="stylesheet"/> 
    <script src="lib/datatable/datatables.min.js"></script>    
    
    <link href="lib/datatable/Buttons-2.3.6/css/buttons.dataTables.min.css" rel="stylesheet"/> 
    <script src="lib/datatable/Buttons-2.3.6/js/buttons.dataTables.js"></script>  

    <link href="lib/datatable/responsive/css/responsive.dataTables.css" rel="stylesheet"/> 
    <script src="lib/datatable/responsive/js/dataTables.responsive.js"></script>     -->

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- emoji -->    
    <!-- <script type="text/javascript" src="lib/node_modules/emojionearea/dist/emojionearea.min.js"></script> -->

    <!-- Tabs -->
    <link href="lib/opentab/opentab.css" rel="stylesheet">
    <script src="lib/opentab/opentab.js"></script>

    <!-- PDF -->
    <script src="lib/node_modules/html2pdf.js/dist/html2pdf.bundle.min.js"></script>    
    <script src="lib/jspdf.js"></script>

  


</head>

<body id="page-top">
    
<div class="loader-container" style="display:none;">
  <!-- <div class="loader"></div> -->
  <div class="loader">
    <div class="spinner-border text-danger" role="status"  style="height:120px; width:120px;">      
    </div>
  </div>

</div>
