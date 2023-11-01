<!-- Column selectors -->
<div class="panel panel-flat">
    <table class="table datatable-button-html5-columns">
        <tr>
            <td>
                
            <a class="btn bg-teal btn-block" href="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/adicionarM/<?php echo $area; ?>"><i class="icon-plus2 position-left"> Multipla Resposta</i></a>
            </td>
            <td>
            <a class="btn bg-teal btn-block" href="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/adicionarT/<?php echo $area; ?>"><i class="icon-plus2 position-right"> Resposta Aberta</i></a>
                
            </td>
            <td>
            <a class="btn bg-teal btn-block" href="<?php echo base_url(); ?><?php echo $this->uri->segment(1); ?>/adicionarF/<?php echo $area; ?>"><i class="icon-plus2 position-right"> Mensagem Final</i></a>
                
            </td>
        </tr>
        
    </table>
    <br>
    <table class="table datatable-button-html5-columns">
        <thead>
            <tr>				
                <th>Area</th>					
                <th>Pendência</th>					
                <th>Pergunta</th>				
                <th>Tipo</th>														
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pergunta as $obj) { ?>

                <tr>     								
                    <td><?php echo $obj->nomearea; ?></td>
                    <td><?php echo ($obj->pendencia == "S" ? 'SIM' : "NÃO"); ?></td>
                    <td><?php echo $obj->descricao; ?></td> 					
                    <td><?php echo $obj->tipo; ?></td>

                    <td>																				
                        <ul class="icons-list">						
                            <li class="text-primary-600"><a href="<?php echo base_url() ?><?php echo $this->uri->segment(1); ?>/editar/<?php echo $obj->id; ?>" data-popup="tooltip" title="Editar"><i class="icon-pencil7"></i></a></li>
                            <li class="text-danger-600"><a href="#" data-popup="tooltip" title="Excluir" class="sweet_loader_id" url="<?php echo $this->uri->segment(1); ?>/excluir" registro="<?php echo $obj->id; ?>"><i class="icon-trash"></i></a></li>
                            <li class="text-teal-600"><a href="<?php echo base_url() ?><?php echo $this->uri->segment(1); ?>/visualizar/<?php echo $obj->id; ?>" data-popup="tooltip" title="Visualizar"><i class="icon-search4"></i></a></li>	
                        </ul>																			
                    </td>						
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /column selectors -->

<script type="text/javascript">
    $(document).ready(function () {


        $(document).on('click', 'a', function (event) {

            var empresa = $(this).attr('empresa');
            $('#idClientes').val(empresa);

            // var span = '<span> <?php echo base_url(); ?>cotacaofornecedor/carregarcotacao/'+fornecedor+'</span>';

            // var span = '<span class="token attr-name"> &lt;a href="http://ouvidoria.carvalhal.com.br/denunciaiframe/carregarIframe/'+empresa+'" target="_blank" title="Faça seu relatos de forma anônima!" &gt; &lt;img src="http://ouvidoria.carvalhal.com.br/public/assets/images/button_ouvidoria.png" alt="Faça seu relatos de forma anônima!" /&gt; &lt;/a&gt; </span>';
            var span = '<span class="token attr-name"> &lt;a href="<?php echo base_url(); ?>apidenuncia/carregarapi/' + empresa + '" target="_blank" title="Faça seu relatos de forma anônima!" &gt; &lt;img src="<?php echo base_url(); ?>public/assets/images/button_ouvidoria.png" alt="Faça seu relatos de forma anônima!" /&gt; &lt;/a&gt; </span>';


            document.getElementById("iframe").innerHTML = span;

            // var span2 = '<span class="token attr-name"> &lt;a href="http://ouvidoria.carvalhal.com.br/denunciaiframe/carregarIframe/'+empresa+'" target="_blank" title="Faça seu relatos de forma anônima!" &gt; &lt;img src="http://ouvidoria.carvalhal.com.br/public/assets/images/button_denuncia.png" alt="Faça seu relatos de forma anônima!" /&gt; &lt;/a&gt; </span>';
            var span2 = '<span class="token attr-name"> &lt;a href="<?php echo base_url(); ?>apidenuncia/carregarapi/' + empresa + '" target="_blank" title="Faça seu relatos de forma anônima!" &gt; &lt;img src="<?php echo base_url(); ?>public/assets/images/button_denuncia.png" alt="Faça seu relatos de forma anônima!" /&gt; &lt;/a&gt; </span>';

            document.getElementById("iframe2").innerHTML = span2;

        });

    });

</script>