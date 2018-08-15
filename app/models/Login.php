<?php

require_once __DIR__."/../database/Conexao.php";
require_once "Usuario.php";
class Login {

    private $conexao;
    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function logar($email, $senha){

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

        try {
            if ($this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC) != '') {
                return $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
            } else {
//                Aqui entra se não existir nenhum usuario
            }
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function estaLogado(){
        if(!isset($_SESSION["logado"])){
            header('location: ../../index.php');
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header('location: ../../index.php');
    }

    public static function verificaPermissao($tipo_user, $permissao){
        if ($tipo_user < $permissao){
            header('Location: http://localhost/Projeto/index.php');
        }
    }

}