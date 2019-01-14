<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript">
    function genericSocialShare(url){
      window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
      return true;
    }

    $('body').on('click', '[data-editable]', function(){

      var $el = $(this);

      var $input = $('<textarea size="1000" rows="10"/>').val( $el.text() );
      $el.replaceWith( $input );

      var save = function(){
        var $p = $('<p data-editable />').text( $input.val() );
        $input.replaceWith( $p );
      };

  /**
    We're defining the callback with `one`, because we know that
    the element will be gone just after that, and we don't want 
    any callbacks leftovers take memory. 
    Next time `p` turns into `input` this single callback 
    will be applied again.
    */
    $input.one('blur', save).focus();

  });
</script>
<style type="text/css">
  .timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
  }
  .timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 3px;
    background-color: #eeeeee;
    left: 25px;
    margin-right: -1.5px;
  }
  .timeline > li {
    margin-bottom: 20px;
    position: relative;
  }
  .timeline > li:before,
  .timeline > li:after {
    content: " ";
    display: table;
  }
  .timeline > li:after {
    clear: both;
  }
  .timeline > li:before,
  .timeline > li:after {
    content: " ";
    display: table;
  }
  .timeline > li:after {
    clear: both;
  }
  .timeline > li > .timeline-panel {
    width: calc( 100% - 75px );
    float: right;
    border: 1px solid #d4d4d4;
    border-radius: 2px;
    padding: 20px;
    position: relative;
    -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  }
  .timeline > li > .timeline-panel:before {
    position: absolute;
    top: 26px;
    left: -15px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-right: 15px solid #ccc;
    border-left: 0 solid #ccc;
    border-bottom: 15px solid transparent;
    content: " ";
  }
  .timeline > li > .timeline-panel:after {
    position: absolute;
    top: 27px;
    left: -14px;
    display: inline-block;
    border-top: 14px solid transparent;
    border-right: 14px solid #fff;
    border-left: 0 solid #fff;
    border-bottom: 14px solid transparent;
    content: " ";
  }
  .timeline > li > .timeline-badge {
    color: #fff;
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
    text-align: center;
    position: absolute;
    top: 16px;
    left: 0px;
    margin-right: -25px;
    background-color: #999999;
    z-index: 100;
    border-top-right-radius: 50%;
    border-top-left-radius: 50%;
    border-bottom-right-radius: 50%;
    border-bottom-left-radius: 50%;
  }
  .timeline > li.timeline-inverted > .timeline-panel {
    float: left;
  }
  .timeline > li.timeline-inverted > .timeline-panel:before {
    border-right-width: 0;
    border-left-width: 15px;
    right: -15px;
    left: auto;
  }
  .timeline > li.timeline-inverted > .timeline-panel:after {
    border-right-width: 0;
    border-left-width: 14px;
    right: -14px;
    left: auto;
  }
  .timeline-badge.primary {
    background-color: #2e6da4 !important;
  }
  .timeline-badge.success {
    background-color: #3f903f !important;
  }
  .timeline-badge.warning {
    background-color: #f0ad4e !important;
  }
  .timeline-badge.danger {
    background-color: #d9534f !important;
  }
  .timeline-badge.info {
    background-color: #5bc0de !important;
  }
  .timeline-title {
    margin-top: 0;
    color: inherit;
  }
  .timeline-body > p,
  .timeline-body > ul {
    margin-bottom: 0;
  }
  .timeline-body > p + p {
    margin-top: 5px;
  }

  .divDescricao{
    background: #eee;
    -moz-box-shadow: 10px 10px 5px #000000;
    -webkit-box-shadow: 10px 10px 5px #000000;
    box-shadow: 10px 10px 5px #000000;
  }

  .titleDescricao{
    text-shadow:2px 2px 2px #ffffff;

  }

  .titleProject
  {
    text-shadow:1px 1px 1px rgba(71,71,71,1);font-weight:bold;font-variant:small-caps;color:#000000;letter-spacing:1pt;word-spacing:2pt;font-size:30px;text-align:center;font-family:impact, sans-serif;line-height:1;margin:0px;padding:0px;
  }

  #imgent { 
    border: 10px solid transparent;
    padding: 15px;
    -webkit-border-image: url(border.png) 30 round; /* Safari 3.1-5 */
    -o-border-image: url(border.png) 30 round; /* Opera 11-12.1 */
    border-image: url(border.png) 30 round;
  }

  .w3-circle{
    width: 80px;
    height: 80px;
    border: 2px solid  #d9d9d9;
  }
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <br>
  <div class="container-fluid">
    <?php $x=0;
    foreach ($projs as $pj) {
     ?>

     <div class="well">
      <div class="media">
        <a class="pull-middle" href="#">
          <img style="border-style: outset; border-width: 1px;" class="img-responsive img-rounded" width="400" height="200 " src="<?php echo base_url($pj->urlImg); ?>">
        </a>
        <br>
        <div class="media-body">
          <h4 class="media-heading"><strong><?php echo $pj->titulo ?></strong></h4>
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
              <br>            <li>
              <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <span><i class="fa fa-facebook-square"></i></span>
            </li>
          </ul>

          <legend><strong>Ações</strong></legend>
          <?php foreach ($objs as $o) { ?>
          <?php if ($o->projetos_idProjeto == $pj->idProjeto){ ?>
          <ul class="timeline">

            <li>
              <div class="timeline-badge <?php if ($o->status==0){ echo "danger" ; 
              }else{ echo "info";
            } ?>"><a href="<?php if($pj->status == 1){
             if ($o->status==0) {
               echo base_url('finish-obj/'.$o->idObjetivo);
             }else{
              echo base_url('unfinish-obj/'.$o->idObjetivo);
            } } ?>" style="color: white;" <?php 
            if ($o->status==0) {
             ?> onclick="return confirm('Você tem certeza que quer concluir este objetivo?');" <?php
           }else{
            ?> onclick="return confirm('Você tem certeza que quer marcar como não concluído este objetivo?');" <?php
          }  ?>><i class="glyphicon glyphicon-<?php if ($o->status==0){ echo "remove" ; 
        }else{ echo "check";
      }
      ?>"></i></a></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title"><legend><?php echo $o->title ?></legend></h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 horas atrás via Mão Solidária</small></p>
        </div>
        <div class="timeline-body">
          <p><?php echo $o->objetivo; ?></p>
        </div>
        <div class="col-sm-12">
          <legend>Participantes</legend>
          <?php foreach ($users as $u) { ?>
          <?php if ($u->objetivos_idObjetivo == $o->idObjetivo) { ?>
          <div class="col-sm-4">
            <div class="w3-card-4">

              <header class="w3-container w3-light-grey">
                <h3><?php if ($u->status_part==0) { ?>
                  <i class="glyphicon glyphicon-ban-circle"></i>
               <?php }else{ ?>
<i class="glyphicon glyphicon-ok-circle"></i>
              <?php  } ?><?php echo $u->first_name.' '.$u->last_name; ?></h3>
              </header>

              <div class="w3-container">

                <?php if ($u->status_part==0) { ?>
                <p><i class="glyphicon glyphicon-warning-sign"></i> Nova solicitação de participação!</p>
                <?php }else{
                  ?> Este usuário está participando. <?php
                  } ?>
                <hr>
                <img src="<?php if($u->oauth_provider == 'facebook'){ 
                  echo $u->picture_url;}else{
                    echo base_url($u->picture_url);
                  } ?>" alt="Avatar" class="w3-middle w3-circle img-responsive" >
                  <small>
                  <br>
                  <p class="pull-left"><i class="glyphicon glyphicon-envelope"> <?php echo $u->email ?></i></p>
                  <p class="pull-right"> <i class="glyphicon glyphicon-earphone"></i> <?php echo $u->cellphone ?></p>
                  </small>
                </div>
                <?php 
                 if ($u->status_part==0) { ?>
                 <div class="hidden-sm hidden-xs">
                 <a href="<?= base_url('participation-accept-obj/'.$u->objetivos_idObjetivo.'/'.$u->id) ?>" class="w3-button w3-block w3-green">Aceitar Participação</a>
                 </div>

                <div class="hidden-col hidden-lg hidden-xl">
                 <a href="<?= base_url('participation-accept-obj/'.$u->objetivos_idObjetivo.'/'.$u->id) ?>" class="w3-button w3-block w3-green"><i class="glyphicon glyphicon-ok"></i></a>
                 </div>

                 <div class="hidden-sm hidden-xs">
                 <a href="<?= base_url('delete-user-participation/'.$u->id.'/'.$u->objetivos_idObjetivo) ?>" class="w3-button w3-block w3-red">Rejeitar Participação</a>
                 </div>

                   <div class="hidden-col hidden-lg hidden-xl">
                 <a href="<?= base_url('delete-user-participation/'.$u->id.'/'.$u->objetivos_idObjetivo) ?>" class="w3-button w3-block w3-red"><i class="glyphicon glyphicon-remove"></i></a>
                 </div>

                 <?php }else{ ?>
                 <a href="<?= base_url('delete-user-participation/'.$u->id.'/'.$u->objetivos_idObjetivo) ?>" class="w3-button w3-block w3-red">Retirar Participação</a>
                 <?php }  ?>
               </div>
             </div>
             <?php } } ?>
           </div>
         </div>
       </li>
       <?php } ?>

     </ul>
     <?php } ?>

   </div>
   <?php if ($pj->status == 0) { ?>
   <button class="btn btn-success" disabled>Projeto Concluído</button>
   <?php }else{ ?>
   <a href="<?= base_url('finish-proj/'.$pj->idProjeto) ?>" class="btn btn-danger" onclick="return confirm('Você tem certeza que quer concluir este projeto?');">Finalizar Projeto</a>
   <a href="<?= base_url('project-edit-form/'.$pj->idProjeto) ?>" class="btn btn-warning">Editar Projeto</a>
   <?php } ?>
 </div>

</div>
<li class="divider"></li>
<?php $x++; ?> 
<?php } ?>
</div>
</body>
</html>