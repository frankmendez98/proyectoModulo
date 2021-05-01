$(document).ready(function() {
	 getQueryCat();	
});	
function getQueryCat() {
	alert(location.pathname.split('/').pop())/// alerts 1
	let params = new URLSearchParams(location.search);
	var categoria = params.get('cat');
	if(params!="" || categoria!="" || categoria.length>0){
		$.ajax({
			type: 'POST',
			//url : "<?php echo base_url('catalogo/getIdCat');?>",
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
			$('#dataList').html(html);
			$('.loading').fadeOut("slow");
		}
	});
}
