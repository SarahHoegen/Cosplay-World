<?php

require_once __DIR__.'/../database/Conexao.php';
require_once 'Site.php';

class CrudSite
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getSite(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM site WHERE id_site = $id");
        $site = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Site($site['nome_site'], $site['link_site'], $site['descricao_site'], $site['imagem_site'], $site['avaliacao_site'], $site['atividade_site'], $site['id_site']);
    }

    public function getSites()
    {
        $consulta = $this->conexao->query("SELECT * FROM site");
        $arraySites = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaSites = [];
        foreach ($arraySites as $site) {
            $listaSites[] = new Site($site['nome_site'], $site['link_site'], $site['descricao_site'], $site['imagem_site'], $site['avaliacao_site'], $site['atividade_site'], $site['id_site']);
        }
        return $listaSites;
    }

    public function insertSite(Site $site)
    {
        $dados[] = $site->getNome();
        $dados[] = $site->getLink();
        $dados[] = $site->getDescricao();
        $dados[] = $site->getImagem();
        $dados[] = $site->getAvaliacao();
        $dados[] = $site->getAtividade();
        $sql = "INSERT INTO site (nome_site, link_site, descricao_site, imagem_site, avaliacao_site, atividade_site) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editarSite(Site $site)
    {
        $nome = $site->getNome();
        $id_site = $site->getId();
        $link = $site->getLink();
        $descricao = $site->getDescricao();
        $imagem = $site->getImagem();
        $avaliacao = $site->getAvaliacao();
        $atividade = $site->getAtividade();

        $sql = "UPDATE site SET nome_site ='$nome', link_site ='$link', descricao_site = '$descricao', imagem_site = '$imagem', avaliacao_site = '$avaliacao', atividade_site = '$atividade' WHERE id_site = $id_site";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function deletarSite($id_site)
    {
        $sql = "DELETE FROM site WHERE id_site = $id_site";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function desativarSite($id_site, $atividade){
        $sql = "UPDATE site SET atividade_site = $atividade WHERE id_site = $id_site";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}