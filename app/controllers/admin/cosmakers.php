<?php
session_start();
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
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/cosmakers/inserir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
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
                $atividade = 1;
                $novoCosmaker = new Cosmaker($nome, $link, $funcao, $descricao, $imagem, $avaliacao, $atividade);
                $crud = new CrudCosmaker();
                $res = $crud->insertCosmaker($novoCosmaker);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#cosmakers');
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudCosmaker();
                $cosmaker = $crud->getCosmaker($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/cosmakers/alterar.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
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
                $atividade = true;
                $novoCosmaker = new Cosmaker($nome, $link, $funcao, $descricao, $imagem, $avaliacao, $atividade, $id);
                $crud = new CrudCosmaker();
                $crud->editarCosmaker($novoCosmaker);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#cosmakers');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudCosmaker();
                $cosmaker = $crud->getCosmaker($id);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/cosmakers/excluir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudCosmaker();
                $res = $crud->deletarCosmaker($id);
                if ($res == 1){
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo($id);
                    echo '<a href="Location: http://localhost/Projeto/app/views/admin/admin.php">Voltar</a>';
                }
            }
            break;

        case 'desativar':
            $id = $_GET['id'];
            $atividade = $_GET['atividade'];
            if($atividade == true){
                $atividade = 0;
                $crud = new CrudCosmaker();
                $res = $crud->desativarCosmaker($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }else{
                $atividade = true;
                $crud = new CrudCosmaker();
                $res = $crud->desativarCosmaker($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }
            break;

        default:
            echo "Invalid action";
}