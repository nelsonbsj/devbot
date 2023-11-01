<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Empresa_Model');
        $this->load->library("pagination");
        $this->load->library('Guzzle');
    }

    public function get_saldo($token) {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://www.alura.com.br/',
            'verify' => false
        ]);
        $response = $client->get("https://api.escavador.com/api/v1/quantidade-creditos", [
            'headers' => [
                "Authorization" => "Bearer {$token->token}",
                "X-Requested-With" => "XMLHttpRequest",
            ],
        ]);
        $body = $response->getBody();
        $body = (json_decode((string) $body));
        return $body ;
    }

}
