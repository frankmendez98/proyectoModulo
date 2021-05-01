<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('utilities_helper');
$rutaProd= base_url()."assets/";
?>




<!-- end category mp-menu -->

<!-- start page title section -->
<section class="page-title-section bg-img cover-background" data-background="<?=base_url("assets/img/bg/bg.jpg")?>">
	<div class="container">

		<div class="title-info">
			<h1> Catálogo de Productos</h1></div>
			<div class="breadcrumbs-info">
				<ul>
					<li><a href="<?=base_url()?>">Home</a></li>
					<li><a href="<?=base_url("catalogo")?>">Catalogo</a></li>
				</ul>
			</div>

		</div>
	</section>
	<!-- end page title section -->

	<!-- start product-grid section -->
	<section>
		<div class="container">
			<div class="row">

				<!-- start sidebar panel -->
				<div class="col-lg-3 col-12 side-bar order-2 order-lg-1">
					<div class="widget">
						<div class="widget-title">
							<h5>Categoria: <?php echo $cate; ?></h5>
						</div>
						<div id="accordion" class="accordion-style2">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Ver Categorias</button>

									</h5>
								</div>
								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										<ul class='listSubCat'>
											<?php if(!empty($categorias)){
												foreach($categorias as $categoria){
													$id_cat=$categoria['id_subcategoria'];
													$cat=$categoria['nombre_cat'];?>

													<li class='liCat'><input id="id_cat" class='byCat2' type='hidden' value='<?php echo $id_cat?>' /> <a class='ref' href="javascript:void(0);"><?php echo $cat?></a></li>

													<?php
												}
											}
											?>

										</ul>
									</div>
									<input id="id_cat_activo" class='byCat_active' type='hidden' value='<?php echo $id_cat_activo['id_cat_activo']?>'  />
								</div>
							</div>


						</div>
					</div>

				</div>
				<!-- end sidebar panel -->

				<!-- start right panel section -->
				<div class="col-lg-9 col-12 padding-30px-left md-padding-15px-lr order-1 order-lg-2 sm-margin-35px-bottom">

					<div class="row no-gutters align-items-center bg-light-gray rounded padding-15px-all margin-35px-bottom">

						<div class="xs-text-center"><?php echo $numrows?> registros &nbsp;&nbsp;<span>Buscar:</span> </div>

						<div class="col-12 col-md">

							<div class="row col-12" >


								<div class="col-8">
									<input type="text" id="keywords" placeholder="Escriba la descripcion de busqueda" onkeyup="searchFilter();"/>
								</div>

								<div class="col-4">
									<select id="sortBy" onchange="searchFilter();">
										<option value="">Ordenar</option>
										<option value="asc">Ascendente</option>
										<option value="desc">Descendente</option>
									</select>
								</div>


							</div>

						</div>

					</div>
					<div class="row" id="dataList">
						<div class="row col-lg-12 justify-content-center" id="contents">
							<!--?php for ($i=0;$i<3; $i++){ ?-->
							<?php if(!empty($productos)){
								foreach($productos as $producto){
									//print_r ($producto);
									if ($producto['thumb1']!=""){
										$rutaImgProd=$rutaProd.$producto['thumb1'];
									}
									else if($producto['imagen']!=""){
										$rutaImgProd=$rutaProd.$producto['imagen'];
									}
									else{
										$rutaImgProd=$rutaProd."img/productos/no_disponible.png";
									}
									//echo $rutaImgProd;
									?>
									<div class="col-11 col-sm-6 col-xl-4 margin-30px-bottom"><!--div producto-->
										<div class="product-grid">
											<div class="product-img">
												<a href="<?=base_url('producto/'.md5($producto["id_producto"]))?>">
													<div class="label-offer">Comprar! </div>
													<div class="img-prod-cat">
														<img src="<?php echo  $rutaImgProd; ?>" />
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
													<!--span class="regular-price line-through">$<?php echo $producto['precio']?></span-->
													<span class="regular-price">$ <?php echo number_format($producto['precio'],2)?></span>

												</h4>
											</div>
											<div class="row justify-content-center botones">
												<div class="col-sm-6 offset-1">
													<input class='quantity' <?php if($max > 0){  } else { echo "hidden"; } ?> type="number" name="quantity" id="<?=$producto["id_producto"]?>" value="<?=$min?>" min="<?=$min?>" max="<?=$max?>" />
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
								<!--ul-->
								<!-- Render pagination links -->
								<?php echo $this->ajax_pagination->create_links(); ?>
								<!--/ul-->
							</div>
						</div>
					</div>

				</div>
				<!-- end right panel section -->

			</div>
		</div>

		<!-- end product-grid section -->
	</section>

	<footer class="classic-footer bordered">
	</footer>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?=  base_url();?>assets/js/funciones/catalog_base.js"></script>
	<script src="<?=  base_url();?>assets/js/funciones/catalogo.js"></script>
