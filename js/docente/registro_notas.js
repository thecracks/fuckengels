//////PESTAÑA SELECCIONAR CURSO
$(document).ready(function () {


    $(document).on("mouseenter", "#div_registronotas_ad", function () {

        if (hasreload) {
            iniciaAnimacionLocal($("#div_cargaTablaSeleccionarCurso"));
            $('#div_registronotas_ad *').attr('disabled', true);

            $.ajax({
                type: "POST",
                url: 'docente/ajax_carga_cursosasignados',
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (html) {
                    $("#div_registronotas_ad *").removeAttr("disabled");
                    $('#div_cargaTablaSeleccionarCurso').html(html);
                    restartHasReload();
                }
            });
        }
    });



    //CUANDO SE SELEECIONA UN CURSO 
    $(document).on("click", "[id^='idcurso_']", function ()
    {
        var idcurso = $(this).attr("id").split("_")[1];


        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'docente/ajax_carga_combobox_bimestre',
            data: {idcurso: idcurso},
            cache: false,
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (response) {
                if (response == 'ok')
                {
                    finalizaAnimacion(response);
                    activaDemaspestaña();
                }
            }
        });
    });

    $(document).on("click", "[id='btnimprimirtablanotas_rn_do']", function ()
    {
        imprimirSegmento('cargaTablaNotasBimestral');
    });


    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // FUNCIONES DE AYUDA
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    function activa1rapestaña() {

        $("[id*='tabre']").removeClass("active in");
        $("#tabseleccionacursoasignado_rn_do").addClass("active in");

        $("[id*='li_re']").removeClass("active");
        $("[id*='li_re']").addClass("deshabilitado");

        $("#li_seleccionacurso_rn_do").removeClass("deshabilitado");
        $("#li_seleccionacurso_rn_do").addClass("active");
    }

    function activaDemaspestaña() {
        $("#tabregistranotas_rn_do").addClass("active in");
        $("#tabseleccionacursoasignado_rn_do").removeClass("active in");

        $("[id*='li_re']").removeClass("deshabilitado");
        $("#li_seleccionacurso_rn_do").addClass("deshabilitado");

        $("#li_registranota_rn_do").addClass("active");
    }

});



































//////PESTAÑA REGISTRAR NOTA
$(document).ready(function () {

    var contadorControlarrays = 0;
    var ultimoValor = 0;
    var idanio = 0;
    var idbimestre = 0;

    var idcolumna = 0;

    var alumno = "";
    var idalumno = 0;

    var evaluacion = "";
    var idevaluacion = 0;

    var capacidad = "";
    var idcapacidad = 0;

    var totalCapacidad = 0;
    var totalBimestre = '';

    var sumaproductos = 0;
    var promedioCapacidad = 0;


    var arregloP = Array();
    var arregloT = Array();
    var arregloCC = Array();
    var arregloCB = Array();
    var seleccionado = false;


    //CUANDO SE SELEECIONA UN CURSO 
    $(document).on("click", "[id^='btnseleccionarotrocurso_rn_do']", function ()
    {
        activa1rapestaña();
        $("#cargaTablaNotasBimestral").html('');
        $("#cbbimestrecurso_rn_do").val(0);

    });




    //COMBO BIMESTRE
    $(document).on("change", "#cbbimestrecurso_rn_do", function ()
    {
        var idbimestre = $(this).val();
        iniciaAnimacionLocal($("#cargaTablaNotasBimestral"));

        deshabilitaCamposTabla();

        $.ajax({
            type: "POST",
            data: {bimestre: idbimestre},
            url: 'docente/ajax_carga_tabla_notaxbimestre',
            cache: false,
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                $('#cargaTablaNotasBimestral').html(html);
                cargaArrayPreviosControl();
            }
        });
    });


    $(document).on("click", "a[id*='/']", function ()
    {
//        alert("registro notas");
    });

    $(document).on("keyup", "[id*='E-']", function (tecla)
    {
        var _id = $(this).attr("id").split("_");

//        CEL-2_A-17_E-1_C-1_FIL-0

        if (tecla.keyCode >= 37 && tecla.keyCode <= 40) {

            var filaactual = _id[4].split('-')[1];
            var nuevafila = -1;
            if (tecla.keyCode == 37) {
//                alert("izquierda");
            } else if (tecla.keyCode == 38) {
                nuevafila = parseInt(filaactual) - 1;
            } else if (tecla.keyCode == 39) {
//                alert("derecha");
            } else if (tecla.keyCode == 40) {
                nuevafila = parseInt(filaactual) + 1;
            }

            $("input[id$='_FIL-" + nuevafila + "_'][id*='" + _id[0] + "']").focus();
            $("input[id$='_FIL-" + nuevafila + "_'][id*='" + _id[0] + "']").select();
//            //console.log($("input[id$='_FIL-" + nuevafila + "'][id*='" + _id[0] + "']"));
            return;
        }


        var valor = $(this).val();
        if (valor == '')
            valor = 0;
        verificaColoresNota(valor, $(this));

        alumno = _id[1].split("-");
        idalumno = alumno[1];

        evaluacion = _id[2].split("-");
        idevaluacion = evaluacion[1];

        capacidad = _id[3].split("-");
        idcapacidad = capacidad[1];

        totalCapacidad = arregloT['C-' + idcapacidad];
        totalBimestre = arregloT['PB'];

        //console.log(idalumno + ' ' + idevaluacion + ' ' + idcapacidad + ' ' + totalBimestre);

        sumaproductos = 0;

        for (i = 0; i < arregloCC[idcapacidad].length; i++) {
            idcolumna = arregloCC[idcapacidad][i];
            sumaproductos = parseFloat($("input[id*='CEL-" + idcolumna + "_A-" + idalumno + "_']").val() * arregloP[idcolumna]) + sumaproductos;
            
            //console.log($("input[id*='CEL-" + idcolumna + "_A-" + idalumno + "_']"));
            //console.log('valor celda:' + $("input[id*='CEL-" + idcolumna + "_A-" + idalumno + "_']").val() + ' arregloP: ' + arregloP[idcolumna] + ' idcolumna: ' + idcolumna);
            //console.log('suma productos dentro de for:' + sumaproductos);
        }

        promedioCapacidad = sumaproductos / totalCapacidad;

        $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "_']").html(promedioCapacidad.toFixed(0));


        if (promedioCapacidad < 10.5) {
            $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "_']").css("color", "red");

        } else {
            $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "_']").css("color", "blue");
        }

        sumaproductos = 0;
        for (i = 0; i < arregloCB.length; i++) {
            idcolumna = arregloCB[i];
            sumaproductos = parseFloat($("[id*='CEL-" + idcolumna + "_A-" + idalumno + "_']").html() * arregloP[idcolumna]) + sumaproductos;
        }

        promedioBimestral = sumaproductos / totalBimestre;
        $("[id*='A-" + idalumno + "_PB']").html(parseInt(promedioBimestral.toFixed(0)));


        if (promedioBimestral <= 10.5) {
            $("[id*='A-" + idalumno + "_PB']").css("color", "red");
        } else {
            $("[id*='A-" + idalumno + "_PB']").css("color", "blue");
        }

        //console.log(promedioCapacidad + ' ' + promedioBimestral);

    });


    //VALIDAR Q LLEGUE HASTA 20 Y QUE SEA NUEMERO;
    $(document).on("select", "input[id*='E-']", function ()
    {
        seleccionado = true;
        ultimoValor = $(this).val();
    });


    $(document).on("keypress", "input[id*='E-']", function (tecla)
    {
//        ultimoValor = $(this).val();

        valor = $(this).val() + (tecla.charCode - 48);

        if (seleccionado) {
            valor = (tecla.charCode - 48);
            seleccionado = false;
        } else {
            if (!verificaSoloNumeros($(this), 2, tecla)) {
                return false;
            }
        }
        return verificaColoresNota(valor, $(this));

    });

    $(document).on("click", "input[id*='E-']", function ()
    {
        ultimoValor = $(this).val();
        $(this).select();
    });


    $(document).on("focusout", "input[id*='E-']", function () {
        valorActual = $(this).val();

        var id = $(this).attr("id");

        nota = $(this).val();

        if (nota == '') {
            nota = 0;
            $(this).val(nota);
        }

        if (ultimoValor !== valorActual)
        {

//            var time = Math.round(Math.random()*100);


            setTimeout(function () {
                guardaNota(id);
            }, 30);

//            $.ajax({
//                type: "POST",
//                url: 'docente/ajax_actualiza_nota',
//                cache: false,
//                data: {idevaluacion: idevaluacion, idcompetencia: idcapacidad,
//                    idbimestre: idbimestre, idalumno: idalumno, idanio: idanio, nota: nota},
//                success: function (result) {
//                    if (result == "ok") {
//                        $("#" + id + "").addClass("saliobien");
//                    } else
//                    {
//                        $("#" + id + "").addClass("saliomal");
//                    }
//                }
//            });

        }
    });



//    
//    , function () {
//        // Hover out code
//        $(this).attr('title', $(this).data('tipText'));
//        $('.tooltip').remove();
//    }).on("mousemove", ".masterTooltip", function (e)
//    {
//        var mousex = e.pageX + 20; //Get X coordinates
//        var mousey = e.pageY + 10; //Get Y coordinates
//        $('.tooltip')
//                .css({top: mousey, left: mousex});
//    }



    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // FUNCIONES DE AYUDA
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    function guardaNota(id) {
        $("#" + id + "").removeClass("saliobien");
        $("#" + id + "").removeClass("saliomal");
        $.ajax({
            type: "POST",
            url: 'docente/ajax_actualiza_nota',
            cache: false,
            data: {idevaluacion: idevaluacion, idcompetencia: idcapacidad,
                idbimestre: idbimestre, idalumno: idalumno, idanio: idanio, nota: nota},
            error: function (jqXHR, textStatus, errorThrown) {
                $("#" + id + "").addClass("saliomal");
                //console.log("salio mal " + id);
//                alert("salio mal");
            },
            success: function (result) {
                if (result == "ok") {
                    $("#" + id + "").addClass("saliobien");
                    //console.log("salio bien " + id);

                } else
                {
                    $("#" + id + "").addClass("saliomal");
                    //console.log("salio mal " + id);

                }
            }
        });
    }

    function verificaColoresNota(valors, objeto) {

        valors = parseInt(valors);

        if (valors <= 10) {
            objeto.css("color", "red");

        } else if (valors <= 20) {

            objeto.css("color", "blue");
        } else if (valors > 20)
            return false;
        return true;

    }

    function cargaArrayPreviosControl()
    {
        cargaDatosControl("apesos");
        cargaDatosControl("atotales");
        cargaDatosControl("accapacidades");
        cargaDatosControl("acbimestre");
    }

    function cargaDatosControl(tipo) {
        $.ajax({
            type: "POST",
            url: 'docente/ajax_carga_datos_control',
            cache: false,
            data: {tipo: tipo},
            success: function (arrayx) {
                arrayx = JSON.parse(arrayx);
//                //console.log(tipo);


                if (tipo == "apesos") {
                    arregloP = arrayx;
                    //console.log('apesos');
                    //console.log(arrayx);
                } else if (tipo == "atotales") {
                    arregloT = arrayx;
                    //console.log('atotales');
                    //console.log(arrayx);
                } else if (tipo == "accapacidades") {
                    arregloCC = arrayx;
                    //console.log('accapacidades');
                    //console.log(arrayx);
                } else if (tipo == "acbimestre") {
                    arregloCB = arrayx;
                    //console.log('acbimestre');
                    //console.log(arrayx);
                }
                contadorControlarrays++;
                habilitaCamposTabla();
            }
        });
    }

    function deshabilitaCamposTabla() {
        contadorControlarrays = 0;
        $('#tablenotasxcursobim_rn_do *').attr('disabled', true);
    }
    function habilitaCamposTabla() {
        if (contadorControlarrays == 4)
            $('#tablenotasxcursobim_rn_do *').removeAttr('disabled');
    }


    function activa1rapestaña() {
//        $("#tabregistranotas_rn_do").removeClass("active in");
        $("[id*='tabre']").removeClass("active in");
        $("#tabseleccionacursoasignado_rn_do").addClass("active in");

        $("[id*='li_re']").removeClass("active");
        $("[id*='li_re']").addClass("deshabilitado");

        $("#li_seleccionacurso_rn_do").removeClass("deshabilitado");
        $("#li_seleccionacurso_rn_do").addClass("active");
    }
});
