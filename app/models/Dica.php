<?php

class Dica
{
    public $id;
    public $nome;
    public $descricao;
    public $data;
    public $atividade;

    public function __construct($nome, $descricao, $data, $atividade, $id = null)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->atividade = $atividade;
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getAtividade()
    {
        return $this->atividade;
    }

    public function setAtividade($atividade)
    {
        $this->atividade = $atividade;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

}