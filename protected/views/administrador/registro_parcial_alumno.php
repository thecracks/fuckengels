<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center> REGISTRO ALUMNO</center>
            </div>

            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#preregistro_alumno_ad" data-toggle="tab">Preregistro Alumno</a>
                    </li>
                    <li class=""><a href="#listado_alumnosregistrados_ad" data-toggle="tab">Listado de alumnos</a>
                    </li>
                    <li class=""><a href="#reporte_alumnosregistrados_ad" data-toggle="tab">Reportes</a>
                    </li>

                </ul>
                <br>


                <div class="tab-content">

                    <!--PARA EL REGISTRO DE ALUMNOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

                    <div class="tab-pane fade active in" id="preregistro_alumno_ad">

                        <div class="container-fluid">

                            <div class="row" id="registro">

                                <div class="col-lg-12">

                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Nombre Completo</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtnombres" onpaste="return false"
                                                   placeholder="Nombres">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Apellido Paterno</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtapellidopaterno"
                                                   placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Apellido Materno</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtapellidomaterno"
                                                   placeholder="Apellido Materno">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Usuario Generado</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtusuario" disabled="true"
                                                   placeholder="Usuario Generado">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Contraseña (DNI Apoderado)</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtcontra"
                                                   placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Colegio de Procedencia</label>
                                        <div class="col-lg-6">

                                            <select class="form-control" id="cbcolegiop_ad">
                                                <option value="0" >Selecciona colegio de procedencia</option>
                                                <?php
                                                foreach ($dataColegiosP as $fila) {
                                                    echo '<option value="' . $fila['idcolegiop'] . '">' . $fila['nombreColegio'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-lg-1">

                                            <button id="btnAgregarColegioP" class="btn btn-success">Agregar..</button>


                                        </div>
                                    </div>
                                    <br>
                                    <!--
                                    
                                                                        <div class="row" ID="cargaContenidoArea">
                                    
                                                                        </div>-->

                                    <div class="row">

                                        <div class="col-lg-12 ">
                                            <input  type="button" value="Confirmar" id="btnConfirmar" class="btn btn-success autoajustable">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--PARA EL LISTADOOOOOO DE ALUMNOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

                    <div class="tab-pane fade  in" id="listado_alumnosregistrados_ad">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="txtnombreOapellidos_ad" onpaste="return false"
                                           placeholder="Escribe nombre o apellido">
                                </div>

                            </div>
                            <br>
                            <div class="row" >
                                <div class="table-responsive" id="div_tabla_alumnosInscritos_ad">

                                </div> 
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--PARA EDITAR A LA PERSONA VENTANA MODALLLLLLLLLLLLLLLLLLLLL-->

<div class="modal fade  in " id="modal_editar_datospersonas_ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="lbEncabezadoAlert">EDITAR DATOS DE ALUMNO</h4>

            </div>

            <div class="modal-body">
                <!--INICIO-->

                <div class="row">
                    <label for="txtformulaarea" class="col-lg-6 control-label">Alumno Id</label>
                    <div class="col-lg-6">
                        <label for="txtformulaarea" class="col-lg-6 control-label " id="lb_idalumnoedit_ad"></label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="txtformulaarea" class="col-lg-6 control-label">Nombre Completo</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="txt_nombrealumnoedit_ad" onpaste="return false"
                               placeholder="Nombres">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="txtformulaarea" class="col-lg-6 control-label">Apellido Paterno</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="txt_ApaternoAlumnoedit_ad"
                               placeholder="Apellido Paterno">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="txtformulaarea" class="col-lg-6 control-label">Apellido Materno</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="txt_AmaternoAlumnoedit_ad"
                               placeholder="Apellido Materno">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="txtformulaarea" class="col-lg-6 control-label">Usuario Generado</label>
                    <div class="col-lg-6">
                        <label for="txtformulaarea" class="col-lg-6 control-label" id="lb_usuarioAlumnoedit_ad"></label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="txtformulaarea" class="col-lg-6 control-label">Contraseña (DNI Apoderado)</label>
                    <div class="col-lg-6">
                        <label for="txtformulaarea" class="col-lg-6 control-label" id="lb_contraAlumnoedit_ad"></label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="txtformulaarea" class="col-lg-6 control-label">Colegio de Procedencia</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="cbcolegiopedit_ad">
                            <option value="0" >Selecciona colegio de procedencia</option>
                            <?php
                            foreach ($dataColegiosP as $fila) {
                                echo '<option value="' . $fila['idcolegiop'] . '">' . $fila['nombreColegio'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-success" id="btnConfirmarEditarAlumnoInscrito_ad">Confirmar</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnCancelarEdicionAlumnoIncrito">Cancelar</button>
            </div> 
        </div>
    </div>
</div>  







<!--PARA ELIMINAR A LA PERSONA VENTANA MODALLLLLLLLLLLLLLLLLLLLL-->

<div class="modal fade  in " id="modal_eliminar_datospersonas_ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="lbEncabezadoAlert">ELIMINAR ALUMNO</h4>

            </div>

            <div class="modal-body">
                <!--INICIO-->

                <div class="row">
                    <label for="txtformulaarea" class="col-lg-12 control-label">¿Desea eliminar este alumno?<br>Nota:
                        Se eleminarán todos los registros correspondientes a este alumno (matrícula, notas, asistencia).</label>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-success" id="btnConfirmarEliminarAlumnoInscrito_ad">Confirmar</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnCancelarEdicionAlumnoIncrito">Cancelar</button>
            </div> 
        </div>
    </div>
</div>  




<div class="modal fade in " id="modal_agregar_colegio" tabindex="-1"   aria-hidden="true"
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Agregar Colegio</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label class="control-label">Colegio</label>


                    </div>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="txtNewColegio" id="txtNewColegio">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="aceptarColegioNuevo">AGREGAR</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary">CANCELAR</button>
            </div>

        </div>
    </div>
</div>