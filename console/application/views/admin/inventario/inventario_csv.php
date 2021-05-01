<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-plus-circle"></i> Cargar Inventario CSV</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_add" novalidate>
						<div class="row">
              <div class="col-md-12" style="text-align:center;">
                <a class="btn btn-primary" href="createcsv" id='btnCSV'><i class="fa fa-download"></i> Descargar plantilla</a>
              </div>
              <div class="col-lg-12" style="text-align:center;">
                <br>
                <br>
                <label>Cargar archivo CSV</label>
                <input type="file" id="archivo_csv" name="archivo_csv" class="dropify" accept="" required data-parsley-trigger="change"/>
              </div>
						</div>
            <div class="row m-t-12">
							<div class="form-actions col-lg-12" style="text-align:center;">
								<button type="submit" id="btn_add" name="btn_add" class="btn btn-primary m-t-n-xs"><i class="fa fa-upload"></i> Subir archivo</button>
							</div>
						</div>
					</form>
				</div>

			</div>
			<div class="ibox" style="display: none;" id="divh">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-content text-center">
								<h2 class="text-danger blink_me">Espere un momento, procesando su solicitud!</h2>
								<section class="sect">
									<div id="loader">
									</div>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url(); ?>assets/admin/js/funciones/<?=$urljs; ?>"></script>
