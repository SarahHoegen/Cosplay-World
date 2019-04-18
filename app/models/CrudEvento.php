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
        return new Evento($evento['nome_evento'], $evento['link_evento'], $evento['descricao_evento'], $evento['data_evento'], $evento['data_evento2'], $evento['data_evento3'], $evento['hora_evento'],
            $evento['hora_evento2'], $evento['hora_evento3'], $evento['hora_evento_fim'], $evento['hora_evento_fim2'], $evento['hora_evento_fim3'], $evento['local_evento'], $evento['imagem_evento'], $evento['atividade_evento'], $evento['id_evento'], $evento['id_usuario']);
    }

    public function getEventos()
    {
        $consulta = $this->conexao->query("SELECT * FROM evento");
        $arrayEventos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaEventos = [];
        foreach ($arrayEventos as $evento) {
            $listaEventos[] = new Evento($evento['nome_evento'], $evento['link_evento'], $evento['descricao_evento'], $evento['data_evento'], $evento['data_evento2'], $evento['data_evento3'], $evento['hora_evento'],
                $evento['hora_evento2'], $evento['hora_evento3'], $evento['hora_evento_fim'], $evento['hora_evento_fim2'], $evento['hora_evento_fim3'], $evento['local_evento'], $evento['imagem_evento'], $evento['atividade_evento'], $evento['id_evento'], $evento['id_usuario']);
        }
        return $listaEventos;
    }

    public function insertEvento(Evento $evento)
    {
        $dados[] = $evento->getNome();
        $dados[] = $evento->getLink();
        $dados[] = $evento->getDescricao();
        $dados[] = $evento->getData();
        $dados[] = $evento->getData2();
        $dados[] = $evento->getData3();
        $dados[] = $evento->getHora();
        $dados[] = $evento->getHora2();
        $dados[] = $evento->getHora3();
        $dados[] = $evento->getHoraFim();
        $dados[] = $evento->getHoraFim2();
        $dados[] = $evento->getHoraFim3();
        $dados[] = $evento->getLocal();
        $dados[] = $evento->getImagem();
        $dados[] = $evento->getAtividade();
        $dados[] = $evento->getIdUsuario();
        if($dados[4] == null){
        $sql = "INSERT INTO evento (nome_evento, link_evento, descricao_evento, data_evento, data_evento2, data_evento3, hora_evento, hora_evento2,
 hora_evento3, hora_evento_fim, hora_evento_fim2, hora_evento_fim3, local_evento, imagem_evento, atividade_evento, id_usuario) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', null, null, '$dados[6]', null, null, '$dados[9]', null,
 null, '$dados[12]', '$dados[13]', '$dados[14]', '$dados[15]')";    
        }
        elseif($dados[5] == null){
            $sql = "INSERT INTO evento (nome_evento, link_evento, descricao_evento, data_evento, data_evento2, data_evento3, hora_evento, hora_evento2,
 hora_evento3, hora_evento_fim, hora_evento_fim2, hora_evento_fim3, local_evento, imagem_evento, atividade_evento, id_usuario) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', null, '$dados[6]', '$dados[7]', null, '$dados[9]', '$dados[10]',
 null, '$dados[12]', '$dados[13]', '$dados[14]', '$dados[15]')";
        }
        else{$sql = "INSERT INTO evento (nome_evento, link_evento, descricao_evento, data_evento, data_evento2, data_evento3, hora_evento, hora_evento2,
 hora_evento3, hora_evento_fim, hora_evento_fim2, hora_evento_fim3, local_evento, imagem_evento, atividade_evento, id_usuario) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]',
 '$dados[11]', '$dados[12]', '$dados[13]', '$dados[14]', '$dados[15]')";
}

        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editarEvento(Evento $evento)
    {
        $id_evento = $evento->getId();
        $nome = $evento->getNome();
        $link = $evento->getLink();
        $descricao = $evento->getDescricao();
        $data = $evento->getData();
        $data2 = $evento->getData2();
        $data3 = $evento->getData3();
        $hora = $evento->getHora();
        $hora2 = $evento->getHora2();
        $hora3 = $evento->getHora3();
        $hora_fim = $evento->getHoraFim();
        $hora_fim2 = $evento->getHoraFim2();
        $hora_fim3 = $evento->getHoraFim3();
        $local = $evento->getLocal();
        $imagem = $evento->getImagem();
        $atividade = $evento->getAtividade();
        if($imagem == null) {
            $sql = "UPDATE evento SET nome_evento ='$nome', link_evento = '$link', descricao_evento = '$descricao', data_evento = '$data', data_evento2 = '$data2', data_evento3 = '$data3', hora_evento = '$hora', 
hora_evento2 = '$hora2', hora_evento3 = '$hora3', hora_evento_fim = '$hora_fim', hora_evento_fim2 = '$hora_fim2', hora_evento_fim3 = '$hora_fim3', local_evento = '$local', atividade_evento = '$atividade' WHERE id_evento = $id_evento";
        }else{
            $sql = "UPDATE evento SET nome_evento ='$nome', link_evento = '$link', descricao_evento = '$descricao', data_evento = '$data', data_evento2 = '$data2', data_evento3 = '$data3', hora_evento = '$hora', 
hora_evento2 = '$hora2', hora_evento3 = '$hora3', hora_evento_fim = '$hora_fim', hora_evento_fim2 = '$hora_fim2', hora_evento_fim3 = '$hora_fim3', local_evento = '$local', imagem_evento = '$imagem', atividade_evento = '$atividade' WHERE id_evento = $id_evento";
        }
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

    public function linkExists($link) {
        $sql = "SELECT * FROM evento WHERE link_evento = '$link'";
        $consulta = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($consulta != false) {
            return true;
        } else {
            return false;
        }
    }
    public function nomeExists($nome) {
        $sql = "SELECT * FROM evento WHERE nome_evento = '$nome'";
        $consulta = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($consulta != false) {
            return true;
        } else {
            return false;
        }
    }

}