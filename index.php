<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Librerias para tablas dianamicas o datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- CDN Botones de exportacion datatabale -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.dataTables.min.css">

    <link rel='stylesheet' type='text/css' media='screen' href='vista/css/main.css'>
    <script src='vista/js/main.js'></script>
</head>

<body>



    <div class="container">
        <center>
            <div class="jumbotron">
                <h1>Modifique usuario</h1>
                <p>Crea y administra información sobre un usuario.</p>
            </div>
        </center>

        <div class="row">
            <div class="col-lg-12 ">

            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-lg-6" class="container">
                <form action="">
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre">
                    </div>

                    <div class="form-group">
                        <label for="txtApellido">Apellido</label>
                        <input type="text" class="form-control" id="txtApellido">
                    </div>

                    <div class="form-group">
                        <label for="txtDireccion">Direccion</label>
                        <input type="text" class="form-control" id="txtDireccion">
                    </div>

                    <div class="radio">
                        <label><input type="radio" name="radioGenero" value="Masculino" checked>Masculino</label>
                    </div>

                    <div class="radio">
                        <label><input type="radio" name="radioGenero" value="Femenino">Femenino</label>
                    </div>

                    <div class="row">
                        <label for="txtRespuesta" id="labelRespuesta"></label>
                        <input type="text" id="txtRespuesta">
                    </div>
                    <br>

                    <button id="btnGuardar" type="button" class="btn btn-primary">Guardar</button>

                </form>
            </div>

            <div class="col-lg-6">
                <table id="tablaUsuario" class="table table-hover  table-striped">
                    <thead class="cabeceraUsuario">
                        <tr>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>GENERO</th>
                            <th>RESPUESTA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyUsuario">

                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalEditar" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modificar Usuario</h4>
                    </div>

                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="txtModNombre">Nombre</label>
                                <input type="text" class="form-control" id="txtModNombre">
                            </div>

                            <div class="form-group">
                                <label for="txtModApellido">Apellido</label>
                                <input type="text" class="form-control" id="txtModApellido">
                            </div>

                            <div class="form-group">
                                <label for="txtModDirecion">Direccion</label>
                                <input type="text" class="form-control" id="txtModDirecion">
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button id="btnModUsuario" idUsuario="" type="button" class="btn btn-primary">Editar</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>