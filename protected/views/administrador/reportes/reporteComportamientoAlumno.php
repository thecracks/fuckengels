
<div class="row">

    <table  class="table table-bordered table-hover" >
        <thead>
            <tr>
                <th >Nº</th>
                <th >Nombre</th>
                <th >Comportamiento</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $numero = 0;
            
            foreach ($arrayDataNuevo as $fila) {

                echo '<tr>';
                $numero++;
                echo '<td  WIDTH="15" >' . $numero . '</td>';
                echo '<td   >' . $fila['nombre'] . '</td>';

                echo '<td   >';
                ?>

        
            <input class="masterTooltip"  type="text" id="<?= "col_" . $fila['idbimestre'] . "_" . $fila['codigoMatricula']; ?>" value="<?=$fila['comportamiento'];?>">

            <?php
            echo '</td>';

            echo '</tr>';
        }
        
            
            
            

                
                
            
                
        ?>


        </tbody>
    </table>
    <br>
    <h4>Numero de Alumnos: <strong><?= $numero ?></strong> </h4>
</div>