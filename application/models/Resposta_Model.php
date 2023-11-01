<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Resposta_Model extends CI_Model {

    private $table = 'resposta';

    public function listar() {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }

    function getById($id) {
        $this->db->where('idDocumentos', $id);
        $this->db->limit(1);
        return $this->db->get('documentos')->row();
    }

    function getRespostas($pergunta) {
        $this->db->where('pergunta', $pergunta);
        $this->db->order_by('id');
        //$this->db->limit(1);
        //   echo $this->db->get_compiled_select();
//        die();
        $result = $this->db->get($this->table)->result();
        //print_r($pergunta);
        //die();
        return $result;
    }

    function add($dados) {
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

    public function delete($id) {
        $this->db->where('resposta.id', $id);
        $this->db->delete('resposta');
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

    public function todasPermissoes() {
        $this->db->select('*');
        return $this->db->get('permissoes')->result();
    }

}
