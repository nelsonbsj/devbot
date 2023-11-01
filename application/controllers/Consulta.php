<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Consulta_Model');
        $this->load->model('Empresa_Model');
        $this->load->library("pagination");
        $this->load->library('Guzzle');
    }

    public function index() {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://www.alura.com.br/',
            'verify' => false
        ]);
        $token = $this->Empresa_Model->get_token(1);

        if ($this->input->post('next')) {
            $next = $this->input->post('next');

            $response = $client->get("$next", [
                'headers' => [
                    "Authorization" => "Bearer {$token->token}",
                    "X-Requested-With" => "XMLHttpRequest",
                ],
            ]);
            $body = json_decode((string) $response->getBody());
            $data['items'] = $body->items;
            $data['paginator'] = $body->paginator;
            $data['links'] = $body->links;
        }

        if ($this->input->post('prev')) {
            $prev = $this->input->post('prev');

            $response = $client->get("$prev", [
                'headers' => [
                    "Authorization" => "Bearer {$token->token}",
                    "X-Requested-With" => "XMLHttpRequest",
                ],
            ]);
            $body = json_decode((string) $response->getBody());
            $data['items'] = $body->items;
            $data['paginator'] = $body->paginator;
            $data['links'] = $body->links;
        }

        $data['menu'] = 'consulta_termo';
        $data['meio'] = 'consulta/grid';
        $this->load->view('admin/index', $data);
    }

    public function consultasaldo() {
        $token = $this->Empresa_Model->get_token(1);
        echo $this->get_saldo($token)->saldo_descricao;
    }

    public function linkapi() {
        $token = $this->Empresa_Model->get_token(1);
        // echo 'https://api.escavador.com/api/' . $this->input->get('link');
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://www.alura.com.br/',
            'verify' => false
        ]);

        $response = $client->get("https://api.escavador.com/api/{$this->input->get('link')}", [
            'headers' => [
                "Authorization" => "Bearer {$token->token}",
                "X-Requested-With" => "XMLHttpRequest",
            ],
        ]);
        $body = $response->getBody();

        $corpo = $response->getBody();
        file_put_contents(base_url("artefatos/novo1.json"), $corpo);

        var_dump(json_decode((string) $body));
    }

    public function busca_termo() {
        //var_dump($this->input->post());
//        $arquivo = file_get_contents(base_url("artefatos/newjson.json"));
//        $json = json_decode($arquivo, true);
//        var_dump($json);
//        die();


        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://www.alura.com.br/',
            'verify' => false
        ]);

        $busca = $this->input->post('termodabusca');
        $qo = $this->input->post('qo');
        $token = $this->Empresa_Model->get_token(1);

        $response = $client->get("https://api.escavador.com/api/v1/busca", [
            'headers' => [
                "Authorization" => "Bearer {$token->token}",
                "X-Requested-With" => "XMLHttpRequest",
            ],
            'query' => [
                "q" => "$busca",
                "qo" => "$qo",
                "limit" => "15",
                "page" => "1",
            ],
        ]);
        $body = json_decode((string) $response->getBody());

        $corpo = $response->getBody();
        file_put_contents(base_url("artefatos/novo1.json"), $corpo);

        $data['items'] = $body->items;
        $data['paginator'] = $body->paginator;
        $data['links'] = $body->links;
        $data['meio'] = 'consulta/grid';
        $this->load->view('admin/index', $data);
    }

}

/* End of file Cliente.php */
/* Location: ./application/controllers/Cliente.php */