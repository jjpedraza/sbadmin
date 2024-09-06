<?php
// require("_seguridad.php");
require("_config.php");
  
$sql = "SELECT * FROM usuarios WHERE iduser='".$IdUser."' and disable=0";    
// echo $sql;
$rp= $db-> query($sql);
if($f = $rp -> fetch_array())
{
    $MiFoto =  $f['url_foto'];
} else { $MiFoto =  "";}

?>
<link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.css" rel="stylesheet">
<link href="css/menucustom.css" rel="stylesheet">


<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">        
        <img src="img/logowhite.png" style="height:70px;">
    </a>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Admin:
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configuracion</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">                
                <span class="collapse-item MenuLink" onclick="GET_usuarios();">Usuarios</span>
                <!-- <span class="collapse-item MenuLink" onclick="GET_permisos();">Permisos</span> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Herramientas</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">                
                <span class="collapse-item MenuLink" onclick="GET_">x</span>
                
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Menu:
    </div>

    <!-- MENU DE ACUERDO A LOS PERMISOS -->
    <?php 
    $sqlCat="
    SELECT
    DISTINCT idmodcat, modcat
    FROM (
        SELECT
            m.idmodulo,
            m.modulo,
            ( SELECT IF ( count(*)>= 1, 'SI', 'NO' ) FROM modulos_permisos WHERE iduser = '".$IdUser."' AND idmodulo = m.idmodulo ) AS permiso,
            m.action,
            m.idmodcat,
            (select modcat from cat_mod where idmodcat = m.idmodcat) as modcat
            FROM
                modulos m 
            WHERE
                disable =0
    )u
    WHERE u.permiso ='SI'
    ";
    $rCat = $db->query($sqlCat);     
    while ($Cat = $rCat->fetch_assoc()) {
        echo '
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages'.$Cat['idmodcat'].'" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>'.$Cat['modcat'].'</span>
            </a>';

            echo '
            <div id="collapsePages'.$Cat['idmodcat'].'" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
            
            ';


            $sql="
            SELECT
            *
            FROM (
                SELECT
                    m.idmodulo,
                    m.modulo,
                    ( SELECT IF ( count(*)>= 1, 'SI', 'NO' ) FROM modulos_permisos WHERE iduser = '".$IdUser."' AND idmodulo = m.idmodulo ) AS permiso,
                    m.action,
                    m.idmodcat,
                    (select modcat from cat_mod where idmodcat = m.idmodcat) as modcat
                    FROM
                        modulos m 
                    WHERE
                        disable =0
            )u
            WHERE u.idmodcat = '".$Cat['idmodcat']."'
            ";
          
            $r = $db->query($sql);     
            $IdMenu = "";
            while ($Modulo = $r->fetch_assoc()) {
                if ($Modulo['permiso']=='SI'){
                    // echo $Modulo['modulo']."<br>";
                    echo '<span class="collapse-item MenuLink" onclick="'.$Modulo['action'].';">'.$Modulo['modulo'].'</span>';
                }
            }
            unset($sql, $r, $Modulo);
        

            echo '
            </div>';
    echo '
        </div>
    </li>';
        }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->





<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color:#ca3737">
                <i class="fa fa-bars"></i>
            </button>

            <div id="ElTitulo" style="color: #700505">
                Bienvenido
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <img class="img-profile rounded-circle" src="sbadmin2/img/undraw_profile.svg"> -->
                        <?php
                        $url_foto = "fotos/".$MiFoto;
                        if (file_exists($url_foto)){
                            echo '<img class="img-profile rounded-circle" src="'.$url_foto.'">';
                        } else {
                            echo '<img class="img-profile rounded-circle" src="img/avatar_user.jpg">';
                        }

                        ?>
                       
                       
                    </a>
                     <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="width: 100%;
                        display: inline-block;
                        margin-top: -20px;
                        position: absolute;
                        text-align: center;"><?php echo $IdUser;?></span>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" onclick="MiPerfil();" style="cursor:pointer;">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Mi Perfil
                        </a>
                       
                        <a class="dropdown-item MenuLink" onclick="GET_ActualizarPassword();">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Actualizar Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php" >
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Salir
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" id="Contenido">

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <!-- <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div> -->
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>



<!-- Bootstrap core JavaScript-->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="lib/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="lib/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/chart-area.js"></script>
<script src="js/chart-pie.js"></script>


<script>
    // PERSONALIZACION        
    
    // $('.bg-gradient-primary').css('background-image','linear-gradient(180deg, rgb(140, 5, 5) 10%, rgb(51, 5, 5) 100%)');
    // $('nav').css('background-color','#071039');
    // $('#content').css('background-color','#101a48');
    // $('footer').css('background-color','#101a48');
    $(document).ready(function() {       
        if ($(window).width() < 768) {
            // Ejecutar el click en el elemento con ID sidebarToggleTop
            $("#sidebarToggleTop").trigger("click");
        }

        // $("#sidebarToggleTop").trigger("click");
       
    });
</script>