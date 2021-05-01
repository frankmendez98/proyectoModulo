$(document).ready(function() {
	 total_items_list();
	 update_cart_list(0);

	 $('ul.listCat li').click(function(e){
		var idCat=($(this).find("#id_cat").val());
		fun  = 0;
		if($(this).find("#id_cat").hasClass("subt"))
		{
			fun = 1;
		}
		$("#id_cat_activo").val(idCat);
		$('#keywords').val("");
		if(fun)
		{
			$.ajax({
					type: 'POST',
					url: base_url+'catalogo/getParamSubCat',
					data:{cat:idCat},
					 dataType: 'json',
					success: function(data){
						var cat_param=data.cat;
						reload1(cat_param);
					}
				});
		}
		else {
		$.ajax({
				type: 'POST',
				url: base_url+'catalogo/getParamCat',
				data:{cat:idCat},
				 dataType: 'json',
				success: function(data){
					var cat_param=data.cat;
					reload(cat_param);

				}
			});
		}

		//searchFilter(0,idCat);
     });

		$('ul.listSubCat li').click(function(e){
		var idCat=($(this).find("#id_cat").val());

		$("#id_cat_activo").val(idCat);
		$('#keywords').val("");
		$.ajax({
				type: 'POST',
				url: base_url+'catalogo/getParamSubCat',
				data:{cat:idCat},
				 dataType: 'json',
				success: function(data){
					var cat_param=data.cat;
					reload1(cat_param);
				}
			});

		//searchFilter(0,idCat);
     });

	 /*$(".quantity").attr({
       "max" : 100000,        //value max
       "min" : 1         // value min
     });
	$(document).on('keydown keypress','.quantity', function (e) {
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$(this).val("1");
		 }
	});*/
	//$(document).on('click','.add_cart', function (e) {
	$('.add_cart').unbind("click").on('click', function(e){
			var product_id    = $(this).data("productid");
			//var product_name  =($(this).find("#id_cat").val());
			//var product_name  = $(this).data("productname");
			var product_name  = $(this).data("productname").replace("#","");
			var product_price = $(this).data("productprice");
			var product_image=$(this).data("productimage");
			var quantity   	  = $('div .botones').find('#'+product_id).val();

			if	(quantity<=0){
				quantity=1;
				 $('div .botones').find('#'+product_id).val(1)
				}
			$.ajax({
			url: base_url+'catalogo/add_to_cart',
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
		$('#detail_cart').load(base_url+'catalogo/load_cart_page');
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
				}
			});
			total_items_list();
			update_cart_list(0);
		});

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

	$('.add_wish').unbind("click").click(function (e) {
		e.preventDefault()
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
	function getQueryCat() {
		let params = new URLSearchParams(location.search);
		var categoria = params.get('cat');
		if(params!="" || categoria!="" || categoria.length>0){
			$.ajax({
				type: 'POST',
				url: base_url+'catalogo/getIdCat',
				data:{cat:categoria},
				 dataType: 'json',
				success: function(data){
					var idCat=data.idCat;
					if (idCat!=0){
						$("#id_cat_activo").val(idCat);
						searchFilter(0,idCat)
					}
				}
			});
		}
	}
		//  filtro de busqueda
		function searchFilter(page_num,idCat){
			page_num = page_num?page_num:0;
			var idCat= $("#id_cat_activo").val();
			var keywords = $('#keywords').val();
			if (keywords!="" ){
				$("#id_cat_activo").val("");
				idCat="";
			}
			if(idCat=='-1'){
				 idCat="";
			}
			var sortBy = $('#sortBy').val();
			//if (idCat=""){
				$.ajax({
					type: 'POST',
					//url: "<?php echo base_url('catalogo/ajaxPaginationData/'); ?>"+page_num,
					url: base_url+'catalogo/ajaxPaginationDataSub/'+page_num,
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
function reload(Cat) {
	location.href = base_url+'catalogo/cat/'+Cat;
}
function reload1(Cat) {
	location.href = base_url+'catalogo/subcat/'+Cat;
}
