<?php
session_start();
$baseURL = "http://localhost/Projeto/";
require_once __DIR__ . "/../../models/CrudUsuario.php";

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch ($acao){

        case 'exibir';
            $id_usuario = $_SESSION['id'];
            $crud = new CrudUsuario();
            $usuario = $crud->getUsuario($id_usuario);
            include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
            include __DIR__.'/../../views/admin/views/usuarios/exibir.php';
            include __DIR__.'/../../views/admin/views/templates/rodape.php';
        break;

        case 'inserir':
            if (!isset($_POST['gravar'])) {
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/usuarios/inserir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $erro = false;
                $origem = $_FILES['imagem']['tmp_name'];
                $nome_img = date('dmYhis').$_FILES['imagem']['name'];
                $destino = __DIR__.'/../../../assets/imagens/'.$nome_img;
                move_uploaded_file($origem, $destino);
                $nome = $_POST['nome'];
                $apelido = $_POST['apelido'];
                $data_nasc = $_POST['data_nasc'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $senha2 = $_POST['senha2'];
                $imagem = $nome_img;
                $tipo_user = 0;
                $atividade = 1;
                $crud = new CrudUsuario();
                if($senha==$senha2){
                    $erro=false;
                }else{
                    $erro=true;
                    $mensagem = "As senhas não estão iguais.";
                }
                $ja_existe = $crud->emailExists($email);
                if ($ja_existe) {
                    $erro = true;
                    $mensagem = "Este email já existe!";
                }
                $ja_existe = $crud->apelidoExists($apelido);
                if ($ja_existe) {
                    $erro = true;
                    $mensagem = "Este apelido já existe!";
                }
                if ($erro == false) {
                    $novoUsuario = new Usuario($nome, $apelido, $data_nasc, $email, $senha, $imagem, $tipo_user, $atividade);
                    $res = $crud->insertUsuario($novoUsuario);
                    if($res){
                        header('Location: http://localhost/Projeto/app/views/admin/admin.php#usuarios');
                    }else{
                        echo "deu erro!";
                    }
                } else {
                    header("location: ?acao=inserir&msg=$mensagem");
                }
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id_usuario = $_GET['id_usuario'];
                $crud = new CrudUsuario();
                $usuario = $crud->getUsuario($id_usuario);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/usuarios/alterar.php';
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
                $id_usuario = $_POST['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $apelido = $_POST['apelido'];
                $data_nasc = $_POST['data_nasc'];
                $tipo_user = 0;
                $atividade = true;
                $novoUsuario = new Usuario($nome, $apelido, $data_nasc, $email, $senha, $imagem, $tipo_user, $atividade, $id_usuario);
                $crud = new CrudUsuario();
                $crud->updateUsuario($novoUsuario);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#usuarios');
            }
        break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id_usuario = $_GET['id_usuario'];
                $crud = new CrudUsuario();
                $usuario = $crud->getUsuario($id_usuario);
                include __DIR__.'/../../views/admin/views/templates/cabecalho.php';
                include __DIR__.'/../../views/admin/views/usuarios/excluir.php';
                include __DIR__.'/../../views/admin/views/templates/rodape.php';
            }else{
                $id_usuario = $_POST['id'];
                $crud = new CrudUsuario();
                $res = $crud->deleteUsuario($id_usuario);
                if ($res == 1){
                    header('Location: http://localhost/Projeto/app/views/admin/admin.php#usuarios');
                }else{
                    echo 'Não foi possível efetuar a exclusão!';
                    echo '<a href="Location: http://localhost/Projeto/app/views/admin/admin.php#usuarios">Voltar</a>';
                }
            }
        break;

        case 'desativar':
            $id_usuario = $_GET['id_usuario'];
            $atividade = $_GET['atividade'];
            if($atividade == true){
                $atividade = 0;
                $crud = new CrudUsuario();
                $res = $crud->desativarUsuario($id_usuario, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#usuarios');
            }else{
                $atividade = true;
                $crud = new CrudUsuario();
                $res = $crud->desativarUsuario($id_usuario, $atividade);
                header('Location: http://localhost/Projeto/app/views/admin/admin.php#usuarios');
            }
            break;

        default:
            echo "Invalid action";
    }