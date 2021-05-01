<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

	<!-- start page loading -->
	<div id="preloader">
		<div class="row loader">
			<div class="loader-icon"></div>
		</div>
	</div>
	<!-- end page loading -->

	<!-- start main-wrapper section -->
	<div class="main-wrapper mp-pusher" id="mp-pusher">

		<!-- start header section -->
		<header class="fixed header-light-nav">

			<div id="top-bar">
				<div class="container-fluid">
					<div class="row">
						<div class="col-3 col-md-6">
							<div class="top-bar-info">
								<ul>
									<li><a href="<?=base_url();?>"><i class="ti-mobile"></i><span class="d-none d-md-inline-block padding-10px-left">(+503) <?=$conf->telefono?></span></a></li>
									<li><a href="<?=base_url();?>"><i class="ti-email"></i><span class="d-none d-md-inline-block padding-10px-left"><?=$conf->correo?></span></a></li>
								</ul>
							</div>
						</div>
						<div class="col-9 col-md-6">
							<ul class="top-nav">
								<?php if (isset($logged)): ?>
									<li class="nav-item dropdown">
										<a href="alerts.html#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><i class="far fa-user"></i> Perfil</a>
										<ul class="dropdown-menu padding-20px-all">
											<li class="margin-10px-bottom">
												<div class="media align-items-center">
													<div class="media-body"><i class="ti-user"></i> <?=$nombre." ".$apellido?></div>
												</div>
											</li>
											<li>
												<a href="<?=base_url("perfil")?>" class="dropdown-item">Mi Perfil</a>
											</li>
											<li>
												<a href="<?=base_url("ordenes")?>" class="dropdown-item">Mis Ordenes</a>
											</li>
											<li>
												<a href="<?=base_url("lista_deseos")?>" class="dropdown-item">Lista de Deseos</a>
											</li>
											<li>
												<a href="<?=base_url("login/logout")?>" class="dropdown-item">Cerrar Sesion</a>
											</li>
										</ul>
									</li>
								<?php else: ?>
									<li>
										<a href="<?=base_url("login")?>" class="text-info font-bold"><i class="far fa-user"></i> Iniciar Sesión</a>
									</li>
								<?php endif;?>

							</ul>

						</div>
					</div>
				</div>
			</div>

			<div class="navbar-default">

				<!-- start top search -->
				<div class="top-search bg-theme">
					<div class="container-fluid">
						<!--form class="search-form" action="<!--?=base_url("")?>" method="GET"-->
						<div class="input-group">
							<span class="input-group-addon cursor-pointer">
								<button class="search-form_submit fas fa-search font-size18 xs-font-size16 text-white" type="submit"></button>
							</span>

							<input type="text" class="search-form_input form-control searching" id="s" name="s" autocomplete="off" placeholder="Escribe y pulsa enter...">
							<span class="input-group-addon close-search"><i class="fas fa-times font-size18 line-height-28 margin-5px-top"></i></span>
						</div>
						<!--/form-->
					</div>
				</div>
				<!-- end top search -->

				<div class="container-fluid no-padding">
					<div class="row align-items-center no-gutters">
						<div class="col-12 col-lg-12">
							<div class="menu_area alt-font">
								<nav class="navbar navbar-expand-lg navbar-light no-padding">

									<!-- category toggler -->
									<a href="home-shop-1.html#!" id="trigger" class="menu-trigger"><i class="ti-menu"></i></a>
									<!-- end category toggler -->

									<div class="navbar-header navbar-header-custom">
										<!-- start logo -->
										<a href="<?=base_url()?>" class="navbar-brand logodefault">
											<img id="logo" src="<?=base_url("assets/img/logo.png")?>" alt="logo">
										</a>
										<!-- end logo -->
									</div>

									<!-- menu toggler -->
									<div class="navbar-toggler"></div>
									<!-- end menu toggler -->

									<!-- menu area -->
									<ul class="navbar-nav mx-auto" id="nav" style="display: none;">

										<li><a href="<?=base_url()?>">Inicio</a></li>
										<li><a href="<?=base_url("catalogo")?>">Catalogo</a></li>
										<li><a href="<?=base_url("categorias")?>">Categorias</a></li>
										<li><a href="<?=base_url("nosotros")?>">Nosotros</a></li>
										<!--<li><a href="<?php//base_url("sucursales")?>">Sucursales</a></li>-->
										<li><a href="<?=base_url("contacto")?>">Contacto</a></li>
									</ul>
									<!-- end menu area -->

									<!-- start attribute navigation -->
									<div class="attr-nav sm-no-margin-right sm-margin-75px-right">
										<ul>
										</li>
										<!--li class="cartt"><a href="<?=base_url("catalogo/cart")?>"><i class="ti-shopping-cart"></i></a></li-->
										<li class="dropdown sm-margin-20px-right">
											<a href="<?=base_url("catalogo/cart")?>" class="dropdown-toggle" data-toggle="dropdown">
												<i class="ti-shopping-cart"></i>
												<span class="badge bg-theme badge_items">0</span>
											</a>
											<ul class="dropdown-menu cart-list">
												<li class="total bg-theme">
													<span class="foat-left"><strong>Total</strong>: $0.00</span>
													<a href="<?=base_url("catalogo/cart")?>" class="butn-style2 small white float-right w-auto"><span>Ver Carrito</span></a>
												</li>
											</ul>
										</li>
										<li class="search"><a href="<?=base_url("catalogo/cart")?>"><i class="ti-search"></i></a></li>
									</ul>
								</div>
								<!-- end attribute navigation -->
							</nav>
						</div>
					</div>
				</div>
			</div>

		</div>

	</header>
	<!-- end header section -->

	<!-- category mp-menu -->
	<div id="mp-menu" class="mp-menu">
		<div class="mp-level">
			<h2>Categorias</h2>
			<ul>
				<?php foreach ($cats as $row): ?>
					<li><a href="<?php echo base_url("catalogo/cat/").$row->param; ?>"><?=$row->nombre_cat?></a></li>
				<?php endforeach; ?>
			</ul>

		</div>
	</div>
	<!-- end category mp-menu -->
