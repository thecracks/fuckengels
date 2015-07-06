
$(document).ready(function () {

    var arregloTablaFiltradaAlumnos = Array();
    var arregloTablaAlumnos = Array();

    var jsonTablaFiltradaAlumnos_asis = null;
    var jsonTablaActual_asis = null;
    var jsonTablaAlumnos_asis = null;
    var jsonFechas_asis = null;

    var fechaElegida_asis = null;
    var idalumno = null;
    var idanio_asis = null;

    var filtro1 = 0;
    var filtro2 = 0;
    var esreporte = false;

    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

    $(document).on("mouseenter", "#div_asistencia_ad", function () {



        if (jsonFechas_asis == null || hasreload) {
            cargaCBgrado($("#cbnivel_ediasis_ad"), $('#cbgrado_ediasis_ad'));
            $.ajax({
                type: 'POST',
                url: 'administrador/ajax_carga_fechas_x_anio',
                cache: false,
                success: function (resultado) {
                    jsonFechas_asis = JSON.parse(resultado);
                    cargaComboFechas_asis();
                    restartHasReload();
                }
            });



        }
    });


    $(document).on("click", "[id*='tab_']", function () {
        idtab = $(this).attr("id");
        idtab = idtab.replace("tab_", "");
        if (idtab == "ReporteAsistencia")
        {
            esreporte = true;
        } else {
            esreporte = false;
        }

    });


    $(document).on("change", "#cbanio2_asis", function () {

        esreporte = true;
        idanio_asis = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'administrador/ajax_carga_fechas_x_anio_confirmadas',
            data: {idanio: idanio_asis},
            cache: false,
            success: function (resultado) {
//                alert(resultado);
                jsonFechas_asis = JSON.parse(resultado);
                cargaComboFechas_asis();
            }
        });
    });


    $(document).on("change", "#cbanio_asis", function () {
//            alert("acaaaaaa");
        idanio_asis = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'administrador/ajax_carga_fechas_x_anio',
            data: {idanio: idanio_asis},
            cache: false,
            success: function (resultado) {
                jsonFechas_asis = JSON.parse(resultado);
                cargaComboFechas_asis();
            }
        });
    });

    $(document).on("change", "#cbnivel_asis", function ()
    {
        filtro1 = $(this).val();
        filtro2 = 0;
        cargaCBgrado($(this), $('#cbgrado_asis'));
        generaPorFiltros_asis();
    });


    $(document).on("change", "#cbnivel2_asis", function ()
    {
        filtro1 = $(this).val();
        filtro2 = 0;

        cargaCBgrado($(this), $('#cbgrado2_asis'));
    });


    $(document).on("change", "#cbgrado_asis", function ()
    {
        filtro2 = $(this).val();
        generaPorFiltros_asis();
    });

    $(document).on("change", "#cbgrado2_asis", function ()
    {
        filtro2 = $(this).val();

    });

    $(document).on("keyup", "#txtNombresYapellidos_asis", function ()
    {
        generaPorNombre_asis($(this).val());
    });

    $(document).on("click", "[name*='fila']", function ()
    {
        $('#btnConfirmarAsistencias').attr("disabled", false);

        var str = $(this).attr("name");
        var res = str.replace("fila", "");

        var identificadores = res.split('_');
        idalumno = identificadores[0];
        var propiedadS = identificadores[1];
        var asistencia = $(this).val();

        if (jsonTablaFiltradaAlumnos_asis == null)
            propiedadP = propiedadS;
        else {
            propiedadP = jsonTablaFiltradaAlumnos_asis[propiedadS].pp;
            jsonTablaFiltradaAlumnos_asis[propiedadS].Asistencia = $(this).val();
        }
        jsonTablaAlumnos_asis[propiedadP].Asistencia = asistencia;

        iniciaAnimacionLocal($("#estatusEjecucion"));

        $.ajax({
            type: "POST",
            url: 'administrador/ajax_actualiza_asistencia_alumno',
            cache: false,
            data: {idalumno: idalumno, idanio: idanio_asis, asistencia: asistencia, fecha: fechaElegida_asis},
            success: function (result) {

                result = result.trim();
                finalizaAnimacion(result);
            }
        });
    });


    $(document).on("click", "#btnGeneraReporteAsistencia_ad", function ()
    {
        letraseccion = $("#cbseccion option:selected").text();
        nombremes = $("#cbmes option:selected").text();

        seccion = $("#cbseccion").val();
        tipo = $('input:radio[name=tiporeporte]:checked').val();
        mes = $("#cbmes").val();

        $("#inputanio").val(idanio_asis);
        $("#inputfecha").val(fechaElegida_asis);
        $("#inputnivel").val(filtro1);
        $("#inputgrado").val(filtro2);
        $("#inputseccion").val(seccion);
        $("#inputtipo").val(tipo);
        $("#inputmes").val(mes);
        $("#inputnombremes").val(nombremes);
        $("#inputletraseccion").val(letraseccion);

//        alert('anio: ' + idanio_asis + " fecha: " + fechaElegida_asis + " nivel : " + filtro1 +
//                " grado: " + filtro2 + " seccion: " + seccion + " tipo " + tipo + " mes: " + mes + " letra: " + letraseccion + " nombre mes " + nombremes);

        $("#frmReporteAsistencia_adm").submit();
    });


    $(document).on("change", "#cbfechas", function ()
    {
        //PARA CARGAR LA LISTA DE ALUMNOS
        var strFecha = $(this).val().split('-');
        date = strFecha[2] + '-' + strFecha[1] + '-' + strFecha[0];
        fechaElegida_asis = date;
//        alert(idanio_asis + "'''" + fechaElegida_asis);
        cargaCBnivelTotal();
        cargaCBgrado($('#cbnivel_asis'), $('#cbgrado_asis'));
        $('#cargaTablaAsistencia').html("");
        $.ajax({
            type: "POST",
            url: 'administrador/ajax_carga_alumnos_to_asist',
            cache: false,
            data: {idanio: idanio_asis, fecha: fechaElegida_asis},
            success: function (result) {
                arregloTablaAlumnos = result;
//                alert(result);
                jsonTablaAlumnos_asis = JSON.parse(arregloTablaAlumnos);
                jsonTablaFiltradaAlumnos_asis = null;
            }
        });
    });


    $(document).on("change", "#cbfechas2", function ()
    {
        //PARA CARGAR LA LISTA DE ALUMNOS
        strFecha = $(this).val().split('-');
        date = strFecha[2] + '-' + strFecha[1] + '-' + strFecha[0];
        fechaElegida_asis = date;

    });

    $(document).on("change", "input[name*='tiporeporte']", function () {
//        alert("acaaaaaa");
        $('#muestracbfechasReporte').toggle();
        $('#muestracbmeses').toggle();
    });



    $(document).on("click", "#btnConfirmarAsistencias", function ()
    {
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/ajax_confirma_asistencia_para_fecha',
            cache: false,
            data: {fecha: fechaElegida_asis},
            success: function (result) {
                finalizaAnimacion(result);
                if (result == 'ok') {
                    $("#btnConfirmarAsistencias").attr('disabled', true);
                    recargandome();
                }
                fechaElegida_asis = '';

            }
        });
    });

    $(document).on("dblclick", "[id*='rbfalta_asis_ad_']", function () { //PARA CUANDO HACE 2BLE CLICK EN MI PUERTA
        var idrb = $(this).attr("id");
        idalumno = idrb.split("_")[3];
        $('#modaljustificacionfalta_asistencia_ad').modal('show');
    });

    $(document).on("dblclick", "[id*='rbtardanza_asis_ad_']", function () { // PARA CUANDO HAC  2BLE CLICK EN LA TARDANZA

        var idrb = $(this).attr("id");
        idalumno = idrb.split("_")[3];
        $('#modaljustificacionfalta_asistencia_ad').modal('show');
    });


    $(document).on("click", "[id='btnConfirmJustificacion_asistencia_ad']", function () {


        var textJustificacion = $('#txtareajustifacion_asistencia_ad').val();
        $('#modaljustificacionfalta_asistencia_ad').modal('hide');

        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/ajax_graba_justificacion_asistencia',
            cache: false,
            data: {idalumno: idalumno, justificacion: textJustificacion, fecha: fechaElegida_asis},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (result) {

                finalizaAnimacion(result);
            }
        });
    });



    $(document).on("keyup", "[id='txtareajustifacion_asistencia_ad']", function () {

        var textJus = $(this).val().trim();

        if (textJus.length > 0)
            $("#btnConfirmJustificacion_asistencia_ad").attr("disabled", false);
        else
            $("#btnConfirmJustificacion_asistencia_ad").attr("disabled", true);

    });






    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //              FUNCIONES DE AYUDAAAAAAAAAAAAA
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////



    function cargaComboFechas_asis() {

        var d = new Date();
        if (d.getDate() < 10)
            dia = "0" + d.getDate();
        else
            dia = d.getDate();
        if (d.getMonth() < 10)
            mes = "0" + (d.getMonth() + 1);
        else
            mes = (d.getMonth() + 1);
        var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + dia;

        var encontrado = false;
        var strFecha = null;

        if (esreporte)
            idtaget = "cbfechas2";
        else
            idtaget = "cbfechas";

        $('#' + idtaget + '').html('');
        $('#' + idtaget + '').append('<option value="0">Selecciona fecha</option>');

        for (var prop in jsonFechas_asis) {

            strFecha = jsonFechas_asis[prop].fecha.split('-');
            date = strFecha[2] + '-' + strFecha[1] + '-' + strFecha[0];

            if (!encontrado && Date.parse(date) >= Date.parse(strDate)) {
                $('#' + idtaget + '').append('<option value="' + jsonFechas_asis[prop].fecha + '" selected="selected" >' + jsonFechas_asis[prop].fecha + '</option>');
                encontrado = true;
                fechaElegida_asis = date;
            } else {
                $('#' + idtaget + '').append('<option value="' + jsonFechas_asis[prop].fecha + '" >' + jsonFechas_asis[prop].fecha + '</option>');
            }
        }

        cargaDatosPrevios_asis();

        $("#txtNombresYapellidos_asis").attr('disabled', false);
        if (esreporte) {
            $("#cbnivel2_asis").attr('disabled', false);
            $("#cbgrado2_asis").attr('disabled', false);
        } else {
            $("#cbnivel_asis").attr('disabled', false);
            $("#cbgrado_asis").attr('disabled', false);
        }
    }

    function cargaDatosPrevios_asis() {
        $.ajax({
            type: "POST",
            url: 'administrador/ajax_carga_alumnos_to_asist',
            cache: false,
            data: {idanio: idanio_asis, fecha: fechaElegida_asis},
            success: function (result) {
                arregloTablaAlumnos = result;
                jsonTablaAlumnos_asis = JSON.parse(arregloTablaAlumnos);
            }
        });
    }


    function cargaCuerpoTabla_asis(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';
        tabla += '<td>' + jsonTablaActual_asis[prop].Nombre + ' </td>';
        tabla += '<td>' + jsonTablaActual_asis[prop].nivel + ' </td>';
        tabla += '<td>' + jsonTablaActual_asis[prop].grado + ' </td>';

        tabla += '<td>';

        if (jsonTablaActual_asis[prop].Asistencia == 'A')
            seleccion = 'checked="checked"';
        else
            seleccion = '';
        tabla += '<input class="puntero" type="radio"  name="fila' + jsonTablaActual_asis[prop].idpersona + '_' + i + '" ' + seleccion + ' style="width:17px;height:17px" value="A">A</input>&nbsp;&nbsp;';

        if (jsonTablaActual_asis[prop].Asistencia == 'F')
            seleccion = 'checked="checked"';
        else
            seleccion = '';
        tabla += '<input class="puntero" title="Doble click para justificar" id="rbfalta_asis_ad_' + jsonTablaActual_asis[prop].idpersona +
                '" type="radio" name="fila' + jsonTablaActual_asis[prop].idpersona + '_' + i + '"' + seleccion +
                ' style="width:17px;height:17px" value="F">F</input>&nbsp;&nbsp;';

        if (jsonTablaActual_asis[prop].Asistencia == 'T')
            seleccion = 'checked="checked"';
        else
            seleccion = '';
        tabla += '<input class="puntero" title="Doble click para justificar" id="rbtardanza_asis_ad_' + jsonTablaActual_asis[prop].idpersona +
                '" type="radio" name="fila' + jsonTablaActual_asis[prop].idpersona + '_' + i + '" ' + seleccion + ' style="width:17px;height:17px" value="T">T</input>';

        tabla += '</td>';
        tabla += '</tr>';

    }

    function generaPorNombre_asis(nombre) {

        tabla = ' <table class="table table-bordered"> ' +
                '<thead>         <tr>       <th>Numero</th>     <th>Nombres</th>   <th>Nivel</th>   <th>Grado</th>   <th>Asistencia</th>   </tr>  </thead>';

        tabla += '<tbody>';


        if (jsonTablaFiltradaAlumnos_asis !== null)
            jsonTablaActual_asis = jsonTablaFiltradaAlumnos_asis;
        else
            jsonTablaActual_asis = jsonTablaAlumnos_asis;


        var i = 0;
        seleccion = "";

        for (var prop in jsonTablaActual_asis) {

            if (jsonTablaActual_asis[prop].Nombre.toLowerCase().indexOf(nombre.toLowerCase()) > -1) {
                cargaCuerpoTabla_asis(prop, i);
                i++;
            }
        }

        tabla += '</tbody></table>';
        $('#cargaTablaAsistencia').html(tabla);
    }

    function generaPorFiltros_asis() {


        arregloTablaFiltradaAlumnos = Array();

        tabla = ' <table class="table table-bordered"> ' +
                '<thead> <tr>       <th>Número</th>     <th>Nombre</th>   <th>Nivel</th>   <th>Grado</th>   <th>Asistencia</th>   </tr>  </thead>';

        tabla += '<tbody>';

        var i = 0;

        jsonTablaActual_asis = jsonTablaAlumnos_asis;

        for (var prop in jsonTablaActual_asis) {

            tabla += '<tr>';

            if (filtro1 != 0)
            {
                if (filtro2 != 0)
                {
                    if (filtro2 == jsonTablaActual_asis[prop].grado && filtro1 == jsonTablaActual_asis[prop].nivel)
                    {
                        arregloTablaFiltradaAlumnos.push(
                                {"idpersona": jsonTablaActual_asis[prop].idpersona, "Nombre": jsonTablaActual_asis[prop].Nombre, "nivel": jsonTablaActual_asis[prop].nivel,
                                    "grado": jsonTablaActual_asis[prop].grado, "Asistencia": jsonTablaActual_asis[prop].Asistencia, "pp": prop, "ps": i}
                        );
                        cargaCuerpoTabla_asis(prop, i);
                        i++;
                    }
                } else {
                    if (filtro1 == jsonTablaActual_asis[prop].nivel)
                    {
                        arregloTablaFiltradaAlumnos.push(
                                {"idpersona": jsonTablaActual_asis[prop].idpersona, "Nombre": jsonTablaActual_asis[prop].Nombre, "nivel": jsonTablaActual_asis[prop].nivel,
                                    "grado": jsonTablaActual_asis[prop].grado, "Asistencia": jsonTablaActual_asis[prop].Asistencia, "pp": prop, "ps": i}
                        );
                        cargaCuerpoTabla_asis(prop, i);
                        i++;
                    }
                }
            } else {
                arregloTablaFiltradaAlumnos.push(
                        {"idpersona": jsonTablaActual_asis[prop].idpersona, "Nombre": jsonTablaActual_asis[prop].Nombre, "nivel": jsonTablaActual_asis[prop].nivel,
                            "grado": jsonTablaActual_asis[prop].grado, "Asistencia": jsonTablaActual_asis[prop].Asistencia, "pp": prop, "ps": i}
                );
                cargaCuerpoTabla_asis(prop, i);
                i++;
            }
            tabla += '</tr>';
        }

        tabla += '</tbody></table>';

        $('#cargaTablaAsistencia').html(tabla);

        jsonTablaFiltradaAlumnos_asis = JSON.stringify(arregloTablaFiltradaAlumnos);
        jsonTablaFiltradaAlumnos_asis = JSON.parse(jsonTablaFiltradaAlumnos_asis);
    }
}
);
































//PARA LA PESTAÑA EDITAR ASISTENCIA
//PARA LA PESTAÑA EDITAR ASISTENCIA
//PARA LA PESTAÑA EDITAR ASISTENCIA
//PARA LA PESTAÑA EDITAR ASISTENCIA


$(document).ready(function () {

    var arregloTablaFiltradaAlumnos = Array();

    var jsonTablaFiltradaAlumnos_asis = null;
    var jsonTablaActual_asis = null;
    var jsonTablaAlumnos_asis = null;
    var jsonFechas_asis = null;

    var fechaElegida_asis = null;
    var idalumno = null;

    var filtro1 = 0;
    var filtro2 = 0;

    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////


//cbfechas_ediasis_ad
//txtNombresYapellidos_ediasis_ad
//cbnivel_ediasis_ad
//cbgrado_ediasis_ad
//
//div_to_GeneraTablaEditAsistencia




    $(document).on("mouseenter", "#div_asistencia_ad", function () {



        if (jsonFechas_asis == null || hasreload) {
            cargaCBgrado($("#cbnivel_ediasis_ad"), $('#cbgrado_ediasis_ad'));
            $.ajax({
                type: 'POST',
                url: 'administrador/ajax_carga_fechas_x_anio_confirmadas',
                cache: false,
                success: function (resultado) {
                    jsonFechas_asis = JSON.parse(resultado);
                    cargaComboFechas_asis();
                    restartHasReload();
                }
            });
        }
    });



    $(document).on("change", "#cbnivel_ediasis_ad", function ()
    {
        filtro1 = $(this).val();
        filtro2 = 0;
        cargaCBgrado($(this), $('#cbgrado_ediasis_ad'));
        generaPorFiltros_asis();
    });


    $(document).on("change", "#cbgrado_ediasis_ad", function ()
    {
        filtro2 = $(this).val();
        generaPorFiltros_asis();
    });


    $(document).on("keyup", "#txtNombresYapellidos_ediasis_ad", function ()
    {
        generaPorNombre_asis($(this).val());
    });

    //PARA VERIFICAR DESPUES

    $(document).on("focusout", "[id*='tareajustificacion_ediasis_']", function ()
    {

        var identificadores = $(this).attr("id").split('_');
        idalumno = identificadores[2];
        var propiedadS = identificadores[3];
        var propiedadP = null;
        var justificacion = $(this).val();

        if (jsonTablaFiltradaAlumnos_asis == null)
            propiedadP = propiedadS;
        else {
            propiedadP = jsonTablaFiltradaAlumnos_asis[propiedadS].pp;
            jsonTablaFiltradaAlumnos_asis[propiedadS].justificacion = $(this).val();
        }
        jsonTablaAlumnos_asis[propiedadP].justificacion = justificacion;

        iniciaAnimacionLocal($("#divstatus_ediasis_ad"));

        $.ajax({
            type: "POST",
            url: 'administrador/ajax_graba_justificacion_asistencia',
            cache: false,
            data: {idalumno: idalumno, justificacion: justificacion, fecha: fechaElegida_asis},
            success: function (result) {

                finalizaAnimacion(result);
            }
        });
    });//PARA VERIFICAR DESPUES



    $(document).on("change", "#cbfechas_ediasis_ad", function ()
    {
        var strFecha = $(this).val().split('-');
        date = strFecha[2] + '-' + strFecha[1] + '-' + strFecha[0];
        fechaElegida_asis = date;

        cargaCBnivelTotal();
        cargaCBgrado($('#cbnivel_asis'), $('#cbgrado_asis'));

        $('#div_to_GeneraTablaEditAsistencia').html("");

        cargaDatosPrevios_asis();
//        $.ajax({
//            type: "POST",
//            url: 'administrador/ajax_carga_alumnos_to_asist',
//            cache: false,
//            data: {fecha: fechaElegida_asis},
//            success: function (result) {
//                arregloTablaAlumnos = result;
////                alert(result);
//                jsonTablaAlumnos_asis = JSON.parse(arregloTablaAlumnos);
//                jsonTablaFiltradaAlumnos_asis = null;
//            }
//        });
    });





//
//PARA VERFICAR DESPUESSSSSSSSSSSSSSSSSSSSS
//
//    $(document).on("click", "#btnRestaurafechaElegida", function ()
//    {
//        iniciaAnimacionModal();
//        $.ajax({
//            type: "POST",
//            url: 'administrador/ajax_confirma_asistencia_para_fecha',
//            cache: false,
//            data: {fecha: fechaElegida_asis},
//            success: function (result) {
//                result = result.trim();
//                if (result == 'ok') {
//                    $("#btnConfirmarAsistencias").attr('disabled', true);
//                    recargandome();
//                }
//                finalizaAnimacion(result);
//            }
//        });
//    });






    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //              FUNCIONES DE AYUDAAAAAAAAAAAAA
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////


//cbfechas_ediasis_ad
//txtNombresYapellidos_ediasis_ad
//cbnivel_ediasis_ad
//cbgrado_ediasis_ad
//
//div_to_GeneraTablaEditAsistencia
    function cargaComboFechas_asis() {

        var d = new Date();
        if (d.getDate() < 10)
            dia = "0" + d.getDate();
        else
            dia = d.getDate();
        if (d.getMonth() < 9)
            mes = "0" + (d.getMonth() + 1);
        else
            mes = (d.getMonth() + 1);
        var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + dia;

        var encontrado = false;
        var strFecha = null;

        var idtaget = "cbfechas_ediasis_ad";

        $('#' + idtaget + '').html('');
        $('#' + idtaget + '').append('<option value="0">Selecciona fecha</option>');

        for (var prop in jsonFechas_asis) {

            strFecha = jsonFechas_asis[prop].fecha.split('-');
            date = strFecha[2] + '-' + strFecha[1] + '-' + strFecha[0];

            if (!encontrado && Date.parse(date) >= Date.parse(strDate)) {
                $('#' + idtaget + '').append('<option value="' + jsonFechas_asis[prop].fecha + '" selected="selected" >' + jsonFechas_asis[prop].fecha + '</option>');
                encontrado = true;
                fechaElegida_asis = date;
            } else {
                $('#' + idtaget + '').append('<option value="' + jsonFechas_asis[prop].fecha + '" >' + jsonFechas_asis[prop].fecha + '</option>');
            }
        }

        cargaDatosPrevios_asis();

        $("#txtNombresYapellidos_ediasis_ad").attr('disabled', false);
        $("#cbnivel_ediasis_ad").attr('disabled', false);
        $("#cbgrado_ediasis_ad").attr('disabled', false);

    }

    function cargaDatosPrevios_asis() {
        $.ajax({
            type: "POST",
            url: 'administrador/ajax_carga_alumnos_to_asist',
            cache: false,
            data: {fecha: fechaElegida_asis},
            success: function (arregloTablaAlumnos) {
                jsonTablaAlumnos_asis = JSON.parse(arregloTablaAlumnos);
                jsonTablaFiltradaAlumnos_asis = null;
            }
        });
    }


    function cargaCuerpoTabla_asis(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';
        tabla += '<td>' + jsonTablaActual_asis[prop].Nombre + ' </td>';
        tabla += '<td>' + jsonTablaActual_asis[prop].nivel + ' </td>';
        tabla += '<td>' + jsonTablaActual_asis[prop].grado + ' </td>';
        tabla += '<td>' + jsonTablaActual_asis[prop].Asistencia + ' </td>';
        tabla += '<td>';

        if (jsonTablaActual_asis[prop].Asistencia != 'A')
        {
            if (jsonTablaActual_asis[prop].justificacion == null) {
                tabla += '<textarea id="tareajustificacion_ediasis_' + jsonTablaActual_asis[prop].idpersona + '_' + i + '" ' + ' class="form-control" rows="1" ' +
                        '></textarea>';
            }
            else {
                tabla += '<textarea id="tareajustificacion_ediasis_' + jsonTablaActual_asis[prop].idpersona + '_' + i + '" ' + ' class="form-control" rows="1" ' +
                        '>' + jsonTablaActual_asis[prop].justificacion + '</textarea>';
            }
        }

        tabla += '</td>';
        tabla += '</tr>';

    }

    function generaPorNombre_asis(nombre) {

        tabla = ' <table class="table table-bordered"> ' +
                '<thead>         <tr>       <th>Numero</th>     <th>Nombres</th>   <th>Nivel</th>   <th>Grado</th>   <th>Asistencia</th>  <th>Justificación</th> </tr>  </thead>';

        tabla += '<tbody>';


        if (jsonTablaFiltradaAlumnos_asis !== null)
            jsonTablaActual_asis = jsonTablaFiltradaAlumnos_asis;
        else
            jsonTablaActual_asis = jsonTablaAlumnos_asis;


        var i = 0;
        seleccion = "";

        for (var prop in jsonTablaActual_asis) {

            if (jsonTablaActual_asis[prop].Nombre.toLowerCase().indexOf(nombre.toLowerCase()) > -1) {
                cargaCuerpoTabla_asis(prop, i);
                i++;
            }
        }

        tabla += '</tbody></table>';
        $('#div_to_GeneraTablaEditAsistencia').html(tabla);
    }

    function generaPorFiltros_asis() {


        arregloTablaFiltradaAlumnos = Array();

        tabla = ' <table class="table table-bordered"> ' +
                '<thead>         <tr>       <th>Numero</th>     <th>Nombres</th>   <th>Nivel</th>   <th>Grado</th>   <th>Asistencia</th>  <th>Justificación</th> </tr>  </thead>';

        tabla += '<tbody>';

        var i = 0;

        jsonTablaActual_asis = jsonTablaAlumnos_asis;

        for (var prop in jsonTablaActual_asis) {

            tabla += '<tr>';

            if (filtro1 != 0)
            {
                if (filtro2 != 0)
                {
                    if (filtro2 == jsonTablaActual_asis[prop].grado && filtro1 == jsonTablaActual_asis[prop].nivel)
                    {
                        arregloTablaFiltradaAlumnos.push(
                                {"idpersona": jsonTablaActual_asis[prop].idpersona, "Nombre": jsonTablaActual_asis[prop].Nombre, "nivel": jsonTablaActual_asis[prop].nivel,
                                    "grado": jsonTablaActual_asis[prop].grado, "Asistencia": jsonTablaActual_asis[prop].Asistencia, "justificacion": jsonTablaActual_asis[prop].justificacion,
                                    "pp": prop, "ps": i}
                        );
                        cargaCuerpoTabla_asis(prop, i);
                        i++;
                    }
                } else {
                    if (filtro1 == jsonTablaActual_asis[prop].nivel)
                    {
                        arregloTablaFiltradaAlumnos.push(
                                {"idpersona": jsonTablaActual_asis[prop].idpersona, "Nombre": jsonTablaActual_asis[prop].Nombre, "nivel": jsonTablaActual_asis[prop].nivel,
                                    "grado": jsonTablaActual_asis[prop].grado, "Asistencia": jsonTablaActual_asis[prop].Asistencia, "justificacion": jsonTablaActual_asis[prop].justificacion,
                                    "pp": prop, "ps": i}
                        );
                        cargaCuerpoTabla_asis(prop, i);
                        i++;
                    }
                }
            } else {
                arregloTablaFiltradaAlumnos.push(
                        {"idpersona": jsonTablaActual_asis[prop].idpersona, "Nombre": jsonTablaActual_asis[prop].Nombre, "nivel": jsonTablaActual_asis[prop].nivel,
                            "grado": jsonTablaActual_asis[prop].grado, "Asistencia": jsonTablaActual_asis[prop].Asistencia, "justificacion": jsonTablaActual_asis[prop].justificacion,
                            "pp": prop, "ps": i}
                );
                cargaCuerpoTabla_asis(prop, i);
                i++;
            }
            tabla += '</tr>';
        }

        tabla += '</tbody></table>';

        $('#div_to_GeneraTablaEditAsistencia').html(tabla);

        jsonTablaFiltradaAlumnos_asis = JSON.stringify(arregloTablaFiltradaAlumnos);
        jsonTablaFiltradaAlumnos_asis = JSON.parse(jsonTablaFiltradaAlumnos_asis);
    }
}
);


