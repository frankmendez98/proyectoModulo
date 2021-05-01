
<?php   
	$this->load->helper('utilities_helper');
	$rutaProd= base_url()."assets/";?>  
							<div class="row col-lg-12 justify-content-center" id="contents">
								 <?php if(!empty($productos)){
									foreach($productos as $producto){
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
                                               <div class="img-prod-cat">
												<img src="<?php echo img_exist($rutaImgProd);?>" />
											  </div>	
                                        </a>
                                    </div>
                                    <div class="product-description">										
                                       <a href="shop-product-detail.html">
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
											?>
                                        </a>
                                        <h4 class="price">
                                                       <!--span class="regular-price line-through">$<!--?php echo $producto['precio']?></span-->
                                                        <span class="regular-price">$ <?php echo $producto['precio']?></span>
                                        </h4>
                                    </div>
                                     <div class="row col-md justify-content-center botones">
                                      <!--ul-->
                                            <!--li><a href="shop-product-grid.html#!" class="btn-link" title="A Lista de Deseos"><i class="far fa-heart"></i></a></li-->
                                        <div class="col-8 "><input class='quantity' type="number" name="quantity" id="<?php echo $producto['id_producto'];?>" value="1" /></div>
                                       <div class="col-4"><button class="add_cart btn btn-link" data-productid="<?php echo $producto['id_producto'];?>" data-productname="<?php echo $producto['descripcion'];?>" data-productimage="<?php echo $rutaImgProd;?>" data-productprice="<?php echo $producto['precio'];?>"><i class="fas fa-shopping-cart"></i></button></div>
                                     
                                      <!--/ul-->
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
 
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>    
<script>
 $(document).ready(function() {
	 total_items_list();
	 update_cart_list(0);
	
	 $('ul.listCat li').click(function(e){ 
		var idCat=($(this).find("#id_cat").val());
		$("#id_cat_activo").val(idCat);
		$('#keywords').val("");
		console.log("aca:"+idCat);
		searchFilter(0,idCat);		
     });

	 $(".quantity").attr({
       "max" : 100000,        //value max
       "min" : 1         // value min
     });   
	 $('.add_cart').click(function(){
			var product_id    = $(this).data("productid");
			//var product_name  =($(this).find("#id_cat").val());
			var product_name  = $(this).data("productname");
			var product_name  = $(this).data("productname");
			var product_price = $(this).data("productprice");
			var product_image=$(this).data("productimage");
			var quantity   	  = $('div .botones').find('#'+product_id).val();			
			$.ajax({
				url : "<?php echo base_url('catalogo/add_to_cart');?>",
				method : "POST",
				data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity,image:product_image},
				success: function(data){
					$('#detail_cart').html(data);
					
					var aviso="El producto:"+product_name+"\n ha sido agregado:"+quantity+" unidad(es)\n";
					swal({
						title: "Aviso",
						text: aviso,
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "Ver Carrito",
						cancelButtonText:"Continuar" ,
						closeOnConfirm: false,
						closeOnCancel: true
					  },
					  function(isConfirm) {
						if (isConfirm) {
							var url1=base_url+'catalogo/cart';
							
							 window.location =url1;
						}
					  });				  	
				}
			});
		
			update_cart_list(product_id);
			total_items_list()
		});
		$('#detail_cart').load("<?php echo base_url('catalogo/load_cart_page');?>");
		//eliminar del carro
		$(document).on('click','.romove_cart',function(){
			var row_id=$(this).attr("id"); 
			$.ajax({
				url : "<?php echo base_url('catalogo/delete_cart');?>",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#detail_cart').html(data);
				}
			});
			total_items_list();
			update_cart_list(0);
		});

		function update_cart_list(product_id){	
			$.ajax({
				url : "<?php echo base_url('catalogo/update_cart_list');?>",
				method : "POST",
				data : {row_id : product_id},
				success :function(data){
					$('.cart-list').html(data);
				}
			});		
		}
		function total_items_list(){
			$.ajax({
				url : "<?php echo base_url('catalogo/total_items_list');?>",
				method : "POST",
				data : {row_id : 0},
				success :function(data){
					$('.badge_items').html(data);
				}
			});
		}
		//  filtro de busqueda
		function searchFilter(page_num,idCat){
			page_num = page_num?page_num:0;
			var idCat= $("#id_cat_activo").val();		
			var keywords = $('#keywords').val();
			if (keywords!="" ){
			 idCat="";
			}
			if(idCat=='-1'){
				 idCat="";
			}
			var sortBy = $('#sortBy').val();		   
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('catalogo/ajaxPaginationData/'); ?>'+page_num,
				data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&byCat='+idCat,
				beforeSend: function(){
					$('.loading').show();
				},
				success: function(html){
					$('#dataList').html(html);
					$('.loading').fadeOut("slow");
				}
			});
		}
	});
</script>
