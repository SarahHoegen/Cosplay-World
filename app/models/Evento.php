<?php

class Evento
{
    public $id;
    public $nome;
    public $link;
    public $descricao;
    public $data;
    public $hora;
    public $local;
    public $imagem;
    public $avalicao;
    public $atividade;

    public function __construct($nome, $link, $descricao, $data, $hora, $local, $imagem, $avalicao, $atividade, $id = null)
    {
        $this->nome = $nome;
        $this->link = $link;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->hora = $hora;
        $this->local = $local;
        $this->imagem = $imagem;
        $this->avalicao = $avalicao;
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

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
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

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getLocal()
    {
        return $this->local;
    }

    public function setLocal($local)
    {
        $this->local = $local;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getAvalicao()
    {
        return $this->avalicao;
    }

    public function setAvalicao($avalicao)
    {
        $this->avalicao = $avalicao;
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