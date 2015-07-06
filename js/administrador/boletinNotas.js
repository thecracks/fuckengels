$(document).ready(function () {

    $(document).on("click", "#btnCargarBoletinNotaPDF", function ()
    {
        var filial = $("#idFilialBoletin").val();
        var nivel = $("#idNivelBoletin").val();
        var grado = $("#idGradoBoletin").val();
        var seccion = $("#idSeccionmBoletin").val();

        if (filial !== "" && nivel !== "" && grado !== "" && seccion !=="" ) {


            $.ajax({
                type: "POST",
                url: 'administrador/CargarBoletinNotas',
                data: {nivel: nivel, grado:grado, seccion: seccion},
                cache: false,
                success: function (html) {
                    $("#modal_agregar_PDF_boletin").modal('show');
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });
    
    
    $(document).on("click", "#aceptarPDFboletin", function ()
    {

        var file = $("#archivo")[0].files[0];
        var archivoTipo = file.type;
        var archivoNombre = file.name;

        alert("archivoTipo --> " + archivoTipo + " archivoNombre -->> " + archivoNombre );

        var data = new FormData();
        data.append("archivo", file);

        if (archivoNombre !== " " && archivoTipo !== " ") {
            $("#modal_agregar_PDF_boletin").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                contentType: false,
                //enctype: 'multipart/form-data',
                url: 'administrador/guardarPDFboletin',
                cache: false,
                data: data,
                processData: false,
                success: function (html) {
                    finalizaAnimacion("ok");
                    recargandome();
                }
            });
        }

    });
    
    
    $(document).on("change", "#idNivelBoletinE", function ()
    {
        if ($(this).val() !== " ") {
            $('#btnMostrarSPDF').attr("disabled", false);
        }
        else {
            $('#btnMostrarSPDF').attr("disabled", true);
        }
    });



    $(document).on("click", "#btnMostrarSPDF", function ()
    {
        var nivel = $("#idNivelBoletinE").val();
        var grado = $("#idGradoBoletinE").val();
        var seccion = $("#idSeccionmBoletinE").val();

        if (nivel !== "" && grado !== "" && seccion !== "") {
            iniciaAnimacionLocal($('#divPreviewPDF'));
            $.ajax({
                type: "POST",
                url: 'administrador/CargarBoletinNotasSPDF',
                data: {nivel: nivel, grado: grado, seccion: seccion},
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (result) {
                    $('#divPreviewPDF').html(result);
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });
    
    $(document).on("click", "[id*='eliminarBoletin_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminarBoletin", "");
        var idA = res.split('_');
        idarea = idA[0];
        var prop = idA[1];
        var prop1 = idA[2];
        
        alert("--> " + prop + "---> " + prop1);
        
        
        $("#txtNombreBoletin_ad").html(prop1);
        $("#txtIDBoletin_ad").val(prop);

        $("#modalEliminarBoletin").modal('show');


    });
    
    
    $(document).on("click", "#eliminarBoletinSI", function ()
    {
        var boletin = $("#txtIDBoletin_ad").val();

        $("#modalEliminarBoletin").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarBoletin',
            cache: false,
            data: {boletin: boletin},            
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });

    ////////////////////////////////////////////////////////
    //EFECTIVIDAD ACADEMICA
    ////////////////////////////////////////////////////////

    
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //             PARA REPORTE BIMESTRE PUSTO    23-04-15
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

    $(document).on("change", "#cbnivel_reportebimestre_bp", function ()
    {
        if ($(this).val() !== " ") {
            $('#btnMostrarReportePuestos').attr("disabled", false);
        }
        else {
            $('#btnMostrarReportePuestos').attr("disabled", true);
        }
    });




    $(document).on("click", "#btnMostrarReportePuestos", function ()
    {
        var nivel = $("#cbnivel_reportebimestre_bp").val();
        var grado = $("#cbgrado_reportebimestre_bp").val();
        var seccion = $("#cbseccion_reportebimestre_bp").val();
        var bimestre = $("#cbbimestre_reportebimestre_bp").val();

        if (nivel !== "" && grado !== "" && seccion !== "" && bimestre !== "") {
            iniciaAnimacionLocal($('#divPreviewReporteBimestreNotasPuesto'));
            $.ajax({
                type: "POST",
                url: 'administrador/CargarNotasBimestrePuesto',
                data: {nivel: nivel, grado: grado, seccion: seccion, bimestre: bimestre},
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (result) {
                    $('#divPreviewReporteBimestreNotasPuesto').html(result);
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });







    $(document).on("change", "#cbnivel_comportamiento", function ()
    {
        if ($(this).val() !== " ") {
            $('#btnMostrarAlumnosComportamiento').attr("disabled", false);
        }
        else {
            $('#btnMostrarAlumnosComportamiento').attr("disabled", true);
        }
    });


    $(document).on("click", "#btnMostrarAlumnosComportamiento", function ()
    {
        var nivel = $("#cbnivel_comportamiento").val();
        var grado = $("#cbgrado_comportamiento").val();
        var seccion = $("#cbseccion_comportamiento").val();
        var bimestre = $("#cbbimestre_comportamiento").val();

        if (nivel !== "" && grado !== "" && seccion !== "" && bimestre !== "") {
            iniciaAnimacionLocal($('#divPreviewReporteBimestreComportamientoo'));
            $.ajax({
                type: "POST",
                url: 'administrador/CargarAlumnoComportamiento',
                data: {nivel: nivel, grado: grado, seccion: seccion, bimestre: bimestre},
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (result) {
                    $('#divPreviewReporteBimestreComportamiento').html(result);
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });

    //$(document).on("click", "[id*='editar_']", function ()
    $(document).on("focusout", "[id*='col_']", function ()
    {
        
        var str = $(this).attr("id");
        
        var com = $(this).val();
        
        var res = str.replace("col", "");
        var idA = res.split('_');
        idarea = idA[0];
        var bimestre = idA[1];
        var codMatricula = idA[2];
        
        
        if (com >= 'A' && com <= 'C'){
            
                        
            $.ajax({
                type: "POST",
                
                url: 'administrador/GuardarAlumnoComportamiento',
                data: {bimestre: bimestre, codMatricula: codMatricula, comportamiento: com},
                cache: false,
                success: function (result) {
                    //$('#divPreviewReporteBimestreComportamiento').html(result);
                }
            });
        }
    });

});