<?php

/**
 * Description of Usuario
 *
 * @author nelso
 */
class Empresa extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->model('Awesome_Model');
        $this->load->model('Empresa_Model');
        $this->load->model('Estados_Model');
        $this->load->library("pagination");
    }

    public function index() {
        $config = array();
        $config["base_url"] = base_url() . "empresa";
        $config["total_rows"] = $this->Empresa_Model->get_count();
        $config["per_page"] = $this->session->userdata('grid');
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['tabela'] = $this->Empresa_Model->get_grid($config["per_page"], $page);

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('empresa/grid', $data);
        $this->load->view('site/footer');
    }

    public function adicionar() {
        $data['estados'] = $this->Estados_Model->get_estados();
        $data['acao'] = 'adicionar';

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('empresa/crudEmpresa', $data);
        $this->load->view('site/footer');
    }

    public function editar($id) {
        $data['awesome'] = $this->Awesome_Model->listar();
        $data['estados'] = $this->Estados_Model->get_estados();
        $data['dados'] = $this->Empresa_Model->get_empresa($id);

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('empresa/crudEmpresa', $data);
        $this->load->view('site/footer');
    }

    public function gravar() {
        $dados = array(
            'nome' => $this->input->post('nome'),
            'cnpj' => $this->input->post('cpf_cnpj'),
            'endereco' => $this->input->post('endereco'),
            'bairro' => $this->input->post('bairro'),
            'cidade' => $this->input->post('cidade'),
            'estado' => $this->input->post('estado'),
            'cep' => $this->input->post('cep'),
            'telefone' => $this->input->post('telefone'),
            'fantasia' => $this->input->post('fantasia'),
            'icone' => $this->input->post('icone'),
            'email' => $this->input->post('email')
        );

        $resultado = $this->Empresa_Model->alterar($dados, $this->input->post('id'));

        if ($resultado) {
            $this->session->set_flashdata('mensagem', 'Registro inserido com sucesso!');
        } else {
            $this->session->set_flashdata('mensagem', 'Tivemos problema para inserir o registro!');
        }
        //die();
        redirect('empresa', 'refresh');
    }

}
