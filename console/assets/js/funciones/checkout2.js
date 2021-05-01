 $(document).ready(function() {
	//alert("En chequeo...");
	update_cart_list(0);
	total_items_list();
	console.log("En chequeo 2...");

	$(".ship-table>tbody tr").each(function(index) {
		if ($(this).find("td:eq(0)").find('input[name=shipping-method]:checked').length > 0){
			var costoenvio = $(this).find("td:eq(2)").find('.costoEnt').val();
			$("#total_envio").val(costoenvio);
			show_total(costoenvio);
		}
	});


	$(document).on('change','.radio_entrega', function () {
			var tr = $(this).parents("tr");
			var costoenvio = tr.find("td:eq(2)").find('.costoEnt').val();
			$("#total_envio").val(costoenvio);
			show_total(costoenvio);

	});

	$(document).on('click','#btnShipp', function () {
			send_order();

	});
});
function show_total(costoenvio){

			var subtotal=$("#subtotal").val();
			$("#total_envio").val(costoenvio);
			$(".totalEnvio").text("$ "+costoenvio);
			var totalfinal=parseFloat(costoenvio)+parseFloat(subtotal);
			$("#totalFinal").val(totalfinal.toFixed(2));
			$(".totalFinal_td").text("$ "+totalfinal.toFixed(2));

}
function reload() {
	location.href = base_url+"checkout/shipping";
}
function send_order(){
	var id_usuario=$('#id_user').val();
	var subtotal=$("#subtotal").val();
	var total_envio=$("#total_envio").val();
	var entrega=0;

	$(".ship-table>tbody tr").each(function(index) {
		if ($(this).find("td:eq(0)").find('input[name=shipping-method]:checked').length > 0){
			  entrega=$(this).find("td:eq(0)").find('input[name=shipping-method]:checked').val();
		}
	});


	 // alert(entrega);

	var datos="id_cliente="+id_usuario+"&total_envio="+total_envio+"&entrega="+entrega;
	 $.ajax({
      type: 'POST',
      url: base_url+"Checkout/guardar_orden",
      data: datos,
      success: function(datax)
      {
        console.log("Lego");
        location.replace(base_url+"Checkout/payment");

      }
    });
}

	//actualizar lista de carrito
	function update_cart_list(product_id){
		$.ajax({
			url: base_url+'catalogo/update_cart_list',
			method : "POST",
			data : {row_id : product_id},
			success :function(data){
				$('.cart-list').html(data);
			}
		});
	}
	//actualizar total items carrito
	function total_items_list(){
		$.ajax({
			url: base_url+'catalogo/total_items_list',
			method : "POST",
			data : {row_id : 0},
			success :function(data){
				$('.badge_items').html(data);
			}
		});
	}
