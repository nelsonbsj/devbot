<?php

/**
 * Description of Usuario
 *
 * @author nelso
 */
class Usuario extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->model('Usuario_Model');
        $this->load->model('PerfilUsuario_Model');
        $this->load->library("pagination");
    }

    public function index() {
        $config = array();
        $config["base_url"] = base_url() . "usuario";
        $config["total_rows"] = $this->Usuario_Model->get_count();
        //$config["per_page"] = 8;
        $config["per_page"] = $this->session->userdata('grid');
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['tabela'] = $this->Usuario_Model->get_grid($config["per_page"], $page);

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('usuario/grid', $data);
        $this->load->view('site/footer');
    }

    public function processarLogin() {
        $resultado = $this->Usuario_Model->get_login($this->input->post('login'));

        if (count($resultado) == 1) {
            $resultado = json_encode($resultado);
            $resultado = json_decode($resultado, true);
            if (crypt($this->input->post('senhalogin'), $resultado[0]['senha']) == $resultado[0]['senha']) {
                $sessao = array(
                    'tema' => $resultado[0]['tema'],
                    'idUsuario' => $resultado[0]['id'],
                    'login' => $resultado[0]['login'],
                    'perfil' => $resultado[0]['perfil'],
                    'grid' => $resultado[0]['grid']
                );
                $this->session->set_userdata($sessao);
            }
        }
        redirect(base_url(), 'refresh');
    }

    public function logoff() {
        $this->session->sess_destroy();
        header("Location: " . base_url() . "Admin");
    }

    public function adicionar() {
        $data['perfilusuario'] = $this->PerfilUsuario_Model->get_perfil();
        $data['acao'] = 'adicionar';

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('usuario/crudUsuario', $data);
        $this->load->view('site/footer');
    }

    public function editar($id) {
        $data['perfilusuario'] = $this->PerfilUsuario_Model->get_perfil();
        $data['dados'] = $this->Usuario_Model->get_usuario($id);
        $data['acao'] = 'editar';

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('usuario/crudUsuario', $data);
        $this->load->view('site/footer');
    }

    public function senha($id) {
        $data['perfilusuario'] = $this->PerfilUsuario_Model->get_perfil();
        $data['dados'] = $this->Usuario_Model->get_usuario($id);

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('usuario/senha', $data);
        $this->load->view('site/footer');
    }

    public function tema() {
        $dados['temas'] = array(
            'cerulean',
            'cosmo',
            //'cyborg',
            //'darkly',
            //'flatly',
            'journal',
            'litera',
            'lumen',
            'lux',
            'materia',
            //'minty',
            //'pulse',
            //'sandstone',
            //'simplex',
            //'sketchy',
            //'slate',
            'solar',
            //'spacelab',
            //'superhero',
            //'united',
            'yeti'
        );

        $this->load->view('site/header');
        $this->load->view('site/menu');
        $this->load->view('usuario/tema', $dados);
        $this->load->view('site/footer');
    }

    public function gravarTema() {
        $dados = array(
            'tema' => $this->input->post('optionTema')
        );

        $resultado = $this->Usuario_Model->gravarTema($dados, $this->input->post('id'));

        $this->session->set_userdata($dados);
        if ($resultado) {
            $this->session->set_flashdata('mensagem', 'Registro atualizado com sucesso!');
        } else {
            $this->session->set_flashdata('mensagem', 'Tivemos problema para inserir o registro!');
        }
        redirect('home', 'refresh');
    }

    public function gravar() {
        $dados = array(
            'login' => $this->input->post('login'),
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'grid' => $this->input->post('grid'),
            'perfilusuario' => $this->input->post('perfilusuario'),
            //'nascimento' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('nascimento')))),
            'datacadastro' => date('Y-m-d')
        );
        if (trim($this->input->post('acao')) == 'adicionar') {
            $resultado = $this->Usuario_Model->inserir($dados);
        } else {
            $resultado = $this->Usuario_Model->alterar($dados, $this->input->post('id'));
        }

        if ($resultado) {
            $this->session->set_flashdata('mensagem', 'Registro inserido com sucesso!');
        } else {
            $this->session->set_flashdata('mensagem', 'Tivemos problema para inserir o registro!');
        }
        redirect('usuario', 'refresh');
    }

    public function gravarSenha() {
        if ($this->input->post('senha') == $this->input->post('resenha')) {
            $dados = array(
                'senha' => crypt(trim($this->input->post('senha')), '123456')
            );

            $resultado = $this->Usuario_Model->alterar($dados, $this->input->post('id'));

            if ($resultado) {
                $this->session->set_flashdata('mensagem', 'Registro inserido com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Tivemos problema para inserir o registro!');
            }
        }
        redirect('home', 'refresh');
    }

}
