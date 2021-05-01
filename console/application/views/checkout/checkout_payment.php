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
			<h1>Confirmación de Pago</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?= base_url("") ?>">Inicio</a></li>
				<li><a href="#">Chequeo</a></li>
				<li><a href="#">Pago</a></li>
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
						<a class="step"  href="<?php echo base_url("checkout/shipping")?>"><i class="ti-truck"></i><h4 class="step-title">2. Entrega</h4></a>
						<a class="step  active"  href="<?php echo base_url("checkout/payment")?>"><i class="ti-wallet"></i><h4 class="step-title">3. Pago</h4></a>
						<a class="step"  href="<?php echo base_url("checkout/review")?>"><i class="ti-check-box"></i><h4 class="step-title">4. Revision</h4></a>
					</div>
					<input type="hidden" id="procc" value="payment">
					<input type="hidden" id="cargof" value="<?= $extras->cargo_fijo ?>">
					<input type="hidden" id="cargop" value="<?= $extras->cargo_porcentaje ?>">
				</div>

				<!-- start left pannel section -->
				<div class="col-lg-9 col-md-12 padding-40px-right sm-padding-15px-lr sm-margin-35px-bottom">

					<div class="common-block">

						<div class="inner-title">
							<h4 class="no-margin-bottom">Forma de Pago</h4>
						</div>
						<?php if ($this->session->has_userdata("envio") && $this->session->has_userdata("entrega")): ?>
						<!--if (!$this->session->has_userdata("usuario"))-->

						<?php if($this->session->norden === null || $this->session->norden ==""): ?>
							<div id="accordion" class="accordion-style3">
								<div class="card">
									<div class="card-header" id="headingTwo">
										<h5 class="no-margin-bottom">
											<button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="fab fa-paypal padding-10px-right font-size16"></i>Transferencia Bancaria </button>
										</h5>
									</div>
									<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
										<div class="card-body">

											<h6 class="font-size14 font-weight-600 margin-20px-bottom">Politicas de envio</h6>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="accept">
												<label class="custom-control-label" for="accept">Acepto las siguientes politicas de envio:
													<br>
													<small class="text-muted text-justify">
														1- Debido a la alta demanda de servicios a domicilio producto de la emergencia nacional causada por Covid-19 acepto que la entrega de la presente compra podra demorar de 24 a 48 horas despues de haber realizado el pago.
													</small>
													<br><br>
													<small class="text-muted text-justify">
														2-El comprador acepta que en caso que el trasportista no puediera acceder a la zona de entrega por ser considerada de alto riesgo, se establecerá en su lugar un punto de encuentro cercano seguro para proceder a la entrega
														del paquete.
													</small>
												</div>
												<div>
													<form id="form_add">
													<input type="hidden" name="efectivo" id="efectivo">
													<input type="hidden" name="tarjeta" id="tarjeta">
													<input type="hidden" name="transferencia" id="transferencia">
													<div class="mt-3">
														<label for="foto">Comprobante</label>
														<input type="file" id="foto" name="foto" class="dropify" accept="image/*"/>
														<p class="text-muted text-center mt-2 mb-0">Agrega captura de la Transferencia</p>
													</div>
												</form>
												</div>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingTree">
											<h5 class="no-margin-bottom">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree"><i class="fa fa-money-bill padding-10px-right font-size16"></i>Pago contra Entrega </button>
											</h5>
										</div>
										<div id="collapseTree" class="collapse show" aria-labelledby="headingTree" data-parent="#accordion">
											<div class="card-body">

												<h6 class="font-size14 font-weight-600 margin-20px-bottom">Politicas de envio</h6>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="accepttt">
													<label class="custom-control-label" for="accepttt">Acepto las siguientes politicas de envio:
														<br>
														<small class="text-muted text-justify">
															1- Debido a la alta demanda de servicios a domicilio producto de la emergencia nacional causada por Covid-19 acepto que la entrega de la presente compra podra demorar de 24 a 48 horas despues de haber realizado el pago.
														</small>
														<br><br>
														<small class="text-muted text-justify">
															2-El comprador acepta que en caso que el trasportista no puediera acceder a la zona de entrega por ser considerada de alto riesgo, se establecerá en su lugar un punto de encuentro cercano seguro para proceder a la entrega
															del paquete.
														</small>
													</div>
													<div>
													</div>
												</div>
											</div>
										</div>
									<!--<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="no-margin-bottom">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="far fa-credit-card padding-10px-right font-size16"></i>Tarjeta de Credito/Debito</button>
											</h5>
										</div>
										<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
											<div class="card-body">


												<h6 class="font-size14 font-weight-600 margin-20px-bottom">Politicas de envio</h6>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="acceptt">
													<label class="custom-control-label" for="acceptt">Acepto las siguientes politicas de envio:
														<br>
														<small class="text-muted text-justify">
															1- Se aplicara un recargo de $0.28 mas el 5.7% del total de su compra.
														</small>
														<br><br>
														<small class="text-muted text-justify">
															2- Debido a la alta demanda de servicios a domicilio producto de la emergencia nacional causada por Covid-19 acepto que la entrega de la presente compra podra demorar de 24 a 48 horas despues de haber realizado el pago.
														</small>
														<br><br>
														<small class="text-muted text-justify">
															3-El comprador acepta que en caso que el trasportista no puediera acceder a la zona de entrega por ser considerada de alto riesgo, se establecerá en su lugar un punto de encuentro cercano seguro para proceder a la entrega
															del paquete.
														</small>
														<br><br>
														<small class="text-muted text-justify">
															4- El comprador podra solicitar la cancelación del pedido sino recibiera su compra por parte del trasportista en el periodo indicado en el numeral 1, procediendo la empresa a efectuar la devolución de los cargos
															efectuados a la tarjeta de crédito del cliente por medio de la pasarela de pagos pagadito el salvador, reintegro que sera efectivo en un plazo de 3 dias habiles..</label>
														</small>
													</div>


												</div>
											</div>
										</div>-->
									</div>

									<div class="buttons-set">
										<a class="butn-style2 wide" href="<?php echo base_url("checkout/shipping")?>"><i class="fas fa-arrow-left margin-5px-right"></i> Retornar</a>
										<a class="butn-style2 wide"  id="savepayment" >Continuar <i class="fas fa-arrow-right margin-5px-left"></i></a>
									</div>
								<?php else: ?>
									<div id="accordion" class="accordion-style3">
										<div class="card">
											<div class="card-header" id="headingTwo">
												<h5 class="no-margin-bottom">
													<button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Información </button>
												</h5>
											</div>
											<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
												<div class="card-body">
													<div class="alert alert-warning">
														Ya has completado este pedido
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<?php else: ?>
									<div id="accordion" class="accordion-style3">
										<div class="card">
											<div class="card-header" id="headingTwo">
												<h5 class="no-margin-bottom">
													<button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Información </button>
												</h5>
											</div>
											<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
												<div class="card-body">
													<div class="alert alert-warning">
														Debes seleccionar si la entrega es envio a domicilio o entrega en sucursal
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>

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
											<th>Envio:</th>
											<td class="text-gray-dark totalEnvio">$<?= number_format($envio,2,".","");?></td>
										</tr>
										<tr id="cgtar" hidden>
											<th>Cargo extra:</th>
											<input type="hidden" id="totalTarjeta" value="">
											<td class="text-gray-dark totalTarjeta"></td>
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
