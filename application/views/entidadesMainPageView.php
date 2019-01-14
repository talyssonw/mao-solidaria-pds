<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container">
	<div class="row">
		<br>
		<?php foreach ($ents as $e) {
    	if ($e->status==2) {
			?>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="well well-sm">
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<img src="<?php echo base_url($e->urlImg); ?>" style="height: 200px; width: 150px;" alt="" class="img-rounded img-responsive" />
						</div>
						<div class="col-sm-6 col-md-8">
							<h4>
								<?php echo $e->name; ?></h4>
								<small><cite title="San Francisco, USA"> <?php echo $e->city; ?>, <?php echo $e->neighborhood; ?>, <?php echo $e->adress; ?> <i class="glyphicon glyphicon-map-marker">
								</i></cite></small>
								<p>
									<i class="glyphicon glyphicon-envelope"></i> <?php echo $e->email; ?>
									<br />
									<i class="glyphicon glyphicon-earphone"></i> <?php echo $e->phone; ?>
									<br />
									</div>
								</div>
							</div>
						</div>
						<?php }
						} ?>
					</div>
				</div>
</body>
</html>

