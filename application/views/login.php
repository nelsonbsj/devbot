<style type="text/css">
    body{
        margin:0;
        padding: 0;
    }
    .bloco{
        /*width: 50vw;*/
        /*height: 70vh;*/
        margin-top: 0%;
        background-color: #ccccff;
        /*display: inline-block*/
    }
</style>
<body onload="document.formlogin.login.focus()" class="bloco">
    <!-- Page content -->
    <div class="page-content login-cover">
        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
            <!-- Login form -->
            <form class="login-form" name="formlogin" action="<?php echo base_url() ?>Usuario/processarLogin" method="POST">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-balance icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Acesso ao Sistema</h5>
                            <span class="d-block text-muted">Entre com suas credenciais</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control" placeholder="Username" name= "login">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name = 'senhalogin'>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Entrar<i class="icon-circle-right2 ml-2"></i></button>
                        </div>

                        <div class="text-center">
                            <a href="login_password_recover.html">esqueceu a senha?</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /login form -->

        </div>
    </div>
    <!-- /content area -->
</body>