

$(document).ready(function () {

    var jsonTablaActual = null;
    var jsonlistaDocentes = null;

    var nivel = "";
    var grado = "";
    var idCDG = 0;
    var tabla = "";


    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

    $(document).on("mouseenter", "#div_asignacion_curso_docente", function () {

        if (jsonTablaActual == null || jsonlistaDocentes == null || hasreload) {

            cargaDatosACD();
            cargaListaDocentes();
            restartHasReload();
        }
    });


    $(document).on("change", "[id*='cbdocente_acd_']", function () {
        var iddocente = $(this).val();
        idCDG = $(this).attr("id").split("_")[2];

        iniciaAnimacionLocal($("#div_statusACD_ad"));

        $.ajax({
            type: "POST",
            url: 'administrador/operaciones_asignacioncd',
            cache: false,
            data: {tipo: 'actualizadocenteCDG', iddocente: iddocente, idCDG: idCDG},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (result) {
                finalizaAnimacion(result);
            }
        });


//        alert("cambio docente");
    });

    $(document).on("change", "#cbnivel_acd_ad", function () {
        nivel = $(this).val();
        cargaCBgrado($(this), $("#cbgrado_acd_ad"));
        cargaDatosACD();
    });
    $(document).on("change", "#cbgrado_acd_ad", function () {
        grado = $(this).val();
        cargaDatosACD();
    });





///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
//              FUNCIONES DE AYUDAAAAAAAAAAAAA
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////



    function cargaDatosACD() {
        iniciaAnimacionLocal($("#cargaTablaAsignacionCursoDocente"));
        $.ajax({
            type: "POST",
            url: 'administrador/operaciones_asignacioncd',
            cache: false,
            data: {tipo: 'listacdg', nivel: nivel, grado: grado},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (result) {
                jsonTablaActual = JSON.parse(result);
                generaTabla();
            }
        });
    }

    function cargaListaDocentes() {
        iniciaAnimacionLocal($("#cargaTablaAsignacionCursoDocente"));
        $.ajax({
            type: "POST",
            url: 'administrador/operaciones_asignacioncd',
            cache: false,
            data: {tipo: 'listadocentes'},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (result) {
                jsonlistaDocentes = JSON.parse(result);
                generaTabla();
            }
        });
    }

    function generaTabla() {

        if (jsonlistaDocentes != null && jsonTablaActual != null) {
            tabla = '<table class="table table-bordered table-hover"> ' +
                    '<thead><tr>  <th>Nº</th><th>Nivel</th><th>Grado</th><th>Sección</th><th>Área</th><th>Curso</th>' +
                    '<th>Docente</th></tr></thead>';

            tabla += '<tbody>';

            var i = 0;

            for (var prop in jsonTablaActual) {
                cargaCuerpoTabla(prop, i);
                i++;
            }

            tabla += '</tbody></table>';
            $('#cargaTablaAsignacionCursoDocente').html(tabla);
        }
    }


    function cargaCuerpoTabla(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';

        tabla += '<td>' + jsonTablaActual[prop].nivel + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].grado + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].seccion + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].area + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].curso + ' </td>';

        tabla += '<td>' + getcbdocentes(jsonTablaActual[prop].iddocente, jsonTablaActual[prop].idCursoDG) + '</td>';

        tabla += '</tr>';

    }

    function getcbdocentes(iddocente, idCDG)
    {
        var textselect = "";
        var cbDocente = "";
        cbDocente += '<select class="form-control" id="cbdocente_acd_' + idCDG + '_ad">';
        cbDocente += '<option value="0" >Seleccione docente ...</option>';
        for (var prop in jsonlistaDocentes) {
            if (jsonlistaDocentes[prop].iddocente == iddocente)
                textselect = "selected";
            else
                textselect = "";
            cbDocente += '<option value="' + jsonlistaDocentes[prop].iddocente + '" ' + textselect + '>' + jsonlistaDocentes[prop].nombredocente +
                    '/' + jsonlistaDocentes[prop].especialidad + '</option>';
        }
        cbDocente += '</select>';
        return cbDocente;
    }



});

