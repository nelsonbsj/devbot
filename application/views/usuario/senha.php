<div class="container">
    <form role="form"name="formSenha" class="user-form" onsubmit='return validaSenha()' id="user-form" method="post" action="<?php echo base_url(); ?>Usuario/gravarSenha">  
        <input type="hidden" name = 'id' class="form-control" id="staticId" value=" <?php echo $dados[0]->id; ?>">
        <fieldset>
            <legend>Cadastro de Senha</legend>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Login</label>
                <div class="col-sm-4">
                    <input type="text" disabled="" name = 'login' class="form-control" id="staticEmail" placeholder="Login do usuario" value="<?php echo $dados[0]->login; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputPassword1"  class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-4">
                    <input type="password" required="" name = 'senha' maxlength="6" aria-describedby="senhaHelp" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <small id="senhaHelp" class="form-text text-muted">Nunca compartilhe sua senha.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputPassword1" maxlength="6"  class="col-sm-2 col-form-label">Confirme a Senha</label>
                <div class="col-sm-4">
                    <input type="password" required="" name = 'resenha' class="form-control" id="exampleInputPassword1" placeholder="digite a senha novamente">
                </div>
            </div>
        </fieldset>
        <button type="button" onclick="window.history.back()" class="btn btn-warning">Voltar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
</div>