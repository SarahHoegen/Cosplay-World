<?php

class Evento
{
    public $id;
    public $nome;
    public $link;
    public $descricao;
    public $data;
    public $data2;
    public $data3;
    public $hora;
    public $hora2;
    public $hora3;
    public $hora_fim;
    public $hora_fim2;
    public $hora_fim3;
    public $local;
    public $imagem;
    public $atividade;
    public $id_usuario;

    public function __construct($nome, $link, $descricao, $data, $data2, $data3, $hora, $hora2, $hora3, $hora_fim, $hora_fim2, $hora_fim3, $local, $imagem, $atividade, $id = null, $id_usuario)
    {
        $this->nome = $nome;
        $this->link = $link;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->data2 = $data2;
        $this->data3 = $data3;
        $this->hora = $hora;
        $this->hora2 = $hora2;
        $this->hora3 = $hora3;
        $this->hora_fim = $hora_fim;
        $this->hora_fim2 = $hora_fim2;
        $this->hora_fim3 = $hora_fim3;
        $this->local = $local;
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

    public function getData2()
    {
        return $this->data2;
    }

    public function setData2($data2)
    {
        $this->data2 = $data2;
    }

    public function getData3()
    {
        return $this->data3;
    }

    public function setData3($data3)
    {
        $this->data3 = $data3;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getHora2()
    {
        return $this->hora2;
    }

    public function setHora2($hora2)
    {
        $this->hora2 = $hora2;
    }

    public function getHora3()
    {
        return $this->hora3;
    }

    public function setHora3($hora3)
    {
        $this->hora3 = $hora3;
    }

    public function getHoraFim()
    {
        return $this->hora_fim;
    }

    public function setHoraFim($hora_fim)
    {
        $this->hora_fim = $hora_fim;
    }

    public function getHoraFim2()
    {
        return $this->hora_fim2;
    }

    public function setHoraFim2($hora_fim2)
    {
        $this->hora_fim2 = $hora_fim2;
    }

    public function getHoraFim3()
    {
        return $this->hora_fim3;
    }

    public function setHoraFim3($hora_fim3)
    {
        $this->hora_fim3 = $hora_fim3;
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