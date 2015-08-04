
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Boletin Notas</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <div class="container-fluid">
                            <div class="row" id="registroAreasAcademicas">
                                <div class="col-lg-12">
                                    <center><h3> Boletin Notas </h3></center>
                                    <hr />
                                    <div class="row">
 
                                        <table class="table table-striped" style="width:55%" align="center">
                                            <tr>
                                                <td>Mes</td>
                                                <td>Fecha Publicación</td>
                                                <td>Archivo</td>
                                            </tr>
                                            <?php
                                            foreach ($mostrar as $value) {
                                                echo "<tr>";
                                                
                                                echo "<td>";
                                                echo $value["name_mes"];
                                                echo "</td>";
                                                
                                                echo "<td>";
                                                echo $value["fecha"];
                                                echo "</td>";

                                                echo "<td>";
                                                echo "<a href='".$value["archivo"]."'>";echo $value["nombreArchivo"];echo "</a>";
                                                echo "</td>";
                                            }
                                            ?>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row tab-pane fade" id="listaBoletinNotas">
                        <div class="container-fluid">
                            <div class="panel-heading">
                                <center><h3>Lista de Boletines de Notas</h3></center>
                            </div>
                            <hr />
                            <div class="panel-body">
                                <table class="table table-striped" style="width:55%" align="center">
                                    <tr>
                                        <td>Descripción</td>
                                        <td>Fecha</td>
                                        <td>Eliminar</td>
                                    </tr>
                                    <?php
//                                    foreach ($mostrar as $value) {
//                                        echo "<tr>";
//                                        echo "<td>";
//                                        echo $value["idarea"];
//                                        echo "</td>";
//
//                                        echo "<td>";
//                                        echo $value["Descripcion"];
//                                        echo "</td>";
//
//                                        echo "<td>";
//                                        echo "<img src='img/editar.png' style='width:20px' class='puntero' id='editar_" . $value['idarea'] . "_" . $value['Descripcion'] . "'>";
//                                        echo "</td>";
//
//                                        echo "<td>";
//                                        echo "<img src='img/eliminar.png' style='width:20px' class='puntero' id='eliminar_" . $value['idarea'] . "_" . $value['Descripcion'] . " '>";
//                                        echo "</td>";
//                                    }
//                                    
                                    ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>