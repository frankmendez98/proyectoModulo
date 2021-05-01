<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
	<meta name="viewport" content="width=device-width"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>In5min - Confirmaci&oacute;n de Compra!</title>
	<style type="text/css">
	table.tableHead {
		border: 2px solid #000000;
		width: 100%;
		text-align: left;
		border-collapse: collapse;
	}
	table.tableHead td, table.tableHead th {
		padding: 5px 4px;
	}
	table.tableHead tbody td {
		font-size: 13px;
	}
	table.tableHead thead {
		background: #CFCFCF;
		background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		border-bottom: 2px solid #000000;
	}
	table.tableHead thead th {
		font-size: 15px;
		font-weight: bold;
		color: #000000;
		text-align: left;
	}
	table.tableHead tfoot {
		font-size: 14px;
		font-weight: bold;
		color: #000000;
		border-top: 2px solid #000000;
	}
	table.tableHead tfoot td {
		font-size: 14px;
	}
	table.tableBill {
		border: 2px solid #000000;
		width: 100%;
		text-align: left;
		border-collapse: collapse;
	}
	table.tableBill td, table.tableBill th {
		border: 1px solid #000000;
		padding: 5px 4px;
	}
	table.tableBill tbody td {
		font-size: 13px;
	}
	table.tableBill thead {
		background: #CFCFCF;
		background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
		border-bottom: 3px solid #000000;
	}
	table.tableBill thead th {
		font-size: 15px;
		font-weight: bold;
		color: #000000;
		text-align: left;
	}
	table.tableBill tfoot {
		font-size: 14px;
		font-weight: bold;
		color: #000000;
		border-top: 2px solid #000000;
	}
	table.tableBill tfoot td {
		font-size: 14px;
	}
	.estilo{
		font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box;
		font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;
		width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;

	}
</style>




</head>

<body class="estilo" >


	<div>
		<?php if($this->session->norden != ""): ?>

			<?php if (!empty($orden)):
				foreach($orden as $ord):
					?>

					<table class="tableBill">

						<thead>

							<tr rowspan=2>
								<th colspan=2 ><strong> In5min <br> ORDEN DE COMPRA N° <?= $this->session->norden; ?></strong></th>
								<th colspan=2 ><a href="#" style="display: block;margin-bottom: 10px;"> <img src="<?=base_url("assets/img/logo.png")?>" height="100" alt="logo"/></a></th>
							</tr>

							<tr>
								<th colspan=2><strong>Cliente:  <?php echo $ord['nombre']?> Telefono: </strong><?=$ord['telefono']?></th>
								<th colspan=1><strong>Pago:  <?php echo $ord['tipo']?></strong></th>
							</tr>
							<tr>
								<th colspan=3><strong> Direccion:  <?php echo $ord['direccion']?></strong></th>
							</tr>
							<tr>
								<th colspan=3><strong>Entregar en:  <?php echo $ord['entrega']?></strong></th>
							</tr>
						</td>
					</tr>
					<tr>

						<th>Total $ <?php echo number_format(+$ord['total']+$ord['envio_cliente'],2,".",",") ?></th>
						<th>Fecha: <?php echo $this->session->fped ?></th>
						<th>Hora: <?php echo $this->session->hped ?></th>
					</tr>




					<?php

				endforeach;
			endif;
			?>
		</thead>
	</table>

	<!--detalle-->

	<table class="tableBill">
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
						<td class="regular-price text-right"> <?php echo  round($row['cantidad'],2)?></td>
						<td class="regular-price text-right">$ <?php echo round($row['precio'],2)?></td>
						<td class="regular-price text-right">$ <?php echo $subt?></td>
					</tr>

				<?php endforeach;

			endif;
			?></tbody>
			<tfoot>
				<tr>
					<td class="text-left" colspan=1><span class="text-gray-dark">Total Productos</span></td>
					<td class="text-right" colspan=3>$ <?php echo number_format($this->session->total,2,".",",") ?></td>
				</tr>
				<tr>
					<td class="text-left" colspan=1><span class="text-gray-dark">Envio</span></td>
					<td class="text-right" colspan=3>$ <?php echo number_format($ord['envio_cliente'],2,".",",") ?></td>
				</tr>
				<tr>
					<td class="text-left" colspan=1><span class="text-gray-dark">Total final</span></td>
					<td class="text-right" colspan=3>$ <?php echo number_format($this->session->total+$ord['envio_cliente'],2,".",",") ?></td>
				</tr>

			</tfoot>
		</table>

		<?php
	endif;
	?>

</div>
</body>
</html>
