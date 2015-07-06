<?php $this->beginContent('//layouts/general'); ?>



<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu"  id="administrador/principal" <i class="fa fa-dashboard"></i> Inicio</a>
            </li>

<!--href=" <?php echo Yii::app()->request->baseUrl . '/administrador/principal'; ?>"-->

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Personal<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a id="link_hola" >Personal Docente</a>
                    </li>
                    <li>
                        <a href="">Personal de Oficina</a>
                    </li>
                    <li>
                        <a href="">Personal de Servicio</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-sitemap"></i>Registro Plan Académico<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Registrar Área</a>
                    </li>
                    <li>
                        <a href="#">Registrar Curso</a>
                    </li>
                    <li>
                        <a href="#">Registrar Personal</a>
                    </li>
                    <li>
                        <a href="#">Asignar Curso Docente</a>
                    </li>
                
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Registrar Alumnos Nuevos  <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="#">Registrar Preinscripcion Alumnos<span class="fa arrow"></span></a>
                       

                    </li>
                    <li>
                        <a href="#">Listar Alumnos Preinscritos<span class="fa arrow"></span></a>
                       

                    </li>
                </ul>
            </li>



            <li>
                <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
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