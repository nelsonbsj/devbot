<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awesome_Model extends MY_Model {

    public $tabela  = 'awesome';
    public $chave  = 'awesome.id';

    public function listar()
    {
        $this->db->select('*');  
        $this->db->order_by('fonte');
        return $this->db->get($this->tabela)->result(); 
    }
}

/* End of file area_model.php */
/* Location: ./application/models/area_model.php */