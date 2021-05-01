<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- start footer section -->
<footer>

	<div class="container">
		<div class="row">

			<div class="col-lg-4 col-md-6 sm-margin-50px-bottom xs-margin-30px-bottom">
				<?php foreach ($confa as $suc): ?>
				<!--<img alt="footer-logo" src="img/logos/logo-footer.png" class="margin-30px-bottom">-->
				<ul class="footer-list">
					<li>
						<span class="d-inline-block vertical-align-top font-size18"><i class="fas fa-map-marker-alt text-theme-color"></i></span>
						<span class="d-inline-block width-85 vertical-align-top padding-10px-left"><?=$suc->direccion ?></span>
					</li>
					<?php if($suc->telefono1 != ""): ?>
					<li>
						<span class="d-inline-block vertical-align-top font-size18"><i class="fas fa-mobile-alt text-theme-color"></i></span>
						<span class="d-inline-block width-85 vertical-align-top padding-10px-left"><?=$suc->telefono1 ?></span>
					</li>
					<?php endif; ?>
					<?php if($suc->whatsapp != ""): ?>
					<li>
						<span class="d-inline-block vertical-align-top font-size18"><i class="fab fa-whatsapp text-theme-color"></i></span>
						<span class="d-inline-block width-85 vertical-align-top padding-10px-left"><?=$suc->whatsapp?></span>
					</li>
				<?php endif; ?>
				</ul>
				<hr style="border-color:#363637; width:50%;" >
			<?php endforeach; ?>

				<div class="footer-social-icons small margin-20px-top">
					<ul>
						<li><a href="<?=$conf->facebook?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="<?=$conf->twitter?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="<?=$conf->instagram?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 xs-margin-30px-bottom">
				<h3 class="footer-title-style2 text-white">Información</h3>
				<ul class="footer-list">
					<li><a href="<?=base_url("nosotros")?>">Nosotros</a></li>
					<li><a href="<?=base_url("sucursales")?>">Sucursales</a></li>
					<li><a href="<?=base_url("contacto")?>">Contactanos</a></li>
				</ul>
			</div>

			<div class="col-lg-4 col-md-6">
				<h3 class="footer-title-style2 text-white">Mi Cuenta</h3>
				<ul class="footer-list">
					<li><a href="<?=base_url("perfil")?>">Mi Perfil</a></li>
					<li><a href="<?=base_url("ordenes")?>">Historial de Ordenes</a></li>
					<li><a href="<?=base_url("lista_deseos")?>">Lista de deseos</a></li>
				</ul>
			</div>

		</div>
	</div>

	<div class="footer-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 xs-margin-15px-bottom">
					<div class="xs-text-center">
						<p class="xs-font-size13">&copy; <?=date("Y")?> <a href="https://opensolutionsystems.com/" style="color: #03a9f5">Open Solutions Systems</a></p>
					</div>
				</div>
				<div class="col-md-6">
					<ul class="list-style-17 text-right sm-text-center">
						<li><img src="<?=base_url("assets/img/content/payment-options/pagadito2.png")?>" style="height:25px;" class="img-fluid" alt="..."></li>
						<li><img src="<?=base_url("assets/img/content/payment-options/visa.png")?>" class="img-fluid" alt="..."></li>
						<li><img src="<?=base_url("assets/img/content/payment-options/mastercard.png")?>" class="img-fluid" alt="..."></li>
						<!--<li><img src="<?php //base_url("assets/img/content/payment-options/discover.png")?>" class="img-fluid" alt="..."></li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>

</footer>
<!-- end footer section -->
