<?php
// require("lib/funciones.php");
// require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="css/login.css"   rel="stylesheet">
    <script src="lib/jquery.min.js"></script>
    
    <title>Identificate!</title>
    <style>
     
    </style>
    <script src="js/login.js"></script>
   <!-- jquery -->
   <script src="lib/jquery/jquery.min.js"></script>

    <!-- SweetAler2 -->
    <script src="lib/sweetalert2/sweetalert2.min.js" ></script>
    <link rel="stylesheet" href="lib/sweetalert2/sweetalert2.min.css">


    <!-- Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
    <audio id="AudioBoop" style="display:none;">
        <source src="audios/boop.mp3">
    </audio>





<div class="parent clearfix">
    <div class="bg-illustration">
      <!-- <img src="img/logo2.png" alt="logo" style="width:50%;"> -->

      <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
    
    <div class="login">
      <div class="container">
        
        <h1>
        <img src="img/logo.png" style="height:33px; margin-top:-7px;">
        PROPARTS
       
      </h1>
        <div class="login-form">
            <div class="form-group">
                <label for="username" class="">Username:</label><br>
                <input type="text" name="IdUser" id="IdUser" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="">Password:</label><br>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group" style="margin-top:10px;">        
            <button id="btnLogin" class="btn btn-success" onclick=" LOGIN_validate();">Login</button> <br>
            
            </div>

            
        </div>
    
      </div>
      <cite style="
        opacity: 0.5; font-size: 8pt;  display: block; position: fixed;  bottom: 5px;margin-left: 10px;        
      ">Desarrollado por <a href="https://jjpedraza.github.io/" class="" style="cursor:pointer;">Juan J. Pedraza</a></cite>
      </div>
  </div>


  <div id="R"></div>


























<script>
function ValidarLogin(){
  username = $('#username').val();
  password = $('#password').val();

  
  $('#PreLoader').show();
  $.ajax({
    url: "ajax_loginvalidate.php",
    type: "post",
    data: {username:username, password:password},
    success: function(data){           
      $("#R").html(data+"\n");  
      $("#PreLoader").hide();             
    }  
  });
 
}


</script>



<div id="R" style="display:none;"></div>
</body>
</html>