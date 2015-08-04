 <!--Modal Eliminar-->
<div id="modalEliminarBoletin" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hiddem="true">&times;</button>
                <h4>¿Esta seguro que desea eliminar?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" >
                        <div class="col-lg-4">
                            <label class="control-label">Nombre Area</label>
                        </div>
                        <div class="col-lg-8">
                            <div id="txtNombreBoletin_ad"></div>
                            <input type="hidden" id="txtIDBoletin_ad">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <input type="button" value="Eliminar" id="eliminarBoletinSI" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--Fin modal eliminar-->   

<div >

    <table  class="table table-bordered table-hover" >
        <thead>

            <tr>
                <th >Nº</th>
                <th >Mes</th>
                <th >Fecha</th>
                <th >Descripción</th>
                <th >Eliminar</th>
            </tr>

        </thead>

        <tbody>

             <?php
                $numeroPDF = 0;
                foreach ($arrayDataNuevo as $fila) {

                    echo '<tr>';
                    $numeroPDF++;
                    echo '<td  WIDTH="15" >' . $numeroPDF . '</td>';
                    echo '<td   >' . $fila['name_mes'] . '</td>';
                    echo '<td   >' . $fila['fecha'] . '</td>';
                    echo '<td   >' . $fila['nombreArchivo'] . '</td>';
                    echo '<td   >';
                    echo "<img src='img/eliminar.png' style='width:20px' class='puntero' id='eliminarBoletin_" . $fila['idboletin'] . "_" . $fila['nombreArchivo'] . " '>"; 
                    echo '</td>';

                    echo '</tr>';
                }
                ?>


        </tbody>
    </table>
    <br>
    <h4>PDF subidos al sistema: <strong><?= $numeroPDF ?></strong> </h4>
    </div>