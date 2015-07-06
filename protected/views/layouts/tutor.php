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
                <a href="#"><i class="fa fa-sitemap"></i> Control y Seguimiento  <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="#">Alumno<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a id="administrador/asistencia" >Asistencias</a>
                            </li>

                            <li>
                                <a id="" >Notas</a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="#">Docente<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a id="" >Asistencias</a>
                            </li>

                        </ul>

                    </li>

                </ul>
            </li>

            <li>
                <a id="administrador/comportamiento"><i class="fa fa-sitemap"></i> Comportamiento </a>

            </li>




        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">

        <input type="hidden" value="administrador" id="imputTipoUsuario"/>

        <?php // echo $content; ?>

    </div>
    <!-- /. PAGE INNER  -->
</div>

<?php $this->endContent(); ?>