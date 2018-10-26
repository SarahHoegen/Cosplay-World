<?php
$baseURL = "http://localhost/Projeto/";
require_once __DIR__. '/../../models/CrudCosmaker.php';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){

    case 'inserir':
        if (!isset($_POST['gravar'])) {
            include __DIR__.'/../../views/templates/cabecalho.php';
            include __DIR__.'/../../views/cosmakers/inserir.php';
            include __DIR__.'/../../views/templates/rodape.php';
        }else{
            $origem = $_FILES['imagem']['tmp_name'];
            $nome_img = date('dmYhis').$_FILES['imagem']['name'];
            $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
            move_uploaded_file($origem, $destino);
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $funcao = $_POST['funcao'];
            $descricao = $_POST['descricao'];
            $imagem = $nome_img;
            $avaliacao = 0;
            $atividade = 0;
            $novoCosmaker = new Cosmaker($nome, $link, $funcao, $descricao, $imagem, $avaliacao, $atividade);
            $crud = new CrudCosmaker();
            $res = $crud->insertCosmaker($novoCosmaker);
            header('Location: ../../views/admin/admin.php');
        }
        break;

    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudCosmaker();
            $cosmaker = $crud->getCosmaker($id);
            include __DIR__.'/../../views/templates/cabecalho.php';
            include __DIR__.'/../../views/cosmakers/alterar.php';
            include __DIR__.'/../../views/templates/rodape.php';
        }else{
            $origem = $_FILES['imagem']['tmp_name'];
            $nome_img = date('dmYhis').$_FILES['imagem']['name'];
            $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
            move_uploaded_file($origem, $destino);
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $funcao = $_POST['funcao'];
            $descricao = $_POST['descricao'];
            $imagem = $nome_img;
            $avaliacao = 0;
            $atividade = 0;
            $novoCosmaker = new Cosmaker($nome, $link, $funcao, $descricao, $imagem, $avaliacao, $atividade, $id);
            $crud = new CrudCosmaker();
            $crud->editarCosmaker($novoCosmaker);
            header('Location: ../../views/admin/admin.php');
        }
        break;

    case 'excluir':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudCosmaker();
            $cosmaker = $crud->getCosmaker($id);
            include __DIR__.'/../../views/templates/cabecalho.php';
            include __DIR__.'/../../views/cosmakers/excluir.php';
            include __DIR__.'/../../views/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $crud = new CrudCosmaker();
            $res = $crud->deletarCosmaker($id);

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