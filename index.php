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

    ?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		
		<!-- FAVICON -->
		<link rel="shortcut icon" href="assets/img/kiri.ico" type="image/x-icon">
		<link rel="icon" href="assets/img/kiri.ico" type="image/x-icon">
				
		<!-- TITLE -->
		<title>Cosplay World</title>

		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,200,100,800,900' rel='stylesheet' type='text/css'> 

		<!-- STYLESHEETS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/flexslider.css" rel="stylesheet" >
		<link href="assets/css/schedule.css" rel="stylesheet">
		<link href="assets/css/gridgallery.css" rel="stylesheet" type="text/css"  />
		<link href="assets/css/venobox.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/styles.css" rel="stylesheet"/>
		<link href="assets/css/queries.css" rel="stylesheet"/>
        <link href="assets/css/our_style.css" rel="stylesheet"/>

        <style>
            .col-md-3.wow.animated.fadeInUp.animated {
                min-height: 285px;
                margin-bottom: 20px;
                position: relative;
                float: left;
            }

            .canais-element {
                /*background: #efefef;*/
                position: relative;
                float: left;
            }

            .canais-element img {
                margin-top: 15px;
                margin-bottom: 15px;
                max-width: 50%;
                border-radius: 50%;
            }
        </style>

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
					   <a class="navbar-brand" data-scroll href="#carousel-example-generic"><img src="assets/img/logo6.png" alt="logo"/></a>
				   </div>
				   <div class="collapse navbar-collapse" id="example-navbar-collapse">
					  <ul class="nav navbar-nav">
						<li><a data-scroll href="#canais">Canais</a></li>
						<li><a data-scroll href="#eventos">Eventos</a></li>
						<li><a data-scroll href="#cosmakers">Cosmakers</a></li>
						<li><a data-scroll href="#sites">Sites</a></li>
						<li><a data-scroll href="#dicas">Dicas</a></li>
						<li><a data-scroll href="#contato">Contato</a></li>

<!--                          LOGIN e VERIFICAÇÃO-->
                          <?php $entrar = true;
                          if(isset($_SESSION['esta_logado'])){ if($_SESSION['esta_logado'] == true){ $entrar = false;?>

                          <li class="dropdown user user-menu">
                              <!-- Menu Toggle Button -->
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <!-- The user image in the navbar-->
                                  <img src="app/views/admin/dist/img/user2-160x160.jpg" class="avatar3" id="user" alt="User Image">
                                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                  <span class="hidden-xs"><?php echo $_SESSION['apelido'];?></span>
                              </a>
                              <ul class="dropdown-menu">
                                  <!-- The user image in the menu -->
                                  <li class="user-header">
                                      <img src="app/views/admin/dist/img/user2-160x160.jpg" class="img-circle" id="a" alt="User Image">

                                      <p>
                                          <?php echo $_SESSION['usuario'];?>
                                      </p>
                                  </li>
                                  <!-- Menu Footer-->
                                  <li class="user-footer">
                                      <div class="pull-left">
                                          <a href="app/controllers/usuarios.php?acao=exibir" class="btn btn-default btn-flat">Perfil</a>

                                      </div>
                                      <?php if($_SESSION['tipo_user'] == 1){ ?>
                                          <div class="pull-left">
                                              <a href="app/views/admin/admin.php" class="btn btn-default btn-flat">Admin</a>
                                          </div>
                                      <?php } ?>

                                      <div class="pull-right">
                                          <a href="app/controllers/login.php?acao=logout" class="btn btn-default btn-flat">Sair</a>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                          <?php }} if($entrar){?>
                            <li><a href="app/controllers/login.php">Entrar</a></li>
                          <?php } ?>

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
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" id="carroussel" role="listbox">
                <div class="item active">
                    <img src="http://img03.deviantart.net/c802/i/2016/161/0/6/raven_teen_titans_cosplay_by_lumpysnorlax-da5p6nu.jpg" alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src="https://i.pinimg.com/originals/f5/2f/18/f52f18f01eadc685383b4db993a946df.jpg" alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src="https://i.imgur.com/LAsoJeq.jpg" alt="..." width="100%">
                    <div class="carousel-caption"></div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <img src="assets/img/arrow_left.png" alt="" id="arrow-left">
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <img src="assets/img/arrow_right.png" alt="" id="arrow-right">
            </a>
        </div>
		<!--/HOME-->
		
		<!--CANAIS-->
        <section class="intro text-center section-padding" id="canais">
			<div class="container wow animated fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0.5s">
				<div class="row">
					<div class="col-lg-8 align-center about">
						<h1 class="arrow">Canais</h1>
						<hr>
						<p>Lorem ipsum dolor sit amet, ad eos iriure corpora prodesset. Partem timeam at vim, mel veritus accusata ea. Ius ei dicam inciderint, eleifend deseruisse ei mea. Alia dicam eam te, summo exerci ei mei.Ei sea debet choro omittantur. Ea nam quis aeterno, et usu semper senserit.</p>
                        <br>
                        <a href="app/controllers/canais.php?acao=inserir"> <button type="button"  class="btn btn-outline-success" >Cadastrar um Canal do YouTube</button> </a>
					</div>
				</div>
			</div>
        </section>
       
        <!--GALLERY-->
        <section class="features text-center" id="features">
			<div class="row">


				<!--Conteudo dos CANAIS-->
				<div class="container col-md-12 features-md" >
					<div class="row">
                        <div class="col-md-12">
							<div class="features-wrapper">
                                <?php foreach ($listaCanais as $canal): ?>
								<div class="col-md-3 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="canais-element">
                                        <div class="icon">
                                            <img src="https://cms-assets.tutsplus.com/uploads/users/107/profiles/2394/profileImage/avatar-new400.jpg" alt="">
                                            <!--<?php //$canal->imagem; ?>-->
                                        </div>
                                        <h2><?= $canal->nome; ?></h2>
                                        <p><?= $canal->descricao; ?></p>

                                    </div>
                                    <div style="clear: both" class="clearfix"></div>

                                </div>
                                <?php endforeach; ?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<!--/Conteudo dos CANAIS-->

			</div>
        </section>
		<!--/CANAIS-->

        <!--EVENTOS-->
        <section class="text-center section-padding" id="eventos">
            <div class="container wow animated fadeInLeft bottom-spacing">
                <div class="row">
                    <div class="col-md-8 align-center wow animated fadeInLeft">
                        <h1 class="arrow">Eventos</h1><hr>
                        <p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
                        <br>
                        <a href="app/controllers/eventos.php?acao=inserir"> <button type="button"  class="btn btn-outline-success" >Cadastrar um Evento</button> </a>
                    </div>
                </div>
            </div>

            <div class="container-schedule container wow animated fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <div id="tabs-ui" class="tabs">
                    <nav>
                        <ul>
                            <?php foreach ($listaEventos as $evento): ?>
                                <li><a href="<?= $evento->id?>"><span><?= $evento->data; ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                    <?php foreach ($listaEventos as $evento): ?>
                        <div class="content">
                            <section id="section-1">
                                <div class="container">
                                    <div class="accordion">
                                        <div class="day"><?= $evento->nome; ?></div>
                                        <div class="item clearfix">
                                            <div class="heading clearfix">
                                                <div class="time col-md-3 col-sm-12 col-xs-12"><?= $evento->imagem; ?></div>
                                                <div class="e-title col-md-9 col-sm-12 col-xs-12">
                                                    Local: <?= $evento->local; ?><br/>
                                                    <span class="name">Data: <?= $evento->data; ?></span>
                                                    <span class="speaker-designaition">Hora: <?= $evento->hora; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="content venue col-md-3 col-sm-12 col-xs-12">
                                                    <div class="button"><a data-scroll class="btn-effect" href="<?= $evento->link; ?>">Visitar</a></div>
                                                </div>
                                                <div class="content details col-md-9 col-sm-12 col-xs-12">
                                                    <?= $evento->descricao; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--/EVENTOS-->

        <!--COSMAKERS-->
        <section class="team text-center section-padding" id="cosmakers">
			<div class="container">
				<div class="row">
				  <div class="col-lg-8 wow animated fadeInUp align-center" data-wow-duration="1s" data-wow-delay="1s">
					<h1 class="arrow">Cosmakers</h1><hr>
                      <p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
                      <br>
                      <a href="app/controllers/cosmakers.php?acao=inserir"> <button type="button"  class="btn btn-outline-success" >Cadastrar um Cosmaker</button> </a>
                  </div>
				</div>
				<div class="row">
					<div class="speakers-wrap">
						<div id="portfolioSlider">
							<ul class="slides">

                                <?php foreach($listaCosmakers as $cosmaker): ?>

                                <li>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
												<img src="assets/img/team/team3.jpg" alt="Portfolio Item">
												<div class="overlay">
													<button class="md-trigger expand" data-modal="modal-<?= $cosmaker->id; ?>">
                                                        <i class="fa fa-search"></i><br>Veja mais</button>
												</div>
											</div>
										</div>
										<h2><?= $cosmaker->nome; ?></h2>
										<p><?= $cosmaker->funcao; ?></p>
									</div>
								</li>
                                <?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- INFORMAÇÕES DETALHADAS -->
            <?php foreach($listaCosmakers as $cosmaker): ?>

            <div class="md-modal md-effect-9" id="modal-<?= $cosmaker->id; ?>">
				<div class="md-content">
					<div class="folio">
						<div class="avatar3"></div>
						<div class="sp-name"><strong><?= $cosmaker->nome ?></strong><br/><?= $cosmaker->funcao ?></div>
						<div class="sp-dsc">
							<blockquote>
							<p><?= $cosmaker->descricao; ?></p>
							</blockquote>
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="<?= $cosmaker->link ?>" class="social-btn"><i class="fa fa-facebook"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div>
            <?php endforeach; ?>
			<div class="md-overlay"></div>
			<!-- /INFORMAÇÕES DETALHADAS -->

        </section>
		<!--/COSMAKER-->
		
		<!--SITES-->
		<section id="sites" class="portfolio text-center section-padding">
			<div class="container">
                <div class="col-md-8 align-center wow animated fadeInLeft">
                    <h1 class="arrow">Sites</h1><hr>
                    <p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
                    <br>
                    <a href="app/controllers/sites.php?acao=inserir"> <button type="button"  class="btn btn-outline-success" >Cadastrar um site</button> </a>
                </div>
					<div class="pricing-wrap">                
						<ul class="slides">

                            <?php foreach($listaSites as $site): ?>

							<li>
								<div class="col-md-3 col-sm-6 col-xs-6 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
									<ul class="planContainer">
										<li class="title"><h2><?= $site->imagem; ?></h2></li>
										<li class="price"><p><?= $site->nome; ?></p></li>
										<li>
											<ul class="options">
												<li><?= $site->descricao; ?></li>
												<li>Descrição</li>
										   </ul>
										</li>
										<li class="button"><a data-scroll class="btn-effect" href="<?= $site->link; ?>">Visitar</a></li>
									</ul>
                                    <?php endforeach; ?>
								</div>
                    </div>
            </div>
        </section>
		<!--/SITES-->
        
       <!--DICAS-->
        <div id="dicas" class="ignite-cta text-center section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-8 align-center wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
						<h1 class="arrow">Dicas para Cosplay</h1><hr>
						<p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
                        <br>
                        <a href="app/controllers/dicas.php?acao=inserir"> <button type="button"  class="btn btn-outline-success" >Cadastrar uma dica</button> </a>
                    </div>
					<!-- Jssor Slider Begin -->
					<div id="slider1_container" style=" ">
						<div class="inner_carousal" data-u="slides" style="">
                            <?php foreach ($listaDicas as $dica): ?>
                            <div id="tip_title"><strong><?= $dica->nome; ?> </strong>
                                <div><?= $dica->descricao; ?></div>
                            </div>
                                <div></div>

                            <?php endforeach; ?>
						</div>
					</div>
					<!-- Jssor Slider End -->
				</div>
			</div>
		</div>
		 <!-- /DICAS -->

		<!--SUBSCRIBE-->
        <section class="subscribe text-center">
			<div class="subscribe-overlay"></div>
			<div class="container wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
				<h1>Também quer dar dicas?</h1>
				<form action="app/controllers/dicas.php?acao=inserir" id="notifyMe" method="POST" class="center-block align-center col-lg-5 col-md-5 col-sm-10 col-xs-10">
					<div class="input-group col-lg-12 align-center">

						<button class="btn btn-default notify-button">
                            <i class="fa fa-paper-plane"></i><span>Quero</span></button>
					  <h2>Você pode ajudar outras pessoas!</h2>

					</div>
				</form>
			</div>
        </section>
		<!-- /SUBSCRIBE -->

		<!--CONTATO-->
        <section class="text-center section-padding contact-wrap" id="contato">
			<div class="container">
				<div class="row">
					<div class="col-md-8 wow animated fadeInLeft align-center" data-wow-duration="1s" data-wow-delay="0.3s">
						<h1 class="arrow">Contato</h1><hr>
						<p>Sugestões, reclamações, elogios, dúvidas ou qualquer outra coisa, entre em contato conosco <3.</p>
					</div>
				</div>
				<div class="row contact-details">

					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.7s">
						<div class="light-box box-hover">
							<h2><span>Celular</span></h2>
							<p>+47 9 9854 2631<br>+47 9 9856 2415</p>
						</div>
					</div>
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.9s">
						<div class="light-box box-hover">
							<h2><span>Email</span></h2>

							<p><a href="#">sariho@gmail.com</a><br><a href="#">vika@gmail.com</a><br><a href="#">cosplayworld@gmail.com</a></p>
						</div>
					</div>
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.7s">
						<div class="light-box box-hover">
							<h2><span>Facebook</span></h2>
							<p>Face da Sarah<br>Face da Vitória</p>
						</div>
					</div>
				</div>

			</div>
        </section>
		<!-- /CONTATo -->

		<!--FOOTER-->	
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6 align-center">
						<ul class="legals">
							<li><p>Faça parte desse mundo cosplay!</p></li>
						</ul>
					</div>
<!--					<div class="md-modal md-effect-9" id="modal-11">-->
<!--						<div class="md-content padding-none">-->
<!--							<div class="folio">-->
<!--								<div class="sp-name disclaimer"><strong>Disclaimer</strong></div>-->
<!--								<div class="sp-dsc disclaim-border">-->
<!--									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.-->
<!--									<br /><br />-->
<!--									Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.-->
<!--								</div>-->
<!--								<button class="md-close"><i class="fa fa-times"></i></button>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div> -->
<!--					<div class="md-overlay"></div>-->
				</div>
			</div>
        </footer>
		<!-- /FOOTER -->

<!-- /WRAPER -->
		<!--SCRIPTS-->	
		
		<script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery-ui-1.10.4.min.js"></script>
		
		<!--VIMEO VIDEO-->
        <script type="text/javascript" src="assets/js/venobox.js"></script>

        <!--3D GALLERY-->
        <script type="text/javascript" src="assets/js/classie.grid.gallery.js"></script>
		<script type="text/javascript" src="assets/js/modernizr.gridgallery.js"></script>		
        <!--<script type="text/javascript" src="assets/js/cbpGridGallery.js"></script>-->
 
		<script type="text/javascript" src="assets/js/classie.js" ></script>
		<script type="text/javascript" src="assets/js/modalEffects.js" ></script>
       
	    <script type="text/javascript" src="assets/js/nlform.js" ></script>
		<script>var nlform = new NLForm( document.getElementById( 'nl-form' ) );</script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js" ></script>
        
		<!-- SLIDER  -->
		<script type="text/javascript" src="assets/js/jquery.flexslider.js" ></script>
		
		<!-- SCHEDULE TABS  -->
        <script type="text/javascript" src="assets/js/modernizr.js" ></script>
        <!--<script type="text/javascript" src="assets/js/cbpFWTabs.js" ></script>		-->
		
		<!--SPONSOR SLIDER-->
		<script type="text/javascript" src="assets/js/jssor.core.js"></script>
		<script type="text/javascript" src="assets/js/jssor.utils.js"></script>
		<script type="text/javascript" src="assets/js/jssor.slider.js"></script>
		<script type="text/javascript" src="assets/js/sponsor_init.js"></script>
		
		<!-- SMOOTH SCROLL  -->
		<script type="text/javascript" src="assets/js/smooth-scroll.js"></script>
		
		<!-- NICE SCROLL  -->
		<script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>

		<!-- SUBSCRIPTION FORM  -->
		<script type="text/javascript" src="assets/js/notifyMe.js"></script>
		
		<script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
		
		<!-- ANIMATION  -->
		<script type="text/javascript" src="assets/js/wow.min.js"></script>
		
		<!-- INITIALIZATION  -->
		<script type="text/javascript" src="assets/js/init.js"></script>

    </body>
</html>