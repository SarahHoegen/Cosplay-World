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
        return new Cosmaker($cosmaker['nome_cos'], $cosmaker['link_cos'], $cosmaker['link_cos2'], $cosmaker['funcao_cos'], $cosmaker['descricao_cos'], $cosmaker['imagem_cos'], $cosmaker['atividade_cos'], $cosmaker['id_cos'], $cosmaker['id_usuario']);
    }

    public function getCosmakers()
    {
        $consulta = $this->conexao->query("SELECT * FROM cosmaker");
        $arrayCosmakers = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaCosmakers = [];
        foreach ($arrayCosmakers as $cosmaker) {
            $listaCosmakers[] = new Cosmaker($cosmaker['nome_cos'], $cosmaker['link_cos'], $cosmaker['link_cos2'], $cosmaker['funcao_cos'], $cosmaker['descricao_cos'], $cosmaker['imagem_cos'], $cosmaker['atividade_cos'], $cosmaker['id_cos'], $cosmaker['id_usuario']);
        }
        return $listaCosmakers;
    }

    public function insertCosmaker(Cosmaker $cosmaker)
    {
        $dados[] = $cosmaker->getNome();
        $dados[] = $cosmaker->getLink();
        $dados[] = $cosmaker->getLink2();
        $dados[] = $cosmaker->getFuncao();
        $dados[] = $cosmaker->getDescricao();
        $dados[] = $cosmaker->getImagem();
        $dados[] = $cosmaker->getAtividade();
        $dados[] = $cosmaker->getIdUsuario();
        $sql = "INSERT INTO cosmaker (nome_cos, link_cos, link_cos2, funcao_cos, descricao_cos, imagem_cos, atividade_cos, id_usuario) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]')";
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
        $link2 = $cosmaker->getLink2();
        $funcao = $cosmaker->getFuncao();
        $descricao = $cosmaker->getDescricao();
        $imagem = $cosmaker->getImagem();
        $atividade = $cosmaker->getAtividade();
        if($imagem == null){
        $sql = "UPDATE cosmaker SET nome_cos ='$nome', link_cos ='$link', link_cos2 ='$link2', funcao_cos = '$funcao', descricao_cos = '$descricao', atividade_cos = '$atividade' WHERE id_cos = $id_cos";
        }else{
            $sql = "UPDATE cosmaker SET nome_cos ='$nome', link_cos ='$link', link_cos2 ='$link2', funcao_cos = '$funcao', descricao_cos = '$descricao', imagem_cos = '$imagem', atividade_cos = '$atividade' WHERE id_cos = $id_cos";
        }
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function deletarCosmaker($id)
    {
        $sql = "DELETE FROM cosmaker WHERE id_cos = $id";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function desativarCosmaker($id_cos, $atividade){
        $sql = "UPDATE cosmaker SET atividade_cos = $atividade WHERE id_cos = $id_cos";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function linkExists($link) {
        $sql = "SELECT * FROM cosmaker WHERE link_cos = '$link'";
        $consulta = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($consulta != false) {
            return true;
        } else {
            return false;
        }
    }
    public function nomeExists($nome) {
        $sql = "SELECT * FROM cosmaker WHERE nome_cos = '$nome'";
        $consulta = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($consulta != false) {
            return true;
        } else {
            return false;
        }
    }

}