<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mão Solidária</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <!-- CSS variados -->
    <link href="<?= base_url('assets/css/variados.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="base_url('assets/files/default-images/icon.ico')">

    <script src="<?= base_url('assets/js/jquery-3.2.0.min.js'); ?>"></script>

    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- javascript para usar máscaras -->
    <script src="<?= base_url('assets/js/jquery.maskedinput.js') ?>"></script>
    <script src="<?= base_url('assets/js/utilidades.js') ?>"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>

    <style type="text/css">
        .navbar-login
        {
            width: 305px;
            padding: 10px;
            padding-bottom: 0px;
            background:  #ffffff;
        }

        .navbar-login-session
        {
            padding: 10px;
            padding-bottom: 0px;
            padding-top: 0px;
            background:  #ffffff;
        }

        .icon-size
        {
            font-size: 87px;
        }
    </style>
    <style type="text/css">

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
    </style>
    <style type="text/css">
        .brand-centered {
  display: flex;
  justify-content: center;
  position: absolute;
  width: 100%;
  left: 0;
  top: 0;
}
.brand-centered .navbar-brand {
  display: flex;
  align-items: center;
}
.navbar-toggle {
    z-index: 1;
}




/* CSS Transform Align Navbar Brand Text ... This could also be achieved with table / table-cells */
.navbar-alignit .navbar-header {
      -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
  height: 50px;
}
.navbar-alignit .navbar-brand {
    top: 50%;
    display: block;
    position: relative;
    height: auto;
    transform: translate(0,-50%);
    margin-right: 15px;
  margin-left: 15px;
}





.navbar-nav>li>.dropdown-menu {
    z-index: 9999;
}

body {
  font-family: "Lato";
}
.fb_box{
    margin: 20px;
    background-color: #FFF0DD;
    padding: 10px;
    border: #F7CFCF solid 1px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
}
.fb_box .image{ text-align:center;}
    </style>
    
</head>

<body>
<div>
      <img src="<?= base_url('assets/files/default-images/banner') ?>" class="img-responsive" style="border-style: solid;
    border-bottom: solid #f2f2f2;">
</div>
<?php if($this->session->userdata()){
    $imgp = $this->session->userdata('url');
    } ?>
    <!-- Navigation -->
<div class="container">
  <nav class="navbar navbar-default" style="padding-top: 10px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar9">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      
      <div class="brand-centered">
      <a class="navbar-brand" href="<?= base_url('main-page')?>"><img style="margin-right: 10px; padding: 0;" src="<?= base_url('assets/files/default-images/header') ?>" alt="Dispute Bills">
      </a>
      </div>
      
      <div id="navbar9" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a href="<?= base_url('projetos') ?>"  data-toggle="tooltip" title="Projetos">Projetos</a>
            </li>
                            <li><a href="<?= base_url('appEntidadeController/call_search_entidades_mainpage') ?>"  data-toggle="tooltip" title="Entidades Cadastradas" >Parceiros</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
                      <?php if($this->session->userdata('logged_in')){ ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span>
                    <?php echo $this->session->userdata('name'); ?>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-login hidden-sm hidden-xs">
                            <div class="row">
                                <div class="col-lg-4 hidden-sm hidden-xs">
                                    <p class="text-center">
                                        <img src="<?php if($this->session->userdata('oauth_provider')=='facebook'){
                                            echo $imgp;
                                        }else{
                                            echo base_url($imgp);
                                        }                                  
                                         ?>" width="50px" height="50px" style="border: 1px" class="img img-circle" >
                                    </p>
                                </div>
                                <div class="col-lg-8 hidden-sm hidden-xs" style="background: #ffffff;">
                                    <p class="text-left"><strong><?php echo $this->session->userdata('name'); ?></strong></p>
                                    <p class="text-left small"><?php echo $this->session->userdata('email'); ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="divider navbar-login-session-bg"></li>
                    <?php if($this->session->userdata('user_type')==0){  ?>
                    <li><a href="<?= base_url('entidade-edit-profile/'.$this->session->userdata('id')) ?>">Configurações de Conta <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                    <li class="divider"></li>
                    
                    <?php } ?>
                    <?php if($this->session->userdata('user_type')==0){ ?>
                    <li><a href="<?= base_url('add-project'); ?>">Adicionar Projeto <span class="glyphicon glyphicon-plus pull-right"></span></a></li>
                    <li class="divider"></li>

                    <?php } ?> 
                    <?php if($this->session->userdata('user_type')==0){ ?>
                    <li><a href="<?= base_url('project-list/'.$this->session->userdata('id')); ?>">Meus Projetos <span class="badge pull-right"> <?php echo $this->session->userdata('proj_count') ?> </span></a></li>

                    <li class="divider"></li>
                    
                    <?php }else{ ?>
                    <li><a href="<?= base_url('user-project-list/'.$this->session->userdata('id')); ?>">Meus Projetos <span class="badge pull-right"> 0 </span></a></li>
                    <li class="divider"></li>
                    <?php } ?>

                    <?php if ($this->session->userdata('user_type')==0) { ?>
                    <li><a href="<?= base_url('entidade-user-project-request/'.$this->session->userdata('id')) ?>">Requisições de Participação <span class="glyphicon glyphicon-share-alt pull-right"></span></a></li>
                    <li class="divider"></li>
                    	
                   <?php } ?>
                    <li><a href="<?= base_url('User_authentication/logout');  ?>">Sair <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                </ul>
            </li>
            <?php }else{ ?>
            <li>
                <a href="<?= base_url('select-register-type-form'); ?>">Quero Participar!</a>
            </li>
            <li>
                <a href="<?= base_url('User_authentication/index') ?>" ><span class="glyphicon glyphicon-log-in" ></span> Entrar</a>
            </li>
            <?php } ?>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>

</div>
<!-- Page Content -->
<div class="col-sm-12">
    <center> 
        <?php echo $contents; ?>
        <!-- carregar view--> 
    </center>
    <!-- MODAL -->
    <div id="modalLogin" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">                                
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Acesso</h4>
                </div>
                <form name="logarEntidade" action="<?= base_url('entidade-login');?>" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <p>E-mail</p>
                            <i class="glyphicon glyphicon-user"></i>
                            <input type="email" id="entEmail" name="entEmail" class="modal-content">
                        </div>

                        <div class="form-group"> 
                            <p>Senha</p>   
                            <i class="glyphicon glyphicon-lock"></i>                                          
                            <input type="password" id="password" name="password" class="modal-content">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div align="center">
                            <button type="submit" class="btn btn-outline-success">Acessar</button>
                            <a href="<?= base_url('User_authentication/index') ?>" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i> Logar(usuários)</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Footer -->
</div>
<div class="col-sm-12" style="margin-top: 10%; background-color: #f2f2f2; border-top: solid #e6e6e6;">
            <div class="text-center">
                    <img src="<?= base_url('assets/files/default-images/footerlogo') ?>" style="width: 50px; height: 50px;">

        </div>
    <div class="col-sm-12" >
        <a href="<?php echo base_url('login-admin'); ?>"   data-toggle="tooltip" title="Painel Administrativo" type="button" class="glyphicon glyphicon-lock pull-middle"></a>
        <p class="pull-right">Todos direitos reservados a Talysson Wesley.</p>

    </div>

</div>
</body>
</html>
