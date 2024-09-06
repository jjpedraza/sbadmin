<?php
require("../_seguridad.php");
require("../_config.php");
require("../controladores/funs.php");
require("../lib/fun_varclean.php");

    $sql = "SELECT * FROM usuarios WHERE iduser='".$IdUser."' and disable=0";    
    $r= $db-> query($sql);
    if($f = $r -> fetch_array())
    {
        $nombre = $f['nombre'];
        $telefono  = $f['telefono'];
        $correo = $f['correo'];
        $password = $f['password'];
        $url_foto = $f['url_foto'];
    }


?>

<div class="container">
<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label>Foto:</label><br>
            <?php 
                $foto = "fotos/".$url_foto;
                // echo $foto;
                if (file_exists("../".$foto)){
                    echo '<img src="'.$foto.'" class="img-fluid mifoto">';
                }
            ?>
           
            <input type="file" class="form-control" id="url_foto" style="">
        </div>


    </div>
    <div class="col-md-6 col-12">
   

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" value="<?php echo $IdUser; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" value="<?php echo $nombre; ?>">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" class="form-control" id="telefono" value="<?php echo $telefono; ?>">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="text" class="form-control" id="correo" value="<?php echo $correo; ?>">
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" id="password" value="<?php echo $password; ?>">
            </div>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>

    <div  style=" text-align:center;">
        
            
                <button onclick="Home();" class="btn btn-danger" style="display:inline-block;">Cancelar</button>
                <button onclick="MiPerfil_update('<?php echo $IdUser; ?>');" class="btn btn-success" style="display:inline-block;">Guardar</button>
            
        
    </div>
    </div>

</div>
</div>
