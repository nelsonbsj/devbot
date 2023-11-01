<style type="text/css">
    body{
        margin:8%;
        padding: 0;
    }
</style>
<body onload="document.formlogin.login.focus()" class="bloco">
    <div class="container" >
        <div class="bs-docs-section clearfix">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <!--<img src="<?php echo base_url() ?>image/logo.png" width="70" height="70" style="border-radius: 4px;"/>-->
                    <h2>Biblioteca de Temas</h2>
                </div>
            </div>
            <div class="row" align="center">
                <div class="col-lg-12">
                    <div class="card text-white bg-primary mb-3" style="max-width: 40rem;">
                        <div class="card-header" align="center">ESCOLHA O TEMA PARA SEU USUARIO</div>
                        <br>
                        <form name='formtema' name='formtema' class="bs-example form-horizontal" action="<?php echo base_url() ?>Usuario/gravarTema" method="POST">

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Login</label>
                                <div class="col-sm-4">
                                    <input type="hidden"  value="<?php echo $this->session->userdata('idUsuario'); ?>" class="form-control" name= "id" id="exampleInputEmail1" aria-describedby="loginHelp">
                                    <input type="text"  value="<?php echo $this->session->userdata('login'); ?>" disabled class="form-control" name= "login" id="exampleInputEmail1" aria-describedby="loginHelp">
                                </div>
                            </div>

                            <fieldset class="form-group" >
                                <legend>Temas</legend>
                                <?php $flag = 1; ?>
                                <table class="table table-hover">
                                    <?php foreach ($temas as $tema) { ?>
                                        <?php
                                        echo ($flag == 1 ? "<tr>" : '');
                                        ?>
                                        <td>
                                            <div class="form-check" align="left">
                                                <label class="col-lg-8 control-label">
                                                    <input type="radio" <?php echo ($this->session->userdata('tema') == $tema ? 'checked' : ''); ?> class="form-check-input" name="optionTema" id="optionsRadios1" value="<?php echo $tema; ?>" >
                                                    <img src="<?php echo base_url() . 'temas/' . $tema; ?>/thumbnail.png" width="80" height="80" style="border-radius: 4px;"/>
                                                </label>
                                            </div>
                                        </td>
                                        <?php
                                        $flag++;
                                        echo ($flag == 4 ? "</tr>" : '');
                                        ($flag == 4 ? $flag = 1 : '');
                                        ?>
                                    <?php } ?>
                                </table>
                            </fieldset>

                            <div align="center">
                                <button type="button" onclick="window.history.back()" class="btn btn-warning">Voltar</button>
                                <button type="submit" class="btn btn-success">selecionar</button> 
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>