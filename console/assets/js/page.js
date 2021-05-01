$(document).ready(function() {
	update_cart_list(0);
	total_items_list();
	$(document).on('keypress','.searching', function (e){
		var valor=$(this).val();
		if(e.which == 13) {
			var url1= base_url+'catalogo/search/'+valor;
			
			 setTimeout("reloadSearch('" +valor + "');", 500);
		}
		
	}); 	
});	
function reloadSearch(valor) {
	
	location.href = base_url+'catalogo/search/'+valor;
}
//  filtro de busqueda
		function searchFilter(page_num,idCat,keywords ){
			page_num = page_num?page_num:0;
			$('#keywords').val(keywords);	
			; 
			if (keywords!="" ){
				$("#id_cat_activo").val("");
				idCat="";
			}
			if(idCat=='-1'){
				 idCat="";
			}
			var sortBy = $('#sortBy').val();
			   
				$.ajax({
					type: 'POST',
					//url: "<?php echo base_url('catalogo/ajaxPaginationData/'); ?>"+page_num,
						url: base_url+'catalogo/ajaxPaginationData/'+page_num,
					data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&byCat='+idCat,
					beforeSend: function(){
						$('.loading').show();
					},
					success: function(html){
						$('.catalog').html(html);
						$('.loading').fadeOut("slow");
					}
				});
		}

function notification(type, title, message){
	if(type=="success" || type=="Success"){
		iziToast.success({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
	else if(type=="info" || type=="Info"){
		iziToast.info({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
	else if(type=="warning" || type=="Warning"){
		iziToast.warning({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
	else if(type=="error" || type=="Error"){
		iziToast.error({
			title: title,
			message: message,
			position: 'topRight',
		});
	}
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
