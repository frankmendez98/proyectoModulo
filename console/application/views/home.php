<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="links-div">
	<a href="<?= $confs->imagen ?>" data-gallery id="mainimage"></a>
</div>

<div id="carouselExampleIndicators" class="carousel slide border_shadow_carousel" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner text-center">
		<?php
			$n = 1;
			foreach($detalle as $row)
			{
				$descripcion = $row['descripcion'];
				$img = $row['img'];
				$titulo = $row['titulo'];
				$color = $row['color'];
				// $subtotal = number_format(round($cantidad * $precio, 2), 2,'.',',');
				// echo "<tr>";
				// echo "<td>".$descripcion."</td>";
				// echo "<td style='text-align:right;'>$".number_format($precio,2,'.',',')."</td>";
				// echo "<td style='text-align:right;'>".$cantidad."</td>";
				// echo "<td style='text-align:right;'>$".$subtotal."</td>";
				// echo "</tr>";
				if($n == 1)
				{
				?>
				<div class="carousel-item active">
					<img class="img_responsive" src="<?=base_url("assets/".$img."")?>" alt="Third slide">
					<div class="carousel-caption d-none d-md-block">
						<h2 class="font_responsive" style="<?php echo $color;?>"><?php echo $titulo; ?></h2>
						<p class="font_responsive_p" style="<?php echo $color; ?>font-size: 18px"><?php echo $descripcion ?></p>
					</div>
				</div>
				<?php
					}
					else
					{
					?>
					<div class="carousel-item">
						<img class="img_responsive" src="<?=base_url("assets/".$img."")?>" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h2 class="font_responsive" style='<?php echo $color;?>'><?php echo $titulo; ?></h2>
							<p class="font_responsive_p" style="<?php echo $color; ?>font-size: 18px"><?php echo $descripcion ?></p>
						</div>
					</div>
					<?php
					}
					$n += 1;
				}
		?>
		<!-- <div class="carousel-item active">
			<img class="d-block img_responsive" src="<?=base_url("assets/img/slider/mega.png")?>" alt="First slide">
		</div>
		<div class="carousel-item">
			<img class="img_responsive" src="<?=base_url("assets/img/slider/libreria.jpg")?>" alt="Second slide">
			<div class="carousel-caption d-none d-md-block">
				<h2 class="font_responsive" style="color: #000000">Tenemos lo que nececesitas</h2>
			</div>
		</div>
		<div class="carousel-item">
			<img class="img_responsive" src="<?=base_url("assets/img/slider/tablet.jpg")?>" alt="Third slide">
			<div class="carousel-caption d-none d-md-block">
				<h2 class="font_responsive" style="color: #38bbf7">Las Mejores ofertas</h2>
				<p class="font_responsive_p" style="color: #38bbf7;font-size: 18px">Mega Libreria</p>
			</div>
		</div> -->
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


<!-- start revolution slideshow-->
<!--<div class="rev_slider_wrapper mb-3">
	<div class="rev_slider" id="rev_slider_1" data-version="5.4.5">
		<ul>

			 <li data-fstransition="fade" data-transition="scaledownfrombottom" data-easein="default" data-easeout="default" data-slotamount="1" data-masterspeed="1200"
				data-delay="8000" data-title="Slide 1">

				 				<img src="<?/*=base_url("assets/img/slider/mega.png")*/?>" alt="..." data-bgrepeat="no-repeat" data-bgfit="contain" data-bgparallax="7" class="rev-slidebg">

			</li>
			 <li data-fstransition="fade" data-transition="scaledownfrombottom" data-easein="default" data-easeout="default" data-slotamount="1" data-masterspeed="1200"
				data-delay="8000" data-title="Slide 2">

				 				<img src="<?/*=base_url("assets/img/slider/tablet.jpg")*/?>" alt="..." data-bgrepeat="no-repeat" data-bgfit="cover" data-bgparallax="7" class="rev-slidebg">

				 ->
				<div class="tp-caption highlight-font" style="color: #b71540;" data-x="30" data-y="center" data-voffset="[-135,-120,-115,-128]"
					 data-fontsize="[36,34,32,30]" data-lineheight="34" data-width="[600, 500, 400, 300]" data-whitespace="[nowrap, nowrap, nowrap, normal]" data-frames='[{
                                    "delay":1000,
                                    "speed":900,
                                    "frame":"0",
                                    "from":"y:150px;opacity:0;",
                                    "ease":"Power3.easeOut",
                                    "to":"o:1;"
                                    },{
                                    "delay":"wait",
                                    "speed":1000,
                                    "frame":"999",
                                    "to":"opacity:0;","ease":"Power3.easeOut"
                                }]'>
					<p class="white-space">Mega Libreria</p>
				</div>

				 				<div class="tp-caption hero-text alt-font font-weight-600 " data-x="30" data-y="center" data-voffset="[-25,-10,-10,-20]"
					 data-fontsize="[72,62,52,46]" data-lineheight="[76,72,64,58]" data-width="[none, none, none, 300]"
					 data-whitespace="[nowrap, nowrap, nowrap, normal]" data-frames='[{"delay":1100,"speed":900, "frame":"0",
                                    "from":"y:150px;opacity:0;",
                                    "ease":"Power3.easeOut",
                                    "to":"o:1;"
                                    },{
                                    "delay":"wait",
                                    "speed":1000,
                                    "frame":"999",
                                    "to":"opacity:0;","ease":"Power3.easeOut"
                                }]' data-splitout="none" style="color: #FFFFFF">Las mejores
					<br> ofertas!
				</div>

				 <div class="tp-caption" data-x="35" data-y="center" data-voffset="[110,125,115,125]" data-lineheight="55"
					 data-hoffset="0" data-frames='[{
                                        "delay":1200,
                                        "speed":900,
                                        "frame":"0",
                                        "from":"y:150px;opacity:0;",
                                        "ease":"Power3.easeOut",
                                        "to":"o:1;"
                                        },{
                                        "delay":"wait",
                                        "speed":1000,
                                        "frame":"999",
                                        "to":"opacity:0;","ease":"Power3.easeOut"
                                    }]'>
					<a href='<?/*=base_url("catalogo")*/?>' class='butn-style1 fill large'>
						<span>Compra ahora</span>
					</a>
				</div>

			</li>


			 <li data-transition="scaledownfrombottom" data-easein="default" data-easeout="default" data-slotamount="1" data-masterspeed="1200" data-delay="8000" data-title="Slide 3">

				 				<img src="<?/*=base_url("assets/img/slider/libreria.jpg")*/?>" alt="..." data-bgrepeat="no-repeat" data-bgfit="cover" data-bgparallax="7" class="rev-slidebg">

				 ->
				<div class="tp-caption highlight-font" style="color: #b71540;" data-x="30" data-y="center" data-voffset="[-135,-120,-115,-128]" data-fontsize="[36,34,32,30]" data-lineheight="34" data-width="[600, 500, 400, 300]" data-whitespace="[nowrap, nowrap, nowrap, normal]" data-frames='[{
                                    "delay":1000,
                                    "speed":900,
                                    "frame":"0",
                                    "from":"y:150px;opacity:0;",
                                    "ease":"Power3.easeOut",
                                    "to":"o:1;"
                                    },{
                                    "delay":"wait",
                                    "speed":1000,
                                    "frame":"999",
                                    "to":"opacity:0;","ease":"Power3.easeOut"
                                }]'>
					<p class="white-space">A tu alcance</p>
				</div>

				 				<div class="tp-caption hero-text alt-font font-weight-600" data-x="30" data-y="center"  style="color: #000000"
					 data-voffset="[-25,-10,-10,-20]" data-fontsize="[72,62,52,46]" data-lineheight="[76,72,64,58]"
					 data-width="[none, none, none, 300]" data-whitespace="[nowrap, nowrap, nowrap, normal]" data-frames='[{
                                    "delay":1100,
                                    "speed":900,
                                    "frame":"0",
                                    "from":"y:150px;opacity:0;",
                                    "ease":"Power3.easeOut",
                                    "to":"o:1;"
                                    },{
                                    "delay":"wait",
                                    "speed":1000,
                                    "frame":"999",
                                    "to":"opacity:0;","ease":"Power3.easeOut"
                                }]' data-splitout="none">Tenemos todo
					<br>lo que necesitas
				</div>

				 <div class="tp-caption" data-x="35" data-y="center" data-voffset="[110,125,115,125]" data-lineheight="55" data-hoffset="0" data-frames='[{
                                        "delay":1200,
                                        "speed":900,
                                        "frame":"0",
                                        "from":"y:150px;opacity:0;",
                                        "ease":"Power3.easeOut",
                                        "to":"o:1;"
                                        },{
                                        "delay":"wait",
                                        "speed":1000,
                                        "frame":"999",
                                        "to":"opacity:0;","ease":"Power3.easeOut" }]'>
					<a href='<?/*=base_url("catalogo")*/?>' class='butn-style1 fill large'><span>Compra ahora</span></a>
				</div>

			</li>


		</ul>
	</div>
</div>-->
<!-- end revolution slideshow-->
<!-- start categories section -->
<section style="padding: 50px 0">
	<div class="container">
		<div class="text-center margin-40px-bottom sm-margin-35px-bottom">
			<h3 class="no-margin-bottom">Categorías</h3>
		</div>
		<div class="featured-product owl-carousel owl-theme">

<!--		<div class="row justify-content-center">-->
			<?php foreach ($cats as $row): ?>
				<div class="col margin-30px-bottom">
					<div class="product-grid">

				<div class="sm-margin-30px-bottom item-div">
					<a href="<?=base_url("catalogo/cat/").$row->param;?>">
						<img class="rounded" src="<?=base_url("assets/".$row->imagen)?>" alt="Imagen-Categoria">
					</a>
					<h5 class="margin-20px-top sm-margin-15px-top margin-10px-bottom sm-margin-5px-bottom font-size16 xs-font-size15 letter-spacing-1 text-uppercase">
						<a href="<?=base_url("catalogo/cat/").$row->param;?>"> <?=$row->nombre_cat?></a></h5>
				</div>
				</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- end categories section -->

<!-- start featured product section -->
<section style="padding: 30px 0">
	<div class="container">
		<div class="text-center margin-40px-bottom sm-margin-35px-bottom">
			<h3 class="no-margin-bottom">Productos Destacados</h3>
		</div>
		<div class="featured-product owl-carousel owl-theme">

			<?php foreach($rows as $row):
				if($row->thumb1!="") $rutaImgProd=base_url("assets/").$row->thumb1;
				else if ($row->imagen!="") $rutaImgProd=base_url("assets/").$row->imagen;
				else $rutaImgProd=base_url("assets/img/productos/no_disponible.png");
				?>
				<div class="col margin-30px-bottom">
					<div class="product-grid">
						<div class="product-img">
							<a href="<?=base_url('producto/'.md5($row->id_producto))?>">
								<div class="label-offer">Comprar! </div>
								<div class="img-prod-cat">
									<img src="<?= $rutaImgProd; ?>" />
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
								<!--span class="regular-price line-through">$<?php echo $producto['precio']?></span-->
								<?php if($row->talla){ $max=0;  ?>
								<a href="<?=base_url('producto/'.md5($row->id_producto))?>">	<span class="text-success">Ver tallas</span></a>
								<?php } else {  ?>
								<?php if($row->stock>0){ $max = number_format($row->stock); $min=1; ?>
								<a href="<?=base_url('producto/'.md5($row->id_producto))?>">	<span class="text-success">En existencia: <?php echo number_format($row->stock,0); ?></span></a>
							<?php } else { $min = 0;  $max=0; ?>
								<span class="text-danger">Agotado</span>
							<?php } ?>
							</h4>
						<?php } } else { salto(1);  }?>
							<h4 class="price">
								<!--span class="regular-price line-through">$<?php echo $producto['precio']?></span-->
								<span class="regular-price">$ <?php echo number_format($row->precio,2)?></span>

							</h4>
						</div>
						<div class="row justify-content-center botones">
							<div class="col-sm-6 offset-1">
								<input class='quantity' <?php if($max > 0){  } else { echo "hidden"; } ?> type="number" name="quantity" id="<?=$row->id_producto?>" value="<?=$min?>" min="<?=$min?>" max="<?=$max?>" />
							</div>
							<div class="col-sm-4">
								<div class="row">
									<div class="col-6 text-left" style="padding-left: 0px">
										<?php if($max > 0): ?>
										<a class="add_cart btn btn-link" style="color: #03a9f5; font-size: 22px;" data-productid="<?=$row->id_producto?>"
											data-productname="<?=$row->descripcion?>" data-productimage="<?=$rutaImgProd?>"
											data-productprice="<?=$row->precio;?>">
											<i class="fas fa-shopping-cart"></i>
										</a>
									<?php endif; ?>
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
<!-- end featured product section -->

<!-- start services section -->
<section style="padding: 30px 0">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-4 xs-margin-25px-bottom">
				<div class="border padding-25px-all sm-padding-25px-tb sm-padding-15px-lr h-100">
					<i class="ti-headphone-alt font-size34"></i>
					<h5 class="font-size17 sm-font-size16 letter-spacing-1 margin-15px-tb">Soporte 24/7</h5>
					<p class="width-80 sm-width-95 center-col no-margin-bottom">Contactanos si tienes algun problema con la plataforma.</p>
				</div>
			</div>
			<div class="col-md-4 xs-margin-25px-bottom">
				<div class="border padding-25px-all sm-padding-25px-tb sm-padding-15px-lr h-100">
					<i class="ti-money font-size34"></i>
					<h5 class="font-size17 sm-font-size16 letter-spacing-1 margin-15px-tb">Tu dinero garantizado</h5>
					<p class="width-80 sm-width-95 center-col no-margin-bottom">No te preocupes por la seguridad de tu dinero, contamos con pagos seguros</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="border padding-25px-all sm-padding-25px-tb sm-padding-15px-lr h-100">
					<i class="ti-truck font-size34"></i>
					<h5 class="font-size17 sm-font-size16 letter-spacing-1 margin-15px-tb">Envios en San Miguel</h5>
					<p class="width-80 sm-width-95 center-col no-margin-bottom">Realizamos envios en zonas centricas de San Miguel</p>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev">‹</a>
	<a class="next">›</a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
	<input type="hidden" id="yaimg" value="<?= $ya ?>">
</div>
<!-- end service section -->
