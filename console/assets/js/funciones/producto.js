$(document).ready(function() {
	total_items_list();
	update_cart_list(0);
		$("#qty_product").keyup(function(evt)
		{
			var value = $(this).val();
			var max = $(this).attr("max");
			if(parseInt(value) > parseInt(max))
			{
				$(this).val(max);
			}
		});
	$('.add_cart').click(function () {
		let talla = $(this).data("talla");
		let product_id = $(this).data("productid");
		let product_name = $(this).data("productname");
		let product_name_add = $(this).data("productnameadd");
		let product_price = $(this).data("productprice");
		let product_image = $(this).data("productimage");
		let quantity = $('.qty_product').val();
		if (quantity <= 0) {
			quantity = 1;
			$('.qty_product').val(1);
		}
		$.ajax({
			url: base_url + 'catalogo/add_to_cart',
			method: "POST",
			data: {
				product_id: product_id,
				product_name: product_name,
				product_name_add: product_name_add,
				talla: talla,
				product_price: product_price,
				quantity: quantity,
				image: product_image
			},
			success: function (data) {
				$('#detail_cart').html(data);
				let aviso = "El producto:" + product_name + "\n ha sido agregado:" + quantity + " unidad(es)\n";
				swal({
						title: "Aviso",
						text: aviso,
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "Ver Carrito",
						cancelButtonText: "Continuar",
						closeOnConfirm: false,
						closeOnCancel: true
					},
					function (isConfirm) {
						if (isConfirm) {
							window.location = base_url + 'catalogo/cart';
						}
						else {
							location.reload();
						}
					});
			}
		});
		total_items_list();
		update_cart_list(0);
	});

	$('.add_wish').click(function () {
		let product_id = $(this).data("productid");
		let product_name = $(this).data("productname");
		let data = "product_id="+product_id;
		$.ajax({
			type: 'POST',
			url: base_url+'catalogo/add_wishlist',
			cache: false,
			data: data,
			dataType: 'json',
			success: function (data) {
				swal({
					title: data.title,
					text: data.msg,
					type: data.type,
					showCancelButton: false,
					confirmButtonClass: "btn-primary",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
					closeOnCancel: true,
					},
					function (isConfirm) {
						if (isConfirm) {
							notification(data.type,data.title,data.msg);
							if (data.type == "success") {
								setTimeout("reload();", 1500);
							}
						}
					});
			},
		});
	});
	$('#talla').change(function () {
		let product_id = $(this).attr("id_producto");
		let talla = $(this).val();
		if(talla !="")
		{
			let data = "product_id="+product_id+"&talla="+talla;
			$.ajax({
				type: 'POST',
				url: base_url+'catalogo/stock_talla',
				cache: false,
				data: data,
				dataType: 'json',
				success: function (data) {
					if(data.stock>0)
					{
						var stock = data.stock;
						$("#moscar").removeAttr("hidden");
						$("#moscar").attr("data-talla",talla);
						$("#moscar").attr("data-productnameadd","Talla "+data.descripcion);
						$("#stock_si").removeAttr("hidden");
						$("#stocksi_txt").text("En existencia: "+stock);
						$("#qty_product").removeAttr("hidden");
						$("#qty_product").attr("max",stock);
						$("#qty_product").attr("min",1);
						$("#qty_product").val(1);
						$("#stock_no").attr("hidden",true);
					}
					else {
						$("#qty_product").attr("hidden",true);
						$("#moscar").attr("hidden",true);
						$("#moscar").attr("data-talla","0");
						$("#moscar").attr("data-productnameadd","");
						$("#stock_si").attr("hidden",true);
						$("#stock_no").removeAttr("hidden");
						$("#qty_product").attr("min",0);
						$("#qty_product").attr("max",0);
						$("#qty_product").val(0);
				}
			},
			});
		}
		else {
			$("#qty_product").attr("hidden",true);
			$("#moscar").attr("hidden",true);
			$("#moscar").attr("data-talla","0");
			$("#moscar").attr("data-productnameadd","");
			$("#stock_si").attr("hidden",true);
			$("#stock_no").attr("hidden", true);
			$("#qty_product").attr("min",0);
			$("#qty_product").attr("max",0);
			$("#qty_product").val(0);
		}
	});

	$('.remove_wish').click(function () {
		let product_id = $(this).data("productid");
		let data = "product_id="+product_id;
		swal({
			title: "Aviso",
			text: "Estas seguro de eliminar de la lista de deseos?!",
			type: "error",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Aceptar",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false,
			closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					$.ajax({
						type: "POST",
						url: base_url+'catalogo/remove_wishlist',
						data: data,
						dataType: 'json',
						success: function (data) {
							notification(data.type,data.title,data.msg);
							if (data.type == "success") {
								setTimeout("reload();", 1500);
							}
						}
					});
				}
			});
	});

});

function reload() {
	location.reload();
}
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
document.getElementById('links-div').onclick = function (event) {
	event = event || window.event
	var target = event.target || event.srcElement,
		link = target.src ? target.parentNode : target,
		options = { index: link, event: event },
		links = this.getElementsByTagName('a')
	blueimp.Gallery(links, options)
}
