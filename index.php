<?php
    session_start();
    require_once __DIR__."/app/models/CrudCosmaker.php";
    require_once __DIR__."/app/models/Cosmaker.php";
    require_once __DIR__."/app/models/CrudCanal.php";
    require_once __DIR__."/app/models/Canal.php";
    require_once __DIR__."/app/models/CrudDica.php";
    require_once __DIR__."/app/models/Dica.php";
    require_once __DIR__."/app/models/CrudEvento.php";
    require_once __DIR__."/app/models/Evento.php";
    require_once __DIR__."/app/models/CrudSite.php";
    require_once __DIR__."/app/models/Site.php";


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

    function shorten_text($text, $max_length = 140, $cut_off = '  ...', $keep_word = false)
{
    if(strlen($text) <= $max_length) {
        return $text;
    }

    if(strlen($text) > $max_length) {
        if($keep_word) {
            $text = substr($text, 0, $max_length + 1);

            if($last_space = strrpos($text, ' ')) {
                $text = substr($text, 0, $last_space);
                $text = rtrim($text);
                $text .=  $cut_off;
            }
        } else {
            $text = substr($text, 0, $max_length);
            $text = rtrim($text);
            $text .=  $cut_off;
        }
    }

    return $text;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		
		<!-- FAVICON -->
		<link rel="shortcut icon" href="assets/layout/img/kiri.ico" type="image/x-icon">
		<link rel="icon" href="assets/layout/img/kiri.ico" type="image/x-icon">
				
		<!-- TITLE -->
		<title>Cosplay World</title>

		<!-- GOOGLE FONTS -->
		<link href="assets/layout/css/googlefonts.css" rel='stylesheet' type='text/css'>

		<!-- STYLESHEETS -->
		<link href="assets/layout/css/bootstrap.css" rel="stylesheet">
		<link href="assets/layout/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/layout/css/flexslider.css" rel="stylesheet" >
		<link href="assets/layout/css/schedule.css" rel="stylesheet">
		<link href="assets/layout/css/gridgallery.css" rel="stylesheet" type="text/css"  />
		<link href="assets/layout/css/venobox.css" rel="stylesheet" type="text/css"/>
		<link href="assets/layout/css/styles.css" rel="stylesheet"/>
		<link href="assets/layout/css/queries.css" rel="stylesheet"/>
        <link href="assets/layout/css/our_style.css" rel="stylesheet"/>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	</head>
	   
    <body id="top" data-spy="scroll" data-target=".header" data-offset="80">
	  
		<!--PRELOADER-->
		<div class="preloader">
		<div class="status"></div>
		</div>
		<!--/PRELOADER-->
		
		<!--HEADER-->
	  	<div class="header header-hide">
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
				   <div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" 
						 data-target="#example-navbar-collapse">
						 <span class="sr-only">Toggle navigation</span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
					  </button>
					   <a class="navbar-brand" data-scroll href="#carousel-example-generic"><img src="assets/layout/img/logo.png" alt="logo"/></a>
				   </div>
				   <div class="collapse navbar-collapse" id="example-navbar-collapse">
					  <ul class="nav navbar-nav">
                         <li><a data-scroll href="#sobre">Sobre</a></li>
                          <li><a data-scroll href="#dicas">Dicas</a></li>
                          <li><a data-scroll href="#sites">Sites</a></li>
                          <li><a data-scroll href="#eventos">Eventos</a></li>
                          <li><a data-scroll href="#canais">Canais</a></li>
                          <li><a data-scroll href="#cosmakers">Cosmakers</a></li>
                          <li><a data-scroll href="#contact">Contato</a></li>

                        <!-- LOGIN E VERIFICAÇÃO-->
                          <?php $entrar = true;
                          if(isset($_SESSION['esta_logado'])){ if($_SESSION['esta_logado'] == true){ $entrar = false;?>

                          <li class="dropdown user user-menu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="avatar3" id="user" width="80px" src="assets/imagens/<?= $_SESSION['imagem'];?>"/>
                            <span class="hidden-xs"><?php echo $_SESSION['apelido'];?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img class="img-circle" id="a" width="80px" src="assets/imagens/<?= $_SESSION['imagem'];?>"/>
                                <p class="nome"><?php echo $_SESSION['usuario'];?></p>
                            </li>
                                  <li class="user-footer">
                                      <div class="pull-left">
                                          <a href="app/controllers/usuario/usuarios.php?acao=exibir" class="btn btn-default btn-flat">Perfil</a>
                                      </div>

                                      <!-- BOTÃO PARA O ADMIN -->
                                      <?php if($_SESSION['tipo_user'] == 1){ ?>
                                          <div class="pull-left">
                                              <a href="app/views/admin/admin.php" class="btn btn-default btn-flat">Admin</a>
                                          </div>
                                      <?php } ?>
                                      <!-- /BOTÃO PARA O ADMIN -->

                                      <div class="pull-right">
                                          <a href="app/controllers/usuario/login.php?acao=logout" class="btn btn-default btn-flat">Sair</a>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                          <?php }} if($entrar){?>
                            <li><a href="app/controllers/usuario/login.php">Entrar</a></li>
                          <?php } ?>
                          <!-- /LOGIN E VERIFICAÇÃO-->

					  </ul>
				   </div>
				</nav>
			</div>
		</div>
		<!--/HEADER-->
		
		<!--HOME-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                <li data-target="#carousel-example-generic" data-slide-to="6"></li>    
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" id="carroussel" role="listbox">
                <div class="item active">
                    <img src="assets/layout/img/carrousel/morg.jpg" alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src= assets/layout/img/carrousel/cos10.jpg alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src= assets/layout/img/carrousel/cos4.jpg alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src= assets/layout/img/carrousel/cos16.jpg alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src= assets/layout/img/carrousel/cos12.jpg alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src= assets/layout/img/carrousel/cos19.jpg alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <img src="assets/layout/img/arrow_left.png" alt="" id="arrow-left">
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <img src="assets/layout/img/arrow_right.png" alt="" id="arrow-right">
            </a>
        </div>
		<!--/HOME-->

           <!--SOBRE-->
            <section class="intro text-center section-padding" id="sobre">
            <div class="col-md-8 align-center wow animated fadeInLeft">
                <div class="row">
                    <div class="col-lg-8 align-center about">
                        <h1 class="preto">Sobre</h1><hr>
                        <p> Bem vindo! Você é novo por aqui? Não se preocupe, explicaremos tudinho! Nosso site é um  guia para cosplayers, um cosplayer é o nome que se dá a uma pessoa fantasiada de algum personagem, seja de animes, desenhos, filmes, histórias em quadrinho ou jogos. Um cosmaker é uma pessoa que produz sua própria fantasia. Bem fácil não é? E o que você  está esperando? Venha fazer seu próprio cosplay!</p>
                        <h2>Confira todas as nossas orientações!</h2>
                        <br>
                    </div>
                </div>
            </div>
        </section>
        <!--SOBRE-->

        <!--IMAGEM-->
        <section class="subscribe text-center">
            <div class="subscribe-overlay"></div>
            <div class="container wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s"></div>
        </section>
        <!--/IMAGEM-->

        <!--DICAS-->
        <section class="team text-center section-padding" id="dicas">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 wow animated fadeInUp align-center" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="arrow">Dicas para Cosplay</h1><hr>
                        <p class="branco">Visualize e dê as mais variadas dicas aos seus companheiros Cosmakers! Aproveite sua estadia no Cosplay World e deixe indicações relevantes!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="speakers-wrap">
                        <div id="dicasSlider">
                            <ul class="slides">

                                <?php foreach($listaDicas as $dica): ?>
                                    <?php if($dica->atividade == 1):?>
                                        <li>
                                            <div class="img"><h2><?= $dica->nome; ?></h2></div>
                                            <p><?= shorten_text($dica->descricao); ?></p>
                                            <div class="col-md-5 col-sm-5 wow animated fadeInUp readMore data-wow-duration="1s" data-wow-delay="0.9s">
                                                <div class="overlay-effect effects clearfix">
                                                    <div class="img">
                                                        <i class="textMore">Veja mais</i>
                                                        <div class="overlay searchMore">
                                                            <button class="md-trigger expand" data-modal="modal-<?= $dica->id; ?>">
                                                            <i class="fa fa-search lupa"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- INFORMAÇÕES DETALHADAS -->
            <?php foreach($listaDicas as $dica): ?>
                <?php if($dica->atividade == 1):?>

                    <div class="md-modal md-effect-9" id="modal-<?= $dica->id; ?>">
                        <div class="md-content">
                            <div class="folio">
                                <div class="sp-name"><strong><?= $dica->nome ?></strong></div>
                                <div class="sp-dsc">
                                    <blockquote>
                                        <p><?= $dica->descricao; ?></p>
                                    </blockquote>
                                </div>
                                <p id="preto"><?= date_format(date_create($dica->data),"d/m/Y"); ?></p>
                                <?php if(isset($_SESSION['id'])): ?>
                                <?php if($dica->id_usuario == $_SESSION['id']):?>
                                    <a href="http://localhost/Projeto/app/controllers/usuario/dicas.php?acao=alterar&id=<?= $dica->id; ?>"><button type="button"  class="btn-effecttt">Editar</button></a>
                                    <a href="http://localhost/Projeto/app/controllers/usuario/dicas.php?acao=excluir&id=<?= $dica->id; ?>"><button type="button"  class="btn-effecttt">Excluir</button></a>
                                <?php endif;?>
                                <button class="md-close"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="md-overlay"></div>
            <!-- /INFORMAÇÕES DETALHADAS -->

        </section>
        <!--/DICAS-->

        <!--SUBSCRIBE-->
        <section class="subscribe text-center">
            <div class="background"></div>
            <div class="container wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                <h1>Também quer dar dicas?</h1>
                <?php if(isset($_SESSION['id'])):?>
                <a href="http://localhost/Projeto/app/controllers/usuario/dicas.php?acao=inserir"> <i class="fa fa-paper-plane fa-2x"> </i><br><span>Quero</span></a>
            	<?php else:?>
				<a href="http://localhost/Projeto/app/controllers/usuario/login.php"> <i class="fa fa-paper-plane fa-2x"></i><br><span>Quero</span></a>
        		<?php endif;?>
            </div>
        </section>
        <!-- /SUBSCRIBE -->

        <!--SITES-->
        <section class="team text-center section-padding" id="sites">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 wow animated fadeInUp align-center" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="arrow">Sites</h1><hr>
                        <p>Veja aqui os melhores e mais acessados sites de compras de variados gêneros, contendo fantasias, sapatos, acessórios, lentes e perucas.</p>
                        <br>
                        <a href="app/controllers/usuario/sites.php?acao=inserir"> <button type="button"  class="btn-effectt" >Cadastre um site</button> </a>
                    </div>
                </div>
                <div class="row">
                    <div class="speakers-wrap">
                        <div id="sitesSlider">
                            <ul class="slides">
                                <?php foreach($listaSites as $site): ?>
                                    <?php if($site->atividade == 1):?>
                                        <li>
                                            <div class="col-md-10 col-sm-10 col-xs-10 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                                                <ul class="planContainer">
                                                    <li class="title">
                                                    <a href="<?= $site->link; ?>"><img width="100%" src="assets/imagens/<?= $site->imagem; ?>" /></a></li>
                                                    <li class="price"><p><?= $site->nome; ?></p></li>
                                                    <li>
                                                        <ul class="options">
                                                            <li><?= $site->descricao; ?></li>
                                                        </ul>
                                                    </li>
                                                    <?php if(isset($_SESSION['id'])): ?>
                                                    <?php if($site->id_usuario == $_SESSION['id']):?>
                                                        <a href="http://localhost/Projeto/app/controllers/usuario/sites.php?acao=alterar&id=<?= $site->id; ?>"><button type="button" class="btn-effecttt">Editar</button></a>
                                                            <a href="http://localhost/Projeto/app/controllers/usuario/sites.php?acao=excluir&id=<?= $site->id; ?>"><button type="button"  class="btn-effecttt">Excluir</button></a><?php endif;?>
                                                    <?php endif;?>
                                                    <li class="button"><a data-scroll class="btn-effect" href="<?= $site->link; ?>">Visitar</a></li>
                                                </ul>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!--/SITES-->

        <!--EVENTOS-->
        <section class="text-center section-padding" id="eventos">
            <div class="container wow animated fadeInLeft bottom-spacing">
                <div class="row">
                    <div class="col-md-8 align-center wow animated fadeInLeft">
                        <h1 class="preto">Eventos</h1><hr>
                        <p>Fique ligado nos eventos próximos à você e divirta-se frequentando-os ^_^</p>
                        <br>

                        <a href="app/controllers/usuario/eventos.php?acao=inserir"> <button type="button"  class="btn-effecttt" >Cadastre um evento</button> </a>
                    </div>
                </div>
            </div>

            <div class="container-schedule container wow animated fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <div id="tabs-ui" class="tabs">
                    <nav id="eventos-tabs">
                        <ul class="nav nav-tabs">
                            <?php foreach ($listaEventos as $evento): ?>
                                <?php if($evento->atividade == 1):?>
                                <li><a href="#section-<?= $evento->id?>" role="tab" data-toggle="tab">
                                        <span><?= $evento->nome; ?></span></a></li>
                                    <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </nav>

                    <div class="tab-content">
                        <?php foreach ($listaEventos as $evento): ?>
                            <?php if($evento->atividade == 1):?>
                                <section role="tabpanel" class="tab-pane" id="section-<?= $evento->id?>">
                                    <div class="container">
                                        <div class="accordion">
                                            <div class="day"><?= $evento->nome; ?></div>
                                            <div class="item clearfix">
                                                <div class="heading clearfix">
                                                    <div class="time col-md-1 col-sm-1 col-xs-1">
                                                        <img width="100%" src="assets/imagens/<?= $evento->imagem; ?>" />
                                                    </div>
                                                    <div class="e-title col-md-10 col-sm-10 col-xs-10">
                                                        Local: <?= $evento->local; ?><br/>
                                                        <span class="name">Data: <?= date_format(date_create($evento->data),"d/m/Y"); ?></span>
                                                        <span class="speaker-designaition">Hora: <?= date_format(date_create($evento->hora),"H:i"); ?></span>
                                                        <span class="speaker-designaition">- <?= date_format(date_create($evento->hora_fim),"H:i"); ?></span><br>
                                                        <?php if($evento->data2 != null):?>
                                                        <span class="name">Data: <?= date_format(date_create($evento->data2),"d/m/Y"); ?></span>
                                                        <span class="speaker-designaition">Hora: <?= date_format(date_create($evento->hora2),"H:i"); ?></span>
                                                        <span class="speaker-designaition">- <?= date_format(date_create($evento->hora_fim2),"H:i"); ?></span><br>
                                                        <?php endif; ?>
                                                        <?php if($evento->data3 != null):?>
                                                        <span class="name">Data: <?= date_format(date_create($evento->data3),"d/m/Y"); ?></span>
                                                        <span class="speaker-designaition">Hora: <?= date_format(date_create($evento->hora3),"H:i"); ?></span>
                                                        <span class="speaker-designaition">- <?= date_format(date_create($evento->hora_fim3),"H:i"); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-sm-10 col-xs-10">
                                                    <div class="content venue col-md-3 col-sm-12 col-xs-12">
                                                        <a href="<?= $evento->link; ?>">
                                                            <button type="button"  class="btn-effecttt" >Visitar</button>
                                                        </a>
                                                        <?php if(isset($_SESSION['id'])): ?>
                                                        <?php if($evento->id_usuario == $_SESSION['id']):?>
                                                            <a href="http://localhost/Projeto/app/controllers/usuario/eventos.php?acao=alterar&id=<?= $evento->id; ?>"><button type="button" class="btn-effecttt">Editar</button></a>
                                                            <a href="http://localhost/Projeto/app/controllers/usuario/eventos.php?acao=excluir&id=<?= $evento->id; ?>"><button type="button"  class="btn-effecttt">Excluir</button></a>
                                                        <?php endif;?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="content details col-md-10 col-sm-10 col-xs-10">
                                                        <?= $evento->descricao; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--/EVENTOS-->

        <!--CANAIS-->
        <section class="team text-center section-padding" id="canais">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow animated fadeInUp align-center" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="arrow">Canais</h1><hr>
                        <p class="branco">Tenha aqui os principais youtubers do ramo e seus respectivos canais. Divirta-se!!!</p>
                        <br>
                        <a href="app/controllers/usuario/canais.php?acao=inserir"> <button type="button"  class="btn-effectt" >Cadastre um canal do YouTube</button> </a>            
                </div>
            </div>
                <div class="row">
                    <div class="speakers-wrap">
                        <div id="canaisSlider">
                            <ul class="slides">

                                <?php foreach($listaCanais as $canal): ?>
                                    <?php if($canal->atividade == 1):?>
                                        <li>
                                            <div class="col-md-8 col-sm-8 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                                                <div class="overlay-effect effects clearfix">
                                                    <div id="canais-element" class="img">
                                                        <a href="<?= $canal->link; ?>"><img width="100%" src="assets/imagens/<?= $canal->imagem; ?>" /></a>
                                                    </div>
                                                </div>
                                                <h2><?= $canal->nome; ?></h2>
                                                <p><?= $canal->descricao; ?></p>
                                                <?php if(isset($_SESSION['id'])): ?>
                                                <?php if($canal->id_usuario == $_SESSION['id']):?>
                                                        <a href="http://localhost/Projeto/app/controllers/usuario/canais.php?acao=alterar&id=<?= $canal->id; ?>"><button type="button" class="btn-effectt">Editar</button></a><br><br>
                                                        <a href="http://localhost/Projeto/app/controllers/usuario/canais.php?acao=excluir&id=<?= $canal->id; ?>"><button type="button"  class="btn-effectt">Excluir</button></a>
                                                    <?php endif;?>
                                                <?php endif;?>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        <!--/CANAIS-->

        <!--IMAGEM-->
        <section class="subscribe text-center">
            <div class="background1"></div>
            <div class="container wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s"></div>
        </section>
        <!--/IMAGEM-->

        <!--COSMAKERS-->
        <section class="team text-center section-padding" id="cosmakers">
			<div class="container">
				<div class="row">
				  <div class="col-lg-8 wow animated fadeInUp align-center" data-wow-duration="1s" data-wow-delay="1s">
					<h1 class="arrow">Cosmakers</h1><hr>
                      <p class="branco">Amplie suas experiências com esta seção desenvolvida especialmente para divulgação de cosmakers. Desfrute desta oportunidade!</p>
                      <br>
                      <a href="app/controllers/usuario/cosmakers.php?acao=inserir"> <button type="button"  class="btn-effectt" >Cadastre um cosmaker</button> </a>
                  </div>
				</div>
				<div class="row">
					<div class="speakers-wrap">
						<div id="portfolioSlider">
							<ul class="slides">

                                <?php foreach($listaCosmakers as $cosmaker): ?>
                                    <?php if($cosmaker->atividade == 1):?>
                                <li>
									<div class="col-md-10 col-sm-10 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
                                                <img width="100%" src="assets/imagens/<?= $cosmaker->imagem; ?>" />
												<div class="overlay">
													<button class="md-trigger expand" data-modal="modal-cosmaker-<?= $cosmaker->id; ?>">
                                                        <i class="fa fa-search"></i><br>Veja mais</button>
												</div>
											</div>
										</div>
										<h2><?= $cosmaker->nome; ?></h2>
										<p><?= $cosmaker->funcao; ?></p>
									</div>
								</li>
                                <?php endif; ?>
                                <?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- INFORMAÇÕES DETALHADAS -->
            <?php foreach($listaCosmakers as $cosmaker): ?>
                <?php if($cosmaker->atividade == 1):?>

            <div class="md-modal md-effect-9" id="modal-cosmaker-<?= $cosmaker->id; ?>">
				<div class="md-content">
					<div class="folio">
						<div class="avatar3"><img width="100%" src="assets/imagens/<?= $cosmaker->imagem; ?>" /></div>
						<div class="sp-name"><strong><?= $cosmaker->nome ?></strong><br/><?= $cosmaker->funcao ?></div>
						<div class="sp-dsc">
							<blockquote>
							<p><?= $cosmaker->descricao; ?></p>
							</blockquote>
						</div>
						<div class="sp-social">
							<ul>
                                <?php if(isset($_SESSION['id'])): ?>
                                <?php if($cosmaker->id_usuario == $_SESSION['id']):?>
                                    <a href="http://localhost/Projeto/app/controllers/usuario/cosmakers.php?acao=alterar&id=<?= $cosmaker->id; ?>"><button type="button" class="btn-effecttt">Editar</button></a>
                                    <a href="http://localhost/Projeto/app/controllers/usuario/cosmakers.php?acao=excluir&id=<?= $cosmaker->id; ?>"><button type="button" class="btn-effecttt">Excluir</button></a><?php endif;?>
                                <?php endif;?><br>
								<li><a href="<?= $cosmaker->link ?>" class="social-btn"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= $cosmaker->link2 ?>" class="social-btn"><i class="fa fa-link"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div>
            <?php endif; ?>
            <?php endforeach; ?>
			<div class="md-overlay"></div>
			<!-- /INFORMAÇÕES DETALHADAS -->

        </section>
		<!--/COSMAKERS-->

        <!--IMAGEM-->
        <section class="subscribe text-center">
            <div class="background2"></div>
            <div class="container wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s"></div>
        </section>
        <!--/IMAGEM-->

        <!--CONTATO-->
        <section class="text-center section-padding contact-wrap" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 wow animated fadeInLeft align-center" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h1 class="arrow">Contato</h1><hr>
                        <p>Sugestões, reclamações, elogios, dúvidas ou qualquer outra coisa, entre em contato conosco</p>
                    </div>
                </div>
                <div class="row contact-details">
                    <div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.9s"></div>
                    <div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.9s">
                        <div class="light-box box-hover">
                            <h2><span>Redes Sociais</span></h2>
                            <p><a href="https://www.facebook.com/cosplayworldoficial/">Facebook</p></a><br>
                            <p><a href="https://www.instagram.com/cosplayworldoficial/">Instagram</p></a><br>
                            <p>cosplayworld@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /CONTACT -->   

		<!--RODAPÉ--> 
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-center">
                        <ul class="legals">
                            <li><button class="md-trigger " data-modal="modal-11">Disclaimer</button></li>
                            <li><a href="http://multia.in/">@Cosplay World</a></li>
                        </ul>
                    </div>
                    <div class="md-modal md-effect-9" id="modal-11">
                        <div class="md-content padding-none">
                            <div class="folio">
                                <div class="sp-name disclaimer"><strong>Disclaimer</strong></div>
                            </div>
                        </div>
                    </div> 
                    <div class="md-overlay"></div>
                </div>
            </div>
        </footer>
        <!-- /RODAPÉ -->

		<!--SCRIPTS-->
		<script type="text/javascript" src="assets/layout/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="assets/layout/js/jquery-ui-1.10.4.min.js"></script>
		
		<!--VIMEO VIDEO-->
        <script type="text/javascript" src="assets/layout/js/venobox.js"></script>

        <!--3D GALLERY-->
        <script type="text/javascript" src="assets/layout/js/classie.grid.gallery.js"></script>
		<script type="text/javascript" src="assets/layout/js/modernizr.gridgallery.js"></script>
 
		<script type="text/javascript" src="assets/layout/js/classie.js" ></script>
		<script type="text/javascript" src="assets/layout/js/modalEffects.js" ></script>
       
        <script type="text/javascript" src="assets/layout/js/bootstrap.min.js" ></script>
        
		<!-- SLIDER  -->
		<script type="text/javascript" src="assets/layout/js/jquery.flexslider.js" ></script>
		
		<!-- SCHEDULE TABS  -->
        <script type="text/javascript" src="assets/layout/js/modernizr.js" ></script>
		
		<!--SPONSOR SLIDER-->
		<script type="text/javascript" src="assets/layout/js/jssor.core.js"></script>
		<script type="text/javascript" src="assets/layout/js/jssor.utils.js"></script>
		<!--<script type="text/javascript" src="assets/layout/js/jssor.slider.js"></script>
		<script type="text/javascript" src="assets/layout/js/sponsor_init.js"></script>-->
		
		<!-- SMOOTH SCROLL  -->
		<script type="text/javascript" src="assets/layout/js/smooth-scroll.js"></script>
		
		<!-- NICE SCROLL  -->
		<script type="text/javascript" src="assets/layout/js/jquery.nicescroll.js"></script>
		
		<script type="text/javascript" src="assets/layout/js/jquery.placeholder.js"></script>
		
		<!-- ANIMATION  -->
		<script type="text/javascript" src="assets/layout/js/wow.min.js"></script>
		
		<!-- INITIALIZATION  -->
		<script type="text/javascript" src="assets/layout/js/init.js"></script>

    </body>
</html>