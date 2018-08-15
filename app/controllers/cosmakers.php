<?php

require_once __DIR__. '/../models/CrudCosmaker.php';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){

    case 'inserir':
        if (!isset($_POST['gravar'])) {
            include '../views/templates/cabecalho.php';
            include '../views/cosmakers/inserir.php';
            include '../views/templates/rodape.php';
        }else{
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $funcao = $_POST['funcao'];
            $descricao = $_POST['descricao'];
            $imagem = $_POST['imagem'];
            $avaliacao = null;
            $atividade = true;
            $novoCosmaker = new Cosmaker($nome, $link, $funcao, $descricao, $imagem, $avaliacao, $atividade);
            $crud = new CrudCosmaker();
            $res = $crud->insertCosmaker($novoCosmaker);
            header('Location: ../views/admin/admin.php');
        }
        break;

    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudCosmaker();
            $cosmaker = $crud->getCosmaker($id);
            include '../views/templates/cabecalho.php';
            include '../views/cosmakers/alterar.php';
            include '../views/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $funcao = $_POST['funcao'];
            $descricao = $_POST['descricao'];
            $imagem = $_POST['imagem'];
            $avaliacao = null;
            $atividade = true;
            $novoCosmaker = new Cosmaker($nome, $link, $funcao, $descricao, $imagem, $avaliacao, $atividade, $id);
            $crud = new CrudCosmaker();
            $crud->editarCosmaker($novoCosmaker);

            header('Location: ../views/admin/admin.php');
        }
        break;

    case 'excluir':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudCosmaker();
            $cosmaker = $crud->getCosmaker($id);
            include '../views/templates/cabecalho.php';
            include '../views/cosmakers/excluir.php';
            include '../views/templates/rodape.php';
        }else{
            //gravar dados digitados no BD
            $id = $_POST['id'];

            $crud = new CrudCosmaker();
            $res = $crud->deletarCosmaker($id);

            if ($res == 1){
                header('Location: ../views/admin/admin.php');
            }else{
                echo 'Não foi possível efetuar a exclusão!';
                echo '<a href="../views/admin/admin.php">Voltar</a>';

            }

        }
        break;


    default: //CASO NÃO SEJA NENHUM DOS ANTERIORES
        echo "Invalid action";
}