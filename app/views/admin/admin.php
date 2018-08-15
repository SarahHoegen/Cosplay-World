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
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Área do Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-purple.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
      <a href="../../../index.php"> <img src="../../../assets/img/admin-logo.png"></a>--> <!-- A FAZER

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
                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo $_SESSION['apelido'];?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        <p><?php echo $_SESSION['usuario'];?></p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="../../controllers/usuarios.php?acao=exibir" class="btn btn-default btn-flat">Perfil</a>
                        </div>
                        <div class="pull-right">
                            <a href="../../controllers/login.php?acao=logout" class="btn btn-default btn-flat">Sair</a>
                        </div>
                    </li>
                </ul>
            </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- CAMPO DE PESQUISA -->
    <section class="sidebar">
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /CAMPO DE PESQUISA -->

      <!-- MENU LATERAL -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">CONFIGURAÇÕES</li>
        <li class="active"><a href="#dicas"><i class="fa fa-pencil-square-o"></i> <span>Dicas</span></a></li>
        <li><a href="#cosmakers"><i class="fa fa-odnoklassniki"></i> <span>Cosmakers</span></a></li>
          <li><a href="#eventos"><i class="fa fa-calendar"></i> <span>Eventos</span></a></li>
          <li><a href="#canais"><i class="fa fa-youtube-play"></i> <span>Canais</span></a></li>
          <li><a href="#sites"><i class="fa fa-external-link"></i> <span>Sites</span></a></li>
          <li><a href="#usuarios"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
      </ul>

      <!-- /MENU LATERAL -->
    </section>
  </aside>

  <!-- MENU PRINCIPAL -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Bem vindo admin
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- DICAS -->
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
                            <td><?= $dica->data; ?></td>
                            <td><span class="label label-success"><?= $dica->atividade; ?></span></td>
                            <td><a href="../../controllers/dicas.php?acao=alterar&id=<?= $dica->id; ?>">Editar</a> |
                                <a href="../../controllers/dicas.php?acao=excluir&id=<?= $dica->id; ?>">Excluir</a></td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                        </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                <a href="../../controllers/dicas.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left">Acrescentar dica</a>
            </div>
        </div>
        <!-- /DICAS -->

        <!-- COSMAKERS -->
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
                            <th>Atividade</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php foreach ($listaCosmakers as $cosmaker): ?>
                            <td><?= $cosmaker->nome; ?></td>
                            <td><?= $cosmaker->imagem; ?></td>
                            <td><?= $cosmaker->funcao; ?></td>
                            <td><?= $cosmaker->descricao; ?></td>
                            <td><?= $cosmaker->link; ?></td>
                            <td><span class="label label-success"><?= $cosmaker->atividade; ?></span></td>
                            <td><a href="../../controllers/cosmakers.php?acao=alterar&id=<?= $cosmaker->id; ?>">Editar</a> |
                                <a href="../../controllers/cosmakers.php?acao=excluir&id=<?= $cosmaker->id; ?>">Excluir</a></td>                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                <a href="../../controllers/cosmakers.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left">Acrescentar cosmaker</a>
            </div>
        </div>
        <!-- /COSMAKERS -->

        <!-- EVENTOS -->
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
                            <th>Data</th>
                            <th>Hora</th>
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
                            <td><?= $evento->imagem; ?></td>
                            <td><?= $evento->descricao; ?></td>
                            <td><?= $evento->data; ?></td>
                            <td><?= $evento->hora; ?></td>
                            <td><?= $evento->local; ?></td>
                            <td><?= $evento->link; ?></td>
                            <td><span class="label label-success"><?= $evento->atividade; ?></span></td>
                            <td><a href="../../controllers/eventos.php?acao=alterar&id=<?= $evento->id; ?>">Editar</a> |
                                <a href="../../controllers/eventos.php?acao=excluir&id=<?= $evento->id; ?>">Excluir</a></td>
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
                <a href="../../controllers/eventos.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left">Acrescentar evento</a>
            </div>
        </div>
        <!-- /EVENTOS -->

        <!-- CANAIS -->
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
                            <td><?= $canal->imagem; ?></td>
                            <td><?= $canal->descricao; ?></td>
                            <td><?= $canal->link; ?></td>
                            <td><span class="label label-success"><?= $canal->atividade; ?></span></td>
                            <td><a href="../../controllers/canais.php?acao=alterar&id=<?= $canal->id; ?>">Editar</a> |
                                <a href="../../controllers/canais.php?acao=excluir&id=<?= $canal->id; ?>">Excluir</a></td>
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
                <a href="../../controllers/canais.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left">Acrescentar canal</a>
            </div>
        </div>
        <!-- /CANAIS -->

        <!-- SITES -->
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
                            <td><?= $site->imagem; ?></td>
                            <td><?= $site->descricao; ?></td>
                            <td><?= $site->link; ?></td>
                            <td><span class="label label-success"><?= $site->atividade; ?></span></td>
                            <td><a href="../../controllers/sites.php?acao=alterar&id=<?= $site->id; ?>">Editar</a> |
                                <a href="../../controllers/sites.php?acao=excluir&id=<?= $site->id; ?>">Excluir</a></td>
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
                <a href="../../controllers/sites.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left">Acrescentar site</a>
            </div>
        </div>
        <!-- /SITES -->

        <!-- USUÁRIOS -->
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
                            <td><?= $usuario->imagem; ?></td>
                            <td><?= $usuario->email; ?></td>
                            <td><?= $usuario->data_nasc; ?></td>
                            <td><span class="label label-success"><?= $usuario->atividade; ?></span></td>
                            <td><a href="../../controllers/usuarios.php?acao=alterar&id=<?= $usuario->id; ?>">Editar</a> |
                                <a href="../../controllers/usuarios.php?acao=excluir&id=<?= $usuario->id; ?>">Excluir</a></td>                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20"></div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                <a href="../../controllers/usuarios.php?acao=inserir" class="btn btn-sm btn-info btn-flat pull-left">Acrescentar usuario</a>
            </div>
        </div>
        <!-- /USUÁRIOS -->

    </section>
  </div>
  <!-- /MENU PRINCIPAL -->

  <!-- RODAPÉ -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 </strong> All rights reserved.
  </footer>
    <!-- /RODAPÉ -->

  <!-- BARRA LATERAL DIREITA -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>