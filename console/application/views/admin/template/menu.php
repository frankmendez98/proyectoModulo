<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div id="wrapper">
	<nav class="navbar-default navbar-static-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav" id="side-menu">
				<li class="nav-header">
					<div class="dropdown profile-element">
						<span>
						  <img alt="image" class="logo1" id='logo_menu' src="<?php echo base_url($logo); ?>"   style="width:100%; margin-left:-3%; margin-top: 3px;"/>
						</span>
					</div>
					<div class="logo-element">
						Mega Libreria
					</div>
				</li>
				<li><a href="<?= base_url(); ?>admin/dashboard" style='color:white;'><i class="fa fa-home"></i><span class='nav-label'>Inicio</span></a></li>
				<?php if(isset($menus)): ?>
					<?php foreach ($menus as $menu): ?>
						<li><a style='color:white;'><i class="<?= $menu->icono; ?>"></i></i> <span class='nav-label'><?= $menu->nombre; ?></span> <span class='fa arrow'></span></a>
							<ul class='nav nav-second-level'>
								<?php foreach ($modulos[$menu->id_menu] as $modulo):?>
									<li><a href="<?= base_url() . $modulo->filename; ?>"><?= $modulo->nombre; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	</nav>

	<div id="page-wrapper" class="gray-bg">
		<div class="row border-bottom">
			<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;">
				<div class="navbar-header">
					<a class="navbar-minimalize minimalize-styl-2 btn btn-primary"><i class="fa fa-bars"></i> </a>
				</div>
				<ul class="nav navbar-top-links navbar-right">

					<li>
						<br><span class="m-r-sm text-muted welcome-message"><b><?= $nombre_session; ?></b></span>
					</li>
					<li>
						<a href="<?= base_url("admin/login/logout"); ?>" class="font-bold">
							<i class="fa fa-sign-out"></i> Cerrar Sesion</span>
						</a>
					</li>
				</ul>

			</nav>
		</div>
