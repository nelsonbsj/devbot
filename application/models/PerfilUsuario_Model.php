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
class PerfilUsuario_Model extends CI_Model {

    protected $table = 'perfilusuario';

    public function __construct() {
        parent::__construct();
    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_perfil() {
        $query = $this->db->get($this->table);

        return $query->result();
    }
    
    

    public function inserir($dados, $tabela, $returnId = false) {
        $this->db->insert($tabela, $dados);

        if ($this->db->affected_rows() == '1') {
            if ($returnId == true) {
                return $this->db->insert_id($tabela);
            }
            return TRUE;
        }
        return FALSE;
    }

}
