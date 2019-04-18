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
                <li><a href="<?= $baseURL ?>app/views/admin/admin.php"><i class="fa fa-home"></i> <span>Página Inicial</span></a></li>
                <li id="dica"><a href="<?= $baseURL ?>app/views/admin/admin.php?secao=dicas#dicas"><i class="fa fa-pencil-square-o"></i> <span>Dicas</span></a></li>
                <li  id="cosmaker"><a href="<?= $baseURL ?>app/views/admin/admin.php?secao=cosmakers#cosmakers"><i class="fa fa-odnoklassniki"></i> <span>Cosmakers</span></a></li>
                <li id="evento"><a href="<?= $baseURL ?>app/views/admin/admin.php?secao=eventos#eventos"><i class="fa fa-calendar"></i> <span>Eventos</span></a></li>
                <li id="canal"><a href="<?= $baseURL ?>app/views/admin/admin.php?secao=canais#canais"><i class="fa fa-youtube-play"></i> <span>Canais</span></a></li>
                <li id="site"><a href="<?= $baseURL ?>app/views/admin/admin.php?secao=sites#sites"><i class="fa fa-external-link"></i> <span>Sites</span></a></li>
                <li id="usuario"><a href="<?= $baseURL ?>app/views/admin/admin.php?secao=usuarios#usuarios"><i class="fa fa-users"></i> <span>Usuários</span></a></li>

            </ul>
            <!-- /MENU LATERAL -->
    </aside>

    <!-- MENU PRINCIPAL -->
    <div class="content-wrapper">
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-primary">
                <div class="box-header with-border">
