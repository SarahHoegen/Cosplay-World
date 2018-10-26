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
            if (!isset($_POST['gravar'])) {
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/eventos/inserir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $origem = $_FILES['imagem']['tmp_name'];
                $nome_img = date('dmYhis').$_FILES['imagem']['name'];
                $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
                move_uploaded_file($origem, $destino);
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $data = $_POST['data'];
                $hora = $_POST['hora'];
                $local = $_POST['local'];
                $imagem = $nome_img;
                $atividade = true;
                $avaliacao = 0;
                $novoEvento= new Evento($nome, $link, $descricao, $data, $hora, $local, $imagem, $avaliacao, $atividade);
                $crud = new CrudEvento();
                $res = $crud->insertEvento($novoEvento);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#eventos');
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudEvento();
                $evento = $crud->getEvento($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/eventos/alterar.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $origem = $_FILES['imagem']['tmp_name'];
                $nome_img = date('dmYhis').$_FILES['imagem']['name'];
                $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
                move_uploaded_file($origem, $destino);
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $link = $_POST['link'];
                $descricao = $_POST['descricao'];
                $data = $_POST['data'];
                $hora = $_POST['hora'];
                $local = $_POST['local'];
                $imagem = $nome_img;
                $atividade = true;
                $avaliacao = 0;
                $novoEvento = new Evento($nome, $link, $descricao, $data, $hora, $local, $imagem, $avaliacao, $atividade, $id);
                $crud = new CrudEvento();
                $res = $crud->editarEvento($novoEvento);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#eventos');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudEvento();
                $evento = $crud->getEvento($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/eventos/excluir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudEvento();
                $res = $crud->deletarEvento($id);
                if ($res == 1){
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php#eventos');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo '<a href="Location: http://localhost/Projeto/app/views/admin/admin.php#eventos">Voltar</a>';
                }
            }
            break;

        case 'desativar':
            $id = $_GET['id'];
            $atividade = $_GET['atividade'];
            if($atividade == true){
                $atividade = 0;
                $crud = new CrudEvento();
                $res = $crud->desativarEvento($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }else{
                $atividade = true;
                $crud = new CrudEvento();
                $res = $crud->desativarEvento($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }
            break;

        default:
            echo "Invalid action";
    }