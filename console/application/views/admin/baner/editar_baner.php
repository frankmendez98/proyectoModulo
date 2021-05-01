<?php
defined('BASEPATH') or exit('No direct script access allowed');
$color2 = str_replace($color, "color:", "");
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-plus-circle"></i> Agregar baner</b></h3>
				</div>
				<div class="ibox-content">
					<form id="form_edit" novalidate>
            <div class="row">
              <div class="col-md-12" style="text-align:center;">
                <img src="<?= base_url(); ?>assets/<?=$img; ?>" width="50%" style="border-radius: 5px 5px 5px 5px; border: 5px solid <?php echo $color2; ?>;" alt="">
              </div>
            </div>
						<div class="row">
              <div class="col-lg-12" style="text-align:center;">
                <br>
                <br>
                <label>Imagen (Tamño de la imagen debe de ser 1200 x 700)</label>
                <input type="file" id="baner" name="baner" class="dropify" accept="image/*">
              </div>
						</div>
            <div class="row">
              <br>
              <br>
            </div>
            <div class="row">
              <div class="col-md-4">

              </div>
              <div class="col-md-4" style="text-align:center;">
                <label>Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control mayu"  placeholder="Ingrese el titulo" value="<?php echo $titulo; ?>">
              </div>
              <div class="col-md-2" style="margin-top:20px;">
                <label>Color texto: </label>
                <input type='text' id="custom" />
                <input type='hidden' id="color" name="color" value="<?php echo $color; ?>">
              </div>
            </div>
            <div class="row">
              <br>
              <div class="col-md-12" style="text-align:center;">
                <label>Descripción</label>
                <textarea type="text" name="descripcion" id="descripcion" class="form-control mayu"  placeholder="Ingrese una descripcion"><?php echo $descripcion ?></textarea>
              </div>
            </div>
            <div class="row m-t-12">
							<div class="form-actions col-lg-12" style="text-align:center;">
								<button type="submit" id="btn_add" name="btn_add" class="btn btn-primary m-t-n-xs"><i class="fa fa-upload"></i> Cargar</button>
							</div>
						</div>
            <input type="hidden" name="id_baner" id="id_baner" value="<?php echo $id_baner; ?>">
            <input type="hidden" name="imagen_ant" id="imagen_ant" value="<?php echo $img; ?>">
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
