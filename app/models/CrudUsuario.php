<?php

require_once __DIR__.'/../database/Conexao.php';

require_once 'Usuario.php';

class CrudUsuario
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getUsuarios()
    {

        $sql = 'SELECT * FROM usuario';

        $resultado = $this->conexao->query($sql);

        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaUsuarios = [];

        foreach ($usuarios as $usuario) {
            $listaUsuarios[] = new Usuario($usuario['nome'], $usuario['apelido'], $usuario['data_nasc'], $usuario['email'], $usuario['senha'], $usuario['imagem'], $usuario['tipo_user'], $usuario['atividade'], $usuario['id_usuario']);


        }
        return $listaUsuarios;
    }

    public function getUsuario($id_usuario)
    {
        $consulta = $this->conexao->query("SELECT * FROM usuario WHERE id_usuario = $id_usuario");
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Usuario($usuario['nome'], $usuario['apelido'], $usuario['data_nasc'], $usuario['email'], $usuario['senha'], $usuario['imagem'], $usuario['tipo_user'], $usuario['atividade'], $usuario['id_usuario']);
    }



    public function insertUsuario(Usuario $usuario)
    {
        $dados[] = $usuario->getNome();
        $dados[] = $usuario->getEmail();
        $dados[] = $usuario->getSenha();
        $dados[] = $usuario->getApelido();
        $dados[] = $usuario->getImagem();
        $dados[] = $usuario->getDataNasc();
        $dados[] = $usuario->getTipoUser();
        $dados[] = $usuario->getAtividade();
        $sql = "INSERT INTO usuario (nome, email, senha, apelido, imagem, data_nasc, tipo_user, atividade) values ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]'  )";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function updateUsuario(Usuario $usu)
    {
        $id_usuario = $usu->getIdUsuario();
        $nome = $usu->getNome();
        $email = $usu->getEmail();
        $senha = $usu->getSenha();
        $imagem = $usu->getImagem();
        $apelido = $usu->getApelido();
        $data_nasc = $usu->getDataNasc();
        $tipo_user = $usu->getTipoUser();
        $atividade = $usu->getAtividade();

        $sql = "UPDATE usuario SET nome= '$nome', email='$email', senha='$senha', imagem='$imagem', apelido='$apelido', data_nasc='$data_nasc', tipo_user='$tipo_user', atividade='$atividade' WHERE id_usuario =$id_usuario";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();

        }
    }

    public function deleteUsuario($id_usuario)
    {

        $sql = "DELETE FROM usuario WHERE id_usuario=" . $id_usuario;
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();

        }
    }
}
