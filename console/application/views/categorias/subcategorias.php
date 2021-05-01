<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="page-title-section bg-img cover-background" data-background="/assets/img/bg/bg.jpg"
		 style="background-image: url(assets/img/bg/page-title.jpg);">
	<div class="container">

		<div class="title-info">
			<h1>Sub Categorias</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?=base_url("")?>">Inicio</a></li>
				<li><a href="<?=base_url("subcategorias/").$param ?>">Sub Categorias</a></li>
			</ul>
		</div>

	</div>
</section>

<section>
	<div class="container">
		<div class="row">

			<!-- start right panel section -->
			<div class="col-lg-12 col-12 padding-30px-left md-padding-15px-lr order-1 order-lg-2 sm-margin-35px-bottom">


				<div class="inner-title">
					<p class="no-margin-bottom">Busca productos mediante las siguiente subcategorias.</p>
				</div>

				<div class="row margin-50px-bottom">
					<div class="col-md-12">

						<div class="row height-100">

							<?php foreach ($cats as $row): ?>
								<div class="col-lg-3 col-md-6 margin-20px-bottom">
									<div class="product-card">
										<a href="<?=base_url("catalogo/subcat/").$row->param;?>" class="product-card-img">
											<div class="inner">
												<div class="main-img">
													<img src="<?=base_url("assets/".$row->imagen)?>" alt="Imagen-categoria">
												</div>
											</div>
										</a>
										<div class="product-card-detail">
											<h3 class="no-margin-bottom"><a href="<?=base_url("catalogo/subcat/").$row->param;?>"><?=$row->nombre_cat?></a></h3>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

						</div>

					</div>
				</div>


			</div>
			<!-- end right panel section -->

		</div>
	</div>
</section>
