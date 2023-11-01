<!-- Form horizontal -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Livro de Visitas</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo base_url().$this->uri->segment(1).'/lista/'.$this->uri->segment(3); ?>" method="post" enctype="multipart/form-data">
            <fieldset class="content-group">
                <legend class="text-bold">Informações</legend> 
                <div class="form-group">
                    <label class="control-label col-lg-2">Nome:</label> 
                    <div class="col-lg-4">
                        <label class="control-label col-lg-10"><?= $visita->nome ?> </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Email:</label> 
                    <div class="col-lg-4">
                        <label class="control-label col-lg-10"><?= $visita->email ?> </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Telefone:</label> 
                    <div class="col-lg-4">
                        <label class="control-label col-lg-10"><?= $visita->telefone ?> </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-lg-2">Dados:</label> 
                    <div class="col-lg-10">
                        <label class="control-label col-lg-10"><?= nl2br($visita->visita); ?> </label>
                    </div>
                </div>


                <table class="table table-hover" id="lista">
<!--                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">Opções de Resposta</th>
                            <th scope="col">Proxima Pergunta</th>
                        </tr>
                    </thead>-->
                    <tbody>
                      

                    </tbody>
                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
            </fieldset> 
            <div class="text-right">
                <button type="submit" class="btn bg-teal">Voltar <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </form>
    </div>
</div>
