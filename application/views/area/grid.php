<!-- Column selectors -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <div class="col-md-3 col-sm-6 row">
            <a class="btn bg-teal btn-block" href="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/adicionar">Adicionar <i class="icon-plus2 position-right"></i></a>
        </div>
        <!--        <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                         <li><a data-action="reload"></a></li> 
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>-->
    </div>

    <br>
    <table class="table datatable-button-html5-columns">
        <thead>
            <tr>				
                <th>#</th>	
                <th>Area</th>	
                <th>Status</th>	
                <th>Perguntas</th>	
                <th>Ícone</th>				
                <th>Descrição</th>														
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tabela as $obj) { ?>

                <tr>     								
                    <td><?php echo $obj->id; ?></td>
                    <td><?php echo $obj->nome; ?></td> 					
                    <td><?php echo ($obj->status == 'A' ? 'Ativo' : 'Inativo'); ?></td> 					
                    <td>
                        <a href="<?php echo base_url(); ?>pergunta/lista/<?php echo $obj->id; ?>" data-popup="tooltip" title="Questões"><i class="icon-question3"></i></a>
                    </td> 					
                    <td><i class = "fa <?php echo $obj->icone . " " . $obj->tamanho; ?>"></i></td>
                    <td><?php echo nl2br($obj->descricao); ?></td>

                    <td>																				
                        <ul class="icons-list">						
                            <li class="text-primary-600"><a href="<?php echo base_url() . $this->uri->segment(1); ?>/editar/<?php echo $obj->id; ?>" data-popup="tooltip" title="Editar"><i class="icon-pencil7"></i></a></li>
                            <li class="text-danger-600"><a href="<?php echo base_url() . $this->uri->segment(1); ?>/excluir/<?php echo $obj->id; ?>" data-popup="tooltip" title="Excluir" class="sweet_loader_id" url="<?php echo $this->uri->segment(1); ?>/excluir" registro="<?php echo $obj->id; ?>"><i class="icon-trash"></i></a></li>
                            <li class="text-teal-600"><a href="<?php echo base_url() . $this->uri->segment(1); ?>/visualizar/<?php echo $obj->id; ?>" data-popup="tooltip" title="Visualizar"><i class="icon-search4"></i></a></li>	
                        </ul>																			
                    </td>						
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class='card-body'>
        <?php echo $links; ?>
    </div>
</div>
