<?php
session_start();
$baseURL = "http://localhost/Projeto/";
require_once __DIR__.'/../../models/CrudSite.php';

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
            include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
            include __DIR__.'/../../views/admin/views/sites/inserir.php';
            include __DIR__.'/../../views/admin/views/templates/rodape.php';
        }else{
            $erro = false;
            $origem = $_FILES['imagem']['tmp_name'];
            $nome_img = date('dmYhis').$_FILES['imagem']['name'];
            $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
            move_uploaded_file($origem, $destino);
            $id_usuario = $_SESSION['id'];
            $id = null;
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $descricao = $_POST['descricao'];
            $imagem = $nome_img;
            $atividade = 1;
            $crud = new CrudSite();
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
                $novoSite = new Site($nome, $link, $descricao, $imagem, $atividade, $id, $id_usuario);
                $res = $crud->insertSite($novoSite);
                if($res){
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php#sites');
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
                $crud = new CrudSite();
                $site = $crud->getSite($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/sites/alterar.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
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
                $atividade = true;
                $novoSite = new Site($nome, $link, $descricao, $imagem, $atividade, $id, $id_usuario);
                $crud = new CrudSite();
                $crud->editarSite($novoSite);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#sites');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudSite();
                $site = $crud->getSite($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/sites/excluir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudSite();
                $res = $crud->deletarSite($id);
                if ($res == 1){
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#sites');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo '<a href="Location: http://localhost/Projeto/app/views/admin/admin.php#sites">Voltar</a>';
                }
            }
        break;

        case 'desativar':
            $id = $_GET['id'];
            $atividade = $_GET['atividade'];
            if($atividade == true){
                $atividade = 0;
                $crud = new CrudSite();
                $res = $crud->desativarSite($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#sites');
            }else{
                $atividade = true;
                $crud = new CrudSite();
                $res = $crud->desativarSite($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#sites');
            }
            break;

        default:
            echo "Invalid action";
    }