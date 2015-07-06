<div class="row">


    <h1 align="center">Alumnos matriculados</h1>


    <!--<h3>Curso: Razonamiento Matemático</h3>-->
    <h2>FILIAL: El Porvenir </h2>
    <h3>Nivel: Secundaria</h3>
    <h3>Grado: 5to.</h3>

    <h4>Año:2014</h4>
    <table class="bordered" align="center">
        <thead>

            <tr>

                <th>Código Matricula</th>        
                <th>Alumno</th>
                <th>Sección</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($datos as $fila) {
                $i++;
                ?>
                <tr>
                    <!--<td><?= $i ?></td> -->
                    <td><?= $fila['idalumno'] ?></td> 
                    <td><?= $fila['Nombre'] ?></td> 
                    <td><?= $fila['letra'] ?></td> 
                </tr>

                <?php
            }
            ?>

        </tbody>
    </table>

</div>

