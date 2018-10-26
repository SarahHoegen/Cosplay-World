<?php

class Usuario
{
    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $apelido;
    public $data_nasc;
    public $imagem;
    public $tipo_user;
    public $atividade;

    public function __construct($nome, $apelido, $data_nasc, $email, $senha, $imagem, $tipo_user, $atividade, $id_usuario = null)
    {
        $this->nome = $nome;
        $this->apelido = $apelido;
        $this->data_nasc = $data_nasc;
        $this->email = $email;
        $this->senha = $senha;
        $this->imagem = $imagem;
        $this->tipo_user = $tipo_user;
        $this->atividade = $atividade;
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

    public function getApelido()
    {
        return $this->apelido;
    }

    public function setApelido($apelido)
    {
        $this->apelido = $apelido;
    }

    public function getDataNasc()
    {
        return $this->data_nasc;
    }

    public function setDataNasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getTipoUser()
    {
        return $this->tipo_user;
    }

    public function setTipoUser($tipo_user)
    {
        $this->tipo_user = $tipo_user;
    }

    public function getAtividade()
    {
        return $this->atividade;
    }

    public function setAtividade($atividade)
    {
        $this->atividade = $atividade;
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