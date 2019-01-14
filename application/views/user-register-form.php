<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<form name="user-register-form" action="<?= base_url('usuariosController/user_register_event'); ?>"  method="POST" enctype="multipart/form-data">
		<div class="mainbody container-fluid">
			<div class="row">
				<div style="padding-top:50px;"> </div>
				<div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
					<div class="panel panel-default">
						<div class="panel-body col-md-offset-5">
							<h1 class="panel-title pull-left" style="font-size:30px;">Cadastro de Usuário</h1>
						</div>
					</div>
				</div>
				
				<div class="col-lg-9 col-lg-offset-2 col-md-9 col-md-offset-2 col-sm-12 col-xs-12">

					<div class="panel panel-default">
						<div class="panel-body">
							
								<?php echo validation_errors(); 
								 	echo $this->session->flashdata('errorCad');?>
							
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="panel-title pull-left">Imagem de Perfil</h3>
							<br><br>
							<div align="center">
								<div class="form-inline">
									<div class="col-lg-12 col-md-12">

										<img class="img-thumbnail img-responsive" id="myimage" width="300px" height="300px">
										<input type="file" id="img" name="image" onchange="onFileSelected(event);" required>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="panel-title pull-left">Dados do Usuário</h3>
							<br><br>
								<label>Nome</label>
								<input type="text" class="form-control" id="userFirstName" placeholder="Nome" name="userFirstName"  value="<?php echo set_value('userFirstName') ?>" required>
								<br>
								<label>Sobrenome</label>
								<input type="text" class="form-control" id="userLastName" placeholder="Sobrenome" name="userLastName"  value="<?php echo set_value('userLastName') ?>" required>
								<br>
								<label>Data de Nascimento</label>
								<input type="date" class="form-control" id="userBirthDate" name="userBirthDate" value="<?php echo set_value('userBirthDate') ?>" required>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="panel-title pull-left">Senha</h3>
							<br><br>
							<form class="form-horizontal">                    	
								<div>
									<label>Senha</label>
									<input type="password" placeholder="Senha para Acesso" name="entPass" class="form-control" id="entPass" onkeyup="checkPass(); return false;" required>
								</div>
								<div>
									<label>Confirmação de Senha</label>
									<input type="password" placeholder="Senha para Acesso" name="entPassConf" class="form-control" id="entPassConf" onblur="checkPass(); return false;" required>	
									<span id="confirmMessage" class="confirmMessage"></span>			
								</div>
							</form>
						</div>
					</div>

					<hr>
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="panel-title pull-left">Contato</h3>
							<br><br>
							<label for="entPhone">Celular</label>
							<input type="text" class="form-control entPhone" name="userCellphone" id="entPhone" value="<?php echo set_value('userCellphone') ?>" required>
							<br>
							<label for="entEmail">E-mail</label>
							<input type="email" class="form-control" id="userEmail" name="userEmail"  value="<?php echo set_value('userEmail') ?>" required>
						</div>
					</div>
					<button class="btn btn-default"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancelar</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Enviar</button>
				</div>
			</div>
		</div>
	</div>
</form>
</body>
</html>