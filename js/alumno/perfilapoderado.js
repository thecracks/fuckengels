$(document).ready(function () {

    $(document).on("keypress", "#txtnombreapoderado_al", function (tecla)
    {
        return verificaSoloTexto($(this), 4, tecla);
    });

    $(document).on("keypress", "#txtapellidoPapoderado_al", function (tecla)
    {
        return verificaSoloTexto($(this), 2, tecla);
    });

    $(document).on("keypress", "#txtapellidoMapoderado_al", function (tecla)
    {
        return verificaSoloTexto($(this), 2, tecla);
    });

    $(document).on("keypress", "#txtcelularapoderado_al", function (tecla)
    {
        return verificaSoloNumeros($(this), 9, tecla);
    });

    $(document).on("keypress", "#txtocupacionapoderado_al", function (tecla)
    {
        return verificaSoloTexto($(this), 4, tecla);
    });



    $(document).on("focusout", "#txtnombreapoderado_al", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());
    });
    $(document).on("focusout", "#txtapellidoPapoderado_al", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());
    });
    $(document).on("focusout", "#txtapellidoMapoderado_al", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());
    });


    $(document).on("click", "#btneditaapoderado_al", function () {

        var dniApoderado = $("#txtdniapoderado_al").val();
        var genero = $('input:radio[name=genero_apoderado_al]:checked').val();

        var nombre = $("#txtnombreapoderado_al").val();
        var aP = $("#txtapellidoPapoderado_al").val();
        var aM = $("#txtapellidoMapoderado_al").val();
        var celular = $("#txtcelularapoderado_al").val();

        var distrito = $("#cb_distritoApoderado_al").val();
        var sector = $("#txt_sectorApoderado_al").val().trim();
        var direccion = $("#txt_direccionApoderado_al").val().trim();
        var preferencia = $("#txt_puntoreferenciaApoderado_al").val().trim();
        var correo = $("#txt_correoApoderado_al").val().trim();
        var infoColegio = $("#cb_medioApoderado_al").val();
        var ocupacion = $("#cb_ocupacionApoderado_al").val();
        var especiOcupacion = $("#txt_especiocupacionApoderado_al").val().trim();

        var mensaje = "";

        if (nombre == "") {
            mensaje = "El campo nombre está vacío";
        } else if (aP == "") {
            mensaje = "El campo Apellido paterno está vacío";
        } else if (aM == "") {
            mensaje = "El campo Apellido materno está vacío";
        } else if (genero == undefined) {
            mensaje = "Seleccione su género";
        } else if (celular.length < 9) {
            mensaje = "El campo celular debe tener 9 dígitos (942876543)";

        } else if (distrito == 0) {
            mensaje = "No ha especificado un distrito";
        } else if (sector == "") {
            mensaje = "No ha especificado su sector";
        } else if (direccion == "") {
            mensaje = "No ha especificado su dirección";

        } else if (ocupacion == 0) {
            mensaje = "No ha seleccionado su ocupación";

        } else if (infoColegio == 0) {
            mensaje = "No ha seleccionado cómo se entero del colegio";

        } else if (!verificaCorreo(correo) && correo != "") {
            mensaje = "No ha especificado un correo válido";

        } else {

            mensaje = "ok";
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'alumno/actualiza_perfilApoderado',
                data: {celular: celular, nombre: nombre, ap: aP, am: aM, ocupacion: ocupacion, especiocupacion: especiOcupacion,
                    distrito: distrito, sector: sector, direccion: direccion,
                    preferencia: preferencia, infocolegio: infoColegio, correo: correo,
                    dni: dniApoderado, genero: genero},
                cache: false,
                success: function (respuesta) {
                    if (respuesta == "ok") {
                        recargandome();
                    }
                    finalizaAnimacion(respuesta);
                }
            });
        }
        if (mensaje != "ok")
            alerta("", mensaje);

    });
});





////PRA LA PESETAÑA DATOS DE PADRE Y MADRE

$(document).ready(function () {

    var nombrePadre = "";
    var nombreMadre = "";
    var dniPadre = "";
    var dniMadre = "";

    var tipodato = "";
    var tipopadre = "";
    var objetotextactivo = "";
    var tamb = 0;
    var tamdni = 0;

    $(document).on("focusout", "#txtdnombrepadres_perfilapod_al", function ()
    {
        var palabras = $(this).val().trim().split(" ");
        var newtext = "";
        tamb = palabras.length;
//        alert(tamb);
        for (var index in palabras) {
            var word = MaysPrimera(palabras[index]);
            newtext += word + " ";
        }
        $(this).val(newtext);

    });

    $(document).on("focusout", "#txtdnipadres_perfilapod_al", function ()
    {
        tamdni = $(this).val().length;
    });


    $(document).on("keypress", "#txtdnipadres_perfilapod_al", function (tecla)
    {
        return verificaSoloNumeros($(this), 8, tecla);

    });

    $(document).on("keypress", "#txtdnombrepadres_perfilapod_al", function (tecla)
    {
        return verificaSoloTexto($(this), 7, tecla);
    });



    $(document).on("click", "[id*='imgedita_']", function () {

        var idimged = $(this).attr("id").split('_');
        tipodato = idimged[1];
        tipopadre = idimged[2];

        nombreMadre = $('#divnombremadre').html();
        dniMadre = $('#divDNImadre').html();
        nombrePadre = $('#divnombrepadre').html();
        dniPadre = $('#divDNIpadre').html();

        objetotextactivo = $(this);

        if (tipodato == "nombre")
        {
            $("#modalIngresanombrepadres_perfilapod_al").modal('show');
            objetotextactivo = $('#txtdnombrepadres_perfilapod_al');
            if (tipopadre == "padre")
            {
                $("#txtdnombrepadres_perfilapod_al").val(nombrePadre);
            } else
            {
                $("#txtdnombrepadres_perfilapod_al").val(nombreMadre);
            }
        } else {
            $("#modalIngresaDNIpadres_perfilapod_al").modal('show');
            objetotextactivo = $('#txtdnipadres_perfilapod_al');

            if (tipopadre == "padre")
            {
                $("#txtdnipadres_perfilapod_al").val(dniPadre);
            } else
            {
                $("#txtdnipadres_perfilapod_al").val(dniMadre);
            }
        }
    });

    $(document).on("click", "[id*='btnConfirmdatospadres_']", function () {

        if (tipodato == "nombre")
        {
            var palabras = objetotextactivo.val().trim().split(" ");
            tamb = palabras.length;

            if (tamb < 3)
            {
                alert("El campo debe tener al menos 1 nombre y 2 apellidos");
                return;
            }
            if (tipopadre == "padre")
            {
                nombrePadre = objetotextactivo.val();
            } else
            {
                nombreMadre = objetotextactivo.val();
            }
        } else {

            tamdni = objetotextactivo.val().length;

            if (tamdni < 8)
            {
                alert("El campo debe tener 8 dígitos");
                return;
            }

            if (tipopadre == "padre")
            {
                dniPadre = objetotextactivo.val();
            } else
            {
                dniMadre = objetotextactivo.val();
            }
        }
//
        $("#modalIngresaDNIpadres_perfilapod_al").modal('hide');
        $("#modalIngresanombrepadres_perfilapod_al").modal('hide');


        iniciaAnimacionLocal($('#divestatusdatosp_perfilapo_al'));
        $.ajax({
            type: "POST",
            url: 'alumno/actualiza_datos_padres_alumno',
            data: {nombremadre: nombreMadre, nombrepadre: nombrePadre, dnimadre: dniMadre, dnipadre: dniPadre},
            cache: false,
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (respuesta) {
                if (respuesta == "ok") {
                    $("#divnombremadre").html(nombreMadre);
                    $("#divDNImadre").html(dniMadre);
                    $("#divnombrepadre").html(nombrePadre);
                    $("#divDNIpadre").html(dniPadre);
                }
                finalizaAnimacion(respuesta);
            }
        });

        tamb = 0;
        tamdni = 0;
    });


    //////////////FUNCIONES DE AYUDA
    function MaysPrimera(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
});



