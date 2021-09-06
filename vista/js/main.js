$(document).ready(function() {


    /*--------------------------------------------------------------------------------------------------------*/
    /*---------------------------------------CARGAR DATOS ASIGNATURACURSO-------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    cargarDatos();
    $("#btnGuardar").click(function() {
        var nombre = $("#txtNombre").val();
        var apellido = $("#txtApellido").val();
        var direccion = $("#txtDireccion").val();

        $("input[name=radioGenero]").click(function() {
            var genero = $('input:radio[name=radioGenero]:checked').val();
            var pregunta = "";

            if (genero == "Masculino") {
                pregunta = "¿que deporte le gusta mas?";
            } else {
                pregunta = "¿que pelicula le gusta mas?";
            }
            $("#labelRespuesta").html(pregunta);
        })


        var genero = $('input:radio[name=radioGenero]:checked').val();
        var respuesta = $("#txtRespuesta").val();
        alert(genero + " " + respuesta);


        var objData = new FormData();

        objData.append("nombre", nombre);
        objData.append("apellido", apellido);
        objData.append("direccion", direccion);
        objData, append("genero", genero);
        objData, append("respuesta", respuesta)

        $.ajax({
            url: "control/usuarioControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })
                destruirTablaUsuario();
                cargarDatos();
            }
        })
    })

    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------LISTAR DATOS USUARIO-------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatos() {
        var listaUsuario = "ok";
        var datosCargarUsuario = [];
        var objListaUsuario = new FormData();
        objListaUsuario.append("listaUsuario", listaUsuario);

        $.ajax({
            url: "control/usuarioControl.php",
            type: "post",
            dataType: "json",
            data: objListaUsuario,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                console.log(respuesta);

                respuesta.forEach(cargarTablaUsuario);

                function cargarTablaUsuario(item, index) {

                    var btnUsuario = '<button type="button" class="btn btn-success" title="Editar" id="btn-editarUsuario" idUsuario="' + item.idUsuario + '"  nombre="' + item.nombre + '" apellido="' + item.apellido + '" direccion="' + item.direccion + '" genero="' + item.genero + '"  respuesta="' + item.respuesta + '" data-toggle="modal" data-target="#mdUsuarioModificar"><span class="glyphicon glyphicon-pencil"></span></button>';
                    btnUsuario += '<button type="button" class="btn btn-danger" title="Eliminar" id="btn-eliminarUsuario" idUsuario="' + item.idUsuario + '"><span class="glyphicon glyphicon-trash"></span></button>';


                    datosCargarUsuario.push([item.nombre, item.apellido, item.direccion, genero, respuesta, btnUsuario]);
                }

                console.log(datosCargarUsuario);
                $("#tablaUsuario").DataTable({
                    data: datosCargarUsuario,
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        'colvis'
                    ],

                });
            }
        })
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------FUNCION DESTUIR TABLA--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function destruirTablaUsuario() {
        tabla = $("#tablaUsuario").DataTable();
        tabla.destroy();
    }


})