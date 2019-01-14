	<div class="row">
		<div class="col-lg-3 col-md-3 col-md-offset-0 hidden-sm hidden-xs">
			<div class="panel panel-default">
				<div class="panel-body">
					<h1 class="panel-title pull-left" style="font-size:30px;"><i class="glyphicon glyphicon-picture" aria-hidden="true"></i> Alteração de Imagem de Perfil</h1>
				</div>
			</div>
		</div>
		<?php echo $this->session->flashdata('errorCad'); ?>
		<div class="col-md-12 col-md-offset-3">	
			<form action="<?= base_url('appEntidadeController/change_profile_picture_event'); ?>"  method="POST" enctype="multipart/form-data">
				
				<div class="col-md-4">
					<div class="form-group">
						<div class="panel panel-default">
							<div class="panel panel-heading">
								Imagem atual
							</div>
							<div class="panel-body" align="center">
								<img src="<?= base_url($this->session->userdata('url')) ?>" class="img-responsive">
							</div>		
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<div class="panel panel-default">
							<div class="panel panel-heading">
								Imagem Nova
							</div>
							<div class="panel-body" align="center">
								<img class="img-thumbnail img-responsive" id="myimage" width="300px" height="300px">

							</div>
							<div class="panel-footer">
								<input type="file" id="img" name="image" onchange="onFileSelected(event);" required>	
							</div>		
						</div>
					</div>
				</div>				
				
			</div>

		</div>	
		<div class="row">
			<div class="col-md-12 col-md-offset-6">
				<button type="submit" class="btn btn-success">Alterar</button>
			</div>
		</div>
	</form>