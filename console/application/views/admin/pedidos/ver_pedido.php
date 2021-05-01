<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-list-alt"></i> Visualizar Orden</b></h3>
				</div>
				<div class="ibox-content p-xl">
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h2 class="font-bold"><i class="fa fa-shopping-basket"></i> Orden</h2>
								</div>
								<div class="panel-body">
									<p><strong>Numero de Orden:</strong> <span class="text-navy font-bold"><?=$row->numero_orden?></span></p>
									<p><strong>Fecha y hora de Orden:</strong> <?=hora_A_P($row->hora)." ".d_m_Y($row->fecha)?></p>
									<p><strong>Tipo de Entrega:</strong> <?=$row->entrega?></p>
									<p><strong>Estado:</strong>
									<?php if($row->finalizada==1):?>
										Finalizada
									<?php elseif($row->anulada==1):?>
										Anulada
									<?php elseif($row->cancelada==1):?>
										Cancelada
									<?php else:?>
										En Proceso
									<?php endif;?>
									</p>
									<p><strong>Ultima Actualización:</strong>
										<?php if($row->id_estado==0):?>
											PENDIENTE
										<?php else:?>
											<?=$row->estado?>
										<?php endif;?>
									</p>
								</div>
							</div>

						</div>
						<div class="col-sm-4">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h2 class="font-bold"><i class="fa fa-money"></i> Pago</h2>
								</div>
								<div class="panel-body">
									<p><strong>Tipo de Pago:</strong> <?=$row->tipo?></p>
									<?php if($row->comprobante != ""){ ?>
									<p><strong>Comprobante:</strong><a href="<?=base_url('assets/').$row->comprobante?>" target="_blank"><img src="<?=base_url('assets/').$row->comprobante?>" style="width:270px; height:180px;"></img></a></p>
									<?php } ?>
									<p><strong>Total:</strong> <span class="text-navy"> $<?=dinero($row->total)?></span> </p>
									<p><strong>Numero de Items:</strong> <?=$count?></p>
									<p><strong>Envio:</strong> $<?=$row->envio?></p>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<h2 class="font-bold"><i class="fa fa-user"></i> Cliente</h2>
								</div>
								<div class="panel-body">
									<p><strong>Nombre:</strong> <?=$row->usuario?></p>
									<p><strong>Correo:</strong> <?=$row->correo?></p>
									<p><strong>Direccion:</strong> <?=$row->direccion?></p>
									<p><strong>Teléfono:</strong> <?=$row->telefono?></p>
								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive m-t">
						<h2 class="font-bold text-primary">Productos</h2>
						<table class="table invoice-table table-hover">
							<thead>
							<tr class="text-black font-bold">
								<th>Producto</th>
								<th>Marca</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Total Price</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$total = 0;
							foreach ($rows as $product):
								$sub_total = ($product->precio_p*$product->cantidad);
								$total +=$sub_total;
								?>
								<tr>
									<td><strong><?=$product->descripcion?></strong></td>
									<td><?=$product->marca?></td>
									<td>$<?=dinero($product->precio_p)?></td>
									<td><?=intval($product->cantidad)?></td>
									<td><strong>$<?=dinero($sub_total)?></strong></td>
								</tr>
							<?php
							$sub_total=0;
							endforeach;?>
							</tbody>
						</table>
					</div><!-- /table-responsive -->

					<table class="table invoice-total">
						<tbody>
						<tr>
							<td><strong>Sub Total :</strong></td>
							<td>$<?=dinero($total)?></td>
						</tr>
						<tr>
							<td><strong>Envio :</strong></td>
							<td>$<?=dinero($row->envio)?></td>
						</tr>
						<tr>
							<td><strong>TOTAL :</strong></td>
							<td class="font-bold text-primary">$<?=dinero($total+$row->envio)?></td>
						</tr>
						</tbody>
					</table>
					<!--<div class="text-right">
						<button class="btn btn-primary"><i class="fa fa-check"></i> Procesar</button>
					</div>-->
					<div class="well m-t"><strong>Indicaciones</strong><br>
						<?=$row->observaciones?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url(); ?>assets/admin/js/funciones/<?=$urljs; ?>"></script>
