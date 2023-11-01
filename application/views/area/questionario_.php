<div class="content">
    <!-- Vertical form options -->
    <div class="row">
        <div class="col-md-6">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>area/montaproxima" method="post" enctype="multipart/form-data">
                        <input  type="hidden" name="area" class="form-control" value="<?= $area ?>"/>
                        <input  type="hidden" name="pergunta" class="form-control" value="<?= $pergunta->descricao ?>"/>
                        <div class="form-group mb-3 mb-md-2">
                            <label class="d-block font-weight-semibold"><h2><?= $pergunta->descricao ?></h2></label>
                            <?php foreach ($respostas as $obj): ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="<?= $obj->proxima_perg.'-'.$obj->descricao ?>" name="resposta" id="custom_radio_inline_unchecked">
                                    <label class="custom-control-label" for="custom_radio_inline_unchecked" ><?= $obj->descricao ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="text-right">
                            <button type="button" onclick="window.history.back()" class="btn btn-info">Voltar</button>
                            <button type="submit" class="btn btn-info">Avancar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>
</div>
