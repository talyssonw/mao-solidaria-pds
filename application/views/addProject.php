	<div class="mainbody container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
										<?php echo validation_errors(); 
										echo $this->session->flashdata('errorCad');?>

				<div class="panel panel-default">
					<div class="panel-body">
						<h1 class="panel-title pull-left" style="font-size:30px;"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Adicionar Projeto</h1>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-md-offset-0">
				<form name="sendProjectInfo" action="<?php echo base_url('project-create');?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<legend for="usr">Título do Projeto</legend>
						<input type="title" name="projTitle" placeholder="Título do Projeto" class="form-control" id="projTitle" required>
					</div>

					<div class="form-group">
						<legend>Descrição do Projeto</legend>
						<textarea class="form-control" rows="5" name="projDesc" id="projDesc" placeholder="Descrição do Projeto" required></textarea>
					</div>
					<div class="form-group">
					<legend>Banner</legend>
						<img class="img-thumbnail img-responsive" id="myimage" width="500px" height="300px">
						<input type="file" id="img" name="image" onchange="onFileSelected(event);" required>
						<br>
					</div>
					<div class="form-group">
						<legend>Ações</legend>
						<br>			
						<small>
							<span class="btn-group">
								<input type="button" class="btn btn-primary" value="Criar Ação" onClick="mais(campo.value)">
							</span>
							<input type="hidden" name="campo" class="form-control" required>
							<div id="aqui"></div>
						</small>				
					</div>
					<button type="submit" class="btn btn-primary" value="Adicionar Projeto" onclick="return confirm('Você tem certeza que quer adicionar o projeto? Após isso não será possível adicionar ações, somente editá-las.');">Adicionar Projeto</button>
				</form>
			</div>
		</div>
	</div>