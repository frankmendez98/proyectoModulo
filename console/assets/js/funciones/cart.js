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
				//url : "<?php echo base_url('catalogo/delete_cart');?>",
				url: base_url+'catalogo/delete_cart',
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
			//	url : "<?php echo base_url('catalogo/delete_all_cart');?>",
				url: base_url+'catalogo/delete_all_cart',
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

	 /*$(document).on('keydown keypress','.quantity', function (e) {
			//if the letter is not digit then display error and don't type anything
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {


			$(this).val("1");
			//alert("Aca qty..")
		 }
	 });*/


		$(document).on('click','.btn_qty', function(e){
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var tr = $(this).parents("tr");
			var row_id =tr.find('td:eq(1)').find('#id_prod').val();
			var row_ida =tr.find('td:eq(1)').find('#id_producto').val().split("_");
			var	row_talla = row_ida[1];
			var	row_ids = row_ida[0];
			var oldValue = parseInt(tr.find('td:eq(3)').find('#quantity').val());
			var preci = tr.find('td:eq(2)').children("#product_price").text();
			var precio = preci.split("$");
			var pprecio =tr.find('td:eq(2)').find("#pprice").val();
			var quantity = parseFloat(oldValue) ;
			if(quantity<=0)
				quantity=1;

				//var subtotal=parseFloat(quantity*precio[1]);
				var subtotal=parseFloat(quantity*pprecio);
				subtotal=round(subtotal,2);
				var subtotal_mostrar=subtotal.toFixed(2)
				tr.find('td:eq(4)').text(subtotal_mostrar);
				tr.find('td:eq(3)').find('#quantity').val(quantity);

				 tr.find('td:eq(4)').text(subtotal_mostrar);
				  tr.find('td:eq(4)').find("#subtot").val(subtotal);
					$.ajax({
						//url : "<?php echo base_url('catalogo/update_cart');?>",
						url: base_url+'catalogo/update_cart',
						method : "POST",
						data : {row_id :row_id,row_ids :row_ids,row_talla :row_talla,qty:quantity,price:precio[1]},
						success :function(data){
							$('#detail_cart').html(data);
							totales();
							update_cart_list(0);
							total_items_list();
						}
					});

    });

 }) ;

	//function to round 2 decimal places
	function round(value, decimals) {
	  return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
	}
		function totales(){
		  var subtotal = 0;
		  var minimo = parseFloat($("#minimopago").val());
		 // var subtot=0;
		  var total = 0;
		  var filas=0;
		  $("#shop-cart-det>tbody tr").each(function(index) {
			var precio =$(this).find('td:eq(2)').find("#pprice").val();
			var quantity=$(this).find('td:eq(3)').find('#quantity').val()
				 subtotal=parseFloat(quantity*precio);


			total+=parseFloat(subtotal);
		  });
		  total=round(total,3);
		  total_mostrar="$ "+total.toFixed(2)

			if(total >= minimo)
			{
				$(".btncheckout").attr("hidden",false);
				$(".spancheckout").attr("hidden",true);
			}
			else {
				$(".btncheckout").attr("hidden",true);
				$(".spancheckout").attr("hidden",false);
			}

		  $('.totalCarrito').text(total_mostrar);
		  $('#totfin').text(total_mostrar);

  }
		function update_cart_list(product_id){
			$.ajax({
				//url : "<?php echo base_url('catalogo/update_cart_list');?>",
				url: base_url+'catalogo/update_cart_list',
				method : "POST",
				data : {row_id : product_id},
				success :function(data){
					$('.cart-list').html(data);
					totales();
				}
			});
		}
		function total_items_list(){
			$.ajax({
				//url : "<?php echo base_url('catalogo/total_items_list');?>",
				url: base_url+'catalogo/total_items_list',
				method : "POST",
				data : {row_id : 0},
				success :function(data){
					$('.badge_items').html(data);
				}
			});
			 totales();
		}
function reload() {
	location.href = base_url+"catalogo/cart";
}
