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
            include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
            include __DIR__.'/../../views/admin/views/cosmakers/inserir.php';
            include __DIR__.'/../../views/admin/views/templates/rodape.php';
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
            $atividade = 1;
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
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php#cosmakers');
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
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/cosmakers/alterar.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
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
                $atividade = 1;
                $novoCosmaker = new Cosmaker($nome, $link, $link2, $funcao, $descricao, $imagem, $atividade, $id, $id_usuario);
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
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php#cosmakers');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo($id);
                    echo '<a href="Location: http://localhost/Projeto/app/views/admin/admin.php#cosmakers">Voltar</a>';
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
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#cosmakers');
            }else{
                $atividade = true;
                $crud = new CrudCosmaker();
                $res = $crud->desativarCosmaker($id, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#cosmakers');
            }
            break;

        default:
            echo "Invalid action";
}