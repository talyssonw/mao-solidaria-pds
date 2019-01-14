<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div id="imaginary_container"> 
			  <form method="POST" action="<?php echo base_url('project-search-by-title'); ?>">
				<div class="input-group stylish-input-group">
					<input type="text" class="form-control" id="searchTitle" name="searchTitle" placeholder="Procurar pelo Título do Projeto" required>
					<span class="input-group-addon">
						<button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>  
					</span>
				</div>
				<br>
				</form>
			</div>
		</div>

</div>
<div class="container-fluid">
<?php $x=0;
    foreach ($projs as $pj) {
       ?>

  <div class="well">
      <div class="media">
        <a class="pull-middle" href="#">
            <img style="border-style: outset; border-width: 2px;" class="img-responsive img-rounded" width="400" height="200 " src="<?php echo base_url($pj->urlImg); ?>">
        </a>
        <br>
        <div class="media-body">

            <?php foreach ($ents as $e) {
            	if ($e->idEntidade == $pj->entidadesaplicacoes_idEntidade){ ?>
                          <a href="<?= base_url('project-page-form/'.$e->idEntidade.$pj->idProjeto) ?>" style="color: black;"><h4 class="media-heading"><strong><?php echo $pj->titulo ?></strong></h4></a>
            	  <p style="color: green;"><strong><?php echo $e->name ?></strong></p>
            		<?php          		
            	}
            } ?>       
          <p><?php 
                if (strlen($pj->descricao)<400){
                  echo $pj->descricao;
                }else{
                  $pos=strpos($pj->descricao, ' ', 400);
                  echo substr($pj->descricao,0,$pos );
                  echo '...';
                }
                ?></p>
          <ul class="list-inline list-unstyled">
            <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <span><i class="fa fa-facebook-square"></i></span>
            </li>
            </ul>
                   <div class="<?php if ($pj->status==0) {
       	echo "alert-success";
       }else{
       	echo "alert-warning";
       	} ?>">     
       	<?php if ($pj->status==0) {
       		echo "Projeto concluído.";
       	}else{
       		echo "Projeto em andamento.";
       		} ?>	
       </div>
       </div>

    </div>
  </div>
 
 <?php $x++; 
  
 ?> 
       

<?php } ?>
</div>
</body>
</html>

