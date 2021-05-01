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

					<div class="row">
						<div class="col-8">
							<div class="inner-title">
								<h4 class="no-margin-bottom">Mis Ordenes</h4>
							</div>
						</div>
						<div class="col-4">
							<select class="form-control" id="fecha_filtro">
								<option value="0">Ordenes de</option>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
							</select>
						</div>
					</div>

					<div class="table-responsive">
					<table class="table" id="editable">
						<thead>
							<tr>
								<th>Orden</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Total</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody id="table_orders">
						</tbody>
					</table>
				</div>
				</div>

			</div>
			<!-- end right panel -->
		</div>
	</div>
</section>
