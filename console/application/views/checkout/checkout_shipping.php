<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('utilities_helper');
$rutaProd= base_url()."assets/";
?>




<!-- start page title section -->
<section class="page-title-section bg-img cover-background" data-background="/assets/img/bg/bg.jpg"
		 style="background-image: url(assets/img/bg/page-title.jpg);">
	<div class="container">

		<div class="title-info">
			<h1>Forma de Entrega</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?= base_url("") ?>">Inicio</a></li>
				<li><a href="#">Chequeo</a></li>
				<li><a href="#">Entrega</a></li>
			</ul>
		</div>

	</div>
</section>
<!-- end page title section -->

<!-- start checkout section -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="process-steps margin-50px-bottom sm-margin-35px-bottom">
					<a class="step" href="<?php echo base_url("checkout")?>"><i class="ti-direction-alt"></i><h4 class="step-title">1. Direccion</h4></a>
					<a class="step active" href="<?php echo base_url("checkout/shipping")?>"><i class="ti-truck"></i><h4 class="step-title">2. Entrega</h4></a>
					<a class="step"  href="<?php echo base_url("checkout/payment")?>"><i class="ti-wallet"></i><h4 class="step-title">3. Pago</h4></a>
					<a class="step"  href="<?php echo base_url("checkout/review")?>"><i class="ti-check-box"></i><h4 class="step-title">4. Revision</h4></a>
				</div>
			</div>

			<!-- start left pannel section -->
			<div class="col-lg-9 col-md-12 padding-40px-right sm-padding-15px-lr sm-margin-35px-bottom">
				<input type="hidden" id="procc" value="shipping">
				<div class="common-block">
					<input type="hidden" id="id_user" name="id_user" value="<?=$row->id_usuario?>"/>
					<div class="inner-title">
						<h4 class="no-margin-bottom">Seleccione El tipo de Entrega</h4>
					</div>

					<div class="table-responsive">
						<table class="table ship-table">
							<thead>
								<tr>
									<th></th>
									<th class="text-left">Entregar en</th>
									<th>Costo</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="custom-control custom-radio mb-0">
											<input class="custom-control-input radio_entrega" type="radio" id="courier" name="shipping-method" value="Domicilio" checked="checked" />
											<label class="custom-control-label" for="courier"></label>
										</div>
									</td>
									<td class="text-left"><span class="text-gray-dark">Domicilio</span></td>
									<td  class="costoDomicilio_td"><input class="costoEnt" type="hidden" id="costoDomicilio"  value="<?php echo $costo; ?>" />$ <?php echo number_format($costo,2,".",",") ?> </td>
								</tr>
								<tr>
									<td>
										<div class="custom-control custom-radio mb-0">
											<input class="custom-control-input radio_entrega" type="radio" id="local1" value="Tienda" name="shipping-method" />
											<label class="custom-control-label" for="local1"></label>
										</div>
									</td>
									<td class="text-left"><span class="text-gray-dark">Recoger en Tienda</span></td>
									<td  class="costoDomicilio_td"><input class="costoEnt" type="hidden" id="costoDomicilio"  value="0.00" />$0.00</td>
								</tr>

							</tbody>
						</table>
					</div>

					<div class="buttons-set">

						<a class="butn-style2 wide" href="<?php echo base_url("checkout/")?>"><i class="fas fa-arrow-left margin-5px-right"></i> Retornar</a>
						<button type="button" id="btnShipp" class="butn-style2"> Continuar <i class="fas fa-arrow-right"></i></button>
						<!--a class="butn-style2 wide"  href="<?php echo base_url("checkout/payment")?>">Continue <i class="fas fa-arrow-right margin-5px-left"></i></a-->

					</div>

				</div>

			</div>
			<!-- end left pannel section -->
			<!-- start right pannel section -->
			<div class="col-lg-3 col-12 side-bar">

				<div class="widget">

					<div class="widget-title">
						<h5>Total Orden</h5>
					</div>


					<table class="table classic">
						<tbody>
							<tr>
								<th>Subtotal:</th>
								<td class="text-gray-dark subTotal_td"><input type="hidden" id="subtotal"  value="<?php echo number_format($this->cart->total(), 2, '.', '')?>" /> $ <?php echo number_format($this->cart->total(), 2, '.', '')?></td>
							</tr>
							<tr>
								<th><input type="hidden" id="total_envio"   value="0.0" />Envio:</th>
								<td class="text-gray-dark totalEnvio">$<?= $envio ?></td>
							</tr>

							<tr>
								<th>Total:</th>
								<td class="text-lg text-gray-dark totalFinal_td"><input type="hidden" id="totalFinal"  value="<?php echo number_format(($this->cart->total()+$envio), 2, '.', '')?>" />$<?php echo number_format(($this->cart->total()+$envio), 2, '.', '')?></td>
							</tr>
						</tbody>
					</table>

				</div>


			</div>
			<!-- end right pannel section -->
		</div>
	</div>
</section>
<!-- end checkout section -->


<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/funciones/checkout2.js"></script>
