    <?php
    session_start();
        require_once __DIR__ . "/../models/CrudUsuario.php";

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch ($acao){

        case 'exibir';
        //print_r($_SESSION['id']);
    $id = $_SESSION['id'];
    $crud = new CrudUsuario();
    $usuario = $crud->getUsuario(1);
    include '../views/templates/cabecalho.php';
    include '../views/usuarios/exibir.php';
    include '../views/templates/rodape.php';
    break;

        case 'inserir':
            if (!isset($_POST['gravar'])) {
                include '../views/templates/cabecalho.php';
               include '../views/usuarios/cadastro.php';
                include '../views/templates/rodape.php';
            }else{
                $nome = $_POST['nome'];
                $apelido = $_POST['apelido'];
                $data_nasc = $_POST['data_nasc'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $imagem = $_POST['imagem'];
                $tipo_user = null;
                $atividade = null;
                $novoUsuario = new Usuario($nome, $apelido, $data_nasc, $email, $senha, $imagem, $tipo_user, $atividade);
                $crud = new CrudUsuario();
                $res = $crud->insertUsuario($novoUsuario);
                if($res){
                    header('Location: login.php');
                }else{
                    echo "deu erro!";
                }
            }
            break;

        case 'alterar':
            if (!isset($_POST['gravar'])) {
                $id = $_GET['id'];
                $crud = new CrudUsuario();
                $usuario = $crud->getUsuario($id);
                include '../views/templates/cabecalho.php';
                include '../views/usuarios/alterar.php';
                include '../views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $imagem = $_POST['imagem'];
                $senha = $_POST['senha'];
                $apelido = $_POST['apelido'];
                $data_nasc = $_POST['data_nasc'];
                $tipo_user = null;
                $atividade = null;
                $novoUsuario = new Usuario($nome, $apelido, $data_nasc, $email, $senha, $imagem, $tipo_user, $atividade, $id);
                $crud = new CrudUsuario();
                $crud->updateUsuario($novoUsuario);
                header('Location: ../views/admin/admin.php');
            }
            break;

        case 'excluir':
            if (!isset($_POST['gravar'])) {
                $id_usuario = $_GET['id'];
                $crud = new CrudUsuario();
                $usuario = $crud->getUsuario($id_usuario);
                include '../views/templates/cabecalho.php';
                include '../views/usuarios/excluir.php';
                include '../views/templates/rodape.php';
            }else{
                $id = $_POST['id'];
                $crud = new CrudUsuario();
                $res = $crud->deleteUsuario($id);
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