$(document).ready(function () {

    htmlCapacidades = null;
    htmlsubCapacidades = null;
    idCapacidad = null;
    idArea = null;
    sonAreas = true;

    arrayCapacidades = null;
    arrayEvaluaciones = null;

    //CARGA LISTA HTML DE CAPACIDADES
    $.ajax({
        url: 'administrador/ajaxcargalistacapacidades',
        cache: false,
        success: function (html) {
            htmlCapacidades = html;
        }
    });
    //CARGA LISTA HTML DE SUBCAPACIDADES
    $.ajax({
        url: 'administrador/ajaxcargalistasubcapacidades',
        cache: false,
        success: function (html) {
            htmlsubCapacidades = html;
        }
    });


    //CARGA ITEMS CAPACIDADES
    $.ajax({
        type: "POST",
        url: 'administrador/cargaListaCapacidades',
        cache: false,
        success: function (arrayjson) {
            arrayCapacidades = JSON.parse(arrayjson);
        }
    });


    //CARGA ITEMS EVALUACIONES
    $.ajax({
        type: "POST",
        url: 'administrador/cargaListaEvaluaciones',
        cache: false,
        success: function (arrayjson) {
            arrayEvaluaciones = JSON.parse(arrayjson);
        }
    });


    esDecimal = false;
    var sumaPesos = 0;
    conforme = false;
    elementoActivo = null;
    botonReferencia = null;
    //$("input[id^='txtformulaarea']").attr('readonly', true);


    //CUANDO SE DA CLICK EN LOS BOTONES DE LOS FORMULARIOS DINAMICOS TANTO DE CAPACIDAES COMO SUBCAPACIDAES
    $(document).on("click", "button[id*='boton']", function ()
    {
        var id = $(this).attr('id');
        var valor = id.replace("boton", "");
        var cadenaActual = elementoActivo.val();
        if (valor === 'i') {
            cadenaActual = cadenaActual + '(';
        } else if (valor === 'd')
        {
            cadenaActual = cadenaActual + ')';
        } else if (valor === 'p')
        {
            cadenaActual = cadenaActual + '.';
        }
        else if (valor === 'e') {
            cadenaActual = elimina();
        }

        else {
            cadenaActual = cadenaActual + valor;
        }
        elementoActivo.val(cadenaActual);
    });
    //PARA CLIK EN EL BOTON VER CAPACIDADES
    $(document).on("click", "button[id^='btnVerCapacidades']", function ()
    {
        var idactual = $(this).attr("id");
        idArea = idactual.replace("btnVerCapacidades", "");
        var iddestino = "#cargaContenidoArea" + idArea;
        $("div[id*='cargaContenidoArea']").empty();
        var objetoBoton = $("button[id^='btnVerificaFormula_Area_" + idArea + "']");
        botonReferencia = objetoBoton;
        $.ajax({
            type: "POST",
            url: 'administrador/ajaxcargacapacidadesdearea',
            cache: false,
            data: {idarea: idArea},
            success: function (html) {
                $(iddestino).html(html);
            }
        });
        var posicion = $(this).position();
        $('html, body').animate({scrollTop: posicion.top}, 1000);
    });
    //CUANDO SE DA CLICK EN EL BOTON VERFICAR FORMULA
    $(document).on("click", "button[id*='btnVerifica']", function ()
    {

        var identificador = $(this).attr("id").split("_");
        if (identificador[1] === "Area")
        {
            sonAreas = true;
            elementoActivo = $("#txtformulaarea" + identificador[2]);
            idArea = identificador[2];
        }
        else {
            sonAreas = false;
            elementoActivo = $("#txtformulacapacidad" + identificador[2]);
            idCapacidad = identificador[2];
        }

//        alert(identificador.length);
        if (identificador.length === 4)
        {
            var respuesta = confirm("ATENCIÓN: \n\n Si usted CONFIRMA este diálogo,\n" +
                    "podrá editar la formula de esta área, pero las FÓRMULAS\n" +
                    "de cada capacidad ingresada anteriormente\n" +
                    "serán BORRADAS");
            if (respuesta === true) {
                elementoActivo.attr("disabled", false);
                $(this).attr("id", identificador[0] + "_" + identificador[1] + "_" + identificador[2]);
                $(this).html("Verificar Fórmula");
            }

            return;
        }

        conforme = false;
        var sumaTotal = 0;
        var mensaje = "";
        var formula = elementoActivo.val();
        var formulaaux = formula;
        var tokenDivision = formula.split("/");
        if (tokenDivision.length === 2)
            sumaTotal = tokenDivision[1];
        formula = tokenDivision[0];
        if (formula[0] === "(")
            formula = formula.replace('(', '');
        if (formula[formula.length - 1] === ")")
            formula = formula.replace(')', '');
        var tokens = formula.split('+');
//
        var variables = new Array(tokens.Length);
        var pesos = new Array(tokens.Length);
//
        for (var i = 0; i < tokens.length; i++)
        {
            variables[i] = devuelveVariable(tokens[i]);
            pesos[i] = devuelvePeso(tokens[i]);
        }

        if (!esDecimal)
        {
            if (comprueba(variables, pesos) && (parseInt(sumaPesos) === parseInt(sumaTotal)))
            {
                mensaje = "FÓRMULA CORRECTA:";
                conforme = true;
            }
            else
            {
                mensaje = "LA FORMULA ESTA MAL-> EJEMPLO: (3*AF+3*SX1+HF)/7 ó (0.1*AP+0.9*AC)";
            }
        }
        else if (comprueba(variables, pesos) && (parseInt(sumaPesos) === 10 || (parseInt(sumaPesos) === 100)))
        {
            mensaje = "FÓRMULA CORRECTA:";
            conforme = true;
        }
        else
        {
            mensaje = "LA FORMULA ESTA MAL-> EJEMPLO: (3*AF+3*SX1+HF)/7 ó (0.1*AP+0.9*AC)";
        }

        if (conforme)// actualizar datos 
        {

            var existe = true;
            var temexiste;
            var arregloCapacidadesOevaluaciones = Array();
            if (sonAreas) {
                arregloCapacidadesOevaluaciones = arrayCapacidades;
            }
            else {
                arregloCapacidadesOevaluaciones = arrayEvaluaciones;
            }


            var ideval = "";
            var pes = "";
            for (var i in variables) {

                temexiste = false;
                for (var prop in arregloCapacidadesOevaluaciones) {
                    
//                    alert(arregloCapacidadesOevaluaciones[prop] + '   <<<<'+variables[i]);

                    if (arregloCapacidadesOevaluaciones[prop] == variables[i]) {

                        ideval += prop + "?";
                        temexiste = true;
                        break;
                    }
                }

                if (temexiste === false) {
                    existe = false;
                    break;
                }
            }

            if (existe) {

                elementoActivo.attr("disabled", true);
                $(this).attr("id", identificador[0] + "_" + identificador[1] + "_" + identificador[2] + "_edit");
                $(this).html("Editar Fórmula");
                for (var i in pesos) {
                    pes += pesos[i] + "?";
                }

                if (sonAreas) {

                    $.ajax({
                        type: "POST",
                        url: 'administrador/ajax_guarda_formula_area',
                        data: {formula: formulaaux, pesos: pes, items: ideval, idelemento: idArea},
                        cache: false,
                        success: function (html) {
                            $("#muestra").html(html);
                        }
                    });
                } else {

                    $.ajax({
                        type: "POST",
                        url: 'administrador/ajax_guarda_formula_competencia',
                        data: {formula: formulaaux, pesos: pes, items: ideval, idelemento: idCapacidad, idelementomayor: idArea},
                        cache: false,
                        success: function (html) {
                            $("#muestra").html(html);
                        }
                    });
                }
                mensaje = 'LA FÓRMULA ESTA CORRECTA Y HA SIDO GRABADA';
                recargandome();
            }
            else {
                mensaje = 'La fórmula esta correcta PERO LOS ITEMS NO SON VALIDOS, NO se grabaron los datos';
            }

        }
        alerta("",mensaje);
    });
    function devuelveVariable(cadena)
    {
        var tokens = cadena.split('*');
        if (tokens.length === 2)
        {
            var parte1 = tokens[0];
            var parte2 = tokens[1];
            if (parte1[0] > '@' && parte1[0] < '[')
                return parte1;
            else
                return parte2;
        }
        else if (cadena[0] > '@' && cadena[0] < '[')
            return cadena;
        else
            return '';
    }

    function  devuelvePeso(cadena)
    {
        esDecimal = false;
        var tokens = cadena.split('*');
        if (tokens.length === 2)
        {
            var parte1 = tokens[0];
            var parte2 = tokens[1];
            if (parte1[0] > '/' && parte1[0] < ':')
            {
//                        
                if (parseFloat(parte1) < 1.0)
                {
//                               
                    esDecimal = true;
                    return parte1 * 10;
                }
                else {
//                              
                    return parte1;
                }

            }
            else
            {
                if (parte2 < 1.0)
                {
                    esDecimal = true;
                    return parte2 * 10;
                }
                else
                    return parte2;
            }
        }
        else {

            if (cadena[0] > '@' && cadena[0] < '[')
                return 1;
            else
                return -1;
        }
    }

    function comprueba(variables, pesos)
    {
        sumaPesos = 0;
        for (var i = 0; i < variables.length; i++)
        {
            if (variables[i] === '' || pesos[i] === -1)
            {
                return false;
            }
            sumaPesos = parseInt(sumaPesos) + parseInt(pesos[i]);
        }
        return true;
    }


//PARA LAS CAJA DE TEXTO DE LAS FORMULAS D  LAS AREAS
    $(document).on("click", "input[id^='txtformulaarea']", function ()
    {
//$("input[id*='txtformulaarea']").attr('readonly', true);
        $("button[id*='btnVerificaFormula_Area_']").attr('disabled', true);
        //$(this).attr('readonly', false);
        elementoActivo = $(this);
        $("input[id^='txtformulaarea']").removeClass('cajaActiva');
        elementoActivo.addClass('cajaActiva');
        contenido = htmlCapacidades;
        var idactual = elementoActivo.attr("id");
        idArea = idactual.replace("txtformulaarea", "");
        var iddestino = "#cargaContenidoArea" + idArea;
        $("div[id*='cargaContenidoArea']").empty();
        $(iddestino).html(contenido);
        var objetoBoton = $("button[id^='btnVerificaFormula_Area_" + idArea + "']");
        botonReferencia = objetoBoton;
        var posicion = objetoBoton.position();
        var posicionexacta = posicion.top;
        $(objetoBoton).attr('disabled', false);
        posicionexacta = posicionexacta + 'px';
        $('html, body').animate({scrollTop: posicionexacta}, 1000);
    });
    //PARA LAS CAJA DE TEXTO DE LAS FORMULAS D  LAS CAPACIDADES
    $(document).on("click", "input[id^='txtformulacapacidad']", function ()
    {

//$("input[id*='txtformulacapacidad']").attr('readonly', true);
        $("button[id^='btnVerificaFormula_Capacidad_']").attr('disabled', true);
        //$(this).attr('readonly', false);
        elementoActivo = $(this);
        $("input[id^='txtformulacapacidad']").removeClass('cajaActiva');
        elementoActivo.addClass('cajaActiva');
        contenido = htmlsubCapacidades;
        var idactual = elementoActivo.attr("id");
        idCapacidad = idactual.replace("txtformulacapacidad", "");
        var iddestino = "#cargaContenidoCapacidad" + idCapacidad;
        $("div[id*='cargaContenidoCapacidad']").empty();
        $(iddestino).html(contenido);
        var objetoBoton1 = $("button[id^='btnVerificaFormula_Capacidad_" + idCapacidad + "']");
        var objetoBoton2 = botonReferencia;
        var posicion1 = objetoBoton1.position();
        var posicion2 = objetoBoton2.position();
        var posicionexacta = posicion1.top + posicion2.top;
        $(objetoBoton1).attr('disabled', false);
        posicionexacta = posicionexacta + 'px';
        $('html, body').animate({scrollTop: posicionexacta}, 1000);
    });
    function elimina() {

        var str = elementoActivo.val();
        return  str.substring(0, str.length - 1);
        // elementoActivo.val(newStr);
    }
    ;
});

