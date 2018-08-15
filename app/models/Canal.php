<?php

class Canal
{
    public $nome;
    public $id;
    public $atividade;
    public $link;
    public $avaliacao;
    public $imagem;
    public $descricao;

    public function __construct($nome, $link, $descricao, $imagem, $avaliacao, $atividade,  $id = null)
    {
        $this->nome = $nome;
        $this->id = $id;
        $this->atividade = $atividade;
        $this->link = $link;
        $this->avaliacao = $avaliacao;
        $this->imagem = $imagem;
        $this->descricao = $descricao;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAtividade()
    {
        return $this->atividade;
    }

    public function setAtividade($atividade)
    {
        $this->atividade = $atividade;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

}