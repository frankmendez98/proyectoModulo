<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-lg-4 col-sm-9 sm-margin-40px-bottom">

	<div class="account-pannel">

		<div class=" padding-25px-all sm-padding-20px-all">

			<div class="text-center">
				<div class="padding-15px-bottom">
					<img class="img-fluid rounded-circle img-thumbnail" width="50%" src="<?=base_url("assets/")?>img/avatar/user.png" alt="...">
				</div>
				<h6 class="font-size18 sm-font-size16 no-margin-bottom"><?=$row->nombre." ".$row->apellido?></h6>
				<small>Usuario desde: <?=$row->fecha?></small>
			</div>
		</div>

		<div class="list-group">
			<a class="list-group-items <?php if($url=="perfil") echo "active"; ?>" href="<?=base_url("perfil")?>"><i class="ti-user padding-10px-right"></i>Perfil</a>
			<a class="list-group-items <?php if($url=="ordenes") echo "active"; ?>" href="<?=base_url("ordenes")?>"><i class="ti-bag padding-10px-right"></i>Ordenes</a>
			<a class="list-group-items <?php if($url=="lista_deseos") echo "active"; ?>" href="<?=base_url("lista_deseos")?>"><i class="ti-heart padding-10px-right"></i>Mi lista de deseos</a>
			<a class="list-group-items <?php if($url=="cambiar_contra") echo "active"; ?>" href="<?=base_url("cambiar_contra")?>"><i class="ti-lock padding-10px-right"></i>Cambiar Contraseña</a>
		</div>

	</div>

</div>
