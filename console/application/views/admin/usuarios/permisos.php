<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox" id="main_view">
				<div class="ibox-title">
					<h3 class="text-navy"><b><i class="fa fa-plus-circle"></i> Permisos de Usuario</b></h3>
				</div>
				<div class="ibox-content">
					<form>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group single-line">
									<label>Nombre</label>
									<input type="text" class="form-control" disabled value="<?=$row->nombre?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group single-line">
									<label>Usuario</label>
									<input type="text" class="form-control" disabled value="<?=$row->usuario?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group single-line">
									<label for="admin">Administrador</label>
									<div class="checkbox m-r-xs">
										<?php if($row->admin==1): ?>
											<input id="admin_chk" type="checkbox" name="admin_chk" checked>
										<?php else:?>
											<input id="admin_chk" type="checkbox" name="admin_chk">
										<?php endif;?>
										<label for="admin_chk">
											Todos los permisos
										</label>
									</div>
								</div>
							</div>

						</div>
						<div class="row m-t-10">

							<?php foreach($menus as $rows):?>
								<div class="col-lg-3">
									<div class="panel panel-primary">
										<div class="panel-heading"><?=$rows->nombre?></div>
										<div class="panel-body">
											<?php foreach ($controller[$rows->id_menu] as $control):?>
												<div class="checkbox m-r-xs">
													<input type="checkbox" id="chbController<?=$control->id_modulo?>" name="chbController" value="<?=$control->id_modulo?>" class="checkboxes"
														<?php
														if($row->admin==1) echo "checked='true'";
														else{
															$has=false;
															if(isset($permissions_user)){
																foreach ($permissions_user as $us){
																	if($us->id_modulo==$control->id_modulo) $has=true;
																}
																if($has==true)echo "checked='true'";
																$has=false;
															}
														}
														?>
													>
													<label for="chbController<?=$control->id_modulo?>"> <?=$control->nombre?></label>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							<?php endforeach;?>

						</div>

						<div class="row">
							<div class="form-actions col-lg-12">
								<button type="submit" id="btn_save" class="btn btn-primary m-t-n-xs pull-right"><i class="fa fa-save"></i>
									Guardar Registro
								</button>
								<input type="hidden" name="id_usuario" id="id_usuario" value="<?=$row->id_usuario?>">
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
