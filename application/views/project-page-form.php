<!DOCTYPE html>
<html>
<head>
  <title>
  </title>
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

    .panel-heading-fd{
      font-family: 'Open Sans', Helvetica, sans-serif;
      background: #39b1cc;
      background: -moz-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #51bbd2), color-stop(100%, #2d97af));
      background: -webkit-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
      background: -o-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
      background: -ms-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
      background: linear-gradient(to bottom, #51bbd2 0%, #2d97af 100%);
      color: #ffffff;
      padding: 5px 17px 8px;

    }

    .panel-title-fd{
      color: #ffffff;
      font-size: 14px;
      font-weight: 700;
      /*color: #d3eced;*/
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .profile-header-container{
      margin: 0 auto;
      text-align: center;
    }


    .profile-header-img > img.img-circle {
      width: 80px;
      height: 80px;
      border: 2px solid #51D2B7;
    }

/**
 * Ranking component
 */
 .rank-label-container {

  /* z-index: 1000; */
  text-align: center;
}

.label.label-default.rank-label {
  background-color: rgb(81, 210, 183);
  padding: 5px 10px 5px 10px;
  border-radius: 27px;
}
</style>

<script type="text/javascript">
  $('.timeline-panel').click(function() {
    $('.timeline-body', this).toggle(); // p00f
  });
</script>
<style type="text/css">
</style>
</head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
  <style type="text/css">
    .titleProject {
      font-family: Allerta Stencil;
    }
  </style>
<body>

  <div class="wrapper">
    <div class="container">
      <?php foreach ($projs as $pj) { ?>

      <?php foreach ($ents as $e) {
        if($pj->entidadesaplicacoes_idEntidade = $e->idEntidade){
          $imgEntidade = $e->urlImg;
          $nomeEntidade = $e->name;
        }
      } ?>
      <div class="row">
        <div class="col-md-12">
          <header id="header">
            <img src="<?php echo base_url($pj->urlImg) ?>" class="img-responsive" height="400" width="1150">
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="hidden-sm hidden-xs"><a class="navbar-brand" href="#"><img class="img-responsive img-circle" style="border: black, 3px; " src="<?php echo base_url($imgEntidade); ?>" height="150" width="150"></a>
                </div>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="mainNav" >
                <ul class="nav main-menu navbar-nav">
                </ul>

                <ul class="nav  navbar-nav navbar-right">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </nav>

          </header>
          <!--/#HEADER-->
        </div>
      </div>
      <h1></h1>
      <div class="col-lg-8 col-lg-offset-2">
        <h3 class="titleProject"><?php echo $pj->titulo ?></h3>
        <br>
        <br>
        <h4><legend><strong>Descrição</strong></legend> </h4>
        <div class="w3-card">
          <p><?php echo $pj->descricao ?></p>
        </div>

      </div>


        <br>
        <br>
        <br>
        <br>
        <br> 
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <legend><strong>Ações</strong></legend>
        <ul class="timeline">
          <?php foreach ($objs as $o) { ?>
          <li>
            <div class="timeline-badge <?php if ($o->status==0){ echo "danger" ; 
            }else{ echo "info";
          } ?>"><i class="glyphicon glyphicon-<?php if ($o->status==0){ echo "remove" ; 
        }else{ echo "check";
      } ?>"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title"><legend><?php echo $o->title ?></legend></h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 horas atrás via Mão Solidária</small></p>
        </div>
        <div class="timeline-body">
          <p><?php echo $o->objetivo; ?></p>
          <div class="col-md-12 text-center"><legend>Estão Participando Deste Objetivo:</legend></div>
          <div class="col-sm-12 col-md-12">
                    <div class="pull-right">
            <?php if ($this->session->userdata('user_type')==0) {
            }else{     ?>
            <a href="<?= base_url('user-request-part-obj/'.$this->session->userdata('id').'/'.$pj->idProjeto.'/'.$o->idObjetivo) ?>" type="btn btn-default"><i class="glyphicon glyphicon-share"></i> Quero Participar!</a>
            <?php } ?>
          </div>
            <?php foreach ($users as $u) { ?>
            <?php if ($u->objetivos_idObjetivo == $o->idObjetivo) { ?>
            <div class="col-sm-2">

              <div class="profile-header-container">   
                <div class="profile-header-img">
                  <img class="img-circle" src="<?php if($u->oauth_provider == 'facebook'){ 
                    echo $u->picture_url;}else{
                      echo base_url($u->picture_url);
                    } ?>" />
                    <!-- badge -->
                    <div class="rank-label-container">
                      <span class="label label-default rank-label"><?php echo $u->first_name ?></span>
                    </div>
                  </div>
                </div> 
              </div>

              <?php } } ?>
            </div>
          </div>
        </div>
      </li>
      <?php } ?>

    </ul>
    <?php } ?>

  </div>
</div>



</body>
</html>