<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center> REGISTRO DOCENTE</center>
            </div>

            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active" id="li_preregistro_docente_ad"><a href="#preregistro_docente_ad" data-toggle="tab">Preregistro Docente</a>
                    </li>
                    <li class="" id="li_listado_docentesregistrados_ad"><a href="#listado_docentesregistrados_ad" data-toggle="tab">Listado de Docentes</a>
                    </li>


                </ul>
                <br>


                <div class="tab-content">

                    <!--PARA EL REGISTRO DE ALUMNOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

                    <div class="tab-pane fade active in" id="preregistro_docente_ad">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="row">
                                        <label class="col-lg-3 control-label">Nombre Completo</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtdocentenombres_preredocente_ad" onpaste="return false"
                                                   placeholder="Nombres">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Apellido Paterno</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtdocenteapellidopaterno_preredocente_ad"
                                                   placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Apellido Materno</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtdocenteapellidomaterno_preredocente_ad"
                                                   placeholder="Apellido Materno">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Usuario Generado</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtdocenteusuario_preredocente_ad" disabled="true"
                                                   placeholder="Usuario Generado">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="txtformulaarea" class="col-lg-3 control-label">Contraseña (DNI)</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="txtdocentecontra_preredocente_ad"
                                                   placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <br>

                                    <br>
    
                                    <div class="row" id="divcontentbtnregistrareditar_rpdocente">
                                        <div class="col-lg-12 ">
                                            <input  type="button" value="Confirmar" id="btnConfirmarregistro_preredocente_ad" class="btn btn-success autoajustable">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--PARA EL LISTADOOOOOO DE ALUMNOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

                    <div class="tab-pane fade  in" id="listado_docentesregistrados_ad">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="txtnombreOapellidosdocente_ad" onpaste="return false"
                                           placeholder="Escribe un fragmento del nombre o apellido -> pres: ENTER">
                                </div>

                                <div class="col-lg-1">
                                    <button title="Buscar" id="btnbuscardocentessimilares" type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </div>

                                <div class="col-lg-1">
                                    <button title="Ver más datos" id="btnvermasdatosdocentes_prdocente_ad" type="button" class="btn btn-success">
                                        Ver más datos</button>
                                </div>
                            </div>
                            <br>
                            <div class="row" >
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!--                                    <div class="container">-->
                                    <div class="table-responsive" id="div_tabla_docentesInscritos_ad">

                                    </div> 
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!--
PARA ELIMINAR A LA PERSONA VENTANA MODALLLLLLLLLLLLLLLLLLLLL

<div class="modal fade  in " id="modal_eliminar_datospersonas_ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="lbEncabezadoAlert">ELIMINAR ALUMNO</h4>

            </div>

            <div class="modal-body">
                INICIO

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
</div>  -->