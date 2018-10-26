<?php
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
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/eventos/inserir.php';
                include __DIR__.'/../../views/templates/rodape.php';
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
                $atividade = 0;
                $avaliacao = 0;
                $novoEvento= new Evento($nome, $link, $descricao, $data, $hora, $local, $imagem, $avaliacao, $atividade);
                $crud = new CrudEvento();
                $res = $crud->insertEvento($novoEvento);
                header('Location: ../../views/admin/admin.php');
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudEvento();
                $evento = $crud->getEvento($id);
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/eventos/alterar.php';
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
                $data = $_POST['data'];
                $hora = $_POST['hora'];
                $local = $_POST['local'];
                $imagem = $nome_img;
                $atividade = 0;
                $avaliacao = 0;
                $novoEvento = new Evento($nome, $link, $descricao, $data, $hora, $local, $imagem, $avaliacao, $atividade, $id);
                $crud = new CrudEvento();
                $res = $crud->editarEvento($novoEvento);
                header('Location: ../../views/admin/admin.php');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudEvento();
                $evento = $crud->getEvento($id);
                include __DIR__.'/../../views/templates/cabecalho.php';
                include __DIR__.'/../../views/eventos/excluir.php';
                include __DIR__.'/../../views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudEvento();
                $res = $crud->deletarEvento($id);

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