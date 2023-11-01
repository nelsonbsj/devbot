<div class="container">
    <form role="form" class="user-form" id="user-form" method="post" action="<?php echo base_url(); ?>Empresa/gravar">  
        <input type="hidden" name = 'id' class="form-control" id="staticId" value=" <?php echo $dados->id; ?>">
        <fieldset>
            <legend>Cadastro de Empresa</legend>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nome / Razão SOcial</label>
                <div class="col-sm-6">
                    <input type="text" name = 'nome' class="form-control" id="staticEmail" placeholder="Login do usuario" value="<?php echo $dados->nome; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Fantasia</label>
                <div class="col-sm-6">
                    <input type="text" name = 'fantasia' class="form-control" id="staticEmail" placeholder="Login do usuario" value="<?php echo $dados->fantasia; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">CPF / CNPJ</label>
                <div class="col-sm-4">
                    <input type="text" name = 'cpf_cnpj' class="form-control" id="staticEmail" placeholder="CNPJ (somente numeros)" value="<?php echo $dados->cnpj; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Endereço</label>
                <div class="col-sm-6">
                    <input type="text" name = 'endereco' class="form-control" id="exampleInputEmail1"  placeholder="endereço" value="<?php echo $dados->endereco; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Bairro</label>
                <div class="col-sm-4">
                    <input type="text" name = 'bairro' class="form-control" id="exampleInputEmail1"  placeholder="bairro" value="<?php echo $dados->bairro; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Cidade</label>
                <div class="col-sm-4">
                    <input type="text" name = 'cidade' class="form-control" id="exampleInputEmail1"  placeholder="cidade" value="<?php echo $dados->cidade; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleSelect1" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-4">
                    <select name='estado' class="form-control" id="exampleSelect1">
                        <?php
                        foreach ($estados as $estado) {
                            $selected = ($dados->estado == $estado->id ? "selected='true'" : '');
                            echo "<option $selected value='{$estado->id}'>{$estado->estado}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">CEP</label>
                <div class="col-sm-4">
                    <input type="text" name = 'cep' maxlength="8" class="form-control" id="exampleInputEmail1"  placeholder="CEP" value="<?php echo $dados->cep; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Telefones</label>
                <div class="col-sm-3">
                    <input type="text" name = 'telefone' class="form-control" id="exampleInputEmail1"  placeholder="Telefone 1" value="<?php echo $dados->telefone; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" name = 'email' class="form-control" id="exampleInputEmail1"  placeholder="Enter email" value="<?php echo $dados->email; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-lg-2">Ícone</label>
                <div class="col-lg-0">
                    <select class="form-control" name="icone" style="font-family:'FontAwesome', sans-serif;">
                        <?php foreach ($awesome as $icon) : ?>
                        <option <?php echo (trim($icon->fonte) == trim($dados->icone) ? "selected='true'" : '') ?>  value="<?= $icon->fonte ?>"><?= substr($icon->fonte,3, strlen($icon->fonte)-3).' '.$icon->unicode ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <button type="button" onclick="window.history.back()" class="btn btn-warning">Voltar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
</div>