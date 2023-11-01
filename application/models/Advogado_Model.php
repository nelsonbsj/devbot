<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Advogado_Model extends MY_Model {

    public $table = 'advogado';
    public $chave = 'advogado.id';
    public $excluido = 'advogado.excluido';

}
