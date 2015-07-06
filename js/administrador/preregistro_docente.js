


$(document).ready(function () {

    var usuarioNombre = "";
    var usuarioApellido = "";
    var longDni = 0;

    $(document).on("focusout", "#txtdocentenombres_preredocente_ad", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());
    });

    $(document).on("focusout", "input[id*='txtdocenteapellidopaterno_preredocente_ad']", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());

    });
    $(document).on("focusout", "input[id*='txtdocenteapellidomaterno_preredocente_ad']", function ()
    {
        $(this).val($(this).val().toUpperCase().trim());
    });

    $(document).on("keypress", "#txtdocentenombres_preredocente_ad", function (tecla)
    {
        return verificaSoloTexto($(this), 4, tecla);
    });

    $(document).on("keypress", "input[id*='txtdocenteapellidomaterno_preredocente_ad']", function (tecla)
    {
        return verificaSoloTexto($(this), 2, tecla);
    });

    $(document).on("keypress", "#txtdocenteapellidopaterno_preredocente_ad", function (tecla)
    {
        return  verificaSoloTexto($(this), 2, tecla);
    });

    $(document).on("keypress", "#txtdocentecontra_preredocente_ad", function (tecla)
    {
        return verificaSoloNumeros($(this), 8, tecla);
    });

    $(document).on("keyup", "#txtdocentecontra_preredocente_ad", function ()
    {
        longDni = $(this).val().length;
    });

    $(document).on("keyup", "#txtdocentenombres_preredocente_ad", function ()
    {
        actiontxtnombres();
    });
    $(document).on("keyup", "#txtdocenteapellidopaterno_preredocente_ad", function ()
    {
        actiontxtapellidos();
    });
    $(document).on("keyup", "#txtdocenteapellidomaterno_preredocente_ad", function ()
    {
        actiontxtapellidos();
    });


    function actiontxtnombres()
    {
        actiontxtapellidos();
        usuarioNombre = "";
        var nombres = $("#txtdocentenombres_preredocente_ad").val();
        nombres = nombres.toLowerCase();

        usuarioNombre = nombres.substring(0, 1);
        $("#txtdocenteusuario_preredocente_ad").val(usuarioNombre + usuarioApellido);

    }

    function actiontxtapellidos()
    {
//        alert("uoouo");
        usuarioApellido = "";
        var apellidom = $("#txtdocenteapellidomaterno_preredocente_ad").val();
        var apellidop = $("#txtdocenteapellidopaterno_preredocente_ad").val();

        apellidom = apellidom.toLowerCase();
        apellidop = apellidop.toLowerCase();

        apellidop = apellidop.trim();
        apellidom = apellidom.trim();
        apellidop = apellidop.replace(" ", "");
        apellidom = apellidom.substring(0, 1);
        usuarioApellido = apellidop + apellidom;
        $("#txtdocenteusuario_preredocente_ad").val(usuarioNombre + usuarioApellido);
    }


    $(document).on("click", "#btnConfirmarregistro_preredocente_ad", function ()
    {
        var nom = $("#txtdocentenombres_preredocente_ad").val();
        var apem = $("#txtdocenteapellidomaterno_preredocente_ad").val();
        var apep = $("#txtdocenteapellidopaterno_preredocente_ad").val();
        var usu = $("#txtdocenteusuario_preredocente_ad").val();
        var pass = $("#txtdocentecontra_preredocente_ad").val();


        if (nom !== "" && apem !== "" && apep !== "" && usu !== "" && pass !== "")
        {
            if (longDni < 8)
            {
                alerta("", "Campo de contraseña (DNI) incompleto (8 digitos)");
                return false;
            }

            if (true) {

                iniciaAnimacionModal();

                $.ajax({
                    type: "POST",
                    url: 'administrador/operaciones_registroparcialdocente',
                    data: {tipo: 'insert', nombre: nom, apellidop: apep, apellidom: apem, usuario: usu, password: pass},
                    cache: false,
                    error: function (jqXHR, textStatus, errorThrown) {
                        finalizaAnimacion(textStatus);
                    },
                    success: function (response) {

                        finalizaAnimacion(response);

                        $("#cargaContenidoArea").html(response);

                        if (response == "ok") {
                            recargandome();

                        } else if (response === "personaexiste") {
                            alerta("", "Los datos del alumno ingresado ya estan en la base de datos,<br> registre un nuevo alumno. ");

                        } else if (response.indexOf("usuarioexiste_") > -1) {
                            var res = response.split("_");
                            alerta("CASO EXTRAÑO", "Usuario repetido, se generó un nuevo usuario : " + res[1]);
                            $("#txtdocenteusuario_preredocente_ad").val(res[1]);

                        }
                    }
                });
            }
        } else {
            alerta("", "Todos los campos son obligatorios");
        }
    });


//    $(document).on("click", "#btnMostrarRegistrados", function ()
//    {
//        $('#registro').toggle(500);
//        $('#tabla').toggle(500);
//    });


    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////// PARA EL LISTADO DE ALUMNOS PREINCRITOSsssssss
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////

    /////////////////EVENTOS

    var likeNombreAnt = null;
    var likenombre = "";

    var arregloTablaDocentes = Array();
    var jsonTablaActual = null;
    var jsonTablaDocentes = null;

    var jsonDatosDocente = null;

    var tabla = null;

    var idpersona = null;

    $(document).on("keypress", "#txtnombreOapellidosdocente_ad", function (tecla)
    {
        likenombre = $(this).val();
        if (tecla.charCode == 13)
        {
            if (likenombre != likeNombreAnt) {
                cargaNombreDocentes();
                likeNombreAnt = likenombre;
            }
        }
    });

    $(document).on("click", "#btnbuscardocentessimilares", function ()
    {
        cargaNombreDocentes();
    });

    $(document).on("click", "#btnvermasdatosdocentes_prdocente_ad", function ()
    {
        generaPorNombreextend();
    });

    $(document).on("focusout", "#txtnombreOapellidosdocente_ad", function ()
    {
        likeNombreAnt = null;
    });

    $(document).on("click", "[id*='btnEliminarDocenteRegistrado_']", function ()
    {
        tipoAccion = "eliminar";
        var idboton = $(this).attr("id").split("_");
        var prop = idboton[2];
        idpersona = idboton[1];

        muestramodalelimina("ElIMINAR DOCENTE", "Desea realmente elimina al docente: " + jsonTablaDocentes[prop].nombredocente + " ? <br>" +
                "NOTA: NO se podrá eliminar el docente que tenga cursos asignados.");
        $("#modal_eliminar_datospersonas_ad").modal('show');
    });

    $(document).on("click", "[id*='btnEditarDocenteRegistrado_']", function ()
    {
        var idboton = $(this).attr("id").split("_");
        idpersona = idboton[1];
        var prop = idboton[2];

        $("#divcontentbtnregistrareditar_rpdocente").html('<div class="col-lg-6 ">' +
                '<input  type="button" value="Confirmar Edición" id="btnConfirmareditar_preredocente_ad" class="btn btn-success autoajustable">' +
                '</div>' +
                '<div class="col-lg-6 ">' +
                '<input  type="button" value="Cancelar" id="btnCancelareditar_preredocente_ad" class="btn btn-success autoajustable">' +
                '</div>');

        activa1rapestaña();

        var nom = jsonTablaActual[prop].Nombre;
        var apem = jsonTablaActual[prop].ApellidoPaterno;
        var apep = jsonTablaActual[prop].ApellidoMaterno;
        var usu = jsonTablaActual[prop].usuario;
        var pass = jsonTablaActual[prop].contra;

        $("#txtdocentenombres_preredocente_ad").val(nom);
        $("#txtdocenteapellidomaterno_preredocente_ad").val(apem);
        $("#txtdocenteapellidopaterno_preredocente_ad").val(apep);
        $("#txtdocenteusuario_preredocente_ad").val(usu);
        $("#txtdocentecontra_preredocente_ad").val(pass);
    });


    $(document).on("click", "#btnCancelareditar_preredocente_ad", function ()
    {
        $("#divcontentbtnregistrareditar_rpdocente").html('<div class="col-lg-12 ">' +
                '<input  type="button" value="Confirmar" id="btnConfirmarregistro_preredocente_ad" class="btn btn-success autoajustable">' +
                '</div>');

        $("#txtdocentenombres_preredocente_ad").val('');
        $("#txtdocenteapellidomaterno_preredocente_ad").val('');
        $("#txtdocenteapellidopaterno_preredocente_ad").val('');
        $("#txtdocenteusuario_preredocente_ad").val('');
        $("#txtdocentecontra_preredocente_ad").val('');

        activa2dapestaña();

    });

    $(document).on("click", "#btnConfirmareditar_preredocente_ad", function ()
    {
        var nom = $("#txtdocentenombres_preredocente_ad").val();
        var apem = $("#txtdocenteapellidomaterno_preredocente_ad").val();
        var apep = $("#txtdocenteapellidopaterno_preredocente_ad").val();
        var usu = $("#txtdocenteusuario_preredocente_ad").val();
        var pass = $("#txtdocentecontra_preredocente_ad").val();


        if (nom !== "" && apem !== "" && apep !== "" && usu !== "" && pass !== "")
        {

            if (pass.length < 8)
            {
                alerta("", "Campo de contraseña (DNI) incompleto (8 digitos)");
                return false;
            }

            iniciaAnimacionModal();

            $.ajax({
                type: "POST",
                url: 'administrador/operaciones_registroparcialdocente',
                data: {tipo: 'update', nombre: nom, apellidop: apep, apellidom: apem, usuario: usu, password: pass, iddocente: idpersona},
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    finalizaAnimacion(textStatus);
                },
                success: function (response) {

                    finalizaAnimacion(response);

                    if (response == "ok") {

                        cargaNombreDocentes();
                        activa2dapestaña();
                        finalizaAnimacion();

                    } else if (response.indexOf("usuarioexiste_") > -1) {
                        var res = response.split("_");
                        alerta("CASO EXTRAÑO", "Usuario repetido, se generó un nuevo usuario : " + res[1]);
                        $("#txtdocenteusuario_preredocente_ad").val(res[1]);
                    }
                }
            });

        } else {
            alerta("", "Todos los campos son obligatorios");
        }

    });


    $(document).on("click", "#btnConfirmarEliminar", function ()
    {
        ocultamodalelimina();

        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/operaciones_registroparcialdocente',
            cache: false,
            data: {iddocente: idpersona, tipo: 'delete'},
            success: function (respuesta) {
                finalizaAnimacion(respuesta);
                if (respuesta == "ok")
                {
                    cargaNombreDocentes();
                }
            }
        });
    });


    ///PARA VALIDAR LOS INPUT TXT







    /////////////// FUNCIONES DE AYUDA


    function cargaDatosEnFormulario(modo) {

        if (modo == "editar") {

            $("#lb_idalumnoedit_ad").html(jsonDatosDocente.idpersona);
            $("#txt_nombrealumnoedit_ad").val(jsonDatosDocente.Nombre);
            $("#txt_ApaternoAlumnoedit_ad").val(jsonDatosDocente.ApellidoPaterno);
            $("#txt_AmaternoAlumnoedit_ad").val(jsonDatosDocente.ApellidoMaterno);
            $("#lb_usuarioAlumnoedit_ad").html(jsonDatosDocente.usuario);
            $("#lb_contraAlumnoedit_ad").html(jsonDatosDocente.contra);
            $("#cbcolegiopedit_ad").val(jsonDatosDocente.idcolegiop);

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

    function cargaNombreDocentes() {
        iniciaAnimacionLocal($('#div_tabla_docentesInscritos_ad'));
        $.ajax({
            type: "POST",
            url: 'administrador/operaciones_registroparcialdocente',
            cache: false,
            data: {likenombre: likenombre, tipo: 'select'},
            success: function (result) {
                arregloTablaDocentes = result;
                jsonTablaDocentes = JSON.parse(arregloTablaDocentes);
                generaPorNombre();
            }
        });
    }

    function cargaCuerpoTabla(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';
        tabla += '<td>' + jsonTablaActual[prop].nombredocente + ' </td>';

        tabla += '<td><button title="Eliminar" id="btnEliminarDocenteRegistrado_' + jsonTablaActual[prop].idpersona + '_' + i + '" type="button" class="btn btn-success">' +
                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>' +
                '<button title="Editar" id="btnEditarDocenteRegistrado_' + jsonTablaActual[prop].idpersona + '_' + i + '" type="button" class="btn btn-success">' +
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

        jsonTablaActual = jsonTablaDocentes;

        var i = 0;

        for (var prop in jsonTablaActual) {
            cargaCuerpoTabla(prop, i);
            i++;
        }

        tabla += '</tbody></table>';
        $('#div_tabla_docentesInscritos_ad').html(tabla);
    }

    function cargaCuerpoTablaextend(prop, i) {

        tabla += '<tr>';

        tabla += '<td>' + (i + 1) + ' </td>';

        tabla += '<td>' + verificaNull(jsonTablaActual[prop].nombredocente)  + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].usuario) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].DNI) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].fechanacimiento) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].celular) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].operadoratelefonica) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].correo) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].distrito) + ', ' + verificaNull(jsonTablaActual[prop].sector) + ', ' + verificaNull(jsonTablaActual[prop].domicilio) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].gradoacademico) + ' </td>';
        tabla += '<td>' + verificaNull(jsonTablaActual[prop].especialidad) + ' </td>';

        tabla += '</tr>';
    }

    function generaPorNombreextend() {

        tabla = '<table class="table table-bordered table-hover"> ' +
                '<thead><tr> <th>Numero</th> <th>Nombres</th> <th>Usuario</th> <th>DNI</th> <th>Fecha nacimiento</th> <th>Celular</th>' +
                '<th>Operador Telefónico</th> <th>Correo</th> <th>Domicilio</th> <th>Grado académico</th>' +
                '<th>Especialidad</th></tr>  </thead>';

        tabla += '<tbody>';

        jsonTablaActual = jsonTablaDocentes;

        var i = 0;

        for (var prop in jsonTablaActual) {
            cargaCuerpoTablaextend(prop, i);
            i++;
        }

        tabla += '</tbody></table>';
        $('#div_tabla_docentesInscritos_ad').html(tabla);
    }

    function activa1rapestaña() {
        $("#listado_docentesregistrados_ad").removeClass("active in");
        $("#preregistro_docente_ad").addClass("active in");

        $("#li_listado_docentesregistrados_ad").removeClass("active");
        $("#li_preregistro_docente_ad").addClass("active");
    }

    function activa2dapestaña() {
        $("#preregistro_docente_ad").removeClass("active in");
        $("#listado_docentesregistrados_ad").addClass("active in");

        $("#li_preregistro_docente_ad").removeClass("active");
        $("#li_listado_docentesregistrados_ad").addClass("active");
    }
    
    function verificaNull(dato){
        if(dato==null) 
            return '';
        else 
            return dato;
    }
});
