<?php
session_start();

require_once __DIR__."/../../models/CrudCosmaker.php";
require_once __DIR__."/../../models/Cosmaker.php";
require_once __DIR__."/../../models/CrudCanal.php";
require_once __DIR__."/../../models/Canal.php";
require_once __DIR__."/../../models/CrudDica.php";
require_once __DIR__."/../../models/Dica.php";
require_once __DIR__."/../../models/CrudEvento.php";
require_once __DIR__."/../../models/Evento.php";
require_once __DIR__."/../../models/CrudSite.php";
require_once __DIR__."/../../models/Site.php";
require_once __DIR__."/../../models/CrudUsuario.php";
require_once __DIR__."/../../models/Usuario.php";
require_once __DIR__."/../../models/Login.php";
Login::verificaPermissao($_SESSION['tipo_user'], 1);

$crud = new CrudCosmaker();
$listaCosmakers = $crud->getCosmakers();
$crud = new CrudCanal();
$listaCanais = $crud->getCanais();
$crud = new CrudSite();
$listaSites = $crud->getSites();
$crud = new CrudEvento();
$listaEventos = $crud->getEventos();
$crud = new CrudDica();
$listaDicas = $crud->getDicas();
$crud = new CrudUsuario();
$listaUsuarios = $crud->getUsuarios();

$baseURL = "http://localhost/Projeto/";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- FAVICON -->
    <link rel="shortcut icon" href=" <?= $baseURL ?>assets/admin/dist/img/admin.ico" type="image/x-icon">
    <link rel="icon" href=" <?= $baseURL ?>assets/admin/dist/img/admin.ico" type="image/x-icon">

    <title>Área do Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href=" <?= $baseURL ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" <?= $baseURL ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href=" <?= $baseURL ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=" <?= $baseURL ?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- Skin -->
    <link rel="stylesheet" href="<?= $baseURL ?>assets/admin/dist/css/skins/skin-purple.css">

    <!-- JS que era online -->
    <script src="<?= $baseURL ?>assets/admin/dist/js/html5shiv.min.js"></script>
    <script src="<?= $baseURL ?>assets/admin/dist/js/respond.min.js"></script>

    <!-- Google Font -->
    <link rel="stylesheet" href="<?= $baseURL ?>assets/admin/dist/css/fonts.css">

    <link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/admin/updates/css/style.css">

    <!-- AJAX -->
    <script src="<?= $baseURL ?>assets/admin/updates/jquery/jquery.min.js"></script>

    <script src="<?= $baseURL ?>assets/admin/updates/jquery/jquery.js"></script>

</head>

<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img width="80px" src="<?= $baseURL ?>assets/imagens/<?= $_SESSION['imagem'];?>" class="user-image"/>
                            <span class="hidden-xs"><?php echo $_SESSION['apelido'];?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img width="80px" src="<?= $baseURL ?>assets/imagens/<?= $_SESSION['imagem'];?>" class="user-image img"/>
                                <p class="nome"><?php echo $_SESSION['usuario'];?></p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="../../controllers/admin/usuarios.php?acao=exibir" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../../controllers/usuario/login.php?acao=logout" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar color">
            <!-- MENU LATERAL -->
            <ul class="sidebar-menu" data-widget="tree">
                <!-- Logo -->
                <a href="<?= $baseURL ?>index.php"> <img width="175px" src="<?= $baseURL ?>assets/layout/img/logo.png"></a>
                
                <li id="dica"><a href="#dicas"><i class="fa fa-pencil-square-o"></i> <span>Dicas</span></a></li>
                <li  id="cosmaker"><a href="#cosmakers"><i class="fa fa-odnoklassniki"></i> <span>Cosmakers</span></a></li>
                <li id="evento"><a href="#eventos"><i class="fa fa-calendar"></i> <span>Eventos</span></a></li>
                <li id="canal"><a href="#canais"><i class="fa fa-youtube-play"></i> <span>Canais</span></a></li>
                <li id="site"><a href="#sites"><i class="fa fa-external-link"></i> <span>Sites</span></a></li>
                <li id="usuario"><a href="#usuarios"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
            </ul>
            <!-- /MENU LATERAL -->
    </aside>

    <!-- MENU PRINCIPAL -->
    <div class="content-wrapper">
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!-- DICAS -->
            <div id="conteudodicas">
                <div class="box box-info" id="dicas">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dicas</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Atividade</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($listaDicas as $dica): ?>
                                    <td><?= $dica->nome; ?></td>
                                    <td><?= $dica->descricao; ?></td>
                                    <td><?= date_format(date_create($dica->data),"d/m/Y"); ?></td>
                                    <td><span class="label label-success color"><?php if ($dica->atividade == 1): ?><a href="../../controllers/admin/dicas.php?acao=desativar&id=<?= $dica->id;?>&atividade=<?=$dica->atividade;?>">Desativar</a> <?php endif; ?></span>
                                        <span class="label label-danger color"><?php if ($dica->atividade == 0): ?><a href="../../controllers/admin/dicas.php?acao=desativar&id=<?= $dica->id;?>&atividade=<?=$dica->atividade;?>"> Ativar</a> <?php endif; ?></span>
                                    </td>
                                    <td><a href="../../controllers/admin/dicas.php?acao=alterar&id=<?= $dica->id; ?>">Editar</a> |
                                        <a href="../../controllers/admin/dicas.php?acao=excluir&id=<?= $dica->id; ?>">Excluir</a>
                                    </td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                                </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="../../controllers/admin/dicas.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left cor">Acrescentar dica</a>
                    </div>
                </div>

            </div>
            <!-- /DICAS -->

            <!-- COSMAKERS -->
            <div id="conteudocosmakers">
                <div class="box box-info" id="cosmakers">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cosmakers</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Função</th>
                                    <th>Descrição</th>
                                    <th>Link</th>
                                    <th>Link Secundário</th>
                                    <th>Atividade</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($listaCosmakers as $cosmaker): ?>
                                    <td><?= $cosmaker->nome; ?></td>
                                    <td><img width="80px" src="<?= $baseURL ?>assets/imagens/<?= $cosmaker->imagem; ?>" /></td>
                                    <td><?= $cosmaker->funcao; ?></td>
                                    <td><?= $cosmaker->descricao; ?></td>
                                    <td><?= $cosmaker->link; ?></td>
                                    <td><?= $cosmaker->link2; ?></td>
                                    <td><span class="label label-success color"><?php if ($cosmaker->atividade == 1): ?><a href="../../controllers/admin/cosmakers.php?acao=desativar&id=<?= $cosmaker->id;?>&atividade=<?=$cosmaker->atividade;?>">Desativar</a> <?php endif; ?></span>
                                        <span class="label label-danger color"><?php if ($cosmaker->atividade == 0): ?><a href="../../controllers/admin/cosmakers.php?acao=desativar&id=<?= $cosmaker->id;?>&atividade=<?=$cosmaker->atividade;?>"> Ativar</a> <?php endif; ?></span>
                                    </td>
                                    <td><a href="../../controllers/admin/cosmakers.php?acao=alterar&id=<?= $cosmaker->id; ?>">Editar</a> |
                                        <a href="../../controllers/admin/cosmakers.php?acao=excluir&id=<?= $cosmaker->id; ?>">Excluir</a></td>                   <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="../../controllers/admin/cosmakers.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left cor">Acrescentar cosmaker</a>
                    </div>
                </div>

            </div>
            <!-- /COSMAKERS -->

            <!-- EVENTOS -->
            <div id="conteudoeventos">
                <div class="box box-info" id="eventos">
                    <div class="box-header with-border">
                        <h3 class="box-title">Eventos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Descrição</th>
                                    <th>Data 1</th>
                                    <th>Hora Início</th>
                                    <th>Hora Fim</th>
                                    <th>Data 2</th>
                                    <th>Hora Início</th>
                                    <th>Hora Fim</th>
                                    <th>Data 3</th>
                                    <th>Hora Início</th>
                                    <th>Hora Fim</th>
                                    <th>Local</th>
                                    <th>Link</th>
                                    <th>Atividade</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($listaEventos as $evento): ?>
                                    <td><?= $evento->nome; ?></td>
                                    <td><img width="80px" src="<?= $baseURL ?>assets/imagens/<?= $evento->imagem; ?>" /></td>
                                    <td><?= $evento->descricao; ?></td>
                                    <td><?= date_format(date_create($evento->data),"d/m/Y"); ?></td>
                                    <td><?= date_format(date_create($evento->hora),"H:i"); ?></td>
                                    <td><?= date_format(date_create($evento->hora_fim),"H:i"); ?></td>
                                    <?php if($evento->data2 == null):?>
                                    <td>Não Preenchido</td>
                                    <td>Não Preenchido</td>
                                    <td>Não Preenchido</td>
                                    <?php endif;?>
                                    <?php if(isset($evento->data2)):?>
                                    <td><?= date_format(date_create($evento->data2),"d/m/Y"); ?></td>
                                    <td><?= date_format(date_create($evento->hora2),"H:i"); ?></td>
                                    <td><?= date_format(date_create($evento->hora_fim2),"H:i"); ?></td>
                                    <?php endif;?>
                                    <?php if($evento->data3 == null):?>
                                    <td>Não Preenchido</td>
                                    <td>Não Preenchido</td>
                                    <td>Não Preenchido</td>
                                    <?php endif;?>
                                    <?php if(isset($evento->data3)):?>
                                    <td><?= date_format(date_create($evento->data3),"d/m/Y"); ?></td>
                                    <td><?= date_format(date_create($evento->hora3),"H:i"); ?></td>
                                    <td><?= date_format(date_create($evento->hora_fim3),"H:i"); ?></td>
                                    <?php endif;?>
                                    <td><?= $evento->local; ?></td>
                                    <td><?= $evento->link; ?></td>
                                    <td><span class="label label-success color"><?php if ($evento->atividade == 1): ?><a href="../../controllers/admin/eventos.php?acao=desativar&id=<?= $evento->id;?>&atividade=<?=$evento->atividade;?>">Desativar</a> <?php endif; ?></span>
                                        <span class="label label-danger color"><?php if ($evento->atividade == 0): ?><a href="../../controllers/admin/eventos.php?acao=desativar&id=<?= $evento->id;?>&atividade=<?=$evento->atividade;?>"> Ativar</a> <?php endif; ?></span>
                                    </td>
                                    <td><a href="../../controllers/admin/eventos.php?acao=alterar&id=<?= $evento->id; ?>">Editar</a> |
                                        <a href="../../controllers/admin/eventos.php?acao=excluir&id=<?= $evento->id; ?>">Excluir</a></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="../../controllers/admin/eventos.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left cor">Acrescentar evento</a>
                    </div>
                </div>

            </div>
            <!-- /EVENTOS -->

            <!-- CANAIS -->
            <div id="conteudocanais">
                <div class="box box-info" id="canais">
                    <div class="box-header with-border">
                        <h3 class="box-title">Canais</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Descrição</th>
                                    <th>Link</th>
                                    <th>Atividade</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($listaCanais as $canal): ?>
                                    <td><?= $canal->nome; ?></td>
                                    <td><img width="80px" src="<?= $baseURL ?>assets/imagens/<?= $canal->imagem; ?>" /></td>
                                    <td><?= $canal->descricao; ?></td>
                                    <td><?= $canal->link; ?></td>
                                    <td><span class="label label-success color"><?php if ($canal->atividade == 1): ?><a href="../../controllers/admin/canais.php?acao=desativar&id=<?= $canal->id;?>&atividade=<?=$canal->atividade;?>">Desativar</a> <?php endif; ?></span>
                                        <span class="label label-danger color"><?php if ($canal->atividade == 0): ?><a href="../../controllers/admin/canais.php?acao=desativar&id=<?= $canal->id;?>&atividade=<?=$canal->atividade;?>"> Ativar</a> <?php endif; ?></span>
                                    </td>
                                    <td><a href="../../controllers/admin/canais.php?acao=alterar&id=<?= $canal->id; ?>">Editar</a> |
                                        <a href="../../controllers/admin/canais.php?acao=excluir&id=<?= $canal->id; ?>">Excluir</a></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="../../controllers/admin/canais.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left cor">Acrescentar canal</a>
                    </div>
                </div>

            </div>
            <!-- /CANAIS -->

            <!-- SITES -->
            <div id="conteudosites">
                <div class="box box-info" id="sites">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sites</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Descrição</th>
                                    <th>Link</th>
                                    <th>Atividade</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($listaSites as $site): ?>
                                    <td><?= $site->nome; ?></td>
                                    <td><img width="80px" src="<?= $baseURL ?>assets/imagens/<?= $site->imagem; ?>" /></td>
                                    <td><?= $site->descricao; ?></td>
                                    <td><?= $site->link; ?></td>
                                    <td><span class="label label-success color"><?php if ($site->atividade == 1): ?><a href="../../controllers/admin/sites.php?acao=desativar&id=<?= $site->id;?>&atividade=<?=$site->atividade;?>">Desativar</a> <?php endif; ?></span>
                                        <span class="label label-danger color"><?php if ($site->atividade == 0): ?><a href="../../controllers/admin/sites.php?acao=desativar&id=<?= $site->id;?>&atividade=<?=$site->atividade;?>"> Ativar</a> <?php endif; ?></span>
                                    </td>
                                    <td><a href="../../controllers/admin/sites.php?acao=alterar&id=<?= $site->id; ?>">Editar</a> |
                                        <a href="../../controllers/admin/sites.php?acao=excluir&id=<?= $site->id; ?>">Excluir</a></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="../../controllers/admin/sites.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left cor">Acrescentar site</a>
                    </div>
                </div>

            </div>
            <!-- /SITES -->

            <!-- USUÁRIOS -->
            <div id="conteudousuarios">
                <div class="box box-info" id="usuarios">
                    <div class="box-header with-border">
                        <h3 class="box-title">Usuários</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Apelido</th>
                                    <th>Imagem</th>
                                    <th>Email</th>
                                    <th>Data de Nascimento</th>
                                    <th>Atividade</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($listaUsuarios as $usuario): ?>
                                    <td><?= $usuario->nome; ?></td>
                                    <td><?= $usuario->apelido; ?></td>
                                    <td><img width="80px" src="<?= $baseURL ?>assets/imagens/<?= $usuario->imagem; ?>" /></td>
                                    <td><?= $usuario->email; ?></td>
                                    <td><?= date_format(date_create($usuario->data_nasc),"d/m/Y"); ?></td>
                                    <td><span class="label label-success color"><?php if ($usuario->atividade == 1): ?><a href="../../controllers/admin/usuarios.php?acao=desativar&id_usuario=<?= $usuario->id_usuario;?>&atividade=<?=$usuario->atividade;?>">Desativar</a> <?php endif; ?></span>
                                        <span class="label label-danger color"><?php if ($usuario->atividade == 0): ?><a href="../../controllers/admin/usuarios.php?acao=desativar&id_usuario=<?= $usuario->id_usuario;?>&atividade=<?=$usuario->atividade;?>"> Ativar</a> <?php endif; ?></span>
                                    </td>
                                    <td><a href="../../controllers/admin/usuarios.php?acao=alterar&id_usuario=<?= $usuario->id_usuario; ?>">Editar</a> |
                                        <a href="../../controllers/admin/usuarios.php?acao=excluir&id_usuario=<?= $usuario->id_usuario; ?>">Excluir</a></td>                            <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="../../controllers/admin/usuarios.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left cor">Acrescentar usuario</a>
                    </div>
                </div>
            </div>
            <!-- /USUÁRIOS -->

        </section>
    </div>
    <!-- /MENU PRINCIPAL -->

    <!-- RODAPÉ -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 </strong> | Design by Vitória E. Madruga, Sarah Hoegen e Giovanna C. Cordeiro
    </footer>
    <!-- /RODAPÉ -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?= $baseURL ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= $baseURL ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $baseURL ?>assets/admin/dist/js/adminlte.min.js"></script>

</body>
</html>