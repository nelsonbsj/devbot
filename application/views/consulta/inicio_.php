<div class="content">
    <!-- Vertical form options -->
    <div class="row">
        <div class="col-md-6">

            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Para iniciarmos o atendimento por favor informe alguns de seus dados.</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>pergunta/montaquestao" method="post" enctype="multipart/form-data">
                        <input  type="hidden" name="area" class="form-control" value="<?php echo $id;?>"/>
                        <div class="form-group">
                            <label>Nome:</label>
                            <input required="" type="text" name="nome" class="form-control" placeholder="Seu nome completo"/>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input required="" type="email" name="email" class="form-control" placeholder="seu email"/>
                        </div>
                        <div class="form-group">
                            <label>Telefone:</label>
                            <input required="" type="text" name="telefone" class="form-control" placeholder="(99)9999-9999"/>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Avançar <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /basic layout -->

        </div>
    </div>
</div>
