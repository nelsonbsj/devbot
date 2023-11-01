<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pergunta_Model extends CI_Model {

    private $table = 'pergunta';

    public function listar($area) {
        $this->db->select('pergunta.id, pergunta.pendencia, pergunta.descricao, pergunta.tipo, area.nome as nomearea');
        $this->db->where('area', $area);
        $this->db->join('area', 'area.id = pergunta.area');
        return $this->db->get($this->table)->result();
    }

    public function listarNot($area, $not) {
        $this->db->select('pergunta.id, pergunta.descricao, pergunta.tipo, area.nome as nomearea');
        $this->db->where('pergunta.area', $area);
        $this->db->where_not_in('pergunta.id', $not);
        $this->db->join('area', 'area.id = pergunta.area');
        return $this->db->get($this->table)->result();
    }

    function getById($id) {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    function getPerguntaInicial($area) {
        $this->db->where('area', $area);
        $this->db->order_by('id');
        //$this->db->limit(1);
        //o Parametro [0] no retorno é apenas pra retornar a pergunta inicial mesmo
        $result = $this->db->get($this->table)->result()[0];

        return $result;
    }

    function getPergunta($id) {
        $this->db->where('id', $id);
        $this->db->order_by('id');
        //$this->db->limit(1);
        //o Parametro [0] no retorno é apenas pra retornar a pergunta inicial mesmo
        $result = $this->db->get($this->table)->result()[0];

        return $result;
    }
    
    
    
    public function inserir($dados) {
        $this->db->insert($this->table, $dados);
        if ($this->db->affected_rows() == '1') {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function editar($id, $dados) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $dados);
        return true;
    }

    public function excluir($id, $dados) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $dados);

        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }

    public function get_ordem() {
        $this->db->select('max(pergunta.id)+1 as id');
        $query = $this->db->get($this->table);
        return $query->result()[0]->id;
    }

    public function todasPermissoes() {
        $this->db->select('*');
        return $this->db->get('permissoes')->result();
    }

}
