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
        if($_SESSION['esta_logado'] !=true){
            header('Location:  http://localhost/Projeto/app/controllers/usuario/login.php');
        }else{
        if (!isset($_POST['gravar'])) {
            include __DIR__.'/../../views/templates/cabecalho.php';
            include __DIR__.'/../../views/cosmakers/inserir.php';
            include __DIR__.'/../../views/templates/rodape.php';
        }else{
            $erro = false;
            $origem = $_FILES['imagem']['tmp_name'];
            $nome_img = date('dmYhis').$_FILES['imagem']['name'];
            $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
            move_uploaded_file($origem, $destino);
            $id_usuario = $_SESSION['id'];
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $link2 = $_POST['link2'];
            $funcao = $_POST['funcao'];
            $descricao = $_POST['descricao'];
            $imagem = $nome_img;
            $avaliacao = 0;
            $atividade = 0;
            $id = null;
            $crud = new CrudCosmaker();
            $ja_existe = $crud->linkExists($link);
            if ($ja_existe) {
                $erro = true;
                $mensagem = "Este link já existe!";
            }
            $ja_existe = $crud->nomeExists($nome);
            if ($ja_existe) {
                $erro = true;
                $mensagem = "Este nome já existe!";
            }
            if ($erro == false) {
                $novoCosmaker = new Cosmaker($nome, $link, $link2, $funcao, $descricao, $imagem, $atividade,$id, $id_usuario);
                $res = $crud->insertCosmaker($novoCosmaker);
                if($res){
                    header('Location: http://localhost/Projeto/index.php#dicas');
                }else{
                    echo "deu erro!";
                }
            } else {
                header("location: ?acao=inserir&msg=$mensagem");
            }
            }
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
            if($_FILES['imagem']['name'] == null){
                $imagem = null;
            }else {
                $origem = $_FILES['imagem']['tmp_name'];
                $nome_img = date('dmYhis') . $_FILES['imagem']['name'];
                $destino = __DIR__ . '/../../../assets/imagens/' . $nome_img;
                move_uploaded_file($origem, $destino);
                $imagem = $nome_img;
            }
            $origem = $_FILES['imagem']['tmp_name'];
            $nome_img = date('dmYhis').$_FILES['imagem']['name'];
            $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
            move_uploaded_file($origem, $destino);
            $id = $_POST['id'];
            $id_usuario = $_SESSION['id'];
            $nome = $_POST['nome'];
            $link = $_POST['link'];
            $link2 = $_POST['link2'];
            $funcao = $_POST['funcao'];
            $descricao = $_POST['descricao'];
            $atividade = 0;
            $novoCosmaker = new Cosmaker($nome, $link, $link2, $funcao, $descricao, $imagem, $atividade, $id, $id_usuario);
            $crud = new CrudCosmaker();
            $crud->editarCosmaker($novoCosmaker);
            header('Location: http://localhost/Projeto/index.php#cosmakers');
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
                header('Location: http://localhost/Projeto/index.php#cosmakers');
            }else{
                echo 'Não foi possível efetuar a exclusão!';
                echo '<a href=" http://localhost/Projeto/index.php#cosmakers">Voltar</a>';
            }
        }
        break;


    default:
        echo "Invalid action";
}