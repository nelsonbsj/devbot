<!-- Form horizontal -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Cadastro de Questões com resposta Aberta</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/gravar" method="post" enctype="multipart/form-data">
            <fieldset class="content-group">
                <legend class="text-bold">Dados Questão:</legend> 
                <input  type="hidden" name="tipo" value="T"/>
                <input  type="hidden" name="acao" value="<?php echo $acao; ?>"/>
                <input  type="hidden" name="area" value="<?php echo $area; ?>"/>
                <input  type="hidden" name="id" value="<?php echo ($acao == 'insert' ? '' : $perg->id) ?>"/>

                <div class="form-group">
                    <label class="control-label col-lg-2">Pergunta:</label>
                    <div class="col-lg-5">
                        <input  type="text" class="form-control" placeholder="descrição" name="descricao" id="cpfCnpj" value="<?php echo ($acao == 'insert' ? '' : $perg->descricao) ?>">
                    </div>										
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Proxima Pergunta:</label>
                    <div class="col-lg-5">
                        <?php
                        echo "<select class='form-control' name='proxima_perg'>";
                        echo "<option value=''>SELECIONE</option>";
                        foreach ($pergunta as $obj) {
                            echo "<option " . ($obj->id == $perg->proxima_perg ? 'selected' : '') . " value='{$obj->id}'>{$obj->descricao}</option>";
                        }
                        echo '</select>';
                        ?>
                    </div>										
                </div>
            </fieldset> 
            <div class="text-right">
                <button type="submit" class="btn bg-teal">Gravar <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </form>
    </div>
</div>
