<!-- Column selectors -->
<div class="panel panel-flat">
    <table class="table datatable-button-html5-columns">
        <thead>
            <tr>				
                <th>Area</th>					
                <th>Nome</th>				
                <th>Email</th>														
                <th>Telefone</th>														
                <th>Data</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitas as $obj) { ?>

                <tr>     								
                    <td><?php echo $obj->nomearea; ?></td>
                    <td><?php echo $obj->nome; ?></td> 					
                    <td><?php echo $obj->email; ?></td>
                    <td><?php echo $obj->telefone; ?></td>
                    <td><?= date('d/m/Y', strtotime($obj->datavisita)) ?></td>
                    <td>																				
                        <ul class="icons-list">						
                            <li class="text-teal-600"><a href="<?php echo base_url($this->uri->segment(1)) . '/visualizar/' . $obj->id; ?>" data-popup="tooltip" title="Visualizar"><i class="icon-search4"></i></a></li>	
                        </ul>																			
                    </td>						
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>