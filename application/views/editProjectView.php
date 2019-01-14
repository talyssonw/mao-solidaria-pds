<?php foreach ($proj as $pj) { ?>
<?php echo validation_errors(); 
 ?>
 <form name="editProjeto"  action="<?= base_url('project-edit-event/'.$pj->idProjeto); ?>"  method="POST" enctype="multipart/form-data">
<div class="mainbody container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1 class="panel-title pull-left" style="font-size:30px;"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Editar Projeto</h1>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-md-offset-0">
				<form name="sendProjectInfo" action="<?php echo base_url('project-create');?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="usr">Título do Projeto</label>
						<input type="title" name="projTitle" placeholder="Título do Projeto" class="form-control" id="projTitle" value="<?php echo $pj->titulo; ?>" required>
					</div>

					<div class="form-group">
						<label>Descrição do Projeto</label>
						<textarea class="form-control" rows="5" name="projDesc" id="projDesc" placeholder="Descrição do Projeto" required><?php echo $pj->descricao; ?></textarea>
					</div>
					<div class="form-group">
						<img src="<?= base_url($pj->urlImg) ?>" class="img-thumbnail img-responsive" width="300px" height="300px">
						
					</div>
					<legend class="form-group">Ações</legend>
					<?php foreach ($obj as $o) { ?>
					<div class="form-group" style="border-style: solid; border-width: 1px; border-color: #e6e6e6;">
						
						<br>		
							<label><strong>Título da Ação</strong></label>	
							<input class="form-control" type="" id="title[]" name="title[]" value="<?php echo $o->title ?>" required>
							<br>
							<label><strong>Descrição da Ação</strong></label>
							<textarea class="form-control" type="" id="objetivo[]" name="objetivo[]" value="" required><?php echo $o->objetivo ?></textarea>
							<input  type="" name="idObjetivo[]" value="<?php echo $o->idObjetivo ?>" hidden>
							<br>
							
					</div>
					<?php } ?>
					<button type="submit" class="btn btn-primary" value="Adicionar Projeto">Enviar</button>
				</form>
			</div>
		</div>
	</div>
</form>
<?php 
} ?>
