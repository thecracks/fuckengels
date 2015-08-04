
<section class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>REPORTE ASISTENCIA</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" id="tab_asistencia" data-toggle="tab">Ver Asistencia Reporte</a>
                    </li>
                    <li class=""><a href="#profile" id="tab_editarAsistencia" data-toggle="tab">Ver Asistencia en Calendario</a>
                    </li>
                    <li class=""><a href="#messages" id="tab_reporteAsistencia" data-toggle="tab">Reporte Asistencia</a>
                    </li>

                </ul>

                <div class="tab-content">

                    <br>
                    <br>

                    <div class="tab-pane fade active in" id="home">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="table-responsive">

                                    <table class = "tg table table-bordered">

                                        <thead>
                                            <tr>
                                                <th><strong>Día</strong></th>
                                                <th><strong>Mes</strong></th>
                                                <th><strong>Fecha</strong></th>
                                                <th><strong>Asistencia</strong></th>
                                                <th><strong>Justificación</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($datosAsistencias as $fila) {
                                                $date = date_create($fila['fecha']);
                                                $fechaFormateada = date_format($date, 'd-m-Y');
                                                ?>
                                                <tr>
                                                    <td><?= $fila['nombre_dia'] ?></td>
                                                    <td><?= $fila['nombre_mes'] ?></td>
                                                    <td><?= $fechaFormateada ?></td>
                                                    <?php
                                                    if ($fila['asistencia'] == 'F') {

                                                        echo '<td>Faltó</td>';
                                                    } else if ($fila['asistencia'] == 'A') {
                                                        echo '<td>Asistio</td>';
                                                    } else if ($fila['asistencia'] == 'T') {
                                                        echo '<td>LLegó Tarde</td>';
                                                    }
                                                    ?>

                                                    <td><?= $fila['justificacion'] ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " id="div_to_GeneraAsistencia">
                                <input type="button" value="Confirmar Asistencias" id="btnConfirmarAsistencias" class="btn btn-success" disabled="true">
                            </div>

                        </div>

                    </div>
                    <div class="row tab-pane fade" id="profile">



                        <div class="container-fluid">

                            <div align="center" ID="tableau" class="row">

                                <h4>Calendario</h4>
                                <hr>   

                                <form name="Calendrier">
                                    <table class="table table-bordered">
                                        <tr align="center">
                                            <td>
                                                <select name="Modes" tabindex="0" onchange="Mode()">
                                                    <option selected value="1">Mensual</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div id=SelMois>
                                                    <select id="cbmeses_asis_al" name="Mois" tabindex="1" onchange="Mode()">

                                                        <option value="0" selected=""> Enero</option>
                                                        <option value="1"> Febrero</option>
                                                        <option value="2"> Marzo</option>
                                                        <option value="3"> Abril</option>
                                                        <option value="4"> Mayo</option>
                                                        <option value="5"> Junio</option>
                                                        <option value="6"> Julio</option>
                                                        <option value="7"> Agosto</option>
                                                        <option value="8"> Setiembre</option>
                                                        <option value="9"> Octubre</option>
                                                        <option value="10"> Noviembre</option>
                                                        <option value="11"> Diciembre</option>

                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <select id="cbanio_asis_al" name="Annee" tabindex="2" onchange="Mode()">
                                                    <!--                                                    <option value="2014" selected="">2014</option>-->
                                                    <option value="2015"> 2015</option>
                                                    <option value="2016"> 2016</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr align="center">
                                            <td colspan="3">

                                                <div id="imprimible" >
                                                    <div id="tituloCalendario" ><H3>Calendario Asistencias Marzo 2015</H3></div>
                                                    <br>
                                                    <div align="center" ID=Cal>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                            <br>

                            <div class="row">
                                <table class="table columasiguales" >
                                    <tr>
                                        <td class="colortexto1 negrita">Faltó</td>
                                        <td class="colortexto2 negrita">Asistió</td>
                                        <td class="colortexto3 negrita">LLegó Tarde</td>
                                        <td class="colortexto4 negrita">No hubo clases</td>
                                    </tr>
                                </table>
                            </div>


                            <br>

                            <div class="row">
                                <button id="btnImprimirCalendario" value="Imprimir">Imprimir</button>
                            </div>



                        </div>



                    </div>
                    <div class="row tab-pane fade" id="messages">

                        <hr>




                    </div>

                </div>
            </div>
        </div>
    </div>
