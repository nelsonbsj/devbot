<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Callback_Model');
        $this->load->model('Empresa_Model');
        $this->load->library('Guzzle');
    }

    public function index() {
        $json = file_get_contents('php://input');
        $decoded = json_decode($json, true); //decodifica
        
//        $input = json_decode((string) $decoded);
//        ob_start();
//        var_dump($decoded);
//        $input = ob_get_contents();
//        ob_end_clean();
        
//        $dados = array(
//            'conteudo' => $input
//        );
//        $this->Callback_Model->inserir($dados);
        $dados = array(
            'conteudo' => 'Evento: '.$decoded['event']
        );
        $this->Callback_Model->inserir($dados);
        
    }

    public function form() {
        $data['meio'] = 'callback/grid';
        $this->load->view('admin/index', $data);
    }

    public function gerarcall() {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://www.alura.com.br/',
            'verify' => false
        ]);
        $token = $this->Empresa_Model->get_token(1);

        $response = $client->post("https://api.escavador.com/api/v1/monitoramentos/testcallback", [
            'headers' => [
                "Authorization" => "Bearer {$token->token}",
                "X-Requested-With" => "XMLHttpRequest",
                "Content-Type" => "application/json",
            ],
            'json' => [
                "callback" => "http://devbot.comercial.ws/callback",
                "tipo" => "movimentacao",
            ],
        ]);
        //$body = $response->getBody();
        $body = json_decode((string) $response->getBody());
        $data['status'] =  $body->status;
        $data['meio'] = 'callback/grid';
        $this->load->view('admin/index', $data);
    }

}

/* End of file Cliente.php */
/* Location: ./application/controllers/Cliente.php */