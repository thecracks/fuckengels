//////PESTAÑA SELECC
//IONAR CURSO
$(document).ready(function () {

    var idcurso = 0;
    var idbimestre = 0;


    $(document).on("mouseenter", "#div_seguimiento_ingresonotasdocente_ad", function () {

        if (hasreload) {
            iniciaAnimacionLocal($("#div_cargaTablalistadocentes"));
            setids_li_tab('li_sid_ad_', 'tab_sid_ad_');
            desabilitapestaña(0);
            activapestaña(1);

            $.ajax({
                type: "POST",
                url: 'administrador/ajax_carga_listadocentes',
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (html) {
                    $('#div_cargaTablalistadocentes').html(html);
                    restartHasReload();
                }
            });
        }
    });



    //CUANDO SE SELEECIONA UN docente 
    $(document).on("click", "a[id^='iddocente_']", function ()
    {
        var iddocente = $(this).attr("id").split("_")[1];
        var docente = $(this).attr("id").split("_")[2];

        $('#lbnombredocente_sid_ad').html('Cursos del docente: ' + docente);

        iniciaAnimacionLocal($('#cargatablacursosasignados_sid_ad'));

        $.ajax({
            type: "POST",
            url: 'administrador/ajax_carga_listacursosasignados',
            data: {iddocente: iddocente},
            cache: false,
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                finalizaAnimacion('ok');
                $('#cargatablacursosasignados_sid_ad').html(html);
                activapestaña(2);
            }
        });
    });



    //CUANDO SE SELEECIONA UN CURSSOOOO 
    $(document).on("click", "a[id^='idcursoasignadoad_']", function ()
    {
        idcurso = $(this).attr("id").split("_")[1];
        activapestaña(3);

    });

    $(document).on("change", "#cbbimestrecurso_sid_ad", function ()
    {
        idbimestre = $(this).val();
        iniciaAnimacionLocal($("#cargaTablaNotasBimestral_ad"));

        $.ajax({
            type: "POST",
            data: {bimestre: idbimestre, idcurso: idcurso},
            url: 'administrador/ajax_carga_notasbimestre',
            cache: false,
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                $('#cargaTablaNotasBimestral_ad').html(html);
                cargaArrayPreviosControl();
            }
        });

    });


    $(document).on("click", "#btn_generaexcelnotasxcursoxbimestre", function ()
    {
        $("#input_idcurso_sid").val(idcurso);
        $("#input_idbimestre_sid").val(idbimestre);
        if (idbimestre != 0 && idcurso != 0)
            $("#frmReporte_Notas_excel_sid").submit();

    });





    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // FUNCIONES DE AYUDA
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

});



