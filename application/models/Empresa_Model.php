<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Usuario_Model
 *
 * @author nelso
 */
class Empresa_Model extends CI_Model {

    protected $table = 'empresa';

    public function __construct() {
        parent::__construct();
    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_empresa($id) {
        $this->db->select('*');
        $this->db->where('empresa.id', $id);
        return $this->db->get($this->table)->result()[0];
    }

    public function get_nome($id) {
        $this->db->select('empresa.nome');
        $this->db->where('empresa.id', $id);
        return $this->db->get($this->table)->result()[0];
    }

    public function get_token($id) {
        $this->db->select('empresa.token');
        $this->db->where('empresa.id', $id);
        $result = $this->db->get($this->table)->result();
        return $result[0];
    }

    public function get_empresaall() {
        return $this->db->get($this->table)->result();
    }

    public function get_grid($limit, $start) {

        $this->db->select('*');
        $this->db->order_by("empresa.nome");
//        echo $this->db->get_compiled_select(); 
//        die();  
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function alterar($dados, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $dados);

        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }

}
