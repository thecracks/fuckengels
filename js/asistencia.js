
$(document).ready(function () {

    var arregloTablaFiltradaAlumnos = Array();
    var arregloTablaAlumnos = Array();

    jsonTablaFiltradaAlumnos_asis = null;
    jsonTablaActual_asis = null;
    jsonTablaAlumnos_asis = null;
    jsonFechas_asis = null;

    fechaElegida_asis = null;
    idalumno_asis = null;
    idanio_asis = null;

    filtro1 = 0;
    filtro2 = 0;
    esreporte = false;

    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

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
        cargaComboGrado($(this).val());
        generaPorFiltros_asis();
        alert("por aca tambien");
    });


    $(document).on("change", "#cbnivel2_asis", function ()
    {
        filtro1 = $(this).val();
        filtro2 = 0;
//        alert("aca estamos cb2");
        cargaComboGrado($(this).val());
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
        var idalumno = identificadores[0];
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
                
                result=result.trim();
//                if(result.indexOf("ok")>-1){
////                    alert(result);
//                }
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

        alert('anio: ' + idanio_asis + " fecha: " + fechaElegida_asis + " nivel : " + filtro1 +
                " grado: " + filtro2 + " seccion: " + seccion + " tipo " + tipo + " mes: " + mes + " letra: " + letraseccion + " nombre mes " + nombremes);

        $("#frmReporteAsistencia_adm").submit();
    });


    $(document).on("change", "#cbfechas", function ()
    {
        //PARA CARGAR LA LISTA DE ALUMNOS
        strFecha = $(this).val().split('-');
        date = strFecha[2] + '-' + strFecha[1] + '-' + strFecha[0];
        fechaElegida_asis = date;
//        alert(idanio_asis + "'''" + fechaElegida_asis);
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
        $('#muestracbfechas').toggle(1);
        $('#muestracbmeses').toggle(1);
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
                result=result.trim();
                if (result == 'ok') {
                    $("#btnConfirmarAsistencias").attr('disabled', true);
                    recargandome();
                }
                finalizaAnimacion(result);
            }
        });
    });




    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //              FUNCIONES DE AYUDAAAAAAAAAAAAA
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////


    function cargaComboGrado(valor)
    {

        if (esreporte)
            idtaget = "cbgrado2_asis";
        else
            idtaget = "cbgrado_asis";


        $('#' + idtaget + '').html('');
        $('#' + idtaget + '').append('<option value="0" selected="selected">Todos los grados</option>');


        if (valor == "inicial") {
            $('#' + idtaget + '').append('<option value="1" >3 años</option>');
            $('#' + idtaget + '').append('<option value="2" >4 años</option>');
            $('#' + idtaget + '').append('<option value="3" >5 años</option>');

        } else
        {
            $('#' + idtaget + '').append('<option value="primero" >1er Grado</option>');
            $('#' + idtaget + '').append('<option value="segundo" >2do Grado</option>');
            $('#' + idtaget + '').append('<option value="tercero" >3er Grado</option>');
            $('#' + idtaget + '').append('<option value="cuarto" >4to Grado</option>');
            $('#' + idtaget + '').append('<option value="quinto" >5to Grado</option>');

            if (valor == "primaria") {
                $('#' + idtaget + '').append('<option value="sexto" >6to Grado</option>');
            }
        }
    }

    function cargaComboFechas_asis() {

        var d = new Date();
        if (d.getDate() < 10)
            dia = "0" + d.getDate();
        else
            dia = d.getDate();
        var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + dia;

        var encontrado = false;
        var strFecha = null;

        if (esreporte)
            idtaget = "cbfechas2";
        else
            idtaget = "cbfechas";

        $('#' + idtaget + '').html('');
        $('#' + idtaget + '').append('<option value="0">Seleccion fecha</option>');

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
//                alert(result);
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
        tabla += '<input type="radio" name="fila' + jsonTablaActual_asis[prop].idpersona + '_' + i + '" ' + seleccion + ' style="width:17px;height:17px" value="A">A</input>&nbsp;&nbsp;';

        if (jsonTablaActual_asis[prop].Asistencia == 'F')
            seleccion = 'checked="checked"';
        else
            seleccion = '';
        tabla += '<input type="radio" name="fila' + jsonTablaActual_asis[prop].idpersona + '_' + i + '"' + seleccion + ' style="width:17px;height:17px" value="F">F</input>&nbsp;&nbsp;';

        if (jsonTablaActual_asis[prop].Asistencia == 'T')
            seleccion = 'checked="checked"';
        else
            seleccion = '';
        tabla += '<input type="radio" name="fila' + jsonTablaActual_asis[prop].idpersona + '_' + i + '" ' + seleccion + ' style="width:17px;height:17px" value="T">T</input>';

        tabla += '</td>';
        tabla += '</tr>';

    }

    function generaPorNombre_asis(nombre) {

        tabla = ' <table class="table table-bordered"> ' +
                '<thead>         <tr>       <th>Numero</th>     <th>Nombres</th>   <th>Nivel</th>   <th>Grado</th>   <th>Asistencia</th>   </tr>  </thead>';

        tabla += '<tbody>';

//        alert('por aca');

        if (jsonTablaFiltradaAlumnos_asis !== null)
            jsonTablaActual_asis = jsonTablaFiltradaAlumnos_asis;
        else
            jsonTablaActual_asis = jsonTablaAlumnos_asis;

//        alert(jsonTablaActual_asis);

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
                '<thead> <tr>       <th>Numero</th>     <th>Nombres</th>   <th>Nivel</th>   <th>Grado</th>   <th>Asistencia</th>   </tr>  </thead>';

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

