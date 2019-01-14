	<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
		<div class="panel panel-default">
			<div class="panel-body">
				<h1 class="panel-title pull-left" style="font-size:30px;"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i> Alteração de Senha</h1>
			</div>
		</div>
	</div>
	<form class="form-horizontal" action="<?= base_url('entidade-password-change-event') ?>" method="POST">
		<fieldset>
			<?php echo validation_errors();
			echo $this->session->flashdata('exceptionError'); ?>

			<!-- Form Name -->
			<legend></legend>

			<!-- Password input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="actualPassword">Senha Atual</label>
				<div class="col-md-4">
					<input id="actualPassword" name="actualPassword" type="password" placeholder="Senha Atual" class="form-control input-md" required>

				</div>
			</div>

			<!-- Password input-->             	
			<div>
				<label>Senha</label>
				<input type="password" placeholder="Senha para Acesso" name="entPass" class="form-control" id="entPass" onkeyup="checkPass(); return false;" required>
			</div>
			<br>
			<div>
				<label>Confirmação de Senha</label>
				<input type="password" placeholder="Senha para Acesso" name="entPassConf" class="form-control" id="entPassConf" onblur="checkPass(); return false;" required>	
				<span id="confirmMessage" class="confirmMessage"></span>
			</div>
			<!-- Button (Double) -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="bCancel"></label>
				<div class="col-md-8">
					<br>
					<button class="btn btn-success">Alterar</button>
				</div>
			</div>

		</fieldset>
	</form>
