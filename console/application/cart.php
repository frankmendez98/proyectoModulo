<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$this->load->helper('utilities_helper');
     $rutaProd= base_url()."assets/";
   ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" >
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
		update_cart_list(0);
		total_items_list();
		$(".quantity").attr({
		   "max" : 100000,        //value max
		   "min" : 1         // value min
		});
		//eliminar del carro
		$(document).on('click','.romove_cart',function(){
			var row_id=$(this).attr("id");
			$.ajax({
				url : "<?php echo base_url('catalogo/delete_cart');?>",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#detail_cart').html(data);
					 totales();
				}
			});
			
			update_cart_list(0);
			total_items_list();
			 totales();
		});

		$(document).on('click','.empty_cart',function(){
			var row_id=$(this).attr("id");
			$.ajax({
				url : "<?php echo base_url('catalogo/delete_all_cart');?>",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#detail_cart').html(data);
					 totales();
				}
			});
		
			update_cart_list(0);
			total_items_list();
			 totales();
		});
	
	 $(document).on('keydown keypress','.quantity', function (e) {
			//if the letter is not digit then display error and don't type anything
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       
   
			$(this).val("1");
			
		 }
		});
	

	 	$(document).on('click','.btn_qty', function(){   
			 var $button = $(this);
             var tr = $(this).parents("tr");
             var row_id =tr.find('td:eq(1)').find('#id_prod').val();
             var oldValue = parseInt(tr.find('td:eq(3)').find('#quantity').val());			 
			 var precio = tr.find('td:eq(2)').text();
			 //var subtotal=parseFloat(quantity*precio);
			 
		//var oldValue = $button.parent().find("input").val();
		
		var quantity = 0;
		var operation= $.trim($button.text());
		//alert(operation+" "+oldValue);
		if (operation == "+") {
			quantity = parseFloat(oldValue) + 1;
		} else {
		  if (oldValue > 1) {
				quantity = parseFloat(oldValue) - 1;
		   } else {
				quantity = 1;
		   }
		}
		
		var subtotal=parseFloat(quantity*precio);
		subtotal=round(subtotal,2);
		var subtotal_mostrar=subtotal.toFixed(2)
		tr.find('td:eq(4)').text(subtotal_mostrar);
		tr.find('td:eq(3)').find('#quantity').val(quantity);	

		 tr.find('td:eq(4)').text(subtotal_mostrar);
		    // tr.find('td:eq(3)').find('#quantity').val(quantity);
			
			$.ajax({
				url : "<?php echo base_url('catalogo/update_cart');?>",
				method : "POST",
				data : {row_id :row_id,qty:quantity,price:precio},
				success :function(data){
					$('#detail_cart').html(data);
				}
			});
			
			 totales();
			update_cart_list(0);
			total_items_list();
			
			
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
			 totales();
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
			 totales();
		}	
	
			//function to round 2 decimal places
	function round(value, decimals) {
	  return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
	}
	
	
	function totales(){
		  var subtotal = 0;
		  var total = 0;
		  var filas=0;
		  $("#shop-cart-det>tbody tr").each(function(index) {
			
			subtotal=$(this).find("td:eq(4)").text()
			//alert(subtotal);
			total+=parseFloat(subtotal);	
		  });
		  total=round(total,3);
		  total_mostrar="$ "+total.toFixed(2)
		
		
		  $('.totalCar').text(total_mostrar);
		   $('#totfin').text(total_mostrar);
		 
  }
	
 }) ;
  </script>
        <!-- start page title section -->
        <section class="page-title-section bg-img cover-background" data-background="img/bg/page-title.jpg">
            <div class="container">

                <div class="title-info">
                    <h1>Carro de Compras</h1></div>
                <div class="breadcrumbs-info">
                    <ul>
                        <li><a href="home-shop-1.html">Home</a></li>
                        <li><a href="shop-cart.html#!">Shop Cart</a></li>
                    </ul>
                </div>

            </div>
        </section>
        <!-- end page title section -->

        <!-- start cart table section -->
        <section>
            <div class="container">


				<div class="row">
                    <!--Start Product Table -->
                    <div class="col-12 shop-cart-table">
                        <table class="table shop-cart text-center" id="shop-cart-det">   
					                  
							<thead>
								<tr>
									 <th class="first"></th>
									<th class="text-left text-uppercase font-weight-500">Items</th>
									<th class="text-left text-uppercase font-weight-500">Precio</th>
									<th class="text-left text-uppercase font-weight-500">Cantidad</th>
									<th class="text-left text-uppercase font-weight-500">Total</th>
									<th class="text-left text-uppercase font-weight-500">Accion</th>
								</tr>
							</thead>
                            <tbody id="detail_cart">
						<?php
					$no = 0;
					foreach ($listaprod as $items) {
							$no++; 
					?>	
							<tr>
							  <td class="product-thumbnail text-left">
                                        <a class="photo" href="#"><img class="cart-thumb" src="<?php echo $items['image']?>" alt="..." ></a>
                                    </td>
                                    
							  	 <td class="text-left text-uppercase font-weight-500"><input id="id_prod" type="hidden" value="<?php echo $items['rowid']?>"/><input id="id_producto" type="hidden" value="<?php echo $items['id']?>"/><?php echo $items['name']?></td>
								 <td class="text-left"><?php echo number_format($items['price'], 2, '.', '')?></td>
									<td> 
										  <div class="col-lg-12">
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number btn_qty"  data-type="minus" data-field="">-
                                       
                                        </button>
                                    </span>
                                    <input type="text"  id="quantity" name="quantity" class="form-control col-md-4 input-number" value="<?php echo $items['qty']?>" min="1" max="1000000"  disabled />
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number btn_qty" data-type="plus" data-field="">+
                                           
                                        </button>
                                    </span>
                                </div>
                                </div>
							</td> 
									 <td class="text-left" class="totalCar"><?php echo number_format(round($items['subtotal'],2), 2, '.', '')?></td>
									 <td class="text-left"><button type="button" id="<?php echo $items['rowid']?>" class="romove_cart btn  btn btn-link btn-sm"> <i class="fas fa-trash"></i></button></td>
							</tr>
							
					<?php } ?>

					
						


                            	</tbody>
                            	<tfoot>
                            	<tr>
							<th colspan="3">Total</th>
							<th colspan="3" class="totalCar" id="totfin">$<?php echo number_format($this->cart->total(), 2, '.', '')?></th>
						</tr>
                            	</tfoot>
                        </table>
                    </div>
                    <!-- End Product Table -->

                    <!-- Start Button Set -->

                    <div class="col-12 border-bottom border-top padding-40px-tb sm-padding-20px-tb sm-margin-20px-bottom xs-margin-15px-bottom">
                        <button class="butn-style2 small bg-color xs-margin-10px-bottom empty_cart"><span>Vaciar Carrito</span></button>
                        <a href='<?=base_url("catalogo")?>' class='butn-style2 small bg-color float-right margin-10px-left xs-margin-10px-bottom go_catalog'><span>Continuar Comprando</span></a>
                        <!--button class="butn-style2 small bg-color float-right margin-10px-left xs-margin-10px-bottom go_catalog"><span>Continuar Comprando</span></button>
                        <button class="butn-style2 small bg-color float-right margin-10px-left "><span>Actualizar Carrito</span></button-->
                    </div>
                    <!-- End Button Set -->

                    <!-- Start Total Block Set -->
                    <div class="col-12 cart-total padding-40px-top sm-padding-20px-tb">
                        <div class="row">
							<div class="col-lg-5 col-md-5 xs-margin-30px-bottom">&nbsp; </div>

                            <div class="col-lg-6 offset-lg-1 col-md-7 offset-md-0">
                                <table class="table cart-sub-total" id="cart_subtotal">
                                    <tbody>
                                        <tr>
                                            <th class="text-right no-padding-right text-uppercase"> Subtotal</th>
                                           <th class="text-uppercase text-right no-padding-right totalCar"><?php echo '$'.number_format(round($this->cart->total(),2), 2, '.', '');?></th>
                                        </tr>
                                        <tr>
                                            <th class="text-right no-padding-right text-uppercase">Envio</th>
                                            <td class="text-uppercase text-right no-padding-right">Gratis</td>
                                        </tr>
                                        <tr>
                                            <td class="no-padding-right xs-no-padding" colspan="2">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <th class="text-uppercase text-right no-padding-right xs-no-padding">Total Orden</th>
                                            <th class="text-uppercase text-right no-padding-right xs-no-padding totalCar"><?php echo '$'.number_format(round($this->cart->total(),2), 2, '.', '');?></th>
                                        </tr>
                                        <tr>
                                            <td class="no-padding-right xs-no-padding" colspan="2">
                                                <hr class="no-margin-bottom">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="butn-style2 float-right" href="<?php echo base_url("checkout")?>"><span>Chequeo y Registro</span></a>
                                <!--a class="butn-style2 float-right" href="shop-checkout-address.html"><span>Chequeo y Registro</span></a-->
                            </div>
                        </div>
                    </div>
                    <!-- End Total Block Set -->

                </div>

            </div>
        </section>
        <!-- end cart table section -->

        <!-- start footer section -->
        <footer class="classic-footer bordered">

        </footer>
