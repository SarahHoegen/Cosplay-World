<?php

    require_once __DIR__. '/../models/CrudCanal.php';

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch ($acao){

        case 'inserir':
            if (!isset($_POST['gravar'])) {
                include '../views/templates/cabecalho.php';
                include '../views/canais/inserir.php';
                include '../views/templates/rodape.php';
            }else{
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $imagem = $_POST['imagem'];
                $avaliacao = null;
                $atividade = true;
                $novoCanal = new Canal($nome, $link, $descricao, $imagem, $avaliacao, $atividade);
                $crud = new CrudCanal();
                $res = $crud->insertCanal($novoCanal);
                header('Location: ../views/admin/admin.php');
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudCanal();
                $canal = $crud->getCanal($id);
                include '../views/templates/cabecalho.php';
                include '../views/canais/alterar.php';
                include '../views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $imagem = $_POST['imagem'];
                $avaliacao = null;
                $atividade = true;
                $novoCanal = new Canal($nome, $link, $descricao, $imagem, $avaliacao, $atividade, $id);
                $crud = new CrudCanal();
                $crud->editarCanal($novoCanal);

                header('Location: ../views/admin/admin.php');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudCanal();
                $canal = $crud->getCanal($id);
                include '../views/templates/cabecalho.php';
                include '../views/canais/excluir.php';
                include '../views/templates/rodape.php';
            }else{
                $id = $_POST['id'];

                $crud = new CrudCanal();
                $res = $crud->deletarCanal($id);

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