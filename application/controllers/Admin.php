<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('Empresa_Model');
        $this->load->model('Area_Model');
        $this->load->library('MobileDetect');
    }

    public function index() {
        $data['empresa'] = $this->Empresa_Model->get_empresa('1');
        $data['areas'] = $this->Area_Model->listar();
        $data['meio'] = 'admin/listar';
        $mdetect = new MobileDetect();

        if (empty($this->session->userdata('idUsuario'))) {
            $this->load->view('admin/head');
            $this->load->view('login', $data);
        } else {
            $data['dispositivo'] = '';
            $data["menu"] = 'dashboard';
            if ($mdetect->isMobile()) {
                // Detect mobile/tablet  
                if ($mdetect->isTablet()) {
                    $data['dispositivo'] = 'Acesso por Tablet!';
                } else {
                    $data['dispositivo'] = 'Acesso por Mobile!';
                }
                $this->load->view('admin/index', $data);
            } else {
                $data['dispositivo'] = 'Computador!';
                $this->load->view('admin/index', $data);
            }
        }
    }

}
