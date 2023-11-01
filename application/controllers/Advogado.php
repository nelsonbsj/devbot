<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advogado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Advogado_Model');
        $this->load->library("pagination");
    }

    public function index() {
        $config = array();
        $config["base_url"] = base_url() . "advogado";
        $config["total_rows"] = $this->Advogado_Model->get_count();
//        $config["per_page"] = 8;
        $config["per_page"] = $this->session->userdata('grid');
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data["menu"] = 'Advogado';

        $data['tabela'] = $this->Advogado_Model->get_grid($config["per_page"], $page);
        
        $data['meio'] = 'advogado/grid';
        $this->load->view('admin/index', $data);
    }

    public function adicionar() {
        $data['acao'] = 'insert';
        $data['meio'] = 'advogado/crud';
        $this->load->view('admin/index', $data);
    }

    public function gravar() {
        $dados = array(
            'nome' => $this->input->post('nome'),
            'oab' => $this->input->post('oab'),
            'estado' => $this->input->post('estado')
        );

        if ($this->input->post('acao') == 'insert') {
            $resultado = $this->Advogado_Model->inserir($dados);
            $msg = 'Registro Inserido com êxito';
        } elseif ($this->input->post('acao') == 'update') {
            $resultado = $this->Advogado_Model->alterar($dados,$this->input->post('id'));
            $msg = 'Registro Alterado com êxito';
        }
        
        if ($resultado) {
            $this->session->set_flashdata('mensagem', $msg);
        } else {
            $this->session->set_flashdata('mensagem', 'Tivemos problema para inserir o registro!');
        }
        
        redirect('Advogado/index', 'refresh');
    }

    public function editar() {
        $id = $this->uri->segment(3);
        $dados['acao'] = 'update';
        $dados['advogado'] = $this->Advogado_Model->get_id($id);
        $dados['meio'] = "{$this->uri->segment(1)}/crud";
        $this->load->view('Admin/index', $dados);
    }

    public function excluir() {
        $id = $this->uri->segment(3);
        $this->Advogado_Model->excluir($id);
        redirect('Advogado/index', 'refresh');
    }

}

/* End of file Cliente.php */
/* Location: ./application/controllers/Cliente.php */