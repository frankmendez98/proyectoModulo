<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-2">
	</div>
</div>
<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-1x fa-file-pdf-o"></i> <?=$titulo?></b></h3>
				</div>
				<div class="ibox-content">
					<form method="POST" action="<?=base_url($uri);?>" target="_blank">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group single-line">
									<label>Desde</label>
									<input type="text" placeholder="Fecha Inicial" class="datepicker form-control" id="desde" name="desde" value="<?=$desde ?>" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group single-line">
									<label>Hasta</label>
									<input type="text" placeholder="Fecha Final" class="datepicker form-control" id="hasta" name="hasta" value="<?= $hasta ?>" readonly>
								</div>
							</div>
							<!--<div class="col-md-4">
								<div class="form-group has-info single-line">
									<label>Categorias</label>
									<select id="gerencia" name="gerencia" class="form-control select2">
										<option value="0" selected>GENERAL</option>
										<?php /*foreach ($cat as $row):*/?>
											<option value="<?/*=$row->id_categoria */?>"> <?/*= $row->nombre_cat */?> </option>
										<?php /*endforeach;*/?>
									</select>
								</div>
							</div>-->
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" id="btn_col" name="btn_col" value="Imprimir" class="btn btn-primary m-t-n-xs pull-right">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
