function LOGIN_validate() {
    var IdUser = $('#IdUser').val();
    var password = $('#password').val();

    $.ajax({
        url: 'modelos/login.php',
        method: 'POST',
        data: {
            IdUser: IdUser,
            password: password
        },
        success: function(response) {
            $('#R').html(response)

        },
        error: function(xhr, status, error) {
            $('#R').html(response)

        }
    });
}

function LOGIN_test() {
    console.log("LOGINTest");
}