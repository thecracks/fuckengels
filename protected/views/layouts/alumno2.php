<?php $this->beginContent('//layouts/general'); ?>



<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu "  id="alumno/perfil" ><i class="fa fa-dashboard"></i> Perfil Alumno </a>
            </li>

            <li>
                <a   id="alumno/perfil_apoderado"> <i class="fa fa-dashboard"></i> Perfil Apoderado </a>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Boletines <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a   id="alumno/boletinNotas"> Resultados de Examenes </a>
                    </li>
                    <li>
                        <a href="#" > Tareas </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Información Académica<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a id="alumno/verasistencias" >Asistencia</a>
                    </li>
                    <li>
                        <a id="alumno/seguimiento_evaluacion" >Seguimiento evaluación</a>
                    </li>
<!--                    <li>
                                                <a href="alumno/estadistica" >Promedio curso</a>
                        <a id="alumno/estadistica" >Promedio curso</a>
                    </li>-->

                </ul>
            </li>

            <li>
                <a id="a/a"><i class="fa fa-sitemap"></i> Horarios </a>
            </li>
        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <input type="hidden" value="alumno" id="imputTipoUsuario"/>

    <div id="page-inner">

        <?php echo $content; ?>

    </div>
    <!-- /. PAGE INNER  -->
</div>

<?php $this->endContent(); ?>