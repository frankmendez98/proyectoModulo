<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$this->load->helper('utilities_helper');
     $rutaProd= base_url()."assets/";
   ?>

		<div class="row col-lg-12 justify-content-center" id="contents">
				<?php if(!empty($productos)){
				foreach($productos as $producto){
					if ($producto['thumb1']!=""){
						$rutaImgProd=$rutaProd.$producto['thumb1'];
					}
					else if($producto['imagen']!=""){
						$rutaImgProd=$rutaProd.$producto['imagen'];
					}
					else{
						$rutaImgProd=$rutaProd."img/productos/no_disponible.png";
					}
			?>
			<div class="col-11 col-sm-6 col-xl-4 margin-30px-bottom"><!--div producto-->
				<div class="product-grid">
				<div class="product-img">
					<a href="<?=base_url('producto/'.md5($producto["id_producto"]))?>">
						<div class="label-offer">Comprar! </div>
							<div class="img-prod-cat">
							<img src="<?php echo $rutaImgProd; ?>" />
							</div>
					</a>
				</div>
				<div class="product-description">
					<a href="<?=base_url('producto/'.md5($producto["id_producto"]))?>">
						<?php
						$desc_array=divtextlin(trim($producto['descripcion']),24,4);
						$tmplinea = array();
						$n=0;
						foreach($desc_array as $total_txt1){
							echo $total_txt1."<br>";
							$n++;
						}
						if($n<=4){
							salto(4,$n);
						}
						$max = 1000;
						$min = 1;
						?>
					</a>
					<?php if($producto["tipo_producto"] == "FISICO"){ ?>
						<h4 class="price">
							<!--span class="regular-price line-through">$<?php echo $producto['precio']?></span-->
							<?php if($producto['talla']){ $max=0;  ?>
								<a href="<?=base_url('producto/'.md5($producto["id_producto"]))?>">	<span class="text-success">Ver tallas</span></a>
							<?php } else {  ?>
							<?php if($producto['stock']>0){ $max = number_format($producto["stock"]); $min=1; ?>
								<a href="<?=base_url('producto/'.md5($producto["id_producto"]))?>">	<span class="text-success">En existencia: <?php echo number_format($producto['stock'],0); ?></span></a>
						<?php } else { $min = 0;  $max=0; ?>
							<span class="text-danger">Agotado</span>
						<?php } ?>
						</h4>
				<?php } } else { salto(1,1);  }?>

					<h4 class="price">
						<!--span class="regular-price line-through">$<!--?php echo $producto['precio']?></span-->
						<span class="regular-price">$ <?php echo number_format($producto['precio'],2)?></span>
					</h4>
				</div>
					<div class="row justify-content-center botones">
						<div class="col-sm-6 offset-1">
							<input class='quantity' <?php if($max > 0){  } else { echo "hidden"; } ?> type="number" name="quantity" id="<?=$producto["id_producto"]?>" value="<?=$min?>" min="<?=$min?>" max="<?=$max?>"/>
						</div>
						<div class="col-sm-4">
							<div class="row">
								<div class="col-6 text-left" style="padding-left: 0px">
									<?php if($max > 0): ?>
									<a class="add_cart btn btn-link" style="color: #03a9f5; font-size: 22px;" data-productid="<?=$producto["id_producto"]?>"
									   data-productname="<?=$producto["descripcion"]?>" data-productimage="<?=$rutaImgProd?>"
									   data-productprice="<?=$producto["precio"];?>">
										<i class="fas fa-shopping-cart"></i>
									</a>
								<?php endif; ?>
								</div>
								<div class="col-6 text-center" style="padding-left: 0px">
									<a class="add_wish btn btn-link" title="A Lista de Deseos" style="color:#ff0000;font-size: 22px;"
									   data-productid="<?=$producto["id_producto"]?>"><i class="far fa-heart"></i></a>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div><!--fin div producto-->
			<?php }?>
		<?php }?>

	</div>
		<div class="row col-lg-12 justify-content-center">
				<div class="pagination text-small text-uppercase text-extra-dark-gray margin-20px-top sm-margin-15px-top">
					<ul>
						<!-- Render pagination links -->
						<?php echo $this->ajax_pagination->create_links(); ?>
					</ul>
				</div>
			</div>
	</div>

</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?=  base_url();?>assets/js/funciones/catalogo.js"></script>
