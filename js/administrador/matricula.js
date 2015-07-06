

$(document).ready(function () {

    var arregloTablaAlumnos = Array();

    var jsonTablaActual = null;
    var jsonTablaAlumnos = null;

    var idalumno = null;
    var idanio = null;

    var likenombre = null;

    var filial = 0;
    var nivel = 0;
    var grado = 0;
    var seccion = 0;
    var tipoMatricula = 0;
    var codComprobante = "";

    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

//    $("#btnmatricular").attr("disabled", true);
//
    function reinicia() {
        alert("desde matriucla");
    }
    $(document).on("mouseenter", "#tengoelfoco", function ()
    {
//        alert("tengo el foco");
//        reiniciaa();
    });


    $(document).on("change", "#cbanio", function () {
        idanio = $(this).val();
        $("#txtNombresYapellidos").attr("disabled", false);
    });


    $(document).on("change", "#cbfilial", function () {
        filial = $(this).val();
    });
    $(document).on("change", "#cbnivel", function () {
        nivel = $(this).val();
    });
    $(document).on("change", "#cbgrado", function () {
        grado = $(this).val();
    });
    $(document).on("change", "#cbseccion", function () {
        seccion = $(this).val();
    });

    $(document).on("keyup", "#txt_codComprobanteMatricula_ad", function ()
    {
        codComprobante = $(this).val();
    });

    $(document).on("focusout", "#txt_codComprobanteMatricula_ad", function ()
    {
        $(this).val(codComprobante.trim());
    });

    $(document).on("keyup", "#txtNombresYapellidos", function ()
    {
        generaPorNombre($(this).val());
    });

    $(document).on("keypress", "#txtNombresYapellidos", function (tecla)
    {
        if (tecla.charCode == 13) {
            likenombre = $(this).val();
            cargaDatosPrevios();
        }
    });

    $(document).on("click", "[id*='matricular_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("matricular", "");
        var identificadores = res.split('_');
        idalumno = identificadores[1];
        var prop = identificadores[2];

        $('#txtnombres').val(jsonTablaActual[prop].Nombre);
        $('#txtnombres').attr("disabled", true);
        $('#modal_matricularAlumno_ad').modal('show');
    });

    $(document).on("click", "#btnmatricular", function ()
    {
        tipoMatricula = $("#cbTipoMatricula").val();
        codComprobante = codComprobante.trim();

        if (filial == 0 || nivel == 0 || grado == 0 || seccion == 0 || tipoMatricula == 0 || codComprobante == "") {

            alert("Todos los campos son obligatorios");
            return 0;
        }
        else {
            $('#modal_matricularAlumno_ad').modal('hide');
            iniciaAnimacionModal();

            $("[id*='matricular_']").attr("disabled", true);
            $("#txtNombresYapellidos").attr("disabled", true);
            var fecha = $("#lb_fechaMatricula_ad").html();
            $.ajax({
                type: "POST",
                url: 'administrador/ajax_matricula_alumno',
                cache: false,
                data: {idalumno: idalumno, idanio: idanio, filial: filial, nivel: nivel, grado: grado, seccion: seccion,
                    tipoMatricula: tipoMatricula, codCoprobante: codComprobante, fechaMatricula: fecha},
                success: function (result) {
                    finalizaAnimacion(result),
                            cargaDatosPrevios();
                    $("#txtNombresYapellidos").attr("disabled", false);
                }
            });
        }
    });

    $(document).on("change", "#cbnivel", function ()
    {
        filtro1 = $(this).val();
        filtro2 = 0;

        cargaCBgrado($(this), $('#cbgrado'));
    });





    $(document).on("click", "#btnHTML_Alumno_Tutor", function ()
    {
        $("#modal_HTML_ALUMNO_TUTOR_ad").modal('show');

        IDANIO1 = $("#inputgradoAT").val();

        IDNIVEL1 = $("#inputnivelAT").val();


        $.ajax({
            type: "POST",
            url: 'administrador/ReporteMatriuculadosAlumnoTutorHTML',
            cache: false,
            data: {a: IDANIO1, b: IDNIVEL1},
            success: function (result) {
                $("#html_alumno_tutor").html(result);
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
            url: 'administrador/ajax_carga_alumnos_para_matricular',
            cache: false,
            data: {idanio: idanio, likenombre: likenombre},
            success: function (result) {
                arregloTablaAlumnos = result;
                jsonTablaAlumnos = JSON.parse(arregloTablaAlumnos);
                generaPorNombre();
            }
        });
    }


    function cargaCuerpoTabla(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].Nombre + ' </td>';

        tabla += '<td>';

        tabla += '<button id="matricular_' + jsonTablaActual[prop].idalumno + '_' + i + '" class="btn btn-success btn-block" '
                + '   value="Matricular">Matricular</button>&nbsp;&nbsp;';

        tabla += '</td>';
        tabla += '</tr>';

    }

    function generaPorNombre() {

        tabla = ' <table class="table table-bordered table-hover"> ' +
                '<thead>         <tr>       <th>Numero</th>     <th>Nombres</th>     <th>Matricular</th>   </tr>  </thead>';

        tabla += '<tbody>';

        jsonTablaActual = jsonTablaAlumnos;

        var i = 0;
        seleccion = "";

        for (var prop in jsonTablaActual) {
            cargaCuerpoTabla(prop, i);
            i++;
        }

        tabla += '</tbody></table>';
        $('#cargaTablaMatricula').html(tabla);
    }



    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //             PARA EL LISTADO DE ALUMNOS MATRICULADOSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

    var gradotoreporte = 0;


    $(document).on("change", "#cbanio_matricula_ad", function ()
    {
        $("#inputanio").val($(this).val());
    });

    $(document).on("change", "#cbnivel_matriculas_ad", function ()
    {
        gradotoreporte = 0;
        $("#inputgrado").val(gradotoreporte);
        cargaCBgrado($(this), $('#cbgrado_matriculas_ad'));

        $("#inputnivel").val($(this).val());
        if ($(this).val() != 0) {
            $('#btnGeneraReporteMatricula').attr("disabled", false);
            $('#btnPreviewReporteMatricula').attr("disabled", false);
        }
        else {
            $('#btnGeneraReporteMatricula').attr("disabled", true);
            $('#btnPreviewReporteMatricula').attr("disabled", true);
        }
    });

    $(document).on("change", "#cbgrado_matriculas_ad", function ()
    {
        gradotoreporte = $(this).val();
        $("#inputgrado").val(gradotoreporte);


    });

    $(document).on("change", "#cbseccion_matriculas_ad", function ()
    {
        $("#inputseccion").val($(this).val());

    });

    $(document).on("click", "#btnGeneraReporteMatricula", function ()
    {
        if (gradotoreporte == 0) {
            var resp = confirm("NO ha seleccionado ningún grado, ¿Desea continuar?");
            if (resp == true)
                $("#frmReporteMatriculas_adm").submit();
            return;
        }

        $("#frmReporteMatriculas_adm").submit();
    });

    $(document).on("click", "#btnPreviewReporteMatricula", function ()
    {
        var idanio = $('#inputanio').val();
        var nivel = $('#inputnivel').val();
        var grado = $('#inputgrado').val();
        var seccion = $('#inputseccion').val();
        var letraseccion = $('#inputletraseccion').val();

        iniciaAnimacionLocal($('#divPreviewReporteMatricula_ad'));
//        alert("jajajja");

        $.ajax({
            type: "POST",
            url: 'administrador/ReporteMatriuculados',
            cache: false,
            data: {idanio: idanio, nivel: nivel, grado: grado, seccion: seccion, letraseccion: letraseccion, tipo: 'preview'},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (result) {
                $('#divPreviewReporteMatricula_ad').html(result);
            }
        });
    });


    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //       FINNNNNN      PARA EL LISTADO DE ALUMNOS MATRICULADOSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////






    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //             PARA EL LISTADO DE ALUMNOS TUTOR    12-03-15
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

    var gradotoreporteAT = 0;


    $(document).on("change", "#cbanio_matriculaAlumnoTutor_ad", function ()
    {
        $("#inputanioAT").val($(this).val());
//        if ($(this).val() != 0) {
//            $('#cbnivel_matriculasAlumnoTutor_ad').attr("disabled", false);
//
//        }
//        else
//            $('#cbnivel_matriculasAlumnoTutor_ad').attr("disabled", true);
    });

    $(document).on("change", "#cbnivel_matriculasAlumnoTutor_ad", function ()
    {
        gradotoreporteAT = 0;
        $("#inputgradoAT").val(gradotoreporteAT);
        cargaCBgrado($(this), $('#cbgrado_matriculasAlumnoTutor_ad'));

        $("#inputnivelAT").val($(this).val());
        if ($(this).val() != 0) {
            $('#btnGeneraReporteMatriculaAlumnoTutor').attr("disabled", false);

            $('#btnGeneraReporteMatriculaAlumnoTutorHTML').attr("disabled", false);
        }
        else {
            $('#btnGeneraReporteMatriculaAlumnoTutor').attr("disabled", true);
            $('#btnGeneraReporteMatriculaAlumnoTutorHTML').attr("disabled", false);
        }


    });

    $(document).on("change", "#cbgrado_matriculasAlumnoTutor_ad", function ()
    {
        gradotoreporteAT = $(this).val();
        $("#inputgradoAT").val(gradotoreporteAT);


    });

    $(document).on("change", "#cbseccion_matriculasAlumnoTutor_ad", function ()
    {
        $("#inputseccionAT").val($(this).val());

    });

    $(document).on("click", "#btnGeneraReporteMatriculaAlumnoTutor", function ()
    {
        if (gradotoreporteAT == 0) {
            var resp = confirm("NO ha seleccionado ningún grado, ¿Desea continuar?");
            if (resp == true)
                $("#frmReporteMatriculasAlumnoTutor_adm").submit();
            return;
        }

        $("#frmReporteMatriculasAlumnoTutor_adm").submit();
    });


    //HTML

    $(document).on("click", "#btnGeneraReporteMatriculaAlumnoTutorHTML", function ()
    {
        if (gradotoreporteAT == 0) {
            var resp = confirm("NO ha seleccionado ningún grado, ¿Desea continuar?");
            if (resp == true)
                $("#frmReporteMatriculasAlumnoTutorHTML_adm").submit();
            return;
        }

        $("#frmReporteMatriculasAlumnoTutorHTML_adm").submit();
    });


    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //       FINNNNNN      PARA EL LISTADO DE ALUMNOS TUTOR 12-03-15
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////



});

