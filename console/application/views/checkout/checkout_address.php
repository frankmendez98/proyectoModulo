<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('utilities_helper');
$rutaProd= base_url()."assets/";
?>




<!-- start page title section -->
<section class="page-title-section bg-img cover-background" data-background="assets/img/bg/bg.jpg"
style="background-image: url(assets/img/bg/page-title.jpg);">
<div class="container">

	<div class="title-info">
		<h1>Datos Generales</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?= base_url("") ?>">Inicio</a></li>
				<li><a href="#">Chequeo</a></li>
				<li><a href="#">Datos Generales</a></li>
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
					<a class="step active" href="<?php echo base_url("checkout")?>"><i class="ti-direction-alt"></i><h4 class="step-title">1. Direccion</h4></a>
					<a class="step"  href="<?php echo base_url("checkout/shipping")?>"><i class="ti-truck"></i><h4 class="step-title">2. Entrega</h4></a>
					<a class="step"  href="<?php echo base_url("checkout/payment")?>"><i class="ti-wallet"></i><h4 class="step-title">3. Pago</h4></a>
					<a class="step"  href="<?php echo base_url("checkout/review")?>"><i class="ti-check-box"></i><h4 class="step-title">4. Revision</h4></a>
				</div>
			</div>

			<!-- start left pannel section -->
			<div class="col-lg-9 col-12 padding-40px-right sm-padding-15px-lr sm-margin-35px-bottom">

				<div class="common-block">

					<div class="inner-title">
						<h4 class="no-margin-bottom">Dirección de Envio</h4>
					</div>

					<form id="form_reg" data-parsley-validate>
						<input type="hidden" id="procc" value="address">
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div class="form-group">
									<label>Nombre Completo</label>
									<input type="text" class="form-control" name="nombre" value="<?=$row->nombre?>" required data-parsley-trigger="change" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 mb-2">
								<div class="form-group">
									<label>Direccion de Entrega(Puede modificarse) </label>
									<input type="text" class="form-control" name="direccion" value="<?=$row->direccion?>" required data-parsley-trigger="change" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 mb-2">
								<div class="form-group">
									<label>Correo electr&oacute;nico</label>
									<input type="text" class="form-control" value="<?=$row->correo?>" readonly>
								</div>
							</div>

							<div class="col-sm-6 mb-2">

								<div class="form-group">
									<label>Telefono</label>
									<input type="text" class="form-control" id="telefono" name="telefono" value="<?=$row->telefono?>" required data-parsley-trigger="change">
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-sm-6 mb-2">
								<div class="form-group">
									<label>Departamento</label>
									<select name="id_departamento" id="id_departamento" class="form-control select2" required data-parsley-trigger="change">
										<?php foreach ($departamentos as $dep): ?>
											<option value="<?=$dep->id_departamento?>"
												<?php if ($dep->id_departamento==$row->id_departamento): ?>
													selected
												<?php endif; ?>
												> <?= $dep->nombre_departamento ?> </option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="col-sm-6 mb-2">
									<div class="form-group">
										<label>Municipio</label>
										<select name="id_municipio" id="id_municipio" class="form-control select2" required data-parsley-trigger="change" >
											<?php foreach ($municipios as $mun): ?>
												<option value="<?=$mun->id_municipio?>"
													<?php if ($mun->id_municipio==$row->id_municipio): ?>
														selected
													<?php endif; ?>>
													<?= $mun->nombre_municipio ?> </option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<!--div class="inner-title margin-30px-top">
								<h4 class="no-margin-bottom">Continue</h4>
							</div-->
							<div class="buttons-set">
								<input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
								<input type="hidden"  name="id_usuario" value="<?=$id_usuario?>" />
								<a class="butn-style2 wide" href="<?php echo base_url("catalogo/cart")?>"><i class="fas fa-arrow-left margin-5px-left"></i> Volver a Compras</a>
								<button type="submit" class="butn-style2 margin-20px-top">Actualizar y Continuar <i class="fas fa-arrow-right margin-5px-right"></i></button>
							</div>
						</form>

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
									<td class="text-gray-dark totalEnvio"><input type="hidden" id="total_envio"  value="0.0" />$0.0</td>
								</tr>

								<tr>
									<th>Total:</th>
									<td class="text-lg text-gray-dark totalFinal_td"><input type="hidden" id="totalFinal"  value="<?php echo number_format($this->cart->total(), 2, '.', '')?>" />$<?php echo number_format($this->cart->total(), 2, '.', '')?></td>
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


	<!--script src="<!--?php echo base_url(); ?>assets/js/jquery.min.js"></script>

	<script src="<!--?= base_url(); ?>assets/js/funciones/checkout.js"></script-->
