<?php

    require_once __DIR__.'/../models/Login.php';

    function logar(){
        include "../views/templates/cabecalho.php";
        include "../views/usuarios/login.php";
        include "../views/templates/rodape.php";
    }

    function executaLogin($email, $senha){

        $login = new Login();
        $resultado = $login->logar($email, $senha);

        if ($resultado != false){
            session_start();
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['usuario'] = $resultado['nome'];
            $_SESSION['apelido'] = $resultado['apelido'];
            $_SESSION['tipo_user'] = $resultado['tipo_user'] ;
            $_SESSION['esta_logado'] = true;

            if ($resultado['tipo_user'] == 0){
                header('Location: http://localhost/Projeto/index.php');
            }else{
                header('Location: http://localhost/Projeto/app/views/admin/admin.php');
            }

        }else {
            logar();
        }
    }



    function sair(){
        $login = new Login();
        $login->logout();
    }

    //rotas
    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }else {
        $acao = 'logar';
    }

    if ($acao == 'logar'){
            logar();
    } elseif ($_GET['acao'] == 'executar_login'){
        $res = executaLogin($_POST['email'], $_POST['senha']);
    }

    if ($acao == "logout"){
        sair();
    }
