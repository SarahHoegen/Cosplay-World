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
            if (!isset($_POST['gravar'])) {
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/canais/inserir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
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
                $atividade = true;
                $novoCanal = new Canal($nome, $link, $descricao, $imagem, $avaliacao, $atividade);
                $crud = new CrudCanal();
                $res = $crud->insertCanal($novoCanal);
                header("Location: http://localhost/Projeto/app/views/admin/admin.php#canais");
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudCanal();
                $canal = $crud->getCanal($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/canais/alterar.php';
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
                $imagem = $nome_img;
                $avaliacao = 0;
                $atividade = true;
                $novoCanal = new Canal($nome, $link, $descricao, $imagem, $avaliacao, $atividade, $id);
                $crud = new CrudCanal();
                $crud->editarCanal($novoCanal);
                header("Location: http://localhost/Projeto/app/views/admin/admin.php#canais");
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudCanal();
                $canal = $crud->getCanal($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/canais/excluir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudCanal();
                $res = $crud->deletarCanal($id);
                if ($res == 1){
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php#canais');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo '<a href="Location: http://localhost/Projeto/app/views/admin/admin.php#canais">Voltar</a>';
                }
            }
            break;

        case 'desativar':
            $id = $_GET['id'];
            $atividade = $_GET['atividade'];
            if($atividade == true){
                $atividade = 0;
                $crud = new CrudCanal();
                $res = $crud->desativarCanal($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }else{
                $atividade = true;
                $crud = new CrudCanal();
                $res = $crud->desativarCanal($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }
            break;

        default:
            echo "Invalid action";
    }