<!-- Column selectors -->
<div class="card-body col-lg-12">
    <!-- Card body table -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Consulta Termos em Processos   [<?php echo $saldo; ?>]</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!--<p class="mb-3">Example of a table placed inside <code>card body</code>. Such tables always have additional whitespace taken from <code>.card-body</code> element padding.</p>-->
            <form class="form-horizontal" action="<?php echo base_url() . $this->uri->segment(1); ?>/busca_termo" method="post" enctype="multipart/form-data">
                <fieldset class="content-group"><!-- comment -->

                    <div class="form-group row">
                        <label class="control-label col-sm-4">TERMO DA BUSCA:</label>
                        <div class="col-sm-3">
                            <input  type="text" required="" class="form-control" placeholder="Termo a ser buscado" name="termodabusca" id="nome" value="">
                        </div>										
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4">Tipo</label>
                        <div class="col-sm-3">
                            <select name='qo' class="form-control form-control-select2" data-fouc>
                                <option   value='t'>Todos os Tipos de Entidades</option>";
                                <option   value='p'>Apenas as Pessoas</option>";
                                <option   value='i'>Apenas as Instituições</option>";
                                <option   value='d'>Diários Oficiais</option>";
                                <option   value='en'>Pessoas e Instituições</option>";
                            </select>
                        </div>										
                    </div>									
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn bg-blue">Buscar <i class="icon-search4 ml-2"></i></button>
                    </div>
                </fieldset>
            </form>
            <div class="table-responsive">
                <?php
                if (isset($items)) {
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Termo</th>
                                <th>Texto</th>
                                <th>Quant Processos</th>
                                <th>Acessar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php foreach ($items as $obj): ?>
                                <tr>
                                    <td><?= $obj->id ?></td>
                                    <td>
                                        <?php
                                        if (($obj->tipo_resultado == 'Instituicao')or($obj->tipo_resultado == 'Pessoa')) {
                                            echo $obj->nome;
                                        } elseif ($obj->tipo_resultado == 'Diario') {
                                            echo $obj->caderno;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (($obj->tipo_resultado == 'Instituicao')or($obj->tipo_resultado == 'Pessoa')) {
                                            echo str_replace('Escavador', 'Master ADV', $obj->resumo);
                                        } elseif ($obj->tipo_resultado == 'Diario') {
                                            echo str_replace('Escavador', 'Master ADV', $obj->texto);
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (($obj->tipo_resultado == 'Instituicao')or($obj->tipo_resultado == 'Pessoa')) {
                                            echo $obj->quantidade_processos;
                                        } elseif ($obj->tipo_resultado == 'Diario') {
                                            echo $obj->diario_edicao;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a target ="_new" href="<?php echo base_url() . $this->uri->segment(1) . '/linkapi/?link=' . str_replace('https://api.escavador.com/api/', '', $obj->link_api); ?>" data-popup="tooltip" title="Editar"><span class="badge badge-primary"><i class="icon-file-eye "></i> Acessar</span></a>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        }
                        ?>
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /card body table -->
    <?php
    if (isset($items)) {
        ?>
        <ul class="pagination pagination-pager pagination-pager-linked justify-content-center">
            <form class="form-horizontal" action="<?php echo base_url() . $this->uri->segment(1); ?>" method="post" enctype="multipart/form-data">
                <input  type="hidden" class="form-control" placeholder="" name="prev" id="prev" value="<?php echo $links->prev; ?>">
                <button type="submit" class="btn bg-blue"> <i class="icon-previous"></i>Anterior &nbsp;</button>
            </form>
            <div>&nbsp;</div>
            <form class="form-horizontal" action="<?php echo base_url() . $this->uri->segment(1); ?>" method="post" enctype="multipart/form-data">
                <input  type="hidden" class="form-control" placeholder="" name="next" id="next" value="<?php echo $links->next; ?>">
                <button type="submit" class="btn bg-blue">Próximo &nbsp; <i class="icon-next"></i></button>
            </form>
        </ul>
        <?php
    }
    ?>
</div>