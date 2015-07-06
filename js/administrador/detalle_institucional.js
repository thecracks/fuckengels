

$(document).ready(function () {

    var jsonTablaActual = null;

    var idfilial = 0;
    var nivel = "";
    var grado = "";
    var seccion = 0;
    var iddi = 0;


    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////



    $(document).on("change", "#cbfilial_di_ad", function () {
        idfilial = $(this).val();
        cargaDatosPrevios();
    });

    $(document).on("change", "#cbnivel_di_ad", function () {
        nivel = $(this).val();
        grado = 0;
        cargaCBgrado($(this), $("#cbgrado_di_ad"));
    });
    $(document).on("change", "#cbgrado_di_ad", function () {
        grado = $(this).val();
    });

    $(document).on("focusout", "#txtNsecciones_di_ad", function ()
    {
        seccion = $(this).val();
    });
    $(document).on("keypress", "#txtNsecciones_di_ad", function (tecla)
    {
        verificaSoloNumeros($(this), 2, tecla);
    });

    $(document).on("click", "[id*='btnEditardi_']", function ()
    {
        var str = $(this).attr("id");
        var identificadores = str.split('_');
        iddi = identificadores[1];
        var prop = identificadores[2];

        $('#txtnombres').val(jsonTablaActual[prop].Nombre);
        $('#txtnombres').attr("disabled", true);
        $('#modal_matricularAlumno_ad').modal('show');

    });

    $(document).on("click", "[id*='btnEliminadi_']", function ()
    {
        var str = $(this).attr("id");
        var identificadores = str.split('_');
        iddi = identificadores[1];

        $('#modalEliminardi_ad').modal('show');
    });


    $(document).on("click", "#btnConfirmarEliminardi_ad", function ()
    {
        $('#modalEliminardi_ad').modal('hide');
        iniciaAnimacionLocal($("#div_estadoacciondi_ad"));
        $.ajax({
            type: "POST",
            url: 'administrador/configurcion_filial_acciones',
            cache: false,
            data: {tipoaccion: 'delete', iddi: iddi},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (result) {
                finalizaAnimacion(result);
                if (result == 'ok')
                    cargaDatosPrevios();
            }
        });
    });


    $(document).on("click", "#btnagregardi_di_ad", function ()
    {
        if (idfilial == 0 || nivel == 0 || grado == 0 || seccion == 0) {
            alerta("", "Todos los campos son obligatiorios");
            return 0;
        } else if (seccion < 1 || seccion > 10) {
            alerta("", "El numero de secciones debe estar comprendido entre 1 y 10");
            return 0;
        }
        else {

            iniciaAnimacionLocal($("#div_estadoacciondi_ad"));
            $.ajax({
                type: "POST",
                url: 'administrador/configurcion_filial_acciones',
                cache: false,
                data: {tipoaccion: 'insert', idfilial: idfilial, nivel: nivel, grado: grado, nsecciones: seccion},
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (result) {
                    finalizaAnimacion(result);
                    if (result == 'ok')
                        cargaDatosPrevios();

                }
            });
        }
    });


    $(document).on("click", "#btnlistarDI_di_ad", function ()
    {
        cargaDatosPrevios();
    });



///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
//              FUNCIONES DE AYUDAAAAAAAAAAAAA
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////



    function cargaDatosPrevios() {
        iniciaAnimacionLocal($("#cargaTablaDetalleInstitucional"));
        $.ajax({
            type: "POST",
            url: 'administrador/configurcion_filial_acciones',
            cache: false,
            data: {tipoaccion: 'select', idfilial: idfilial},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (result) {
                jsonTablaActual = JSON.parse(result);
                generaTabla();
            }
        });
    }

    function generaTabla() {

        tabla = '<table class="table table-bordered table-hover"> ' +
                '<thead><tr>  <th>Numero</th><th>Año</th><th>Filial</th><th>Nivel</th><th>Grado</th><th>Nro. Secciones</th>' +
                '<th>Modificar</th><th>Eliminar</th></tr></thead>';

        tabla += '<tbody>';

        var i = 0;
        seleccion = "";

        for (var prop in jsonTablaActual) {
            cargaCuerpoTabla(prop, i);
            i++;
        }

        tabla += '</tbody></table>';
        $('#cargaTablaDetalleInstitucional').html(tabla);
    }


    function cargaCuerpoTabla(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].idAnio + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].Distrito + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].nivel + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].grado + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].numerosecciones + ' </td>';

        tabla += '<td><button id="btnEditardi_' + jsonTablaActual[prop].idDI + '_' + i + '" class="btn btn-success btn-block" '
                + '   value="Matricular">Modificar</button></td>';

        tabla += '<td><button id="btnEliminadi_' + jsonTablaActual[prop].idDI + '_' + i + '" class="btn btn-success btn-block" '
                + '   value="Matricular">Eliminar</button></td>';

        tabla += '</tr>';

    }
});

