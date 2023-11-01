<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Area_Model');
        $this->load->model('Awesome_Model');
        $this->load->model('Pergunta_Model');
        $this->load->model('Resposta_Model');
        $this->load->library("pagination");
    }

    public function index() {
        $config = array();
        $config["base_url"] = base_url() . "area";
        $config["total_rows"] = $this->Area_Model->get_count();
        $config["per_page"] = 8;
        //$config["per_page"] = $this->session->userdata('grid');
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data["menu"] = 'area';

        $data['tabela'] = $this->Area_Model->get_grid($config["per_page"], $page);
        
        $data['meio'] = 'area/grid';
        $this->load->view('admin/index', $data);
    }

    public function lista() {
        $data['area'] = $this->Area_Model->listar();
        $data['meio'] = 'area/listar';
        $this->load->view('admin/index', $data);
    }

    public function icons() {
        $data['awesome'] = $this->Awesome_model->listar();
        $data['meio'] = 'area/iconsarea';
        $this->load->view('tema/tema', $data);
    }

//    public function montaquestao() {
//        //echo $this->input->post('area');
//        $dadosView['area'] = ($this->input->post('area'));
//        $dadosView['pergunta'] = $this->Pergunta_model->getPerguntaInicial($this->input->post('area'));
//        $dadosView['respostas'] = $this->Resposta_model->getRespostas($dadosView['pergunta']->id);
//        $dadosView['meio'] = 'area/questionario';
//        $dadosView['id'] = $this->uri->segment(3);
//        $this->load->view('tema/tema', $dadosView);
//    }

//    public function montaproxima() {
//        $proxima =  explode('-', $this->input->post('resposta'));
////        print_r($proxima);
////        die();
//        $dadosView['area'] = $this->input->post('area');
//        $dadosView['pergunta'] = $this->Pergunta_model->getPergunta($proxima[0]);
//        $dadosView['respostas'] = $this->Resposta_model->getRespostas($proxima[0]);
//        $dadosView['meio'] = 'area/questionario';
//        $dadosView['id'] = $this->uri->segment(3);
//        $this->load->view('tema/tema', $dadosView);
//    }

    public function adicionar() {
        $data['awesome'] = $this->Awesome_Model->listar();
        $data['acao'] = 'insert';
        $data['meio'] = 'area/areacrud';
        $this->load->view('admin/index', $data);
    }

    public function gravar() {
        $dados = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'icone' => $this->input->post('icone'),
            'status' => $this->input->post('status'),
            'pergunta_inicial' => $this->input->post('pergunta_inicial'),
            'tamanho' => $this->input->post('tamanho')
        );

        if ($this->input->post('acao') == 'insert') {
            $resultado = $this->Area_Model->inserir($dados);
        } elseif ($this->input->post('acao') == 'update') {
            $resultado = $this->Area_Model->alterar($dados,$this->input->post('id'));
        }
        redirect('Area/index', 'refresh');
    }

    public function editar() {
        $id = $this->uri->segment(3);
        $dados['awesome'] = $this->Awesome_Model->listar();
        $dados['area'] = $this->Area_Model->get_id($id);
        $dados['pergunta'] = $this->Pergunta_Model->listar($id);
        $dados['acao'] = 'update';
        $dados['meio'] = 'area/areacrud';
        $this->load->view('admin/index', $dados);
    }

    public function excluir() {
        $id = $this->uri->segment(3);
        $this->Area_model->excluir($id);
        redirect('Area/lista', 'refresh');
    }

    public function visualizar() {
        $id = $this->uri->segment(3);

        $dadosView['dados'] = $this->Cliente_model->pegarPorId($id);
        $dadosView['cidades'] = $this->Cliente_model->todasCidadesIdEstado($dadosView['dados'][0]->cliente_estado);
        $dadosView['estados'] = $this->Cliente_model->todosEstados();
        $dadosView['permissoes'] = $this->Cliente_model->todasPermissoes();

        $dadosView['meio'] = 'cliente/visualizar';

        $this->load->view('tema/tema', $dadosView);
    }

}

/* End of file Cliente.php */
/* Location: ./application/controllers/Cliente.php */