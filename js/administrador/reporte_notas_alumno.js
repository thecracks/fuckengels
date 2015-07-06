//////PESTAÑA SELECCIONAR ALUMNO
$(document).ready(function () {


    var jsonTablaActual = null;
    var nombre = "";
    var nivel = "";
    var grado = "";
    var idseccion = 0;
    var seccion = "";
    var likenombre = "";

    var tabla = "";


    $(document).on("change", "#div_registronotas_ad", function () {

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

    $(document).on("keyup", "#txtNombresYapellidos_rna_ad", function ()
    {
        likenombre = $(this).val();
        generaTabla();
    });



    $(document).on("change", "#cbnivel_rna_ad", function () {
        nivel = $(this).val();
        cargaCBgrado($(this), $("#cbgrado_rna_ad"));
        cargadatosAlumnos();
    });
    $(document).on("change", "#cbgrado_rna_ad", function () {
        grado = $(this).val();
        console.log("holas");
        cargaCBSeccion($("#cbseccion_rna_ad"), nivel, grado);
        console.log("termino");
        cargadatosAlumnos();
    });
    $(document).on("change", "#cbseccion_rna_ad", function () {
        idseccion = $(this).val();
        cargadatosAlumnos();
    });






    //CUANDO SE SELEECIONA UN ALUMNO
    $(document).on("click", "[id^='idalumno_']", function ()
    {
        var codmatricula = $(this).attr("id").split("_")[1];
        nombre = $(this).attr("id").split("_")[2];
        nivel = $(this).attr("id").split("_")[3];
        grado = $(this).attr("id").split("_")[4];
        seccion = $(this).attr("id").split("_")[5];

//        alert(codmatricula);

//        alert("holas");

//        $("#frGeneraReporteBimestral").submit();

        $("#frGeneraReporteBimestralll").submit();

//        iniciaAnimacionModal();
//        $.ajax({
//            type: "POST",
//            url: 'administrador/ajax_setcodmatricula',
//            data: {codmatricula: codmatricula, nombre: nombre, nivel: nivel, grado: grado, seccion: seccion},
//            cache: false,
//            error: function (jqXHR, textStatus, errorThrown) {
//                finalizaAnimacion(textStatus);
//            },
//            success: function (response) {
//                alert("llego");
////                if (response == 'ok')
////                {
//                finalizaAnimacion(response);
//                activaDemaspestaña();
////                    $('#ifreportebimestra_rna_ad').each(function () {
////                        this.contentWindow.location.reload(true);
////                    });
////                    $("#frGeneraReporteBimestralll").submit();
////                }
//            }
//        });
    });

    $(document).on("click", "[id='btnimprime_reportebimestral']", function ()
    {
        alert("kfasdl");
        imprimirSegmento('divimprimir_reportebimestralalumno');
    });


    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    //              FUNCIONES DE AYUDAAAAAAAAAAAAA
    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////

    function cargadatosAlumnos() {
        iniciaAnimacionLocal($("#cargaTablaListaAlumnos_rna_ad"));
        $.ajax({
            type: "POST",
            url: 'administrador/cargalistaalumnos',
            cache: false,
            data: {nivel: nivel, grado: grado, idseccion: idseccion},
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
                '<thead><tr> <th>Nº</th> <th>Seleccionar</th><th>Alumno</th><th>Nivel</th><th>Grado</th><th>Sección</th>' +
                '</tr></thead>';

        tabla += '<tbody>';

        var i = 0;

        console.log("GENERANDO NUEVA TABLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");

        for (var prop in jsonTablaActual) {

            if (jsonTablaActual[prop].nombre.toLowerCase().indexOf(likenombre.toLowerCase()) > -1) {
                cargaCuerpoTabla(prop, i);
                i++;
            }
        }

        tabla += '</tbody></table>';
        $('#cargaTablaListaAlumnos_rna_ad').html(tabla);
    }

    function cargaCuerpoTabla(prop, i) {


        console.log(jsonTablaActual[prop]);
        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';
        tabla += ' <th><a style=cursor:pointer; id="idalumno_' + jsonTablaActual[prop].codigoMatricula + '_' + jsonTablaActual[prop].nombre + '_' +
                jsonTablaActual[prop].nivel + '_' + jsonTablaActual[prop].grado + '_' + jsonTablaActual[prop].seccion + '">Seleccionar</a></th>';
        tabla += '<td>' + jsonTablaActual[prop].nombre + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].nivel + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].grado + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].seccion + ' </td>';

        tabla += '</tr>';
    }

    function activaDemaspestaña() {

        $("[id*='lk_verreporte']").removeClass("deshabilitado");
        $("#lk_seleccionaralumno").addClass("deshabilitado");

        $("#lk_verreportenotasbimestral").addClass("active");

        $("#tab_seleccionaralumno").removeClass("active in");
        $("#tab_verreportenotasbimestral").addClass("active in");

    }
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
//    var idcolumna = 0;
//
//    var alumno = "";
//    var idalumno = 0;
//    var evaluacion = "";
//    var idevaluacion = 0;
//
//    var capacidad = "";
//    var idcapacidad = 0;
//    var totalCapacidad = 0;
//    var totalBimestre = '';
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
//        //        CEL-2_A-17_E-1_C-1_FIL-0
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
//        if (ultimoValor !== valorActual)
//        {
//            $(this).removeClass("saliobien", "saliomal");
//            $.ajax({
//                type: "POST",
//                url: 'docente/ajax_actualiza_nota', cache: false,
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
//    //        var mousex = e.pageX + 20; //Get X coordinates
////        var mousey = e.pageY + 10; //Get Y coordinates
//    //        $('.tooltip')
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
//                //                console.log(tipo); //                console.log(arrayx);
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
//            }});
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
//    function activa1rapestaña() {
//        //        $("#tabregistranotas_rn_do").removeClass("active in");
//        $("[id*='tabre']").removeClass("active in");
//        $("#tabseleccionacursoasignado_rn_do").addClass("active in");
//
//        $("[id*='li_re']").removeClass("active");
//        $("[id*='li_re']").addClass("deshabilitado");
//
//        $("#li_seleccionacurso_rn_do").removeClass("deshabilitado");
//        $("#li_seleccionacurso_rn_do").addClass("active");
//    }
//});
