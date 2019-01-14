<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}
.panel-white {
  border: 1px solid #dddddd;
}
.panel {
    font-size: 13px;
    color: #454545;
    background: #fafafa;
    position: relative;
    overflow-x: hidden;
    font-family: 'Source Sans Pro', 'Oxygen', sans-serif;
}
.panel-white  .panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #ddd;
}
.panel-white  .panel-footer {
  background-color: #fff;
  border-color: #ddd;
}
.bg2 {
    background-image: url('http://lorempixel.com/560/344/sports/1/');
}
.profile-widget {
  position: relative;
}
.profile-widget .image-container {
  background-size: cover;
  background-position: center;
  padding: 190px 0 10px;
}
.profile-widget .image-container .profile-background {
  width: 100%;
  height: auto;
}
.profile-widget .image-container .avatar {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  margin: 0 auto -60px;
  display: block;
}
.profile-widget .details {
  padding: 50px 15px 15px;
  text-align: center;
}    
	</style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="container">
	<div class="row">
	 <div class="col-sm-12">
	 <?php foreach ($data as $d) { ?>
	 <div class="container bootstrap snippet">
	 	<div class="col-md-8 col-md-offset-2">
	 		<div class="panel panel-white profile-widget panel-shadow">
	 		<div class="panel-heading">
	 			<p class="panel-title"><h4><strong><?php echo $d->titulo ?></strong><h4></p>
	 		</div>
	 			<div class="row">
	 				<div class="col-sm-12">
	 					<div class="image-container" style="background-image: url(<?= base_url($d->urlImg) ?>)"> 
	 						<img src="<?php if ($d->oauth_provider=='facebook'){
	 							echo $d->picture_url;
	 						}else{
	 						echo base_url($d->picture_url); }
	 						?>" class="avatar" alt="avatar"> 
	 					</div>
	 				</div>
	 				<div class="col-sm-12">
	 					<div class="details">
	 					<h4><?php if ($d->oauth_provider=='facebook'){
	 					?><a href="<?php echo $d->profile_url ?>"><?php echo $d->first_name.' '.$d->last_name; ?> </a> <?php
	 					}else{
	 					echo $d->first_name.' '.$d->last_name; 
	 					}?> quer participar da ação <?php echo $d->title ?>!<i class="fa fa-sheild"></i></h4>
	 						<div><h4>Dados do usuário:</h4></div>
	 						<div><p data-toggle="tooltip" title="E-mail"><i class="glyphicon glyphicon-envelope"></i> <?php echo $d->email ?></p></div>
	 						<div><p data-toggle="tooltip" title="Celular"><i class="glyphicon glyphicon-earphone"></i> <?php echo $d->cellphone ?></p></div>
	 						<div><p data-toggle="tooltip" title="Data de Aniversário"><i class="glyphicon glyphicon-calendar" ></i> <?php echo date("d-m-Y", strtotime($d->birth_date));	?> </p></div>
	 						<div class="mg-top-10">
	 							<a href="<?= base_url('participation-accept-obj/'.$d->objetivos_idObjetivo.'/'.$d->id) ?>" class="w3-button w3-green">Ele está participando!</a>
	 							<a href="<?= base_url('delete-user-participation/'.$d->id.'/'.$d->objetivos_idObjetivo) ?>" class="w3-button w3-red">Não irá participar</a>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>      
	 <?php } ?>
	 </div>		
	</div>
</div>
</body>
</html>