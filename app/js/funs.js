function showLoader() {
    // document.querySelector('.loader-container').style.display = 'flex';
    $('.loader-container').show();
    _seguridad();

}

function hideLoader() {
    // document.querySelector('.loader-container').style.display = 'none';
    $('.loader-container').hide();
    
    // oculta menu movil despues de cargar
    $('#collapsePages').removeClass('show').addClass('hidden');
    $('#collapsePages1').removeClass('show').addClass('hidden');
    $('#collapsePages2').removeClass('show').addClass('hidden');
    $('#collapsePages3').removeClass('show').addClass('hidden');
    $('#collapseTwo').removeClass('show').addClass('hidden');
    

}

// function DATATABLE_active(idTabla, buttons = true) {
//     showLoader();
//     $(document).ready(function() {
//         // Cargar estilos de DataTables
//         $('head').append('<link href="lib/datatable/datatables.min.css" rel="stylesheet"/>');

//         // Cargar script de DataTables
//         $.getScript('lib/datatable/datatables.min.js', function() {
//             // Cargar estilos de Buttons
//             $('head').append('<link href="lib/datatable/Buttons-2.3.6/css/buttons.dataTables.min.css" rel="stylesheet"/>');

//             // Cargar script de Buttons
//             $.getScript('lib/datatable/Buttons-2.3.6/js/buttons.dataTables.js', function() {
//                 // Cargar estilos de Responsive
//                 $('head').append('<link href="lib/datatable/responsive/css/responsive.dataTables.css" rel="stylesheet"/>');

//                 // Cargar script de Responsive
//                 $.getScript('lib/datatable/responsive/js/dataTables.responsive.js');

//                 var buttonOptions = [];
//                 if (buttons) {
//                     buttonOptions = [{
//                             extend: 'print',
//                             text: '<i class="fas fa-print"></i> Imprimir',
//                             className: 'btn btn-silver'
//                         },
//                         {
//                             extend: 'csvHtml5',
//                             text: '<i class="fas fa-file-csv"></i> CSV',
//                             className: 'btn btn-silver'
//                         },
//                         {
//                             extend: 'excelHtml5',
//                             text: '<i class="fas fa-file-excel"></i> Excel',
//                             className: 'btn btn-silver'
//                         },
//                         {
//                             extend: 'pdfHtml5',
//                             text: '<i class="fas fa-file-pdf"></i> PDF',
//                             className: 'btn btn-silver',
//                             customize: function(doc) {
//                                 var tblBody = doc.content[1].table.body;
//                                 doc.content[1].layout = {
//                                     hLineWidth: function(i, node) {
//                                         return (i === 0 || i === node.table.body.length) ? 2 : 1;
//                                     },
//                                     vLineWidth: function(i, node) {
//                                         return (i === 0 || i === node.table.widths.length) ? 2 : 1;
//                                     },
//                                     hLineColor: function(i, node) {
//                                         return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';
//                                     },
//                                     vLineColor: function(i, node) {
//                                         return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';
//                                     }
//                                 };
//                                 $('#gridID').find('tr').each(function(ix, row) {
//                                     var index = ix;
//                                     var rowElt = row;
//                                     $(row).find('td').each(function(ind, elt) {
//                                         tblBody[index][ind].border
//                                         if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
//                                             delete tblBody[index][ind].style;
//                                             tblBody[index][ind].fillColor = '#FFF9C4';
//                                         } else {
//                                             if (tblBody[index][2].text == '') {
//                                                 delete tblBody[index][ind].style;
//                                                 tblBody[index][ind].fillColor = '#FFFDE7';
//                                             }
//                                         }
//                                     });
//                                 });
//                             }
//                         }
//                     ];
//                 }

//                 var datatableOptions = {
//                     language: {
//                         "sProcessing": "Procesando...",
//                         "sLengthMenu": "Mostrar _MENU_ registros",
//                         "sZeroRecords": "No se encontraron resultados",
//                         "sEmptyTable": "Ningún dato disponible en esta tabla",
//                         "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                         "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//                         "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//                         "sInfoPostFix": "",
//                         "sSearch": "Buscar:",
//                         "sUrl": "",
//                         "sInfoThousands": ",",
//                         "sLoadingRecords": "Cargando...",
//                         "oPaginate": {
//                             "sFirst": "<i class='fas fa-angle-double-left'></i>",
//                             "sLast": "<i class='fas fa-angle-double-right'></i>",
//                             "sNext": "<i class='fas fa-angle-right'></i>",
//                             "sPrevious": "<i class='fas fa-angle-left'></i>"
//                         },
//                         "buttons": {
//                             "copy": "Copiar"
//                         }
//                     },
//                     dom: 'Bfrtip',
//                     buttons: buttonOptions,
//                     "lengthMenu": [
//                         [5, 10, 25, 50, -1],
//                         [5, 10, 25, 50, "Todos"]
//                     ],
//                     "order": [
//                         [0, 'asc']
//                     ],
//                     responsive: true
//                 };

//                 $('#' + idTabla).DataTable(datatableOptions);
//                 $("#" + idTabla + "").show();
//                 $("#" + idTabla + "_wrapper").css({
//                     "width": "94%",
//                     "display": "inline-block",
//                     "margin": "15px",
//                     "background-color": "#F3F3F3",
//                     "padding": "10px",
//                     "border-radius": "5px"
//                 });

//                 $("#" + idTabla + "").css({
//                     "width": "100%",
//                     "margin": "0px",
//                     "background-color": "#ffffffde",
//                     "padding": "0px",
//                     "border-radius": "0px",
//                     "text-align": "left",
//                     "font-size": "10pt"
//                 });

//                 $('.btn-secondary').css({
//                     'color': '#fff',
//                     'background-color': '#bfbfbf',
//                     'border-color': '#eae8e8'
//                 });

//                 $('.btn-secondary').hover(function() {
//                     $(this).css('background-color', '#999999');
//                 }, function() {
//                     $(this).css('background-color', '#bfbfbf');
//                 });


//                 $('table.dataTable.table-striped > tbody > tr.odd').css('background-color', '#F0F0F0');
//                 $('table.dataTable.table-striped > tbody > tr.even').css('background-color', 'white');
//                 hideLoader();
//             });
//         });
//     });
// }

function loadDataTableLibraries(callback) {
    showLoader();

    // Cargar estilos y scripts de DataTables y Buttons
    $('head').append('<link href="lib/datatable/datatables.min.css" rel="stylesheet"/>');
    $.getScript('lib/datatable/datatables.min.js', function() {
        $('head').append('<link href="lib/datatable/Buttons-2.3.6/css/buttons.dataTables.min.css" rel="stylesheet"/>');
        $.getScript('lib/datatable/Buttons-2.3.6/js/buttons.dataTables.js', function() {
            $('head').append('<link href="lib/datatable/responsive/css/responsive.dataTables.css" rel="stylesheet"/>');
            $.getScript('lib/datatable/responsive/js/dataTables.responsive.js', function() {
                hideLoader();
                console.log('Libreria Datatable cargada..');
                if (typeof callback === 'function') {
                    callback();
                }
            });
        });
    });
}

function DATATABLE_active(idTabla, buttons = true, searching=true, paging=true, info=true) {
    var buttonOptions = [];
    if (buttons) {
        buttonOptions = [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                className: 'btn btn-silver'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: 'btn btn-silver'
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-excel"></i> CSV',
                className: 'btn btn-silver'
            },
          
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-silver',
                customize: function(doc) {
                    var tblBody = doc.content[1].table.body;
                    doc.content[1].layout = {
                        hLineWidth: function(i, node) {
                            return (i === 0 || i === node.table.body.length) ? 2 : 1;
                        },
                        vLineWidth: function(i, node) {
                            return (i === 0 || i === node.table.widths.length) ? 2 : 1;
                        },
                        hLineColor: function(i, node) {
                            return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';
                        },
                        vLineColor: function(i, node) {
                            return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';
                        }
                    };
                    $('#gridID').find('tr').each(function(ix, row) {
                        var index = ix;
                        var rowElt = row;
                        $(row).find('td').each(function(ind, elt) {
                            tblBody[index][ind].border
                            if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
                                delete tblBody[index][ind].style;
                                tblBody[index][ind].fillColor = '#FFF9C4';
                            } else {
                                if (tblBody[index][2].text == '') {
                                    delete tblBody[index][ind].style;
                                    tblBody[index][ind].fillColor = '#FFFDE7';
                                }
                            }
                        });
                    });
                }
            }
        ];
    }

    var datatableOptions = {
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<i class='fas fa-angle-double-left'></i>",
                "sLast": "<i class='fas fa-angle-double-right'></i>",
                "sNext": "<i class='fas fa-angle-right'></i>",
                "sPrevious": "<i class='fas fa-angle-left'></i>"
            },
            "buttons": {
                "copy": "Copiar"
            }
        },
        dom: 'Bfrtip',
        buttons: buttonOptions,
        "searching": searching,
        "paging": paging,
        "info": info,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        
        "order": [
            [0, 'asc']
        ],
        responsive: true
    };

    var table = $('#' + idTabla).DataTable(datatableOptions);
    setTimeout(function() {
        table.columns.adjust().responsive.recalc().draw(false); // Ajusta y recalcula las columnas después de la inicialización
    }, 200);

    $("#" + idTabla + "").show();
    $("#" + idTabla + "_wrapper").css({
        "width": "94%",
        "display": "inline-block",
        "margin": "15px",
        "background-color": "#F3F3F3",
        "padding": "10px",
        "border-radius": "5px"
    });

    $("#" + idTabla + "").css({
        "width": "100%",
        "margin": "0px",
        "background-color": "#ffffffde",
        "padding": "0px",
        "border-radius": "0px",
        "text-align": "left",
        "font-size": "10pt"
    });

    $('.btn-secondary').css({
        'color': '#fff',
        'background-color': '#bfbfbf',
        'border-color': '#eae8e8'
    });

    $('.btn-secondary').hover(function() {
        $(this).css('background-color', '#999999');
    }, function() {
        $(this).css('background-color', '#bfbfbf');
    });

    $('table.dataTable.table-striped > tbody > tr.odd').css('background-color', '#F0F0F0');
    $('table.dataTable.table-striped > tbody > tr.even').css('background-color', 'white');
}


function _seguridad() {
    $.ajax({
        url: '_seguridad_sentinel.php',
        method: 'POST',
        data: {},
        success: function(response) {
            // $('#R').html(response);            
            console.log("checking login " + response + "...");
            if (response == "FALSE") {
                $(location).prop("href", "logout.php");
            }
        },
        error: function(xhr, status, error) {
            $('#R').html(response)
            console.log(xhr.responseText);
        }
    });
}
setInterval(_seguridad, 300000);

function Titulo(eltitulo){    
    $('#ElTitulo').html(eltitulo);
}

function applyButtonPadding() {
    if ($(window).width() <= 767) {
        $('.btn').css('padding', '3px');
    } else {
        $('.btn').css('padding', '10px');
    }
}

function validateField(field, elementId) {
    if (field === "") {
        $(elementId).addClass('is-invalid').removeClass('is-valid');
    } else {
        $(elementId).addClass('is-valid').removeClass('is-invalid');
    }
}

// Función para aplicar estilos en móvil
function adjustMoviles() {
    if ($(window).width() < 768) { // Ejemplo de ancho máximo para móvil (puedes ajustar este valor según tu necesidad)
        $('.form-group *').css('font-size', '10px');
        $('.form-group').css('margin', '0px');
        $('.form-group').css('padding', '0px');
        $('.swal2-html-container').css('margin-top', '-40px');
        $('.swal2-html-container').css('margin', '0px');
        $('.swal2-title').css('font-size', '16pt');
        console.log("se ejecutaron ajustes para moviles");
    } else {
        // Restaurar estilos originales si no se cumple la condición
        $('.form-group *').css('font-size', '');
        $('.form-group').css('margin', '');
        $('.form-group').css('padding', '');
        $('.swal2-html-container').css('margin-top', '');
        $('.swal2-html-container').css('margin', '');
        $('.swal2-title').css('font-size', '');
        console.log("sin ajustes para moviles");
    }
}

function DivModal(idelement) {
    // Obtener el contenido del div
    var content = $('#' + idelement).html();

    // Mostrar el modal utilizando SweetAlert2
    Swal.fire({
        html: content,
        showCloseButton: true,
        showCancelButton: false,
        showConfirmButton: false, // No mostrar el botón de confirmación
        focusConfirm: false,
        allowOutsideClick: true, // Permitir cerrar haciendo clic fuera del modal
        allowEscapeKey: true, // Permitir cerrar usando la tecla Esc
    });
    $('.swal2-popup').css('width','100%');
    $('.swal2-popup').css('height','100%');
}

function ImgModal(idelement){
     // Obtener la fuente de la imagen
     var imgSrc = $('#' + idelement).attr('src');

     // Mostrar el modal utilizando SweetAlert2
     Swal.fire({
        imageUrl: imgSrc,
        imageAlt: '',
        showCloseButton: true,
        showCancelButton: false,
        showConfirmButton: false, // No mostrar el botón de confirmación
        focusConfirm: false,
        allowOutsideClick: true, // Permitir cerrar haciendo clic fuera del modal
        allowEscapeKey: true, // Permitir cerrar usando la tecla Esc
    });
     $('.swal2-popup').css('width','100%');
     $('.swal2-popup').css('height','100%');
}

function loadScript(url, callback) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;

    script.onload = function() {
        callback();
    };

    document.head.appendChild(script);
}

function UrlModal(url) {
    $.get(url, function(data) {
        Swal.fire({
            title: '',
            html: data,
            width: '80%',
            heightAuto: true,
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: 'Cerrar'
        });
    }).fail(function() {
        Swal.fire({
            title: 'Error',
            text: 'No se pudo cargar el contenido de la URL.',
            icon: 'error',
            confirmButtonText: 'Cerrar'
        });
    });
}
// UrlModal('https://google.com');
