$(document).ready(function () {

    var idarea = 0;
    var idbimestre = 0;

    $(document).on("change", "#cbareaalumno_se_al", function () {
        idarea = $(this).val();
        cargaTablaEvaluaciones();

    });

    $(document).on("change", "#cbbimestrearea_se_al", function () {

        idbimestre = $(this).val();
        cargaTablaEvaluaciones();

    });


    ////////////FUNCIONES DE AYUDA

    function cargaTablaEvaluaciones()
    {
        if (idbimestre != 0 && idarea != 0) {
            iniciaAnimacionLocal($('#cargaTablaEvaluaciones_se_al'));
            $.ajax({
                type: "POST",
                url: 'alumno/cargatablanotas',
                data: {idarea: idarea, idbimestre: idbimestre},
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                cache: false,
                success: function (tabla) {
                    $('#cargaTablaEvaluaciones_se_al').html(tabla);
                }
            });
        }

    }

});

