<div class="container">
    <form role="form" class="user-form" id="user-form" method="post" action="<?php echo base_url(); ?>Usuario/gravar">  
        <input type="hidden" name = 'acao' class="form-control" id="staticId" value=" <?php echo $acao; ?>">
        <input type="hidden" name = 'id' class="form-control" id="staticId" value=" <?php echo ($acao == 'adicionar' ? '' : $dados[0]->id); ?>">
        <fieldset>
            <legend>Cadastro de Usuário</legend>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Login</label>
                <div class="col-sm-4">
                    <input type="text" name = 'login' class="form-control" id="staticEmail" placeholder="Login do usuario" value="<?php echo ($acao == 'adicionar' ? '' : $dados[0]->login); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-4">
                    <input type="text" name = 'nome' class="form-control" id="staticEmail" placeholder="Nome do Usuario" value="<?php echo ($acao == 'adicionar' ? '' : $dados[0]->nome); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleSelect1" class="col-sm-2 col-form-label">Perfil</label>
                <div class="col-sm-4">
                    <select name='perfilusuario' class="form-control" id="exampleSelect1">
                        <?php
                        foreach ($perfilusuario as $perfil) {
                            if ($acao != 'adicionar') {
                                $selected = ($dados[0]->perfilusuario == $perfil->id ? "selected='true'" : '');
                            }
                            echo "<option $selected value='{$perfil->id}'>{$perfil->descricao}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" name = 'email' class="form-control" id="exampleInputEmail1"  placeholder="Enter email" value=" <?php echo ($acao == 'adicionar' ? '' : $dados[0]->email); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">No Linhas Grid</label>
                <div class="col-sm-4">
                    <input type="text" name = 'grid' class="form-control" id="exampleInputEmail1"  placeholder="numero" value=" <?php echo (int)($acao == 'adicionar' ? 0 :$dados[0]->grid); ?>">
                </div>
            </div>
        </fieldset>
        <button type="button" onclick="window.history.back()" class="btn btn-warning">Voltar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
</div>