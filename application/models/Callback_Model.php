<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Callback_Model extends MY_Model {

    public $table = 'callback';
    public $chave = 'callback.id';
    public $excluido = 'callback.excluido';

}
