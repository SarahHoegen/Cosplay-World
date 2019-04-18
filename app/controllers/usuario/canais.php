<?php
session_start();
$baseURL = "http://localhost/Projeto/";
require_once __DIR__. '/../../models/CrudCanal.php';

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
                include __DIR__.'/../../views/canais/inserir.php';
                include __DIR__.'/../../views/templates/rodape.php';
                }else {
                $erro = false;
                $origem = $_FILES['imagem']['tmp_name'];
                $nome_img = date('dmYhis').$_FILES['imagem']['name'];
                $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
                move_uploaded_file($origem, $destino);
                $id_usuario = $_SESSION['id'];
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $imagem = $nome_img;
                $atividade = 0;
                $id = null;
                $crud = new CrudCanal();
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
                    $novoCanal = new Canal($nome, $link, $descricao, $imagem, $atividade,$id, $id_usuario);
                    $res = $crud->insertCanal($novoCanal);
                    if ($res) {
                       header('Location: http://localhost/Projeto/index.php#canais');
                    } else {
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
                $crud = new CrudCanal();
                $canal = $crud->getCanal($id);
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/canais/alterar.php';
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
                $origem = $_FILES['imagem']['tmp_name'];
                $nome_img = date('dmYhis').$_FILES['imagem']['name'];
                $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
                move_uploaded_file($origem, $destino);
                $id = $_POST['id'];
                $id_usuario = $_SESSION['id'];
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $atividade = 0;
                $novoCanal = new Canal($nome, $link, $descricao, $imagem, $atividade, $id, $id_usuario);
                $crud = new CrudCanal();
                $crud->editarCanal($novoCanal);
                header('Location: http://localhost/Projeto/index.php#canais');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudCanal();
                $canal = $crud->getCanal($id);
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/canais/excluir.php';
                include __DIR__.'/../../views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudCanal();
                $res = $crud->deletarCanal($id);

                if ($res == 1){
                    header('Location: http://localhost/Projeto/index.php#canais');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo '<a href=" http://localhost/Projeto/index.php#canais">Voltar</a>';
                }
            }
            break;

        default:
            echo "Invalid action";
    }