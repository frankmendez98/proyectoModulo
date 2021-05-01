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
	<title>Tu Digital Market</title>

	<!-- App favicon -->
	<link href="<?=base_url();?>assets/img/logo.png" rel="icon" type="image/png">

	<!-- plugins -->
	<link rel="stylesheet" href="<?=base_url("assets/css/plugins.css")?>">

	<!-- revolution slider css -->
	<link rel="stylesheet" href="<?=base_url("assets/css/rev_slider/settings.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/rev_slider/layers.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/rev_slider/navigation.css")?>">
	<link href="<?= base_url(); ?>assets/libs/izitoast/iziToast.min.css" rel="stylesheet" type="text/css" />

	<!-- custom css -->
	<link href="<?=base_url("assets/css/styles.css")?>" rel="stylesheet">

	<?php if (isset($css)) : ?>
		<?php foreach ($css as $extra => $url) : ?>
			<link href="<?= base_url("assets/$url"); ?>" rel="stylesheet" type="text/css" />
		<?php endforeach; ?>
	<?php endif; ?>

</head>
