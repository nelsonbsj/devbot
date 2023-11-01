<!-- Left and right buttons -->
<div class="card col-md-6">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Cadastro de Àrea</h6>
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
                <legend class="text-bold">Descreva as informações </legend> 
                <input  type="hidden" name="acao" value="<?php echo $acao; ?>"/>
                <input  type="hidden" name="id" value="<?php echo ($acao == 'insert' ? '' : $area->id) ?>"/>

                <div class="form-group row">
                    <label class="control-label col-sm-2">ÁREA:</label>
                    <div class="col-sm-10">
                        <input  type="text" required="" class="form-control" placeholder="descrição" name="nome" id="cpfCnpj" value="<?php echo ($acao == 'insert' ? '' : $area->nome) ?>">
                    </div>										
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-2">Descrição:</label>
                    <div class="col-sm-10">                        
                        <textarea rows="3" required="" cols="8" class="form-control" name="descricao" id="descricao" placeholder="Digite sua mensagem aqui..."><?php echo ($acao == 'insert' ? '' : $area->descricao) ?></textarea>                   
                    </div>										
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">Status:</label>
                    <div class="col-sm-4">
                        <select name='status' class="form-control form-control-select2" data-fouc>
                            <option <?php echo ($acao == 'insert' ? '' : ($area->status == 'A' ? 'selected' : '')) ?>  value='A'>Ativo</option>";
                            <option <?php echo ($acao == 'insert' ? '' : ($area->status == 'I' ? 'selected' : '')) ?> value='I'>Inativo</option>";
                        </select>
                    </div>										
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-2">Ícone</label>
                    <div class="col-sm-4">
                        <select class="form-control select-icons"  name="icone" style="font-family:'FontAwesome', sans-serif;">
                            <?php foreach ($awesome as $icon) : ?>
                                <?php
                                $selected = '';
                                if ($acao == 'update' and trim($area->icone) == trim($icon->fonte)) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option <?= $selected; ?>  value="<?= $icon->fonte ?>"><?= substr($icon->fonte, 3, strlen($icon->fonte) - 3) . ' ' . $icon->unicode ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">Tamanho:</label>
                    <div class="col-sm-4">
                        <select class="form-control form-control-select2" name="tamanho" id="tamanho" data-fouc>
                            <option value="">Selecione</option>
                            <option <?php echo ($acao == 'insert' ? '' : ($area->tamanho == "fa-1x" ? "selected" : '')) ?> value="fa-1x">pequeno</option>
                            <option <?php echo ($acao == 'insert' ? '' : ($area->tamanho == "fa-2x" ? "selected" : '')) ?> value="fa-2x">médio</option>
                            <option <?php echo ($acao == 'insert' ? '' : ($area->tamanho == "fa-3x" ? "selected" : '')) ?> value="fa-3x">grande</option>
                        </select>
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