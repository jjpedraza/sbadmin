
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ing. Juan José Pedraza">
    <meta name="description" content="Sistema">
    <title>Sistema</title>
    <link rel="icon" type="image/png" href="favi.png">
    <link rel="stylesheet" href="css/login.css"/>

    <!-- jquery -->
    <script src="lib/jquery/jquery.min.js"></script>

       <!-- SweetAler2 -->
       <script src="lib/sweetalert2/sweetalert2.min.js" ></script>
    <link rel="stylesheet" href="lib/sweetalert2/sweetalert2.min.css">

       
    <!-- Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="js/login.js"></script>
<body>

    <div class="login-form">
        <h4>Initial 1.0</h4>
        <div class="form-group">
            <label>Usuario:</label>
            <input type="text" id="IdUser" class="form-control">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" id="password" class="form-control">
        </div>
        <div class="form-group" style="margin-top:20px;">
            <button class="btn btn-success" onclick="LOGIN_validate();">Entrar</button>
            <!-- <button class="btn btn-secondary" onclick="LOGIN_recuperar();">Recuperar</button> -->
        </div>
    </div>
    <script>
        // $('body').css('background-color','#343a40');
        $(document).ready(function() {
        if ($(window).width() <= 768) {
            $('body').css('background-color', '#ffffff');
            $('body').css('background-image', '');
        } else {
            $('body').css('background-color', '#343a40');
            $('body').css('background-image', 'url(img/bg-login.jpg)');
        }

        $(window).resize(function() {
            if ($(window).width() <= 768) {
            $('body').css('background-color', '#ffffff');
            $('body').css('background-image', '');
            } else {
                $('body').css('background-color', '#343a40');
                $('body').css('background-image', 'url(img/bg-login.jpg)');
            }
        });
        });
    </script>
    <div id="R"></div>
</body>
</html>