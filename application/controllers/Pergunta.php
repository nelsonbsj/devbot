<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pergunta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Area_Model');
        $this->load->model('Awesome_Model');
        $this->load->model('Pergunta_Model');
        $this->load->model('Resposta_Model');
        $this->load->model('Livro_Model');
    }

    public function index() {
        //$dadosView['meio'] = 'pergunta/inicio';
        $dadosView['id'] = $this->uri->segment(3);
        $this->load->view('admin/head');
        $this->load->view('pergunta/inicio', $dadosView);
    }

    public function lista() {
        $area = $this->uri->segment(3);
        $data['pergunta'] = $this->Pergunta_Model->listar($area);
        $data["menu"] = 'area';
        $data['area'] = $area;

        $data['meio'] = 'pergunta/listar';

        $this->load->view('admin/index', $data);
    }

    public function montaquestao() {
        $idlivro = $this->Livro_Model->get_ordem();

        $dadosLivro = array(
            'id' => $idlivro,
            'area' => $this->input->post('area'),
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'datavisita' => date('Y-m-d H:i:s'),
            'telefone' => $this->input->post('telefone')
        );
        $this->Livro_Model->inserir($dadosLivro);

        $this->session->set_userdata("idlivro", $idlivro);

        $dadosView['area'] = ($this->input->post('area'));
        $dadosView['pergunta'] = $this->Pergunta_Model->getPerguntaInicial($this->input->post('area'));

        if ($dadosView['pergunta']->tipo == "M") {
            $dadosView['respostas'] = $this->Resposta_Model->getRespostas($dadosView['pergunta']->id);
            $dadosView['meio'] = 'pergunta/questionarioM';
        } elseif ($dadosView['pergunta']->tipo == "T") {
            $dadosView['meio'] = 'pergunta/questionarioT';
        } elseif ($dadosView['pergunta']->tipo == "F") {
            $dadosView['meio'] = 'pergunta/questionarioF';
        }

        $dadosView['id'] = $this->uri->segment(3);
        $this->load->view('admin/head');
        $this->load->view($dadosView['meio'], $dadosView);
    }

    public function montaproxima() {
        $visita = $this->Livro_Model->get_visita($this->session->userdata('idlivro'));

        $dadosView['area'] = $this->input->post('area');
        if ($this->input->post('tipo') == "M") {
            $proxima = explode('-', $this->input->post('resposta'));

            //inicio grava a interação anterior
            $registro = array(
                'visita' => $visita->visita . " Pergunta: " . $this->input->post('pergunta') . "\n" .
                " Resposta: " . $proxima[1] . "\n"
            );
            $this->Livro_Model->editar($this->session->userdata('idlivro'), $registro);
            //fim grava a interação anterior

            $dadosView['pergunta'] = $this->Pergunta_Model->getPergunta($proxima[0]);
            $dadosView['respostas'] = $this->Resposta_Model->getRespostas($proxima[0]);
        } elseif ($this->input->post('tipo') == "T") {
            //inicio grava a interação anterior
            $registro = array(
                'visita' => $visita->visita . " Pergunta: " . $this->input->post('pergunta') . "\n" .
                " Resposta: " . $this->input->post('resposta') . "\n"
            );
            $this->Livro_Model->editar($this->session->userdata('idlivro'), $registro);
            //fim grava a interação anterior
            //fim grava a interação anterior

            $dadosView['pergunta'] = $this->Pergunta_Model->getPergunta($this->input->post('proxima_perg'));
            $dadosView['respostas'] = $this->Resposta_Model->getRespostas($this->input->post('proxima_perg'));
        }


        if ($dadosView['pergunta']->tipo == "M") {
            $dadosView['meio'] = 'pergunta/questionarioM';
        } elseif ($dadosView['pergunta']->tipo == "T") {
            $dadosView['meio'] = 'pergunta/questionarioT';
        } elseif ($dadosView['pergunta']->tipo == "F") {
            $dadosView['meio'] = 'pergunta/questionarioF';
        }

        $dadosView['id'] = $this->uri->segment(3);
        $this->load->view('admin/head');
        $this->load->view($dadosView['meio'], $dadosView);
    }

    public function adicionarM() {
        $dados['acao'] = 'insert';
        $dados['idpergunta'] = $this->Pergunta_Model->get_ordem();
        $dados['area'] = $this->uri->segment(3);
        $dados['pergunta'] = $this->Pergunta_Model->listar($this->uri->segment(3));
        $dados['meio'] = 'pergunta/pergMcrud';
        $this->load->view('admin/index', $dados);
    }

    public function adicionarT() {
        $dados['acao'] = 'insert';
        $dados['area'] = $this->uri->segment(3);
        $dados['pergunta'] = $this->Pergunta_Model->listar($this->uri->segment(3));
        $dados['meio'] = 'pergunta/pergTcrud';
        $this->load->view('admin/index', $dados);
    }

    public function adicionarF() {
        $dados['acao'] = 'insert';
        $dados['area'] = $this->uri->segment(3);
        $dados['pergunta'] = $this->Pergunta_Model->listar($this->uri->segment(3));
        $dados['meio'] = 'pergunta/pergFcrud';
        $this->load->view('admin/index', $dados);
    }

    public function editar($id) {
        $id = $this->uri->segment(3);
        $dados['acao'] = 'update';
        $dados['perg'] = $this->Pergunta_Model->getById($id); // apenas a pergunta a alterar
        $dados['pergunta'] = $this->Pergunta_Model->listarNot($dados['perg']->area, $dados['perg']->id); //listagem de perguntas para a proxima pergunta
        $dados['area'] = $dados['perg']->area;
        $dados['resposta'] = $this->Resposta_Model->getRespostas($id);
        if ($dados['perg']->tipo == "T") {
            $dados['meio'] = 'pergunta/pergTcrud';
        } elseif ($dados['perg']->tipo == "M") {
            $dados['meio'] = 'pergunta/pergMcrud';
        } elseif ($dados['perg']->tipo == "F") {
            $dados['meio'] = 'pergunta/pergFcrud';
        }
        $this->load->view('admin/index', $dados);
    }

    public function gravar() {
        $dados = array(
            'area' => $this->input->post('area'),
            'descricao' => $this->input->post('descricao'),
            'proxima_perg' => $this->input->post('proxima_perg'),
            'link' => $this->input->post('link'),
            'tipo' => $this->input->post('tipo')
        );

        if ($this->input->post('tipo') == 'T') {
            if ($this->input->post('proxima_perg') == 0) {
                $dados['pendencia'] = 'S';
            } else {
                $dados['pendencia'] = 'N';
            }
        }

        if ($this->input->post('tipo') == 'M') {
            $dados['pendencia'] = 'N';
            for ($x = 1; $x <= $this->input->post('quantidade_itens'); $x++) {
                ($this->input->post("proxima_perg$x") == 0 ? $dados['pendencia'] = 'S' : null); //setar se existe pendencia de apontamento em prox_perg
                if ($this->input->post("descricao$x") != '') {
                    $itensForm[$x - 1]['pergunta'] = $this->input->post('id');
                    $itensForm[$x - 1]['descricao'] = $this->input->post("descricao$x");
                    $itensForm[$x - 1]['proxima_perg'] = $this->input->post("proxima_perg$x");
                }
            }
        }

        if ($this->input->post('acao') == 'insert') {
            $newid = $this->Pergunta_Model->inserir($dados);
            if ($this->input->post('tipo') == 'M') {
                for ($x = 0; $x < count($itensForm); $x++) {
                    $itensForm[$x]['pergunta'] = $newid;
                }
               // var_dump($itensForm);
               // die();
                $this->incluiItens($itensForm);
            }
        } elseif ($this->input->post('acao') == 'update') {
            $this->Pergunta_Model->editar($this->input->post('id'), $dados);
            /*
             * varifica a quantidade de respostas do crud
             */
            if ($this->input->post('tipo') == 'M') {
                $resItens = $this->Resposta_Model->getRespostas($this->input->post('id'));
                if (count($resItens) == count($itensForm)) {
                    $this->alteraItens($itensForm, $resItens);
                } elseif (count($resItens) > count($itensForm)) {
                    $this->alteraApagaItens($itensForm, $resItens, 'OrcamentoItem');
                } elseif (count($resItens) < count($itensForm)) {
                    $this->alteraIncluiItens($itensForm, $resItens, 'OrcamentoItem');
                }
            }
        }

        redirect('Pergunta/lista/' . $this->input->post('area'), 'refresh');
    }

    function incluiItens($itensForm) {
        foreach ($itensForm as $item) {
            $this->Resposta_Model->add($item);
        }
    }

    function alteraItens($itensForm, $itensTable) {
        for ($flag = 0; $flag < count($itensForm); $flag++) {
            $this->Resposta_Model->alterar($itensForm[$flag], $itensTable[$flag]->id);
        }
    }

    function alteraApagaItens($itensForm, $itensTable) {
        $itensForm = array_values($itensForm);
        for ($flag = 0; $flag <= count($itensTable) - 1; $flag++) {
            if ($flag <= count($itensForm) - 1) {
                $this->Resposta_Model->alterar($itensForm[$flag], $itensTable[$flag]->id);
            } else {
                $this->Resposta_Model->delete($itensTable[$flag]->id);
            }
        }
    }

    function alteraIncluiItens($itensForm, $itensTable) {
        for ($flag = 0; $flag <= count($itensForm) - 1; $flag++) {
            if ($flag <= count($itensTable) - 1) {
                $this->Resposta_Model->alterar($itensForm[$flag], $itensTable[$flag]->id);
            } else {
                $this->Resposta_Model->add($itensForm[$flag]);
            }
        }
    }

    public function excluir() {
        $id = $this->input->post('id');

        $dados = array(
            'cliente_visivel' => 0
        );

        $resultado = $this->Cliente_Model->excluir($id, $dados);

        if ($resultado) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }

    public function visualizar() {
        $id = $this->uri->segment(3);

        $dadosView['dados'] = $this->Cliente_Model->pegarPorId($id);
        $dadosView['cidades'] = $this->Cliente_Model->todasCidadesIdEstado($dadosView['dados'][0]->cliente_estado);
        $dadosView['estados'] = $this->Cliente_Model->todosEstados();
        $dadosView['permissoes'] = $this->Cliente_Model->todasPermissoes();

        $dadosView['meio'] = 'cliente/visualizar';

        $this->load->view('admin/index', $dadosView);
    }

}

/* End of file Cliente.php */
/* Location: ./application/controllers/Cliente.php */