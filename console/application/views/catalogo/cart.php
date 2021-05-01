<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('utilities_helper');
$rutaProd= base_url()."assets/";
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_cart.css" >


<!-- start page title section -->
<section class="page-title-section bg-img cover-background" data-background="<?=base_url("assets/img/bg/bg.jpg")?>">
	<div class="container">

		<div class="title-info">
			<h1>Carrito</h1></div>
			<div class="breadcrumbs-info">
				<ul>
					<li><a href="<?php echo base_url("home")?>">Home</a></li>
					<li><a href="<?php echo base_url("catalogo/cart")?>">Carrito</a></li>
				</ul>
			</div>

		</div>
	</section>
	<!-- end page title section -->

	<!-- start cart table section -->
	<section>
		<div class="container">


			<div class="row">
				<!--Start Product Table -->
				<div class="col-12 shop-cart-table">
					<table class="table shop-cart text-center table-responsive-sm" id="shop-cart-det">

						<thead>
							<tr>
								<th class="first head_first"></th>
								<th class="text-left text-uppercase font-weight-500">Items</th>
								<th class="text-center text-uppercase font-weight-500 head_first">Precio</th>
								<th class="text-center text-uppercase font-weight-500">Cantidad</th>
								<th class="text-center text-uppercase font-weight-500 head_first">Subtotal</th>
								<th class="text-center text-uppercase font-weight-500">Accion</th>
							</tr>
						</thead>
						<tbody id="detail_cart">
							<?php
							$no = 0;
							foreach ($listaprod as $items):
								$no++;
								?>
								<tr>
									<td class="product-thumbnail text-left">
										<a class="photo" href="#">
											<img class="cart-thumb" src="<?php echo $items['image']?>" alt="..." >
										</a>
										<p class="text1">
											<?php echo $items['name']; if($items["add"]!=""){ echo " ".$items['add']; } ?>
										</p>
									</td>

									<td class="text-left text-uppercase font-weight-500 head_first">
										<input id="id_prod" type="hidden" value="<?php echo $items['rowid']?>"/>
										<input id="id_producto" type="hidden" value="<?php echo $items['id']?>"/>
										<?php echo $items['name']; if($items["add"]!=""){ echo " ".$items['add']; } ?>
									</td>

									<td class="head_first">
										<input id="pprice" type="hidden" value="<?php echo $items['price']?>"/>
										<p id="product_price"><span>$</span><?=dinero($items['price'])?></p>

									</td>

									<td class="text-right">
										<div class="number-input cantidad">
											<button onclick="this.parentNode.querySelector('input[type=number]').stepDown();" class="minus btn_qty"></button>
											<input type="number"  id="quantity" name="quantity" class="quantity" value="<?php echo $items['qty']?>" readonly />
											<button onclick="this.parentNode.querySelector('input[type=number]').stepUp();" class="plus btn_qty"></button>
										</div>
										<p class="text1" >
											<span class="texto_oculto">Precio: <?php echo "$".dinero($items['price'])?></span><br>
											<span class="texto_oculto totalCar">SubTotal: <?="$".dinero($items['subtotal'])?></span>
										</p>
									</td>

									<td class="text-center head_first totalCar">
										<input id="subtot" type="hidden" value="<?php echo $items['subtotal']?>"/>
										<?="$".dinero($items['subtotal'])?>

									</td>
									<td class="text-center">
										<button type="button" id="<?php echo $items['rowid']?>" class="romove_cart btn  btn btn-link btn-sm"> <i class="fas fa-trash"></i></button>
									</td>
								</tr>

							<?php endforeach; ?>

						</tbody>

					</table>
					<div class="row">
						<div class="col align-self-end">
							<span id="totfin" style="display: none">$<?=dinero($this->cart->total())?></span>
						</div>
					</div>
				</div>
				<!-- End Product Table -->

				<!-- Start Button Set -->

				<div class="col-12 border-bottom border-top padding-40px-tb sm-padding-20px-tb sm-margin-20px-bottom xs-margin-15px-bottom">
					<button class="butn-style2 small bg-color xs-margin-10px-bottom empty_cart"><span>Vaciar Carrito</span></button>
					<a href='<?=base_url("catalogo")?>' class='butn-style2 small bg-color float-right margin-10px-left xs-margin-10px-bottom go_catalog'><span>Continuar Comprando</span></a>
				</div>
				<!-- End Button Set -->

				<!-- Start Total Block Set -->
				<div class="col-12 cart-total padding-40px-top sm-padding-20px-tb">
					<div class="row">
						<div class="col-lg-5 col-md-5 xs-margin-30px-bottom">&nbsp; </div>

						<div class="col-lg-6 offset-lg-1 col-md-7 offset-md-0">
							<table class="table cart-sub-total" id="cart_subtotal">
								<tbody>
									<tr>
										<th class="text-right no-padding-right text-uppercase"> Subtotal</th>
										<th class="text-uppercase text-right no-padding-right totalCarrito"><?php echo '$'.number_format(round($this->cart->total(),2), 2, '.', '');?></th>
									</tr>
									<tr>
										<th class="text-right no-padding-right text-uppercase">Envio</th>
										<td class="text-uppercase text-right no-padding-right">Verificar</td>
									</tr>
									<tr>
										<td class="no-padding-right xs-no-padding" colspan="2">
											<hr>
										</td>
									</tr>
									<tr class="total">
										<th class="text-uppercase text-right no-padding-right xs-no-padding">Total Orden</th>
										<th class="text-uppercase text-right no-padding-right xs-no-padding totalCarrito"><?php echo '$'.number_format(round($this->cart->total(),2), 2, '.', '');?></th>
									</tr>
									<tr>
										<td class="no-padding-right xs-no-padding" colspan="2">
											<hr class="no-margin-bottom">
										</td>
									</tr>
								</tbody>
							</table>
							<?php if ($this->cart->total_items() > 0) {?>
								<?php if ($this->cart->total() >= $minimo->minimo)
								{
									$span = "hidden";
									$btn = "";
								}
								else
								{
									$btn = "hidden";
									$span = "";
								}
								?>
								<input type="hidden" id="minimopago" value="<?php echo $minimo->minimo ?>">
									<div class="btncheckout" <?php echo $btn ?>>
										<a class="butn-style2 float-right" href="<?php echo base_url("checkout")?>"><span>Revisar y Pagar</span></a>
									</div>
									<div  class="spancheckout float-right alert alert-danger" <?php echo $span ?>>
									<span><strong class="text-danger">El monto minimo para procesar el pago es de $<?= number_format($minimo->minimo,2) ?></strong></span>
								</div>
							<?php }else{ ?>
								<span><strong>Debe agregar al menos un  producto para Chequear pago</strong></span>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- End Total Block Set -->

			</div>

		</div>
	</section>
	<!-- end cart table section -->

	<!-- start footer section -->
	<footer class="classic-footer bordered">

	</footer>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/funciones/cart.js"></script>
