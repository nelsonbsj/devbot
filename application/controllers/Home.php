<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('Empresa_Model');
        $this->load->model('Area_Model');
        $this->load->library('MobileDetect');
    }

    public function index() {
        $data['areas'] = $this->Area_Model->listar();
        $this->load->view('admin/head');
        $this->load->view('admin/listar',$data);
    }

}
