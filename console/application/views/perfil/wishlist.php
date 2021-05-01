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
								<h4 class="no-margin-bottom">Mi Lista de Deseos</h4>
							</div>
						</div>
						<div class="col-4">
							<select class="form-control" id="fecha_filtro">
								<option value="0">Productos de</option>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
							</select>
						</div>
					</div>


					<table class="table" id="editable">
						<thead>
						<tr>
							<th>N</th>
							<th>Producto</th>
							<th>Marca</th>
							<th>Precio</th>
							<th>Acciones</th>
						</tr>
						</thead>
						<tbody id="table_orders">
						</tbody>
					</table>
				</div>

			</div>
			<!-- end right panel -->
		</div>
	</div>
</section>
