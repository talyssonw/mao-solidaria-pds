<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="row text-center">
     <div class="col-sm-12">
     <form name="enviarInfosAplicacao" action="<?php echo base_url ('painel-admin') ?>" method="post">
          <div class="col-sm-6 col-sm-offset-3">
               <div class="alert-danger"><?php echo $this->session->flashdata('loginErrorAdmin'); ?></div>
               <label>Login</label>
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input type="text" name="login" class="form-control" id="entLogin" required>
          </div>

          <div class="col-sm-6 col-sm-offset-3"> 
               <label>Password</label>
               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input type="password" name="password" class="form-control" id="entPassword" required>
          </div>

          <div class="col-sm-12" style="margin-top: 10px;"> 

               <button type="submit" class="btn btn-info btn-lg" id="btnSubmitLogEntidade">Logar</button>
          </div>

     </form>

     </div>
</div>
</body>
</html>	