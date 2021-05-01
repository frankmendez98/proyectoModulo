<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-9">
		<br>
		<h3>Bienvenido, <?= $this->session->usuario; ?></h3>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">

		<div class="col-lg-3">
			<a href="<?= base_url("admin/productos") ?>">
				<div class="widget style1 lazur-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-cubes fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Gestionar </span>
							<h3 class="font-bold">Productos</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-lg-3">
			<a href="<?= base_url("admin/categorias") ?>">
				<div class="widget style1 yellow-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-list-alt fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Gestionar </span>
							<h3 class="font-bold">Categorias</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-lg-3">
			<a href="<?= base_url("admin/pedidos") ?>">
				<div class="widget style1 red-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Gestionar </span>
							<h3 class="font-bold">Pedidos</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-lg-3">
			<a href="<?= base_url("admin/configuracion") ?>">
				<div class="widget style1 navy-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-cogs fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Administrar </span>
							<h3 class="font-bold">Configuracion</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

	</div>

	<div class="row">

		<div class="col-lg-3">
			<a href="<?= base_url("admin/usuarios") ?>">
				<div class="widget style1 navy-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Gestionar </span>
							<h3 class="font-bold">Usuarios</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-lg-3">
			<a href="<?= base_url("admin/productos_destacados") ?>">
				<div class="widget style1 red-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-star fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Gestionar </span>
							<h3 class="font-bold">Productos destacados</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-lg-3">
			<a href="<?= base_url("admin/edicion_pagina") ?>">
				<div class="widget style1 lazur-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-edit fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Editar </span>
							<h3 class="font-bold">Sitio Web</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-lg-3">
			<a href="<?= base_url("admin/reporte_ventas") ?>">
				<div class="widget style1 yellow-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-file-pdf-o fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Visualizar </span>
							<h3 class="font-bold">Reportes de Ventas</h3>
						</div>
					</div>
				</div>
			</a>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title red-bg">
					<h5 style="color:#FFF;">Ingresos por mes</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up" style="color:#FFF;"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content" style="margin-top: 1.8px;">
					<div>
						<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
						<canvas id="graph_ingresos_mes" style="width: 873px; height: 440px; display: block;" width="873" height="440"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title lazur-bg">
					<h5 style="color:#FFF;">Cantidad de Ordenes</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up" style="color:#FFF;"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content" style="margin-top: 1.8px;">
					<div>
						<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
						<canvas id="graph_ordenes_mes" style="width: 873px; height: 440px; display: block;" width="873" height="440"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="ibox float-e-margins">
				<div class="ibox-title navy-bg">
					<h5 style="color:#FFF;">Productos mas vendidos</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up" style="color:#FFF;"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content" style="margin-top: 1.8px;">
					<div>
						<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
						<canvas id="graph_productos_vendidos" style="width: 873px; height: 440px; display: block;" width="873" height="440"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="<?=base_url("assets/admin/js/funciones/")?><?= $urljs; ?>"></script>
