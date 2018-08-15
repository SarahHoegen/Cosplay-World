<?php

require_once __DIR__.'/../database/Conexao.php';

require_once 'Cosmaker.php';

class CrudCosmaker
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getCosmaker(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM cosmaker WHERE id_cos = $id");
        $cosmaker = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Cosmaker($cosmaker['nome_cos'], $cosmaker['link_cos'], $cosmaker['funcao_cos'], $cosmaker['descricao_cos'], $cosmaker['imagem_cos'], $cosmaker['avaliacao_cos'], $cosmaker['atividade_cos'], $cosmaker['id_cos']);
    }

    public function getCosmakers()
    {
        $consulta = $this->conexao->query("SELECT * FROM cosmaker");
        $arrayCosmakers = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaCosmakers = [];
        foreach ($arrayCosmakers as $cosmaker) {
            $listaCosmakers[] = new Cosmaker($cosmaker['nome_cos'], $cosmaker['link_cos'], $cosmaker['funcao_cos'], $cosmaker['descricao_cos'], $cosmaker['imagem_cos'], $cosmaker['avaliacao_cos'], $cosmaker['atividade_cos'], $cosmaker['id_cos']);
        }
        return $listaCosmakers;
    }

    public function insertCosmaker(Cosmaker $cosmaker)
    {
        $dados[] = $cosmaker->getNome();
        $dados[] = $cosmaker->getLink();
        $dados[] = $cosmaker->getFuncao();
        $dados[] = $cosmaker->getDescricao();
        $dados[] = $cosmaker->getImagem();
        $dados[] = $cosmaker->getAvaliacao();
        $dados[] = $cosmaker->getAtividade();
        $sql = "INSERT INTO cosmaker (nome_cos, link_cos, funcao_cos, descricao_cos, imagem_cos, avaliacao_cos, atividade_cos) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editarCosmaker(Cosmaker $cosmaker)
    {
        $nome = $cosmaker->getNome();
        $id_cos = $cosmaker->getId();
        $link = $cosmaker->getLink();
        $funcao = $cosmaker->getFuncao();
        $descricao = $cosmaker->getDescricao();
        $imagem = $cosmaker->getImagem();
        $avaliacao = $cosmaker->getAvaliacao();
        $atividade = $cosmaker->getAtividade();

        $sql = "UPDATE cosmaker SET nome_cos ='$nome', link_cos ='$link', funcao_cos = '$funcao', descricao_cos = '$descricao', imagem_cos = '$imagem', avaliacao_cos = '$avaliacao', atividade_cos = '$atividade' WHERE id_cos = $id_cos";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function deletarCosmaker($id_cos)
    {
        $sql = "DELETE FROM cosmaker WHERE id_cos = $id_cos";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

