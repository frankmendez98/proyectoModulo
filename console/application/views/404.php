<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="es">

<head>

	<!-- metas -->
	<meta charset="utf-8">
	<meta name="author" content="Open Solutions Systems" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="keywords" content="Mega Liberia, venta online, libreria online, liberia, san miguel" />
	<meta name="description" content="Mega Libreria Online" />

	<!-- title  -->
	<title>Mega Libreria</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="<?=base_url("assets/img/logos/favicon.png")?>">
	<link rel="apple-touch-icon" href="<?=base_url("assets/img/logos/apple-touch-icon-57x57.png")?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url("assets/img/logos/apple-touch-icon-72x72.png")?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url("assets/img/logos/apple-touch-icon-114x114.png")?>">

	<!-- favicon -->
	<link rel="shortcut icon" href="<?=base_url("assets/")?>img/logos/favicon.png">
	<link rel="apple-touch-icon" href=<?=base_url("assets/")?>"img/logos/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url("assets/")?>img/logos/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url("assets/")?>img/logos/apple-touch-icon-114x114.png">

	<!-- plugins -->
	<link rel="stylesheet" href="<?=base_url("assets/")?>css/plugins.css">

	<!-- custom css -->
	<link href="<?=base_url("assets/")?>css/styles.css" rel="stylesheet">

</head>

<body>

<!-- start page loading -->
<div id="preloader">
	<div class="row loader">
		<div class="loader-icon"></div>
	</div>
</div>
<!-- end page loading -->

<!-- start main-wrapper section -->
<div class="main-wrapper">

	<!-- start 404 page section -->
	<section class="full-screen bg-img cover-background text-center no-padding background-position-x-60" data-overlay-dark="0" data-background="<?=base_url("assets/")?>img/bg/bg-1.jpg">
		<div class="container height-100vh">

			<div class="row align-items-center height-100">
				<div class="col-md-12">

					<div class="page-container">
						<p class="alt-font font-weight-700 title text-extra-dark-gray">404</p>
						<h2 class="font-size40 xs-font-size22 margin-30px-bottom text-dark-gray">Página no encontrada</h2>

						<a href="<?=base_url("")?>" class="butn-style2 margin-5px-all"><span><i class="fas fa-arrow-left margin-10px-right"></i>Volver al inicio</span></a>
						<a href="<?=base_url("contacto")?>" class="butn-style2 margin-5px-all"><span>Contactanos<i class="fas fa-arrow-right margin-10px-left"></i></span></a>
					</div>

					<div class="margin-50px-top sm-margin-25px-top">
						<div class="col-12">
							&copy; <?=date("Y")?> Mega Libreria
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- end 404 page section -->

</div>
<!-- end main-wrapper section -->

<!-- start scroll to top -->
<a href="#" class="scroll-to-top"><i class="fas fa-paw" aria-hidden="true"></i></a>
<!-- end scroll to top -->

<!-- all js include start -->

<!-- jQuery -->
<script src="<?=base_url("assets/")?>js/jquery.min.js"></script>
<script src="<?=base_url("assets/")?>js/jquery-migrate.min.js"></script>

<!-- Java script -->
<script src="<?=base_url("assets/")?>js/core.min.js"></script>

<!-- custom scripts -->
<script src="<?=base_url("assets/")?>js/main.js"></script>

<!-- all js include end -->

</body>

</html>

