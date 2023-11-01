
<div class="row">
    <?php
    foreach ($areas as $obj) {
        if ($obj->status == "I") {
            exit;
        }
        ?>
        <div class="col-md-4">
            <div class="card card-body bg-white text-center">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body text-center">
                            <div class="icon-object border-warning text-warning"><i class="fa <?php echo $obj->icone . ' ' . $obj->tamanho ?>"></i></div>
                            <h5 class="text-semibold"><?php echo $obj->nome ?></h5>
                            <p class="mb-15"><?php echo nl2br($obj->descricao) ?></p>
                            <a href="<?php echo base_url() . 'pergunta/index/' . $obj->id; ?>" class="btn bg-warning-400">QUERO FALAR SOBRE ISSO</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>    
</div>