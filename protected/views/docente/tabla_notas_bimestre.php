
<style type = "text/css">
    .tg {border-collapse:collapse;
         border-spacing:0;
    }
    .tg td{font-family:Arial, sans-serif;

           border-style:solid;
           border-width:1px;
           overflow:hidden;
           word-break:normal;
    }
    .tg th{font-family:Arial, sans-serif;
           /*           font-size:14px;
                      font-weight:normal;*/
           padding:10px 5px;
           border-style:solid;
           border-width:1px;
           overflow:hidden;
           word-break:normal;
    }
    .tg .tg-s6z2{text-align:center}


    .list-group.panel > .list-group-item {
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px
    }
    .list-group-submenu {
        margin-left:20px;
    }
</style>

<script language="javascript" type="text/javascript">

    $(document).ready(function () {

        var arregloP = Array();
        var arregloT = Array();
        var arregloCC = Array();
        var arregloCB = Array();

        arregloP = <?php //echo json_encode($arrayPesos, JSON_PRETTY_PRINT) ?>;
        arregloT = <?php // echo json_encode($arrayTotales, JSON_PRETTY_PRINT) ?>;
        arregloCC = <?php // echo json_encode($arrayControlCapacidades, JSON_PRETTY_PRINT) ?>;
        arregloCB = <?php // echo json_encode($arrayControlBimestre, JSON_PRETTY_PRINT) ?>;

        ultimoValor = 0;
        idanio = 0;
        idbimestre = 0;

//        $(document).on("keyup", "[id*='E-']", function ()
//        {
////             alert('acaaaaaaaa');
//            var identificador = $(this).attr("id").split("_");
//
//            celda = identificador[0].split("-");
//            idcelda = celda[1];
//
//            alumno = identificador[1].split("-");
//            idalumno = alumno[1];
//
//            evaluacion = identificador[2].split("-");
//            idevaluacion = evaluacion[1];
//
//            capacidad = identificador[3].split("-");
//            idcapacidad = capacidad[1];
//
//            totalCapacidad = arregloT['C-' + idcapacidad];
//            totalBimestre = arregloT['PB'];
//
//            sumaproductos = 0;
//
//            for (i = 0; i < arregloCC[idcapacidad].length; i++) {
//                idcolumna = arregloCC[idcapacidad][i];
//                sumaproductos = parseFloat($("input[id*='CEL-" + idcolumna + "_A-" + idalumno + "']").val() * arregloP[idcolumna]) + sumaproductos;
//            }
//
//            promedioCapacidad = sumaproductos / totalCapacidad;
//            $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "']").html(parseInt(promedioCapacidad));
//
//
//            if (promedioCapacidad < 10.5) {
//                $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "']").css("color", "red");
//
//            } else {
//                $("[id*='A-" + idalumno + "_PC-" + idcapacidad + "']").css("color", "blue");
//            }
//
//            sumaproductos = 0;
//            for (i = 0; i < arregloCB.length; i++) {
//                idcolumna = arregloCB[i];
//                sumaproductos = parseFloat($("[id*='CEL-" + idcolumna + "_A-" + idalumno + "']").html() * arregloP[idcolumna]) + sumaproductos;
//            }
//
//            promedioBimestral = sumaproductos / totalBimestre;
//            $("[id*='A-" + idalumno + "_PB']").html(parseInt(promedioBimestral));
//
//
//            if (promedioBimestral <= 10.5) {
//                $("[id*='A-" + idalumno + "_PB']").css("color", "red");
//            } else {
//                $("[id*='A-" + idalumno + "_PB']").css("color", "blue");
//            }
//
//        });
//
//
//        //VALIDAR Q LLEGUE HASTA 20 Y QUE SEA NUEMERO;
//        $(document).on("keypress", "input[id*='E-']", function (tecla)
//        {
//            longitudmax = $(this).val().length;
//            teclaIncorrecta = false;
//
//            valor = $(this).val() + (tecla.charCode - 48);
//
//            if (valor <= 10.5) {
//                $(this).css("color", "red");
//
//            } else if (valor <= 20) {
//
//                $(this).css("color", "blue");
//            }
//
//            if (tecla.charCode < 48 || tecla.charCode > 57 || longitudmax > 1 || valor > 20) {
//                return false;
//            }
//        });
//
//
//        $(document).on("focusin", "input[id*='E-']", function ()
//        {
//            ultimoValor = $(this).val();
//        });
//
//
//        $(document).on("focusout", "input[id*='E-']", function ()
//        {
//            valorActual = $(this).val();
//
//            nota = $(this).val();
//
//            if (nota === '') {
//                nota = 0;
//                $(this).val(nota);
//            }
//
//            if (ultimoValor !== valorActual)
//            {
//                $.ajax({
//                    type: "POST",
//                    url: '////<?php echo Yii::app()->request->baseUrl; ?>/docente/ajax_actualiza_nota',
//                    cache: false,
//                    data: {idevaluacion: idevaluacion, idcompetencia: idcapacidad,
//                        idbimestre: idbimestre, idalumno: idalumno, idanio: idanio, nota: nota},
//                    success: function (html) {
//                        //alert(html);
//                        // $(iddestino).html(html);
//                    }
//                });
//
//            } else {
//                // alert('NO ACUTLIZAR');
//            }
//        });
//

        //COMBO AÑO ACADEMICO
        $(document).on("change", "#cbanio", function ()
        {
            $("#CargaContenido2").toggle("slow");
            idanio = $("#cbanio").val();
//            alert(idanio);
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->request->baseUrl; ?>/docente/ajax_carga_cursosasignados',
                cache: false,
                data: {idanio: idanio},
                success: function (html) {
                    $('#CargaContenido2').html(html);
                    $("#CargaContenido2").toggle("slow");
                }
            });
        });

        //COMBO BIMESTRE
        $(document).on("change", "#cbbimestre", function ()
        {
            // $("#CargaContenido2").toggle("slow");
//            idanio = $("#cbanio").val();
            var contenidoAjax = $('#CargaContenido2');
            contenidoAjax.html('<p><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/ajax-loader1.gif" /></p>');
            idbimestre = $("#cbbimestre").val();

            $.ajax({
                type: "POST",
                data: {idanio: idanio, bimestre: idbimestre},
                url: '<?php echo Yii::app()->request->baseUrl; ?>/docente/ajax_carga_tabla_notaxbimestre',
                cache: false,
                success: function (html) {
                    $('#CargaContenido2').html(html);
                    // $("#CargaContenido2").toggle("slow");
                }
            });
        });

        //CUANDO SE SELEECIONA UN CURSO 
        $(document).on("click", "[id*='idcurso_']", function ()
        {
            var identificador = $(this).attr("id").split("_");
            var idcurso = identificador[1];
            var contenidoAjax = $('#CargaContenido');
            contenidoAjax.html('<p><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/ajax-loader1.gif" /></p>');
            //alert(idcurso);
            $.ajax({
                type: "POST",
                url: '<?php echo Yii::app()->request->baseUrl; ?>/docente/ajax_carga_combobox_bimestre',
                data: {idcurso: idcurso},
                cache: false,
                success: function (html) {
                    $('#CargaContenido').html(html);
                    $('#CargaContenido2').html("");
//                  $('#CargaContenidoEncabezado').toogle("slow");
                }
            });
        });
    });

</script>

<div class="row" >
    <!--
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Mensajes</a></li>
        </ul>-->



</div>
</br>

<div class="row" >

    <!--BARRA DE MENU-->    
    <div class="col-xs-12  col-sm-4 col-md-4 col-lg-2" align="center">

        <div class="row">

            <div id="MainMenu">
                <div class="list-group panel">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/docente/curso" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Cursos Asignados</a>

                    <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Foros</a>
                    <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Mis Asistencias</a>
                    <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Carga Horaria</a>

                </div>
            </div>

            <!--            <div id="MainMenu">
                            <div class="list-group panel">
                                <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 3</a>
                                <div class="collapse" id="demo3">
                                    <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Subitem 1 <i class="fa fa-caret-down"></i></a>
                                    <div class="collapse list-group-submenu" id="SubMenu1">
                                        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 1 a</a>
                                        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 2 b</a>
                                        <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
                                        <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
                                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
                                        </div>
                                        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
                                    </div>
                                    <a href="javascript:;" class="list-group-item">Subitem 2</a>
                                    <a href="javascript:;" class="list-group-item">Subitem 3</a>
                                </div>
                                <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4</a>
                                <div class="collapse" id="demo4">
                                    <a href="" class="list-group-item">Subitem 1</a>
                                    <a href="" class="list-group-item">Subitem 2</a>
                                    <a href="" class="list-group-item">Subitem 3</a>
                                </div>
                            </div>
                        </div>-->
        </div>
    </div>

    <!--TABLA DE NOTAS-->
<!--        <pre>
        //<?php // print_r($arrayCompetencias); ?>
        //<?php // print_r($arrayCabecera); ?>
    </pre>-->

    <div class="col-xs-12  col-sm-8 col-md-8 col-lg-10" >
        </br>

        <div class="row" id="CargaContenidoEncabezado">

            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#">Notas Bimestre</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/docente/carga_pdf_reportes_x_bimestre"> Reporte Notas Bimestrales</a></li>
            </ul>

        </div>

        </br>

        <!--ACA PARA PARA CARGAR LOS DATOS--> 
        <div class="row" id="CargaContenido">
            <label class="control-label col-sm-2 col-lg-2">Elige el año: </label>
            <div class="col-xs-12  col-sm-6 col-md-6 col-lg-4" >
                <select class="form-control" id="cbanio">
                    <option value="0">Seleccion año ...</option>
                    <option value="2015">2015</option>
                </select>
            </div>    
        </div>

        </br>

        <div class="row" id="CargaContenido2">

        </div>
        </br>

        <div class="row" >

        </div>
    </div>
</div>




