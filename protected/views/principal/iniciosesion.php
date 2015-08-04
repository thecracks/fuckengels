<div  class="col-md-12 col-xs-12" style="background-color: white">
    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->
        <br />
        <div class="row col-md-12 col-xs-12">
            <div class="col-md-8  hidden-xs hidden-sm">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!--<img class="img-responsive" src="<?php echo Yii::app() -> request -> baseUrl; ?>/NC/img/SIGA.jpg" alt="">-->
                        <center><img src="http://cdn.makeagif.com/media/1-26-2015/S5kxXM.gif" alt=""></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12">
                <div class="panel panel-default" style="text-align: CENTER">
                    <div class="panel-heading">
                        <h4><!--<i class="fa fa-fw fa-gift"></i>--> LOGIN </h4>
                    </div>
                    <div class="panel-body">
                        <form class="omb_loginForm" action="<?php echo Yii::app() -> request -> baseUrl; ?>/principal/acceso" autocomplete="off" method="POST" name="frmlogin">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="txtuser" type="text" class="form-control" name="username" placeholder="Usuario" required="true">
                        </div>
                        <span class="help-block"></span>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="txtpass"  type="password" class="form-control" name="password" placeholder="Contraseña" required="true">
                        </div>
                        <br />
                        <input type="submit" value="INGRESAR" class="btn btn-lg btn-primary btn-block">
                        <br />
                    </form>
                        <button class="btn btn-lg btn-primary btn-block" >
                            <a href="http://engels.edu.pe/webmail"><font style="color:white">Correo Corporativo</font></a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
