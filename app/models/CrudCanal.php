<?php

require_once __DIR__. '/../database/Conexao.php';
require_once 'Canal.php';

class CrudCanal
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getCanal(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM canal WHERE id_canal = $id");
        $canal = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Canal($canal['nome_canal'], $canal['link_canal'], $canal['descricao_canal'], $canal['imagem_canal'], $canal['avaliacao_canal'], $canal['atividade_canal'], $canal['id_canal']);
    }

    public function getCanais()
    {
        $consulta = $this->conexao->query("SELECT * FROM canal");
        $arrayCanais = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaCanais = [];
        foreach ($arrayCanais as $canal) {
            $listaCanais[] = new Canal($canal['nome_canal'], $canal['link_canal'], $canal['descricao_canal'], $canal['imagem_canal'], $canal['avaliacao_canal'], $canal['atividade_canal'], $canal['id_canal']);
        }
        return $listaCanais;
    }

    public function insertCanal(Canal $canal)
    {
        $dados[] = $canal->getNome();
        $dados[] = $canal->getLink();
        $dados[] = $canal->getDescricao();
        $dados[] = $canal->getImagem();
        $dados[] = $canal->getAvaliacao();
        $dados[] = $canal->getAtividade();
        $sql = "INSERT INTO canal (nome_canal, link_canal, descricao_canal, imagem_canal, avaliacao_canal, atividade_canal) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editarCanal(Canal $canal)
    {
        $nome = $canal->getNome();
        $id_canal = $canal->getId();
        $link = $canal->getLink();
        $descricao = $canal->getDescricao();
        $imagem = $canal->getImagem();
        $avaliacao = $canal->getAvaliacao();
        $atividade = $canal->getAtividade();

        $sql = "UPDATE canal SET nome_canal ='$nome', link_canal ='$link', descricao_canal ='$descricao', imagem_canal = '$imagem', avaliacao_canal = '$avaliacao', atividade_canal = '$atividade' WHERE id_canal = $id_canal";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function deletarCanal($id_canal)
    {
        $sql = "DELETE FROM canal WHERE id_canal = $id_canal";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function desativarCanal($id_canal, $atividade){
        $sql = "UPDATE canal SET atividade_canal = $atividade WHERE id_canal = $id_canal";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

