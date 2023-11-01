<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_Model extends MY_Model {
    public $table = 'area';
    public $chave = 'area.id';
    public $excluido = 'area.excluido';

}