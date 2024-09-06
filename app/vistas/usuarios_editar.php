<?php
require("../_config.php");
require("../controladores/funs.php");
require("../lib/fun_varclean.php");
if (isset($_POST['username'])){
    $username = VarClean($_POST['username']);    
    $sql = "SELECT * FROM usuarios WHERE iduser='".$username."' and disable=0";    
    $r= $db-> query($sql);
    if($f = $r -> fetch_array())
    {
        $nombre = $f['nombre'];
        $telefono  = $f['telefono'];
        $correo = $f['correo'];
        $password = $f['password'];
    }
} else{
    swal("Selecciona un usuario ","warning","false","","GET_usuarios()");
    exit();
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" readonly>
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
                <button onclick="Usuarios_Actualizar();" class="btn btn-success" style="display:inline-block;">Guardar</button>
            
        
    </div>
</div>
