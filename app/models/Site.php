<?php

class Site
{
    public $id;
    public $nome;
    public $link;
    public $descricao;
    public $imagem;
    public $avaliacao;
    public $atividade;

    public function __construct($nome, $link, $descricao, $imagem, $avaliacao, $atividade,  $id = null)
    {
        $this->nome = $nome;
        $this->link = $link;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->avaliacao = $avaliacao;
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

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;
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