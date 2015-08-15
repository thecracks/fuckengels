//////PESTAÑA SELECCIONAR CURSO
$(document).ready(function () {

    var idcurso = 0;


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

//        iniciaAnimacionModal();
//
//        $.ajax({
//            type: "POST",
//            url: 'administrador/ajax_carga_notasbimestre',
//            data: {idcurso: idcurso},
//            cache: false,
//            error: function (jqXHR, textStatus, errorThrown) {
//                finalizaAnimacion(textStatus);
//            },
//            success: function (html) {
//                finalizaAnimacion("ok");
//                $('#cargatablacursosasignados_sid_ad').html(html);
//                activa1rapestaña(3);
//            }
//        });
    });

    $(document).on("change", "#cbbimestrecurso_sid_ad", function ()
    {
        var idbimestre = $(this).val();
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



    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // FUNCIONES DE AYUDA
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

});
































//
//
//
////////PESTAÑA REGISTRAR NOTA
//$(document).ready(function () {
//
//    var contadorControlarrays = 0;
//    var ultimoValor = 0;
//    var idanio = 0;
//    var idbimestre = 0;
//
//    var idcolumna = 0;
//
//    var alumno = "";
//    var idalumno = 0;
//
//    var evaluacion = "";
//    var idevaluacion = 0;
//
//    var capacidad = "";
//    var idcapacidad = 0;
//
//    var totalCapacidad = 0;
//    var totalBimestre = '';
//
//    var sumaproductos = 0;
//    var promedioCapacidad = 0;
//
//
//    var arregloP = Array();
//    var arregloT = Array();
//    var arregloCC = Array();
//    var arregloCB = Array();
//    var seleccionado = false;
//
//
//    //CUANDO SE SELEECIONA UN CURSO 
//    $(document).on("click", "[id^='btnseleccionarotrocurso_rn_do']", function ()
//    {
//        activa1rapestaña();
//        $("#cargaTablaNotasBimestral").html('');
//        $("#cbbimestrecurso_rn_do").val(0);
//
//    });
//
//
//
//
//    //COMBO BIMESTRE
//    $(document).on("change", "#cbbimestrecurso_rn_do", function ()
//    {
//        var idbimestre = $(this).val();
//        iniciaAnimacionLocal($("#cargaTablaNotasBimestral"));
//
//        deshabilitaCamposTabla();
//
//        $.ajax({
//            type: "POST",
//            data: {bimestre: idbimestre},
//            url: 'docente/ajax_carga_tabla_notaxbimestre',
//            cache: false,
//            error: function (jqXHR, textStatus, errorThrown) {
//                finalizaAnimacion(textStatus);
//            },
//            success: function (html) {
//                $('#cargaTablaNotasBimestral').html(html);
//                cargaArrayPreviosControl();
//            }
//        });
//    });
//
//
//    $(document).on("click", "a[id*='/']", function ()
//    {
////        alert("registro notas");
//    });
//
//    $(document).on("keyup", "[id*='E-']", function (tecla)
//    {
//        var _id = $(this).attr("id").split("_");
//
////        CEL-2_A-17_E-1_C-1_FIL-0
//
//        if (tecla.keyCode >= 37 && tecla.keyCode <= 40) {
//
//            var filaactual = _id[4].split('-')[1];
//            var nuevafila = -1;
//            if (tecla.keyCode == 37) {
////                alert("izquierda");
//            } else if (tecla.keyCode == 38) {
//                nuevafila = parseInt(filaactual) - 1;
//            } else if (tecla.keyCode == 39) {
////                alert("derecha");
//            } else if (tecla.keyCode == 40) {
//                nuevafila = parseInt(filaactual) + 1;
//            }
//
//            $("input[id$='_FIL-" + nuevafila + "'][id*='" + _id[0] + "']").focus();
//            $("input[id$='_FIL-" + nuevafila + "'][id*='" + _id[0] + "']").select();
//            console.log($("input[id$='_FIL-" + nuevafila + "'][id*='" + _id[0] + "']"));
//            return;
//        }
//
//
//        var valor = $(this).val();
//        verificaColoresNota(valor, $(this));
//
//        alumno = _id[1].split("-");
//        idalumno = alumno[1];
//
//        evaluacion = _id[2].split("-");
//        idevaluacion = evaluacion[1];
//
//        capacidad = _id[3].split("-");
//        idcapacidad = capacidad[1];
//
//        totalCapacidad = arregloT['C-' + idcapacidad];
//        totalBimestre = arregloT['PB'];
//
//        sumaproductos = 0;
//
//        for (i = 0; i < arregloCC[idcapacidad].length; i++) {
//            idcolumna = arregloCC[idcapacidad][i];
//            sumaproductos = parseFloat($("input[id*='CEL-" + idcolumna + "_A-" + idalumno + "']").val() * arregloP[idcolumna]) + sumaproductos;
//        }
//
//        promedioCapacidad = sumaproductos / totalCapacidad;
//
//        $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "']").html(promedioCapacidad.toFixed(0));
//
//
//        if (promedioCapacidad < 10.5) {
//            $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "']").css("color", "red");
//
//        } else {
//            $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "']").css("color", "blue");
//        }
//
//        sumaproductos = 0;
//        for (i = 0; i < arregloCB.length; i++) {
//            idcolumna = arregloCB[i];
//            sumaproductos = parseFloat($("[id*='CEL-" + idcolumna + "_A-" + idalumno + "']").html() * arregloP[idcolumna]) + sumaproductos;
//        }
//
//        promedioBimestral = sumaproductos / totalBimestre;
//        $("[id*='A-" + idalumno + "_PB']").html(parseInt(promedioBimestral.toFixed(0)));
//
//
//        if (promedioBimestral <= 10) {
//            $("[id*='A-" + idalumno + "_PB']").css("color", "red");
//        } else {
//            $("[id*='A-" + idalumno + "_PB']").css("color", "blue");
//        }
//
//    });
//
//
//    //VALIDAR Q LLEGUE HASTA 20 Y QUE SEA NUEMERO;
//    $(document).on("select", "input[id*='E-']", function ()
//    {
//        seleccionado = true;
//        ultimoValor = $(this).val();
//    });
//
//
//    $(document).on("keypress", "input[id*='E-']", function (tecla)
//    {
//        ultimoValor = $(this).val();
//
//        valor = $(this).val() + (tecla.charCode - 48);
//
//        if (seleccionado) {
//            valor = (tecla.charCode - 48);
//            seleccionado = false;
//        } else {
//            if (!verificaSoloNumeros($(this), 2, tecla)) {
//                return false;
//            }
//        }
//        return verificaColoresNota(valor, $(this));
//
//    });
//
//    $(document).on("click", "input[id*='E-']", function ()
//    {
//        ultimoValor = $(this).val();
//        $(this).select();
//    });
//
//
//    $(document).on("focusout", "input[id*='E-']", function () {
//        valorActual = $(this).val();
//
//        var id = $(this).attr("id");
//
//        nota = $(this).val();
//
//        if (nota == '') {
//            nota = 0;
//            $(this).val(nota);
//        }
//
//        if (ultimoValor !== valorActual)
//        {
//            $(this).removeClass("saliobien", "saliomal");
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
//
//        }
//    });
//
//
//
////    
////    , function () {
////        // Hover out code
////        $(this).attr('title', $(this).data('tipText'));
////        $('.tooltip').remove();
////    }).on("mousemove", ".masterTooltip", function (e)
////    {
////        var mousex = e.pageX + 20; //Get X coordinates
////        var mousey = e.pageY + 10; //Get Y coordinates
////        $('.tooltip')
////                .css({top: mousey, left: mousex});
////    }
//
//
//
//    ////////////////////////////////////////////////////////////////////////////
//    ////////////////////////////////////////////////////////////////////////////
//    // FUNCIONES DE AYUDA
//    ////////////////////////////////////////////////////////////////////////////
//    ////////////////////////////////////////////////////////////////////////////
//
//    function verificaColoresNota(valors, objeto) {
//
//        valors = parseInt(valors);
//
//        if (valors <= 10) {
//            objeto.css("color", "red");
//
//        } else if (valors <= 20) {
//
//            objeto.css("color", "blue");
//        } else if (valors > 20)
//            return false;
//        return true;
//
//    }
//
//    function cargaArrayPreviosControl()
//    {
//        cargaDatosControl("apesos");
//        cargaDatosControl("atotales");
//        cargaDatosControl("accapacidades");
//        cargaDatosControl("acbimestre");
//    }
//
//    function cargaDatosControl(tipo) {
//        $.ajax({
//            type: "POST",
//            url: 'docente/ajax_carga_datos_control',
//            cache: false,
//            data: {tipo: tipo},
//            success: function (arrayx) {
//                arrayx = JSON.parse(arrayx);
////                console.log(tipo);
////                console.log(arrayx);
//                if (tipo == "apesos") {
//                    arregloP = arrayx;
//                } else if (tipo == "atotales") {
//                    arregloT = arrayx;
//                } else if (tipo == "accapacidades") {
//                    arregloCC = arrayx;
//                } else if (tipo == "acbimestre") {
//                    arregloCB = arrayx;
//                }
//                contadorControlarrays++;
//                habilitaCamposTabla();
//            }
//        });
//    }
//
//    function deshabilitaCamposTabla() {
//        contadorControlarrays = 0;
//        $('#tablenotasxcursobim_rn_do *').attr('disabled', true);
//    }
//    function habilitaCamposTabla() {
//        if (contadorControlarrays == 4)
//            $('#tablenotasxcursobim_rn_do *').removeAttr('disabled');
//    }
//
//
////    function activa1rapestaña() {
//////        $("#tabregistranotas_rn_do").removeClass("active in");
////        $("[id*='tabre']").removeClass("active in");
////        $("#tabseleccionacursoasignado_rn_do").addClass("active in");
////
////        $("[id*='li_re']").removeClass("active");
////        $("[id*='li_re']").addClass("deshabilitado");
////
////        $("#li_seleccionacurso_rn_do").removeClass("deshabilitado");
////        $("#li_seleccionacurso_rn_do").addClass("active");
////    }
//
//
//    function activapestaña(n) {
//
//        var preidli = 'li_sid_ad_';
//        var preidtab = 'tab_sid_ad_';
//
//        $("[id^='" + preidtab + "']").removeClass("active in");
//        $("#" + preidtab + n + "").addClass("active in");
//
//        $("[id^='" + preidli + "']").removeClass("active deshabilitado");
//        $("#" + preidli + n + "").addClass("active");
//    }
//
//    function desabilitapestaña(n) {
//
//        var preidli = 'li_sid_ad_';
//        var preidtab = 'tab_sid_ad_';
//
//        if (n == 0) {
//            $("[id^='" + preidli + "']").addClass("deshabilitado");
//        } else
//        {
//            $("#" + preidli + n + "").addClass("deshabilitado");
//        }
//    }
//});
