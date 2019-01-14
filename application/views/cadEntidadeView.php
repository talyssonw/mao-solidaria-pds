<div class="col-md-offset-2 mainbody container-fluid">
	<form name="cadEntidade"  action="<?= base_url('appEntidadeController/cadAppEntidade'); ?>"  method="POST" enctype="multipart/form-data">
		<div class="mainbody container-fluid">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3>Cadastro de Entidade</h3>
								<?php echo validation_errors(); 

								 	echo $this->session->flashdata('errorCad');
								  ?>
							
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
							<h3 class="panel-title pull-left">Dados da Entidade</h3>
							<br><br>
								<label for="entidade_name">Nome da Entidade</label>
								<input type="text" class="form-control" id="entName" placeholder="Nome da Entidade" name="entName"  value="<?php echo set_value('entName') ?>" required>
								<br>
								<label for="entidade_cnpj">CNPJ</label>
								<input type="text" class="form-control" id="entCnpj" name="entCnpj" placeholder="CNPJ da Entidade" onblur="if(!validarCNPJ(this.value)) {
									alert('CNPJ informado não é válido');
									this.value='';}" value="<?php echo set_value('entCnpj') ?>" required>

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


					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="panel-title pull-left">Informações Adicionais</h3>
							<br>
							<br>
							<label for="entidade_cidade">Cidade</label>
							<select type="text" name="entCity" placeholder="Cidade" class="form-control" id="entCity">
								<option value="Torres">Torres</option>
							</select>
							<br>
							<label for="entidade_bairro">Bairro</label>
							<input type="text" placeholder="Bairro" class="form-control" name="entNeighb" id="entNeighb" value="<?php echo set_value('entNeighb') ?>" required>
							<br>
							<label for="entidade_bairro">Endereço</label>
							<input type="text" class="form-control" placeholder="Ex: Rua Manoel Lopes, 07" name="entAdress" id="entAdress" value="<?php echo set_value('entAdress') ?>" required>
							<br>
						</div>
					</div>
					<hr>
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="panel-title pull-left">Contato</h3>
							<br><br>
							<label for="entPhone">Telefone</label>
							<input type="text" class="form-control entPhone" name="entPhone" id="entPhone" value="<?php echo set_value('entPhone') ?>" required>
							<br>
							<label for="entEmail">E-mail</label>
							<input type="email" class="form-control" id="entEmail" name="entEmail"  value="<?php echo set_value('entEmail') ?>" required>
						</div>
					</div>
					<button class="btn btn-default"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Enviar Cadastro</button>
				</div>
			</div>
		</div>
	</div>
</form>
</div>