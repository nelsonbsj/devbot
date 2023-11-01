<script type="text/javascript">
    function addNewBtn() {
        //alert('ola');
        var next = $('#lista tbody').children('tr').length + 1;
        //alert(next);
        $("#lista").append('<tr>' +
                '<td><input class="form-control" type="text"   id="descricao' + next + '" name="descricao' + next + '"  maxlength="45"  /></td>' +
                '<td><select class="form-control" name="proxima_perg' + next + '"><option value="0">SELECIONE</option><?php for ($i = 0; $i < count($pergunta); $i++) { echo "<option value={$pergunta[$i]->id}>{$pergunta[$i]->descricao}</option>"; } ?></select></td>' +
                '</tr>');
        $(eval('quantidade_itens')).val(next);
        return false;
    }
</script>
<!-- Form horizontal -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Cadastro de Questões com resposta Multiplas Opções</h5>
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
                <input  type="hidden" name="tipo" value="M"/>
                <input  type="hidden" name="acao" value="<?php echo $acao; ?>"/>
                <input  type="hidden" name="area" value="<?php echo $area; ?>"/>
                <input  type="hidden" name="id" value="<?php echo ($acao == 'insert' ? $idpergunta : $perg->id) ?>"/>

                <div class="form-group">
                    <label class="control-label col-lg-2">Pergunta:</label>
                    <div class="col-lg-5">
                        <input  type="text" class="form-control" placeholder="descrição" name="descricao" id="cpfCnpj" value="<?php echo ($acao == 'insert' ? '' : $perg->descricao) ?>">
                    </div>										
                </div>
                <div id="titulo">
                    <button type="button" onclick="addNewBtn()" class="btn bg-teal">+ RESPOSTA</button>
                </div>
                <table class="table table-hover" id="lista">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">Opções de Resposta</th>
                            <th scope="col">Proxima Pergunta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $flagItem = 1;
                        if ($acao == 'update') {
                            if (isset($resposta)) {
                                foreach ($resposta as $row) {
                                    echo '<tr>';
                                    echo "<td><input class='form-control' type='text'  name='descricao" . $flagItem . "'      id='descricao" . $flagItem . "' value='" . $row->descricao . "'  /></td>";
                                    echo "<td>";
                                    echo "<select class='form-control' name='proxima_perg{$flagItem}'>";
                                        echo "<option value='0'>SELECIONE</option>";
                                    foreach ($pergunta as $obj) {
                                        echo "<option " . ($obj->id == $row->proxima_perg ? 'selected' : '') . " value='{$obj->id}'>{$obj->descricao}</option>";
                                    }
                                    echo '</select>';
                                    echo "</td>";
                                    echo '</tr>';
                                    $flagItem++;
                                }
                                $flagItem--;
                            } else {
                                echo '<tr>';
                                echo "<td><input class='form-control' type='text'  name='descricao1'     id='descricao1' /></td>";
                                echo "<td>";
                                echo "<select class='form-control' name='proxima_perg1'>";
                                foreach ($pergunta as $obj) {
                                    echo "<option " . ($obj->id == $perg->prox_pergunta ? 'selected' : '') . " value='{$obj->id}'>{$obj->descricao}</option>";
                                }
                                echo '</select>';
                                echo "</td>";
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr>';
                            echo "<td><input class='form-control' type='text' name='descricao1' id='descricao1'/></td>";
                            echo "<td>";
                            echo "<select class='form-control' name='proxima_perg1'>";
                               echo "<option value='0'>SELECIONE</option>";
                            foreach ($pergunta as $obj) {
                                echo "<option value='{$obj->id}'>{$obj->descricao}</option>";
                            }
                            echo '</select>';
                            echo "</td>";
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                        <!-- Info alert -->
                                        <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                            <h6 class="alert-heading text-semibold">Informações</h6>
                                            Obs.: Para excluir uma resposta da lista basta deixa-la vazia.
                                        </div>
                                        <!-- /info alert -->
                            </td>
                        </tr>

              
                    </tfoot>
                    <input type="hidden" value="<?php echo $flagItem; ?>" id="quantidade_itens" name="quantidade_itens" /> 
                </table>
            </fieldset> 
            <div class="text-right">
                <button type="submit" class="btn bg-teal">Gravar <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </form>
    </div>
</div>
