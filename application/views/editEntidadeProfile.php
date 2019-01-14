<?php foreach ($entidade as $e) { ?>
<?php echo validation_errors(); ?>
<form name="updateProfile"  action="<?php echo base_url('entidade-update-profile/'.$this->session->userdata('id')); ?>"  method="POST" enctype="multipart/form-data">
<div class="mainbody container-fluid">
    <div class="row">
        <div style="padding-top:50px;"> </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="panel-title pull-left" style="font-size:30px;"><i class="fa fa-cogs" aria-hidden="true"></i> Configurações de Perfil</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="panel-title pull-left" style="font-size:30px;">Meu Perfil</h1>
                </div>
            </div>
                        <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Imagem de Perfil</h3>
                    <br><br>
                    <div align="center">
                        <div class="form-inline">
                            <div class="col-lg-12 col-md-12">

                                <label>Imagem Atual</label><br>
                                <img class="img-thumbnail img-responsive" id="imgteste" src="<?php echo base_url($e->urlImg); ?>" width="300px" height="300px">
                            </div>
                            <!-- <div class="col-lg-12 col-md-12">
                                <input type="file" id="img" name="img" onchange="onFileSelected(event);" style="visibility: hidden;">
                                <label class="btn btn-primary" for="img"><i class="fa fa-upload" aria-hidden="true"></i> Escolher nova foto de perfil</label>
                                <br>
                                <br>
                                <label>Nova Imagem de Perfil</label>
                                <br>
                                <img class="img-thumbnail img-responsive" id="myimage" width="300px" height="300px">
                            </div> -->
                        </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Dados da Entidade</h3>
                    <br><br>
                    <form class="form-horizontal">
                        <label for="entidade_name">Nome da Entidade</label>
                        <input type="text" class="form-control" id="entName" name="entName"  value="<?php echo $e->name; ?>" required>
                        <br>
                        <label for="entidade_cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="entCnpj" name="entCnpj"  value="<?php echo $e->cnpj; ?>" required>

                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Informações Adicionais</h3>
                        <br>
                        <br>
                        <label for="entidade_cidade">Cidade</label>
                        <input type="text" class="form-control" name="entCity" id="entCity" value="<?php echo $e->city ?>">
                        <br>
                        <label for="entidade_bairro">Bairro</label>
                        <input type="text" class="form-control" name="entNeighb" id="entNeighb" value="<?php echo $e->neighborhood; ?>" required>
                        <br>
                        <label for="entidade_bairro">Endereço</label>
                        <input type="text" class="form-control" name="entAddress" id="entAddress" value="<?php echo $e->adress; ?>" required>
                        <br>
                </div>
            </div>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Contato</h3>
                    <br><br>
                    <label for="entidade_telefone">Telefone</label>
                    <input type="text" class="form-control" name="entPhone" id="entPhone" value="<?php echo $e->phone ?>" required>
                    <br>
                    <label for="entidade_email">E-mail</label>
                    <input type="email" class="form-control" id="entEmail" name="entEmail"  value="<?php echo $e->email ?>" required>
                </div>
            </div>
                <button class="btn btn-default"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Atualizar Perfil</button>
        </div>
    </div>
</div>
</div>
</form>
<?php } ?>