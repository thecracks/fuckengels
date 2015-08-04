<script language="javascript" type="text/javascript">

    $(document).ready(function () {

        var arregloTablaAlumnos = Array();

        var jsonTablaActual = null;
        var jsonTablaAlumnos = null;

        idalumno = null;
        idanio = null;

        likenombre = "";

        var filial = 0;
        var nivel = 0;
        var grado = 0;
        var seccion = 0;

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////
        //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
        ///////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////



        $(document).on("keyup", "#txtNombresYapellidos", function ()
        {
            generaPorNombre($(this).val());
        });

        $(document).on("keypress", "#txtNombresYapellidos", function (tecla)
        {
            if (tecla.charCode == 13) {
//                alert("buscando...");
                likenombre = $(this).val();
                cargaDatosPrevios();
            }

        });

        $(document).on("click", "[id*='fila']", function ()
        {
            var str = $(this).attr("id");

            var res = str.replace("fila", "");
            var identificadores = res.split('_');

            var tipo = identificadores[1];
            idalumno = identificadores[2];
            var prop = identificadores[3];

            alert(idalumno);

            if (tipo == 'ed')
                $('#txtnombresed').val(jsonTablaActual[prop].Nombre);
            else
                $('#txtnombresdel').val(jsonTablaActual[prop].Nombre);

        });



        $(document).on("click", "#btnEliminar", function ()
        {
//            alert('aca estamos eliminando');
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->request->baseUrl; ?>/administrador/ajax_elimina_alumnopreinscrito',
                cache: false,
                data: {idalumno: idalumno},
                success: function (res) {
//                    alert(res);

                    cargaDatosPrevios();
//                    $("#txtNombresYapellidos").attr("disabled", false);
                }
            });

        });






        ///////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////
        //              FUNCIONES DE AYUDAAAAAAAAAAAAA
        ///////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////



        function cargaDatosPrevios() {
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->request->baseUrl; ?>/administrador/ajax_carga_alumnos_para_matricular',
                cache: false,
                data: {idanio: idanio, likenombre: likenombre},
                success: function (result) {
                    arregloTablaAlumnos = result;
                    jsonTablaAlumnos = JSON.parse(arregloTablaAlumnos);
                    generaPorNombre();
                    console.log(jsonTablaAlumnos);
                }
            });
        }


        function cargaCuerpoTabla(prop, i) {

            tabla += '<tr>';

            tabla += '<td>' + (i + 1) + ' </td>';
            tabla += '<td>' + jsonTablaActual[prop].Nombre + ' </td>';

            tabla += '<td>';

//            tabla += '<button id="fila' + jsonTablaActual[prop].idalumno + '_' + i + '" class="autoajustable" '
//                    + '  data-toggle="modal" data-target="#miventana" value="Matricular">Matricular</button>&nbsp;&nbsp;';


            tabla += '<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/editar.png" class="puntero tamincono" id="fila_ed_' + jsonTablaActual[prop].idalumno + '_' + i +
                    '" data-toggle="modal" data-target="#modalEditar"  border="0">&nbsp;&nbsp;&nbsp;&nbsp;';

            tabla += '<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/eliminar.png" class="puntero tamincono" id="fila_del_' + jsonTablaActual[prop].idalumno + '_' + i +
                    '" data-toggle="modal" data-target="#modalEliminar"  border="0">';


            tabla += '</td>';
            tabla += '</tr>';

        }

        function generaPorNombre() {

            tabla = ' <table class="table table-bordered"> ' +
                    '<thead>         <tr>       <th>Numero</th>     <th>Nombres</th>     <th>Opciones</th>  </tr>  </thead>';

            tabla += '<tbody>';

            jsonTablaActual = jsonTablaAlumnos;

            var i = 0;
            seleccion = "";

            for (var prop in jsonTablaActual) {
                cargaCuerpoTabla(prop, i);
                i++;
            }

            tabla += '</tbody></table>';
            $('#cargaTablaAsistencia').html(tabla);
        }

    }
    );

</script>

<div class="container ">


    <div class="modal fade  in " id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>ELIMINAR ALUMNO PREINCRITO</h4>

                </div>

                <div class="modal-body">
                    <div class="row">
                        <label class="col-lg-3 control-label">Desea eliminar el alumno: </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="txtnombresdel"  name="txtDNI" disabled="true" >
                        </div>
                    </div> 
                    <br>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnEliminar">ELIMINAR</button>
                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnCancelar">CANCELAR</button>
                </div> 

            </div>
        </div>
    </div>


    <section class="row">

        <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/Registroparcialalumno.jsp">Inscripción de Alumnos</a>
                </li>
                <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/asistencias'; ?>">Listar Alumnos Pre-Inscritos</a>
                </li>
            </ul>
        </div>

        <div class="col-xs-7 col-sm-7 col-md-9 col-lg-9">
            <center><h3>MATRÍCULA DE  ALUMNOS</h3></center>
            <hr>
            <div class="row" >

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" id="div_to_GeneraAsistencia">

                </div>

                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8" id="div_to_Mensaje">
                </div>
            </div>

            <br>

            <div class="row" >

                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="div_anio">
                    <label class="centered">Año académico: </label>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_anio">
                    <select class="form-control" id="cbanio">

                        <option value="0">Seleccione año ..</option>
                        <option value="2015">2015</option>

                    </select>
                </div>

            </div>

            <br>

            <!--PARA LOS FILTROS-->
            <div class="row" >  
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="div_to_GeneraAsistencia">
                    <input type="email" class="form-control" id="txtNombresYapellidos" disabled="true"
                           placeholder="Por Nombre O apellido">
                </div>

            </div>

            <br>
            <br>
            <div class="row" id="cargaTablaAsistencia">

            </div>
            <br>

        </div>
    </section>


</div>





<br>
<br>
