

$(document).ready(function () {


    var newvalor = -1;
    var oldvalor = -1;
    var idcursogrado = -1;

    var modoedicion = false;

    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //EVENTOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////


    $(document).on("click", "[id*='tdcg_']", function ()
    {
        if (!modoedicion) {
            var str = $(this).attr("id");
            var identificadores = str.split('_');
            idcursogrado = identificadores[1];

            oldvalor = $(this).html();
            $(this).html('<input type="number" class="form-control bfh-number taminputchico" value="' + oldvalor + '" id="txtcg_' + idcursogrado + '" />');
            $("[id*='txtcg_']").focus();
            modoedicion = true;
        }

    });

    $(document).on("focusout", "[id*='txtcg_']", function ()
    {
        modoedicion = false;
        var str = $(this).attr("id");
        var identificadores = str.split('_');
        var idcg = identificadores[1];

        newvalor = $(this).val();
        var objetoTD = $('#tdcg_' + idcg + '');

        objetoTD.html('');

        if (newvalor < 0) {
            alerta("", "El valor de las horas debe ser positivo");
            objetoTD.html(oldvalor);
            return;
        }

        if (oldvalor != newvalor) {


            iniciaAnimacionLocal($('#divVerificaAccion_ch_ad'));
            $.ajax({
                type: "POST",
                url: 'administrador/carga_horaria_acciones',
                cache: false,
                data: {tipoaccion: 'update', idcg: idcg, horas: newvalor},
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                    objetoTD.html(oldvalor);
                },
                success: function (result) {
                    if (result == 'ok') {
                        objetoTD.html(newvalor);
                    } else {

                    }
                    finalizaAnimacion(result);
                }
            });
        } else {
            objetoTD.html(oldvalor);
        }
    });

    $(document).on("keypress", "[id*='txtcg_']", function (tecla)
    {
        return verificaSoloNumeros($(this), 2, tecla);
    });



    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //              FUNCIONES DE AYUDAAAAAAAAAAAAA
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

});
