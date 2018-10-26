<?php
session_start();
$baseURL = "http://localhost/Projeto/";
    require_once __DIR__. '/../../models/CrudDica.php';

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch ($acao){

        case 'inserir':
            if (!isset($_POST['gravar'])) {
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/dicas/inserir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $data = date("%d/%m/%Y");
                $atividade = true;
                $novaDica = new Dica($nome, $descricao, $data, $atividade);
                $crud = new CrudDica();
                $res = $crud->insertDica($novaDica);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#dicas');
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudDica();
                $dica = $crud->getDica($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/dicas/alterar.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $data = date("d/m/y");;
                $atividade = true;
                $novaDica = new Dica($nome, $descricao, $data, $atividade, $id);
                $crud = new CrudDica();
                $crud->editarDica($novaDica);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#dicas');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudDica();
                $dica = $crud->getDica($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/dicas/excluir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudDica();
                $res = $crud->deletarDica($id);
                if ($res == 1){
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo '<a href="Location: http://localhost/Projeto/app/views/admin/admin.php">Voltar</a>';
                }
            }
            break;

        case 'desativar':
            $id = $_GET['id'];
            $atividade = $_GET['atividade'];
            if($atividade == true){
                $atividade = 0;
                $crud = new CrudDica();
                $res = $crud->desativarDica($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }else{
                $atividade = true;
                $crud = new CrudDica();
                $res = $crud->desativarDica($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }
            break;

        default:
            echo "Invalid action";

    }