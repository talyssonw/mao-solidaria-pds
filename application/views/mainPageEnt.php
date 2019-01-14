<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php 
   if ($formerror) {
      echo ("<div class=' col-sm-4 alert alert-warning'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Atenção!</strong>".$formerror."</div>");
    }
  ?>  
<br>
<div class="container">
<center>
    <div class="row profile">
      <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
              
                <div class="profile-userpic">
                    <img src="<?php echo base_url($this->session->userdata('url')); ?>" class="img-responsive" style="max-height: 250px; max-width: 258px; border:3px solid #80ccff;" alt="">
                </div>
              
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $this->session->userdata('name') ?>
                    </div>
                    <div class="profile-usertitle-job">
                    Entidade Credenciada
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS 
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div> -->
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            Account Settings </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('projetosController/callCadProj'); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Adicionar Projeto </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('projetosController/callProjList'); ?>">
                            <i class="glyphicon glyphicon-th-list"></i>
                            Meus Projetos </a>
                        </li>
                        <li>
                            
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
          </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
            </div>
        </div>
    </div>

  </center>
</div>
</body>
</html>