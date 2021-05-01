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
			<h1>Resumen de compra</h1></div>
		<div class="breadcrumbs-info">
			<ul>
				<li><a href="<?= base_url("") ?>">Inicio</a></li>
				<li><a href="#">Chequeo</a></li>
				<li><a href="#">Resumen</a></li>
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
						<a class="step"  href="<?php echo base_url("checkout/payment")?>"><i class="ti-wallet"></i><h4 class="step-title">3. Pago</h4></a>
						<a class="step active"  href="<?php echo base_url("checkout/review")?>"><i class="ti-check-box"></i><h4 class="step-title">4. Revision</h4></a>
					</div>
				</div>

				<!-- start left pannel section -->
				<div class="col-lg-1"></div>
				<div class="col-lg-10 col-md-12 padding-40px-right sm-padding-15px-lr sm-margin-35px-bottom">
					<input type="hidden" id="procc" value="review">
					<div class="common-block">
						<div class="inner-title">
							<h4 class="no-margin-bottom">Resumen de la Orden</h4>
						</div>

						<?php if($this->session->norden != ""): ?>

							<?php if (!empty($orden)):
								foreach($orden as $ord):
									?>
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th colspan="2">ORDEN N° <?= $this->session->norden; ?></th>
													<th>Total $ <?php echo number_format(+$ord['total']+$ord['envio_cliente']+$rod["cargo_tarjeta"],2,".",",") ?></th>
													<th>Fecha: <?php echo $this->session->fped ?></th>
													<th>Hora: <?php echo $this->session->hped ?></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th class="text-left" colspan=3><span class="text-gray-dark">Cliente:  <?php echo $ord['nombre']?></span></th>
													<th class="text-left" colspan=2><span class="text-gray-dark">Pago:  <?php echo $ord['tipo']?></span></th>
												</tr>
												<?php if (  $ord['entrega']=="Domicilio"): ?>
														<tr>
														<th class="text-left" colspan=2><span class="text-gray-dark">Entregar en:  <?php echo $ord['entrega']?></span></th>
														<th class="text-left" colspan=3><span class="text-gray-dark"> Direccion:  <?php echo $ord['direccion']?></span></th>
														<?php
														echo "</tr>";
													else:?>
													<tr>
														<th class="text-left" colspan=5><span class="text-gray-dark">Entregar en:  <?php echo $ord['entrega']?></span></th>
													</tr>
												<?php
													endif;
												endforeach;
											endif;
											if ($estate_payment != ""):
											?>
											<tr>
												<th>Estado: <?= $estate_payment; ?></th>
												<th colspan="2">REFERENCIA N° <?= $payment_ref; ?></th>
												<th>Fecha de Pago <?= $fecha_payment; ?></th>
											</tr>
										<?php endif; ?>
										</tbody>
									</table>
								</div>

								<!--detalle-->
								<div class="table-responsive tbl2">
									<table class="table">
										<thead>
											<tr>
												<th>Id - Descripcion</th>
												<th class="text-right">Cantidad</th>
												<th class="text-right">Precio</th>
												<th class="text-right">Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($detOrden)):
												foreach($detOrden as $row):
													$subt=round($row['precio']*$row['cantidad'],2);
													?>
													<tr>
														<?php if($row["talla"] == ""){ ?>
														<td class="text-left"><?php echo $row['descripcion']?></td>
													<?php } else { ?>
														<td class="text-left"><?php echo $row['descripcion']." TALLA ".$row["talla"]?></td>
													<?php } ?>
														<td class="regular-price text-right"> <?php echo  number_format($row['cantidad'],0)?></td>
														<td class="regular-price text-right">$ <?php echo number_format($row['precio'],2)?></td>
														<td class="regular-price text-right">$ <?php echo number_format($subt,2) ?></td>
													</tr>

												<?php endforeach;
											endif;
											?>
											<tr>
												<td class="text-left" colspan=1><span class="text-gray-dark">Total Productos</span></td>
												<td class="text-right" colspan=3>$ <?php echo number_format($this->session->total,2,".",",") ?></td>
											</tr>
											<tr>
												<td class="text-left" colspan=1><span class="text-gray-dark">Envio</span></td>
												<td class="text-right" colspan=3>$ <?php echo number_format($ord['envio_cliente'],2,".",",") ?></td>
											</tr>
											<tr>
												<td class="text-left" colspan=1><span class="text-gray-dark">Cargo Extra</span></td>
												<td class="text-right" colspan=3>$ <?php echo number_format($ord['cargo_tarjeta'],2,".",",") ?></td>
											</tr>
											<tr>
												<td class="text-left" colspan=1><span class="text-gray-dark">Total final</span></td>
												<td class="text-right" colspan=3>$ <?php echo number_format($this->session->total+$ord['envio_cliente']+$ord["cargo_tarjeta"],2,".",",") ?></td>
											</tr>

										</tbody>
									</table>
								</div>
								<!--fin detalle-->

								<div class="buttons-set">
									<a class="butn-style2 wide" id="btnfinish">Finalizar </a>
									<br>
								</div>
								<?php
							endif;
							?>

						</div>

					</div>
					<div class="col-lg-1"></div>

					<!-- end right pannel section -->
				</div>
			</div>
		</section>
		<!-- end checkout section -->
