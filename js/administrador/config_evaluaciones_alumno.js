$(document).ready(function () {

    var idarea = 0;
    var visible = 0;


    $(document).on("change", "#cbareaadministrador_cea_ad", function () {
        idarea = $(this).val();
        cargaTablaEvaluaciones();

    });

    $(document).on("change", "[id*='ckbevaluacionvisible_']", function () {
//        return false;

        iniciaAnimacionLocal($("#divstatus_visibilidadevaluacion_ad"));

        var idtotal = $(this).attr("id").split("_");
        var idcom = idtotal[1];
        var ideval = idtotal[2];

        if ($(this).is(":checked")) {
            visible = 1;
        } else {
            visible = 0;
        }
        $.ajax({
            type: "POST",
            url: 'administrador/actualiza_visibilidad_evaluacion',
            data: {idarea: idarea, idcompetencia: idcom, idevaluacion: ideval, valor: visible},
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            cache: false,
            success: function (result) {
                finalizaAnimacion(result);

                if ($(this).is(":checked")) {
                    $("#lbevaluacionvisible_" + idcom + "_" + ideval + "").html("visible");
                } else {
                    $("#lbevaluacionvisible_" + idcom + "_" + ideval + "").html("oculto");
                }
            }
        });

    });





    ////////////FUNCIONES DE AYUDA

    function cargaTablaEvaluaciones()
    {
        if (idarea != 0) {
            iniciaAnimacionLocal($('#cargaTablaEvaluaciones_cea_ad'));
            $.ajax({
                type: "POST",
                url: 'administrador/carga_tabla_evaluaciones_alumno',
                data: {idarea: idarea},
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                cache: false,
                success: function (tabla) {
                    $('#cargaTablaEvaluaciones_cea_ad').html(tabla);
                }
            });
        }
    }



});

