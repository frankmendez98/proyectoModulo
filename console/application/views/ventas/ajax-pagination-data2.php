
	   <?php   $rutaProd= base_url()."assets/";?>  
							 <?php if(!empty($productos)):
							 // for ($i=0;$i<2; $i++){
								  
								   ?>  
							<?php foreach($productos as $producto){
								$rutaImgProd=$rutaProd.$producto['imagen'];
								if ($producto['imagen']==""){
												$rutaImgProd=$rutaProd."img/productos/no_disponible.png";
								}
								
							?>
             
                              
					
								<div class="col-11 col-sm-6 col-xl-4 margin-30px-bottom"><!--div producto-->
									<div class="product-grid">
										<div class="product-img">
												<a href="shop-product-detail.html">
												<div class="label-offer bg-red">Comprar! </div>
												<img src="<?php echo img_exist($rutaImgProd); ?>" /></a>										
										</div>
										<div class="product-description">									
										   <a href="shop-product-detail.html">
												<?php 
												$desc_array=cadenaenlineas(trim($producto['descripcion']),24,4);
												$tmplinea = array();
												$n=0;				
												foreach($desc_array as $total_txt1){											
													echo $total_txt1."<br>";
													$n++;
												}
												if($n<=4){
													salto($n);
												}
												?>
											</a>
											<h4 class="price">
															<span class="regular-price line-through">$<?php echo $producto['precio']?></span>
															<span class="offer-price">$ <?php echo $producto['precio']?></span>
											  </h4>
										</div>
										<div class="product-buttons">
											<ul>
												<li><a href="shop-product-grid.html#!" class="btn-link" title="A Lista de Deseos"><i class="far fa-heart"></i></a></li>
												<li><a href="shop-product-grid.html#!" class="btn-link" title="Agregar a CArro"><i class="fas fa-shopping-cart"></i></a></li>
											   
												<li><a href="shop-product-grid.html#!" class="btn-link" title="Add To Compare"><i class="fas fa-random"></i></a></li>
											</ul>
										</div>
									</div>
									</div><!--fin div producto-->
									<?php }?>
							<!--?php }?-->
							<?php else: ?>
								<p>Registros no encontrados</p>
							<?php endif; ?>
							<div class="row col-12 col-lg">
							<div class="pagination text-small text-uppercase text-extra-dark-gray margin-20px-top sm-margin-15px-top">
								<ul class="pagination pull-center">							
									<!-- Render pagination links -->
									<?php echo $this->ajax_pagination->create_links(); ?>
								</ul>
						 </div>
						</div>

                        </div>
						
 <!--/div-->
       


 <?php   
function cadenaenlineas( $text, $width = '32', $lines = '10', $break = '\n', $cut = 0 ) {
      $wrappedarr = array();
      $wrappedtext = wordwrap( $text, $width, $break , true );
       $wrappedtext = trim( $wrappedtext );
      $arr = explode( $break, $wrappedtext );
     return $arr;
}
function salto($n){
	$ln=4-$n;
	for($i=0;$i<$ln;$i++){
	 echo "&nbsp;"."<br>";
 }
	}
	function img_exist($url = NULL)
{
    if (!$url) return FALSE;
$rutaProd= base_url()."assets/";
    $noimage = 'img/productos/no_disponible.png';
    $noimage=$rutaProd."img/productos/no_disponible.png";
    $headers = get_headers($url);
    return stripos($headers[0], "200 OK") ? $url : $noimage;
}
?>
