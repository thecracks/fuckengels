$(document).ready(function () {

    $(document).on("keypress", "#txtcelulardocente_do", function (tecla)
    {
        return verificaSoloNumeros($(this), 9, tecla);
    });

    $(document).on("click", "#btneditadocente_do", function () {

        var genero = $('input:radio[name=genero_docente_do]:checked').val();

        var fechanacimiento = $("#txtfechanacimientodocente_do").val();
        var celular = $("#txtcelulardocente_do").val();

        var otelefonico = $("#cb_docentetotelefonico_do").val();

        var correo = $("#txt_correoDocente_do").val().trim();

        var distrito = $("#cb_distritoDocente_do").val();
        var sector = $("#txt_sectorDocente_do").val().trim();
        var direccion = $("#txt_direccionDocente_do").val();
        var preferencia = $("#txt_puntoreferenciaDocente_do").val().trim();

        var gradoAcademico = $("#cbgacademicodocente_do").val().trim();
        var especialidad = $("#cb_especialidadDocente_do").val().trim();

        var mensaje = "";

        if (genero == undefined) {
            mensaje = "No ha especificado su género";
        } else if (fechanacimiento == "") {
            mensaje = "No ha especificado la fecha de nacimiento";
        } else if (celular.length < 9) {
            mensaje = "El campo celular debe tener 9 dígitos (942876543)";
        } else if (otelefonico == 0) {
            mensaje = "No ha especificado un operador telefónico";
        } else if (correo == "" || !verificaCorreo(correo)) {
            mensaje = "No ha especificado su correo válido";
        } else if (distrito == 0) {
            mensaje = "No ha especificado un distrito";
        } else if (sector == "") {
            mensaje = "No ha especificado su sector";
        } else if (direccion == "") {
            mensaje = "No ha especificado su dirección";
        } else if (preferencia == "") {
            mensaje = "No ha especificado su punto de referencia";
        } else if (gradoAcademico == 0) {
            mensaje = "No ha especificado su grado académico";
        } else if (especialidad == 0) {
            mensaje = "No ha especificado su especialidad";

        } else {

            mensaje = "ok";
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'docente/actualiza_perfil',
                data: {genero: genero, fechanamiento: fechanacimiento, celular: celular, otelefonico: otelefonico,
                    correo: correo, distrito: distrito, sector: sector, direccion: direccion,
                    preferencia: preferencia, gradoacademico: gradoAcademico, especialidad: especialidad},
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (respuesta) {
                    if (respuesta == "ok") {
                        finalizaAnimacion(respuesta);
                        recargandome();
                    }
                }
            });
        }
        if (mensaje != "ok")
            alerta("", mensaje);
    });
});

