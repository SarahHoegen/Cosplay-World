<?php
session_start();
$baseURL = "http://localhost/Projeto/";
require_once __DIR__. '/../../models/CrudEvento.php';

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch ($acao){

        case 'inserir':
            if($_SESSION['esta_logado'] !=true){
                header('Location:  http://localhost/Projeto/app/controllers/usuario/login.php');
            }else{
            if (!isset($_POST['gravar'])) {
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/eventos/inserir.php';
                include __DIR__.'/../../views/templates/rodape.php';
            }else{
                $erro = false;
                $origem = $_FILES['imagem']['tmp_name'];
                $nome_img = date('dmYhis').$_FILES['imagem']['name'];
                $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
                move_uploaded_file($origem, $destino);
                $id_usuario = $_SESSION['id'];
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $data = $_POST['data1'];
                $hora = $_POST['hora1'];
                $hora_fim = $_POST['hora_fim1'];
                $data2 = null;
                $hora2 = null;
                $hora_fim2 = null;
                $data3 = null;
                $hora3 = null;
                $hora_fim3 = null;
                $id = null;
                if(isset($_POST['data2'])){
                $data2 = $_POST['data2'];
                $hora2 = $_POST['hora2'];
                $hora_fim2 = $_POST['hora_fim2'];
                }
                if(isset($_POST['data3'])){
                $data3 = $_POST['data3'];
                $hora3 = $_POST['hora3'];
                $hora_fim3 = $_POST['hora_fim3'];
                }
                $local = $_POST['local'];
                $imagem = $nome_img;
                $atividade = 0;
                $crud = new CrudEvento();
                $ja_existe = $crud->linkExists($link);
                if ($ja_existe) {
                    $erro = true;
                    $mensagem = "Este link já existe!";
                }
                $ja_existe = $crud->nomeExists($nome);
                if ($ja_existe) {
                    $erro = true;
                    $mensagem = "Este nome já existe!";
                }
                if ($erro == false) {
                    $novoEvento= new Evento($nome, $link, $descricao, $data, $data2, $data3, $hora, $hora2, $hora3, $hora_fim, $hora_fim2, $hora_fim3, $local, $imagem, $atividade,$id, $id_usuario);
                    $res = $crud->insertEvento($novoEvento);
                    if($res){
                        header('Location: http://localhost/Projeto/index.php#eventos');
                    }else{
                        echo "deu erro!";
                    }
                } else {
                    header("location: ?acao=inserir&msg=$mensagem");
                }
                }
                }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudEvento();
                $evento = $crud->getEvento($id);
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/eventos/alterar.php';
                include __DIR__.'/../../views/templates/rodape.php';
            }else{
                if($_FILES['imagem']['name'] == null){
                    $imagem = null;
                }else {
                    $origem = $_FILES['imagem']['tmp_name'];
                    $nome_img = date('dmYhis') . $_FILES['imagem']['name'];
                    $destino = __DIR__ . '/../../../assets/imagens/' . $nome_img;
                    move_uploaded_file($origem, $destino);
                    $imagem = $nome_img;
                }
                $id_usuario = $_SESSION['id'];
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $data = $_POST['data'];
                $data2 = $_POST['data2'];
                $data3 = $_POST['data3'];
                $hora = $_POST['hora'];
                $hora2 = $_POST['hora2'];
                $hora3 = $_POST['hora3'];
                $hora_fim = $_POST['hora_fim'];
                $hora_fim2 = $_POST['hora_fim2'];
                $hora_fim3 = $_POST['hora_fim3'];
                $local = $_POST['local'];
                $atividade = 0;
                $novoEvento = new Evento($nome, $link, $descricao, $data, $data2, $data3, $hora, $hora2, $hora3, $hora_fim, $hora_fim2, $hora_fim3, $local, $imagem, $atividade, $id, $id_usuario);
                $crud = new CrudEvento();
                $res = $crud->editarEvento($novoEvento);
                header('Location: http://localhost/Projeto/index.php#eventos');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudEvento();
                $evento = $crud->getEvento($id);
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/eventos/excluir.php';
                include __DIR__.'/../../views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudEvento();
                $res = $crud->deletarEvento($id);

                if ($res == 1){
                    header('Location: http://localhost/Projeto/index.php#eventos');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo '<a href=" http://localhost/Projeto/index.php#eventos">Voltar</a>';
                }
            }
            break;

        default:
            echo "Invalid action";
    }