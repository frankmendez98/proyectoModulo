<!DOCTYPE html>
<html lang="en">

<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Multipurpose Business and Admin HTML5 Template" />
    <meta name="description" content="Smartshop - Multipurpose eCommerce Template" />

    <!-- title  -->
   <?php  
   $title="Tienda en Linea -OSS";
     $rutaProd= base_url()."assets/";
   ?>
    <title><?php echo $title?></title>

    <!-- favicon -->
     <link href="<?php echo base_url(); ?>application/assets/img/logos/favicon.png" rel="icon" type="image/png">
   
    <link rel="apple-touch-icon"  href="<?php echo base_url(); ?>assets/img/logos/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/img/logos/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114"  href="<?php echo base_url(); ?>assets/img/logos/apple-touch-icon-114x114.png">

    <!-- plugins -->
    
     <!--link rel="stylesheet"  href="<!--?php echo base_url(); ?>assets/css/plugins/bootstrap.min.css"-->
    <link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/plugins.css">

    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" >


<!-- Search form -->
<script>
function searchFilter(page_num){
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('ventas2/ajaxPaginationData/'); ?>'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function(){
            $('.loading').show();
        },
        success: function(html){
            $('#dataList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>
</head>
<div class="post-search-panel">
	<input type="text" id="keywords" placeholder="Type keywords to filter posts" onkeyup="searchFilter();"/>
	<select id="sortBy" onchange="searchFilter();">
		<option value="">Sort by Title</option>
		<option value="asc">Ascending</option>
		<option value="desc">Descending</option>
	</select>
</div>

<div class="post-list" id="dataList">
	<!-- Display posts list -->
	<?php if(!empty($ventas)){ foreach($ventas as $row){ ?>
		<div class="list-item"><a href="#"><?php echo $row["descripcion"]; ?></a></div>
	<?php } }else{ ?>
		<p>Post(s) not found...</p>
	<?php } ?>
	
	<!-- Render pagination links -->
	<?php echo $this->ajax_pagination->create_links(); ?>
</div>

<!-- Loading Image -->
<div class="loading" style="display: none;">
	<!--div class="content"><img src="<!--?php echo base_url('assets/images/loading.gif'); ?>"/></div-->
</div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery-migrate.min.js"></script>

    <!-- Java script -->
    <script src="<?= base_url(); ?>assets/js/core.min.js"></script>

    <!-- custom scripts -->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
