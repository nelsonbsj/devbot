
<div class="container">
    <h3 class="title is-3">Lista da Empresa</h3>
    <div class="column">
        <!--<a href = "<?php //echo base_url(); ?>Cliente/adicionar"><button type="button" class="btn btn-success fa fa-plus-square">&nbsp;Novo</button> </a>-->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cpf/CNPJ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tabela as $obj): ?>
                    <tr>
                        <td><?= $obj->id ?></td>
                        <td><?= $obj->nome ?></td>
                        <td><?= $obj->cnpj ?></td>
                        <td><?= $obj->email ?></td>
                        <td><?= $obj->telefone ?></td>
                        <td>
                            <a href="<?php echo base_url() . $this->uri->segment(1); ?>/editar/<?php echo $obj->id; ?>" data-popup="tooltip" title="Editar"><span class="badge badge-primary"><i class="fa fa-file"></i> Editar</span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $links; ?>
    </div>
</div>