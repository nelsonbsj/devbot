<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Consulta_Model extends MY_Model {

    public $table = 'consulta';
    public $chave = 'consulta.id';
    public $excluido = 'consulta.excluido';

}
