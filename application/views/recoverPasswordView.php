<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="form-group">
					<div class="alert-danger"><?php echo $this->session->flashdata('errorCNPJ'); ?></div>
					<form method="POST" action="<?= base_url('entidade-password-forgot-email') ?>">
							<div class="alert-info"><h3>Esqueceu sua senha? Basta digitar seu e-mail e enviaremos um e-mail para você com as instruções!</h3></div>
							<input class="form-control" type="text" name="entEmail" id="entEmail" required>
						</div>
						<button class="form-control btn btn-primary" type="submit">Enviar Solicitação</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>