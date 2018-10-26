<?php

require_once __DIR__.'/../database/Conexao.php';
require_once 'Evento.php';

class CrudEvento
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getEvento(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM evento WHERE id_evento = $id");
        $evento = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Evento($evento['nome_evento'], $evento['link_evento'], $evento['descricao_evento'], $evento['data_evento'], $evento['hora_evento'], $evento['local_evento'], $evento['imagem_evento'],$evento['avaliacao_evento'], $evento['atividade_evento'], $evento['id_evento']);
    }

    public function getEventos()
    {
        $consulta = $this->conexao->query("SELECT * FROM evento");
        $arrayEventos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaEventos = [];
        foreach ($arrayEventos as $evento) {
            $listaEventos[] = new Evento($evento['nome_evento'], $evento['link_evento'], $evento['descricao_evento'], $evento['data_evento'], $evento['hora_evento'], $evento['local_evento'], $evento['imagem_evento'],$evento['avaliacao_evento'], $evento['atividade_evento'], $evento['id_evento']);
        }
        return $listaEventos;
    }

    public function insertEvento(Evento $evento)
    {
        $dados[] = $evento->getNome();
        $dados[] = $evento->getLink();
        $dados[] = $evento->getDescricao();
        $dados[] = $evento->getData();
        $dados[] = $evento->getHora();
        $dados[] = $evento->getLocal();
        $dados[] = $evento->getImagem();
        $dados[] = $evento->getAvalicao();
        $dados[] = $evento->getAtividade();
        $sql = "INSERT INTO evento (nome_evento, link_evento, descricao_evento, data_evento, hora_evento, local_evento, imagem_evento, avaliacao_evento, atividade_evento) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]')";
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editarEvento(Evento $evento)
    {
        $nome = $evento->getNome();
        $link = $evento->getLink();
        $descricao = $evento->getDescricao();
        $id_evento = $evento->getId();
        $data = $evento->getData();
        $hora = $evento->getHora();
        $local = $evento->getLocal();
        $imagem = $evento->getImagem();
        $avaliacao = $evento->getAvalicao();
        $atividade = $evento->getAtividade();

        $sql = "UPDATE evento SET nome_evento ='$nome', link_evento = '$link', descricao_evento = '$descricao', data_evento = '$data', hora_evento = '$hora', local_evento = '$local', imagem_evento = '$imagem', avaliacao_evento = '$avaliacao', atividade_evento = '$atividade' WHERE id_evento = $id_evento";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deletarEvento($id_evento)
    {
        $sql = "DELETE FROM evento WHERE id_evento = $id_evento";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function desativarEvento($id_evento, $atividade){
        $sql = "UPDATE evento SET atividade_evento = $atividade WHERE id_evento = $id_evento";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}