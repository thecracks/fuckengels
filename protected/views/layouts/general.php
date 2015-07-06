<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Intranet-Engels</title>
        <!-- Bootstrap Styles-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/custom-styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css"/>
        <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-modal.css"/>-->
        <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css"/>-->



<!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-1.10.2.js"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-1.11.0.min.js"></script>
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>-->
<!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-modalmanager.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-modal.js"></script>-->


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/matricula.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/preregistro_alumno.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/preregistro_docente.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/asistencia.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/detalle_institucional.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/formula_area.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/carga_horaria.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/asignacion_curso_docente.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/registro_academico.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/boletinNotas.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/config_evaluaciones_alumno.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/reporte_notas_alumno.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/seguimiento_ingresonotas_docente.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/alumno/asistencias.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/alumno/perfilalumno.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/alumno/perfilapoderado.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/alumno/seguimiento_evaluacion.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/docente/perfil_docente.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/docente/registro_notas.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {

                hasreload = true;

                objetoCargaAnimacion = null;
                arrayHtmls = new Array();
                arrayIndexes = new Array();
                index = -1;
//               var ultimoindex = -1;
                /////////////////////////
                //EVENTOS
                /////////////////////////

                $("[id*='/']").addClass("puntero");
                $(document).on("click", "a[id*='/']", function ()
                {
                    hasreload = true;


                    idOrigen = $(this).attr("id");
                    rutaDestino = "<?= Yii::app()->request->baseUrl ?>" + "/" + idOrigen;
                    $("[id*='/']").removeClass("active-menu");
                    $(this).addClass("active-menu");
                    index = buscaRepetido(idOrigen);

                    if (index != -1) {

                        $('#page-inner').toggle(10, function () {
                            $("#page-inner").html(arrayHtmls[index]);
                            $('#page-inner').toggle(100);
//                            ultimoindex = index;
                        });

                    } else {

                        iniciaAnimacionLocal($('#page-inner'));
                        $.ajax({
                            type: "POST",
                            url: rutaDestino,
                            cache: false,
                            error: function () {
                                finalizaAnimacion("foul");
//                                ultimoindex = -1;
                            },
                            success: function (html) {

                                $('#page-inner').toggle(0, function () {
                                    $("#page-inner").html(html);
                                    $('#page-inner').toggle(100);
                                });

                                arrayIndexes.push(idOrigen);
                                arrayHtmls.push(html);

                                cargaCBnivelTotal();
                                agregaPropiedadesInput();

//                                ultimoindex = arrayIndexes.length - 1;
//                                window.history.pushState({
//                                    "html": html,
//                                    "pageTitle": 'nueva'
//                                }, "", idOrigen);
                            }
                        });
                    }
                });
                $(document).on("click", "[id='liCambiaConfiguracionGlobal_general']", function ()
                {
                    $('#modalConfiguracionGlobal_general').modal('show');
                });


                $(document).on("click", "[id='btnAcetarConfiguracionGlobal']", function ()
                {
                    $('#modalConfiguracionGlobal_general').modal('hide');
                    var idfilial = $("#cbfilialglobal_general").val();
                    var idanio = $("#cbanioglobal_general").val();
                    var nFilial = $("#cbfilialglobal_general option:selected").html();
                    iniciaAnimacionModal();
                    $.ajax({
                        type: "POST",
                        url: 'administrador/SetConfiguracionGlobal',
                        data: {idanio: idanio, idfilial: idfilial, nombreFilial: nFilial},
                        cache: false,
                        error: function () {
                            finalizaAnimacion("foul");
                        },
                        success: function () {
                            finalizaAnimacion("ok");
                            seteaTextoCG();
                            location.reload();
                        }
                    });
                });




                /////////////////////////
                //OTRAS COSAS
                /////////////////////////

                tipoUsuario = $('#imputTipoUsuario').val();
                cargaDatosPrevios(tipoUsuario);
                cargaLogoutparaUsuario(tipoUsuario);
            });
            //FUNCIONES EXTERNASASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
            //FUNCIONES EXTERNASASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
            //FUNCIONES EXTERNASASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
            //FUNCIONES EXTERNASASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS


            function agregaPropiedadesInput() {

                $(":input").attr("onpaste", "return false");
            }

            function cargaLogoutparaUsuario() {
                var urllogout = '<?php echo Yii::app()->request->baseUrl; ?>';
                if (tipoUsuario != "alumno" && tipoUsuario != "docente")
                    urllogout += '/' + 'administrador' + '/logout';
                else
                    urllogout += '/' + tipoUsuario + '/logout';
                $("#logoutx").attr("href", urllogout);
            }


            function buscaRepetido(idorigen) {

                for (var prop in arrayIndexes)
                    if (arrayIndexes[prop] == idorigen)
                        return prop;
                return -1;
            }



            function cargaDatosPrevios(usuario) {

//                alert(usuario);
                if (tipoUsuario == "alumno") {
//                    cargaCGalumno();
                    cargafechasCalendario();
                } else if (tipoUsuario == "docente")
                {
//                    cargaCGdocente();
                } else if (tipoUsuario == "admin")
                {
//                    cargaCGadmin();
                    cargaCGdefaultadmin();
                } else if (tipoUsuario == "secretaria")
                {
                    cargaCGsecretaria();
                } else if (tipoUsuario == "tutor")
                {
                    cargaCGsecretaria();
                }
            }

            function recargandome() // FUNCION PARA RECARGAR LA PAGINA ACTUAL
            {
                iniciaAnimacionLocal($('#page-inner'));
                index = buscaRepetido(idOrigen);
                $.ajax({
                    type: "POST",
                    url: rutaDestino,
                    cache: false,
                    error: function (jqXHR, textStatus, errorThrown) {
                        finalizaAnimacion(textStatus);
                        hasreload = false;
                    },
                    success: function (html) {
                        $('#page-inner').toggle(0, function () {
                            $("#page-inner").html(html);
                            $('#page-inner').toggle(100);
                        });
                        agregaPropiedadesInput();
                        cargaCBnivelTotal();

                        arrayHtmls[index] = html;
                        hasreload = true;

                        $('html, body').animate({scrollTop: 0}, 1000);
                    }
                });
            }

            function restartHasReload() {
                hasreload = false;
            }


            function alerta(Encabezado, Contenido) { //para un alert configurado

                if (Encabezado != "")
                    $("#lbEncabezadoAlert").html(Encabezado);
                else
                    $("#lbEncabezadoAlert").html("ADVERTENCIA");
                if (Contenido != "")
                    $("#lbTextoAlert").html(Contenido);
                else
                    $("#lbTextoAlert").html("NO HAS ESCRITO NINGUN MENSAJE");
                $("#modalAlert").modal('show');
            }

            function iniciaAnimacionLocal(objeto) {//para que apareza el la imagen de cargando en una parte de la pagina actual...
                objetoCargaAnimacion = objeto;
                objetoCargaAnimacion.html('<div class="form-group has-warning has-feedback">' +
                        '<label class="control-label" for="inputWarning2"><img class="tamminiincono" src="img/ajax-loader1.gif" />' +
                        'Ejecutando acción ...</label></div>');
//                $("#modalLoading").modal('show');
            }

            function iniciaAnimacionModal() {//para que apareza el la imagen de cargando en una ventana modal...
                objetoCargaAnimacion = $('#contenedorParaCargar');
                objetoCargaAnimacion.html('<div class="form-group has-warning has-feedback">' +
                        '<label class="control-label" for="inputWarning2"><img class="tamminiincono" src="img/ajax-loader1.gif" />' +
                        'Ejecutando acción ...</label></div>');
                $("#modalLoading").modal('show');
            }

            function finalizaAnimacion(estado) { // para despues de la carga verifica si los acciones han sido correctos
                if (estado == "ok")
                    objetoCargaAnimacion.html('<div class="form-group has-success has-feedback">' +
                            '<label class="control-label" for="inputWarning2">Acción ejecutada correctamente</label></div>');
                else
                    objetoCargaAnimacion.html('<div class="form-group has-error has-feedback">' +
                            '<label class="control-label" for="inputWarning2">ERROR! no se ha realizado la acción</label></div>');
                setTimeout('ocultaLoading()', 700);
            }

            function ocultaLoading() {
                $("#modalLoading").modal('hide');
            }

            function muestramodalelimina(Encabezado, Contenido) { //para un alert configurado

                if (Encabezado != "")
                    $("#lbEncabezadoAlertElimina").html(Encabezado);
                else
                    $("#lbEncabezadoAlertElimina").html("ADVERTENCIA");
                if (Contenido != "")
                    $("#lbTextoAlertElimina").html(Contenido);
                else
                    $("#lbTextoAlertElimina").html("NO HAS ESCRITO NINGUN MENSAJE");
                $("#modalAlertElimina").modal('show');
            }

            function ocultamodalelimina() {
                $("#modalAlertElimina").modal('hide');
            }



            //////////////// FUNCIONES DE VERIFICACIONNNNN DE CAMPOS DE TEXTO

            function verificaCorreo(email) {
                var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!expr.test(email))
                    return false;
                else
                    return true;
            }

            function verificaSoloNumeros(objeto, longmax, tecla) {
                var longcurrent = objeto.val().length;
                longmax = longmax - 1;
                if (tecla.charCode < 48 || tecla.charCode > 57 || longcurrent > longmax) {
                    if (tecla.charCode == 8 || tecla.charCode == 127)
                        return true;
                    else
                        return false;
                }
                else
                    return true;
            }

            function verificaSoloTexto(objeto, bloquesMaximos, tecla) {
                var contenidoCurrent = objeto.val();
                var nbloques = contenidoCurrent.split(" ").length;
                if (nbloques === bloquesMaximos && tecla.charCode == 32)
                {
                    return false;
                } else if (tecla.charCode == 32 || (tecla.charCode >= 65 && tecla.charCode <= 122) ||
                        (tecla.charCode >= 129 && tecla.charCode <= 154) || (tecla.charCode >= 160 && tecla.charCode <= 255))
                {
                    return true;
                }
                else
                    return false;
            }



            //////////////// FUNCIONES PARA CARGAR DATOS PREDETERMINADOS

            function cargaCBnivelTotal() {

                var idcbtotal = $("[id*='cbnivel']");
                idcbtotal.html('<option value="0">Seleccione nivel ..</option>');
                idcbtotal.append('<option value="Inicial">Inicial</option>');
                idcbtotal.append('<option value="Primaria">Primaria</option>');
                idcbtotal.append('<option value="Secundaria">Secundaria</option>');
            }

            function cargaCBgrado(objetox, objetoy) {

                objetoy.html('');
                objetoy.append('<option value="0" selected="selected">Grados/años ...</option>');
                if (objetox.val() == "Inicial") {
                    objetoy.append('<option value="1" >3 años</option>');
                    objetoy.append('<option value="2" >4 años</option>');
                    objetoy.append('<option value="3" >5 años</option>');
                } else if (objetox.val() != "0")
                {
                    objetoy.append('<option value="Primero" >Primero</option>');
                    objetoy.append('<option value="Segundo" >Segundo</option>');
                    objetoy.append('<option value="Tercero" >Tercero</option>');
                    objetoy.append('<option value="Cuarto" >Cuarto</option>');
                    objetoy.append('<option value="Quinto" >Quinto</option>');
                    if (objetox.val() == "Primaria") {
                        objetoy.append('<option value="Sexto" >Sexto</option>');
                    }
                }
            }


            function cargaCBSeccion(objCbseccion, nivel, grado) { // PARA CARGAR LOS COMBO BOX SECCION PARA CADA CASO REQUERIDO
                
                console.log(objCbseccion);

                if (tipoUsuario == "alumno") {

                } else if (tipoUsuario == "docente")
                {

                } else if (tipoUsuario == "admin")
                {
                    console.log("dentro0");
                    $.ajax({
                        type: "POST",
                        url: 'administrador/Cargasecciones',
                        data: {nivel: nivel, grado: grado},
                        cache: false,
                        error: function (jqXHR, textStatus, errorThrown) {
//                            finalizaAnimacion(textStatus);
                        },
                        success: function (jsonseccioens) {

                            var objsecciones = JSON.parse(jsonseccioens);
                            
                            console.log("dentro1");
                            objCbseccion.html('');
                            console.log("dentro2");
                            objCbseccion.append('<option selected value="0" >Sección ... </option>');
                            
                            console.log("dentro3");

                            for (var prop in objsecciones)
                            {
                                objCbseccion.append('<option  value="' + objsecciones[prop].idseccion + '" >' + objsecciones[prop].seccion + '</option>');
                            }
                        }
                    });

                } else if (tipoUsuario == "secretaria")
                {

                } else if (tipoUsuario == "tutor")
                {
                }
            }


            /////////////////// FUNCIONES PAR LA CONFIGURAICON GLOBAL
            /////////////////// FUNCIONES PAR LA CONFIGURAICON GLOBAL}

            function cargaCGdefaultadmin() {

                var objJsondatosDefault = null;
                $.ajax({
                    type: "POST",
                    url: 'administrador/CargaDatosDefaultCGadmin',
                    data: {tipo: 'anio'},
                    cache: false,
                    error: function (jqXHR, textStatus, errorThrown) {
                        finalizaAnimacion(textStatus);
                    },
                    success: function (JsondatosDefault) {
                        objJsondatosDefault = JSON.parse(JsondatosDefault);
                        cargaCGadmin(objJsondatosDefault);
                    }
                });
            }


            function cargaCGadmin(JsondatosDefault) {

                var objCbfilial = $('#cbfilialglobal_general');
                var objJsonfiliales = null;
                $.ajax({
                    type: "POST",
                    url: 'administrador/CargaDatosCGadmin',
                    data: {tipo: 'filial'},
                    cache: false,
                    error: function (jqXHR, textStatus, errorThrown) {
                        finalizaAnimacion(textStatus);
                    },
                    success: function (JsonFiliales) {

                        objJsonfiliales = JSON.parse(JsonFiliales);
                        objCbfilial.html('');
                        for (var prop in objJsonfiliales)
                        {
                            if (objJsonfiliales[prop].idfilial == JsondatosDefault.idfilial) {
                                objCbfilial.append('<option selected value="' + objJsonfiliales[prop].idfilial + '" >' + objJsonfiliales[prop].Distrito + '</option>');
                            }
                            else {
                                objCbfilial.append('<option  value="' + objJsonfiliales[prop].idfilial + '" >' + objJsonfiliales[prop].Distrito + '</option>');
                            }
                            seteaTextoCG();
                        }
                    }
                });

                var objCbanio = $('#cbanioglobal_general');
                var objJsonanios = null;
                $.ajax({
                    type: "POST",
                    url: 'administrador/CargaDatosCGadmin',
                    data: {tipo: 'anio'},
                    cache: false,
                    error: function (jqXHR, textStatus, errorThrown) {
                        finalizaAnimacion(textStatus);
                    },
                    success: function (JsonAnios) {
                        objJsonanios = JSON.parse(JsonAnios);
                        objCbanio.html('');
                        for (var prop in objJsonanios)
                        {
                            if (objJsonanios[prop].idanio == JsondatosDefault.idanio)
                                objCbanio.append('<option selected value="' + objJsonanios[prop].idanio + '" >' + objJsonanios[prop].idanio + '</option>');
                            else
                                objCbanio.append('<option value="' + objJsonanios[prop].idanio + '" >' + objJsonanios[prop].idanio + '</option>');
                        }
                        seteaTextoCG();
                    }
                });
            }

            function seteaTextoCG()
            {
                var filial = $("#cbfilialglobal_general option:selected").html();
                var anio = $("#cbanioglobal_general").val();

                $('#aTextoConfiguracion_general').html('<i  class="fa fa-gear fa-fw"></i>' + filial + ' / ' + anio + '');


            }


            //////////// FUNCIONES DE NAVEGACION
            //////////// FUNCIONES DE NAVEGACION
            //////////// FUNCIONES DE NAVEGACION



            $(document).on("click", "[id='liRecargarPaginaActual_general']", function ()
            {
                recargandome();
            });


            /////////// FUNCIONES DE IMPRESION

            function imprimirSegmento(iddiv)
            {
                var ficha = document.getElementById(iddiv);
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write(ficha.innerHTML);
                ventimp.document.close();
                ventimp.print();
                ventimp.close();
            }



        </script>

    </head>

    <body>



        <!--PARA ELIMINAR ELEMENTOS MODALLLLLLLLLLLLLLLLLLLLL-->

        <div class="modal fade  in " id="modalAlertElimina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="lbEncabezadoAlertElimina"></h4>

                    </div>

                    <div class="modal-body">
                        <!--INICIO-->

                        <div class="row">
                            <label id="lbTextoAlertElimina" for="txtformulaarea" class="col-lg-12 control-label"></label>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-success" id="btnConfirmarEliminar">Confirmar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-success" id="">Cancelar</button>
                    </div> 
                </div>
            </div>
        </div>  
        <!--FIN    NNNNNNNNNNN PARA ELIMINAR ELEMENTOS MODALLLLLLLLLLLLLLLLLLLLL-->



        <!--PARA LA CONFIGURACION GLOBAL VENTANA MODALLLLLLLLLLLLLLLLLLLLL-->
        <div class="modal  fade in " id="modalConfiguracionGlobal_general" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" 
             >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="lbEncabezadoAlert">CONFIGURACIÓN GLOBAL</h4>

                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-7 col-lg-7">
                                <label id="" class="control-label">Elija el año global: </label>
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-5">
                                <select class="form-control" id='cbanioglobal_general'>

                                </select>
                            </div>

                        </div> 
                        <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-7 col-lg-7">
                                    <label id="" class="control-label">Elija la filial global: </label>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <select class="form-control" id='cbfilialglobal_general'>

                                    </select>
                                </div>

                            </div> 

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnAcetarConfiguracionGlobal">ACEPTAR</button>
                        <button type="button" data-dismiss="modal" class="btn btn-success" >Cancelar</button>
                    </div> 
                </div>
            </div>
        </div>  
        <!--FIN PARA LA CONFIGURACION GLOBAL -->




        <!--PARA LA ADVERTENCIA VENTANA MODALLLLLLLLLLLLLLLLLLLLL-->
        <div class="modal  fade in " id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" 
             >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="lbEncabezadoAlert">ATENCIÓN</h4>

                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <label id="lbTextoAlert" class="col-lg-12 control-label"></label>
                        </div> 
                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-success" id="btnAcetarAlert">Aceptar</button>
                        <!--<button type="button" data-dismiss="modal" class="btn btn-primary" id="btnCancelarAlert">CANCELAR</button>-->
                    </div> 
                </div>
            </div>
        </div>  
        <!--FIN PARA LA ADVERTENCIA-->



        <!--PARA LA FINTA DE CARGA DE PAGINA: VENTANA MODALLLLLLLLLLLLLLLLLLLLL data-backdrop="false" -->

        <div class="modal  fade in " id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
             data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">

                        <!--<button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>-->
                        <h4 id="lbEncabezadoAlert">Procesando ...</h4>

                    </div>

                    <div class="modal-body">
                        <div class="row" id="contenedorParaCargar">

                        </div> 
                        <br>

                    </div>
                    <!--                    <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn btn-success" id="btnAcetarAlert">Aceptar</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnCancelarAlert">CANCELAR</button>
                                        </div> -->

                </div>
            </div>
        </div>  
        <!--FIN PARA LA ADVERTENCIA-->



        <div id="wrapper">
            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <a class="navbar-brand" >Engels Class</a>

                </div>

                <ul class="nav navbar-top-links navbar-left">
                    <li title="Atrás"><a class="puntero"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> </span> Atrás</a></li>
                    <li title="Adelante"><a class="puntero"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> </span> Adelante</a></li> 
                    <li title="Recargar actual" id="liRecargarPaginaActual_general"><a class="puntero"><span class="glyphicon glyphicon-repeat" aria-hidden="true"> </span> Recargar actual</a></li> 
                    <li title="Recarga todo"><a class="puntero"><span class="glyphicon glyphicon-refresh" aria-hidden="true"> </span> Recargar todo</a> </li> 
                </ul>

                <ul class="nav navbar-top-links navbar-right">

                    <li title="Cambiar" id="liCambiaConfiguracionGlobal_general"><a class="puntero" id='aTextoConfiguracion_general'><i  class="fa fa-gear fa-fw"></i></a></li>
                    <li title="Salir"><a id="logoutx" class="puntero"><i  class="fa fa-sign-out fa-fw"></i> Salir</a></li>

                    <!--                    <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user">
                                                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a id="logoutx" class="puntero"><i  class="fa fa-sign-out fa-fw"></i> Logout</a>
                                                </li>
                                            </ul>
                                             /.dropdown-user 
                                        </li>
                    -->
                </ul>

            </nav>


            <?php echo $content; ?>



            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- JS Scripts-->
        <!-- jQuery Js -->
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-1.10.2.js"></script>-->
        <!-- Bootstrap Js -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
        <!-- Metis Menu Js -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.metisMenu.js"></script>
        <!-- Morris Chart Js -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/raphael-2.1.0.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/morris.js"></script>
        <!-- Custom Js -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/custom-scripts.js"></script>


    </body>

</html>