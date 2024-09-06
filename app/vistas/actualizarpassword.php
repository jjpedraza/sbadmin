<?php
require("../_seguridad.php");
require("../_config.php");
require("../controladores/funs.php");
require("../lib/fun_varclean.php");

    

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Passowrd Actual</label>
                <input type="text" class="form-control" id="password_actual" value="">
            </div>

            <div class="form-group">
                <label>Password Nuevo</label>
                <input type="text" class="form-control" id="password_nuevo" value="">
            </div>
        </div>

        


    </div>
    
    <div  style=" text-align:center;">
        
            
                
                <button onclick="ActualizarPassword();" class="btn btn-success" style="display:inline-block;">Actualizar</button>
            
        
    </div>
</div>
