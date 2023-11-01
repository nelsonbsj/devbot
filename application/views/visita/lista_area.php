
    <!-- Info blocks -->
    <div class="row">

    <?php foreach ($areas as $obj){ 
   
    if ($obj->status == "I") {
        exit;
    }

    ?>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body text-center">
                    <div class="icon-object border-warning text-warning"><i class="fa <?php echo $obj->icone ?>"></i></div>
                    <h5 class="text-semibold"><?php echo $obj->nome ?></h5>
                    <p class="mb-15"><?php echo nl2br($obj->descricao) ?></p>
                    <a href="<?php echo base_url('visita/lista/'. $obj->id) ; ?>" class="btn bg-warning-400">Visualizar Àrea</a>
                </div>
            </div>
        </div>
    <?php } ?>    

    </div>
    <!-- /info blocks -->