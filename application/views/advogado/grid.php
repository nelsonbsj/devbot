<!-- Column selectors -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <div class="col-md-3 col-sm-6 row">
            <a class="btn bg-teal btn-block" href="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/adicionar">Adicionar <i class="icon-plus2 position-right"></i></a>
        </div>
    </div>

    <br>
    <table class="table">
        <thead>
            <tr>				
                <th>#</th>	
                <th>Nome</th>	
                <th>OAB</th>	
                <th>UF</th>	
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tabela as $obj) { ?>

                <tr>     								
                    <td><?php echo $obj->id; ?></td>
                    <td><?php echo $obj->nome; ?></td> 					
                    <td><?php echo $obj->oab; ?></td> 					
                    <td><?php echo $obj->estado; ?></td> 					
                    <td>																				
                        <ul class="icons-list">						
                            <li class="text-primary-600"><a href="<?php echo base_url() . $this->uri->segment(1); ?>/editar/<?php echo $obj->id; ?>" data-popup="tooltip" title="Editar"><i class="icon-pencil7"></i></a></li>
                            <li class="text-teal-600"><a href="<?php echo base_url() . $this->uri->segment(1); ?>/visualizar/<?php echo $obj->id; ?>" data-popup="tooltip" title="Visualizar"><i class="icon-search4"></i></a></li>	
                            <li class="text-danger-600"><a href="<?php echo base_url($this->uri->segment(1)); ?>/excluir/<?php echo $obj->id; ?>" data-confirm="" title="Excluir"><span><i class="icon-trash"></i></span></a></li>
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