<!-- Main navigation -->
<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item">
            <a href="<?php echo base_url('Admin'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'dashboard' ? 'active' : '') : '') ?>">
                <i class="icon-home4"></i>
                <span>
                    Dashboard
                </span>
            </a>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-cabinet"></i> <span>Cadastros</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item">
                    <a href="<?php echo base_url('Advogado'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'Advogado' ? 'active' : '') : '') ?> ">
                        <i class="icon-user-tie"> Advogado</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Prioridade'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'Prioridade' ? 'active' : '') : '') ?>">
                        <i class="icon-price-tags"> Prioridades</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Visita'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'visita' ? 'active' : '') : '') ?>">
                        <i class="icon-profile"> Processos</i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url('Consulta'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'consulta_termo' ? 'active' : '') : '') ?> ">
                <i class="icon-search4"></i> 
                <span>Busca Termo</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url('Consulta/consultasaldo'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'consulta_processo' ? 'active' : '') : '') ?> ">
                <i class="icon-search4"></i> 
                <span>Saldo Api</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url('Callback/form'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'consulta_processo' ? 'active' : '') : '') ?> ">
                <i class="icon-phone-incoming"></i> 
                <span>CallBack</span>
            </a>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-bubbles4"></i> <span>ChatBot</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                <li class="nav-item">
                    <a href="<?php echo base_url('Area'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'area' ? 'active' : '') : '') ?> ">
                        <i class="icon-menu6"> Área de Atuação</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Visita'); ?>" class="nav-link <?php echo (isset($menu) ? ($menu == 'visita' ? 'active' : '') : '') ?>">
                        <i class="icon-bookmark4"> Visitas</i>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</div>
<!-- /main navigation -->
<!-- /main -->

