
<div class="container">
    <h3 class="title is-3">Lista de Usuários</h3>
    <div class="column">
        <a href = "<?php echo base_url(); ?>Usuario/adicionar"><button type="button" class="btn btn-success fa fa-plus-square">&nbsp;Novo</button> </a>
       
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Login</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tabela as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->nome ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->perfil ?></td>
                        <td>
                            <a href="<?php echo base_url() . $this->uri->segment(1); ?>/editar/<?php echo $user->id; ?>" data-popup="tooltip" title="Editar"><span class="badge badge-primary"><i class="fa fa-file"></i> Editar</span></a>
                            <a href="<?php echo base_url() . $this->uri->segment(1); ?>/senha/<?php echo $user->id; ?>" data-popup="tooltip" title="Senha"><span class="badge badge-dark"><i class="fa-sharp fa fa-key"></i> Senha</span></a>
                            <a href="<?php echo base_url() . $this->uri->segment(1); ?>/excluir/<?php echo $user->id; ?>" data-confirm="Tem certeza de que deseja excluir o item selecionado?" title="Excluir"><span class="badge badge-danger"><i class="fa fa-trash-o"></i> Excluir</span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $links; ?>
    </div>
</div>