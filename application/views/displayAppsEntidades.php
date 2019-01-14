<div class="col-sm-12">
    <?php
    $x=0;
    foreach ($appsEntidades as $ae) {
        if ($ae->status == 1)
        { 
            if($x % 4 == 0) echo '<div class="row">';?>
            <div class="col-sm-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?php echo $ae->name ?></h4>                           
                    </div>
                    <div class="panel-body">  
                        <img class="img-responsive img-thumble" src="<?php echo base_url ($ae->urlImg);  ?>" style='width:150px; height:200px;'>   
                        <div>
                         <label>CNPJ:</label> 
                         <p id="entCnpj" name="entCnpj"><?php echo $ae->cnpj ?><p>
                         </div>
                         <div>
                            <label>E-mail:</label>
                            <?php echo $ae->email ?><br>
                        </div>
                        <div>
                            <label>Cidade:</label>
                            <?php echo $ae->city ?><br>
                        </div>
                        <div>
                            <label>Bairro:</label>
                            <?php echo $ae->neighborhood ?><br>
                        </div>                      
                        <div>
                            <label>Telefone:</label>
                            <?php echo $ae->phone ?><br>
                        </div>
                        <div>
                            <label>Endereço:</label>
                            <?php echo $ae->adress ?><br>
                        </div>                     
                    </div>
                    <div class="panel-footer">
                        <a href="<?php echo base_url('appEntidadeController/appEntidadeApprove')?>?id_entidade=<?php echo $ae->idEntidade; ?>" class="btn btn-success" onclick="return confirm('Você tem certeza que quer aprovar a entidade?.');" >Aprovar</a>
                        <a href="<?php echo base_url('appEntidadeController/appEntidadeReject')?>?id_entidade=<?php echo $ae->idEntidade; ?>" class="btn btn-danger" onclick="return confirm('Você tem certeza que quer reprovar a entidade?.');" >Reprovar</a>

                    </div>
                </div>
            </div>

            <?php 

            $x++;
            if($x % 4 == 0) echo '</div>'; }

        }
        ?>
    </div>
</div>
</div>
