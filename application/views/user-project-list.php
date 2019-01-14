<style type="text/css">
	.panel-default{
    text-align:center;
    cursor:pointer;
    font-family: 'Raleway',sans-serif;
}
.panel-default > .panel-footer {
    color: #fff;
    background-color: #47c8ed;    
    display:none;
    text-shadow: 1px 1px 1px rgba(150, 150, 150, 1);
}
.panel-default i{
    font-size: 5em;
    }
</style>
<script type="text/javascript">
	$(function(){
$('.panel').hover(function(){
        $(this).find('.panel-footer').slideDown(250);
    },function(){
        $(this).find('.panel-footer').slideUp(250); //.fadeOut(205)
    });
})

</script>
<div class="container">
	<div class="row">
		<?php foreach ($users as $u) { ?>
			<div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            <div class="col-md-offset-4">
            	            	<img style="border-style: outset; border-width: 2px;" class="img-responsive img-rounded" width="400" height="200" src="<?= base_url($u->urlImg) ?>">
            </div>
            	<strong><?php echo $u->titulo ?></strong>
            </div>
                <div class="panel-body">                    
                    <h2><?php echo $u->title ?></h2>
                    <p><?php echo $u->objetivo ?></p>
                </div>
                <div class="panel-footer"><a href="<?= base_url('delete-user-participation/'.$u->id.'/'.$u->objetivos_idObjetivo) ?>" class="btn btn-danger">Retirar participação</a></div>
            </div>
        </div>
		<?php } ?>
	</div>
</div>