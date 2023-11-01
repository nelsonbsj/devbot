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

class Usuario_Model extends CI_Model {

    protected $table = 'usuario';

    public function __construct() {
        parent::__construct();
    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_login($login) {
        $this->db->select('usuario.id,login,senha,grid,tema,perfilusuario.descricao as perfil');
        $this->db->join('perfilusuario', 'perfilusuario.id = usuario.perfilusuario');
        $this->db->where('login', $login);
        return $this->db->get($this->table)->result();
    }

    public function get_usuario($id) {
        $this->db->select('*');
        $this->db->where('usuario.id', $id);
        return $this->db->get($this->table)->result();
    }

    public function get_grid($limit, $start) {

        $this->db->select('usuario.id,usuario.login,usuario.nome,usuario.email, perfilusuario.descricao as perfil');
        $this->db->join('perfilusuario', 'perfilusuario.id = usuario.perfilusuario');
        $this->db->order_by("usuario.login");
//        echo $this->db->get_compiled_select(); 
//        die();  
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function inserir($dados, $returnId = false) {
        $this->db->insert($this->table, $dados);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    public function alterar($dados, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $dados);

        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

    public function gravarTema($dados, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $dados);

        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}
