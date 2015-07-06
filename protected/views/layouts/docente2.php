<?php $this->beginContent('//layouts/general'); ?>



<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu "  id="docente/perfil" ><i class="fa fa-dashboard"></i> Perfil Docente </a>
            </li>

            <li>
                 <a   id="docente/registro_notas" ><i class="fa fa-dashboard"></i> Registrar Notas </a>
                <!--<a href="#"><i class="fa fa-sitemap"></i> Registrar Notas<span class="fa arrow"></span></a>-->
            </li>
            
             <li>
                <a href="#"><i class="fa fa-sitemap"></i> Ver Horarios<span class="fa arrow"></span></a>
            </li>
            
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">

        <input type="hidden" value="docente" id="imputTipoUsuario"/>

        <?php // echo $content; ?>

    </div>
    <!-- /. PAGE INNER  -->
</div>

<?php $this->endContent(); ?>