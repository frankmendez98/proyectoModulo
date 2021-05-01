$(document).ready(function() {
	var ya = $("#yaimg").val();
	console.log(ya);
	if(ya == "0")
	{
		$("#mainimage").click();
	}
	$('.add_cart').click(function () {
		var product_id = $(this).data("productid");
		var product_name = $(this).data("productname");
		var product_name = $(this).data("productname");
		var product_price = $(this).data("productprice");
		var product_image = $(this).data("productimage");
		var quantity = $('div .botones').find('#' + product_id).val();
		if (quantity <= 0) {
			quantity = 1;
			$('div .botones').find('#' + product_id).val(1)
		}
		$.ajax({
			url: base_url + 'catalogo/add_to_cart',
			method: "POST",
			data: {
				product_id: product_id,
				product_name: product_name,
				product_price: product_price,
				quantity: quantity,
				image: product_image
			},
			success: function (data) {
				$('#detail_cart').html(data);
				var aviso = "El producto:" + product_name + "\n ha sido agregado:" + quantity + " unidad(es)\n";
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
					});
			}
		});
		update_cart_list(product_id);
			total_items_list();
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
				//let aviso = "El producto:" + product_name + "\n ha sido agregado a la lista de deseos\n";
				swal({
					title: data.title,
					text: data.msg,
					type: data.type,
					showCancelButton: false,
					confirmButtonClass: "btn-primary",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
					closeOnCancel: true
				});
			},
		});
	});
});
document.getElementById('links-div').onclick = function (event) {
	event = event || window.event
	var target = event.target || event.srcElement,
		link = target.src ? target.parentNode : target,
		options = { index: link, event: event },
		links = this.getElementsByTagName('a')
	blueimp.Gallery(links, options)
}
