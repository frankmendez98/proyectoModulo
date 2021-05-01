<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
	<div class="container">

		<!-- Start Product Section -->
		<div class="row margin-90px-bottom md-margin-70px-bottom sm-margin-50px-bottom">

			<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
				<div class="slides"></div>
				<h3 class="title"></h3>
				<a class="prev">‹</a>
				<a class="next">›</a>
				<a class="close">×</a>
				<a class="play-pause"></a>
				<ol class="indicator"></ol>
			</div>

			<div class="col-lg-5 sm-text-center sm-margin-30px-bottom">
				<?php

				$rutaImgProd=base_url("assets/".$row->imagen);
				if ($row->imagen=="") $rutaImgProd=base_url("assets/img/productos/no_disponible.png");
				?>

				<?php //if($row->img2=="" && $row->img3=="" && $row->img4==""): ?>
					<!--<img class="d-block img-fluid" src="<?php //$rutaImgProd?>" alt="Producto Imagen">-->
				<?php //else: ?>
					<div id="carouselExampleIndicators" class="carousel slide border_shadow_carousel" data-ride="carousel">

						<div class="carousel-inner" id="links-div">

							<div class="carousel-item active">
								<a href="<?=$rutaImgProd?>" data-gallery>
									<img class="d-block img-fluid" src="<?=$rutaImgProd?>" alt="Producto Imagen">
								</a>
							</div>

							<?php if($row->img2!=""): ?>
								<div class="carousel-item">
									<a href="<?=base_url("assets/".$row->img2)?>" data-gallery>
										<img class="img-fluid" src="<?=base_url("assets/".$row->img2)?>" alt="Producto Imagen">
									</a>
								</div>
							<?php endif; ?>

							<?php if($row->img3!=""): ?>
								<div class="carousel-item">
									<a href="<?=base_url("assets/".$row->img3)?>" data-gallery>
										<img class="img-fluid" src="<?=base_url("assets/".$row->img3)?>" alt="Producto Imagen">
									</a>
								</div>
							<?php endif; ?>

							<?php if($row->img4!=""): ?>
								<div class="carousel-item">
									<a href="<?=base_url("assets/".$row->img4)?>" data-gallery>
										<img class="img-fluid" src="<?=base_url("assets/".$row->img4)?>" alt="Producto Imagen">
									</a>
								</div>
							<?php endif; ?>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>
				<?php //endif; ?>
			</div>

			<div class="col-lg-7 padding-40px-left sm-padding-15px-lr">
				<div class="product-detail">
					<h2 class="margin-8px-bottom"><?=$row->descripcion?></h2>
					<div class="bg-theme separator-line-horrizontal-full margin-20px-bottom"></div>
					<p class="rating-text"><span class="font-500 theme-color"><?php if($row->barcode!="") echo $row->barcode?></span></p>
					<p><?php if($row->desc_larga!="") echo $row->desc_larga ?></p>
					<?php $min=1; $max=1000; if($row->tipo_producto == "FISICO"){ ?>
					<div class="margin-20px-bottom">
						<?php if($row->talla){  ?>
							<span class="font-size18 font-weight-500 text-theme-color">Talla</span>
							<select class='form-control select' id_producto="<?= $row->id_producto ?>" id="talla" style="width:125px;">
										<option value="">Seleccione</option>
								<?php foreach ($tallas as $talla): ?>
									<?php echo "<option value='".$talla->id_talla."'>".$talla->talla."</option>"; ?>
								<?php endforeach; ?>
							</select><br>
						<?php $max = 0; $min =0;} else { if($row->stock>0){ $max=number_format($row->stock,0); ?>
						<span class="text-success">En existencia: <?php echo number_format($row->stock,0); ?></span>
					<?php } else { $min =0; $max=0; ?>
						<span class="text-danger">Agotado</span>
					<?php } ?>
					</div>
				<?php } } ?>
					<div class="margin-20px-bottom">
						<span class="font-size24 font-weight-700 text-theme-color">$<?=number_format($row->precio,2,".",",")?></span>
					</div>

					<div class="margin-20px-bottom" id="stock_si" hidden>
						<span class="text-success" id="stocksi_txt"></span>
					</div>
					<div class="margin-20px-bottom" id="stock_no" hidden>
						<span class="text-danger">Agotado</span>
					</div>
					<div class="row">
						<div class="col-4 col-lg-2">
							<label>Cantidad:</label>
							<input type="number" placeholder="<?php echo $min; ?>"  <?php if($max > 0){  } else { echo "hidden"; } ?>  value="<?=$min?>" max="<?=$max?>" min="<?=$min?>" class="form-control medium margin-20px-bottom qty_product" id="qty_product" style="width:125px;">
						</div>

					</div>

					<div class="row margin-20px-bottom">
						<div class="col-lg-12">
							<button class="butn-style2 margin-15px-right xs-margin-10px-bottom add_cart" data-productid="<?=$row->id_producto;?>"
									data-productname="<?=$row->descripcion;?>" data-productnameadd="" data-talla="0" data-productimage="<?=$rutaImgProd;?>"
									data-productprice="<?=$row->precio;?>" <?php if($max > 0){  } else { echo "hidden"; } ?> id="moscar">
								<span><i class="fas fa-shopping-cart margin-5px-right"></i> Agregar al carrito</span>
							</button>

							<?php if($wish==1): ?>
								<button class="butn-style2 dark remove_wish" data-productid="<?=$row->id_producto;?>">
									<span><i class="fas fa-heart margin-5px-right"></i> Agregado a lista de deseos</span>
								</button>
							<?php else: ?>
								<button class="butn-style2 dark add_wish" data-productid="<?=$row->id_producto;?>">
									<span><i class="fas fa-heart margin-5px-right"></i> Agregar a lista de deseos</span>
								</button>
							<?php endif; ?>

						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Product Section -->


		<!-- start related product -->
		<div class="inner-title">
			<h3 class="no-margin-bottom">Productos Relacionados</h3>
		</div>

		<div class="featured-product owl-carousel owl-theme">

			<?php foreach($rows as $row):
				$rutaImgProd=base_url("assets/").$row->imagen;
				if ($row->imagen=="") $rutaImgProd=base_url("assets/")."img/productos/no_disponible.png";
				?>
				<div class="col margin-30px-bottom">
					<div class="product-grid">
						<div class="product-img">
							<a href="<?=base_url('producto/'.md5($row->id_producto))?>">
								<div class="label-offer">Comprar! </div>
								<div class="img-prod-cat">
									<img src="<?= $rutaImgProd ?>" />
								</div>
							</a>
						</div>
						<div class="product-description">
							<a href="<?=base_url('producto/'.md5($row->id_producto))?>">
								<?php
								$desc_array=divtextlin(trim($row->descripcion),24,4);
								$tmplinea = array();
								$n=0;
								foreach($desc_array as $total_txt1){
									echo $total_txt1."<br>";
									$n++;
								}
								if($n<=4){
									salto(4,$n);
								}
								?>
							</a>
							<?php if($row->tipo_producto == "FISICO"){ ?>
							<h4 class="price">
								<!--span class="regular-price line-through">$<?php echo $row->precio; ?></span-->
								<?php if($row->talla){ $max=0;  ?>
									<a href="<?=base_url('producto/'.md5($row->id_producto))?>">	<span class="text-success">Ver tallas</span></a>
								<?php } else {  ?>
								<?php if($row->stock>0){ $max = number_format($row->stock); ?>
								<a href="<?=base_url('producto/'.md5($row->id_producto))?>">	<span class="text-success">En existencia: <?php echo number_format($row->stock,0); ?></span></a>
							<?php } else { $min = 0;  $max=0; ?>
								<span class="text-danger">Agotado</span>
							<?php } ?>
							</h4>
						<?php } } else { salto(1,2);  }?>
						<h4 class="price">
							<!--span class="regular-price line-through">$<?php echo $producto['precio']?></span-->
							<span class="regular-price">$ <?php echo number_format($row->precio,2)?></span>

						</h4>
						</div>
						<div class="row justify-content-center botones">
							<div class="col-sm-6 offset-1">
								<input <?php if($max > 0){  } else { echo "hidden"; } ?> class='quantity' type="number" name="quantity" id="<?=$row->id_producto;?>" value="1" readonly/>
							</div>
							<div class="col-sm-4">
								<div class="row">
									<div class="col-6 text-left" style="padding-left: 0px">

									 <div <?php if($max > 0){  } else { echo "hidden"; } ?>>
											<a class="add_cart btn btn-link" style="color: #03a9f5; font-size: 22px;" data-productid="<?=$row->id_producto;?>"
										   data-productname="<?=$row->descripcion;?>" data-productimage="<?=$rutaImgProd;?>"
										   data-productprice="<?=$row->precio;?>">
											<i class="fas fa-shopping-cart"></i>
										</a>
									</div>
									</div>
									<div class="col-6 text-center" style="padding-left: 0px">
										<a class="add_wish btn btn-link" title="A Lista de Deseos" style="color:#ff0000;font-size: 22px;"
										   data-productid="<?=$row->id_producto;?>"><i class="far fa-heart"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>

		</div>



	</div>
</section>
