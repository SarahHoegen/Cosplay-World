<?php
$baseURL = "http://localhost/Projeto/";
require_once __DIR__.'/../../models/CrudSite.php';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){

    case 'inserir':
        if (!isset($_POST['gravar'])) {
            include __DIR__.'/../../views/templates/cabecalho.php';
            include __DIR__.'/../../views/sites/inserir.php';
            include __DIR__.'/../../views/templates/rodape.php';
        }else{
            $origem = $_FILES['imagem']['tmp_name'];
            $nome_img = date('dmYhis').$_FILES['imagem']['name'];
            $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
            move_uploaded_file($origem, $destino);
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $descricao = $_POST['descricao'];
            $imagem = $nome_img;
            $avaliacao = 0;
            $atividade = 0;
            $novoSite = new Site($nome, $link, $descricao, $imagem, $avaliacao, $atividade);
            $crud = new CrudSite();
            $res = $crud->insertSite($novoSite);
            header('Location: ../../views/admin/admin.php');
        }
        break;

    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudSite();
            $site = $crud->getSite($id);
            include __DIR__.'/../../views/templates/cabecalho.php';
            include __DIR__.'/../../views/sites/alterar.php';
            include __DIR__.'/../../views/templates/rodape.php';
        }else{
            $origem = $_FILES['imagem']['tmp_name'];
            $nome_img = date('dmYhis').$_FILES['imagem']['name'];
            $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
            move_uploaded_file($origem, $destino);
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $descricao = $_POST['descricao'];
            $imagem = $nome_img;
            $avaliacao = 0;
            $atividade = 0;
            $novoSite = new Site($nome, $link, $descricao, $imagem, $avaliacao, $atividade, $id);
            $crud = new CrudSite();
            $crud->editarSite($novoSite);
            header('Location: ../../views/admin/admin.php');
        }
        break;

    case 'excluir':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudSite();
            $site = $crud->getSite($id);
            include __DIR__.'/../../views/templates/cabecalho.php';
            include __DIR__.'/../../views/sites/excluir.php';
            include __DIR__.'/../../views/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $crud = new CrudSite();
            $res = $crud->deletarSite($id);

            if ($res == 1){
                header('Location: ../../views/admin/admin.php');
            }else{
                echo 'Não foi possível efetuar a exclusão!';
                echo '<a href="../../views/admin/admin.php">Voltar</a>';
            }
        }
        break;

    default:
        echo "Invalid action";
}