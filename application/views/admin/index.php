<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('admin/head'); ?>

    <body>

        <!-- Main navbar -->
        <div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
            <div class="navbar-brand">
                <a href="<?php echo base_url('Admin'); ?>" class="d-inline-block">
                    <img src="<?php echo base_url('global_assets/images/logo_light.png'); ?>" alt="">
                </a>
            </div>

            <div class="d-md-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="icon-tree5"></i>
                </button>
                <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                    <i class="icon-paragraph-justify3"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                            <i class="icon-paragraph-justify3"></i>
                        </a>
                    </li>
                </ul>

                <span class="navbar-text ml-md-3">
                    <span class="badge badge-mark border-orange-300 mr-2"></span>
                    Olá, <?php echo $this->session->userdata('login'); ?>!
                </span>

                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-make-group mr-2"></i>
                            Conexões
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                            <div class="dropdown-content-body p-2">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-4">
                                        <a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
                                            <i class="icon-github4 icon-2x"></i>
                                            <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Github</div>
                                        </a>

                                        <a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
                                            <i class="icon-dropbox text-blue-400 icon-2x"></i>
                                            <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Dropbox</div>
                                        </a>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
                                            <i class="icon-dribbble3 text-pink-400 icon-2x"></i>
                                            <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Dribbble</div>
                                        </a>

                                        <a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
                                            <i class="icon-google-drive text-success-400 icon-2x"></i>
                                            <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Drive</div>
                                        </a>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
                                            <i class="icon-twitter text-info-400 icon-2x"></i>
                                            <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Twitter</div>
                                        </a>

                                        <a href="#" class="d-block text-default text-center ripple-dark rounded p-3">
                                            <i class="icon-youtube text-danger icon-2x"></i>
                                            <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Youtube</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-pulse2 mr-2"></i>
                            Atividades
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                            <div class="dropdown-content-header">
                                <span class="font-size-sm line-height-sm text-uppercase font-weight-semibold">Latest activity</span>
                                <a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
                            </div>

                            <div class="dropdown-content-body">
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-success-400 rounded-round btn-icon"><i class="icon-mention"></i></a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
                                            <div class="font-size-sm text-muted mt-1">4 minutes ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-pink-400 rounded-round btn-icon"><i class="icon-paperplane"></i></a>
                                        </div>

                                        <div class="media-body">
                                            Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
                                            <div class="font-size-sm text-muted mt-1">36 minutes ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-blue rounded-round btn-icon"><i class="icon-plus3"></i></a>
                                        </div>

                                        <div class="media-body">
                                            <a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch in <span class="font-weight-semibold">Limitless</span> repository
                                            <div class="font-size-sm text-muted mt-1">2 hours ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-purple-300 rounded-round btn-icon"><i class="icon-truck"></i></a>
                                        </div>

                                        <div class="media-body">
                                            Shipping cost to the Netherlands has been reduced, database updated
                                            <div class="font-size-sm text-muted mt-1">Feb 8, 11:30</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-warning-400 rounded-round btn-icon"><i class="icon-comment"></i></a>
                                        </div>

                                        <div class="media-body">
                                            New review received on <a href="#">Server side integration</a> services
                                            <div class="font-size-sm text-muted mt-1">Feb 2, 10:20</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <a href="#" class="btn bg-teal-400 rounded-round btn-icon"><i class="icon-spinner11"></i></a>
                                        </div>

                                        <div class="media-body">
                                            <strong>January, 2018</strong> - 1320 new users, 3284 orders, $49,390 revenue
                                            <div class="font-size-sm text-muted mt-1">Feb 1, 05:46</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown-content-footer bg-light">
                                <a href="#" class="font-size-sm line-height-sm text-uppercase font-weight-semibold text-grey mr-auto">All activity</a>
                                <div>
                                    <a href="#" class="text-grey" data-popup="tooltip" title="Clear list"><i class="icon-checkmark3"></i></a>
                                    <a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-gear"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('usuario/logoff') ?>" class="navbar-nav-link">
                            <i class="icon-switch2"></i>
                            <span class="d-md-none ml-2">Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

                <!-- Sidebar mobile toggler -->
                <div class="sidebar-mobile-toggler text-center">
                    <a href="#" class="sidebar-mobile-main-toggle">
                        <i class="icon-arrow-left8"></i>
                    </a>
                    <span class="font-weight-semibold">Navegar</span>
                    <a href="#" class="sidebar-mobile-expand">
                        <i class="icon-screen-full"></i>
                        <i class="icon-screen-normal"></i>
                    </a>
                </div>
                <!-- /sidebar mobile toggler -->


                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- User menu -->
                    <div class="sidebar-user-material">
                        <div class="sidebar-user-material-body">
                            <div class="card-body text-center">
                                <a href="<?php echo base_url('Admin'); ?>">
                                    <i class="icon-balance icon-2x text-warning-300 border-warning-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <!--<img src="<?php //echo base_url('images/chatbot.png');              ?>" class="img-fluid rounded-circle shadow-1 mb-1" width="100" height="100" alt="">-->
                                </a>
                                <h6 class="mb-0 text-white text-shadow-dark">Master</h6>
                                <span class="font-size-sm text-white text-shadow-dark">Advocacia</span>
                            </div>

                            <div class="sidebar-user-material-footer">
                                <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Minha Conta</span></a>
                            </div>
                        </div>

                        <div class="collapse" id="user-nav">
                            <ul class="nav nav-sidebar">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-user-plus"></i>
                                        <span>Perfil</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-coins"></i>
                                        <span>Finanças</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-comment-discussion"></i>
                                        <span>Mensagens</span>
                                        <span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-cog5"></i>
                                        <span>Configurações</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Usuario/logoff') ?>" class="nav-link">
                                        <i class="icon-switch2"></i>
                                        <span>Sair</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /user menu -->

                    <?php require_once 'menu.php'; ?>  

                </div>
                <!-- /sidebar content -->
            </div>
            <!-- /main sidebar -->

            <!-- Main content -->

            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-md-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                            <a href="<?php echo base_url('Admin'); ?>" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>
                    </div>

                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="<?php echo base_url('Admin'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <span class="breadcrumb-item active"><?php echo $this->uri->segment(1); ?></span>
                            </div>

                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /page header -->

                <!-- Content area -->
                <div class="content">

                    <!-- Traffic sources -->
                    <div class="card">

                        <!--<div class="card-body py-0">-->

                        <!--INICIO  MODAL MENSAGEM  -->
                        <?php if ($this->session->flashdata('mensagem')) { ?>
                            <div class="modal fade" id="msgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">MENSAGEM</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            echo $this->session->flashdata('mensagem');
                                            $this->session->unset_userdata('mensagem');
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--    <button type="button" id='btclick' class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                            </button>-->
                        <script type='text/javascript'>
                            $("#msgModal").modal("show");
                        </script>
                        <!-- FIM MODAL MENSAGEM  -->
                        <div class="content">
                            <?php
                            if (isset($meio)) {
                                $this->load->view($meio);
                            }
                            ?>

                        </div>
                    </div>
                    <!-- /traffic sources -->



                </div>
                <!-- /content area -->


                <!-- Footer -->
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <span class="navbar-text">
                            &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                        </span>

                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                            <li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
                            <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </body>
</html>
