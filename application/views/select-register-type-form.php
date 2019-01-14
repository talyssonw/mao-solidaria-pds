<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	body {
  /* Location of the image */
  background-image: url(assets/files/default-images/bgteste);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #464646;
}
</style>
</head>
<body>
<div class="container">
  <div class="gridcontainer clearfix">
    <h1 style="color: white;">Sou uma entidade!</h1>
	<div class="grid_2">
		<div class="fmcircle_out">
			<a href="#web">
				<div class="fmcircle_border">
					<div class="fmcircle_in fmcircle_blue">
						<a href="<?= base_url('entidade-register-form');?>"><img src="<?= base_url('assets/files/default-images/entImage') ?>" alt="" /></a>
					</div>
				</div>
			</a>
		</div>
	</div>
<h1 style="color: white;">Quero participar dos projetos!</h1>

	<div class="grid_2">
		<div class="fmcircle_out">
			<a href="#branding">
				<div class="fmcircle_border">
					<div class="fmcircle_in fmcircle_green">
						<a href="<?= base_url('user-register-form') ?>"><img src="<?= base_url('assets/files/default-images/userImage') ?>" alt="" /></a>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
</body>
</html>