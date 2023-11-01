<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Livro_Model extends CI_Model {

    private $table = 'livro';

    public function get_ordem() {
        $this->db->select('max(id)+1 as id');
        $query = $this->db->get($this->table);
        return $query->result()[0]->id;
    }

    public function listar($area) {
        $this->db->where('livro.area', $area);
        $this->db->select('livro.id,area.nome as nomearea,livro.nome,livro.email,livro.telefone,livro.datavisita');
        $this->db->join('area','area.id = livro.area');
        $this->db->order_by('id','desc');
        return $this->db->get($this->table)->result();
    }

    function getById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    function get_visita($id) {
        $this->db->select('visita');
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    function inserir($dados) {
        $this->db->insert($this->table, $dados);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    public function editar($id, $dados) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $dados);
//        echo $this->db->get_compiled_select();
//        die();
        return true;
    }

    public function excluir($id) {
        //die($id);
        $this->db->where('id', $id);
        $this->db->delete('area');
    }

}

/* End of file area_model.php */
/* Location: ./application/models/area_model.php */