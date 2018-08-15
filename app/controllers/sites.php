<?php

require_once __DIR__.'/../models/CrudSite.php';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){

    case 'inserir':
        if (!isset($_POST['gravar'])) {
            include '../views/templates/cabecalho.php';
            include '../views/sites/inserir.php';
            include '../views/templates/rodape.php';
        }else{
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $descricao = $_POST['descricao'];
            $imagem = $_POST['imagem'];
            $avaliacao = null;
            $atividade = true;
            $novoSite = new Site($nome, $link, $descricao, $imagem, $avaliacao, $atividade);
            $crud = new CrudSite();
            $res = $crud->insertSite($novoSite);
            header('Location: ../views/admin/admin.php');
        }
        break;

    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudSite();
            $site = $crud->getSite($id);
            include '../views/templates/cabecalho.php';
            include '../views/sites/alterar.php';
            include '../views/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $descricao = $_POST['descricao'];
            $imagem = $_POST['imagem'];
            $avaliacao = null;
            $atividade = true;
            $novoSite = new Site($nome, $link, $descricao, $imagem, $avaliacao, $atividade, $id);
            $crud = new CrudSite();
            $crud->editarSite($novoSite);

            header('Location: ../views/admin/admin.php');
        }
        break;

    case 'excluir':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudSite();
            $site = $crud->getSite($id);
            include '../views/templates/cabecalho.php';
            include '../views/sites/excluir.php';
            include '../views/templates/rodape.php';
        }else{
            //gravar dados digitados no BD
            $id = $_POST['id'];

            $crud = new CrudSite();
            $res = $crud->deletarSite($id);

            if ($res == 1){
                header('Location: ../views/admin/admin.php');
            }else{
                echo 'Não foi possível efetuar a exclusão!';
                echo '<a href="../views/admin/admin.php">Voltar</a>';

            }

        }
        break;

    default:
        echo "Invalid action";
}