<!-- Left and right buttons -->
<div class="card col-md-6">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Cadastro de Advogado</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form class="form-horizontal" action="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/gravar" method="post" enctype="multipart/form-data">
            <fieldset class="content-group">
                <legend class="text-bold">Informações </legend> 
                <input  type="hidden" name="acao" value="<?php echo $acao; ?>"/>
                <input  type="hidden" name="id" value="<?php echo ($acao == 'insert' ? '' : $advogado->id) ?>"/>

                <div class="form-group row">
                    <label class="control-label col-sm-2">Nome:</label>
                    <div class="col-sm-10">
                        <input  type="text" required="" class="form-control" placeholder="nome do advogado" name="nome" id="nome" value="<?php echo ($acao == 'insert' ? '' : $advogado->nome) ?>">
                    </div>										
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-2">OAB:</label>
                    <div class="col-sm-4">                        
                        <input  type="text" required="" class="form-control" placeholder="numero oab" name="oab" id="oab" value="<?php echo ($acao == 'insert' ? '' : $advogado->oab) ?>">
                    </div>										
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">Estado:</label>
                    <div class="col-sm-4">                        
                        <input  type="text" required="" class="form-control" placeholder="numero oab" name="estado" id="estado" value="<?php echo ($acao == 'insert' ? '' : $advogado->estado) ?>">
                    </div>										
                </div>
            </fieldset> 

            <div class="d-flex justify-content-between align-items-center">
               <button type="button" onclick="window.history.back()" class="btn btn-light">Voltar</button>
                <button type="submit" class="btn bg-blue">Gravar <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>
<!-- /left and right buttons -->