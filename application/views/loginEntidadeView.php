    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 
            <div class="alert-danger"><?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('loginError');
                echo $this->session->flashdata('error'); ?>
            </div>
            <div class="alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Acesso para Entidades</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="<?= base_url('appEntidadeController/recover_password_form') ?>">Esqueceu sua senha?</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">
                    </div>

                    <form id="loginform" name="enviarInfosAplicacao" action="<?php echo base_url('entidade-login');?>" method="post">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="entEmail" type="email" class="form-control" name="entEmail" value="<?php echo set_value('entEmail') ?>" placeholder="CNPJ" required>                                        
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Senha" required>
                        </div>



                        <div class="input-group">
                          <div class="checkbox">
                            <label>
                              <input id="login-remember" type="checkbox" name="remember" value="1"> Lembrar de Mim
                          </label>
                      </div>
                  </div>


                  <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                      <button type="submit" id="btn-login" class="btn btn-success">Login  </button>
                  </div>
              </div>


              <div class="form-group">
                <div class="col-md-12 control">
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                        É uma entidade e não tem uma conta?
                        <a href="<?= base_url('entidade-register-form')?>">
                            Clique aqui!
                        </a>
                        <br>
                        É usuário e quer participar? 
                        <a href="<?php echo base_url('user-register-form') ?>">
                        Clique aqui!
                        </a>
                        <br>
                        <?php
if(!empty($authUrl)) {
    echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/flogin.png" alt=""/></a>'; }  ?>
                    </div>
                </div>
            </div>    
        </form>     



    </div>                     
</div>  
</div>
</div>
     