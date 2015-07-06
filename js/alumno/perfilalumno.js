$(document).ready(function () {

    $(document).on("keypress", "#txtdnialumno_al", function (tecla)
    {
        return verificaSoloNumeros($(this), 8, tecla);
    });

    $(document).on("keypress", "#txtcelularalumno_al", function (tecla)
    {
        return verificaSoloNumeros($(this), 9, tecla);
    });

    $(document).on("keypress", "#txttelefonoalumno_al", function (tecla)
    {
        return verificaSoloNumeros($(this), 9, tecla);
    });

    $(document).on("click", "#btneditaalumno_al", function () {

        var genero = $('input:radio[name=genero_alumno_al]:checked').val();
        var telefono = $("#txttelefonoalumno_al").val();
        var celular = $("#txtcelularalumno_al").val();
        var direccion = $("#txtdomicilioalumno_al").val();
        var dni = $("#txtdnialumno_al").val();
        var fechanacimiento = $("#txtfechanacimientoalumno_al").val();
        var mensaje = "";

        var distrito = $("#cb_distritoAlumno_al").val();
        var sector = $("#txt_sectorAlumno_al").val().trim();
        var direccion = $("#txt_direccionAlumno_al").val().trim();
        var preferencia = $("#txt_puntoreferenciaAlumno_al").val().trim();
        var seguro = $("#cb_seguroAlumno_al").val();
        var correo = $("#txt_correoAlumno_al").val().trim();

        if (genero == undefined) {
            mensaje = "No ha especificado su género";
        } else if (telefono.length < 9) {
            mensaje = "El campo teléfono debe tener 9 dígitos (044294232)";
        } else if (celular.length < 9) {
            mensaje = "El campo celular debe tener 9 dígitos (942876543)";
        } else if (dni.length < 8) {
            mensaje = "El campo dni debe tener 8 dígitos";
        } else if (fechanacimiento == "") {
            mensaje = "No ha especificado la fecha de nacimiento";
        } else if (distrito == 0) {
            mensaje = "No ha especificado un distrito";
        } else if (sector == "") {
            mensaje = "No ha especificado su sector";
        } else if (direccion == "") {
            mensaje = "No ha especificado su dirección";

        } else if (preferencia == "") {
            mensaje = "No ha especificado su punto de referencia";

        } else if (seguro == 0) {
            mensaje = "No ha seleccionado un tipo de seguro";

        } else if (correo == "" || !verificaCorreo(correo)) {
            mensaje = "No ha especificado su correo válido";

        } else {

            mensaje = "ok";
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'alumno/actualiza_perfil',
                data: {genero: genero,telefono: telefono, celular: celular, direccion: direccion,
                    dni: dni, fechanamiento: fechanacimiento, distrito: distrito, sector: sector,
                    preferencia: preferencia, seguro: seguro, correo: correo},
                cache: false,
                success: function (respuesta) {
                    finalizaAnimacion(respuesta);
                    if (respuesta == "ok") {
                        recargandome();
                    }
                    
                }
            });
        }
        if (mensaje != "ok")
            alerta("", mensaje);
    });
});

