<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function listar() {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    public function inserir($dados) {
        $this->db->insert($this->table, $dados);
        if ($this->db->affected_rows() == '1')
            return $this->db->insert_id();
        return false;
    }

    public function alterar($dados, $id) {
        $this->db->where($this->chave, $id);
        if ($this->db->update($this->table, $dados)) {
            return true;
        }
        return false;
    }

    public function excluir($id) {
        $this->db->where($this->chave, $id);
        $this->db->update($this->table, [$this->excluido => 'S']);
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

    public function get_id($id) {
        $this->db->select('*');
        $this->db->where($this->chave, $id);
        return $this->db->get($this->table)->result()[0];
    }

    public function get_grid($limit, $start) {
        $this->db->select('*');
        $this->db->where($this->excluido, 'N');
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
     public function get_count() {
         $this->db->select('*');
        $this->db->where($this->excluido, 'N');
        return $this->db->count_all($this->table);
    }


}
