


$(document).ready(function () {

    var usuarioNombre = "";
    var usuarioApellido = "";
    var tam1 = 0;
    var tam2 = 0;
    longitudmax = 0;
    var confirmaapo = "FALSE";

    $(document).on("focusout", "#txtnombres", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());
    });

    $(document).on("focusout", "input[id*='txtapellido']", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());
    });

    $(document).on("keypress", "#txtnombres", function (tecla)
    {
        if (tecla.charCode >= 33 && tecla.charCode <= 64)
            return false;
        tecla.charCode = 68;
    });

    $(document).on("keypress", "#txtapellidopaterno", function (tecla)
    {
        if (tam1 === 2 && tecla.charCode === 32)
            return false;
        if (tecla.charCode >= 33 && tecla.charCode <= 64)
            return false;
    });

    $(document).on("keypress", "#txtapellidomaterno", function (tecla)
    {
        if (tam2 === 2 && tecla.charCode === 32)
            return false;
        if (tecla.charCode >= 33 && tecla.charCode <= 64)
            return false;
    });

    $(document).on("keypress", "#txtcontra", function (tecla)
    {
        longitudmax = $(this).val().length;
        if (tecla.charCode < 48 || tecla.charCode > 57 || longitudmax > 7)
            return false;
    });

    $(document).on("keyup", "#txtcontra", function ()
    {
        longitudmax = $(this).val().length;
    });


    $(document).on("keyup", "#txtnombres", function ()
    {
        actiontxtnombres();
    });
    $(document).on("keyup", "input[id*='txtapellido']", function ()
    {
        actiontxtapellidos();
    });


    function actiontxtnombres()
    {
        usuarioNombre = "";
        var nombres = $("#txtnombres").val();
//            $("#txtnombres").val(nombres.toUpperCase());
        nombres = nombres.toLowerCase();

        usuarioNombre = nombres.substring(0, 1);
        $("#txtusuario").val(usuarioNombre + usuarioApellido);
    }

    function actiontxtapellidos()
    {
        usuarioApellido = "";
        var apellidom = $("#txtapellidomaterno").val();
        var apellidop = $("#txtapellidopaterno").val();

        apellidom = apellidom.toLowerCase();
        apellidop = apellidop.toLowerCase();

        var res1 = apellidop.split(" ");
        tam1 = res1.length;
        var res2 = apellidom.split(" ");
        tam2 = res2.length;
        apellidop = apellidop.trim();
        apellidom = apellidom.trim();
        apellidop = apellidop.replace(" ", "");
        apellidom = apellidom.substring(0, 1);
        usuarioApellido = apellidop + apellidom;
        $("#txtusuario").val(usuarioNombre + usuarioApellido);
    }


    $(document).on("click", "#btnConfirmar", function ()
    {
        var nom = $("#txtnombres").val();
        var apem = $("#txtapellidomaterno").val();
        var apep = $("#txtapellidopaterno").val();
        var usu = $("#txtusuario").val();
        var pass = $("#txtcontra").val();
        var idColegioP = $("#cbcolegiop_ad").val();
//        var 

        if (nom !== "" && apem !== "" && apep !== "" && usu !== "" && pass !== "")
        {
            var response = null;

            if (longitudmax < 8)
            {
                alerta("", "Campo de contraseña incompleto (8 digitos)");
                return false;
            }

            if (idColegioP == 0)
            {
                alerta("", "Seleccion un colegio de procedencia");
                return false;
            }

//            var respuesta = confirm("LOS DATOS INGRESADOS SON: \n\n -Nombres:" + nom + " \n -Apellidos: " + apep + " " + apem +
//                    " \n -Usuario: " + usu + " \n -Contraseña " + pass + "\n ");
//            if (respuesta === true) {
            if (true) {

                iniciaAnimacionModal();

                $.ajax({
                    type: "POST",
                    url: 'administrador/ajax_preregistra_alumno',
                    data: {nombre: nom, apellidop: apep, apellidom: apem, usuario: usu, password: pass,
                        confirmado: confirmaapo, idcolegiop: idColegioP},
                    cache: false,
                    success: function (response) {

                        finalizaAnimacion(response);

                        $("#cargaContenidoArea").html(response);

                        if (response == "ok") {
                            recargandome();
                            confirmaapo = "FALSE";
                            $("#btnConfirmar").attr('disabled', true);
                            $("input[id*='txt']").attr('disabled', true);

                        } else if (response === "personaexiste") {
                            alerta("", "Los datos del alumno ingresado ya estan en la base de datos,<br> registre un nuevo alumno. ");

                        } else if (response.indexOf("usuarioexiste_") > -1) {
                            var res = response.split("_");
                            alerta("CASO EXTRAÑO", "Usuario repetido, se generó un nuevo usuario : " + res[1]);
                            $("#txtusuario").val(res[1]);

                        } else if (response === "apoderadoexixte") {
                            var respuesta = confirm("ADVERTENCIA: \n\n Existe un apoderado con el mismo DNI escrito, \n si se trata de un familiar confirme este diálogo,\n" +
                                    "\n en caso contrario corriga el DNI ingresado.");
                            if (respuesta === true) {
                                confirmaapo = "TRUE";
                            }
                        }
                    }
                });
            }
        } else {
            alerta("", "Todos los campos son obligatorios");
        }
    });


    $(document).on("click", "#btnMostrarRegistrados", function ()
    {
        $('#registro').toggle(500);
        $('#tabla').toggle(500);
    });




    $(document).on("click", "#btnAgregarColegioP", function ()
    {
        $("#modal_agregar_colegio").modal('show');
        ""

    });


    $(document).on("click", "#aceptarColegioNuevo", function () {

        var colegio = $("#txtNewColegio").val();

        if (colegio != "") {
            $("#modal_agregar_colegio").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/AgregarColegio',
                cache: false,
                data: {colegio: colegio},
                success: function (html) {

                    $("#cbcolegiop_ad").append('<option value=' + html + '>' + colegio + '</option>');
                    finalizaAnimacion("ok");

                    document.getElementById("txtNewColegio").value = "";

                }
            });
        }
    });


    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////// PARA EL LISTADO DE ALUMNOS PREINCRITOS
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////

    /////////////////EVENTOS

    var likeNombreAnt = null;
    var likenombre = "";

    var arregloTablaAlumnos = Array();
    var jsonTablaActual = null;
    var jsonTablaAlumnos = null;

    var arregloDatosAlumno = Array();
    var jsonDatosAlumno = null;

    var tabla = null;

    var idpersona = null;

    var tipoAccion = "";


    $(document).on("keypress", "#txtnombreOapellidos_ad", function (tecla)
    {
        likenombre = $(this).val();
        if (tecla.charCode == 13)
        {
            if (likenombre != likeNombreAnt) {
                cargaNombreAlumnos();
                likeNombreAnt = likenombre;
            }

        }
    });

    $(document).on("click", "[id*='btnEliminarAlumnoRegistrado_']", function ()
    {
        tipoAccion = "eliminar";
        var idboton = $(this).attr("id").split("_");
        idpersona = idboton[1];

        $("#modal_eliminar_datospersonas_ad").modal('show');
    });

    $(document).on("click", "[id*='btnEditarAlumnoRegistrado_']", function ()
    {
        tipoAccion = "editar";
        var idboton = $(this).attr("id");
        idPartes = idboton.split("_");
        idpersona = idPartes[1];

        cargaDatosIndividuales(tipoAccion);


        $("#modal_editar_datospersonas_ad").modal('show');
    });

    $(document).on("click", "#btnConfirmarEditarAlumnoInscrito_ad", function ()
    {
        var nombre = $("#txt_nombrealumnoedit_ad").val();
        var ap = $("#txt_ApaternoAlumnoedit_ad").val();
        var am = $("#txt_AmaternoAlumnoedit_ad").val();
        var idcp = $("#cbcolegiopedit_ad").val();

        $("#modal_editar_datospersonas_ad").modal('hide');

        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/actualiza_datos_alumno_inscrito',
            cache: false,
            data: {idpersona: idpersona, nombre: nombre, ap: ap, am: am, idcp: idcp},
            success: function (respuesta) {
                finalizaAnimacion(respuesta);
                if (respuesta == "ok")
                {
                    cargaNombreAlumnos();
                }
            }
        });
    });


    $(document).on("click", "#btnConfirmarEliminarAlumnoInscrito_ad", function (tecla)
    {
        $("#modal_eliminar_datospersonas_ad").modal('hide');

        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/elimina_datos_alumno_inscrito',
            cache: false,
            data: {idpersona: idpersona},
            success: function (respuesta) {
                finalizaAnimacion(respuesta);
                if (respuesta == "ok")
                {
                    cargaNombreAlumnos();
                }
            }
        });
    });


    ///PARA VALIDAR LOS INPUT TXT







    /////////////// FUNCIONES DE AYUDA

    function cargaDatosIndividuales(modo) {
        $.ajax({
            type: "POST",
            url: 'administrador/carga_datos_completos_alumno_inscrito',
            cache: false,
            data: {idpersona: idpersona},
            success: function (result) {
//                alert("datos alumno: "+result);
                arregloDatosAlumno = result;
                jsonDatosAlumno = JSON.parse(arregloDatosAlumno);
                cargaDatosEnFormulario(modo);

            }
        });
    }

    function cargaDatosEnFormulario(modo) {

        if (modo == "editar") {

            $("#lb_idalumnoedit_ad").html(jsonDatosAlumno.idpersona);
            $("#txt_nombrealumnoedit_ad").val(jsonDatosAlumno.Nombre);
            $("#txt_ApaternoAlumnoedit_ad").val(jsonDatosAlumno.ApellidoPaterno);
            $("#txt_AmaternoAlumnoedit_ad").val(jsonDatosAlumno.ApellidoMaterno);
            $("#lb_usuarioAlumnoedit_ad").html(jsonDatosAlumno.usuario);
            $("#lb_contraAlumnoedit_ad").html(jsonDatosAlumno.contra);
            $("#cbcolegiopedit_ad").val(jsonDatosAlumno.idcolegiop);

        } else if (modo == "ver") {

            $("#lb_idalumnoedit_ad").html();
            $("#txt_nombrealumnoedit_ad").html();
            $("#txt_ApaternoAlumnoedit_ad").html();
            $("#txt_AmaternoAlumnoedit_ad").html();
            $("#lb_usuarioAlumnoedit_ad").html();
            $("#txt_contraAlumnoedit_ad").html();
            $("#cbcolegiopedit_ad").html();
            $("#txt_nombrealumnoedit_ad").html();
            $("#txt_nombrealumnoedit_ad").html();
            $("#txt_nombrealumnoedit_ad").html();
        }
    }

    function cargaNombreAlumnos() {
        iniciaAnimacionLocal($('#div_tabla_alumnosInscritos_ad'));
        $.ajax({
            type: "POST",
            url: 'administrador/carga_listado_alumno_inscritos',
            cache: false,
            data: {likenombre: likenombre},
            success: function (result) {
                arregloTablaAlumnos = result;
                jsonTablaAlumnos = JSON.parse(arregloTablaAlumnos);
                generaPorNombre();
            }
        });
    }

    function cargaCuerpoTabla(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].Nombre + ' </td>';

        tabla += '<td><button title="Eliminar" id="btnEliminarAlumnoRegistrado_' + jsonTablaActual[prop].idpersona + '_' + i + '" type="button" class="btn btn-success">' +
                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>' +
                '<button title="Editar" id="btnEditarAlumnoRegistrado_' + jsonTablaActual[prop].idpersona + '_' + i + '" type="button" class="btn btn-success">' +
                '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>' +
                '<button title="Ver datos" id="btnVerdatosAlumnoRegistrado_' + jsonTablaActual[prop].idpersona + '_' + i + '" type="button" class="btn btn-success">' +
                '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>' +
                '</td>';


        tabla += '</tr>';

    }

    function generaPorNombre() {

        tabla = ' <table class="table table-bordered table-hover"> ' +
                '<thead>         <tr>       <th>Numero</th>     <th>Nombres</th>     <th>Operaciones</th>  </tr>  </thead>';
        tabla += '<tbody>';

        jsonTablaActual = jsonTablaAlumnos;

        var i = 0;

        for (var prop in jsonTablaActual) {
            cargaCuerpoTabla(prop, i);
            i++;
        }

        tabla += '</tbody></table>';
        $('#div_tabla_alumnosInscritos_ad').html(tabla);
    }
});
