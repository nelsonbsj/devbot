<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Area_Model');
        $this->load->model('Livro_Model');
    }

    public function index() {
        $data['areas'] = $this->Area_Model->listar();
        $data["menu"] = 'visita';
        $data['meio'] = 'visita/lista_area';
        $this->load->view('admin/index', $data);
    }

    public function lista($area) {
        $data['visitas'] = $this->Livro_Model->listar($area);
        $data["menu"] = 'visita';
        $data['meio'] = 'visita/lista';
        $this->load->view('admin/index', $data);
    }

    public function visualizar($id) {
        $data['visita'] = $this->Livro_Model->getById($id);
        $data["menu"] = 'visita';
        $data['meio'] = 'visita/visualiza';
        $this->load->view('admin/index', $data);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */