<?php

require_once __DIR__.'/../database/Conexao.php';
require_once 'Dica.php';

class CrudDica
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getDica(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM dica WHERE id_dica = $id");
        $dica = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Dica($dica['nome_dica'], $dica['descricao_dica'], $dica['data_dica'], $dica['atividade_dica'], $dica['id_dica'], $dica['id_usuario']);
    }

    public function getDicas()
    {
        $consulta = $this->conexao->query("SELECT * FROM dica");
        $arrayDicas = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaDicas = [];
        foreach ($arrayDicas as $dica) {
            $listaDicas[] = new Dica($dica['nome_dica'], $dica['descricao_dica'], $dica['data_dica'], $dica['atividade_dica'], $dica['id_dica'], $dica['id_usuario']);
        }
        return $listaDicas;
    }

    public function insertDica(Dica $dica)
    {
        $dados[] = $dica->getNome();
        $dados[] = $dica->getDescricao();
        $dados[] = $dica->getData();
        $dados[] = $dica->getAtividade();
        $dados[] = $dica->getIdUsuario();
        $sql = "INSERT INTO dica (nome_dica, descricao_dica, data_dica, atividade_dica, id_usuario) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editarDica(Dica $dica)
    {
        $nome = $dica->getNome();
        $descricao = $dica->getDescricao();
        $id_dica = $dica->getId();
        $data = $dica->getData();
        $atividade = $dica->getAtividade();

        $sql = "UPDATE dica SET nome_dica ='$nome',descricao_dica ='$descricao', data_dica = '$data', atividade_dica = '$atividade' WHERE id_dica = $id_dica";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deletarDica($id_dica)
    {
        $this->conexao = Conexao::getConexao();
        $sql = "DELETE FROM dica WHERE id_dica = $id_dica";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function desativarDica($id_dica, $atividade){
        $sql = "UPDATE dica SET atividade_dica = $atividade WHERE id_dica = $id_dica";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}