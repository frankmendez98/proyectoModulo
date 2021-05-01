<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
	<div class="container">
		<div class="row justify-content-center">

			<!-- start left panel -->
			<?=$dash?>
			<!-- end left panel -->

			<!-- start right panel -->
			<div class="col-lg-8">

				<div class="common-block">

					<div class="inner-title">
						<h4 class="no-margin-bottom">Número de Orden - <span class="text-theme-color"><?=$n_orden?></span></h4>
					</div>

					<div class="row">
						<div class="col-md-4 xs-margin-10px-bottom">
							<div class="text-center bg-light-gray padding-25px-all">
								<span class="font-weight-700">Estado:</span><br>
								<?php if ($row->finalizada==1):?>
									<span>Finalizada</span>
								<?php elseif($row->anulada==1):?>
									<span>Anulada</span>
								<?php elseif($row->cancelada==1):?>
									<span>Cancelada</span>
								<?php else:?>
									<span>En Proceso</span>
								<?php endif;?>
							</div>
						</div>
						<div class="col-md-4 xs-margin-10px-bottom">
							<div class="text-center bg-light-gray padding-25px-all">
								<span class="font-weight-700">Entrega:</span><br>
								<span><?=$row->entrega?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="text-center bg-light-gray padding-25px-all">
								<span class="font-weight-700">Fecha de Pedido:</span><br>
								<span><?=d_m_Y($row->fecha)?></span>
							</div>
						</div>
					</div>

					<div class="row mt-3">
						<h5 class="text-uppercase font-size14 font-weight-600">Detalle de la orden</h5>
					</div>
					<div class="row">
						<div class="col-6">
							<span><strong>Última Actualización: </strong>
								<?php if($row->estado==0): ?>
									En proceso
								<?php else: ?>
									<?=$row->estado?>
								<?php endif;?>
							</span><br>
							<span><strong>Total: </strong>$<?=dinero($row->total)?></span><br>
							<span><strong>Método de pago:</strong> <?=$row->tipo?></span><br>
						</div>
						<div class="col-6">
							<span><strong>Envío: </strong>$<?=dinero($row->envio)?></span><br>
							<span><strong>Items: </strong><?=$count?></span><br>
							<span><strong>Dirección de entrega:</strong>
								<?php if($row->entrega=="Domicilio"):?>
									<?=$row->direccion?>
								<?php else: ?>
									En Sucursal
								<?php endif;?>
							</span><br>
						</div>
					</div>
					<div class="row mt-3">
						<h5 class="text-uppercase font-size14 font-weight-600">Productos</h5>
					</div>
					<div class="row table-responsive">
						<div class="col-12">

							<div class="table-responsive">
								<table class="table">
									<thead>
									<tr>
										<th>N</th>
										<th>Producto</th>
										<th>Precio</th>
										<th>Cantidad</th>
										<th>Subtotal</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$total = 0;
									$n=1;
									foreach ($products as $product):
										$sub_total = ($product->precio_p*$product->cantidad);
										$total +=$sub_total;
										?>
										<tr>
											<td><?=$n?></td>
											<td><a href="<?=base_url("producto/").md5($product->id_producto)?>"><strong><?=$product->descripcion?></strong></a></td>
											<td>$<?=dinero($product->precio_p)?></td>
											<td><?=intval($product->cantidad)?></td>
											<td><strong>$<?=dinero($sub_total)?></strong></td>
										</tr>
										<?php
										$n++;
										$sub_total=0;
									endforeach;?>
									<tr>
										<td  class="text-right" colspan="4"><strong>Subtotal</strong></td>
										<td>$<?=dinero($total)?></td>
									</tr>
									<tr>
										<td  class="text-right" colspan="4"><strong>Envio</strong></td>
										<td>$<?=dinero($row->envio)?></td>
									</tr>
									<tr>
										<td  class="text-right" colspan="4"><strong>Total</strong></td>
										<td class="text-primary" style="font-weight: bold">$<?=dinero($total+$row->envio)?></td>
									</tr>
									</tbody>
								</table>
							</div>

						</div>

					</div>

				</div>

			</div>
			<!-- end right panel -->
		</div>
	</div>
</section>
