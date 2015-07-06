$(document).ready(function () {

    $(document).on("click", "#btnGuardarAreas", function ()
    {
        var nombreArea = $("#txtNombreArea").val();
        if (nombreArea !== "") {
            iniciaAnimacionModal();

            $.ajax({
                type: "POST",
                url: 'administrador/GuardarAreas',
                data: {nombre: nombreArea},
                cache: false,
                success: function (html) {
                    finalizaAnimacion("ok");
//                        alert("Se guardaron" + html);
                    recargandome();
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });

    $(document).on("click", "[id*='editar_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editar", "");
        var idA = res.split('_');
        idarea = idA[0];
        var prop = idA[1];
        var prop1 = idA[2];

        $("#txtAreaNombreNew_ad").val(prop1);
        $("#txtIDAreaNombreNew_ad").val(prop);

        $("#modalEditarArea").modal('show');

    });

    $(document).on("click", "#eAreaNew", function ()
    {
        var area = $("#txtAreaNombreNew_ad").val();
        var idarea = $("#txtIDAreaNombreNew_ad").val();
        if (area !== " ") {

            $("#modalEditarArea").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarArea',
                cache: false,
                data: {area: area, idarea: idarea},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });


    $(document).on("click", "[id*='eliminar_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminar", "");
        var idA = res.split('_');
        idarea = idA[0];
        var prop = idA[1];
        var prop1 = idA[2];
        
        
        $("#txtAreaNombre_ad").html(prop1);
        $("#txtIDAreaNombre_ad").val(prop);

        $("#modalEliminarArea").modal('show');


    });
    
    $(document).on("click", "#eliminarAreaSI", function ()
    {
        var area = $("#txtIDAreaNombre_ad").val();

        $("#modalEliminarArea").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarArea',
            cache: false,
            data: {area: area},            
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });


    $(document).on("click", "#btnGuardarCurso", function ()
    {
        var nombreCurso = $("#txtNombreCurso").val();
        var nombreArea = $("#sArea").val();
        if (nombreArea !== "" && nombreCurso !== "") {
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/guardarCurso',
                data: {nombreC: nombreCurso, nombreA: nombreArea},
                cache: false,
                success: function (html) {
                    finalizaAnimacion("ok");
                    recargandome();
                }
            });
        }
        else {
            alert("El campo es obligatorio");
        }
    });
    
    $(document).on("click", "[id*='editarCurso_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editarCurso", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        var prop2 = idC[3];
        
        alert(prop + " " + prop1 + " " + prop2);

        $("#txtArea_ad").html(prop2);
        $("#txtIDcursoNew1_ad").val(prop);
        $("#txtCursoN_ad").val(prop1);

        $("#modalEditarCurso").modal('show');

    });
    
    $(document).on("click", "#edCursoNew", function ()
    {
        var idc = $("#txtIDcursoNew1_ad").val();
        var curso = $("#txtCursoN_ad").val();
        
        alert(idc + "  " + curso);

        if (idc!==" " && curso!==" ") {

            $("#modalEditarCurso").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarCursos',
                cache: false,
                data: {idc: idc, curso: curso},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });
    
    
    $(document).on("click", "[id*='eliminarCurso_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminar", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        var prop2 = idC[3];
        
        $("#txtAreaCursoNombreNew_ad").html(prop1);
        $("#txtIDAreaCursoNew_ad").val(prop);
        $("#txtCursoNew_ad").html(prop2);

        $("#modalEliminarCurso").modal('show');


    });
    
    
    $(document).on("click", "#eliminarCursoSI", function ()
    {
        var curso = $("#txtIDAreaCursoNew_ad").val();

        $("#modalEliminarCurso").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarCurso',
            cache: false,
            data: {curso: curso},       
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });

    $(document).on("click", "#btnGuardarFilial", function ()
    {
        var filial = $("#txtFilial").val();
        var direccion = $("#txtDireccion").val();
        var telefono = $("#txtTelefono").val();
        if (filial !== "" && direccion !== "" && telefono !== "") {
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/guardarFilial',
                data: {f: filial, d: direccion, t: telefono},
                cache: false,
                success: function (html) {
                    finalizaAnimacion("ok");
                    recargandome();
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });
    
    
    $(document).on("click", "[id*='editarFilial_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editarFilial", "");
        var idF = res.split('_');
        filial = idF[0];
        var prop = idF[1];
        var prop1 = idF[2];
        var prop2 = idF[3];
        var prop3 = idF[4];
        
        alert(prop + " " + prop1 + " " + prop2 + " " + prop3);

        $("#txtFilialNombreN_ad").val(prop1);
        $("#txtIDFilialNew_ad").val(prop);
        $("#txtFilialDireccionNew_ad").val(prop2);
        $("#txtFilialTelefonoNew_ad").val(prop3);

        $("#modalEditarFilial").modal('show');

    });
    
    $(document).on("keypress", "#txtFilialTelefonoNew_ad", function (tecla)
    {
        return verificaSoloNumeros($(this),9,tecla);
    });
    
    $(document).on("keypress", "#txtTelefono", function (tecla)
    {
        return verificaSoloNumeros($(this),9,tecla);
    });

    $(document).on("click", "#eFilialNew", function ()
    {
        var filial = $("#txtFilialNombreN_ad").val();
        var direccion = $("#txtFilialDireccionNew_ad").val();
        var telefono = $("#txtFilialTelefonoNew_ad").val();
        var idfilial = $("#txtIDFilialNew_ad").val();
        if (filial !== " " && direccion!==" " && telefono!==" ") {

            $("#modalEditarFilial").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarFilial',
                cache: false,
                data: {filial: filial, idfilial: idfilial, telefono: telefono, direccion: direccion},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });
    
    
    $(document).on("click", "[id*='eliminarFilial_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminar", "");
        var idF = res.split('_');
        filial = idF[0];
        var prop = idF[1];
        var prop1 = idF[2];
        
        $("#txtFilialNombreNew_ad").html(prop1);
        $("#txtIDFilialNew_ad").val(prop);

        $("#modalEliminarFilial").modal('show');


    });
    
    $(document).on("click", "#eliminarFilialSI", function ()
    {
        var filial = $("#txtIDFilialNew_ad").val();

        $("#modalEliminarFilial").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarFilial',
            cache: false,
            data: {filial: filial},       
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });
    
    
    
    //COLEGIO 24-03-15}
    //
    
    $(document).on("click", "[id*='editarColegio_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editarColegio", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        
        alert(prop + " " + prop1);

        $("#txtIdColegio_ad").val(prop);
        $("#txtColegioN_ad").val(prop1);

        $("#modalEditarColegio").modal('show');

    });
    
    $(document).on("click", "#edColegioNew", function ()
    {
        var idcolegio = $("#txtIdColegio_ad").val();
        var colegio = $("#txtColegioN_ad").val();
        

        if (idcolegio!==" " && colegio!==" ") {

            $("#modalEditarColegio").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarColegio',
                cache: false,
                data: {idcolegio: idcolegio, colegio: colegio},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });
    
    
    $(document).on("click", "[id*='eliminarColegio_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminarColegio", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        
        $("#txtNombreColegio_ad").html(prop1);
        $("#txtIDColegio_ad").val(prop);

        $("#modalEliminarColegio").modal('show');


    });
    
    $(document).on("click", "#eliminarColegioSI", function ()
    {
        var colegio = $("#txtIDColegio_ad").val();

        $("#modalEliminarColegio").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarColegio',
            cache: false,
            data: {colegio: colegio},       
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });
    
    
    
    
    //FIN 24-03-15



});

































$(document).ready(function () {

    $(document).on("click", "#btnGuardarAreas", function ()
    {
        var nombreArea = $("#txtNombreArea").val();
        if (nombreArea !== "") {
            iniciaAnimacionModal();

            $.ajax({
                type: "POST",
                url: 'administrador/GuardarAreas',
                data: {nombre: nombreArea},
                cache: false,
                success: function (html) {
                    finalizaAnimacion("ok");
//                        alert("Se guardaron" + html);
                    recargandome();
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });

    $(document).on("click", "[id*='editar_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editar", "");
        var idA = res.split('_');
        idarea = idA[0];
        var prop = idA[1];
        var prop1 = idA[2];

        $("#txtAreaNombreNew_ad").val(prop1);
        $("#txtIDAreaNombreNew_ad").val(prop);

        $("#modalEditarArea").modal('show');

    });

    $(document).on("click", "#eAreaNew", function ()
    {
        var area = $("#txtAreaNombreNew_ad").val();
        var idarea = $("#txtIDAreaNombreNew_ad").val();
        if (area !== " ") {

            $("#modalEditarArea").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarArea',
                cache: false,
                data: {area: area, idarea: idarea},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });


    $(document).on("click", "[id*='eliminar_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminar", "");
        var idA = res.split('_');
        idarea = idA[0];
        var prop = idA[1];
        var prop1 = idA[2];
        
        
        $("#txtAreaNombre_ad").html(prop1);
        $("#txtIDAreaNombre_ad").val(prop);

        $("#modalEliminarArea").modal('show');


    });
    
    $(document).on("click", "#eliminarAreaSI", function ()
    {
        var area = $("#txtIDAreaNombre_ad").val();

        $("#modalEliminarArea").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarArea',
            cache: false,
            data: {area: area},            
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });


    $(document).on("click", "#btnGuardarCurso", function ()
    {
        var nombreCurso = $("#txtNombreCurso").val();
        var nombreArea = $("#sArea").val();
        if (nombreArea !== "" && nombreCurso !== "") {
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/guardarCurso',
                data: {nombreC: nombreCurso, nombreA: nombreArea},
                cache: false,
                success: function (html) {
                    finalizaAnimacion("ok");
                    recargandome();
                }
            });
        }
        else {
            alert("El campo es obligatorio");
        }
    });
    
    $(document).on("click", "[id*='editarCurso_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editarCurso", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        var prop2 = idC[3];
        
        alert(prop + " " + prop1 + " " + prop2);

        $("#txtArea_ad").html(prop2);
        $("#txtIDcursoNew1_ad").val(prop);
        $("#txtCursoN_ad").val(prop1);

        $("#modalEditarCurso").modal('show');

    });
    
    $(document).on("click", "#edCursoNew", function ()
    {
        var idc = $("#txtIDcursoNew1_ad").val();
        var curso = $("#txtCursoN_ad").val();
        
        alert(idc + "  " + curso);

        if (idc!==" " && curso!==" ") {

            $("#modalEditarCurso").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarCursos',
                cache: false,
                data: {idc: idc, curso: curso},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });
    
    
    $(document).on("click", "[id*='eliminarCurso_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminar", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        var prop2 = idC[3];
        
        $("#txtAreaCursoNombreNew_ad").html(prop1);
        $("#txtIDAreaCursoNew_ad").val(prop);
        $("#txtCursoNew_ad").html(prop2);

        $("#modalEliminarCurso").modal('show');


    });
    
    
    $(document).on("click", "#eliminarCursoSI", function ()
    {
        var curso = $("#txtIDAreaCursoNew_ad").val();

        $("#modalEliminarCurso").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarCurso',
            cache: false,
            data: {curso: curso},       
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });

    $(document).on("click", "#btnGuardarFilial", function ()
    {
        var filial = $("#txtFilial").val();
        var direccion = $("#txtDireccion").val();
        var telefono = $("#txtTelefono").val();
        if (filial !== "" && direccion !== "" && telefono !== "") {
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/guardarFilial',
                data: {f: filial, d: direccion, t: telefono},
                cache: false,
                success: function (html) {
                    finalizaAnimacion("ok");
                    recargandome();
                }
            });
        } else {
            alert("El campo es obligatorio");
        }
    });
    
    
    $(document).on("click", "[id*='editarFilial_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editarFilial", "");
        var idF = res.split('_');
        filial = idF[0];
        var prop = idF[1];
        var prop1 = idF[2];
        var prop2 = idF[3];
        var prop3 = idF[4];
        
        alert(prop + " " + prop1 + " " + prop2 + " " + prop3);

        $("#txtFilialNombreN_ad").val(prop1);
        $("#txtIDFilialNew_ad").val(prop);
        $("#txtFilialDireccionNew_ad").val(prop2);
        $("#txtFilialTelefonoNew_ad").val(prop3);

        $("#modalEditarFilial").modal('show');

    });
    
    $(document).on("keypress", "#txtFilialTelefonoNew_ad", function (tecla)
    {
        return verificaSoloNumeros($(this),9,tecla);
    });
    
    $(document).on("keypress", "#txtTelefono", function (tecla)
    {
        return verificaSoloNumeros($(this),9,tecla);
    });

    $(document).on("click", "#eFilialNew", function ()
    {
        var filial = $("#txtFilialNombreN_ad").val();
        var direccion = $("#txtFilialDireccionNew_ad").val();
        var telefono = $("#txtFilialTelefonoNew_ad").val();
        var idfilial = $("#txtIDFilialNew_ad").val();
        if (filial !== " " && direccion!==" " && telefono!==" ") {

            $("#modalEditarFilial").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarFilial',
                cache: false,
                data: {filial: filial, idfilial: idfilial, telefono: telefono, direccion: direccion},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });
    
    
    $(document).on("click", "[id*='eliminarFilial_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminar", "");
        var idF = res.split('_');
        filial = idF[0];
        var prop = idF[1];
        var prop1 = idF[2];
        
        $("#txtFilialNombreNew_ad").html(prop1);
        $("#txtIDFilialNew_ad").val(prop);

        $("#modalEliminarFilial").modal('show');


    });
    
    $(document).on("click", "#eliminarFilialSI", function ()
    {
        var filial = $("#txtIDFilialNew_ad").val();

        $("#modalEliminarFilial").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarFilial',
            cache: false,
            data: {filial: filial},       
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });
    
    
    
    //COLEGIO 24-03-15}
    //
    
    $(document).on("click", "[id*='editarColegio_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("editarColegio", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        
        alert(prop + " " + prop1);

        $("#txtIdColegio_ad").val(prop);
        $("#txtColegioN_ad").val(prop1);

        $("#modalEditarColegio").modal('show');

    });
    
    $(document).on("click", "#edColegioNew", function ()
    {
        var idcolegio = $("#txtIdColegio_ad").val();
        var colegio = $("#txtColegioN_ad").val();
        

        if (idcolegio!==" " && colegio!==" ") {

            $("#modalEditarColegio").modal('hide');
            iniciaAnimacionModal();
            $.ajax({
                type: "POST",
                url: 'administrador/actualizarColegio',
                cache: false,
                data: {idcolegio: idcolegio, colegio: colegio},
                success: function (html) {
                    recargandome();
                    finalizaAnimacion("ok");

                }
            });
        }
    });
    
    
    $(document).on("click", "[id*='eliminarColegio_']", function ()
    {
        var str = $(this).attr("id");
        var res = str.replace("eliminarColegio", "");
        var idC = res.split('_');
        curso = idC[0];
        var prop = idC[1];
        var prop1 = idC[2];
        
        $("#txtNombreColegio_ad").html(prop1);
        $("#txtIDColegio_ad").val(prop);

        $("#modalEliminarColegio").modal('show');


    });
    
    $(document).on("click", "#eliminarColegioSI", function ()
    {
        var colegio = $("#txtIDColegio_ad").val();

        $("#modalEliminarColegio").modal('hide');
        iniciaAnimacionModal();
        $.ajax({
            type: "POST",
            url: 'administrador/eliminarColegio',
            cache: false,
            data: {colegio: colegio},       
            error: function (jqXHR, textStatus, errorThrown) {
                finalizaAnimacion(textStatus);
            },
            success: function (html) {
                recargandome();
                finalizaAnimacion("ok");
                
            }
        });
    });
    
    
    
    
    //FIN 24-03-15



});
