<?php

class Cosmaker
{
    public $id;
    public $nome;
    public $link;
    public $link2;
    public $funcao;
    public $descricao;
    public $imagem;
    public $avaliacao;
    public $atividade;
    public $id_usuario;

    public function __construct($nome, $link, $link2, $funcao, $descricao, $imagem, $atividade,  $id = null, $id_usuario)
    {
        $this->nome = $nome;
        $this->link = $link;
        $this->link2 = $link2;
        $this->funcao = $funcao;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->atividade = $atividade;
        $this->id = $id;
        $this->id_usuario = $id_usuario;
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

    public function getLink2()
    {
        return $this->link2;
    }

    public function setLink2($link2)
    {
        $this->link2 = $link2;
    }

    public function getFuncao()
    {
        return $this->funcao;
    }

    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;
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

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

}