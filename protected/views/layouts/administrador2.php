<?php $this->beginContent('//layouts/general'); ?>



<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <!--            <li>
                            <a class="active-menu"  id="administrador/perfil"  <i class="fa fa-dashboard"></i> Inicio</a>
                        </li>-->
            <li>
                <a  id="administrador/perfil"> <i class="fa fa-dashboard"></i> Perfil</a>
            </li>



            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Registro<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Personal<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a id="administrador/registroparcialdocente" >Docente</a>
                            </li>
                            <li>
                                <a id="" >Secretaria</a>
                            </li>
                            <li>
                                <a id="" >Coordinador</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">Académico<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a id="administrador/registrarFilial">Filial</a>
                            </li>
                            <li>
                                <a id="" >Sección</a>
                            </li>
                            <li>
                                <a id="administrador/registrarArea">Área</a>
                            </li>
                            <li>
                                <a id="administrador/registrarCurso">Curso</a>
                            </li>
                            <li>
                                <a id="administrador/registroColegios">Colegio</a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Publicar Boletines <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a id="administrador/boletinNotas">Boletin de Notas</a>
                    </li>
                </ul>
            </li>

            <li>
                <a   id="administrador/configuracionfilial"> <i class="fa fa-dashboard"></i> Configuración Filial</a>
                <!--aca se va registra en la tabla DETALLE INSTITUCIONAL, colocando que niveles y gradoes y secciones se van a dictar en dicha filial -->
            </li>


            <li>
                <a href="#"><i class="fa fa-sitemap"></i>Configuración Año Escolar<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a >Apertura Año Acadmico</a>
                    </li>
                    <li>
                        <a >Calendario Escolar</a>
                    </li>
                    <li>
                        <a >Programación Evaluaciones</a>
                    </li>
                    <li>
                        <a id="administrador/cargahoraria">Carga Horaria</a>
                    </li>

                    <li>
                        <a id="administrador/asignacion_curso_docente" >Asignar Docente Curso</a>
                    </li>

                    <li>
                        <a >Horarios</a>
                    </li>

                </ul>
            </li>


            <li>
                <a id="administrador/configuracionformulaarea"><i class="fa fa-sitemap"></i> Diseño Curricular </a>             
            </li>


            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Inscripcion  <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a id="administrador/Registroparcialalumno" >Alumno Nuevo</a>
                    </li>

                    <li>
                        <a id="administrador/matricula" >Matrícula</a>
                    </li>
                </ul>

            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Control y Seguimiento  <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="#">Alumno<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a id="administrador/asistencia" >Asistencias</a>
                            </li>

                            <li>
                                <a id="administrador/Cargareportenotasalumno" >Notas</a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="#">Docente<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a id="" >Asistencias</a>
                            </li>
                            
                            <li>
                                <a id="administrador/verificaingresonotas" >Ingreso de notas</a>
                            </li>

                        </ul>

                    </li>

                </ul>
            </li>
            
            <li>
                <a id="administrador/config_vista_evaluaciones_alumno"><i class="fa fa-sitemap"></i> Configurar vista alumno </a>             
            </li>




        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">

        <input type="hidden" value="<?= $_SESSION['rol'] ?>" id="imputTipoUsuario"/>

        <?php // echo $content; ?>

    </div>
    <!-- /. PAGE INNER  -->
</div>

<?php $this->endContent(); ?>