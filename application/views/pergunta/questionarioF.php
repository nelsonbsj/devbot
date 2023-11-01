<div class="content">
    <!-- Vertical form options -->
    <div class="row">
        <div class="col-md-6">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>home" method="post" enctype="multipart/form-data">
                        <input  type="hidden" name="area" class="form-control" value="<?= $area ?>"/>
                        <input  type="hidden" name="pergunta" class="form-control" value="<?= $pergunta->descricao ?>"/>
                        <input  type="hidden" name="tipo" class="form-control" value="<?= $pergunta->tipo ?>"/>
                        <div class="form-group mb-3 mb-md-2">
                            <label class="d-block font-weight-semibold"><h2><?= $pergunta->descricao ?></h2></label>
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Fim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
