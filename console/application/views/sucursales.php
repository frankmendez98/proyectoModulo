<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="page-title-section bg-img cover-background" data-background="assets/img/bg/bg.jpg"
		 style="background-image: url(assets/img/bg/page-title.jpg);">
	<div class="container">

		<div class="title-info">
			<h1>Sucursales</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?= base_url("") ?>">Inicio</a></li>
				<li><a href="<?= base_url("sucursales") ?>">Sucursales</a></li>
			</ul>
		</div>

	</div>
</section>

<section>
	<div class="container">

		<div class="row justify-content-center">

			<?php foreach ($row as $suc): ?>
				<div class="col-lg-5 col-md-6 xs-margin-30px-bottom">

					<div class="store-details">
						<div class="info-box">
							<h5 class="font-size22 md-font-size20 sm-font-size18"><?=$suc->descripcion?></h5>
							<ul class="no-margin-bottom">
								<li class="margin-25px-bottom">
									<div class="d-flex">
										<div class="info-icon">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<div class="padding-20px-left">
											<h6 class="info-label">Encuéntranos</h6>
											<a href="#"><?=$suc->direccion?></a>
										</div>
									</div>
								</li>
								<li class="margin-25px-bottom">
									<div class="d-flex">
										<div class="info-icon">
											<i class="fas fa-mobile-alt"></i>
										</div>
										<div class="padding-20px-left">
											<h6 class="info-label">Llámanos</h6>
											<a href="#"><?=$suc->telefono1?></a>
										</div>
									</div>
								</li>
								<li class="margin-25px-bottom">
									<div class="d-flex">
										<div class="info-icon">
											<i class="fab fa-whatsapp"></i>
										</div>
										<div class="padding-20px-left">
											<h6 class="info-label">WhatsApp</h6>
											<a href="https://api.whatsapp.com/send?phone=<?=$suc->whatsapp?>"><?=$suc->whatsapp?></a>
										</div>
									</div>
								</li>
							</ul>

						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>

	</div>
</section>
