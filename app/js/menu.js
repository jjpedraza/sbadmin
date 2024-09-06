function GET_usuarios() {
    showLoader();
    $.ajax({
        url: 'modelos/usuarios.php',
        method: 'POST',
        data: {},
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });

}

function USUARIOS_nuevo() {
    showLoader();
    $.ajax({
        url: 'vistas/usuarios_nuevo.php',
        method: 'POST',
        data: {},
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}

function Home() {
    showLoader();
    $.ajax({
        url: 'vistas/home.php',
        method: 'POST',
        data: {},
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });

}

function Usuarios_Guardar() {
    showLoader();
    var username = $('#username').val();
    var nombre = $('#nombre').val();
    var telefono = $('#telefono').val();
    var correo = $('#correo').val();
    var password = $('#password').val();

    $.ajax({
        url: 'modelos/usuarios_guardar.php',
        method: 'POST',
        data: { username: username, nombre: nombre, telefono: telefono, correo: correo, password: password },
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });

}

function USUARIOS_eliminar(username) {
    showLoader();
    $.ajax({
        url: 'modelos/usuarios_eliminar.php',
        method: 'POST',
        data: { username: username },
        success: function(response) {
            $('#R').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}

function GET_USUARIOS_editar(username) {
    showLoader();
    $.ajax({
        url: 'vistas/usuarios_editar.php',
        method: 'POST',
        data: { username: username },
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}

function Usuarios_Actualizar() {
    var username = $('#username').val();
    var nombre = $('#nombre').val();
    var telefono = $('#telefono').val();
    var correo = $('#correo').val();
    var password = $('#password').val();
    showLoader();
    $.ajax({
        url: 'modelos/usuarios_editar.php',
        method: 'POST',
        data: { username: username, nombre: nombre, telefono: telefono, correo: correo, password: password },
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}


function USUARIOS_permisos(username) {
    showLoader();
    $.ajax({
        url: 'vistas/usuarios_permisos.php',
        method: 'POST',
        data: { username: username },
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}

function USUARIOS_permisos_eliminar(idmodulo, username) {
    showLoader();
    $.ajax({
        url: 'modelos/usuarios_permisos_eliminar.php',
        method: 'POST',
        data: { username: username, idmodulo: idmodulo },
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}

function USUARIOS_permisos_agregar(idmodulo, username) {
    showLoader();
    $.ajax({
        url: 'modelos/usuarios_permisos_agregar.php',
        method: 'POST',
        data: { username: username, idmodulo: idmodulo },
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}



function GET_ActualizarPassword() {
    showLoader();
    $.ajax({
        url: 'vistas/actualizarpassword.php',
        method: 'POST',
        data: {},
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}



function ActualizarPassword() {
    showLoader();
    var password_actual = $('#password_actual').val();
    var password_nuevo = $('#password_nuevo').val();
    $.ajax({
        url: 'modelos/actualizarpassword.php',
        method: 'POST',
        data: { password_actual: password_actual, password_nuevo: password_nuevo },
        success: function(response) {
            $('#R').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}

function MiPerfil() {
    showLoader();
    $.ajax({
        url: 'vistas/miperfil.php',
        method: 'POST',
        data: { },
        success: function(response) {
            $('#Contenido').html(response)
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
            hideLoader();
        }
    });
}


function MiPerfil_update(username) {
    var nombre = $('#nombre').val();
    var telefono = $('#telefono').val();
    var correo = $('#correo').val();
    var password = $('#password').val();
    var url_foto = $('#url_foto')[0].files[0];
    showLoader();
    var formData = new FormData();
    // Agregar campos del formulario
    formData.append('username', username);
    formData.append('nombre', nombre);
    formData.append('telefono', telefono);
    formData.append('correo', correo);
    formData.append('password', password);
    formData.append('url_foto', url_foto);
    
    $.ajax({
        url: 'modelos/miperfil_update.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false, // Evitar que jQuery convierta los datos en cadena
        success: function(response) {
            $('#R').html(response);
            hideLoader();
        },
        error: function(xhr, status, error) {
            $('#R').html(response);
            hideLoader();
        }
    });
}
