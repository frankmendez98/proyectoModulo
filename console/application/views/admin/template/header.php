<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?= base_url(); ?>assets/admin/img/logo.png" rel="icon" type="image/png">

	<title>TDM | Consola de Admistacion</title>

	<!-- CSS -->
	<link href="<?= base_url(); ?>assets/admin/css/bootstrap.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/modals.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/waiting.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/steps.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/typeahead.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/css/util.css">

	<!-- Toastr style -->
	<!--<link href="<? /*=base_url();*/ ?>assets/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">
  <link href="<? /*=base_url();*/ ?>assets/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">-->

	<!-- Plugins -->
	<link href="<?= base_url(); ?>assets/admin/css/plugins/select2/select2.min.css" rel="stylesheet">
	<link href="<?= base_url("assets/admin/libs/sweetalert2/sweetalert2.min.css") ?>" rel="stylesheet">
	<link href="<?= base_url("assets/admin/libs/izitoast/iziToast.min.css") ?>" rel="stylesheet">
	<link href="<?= base_url("assets/admin/libs/parsley/parsley.css") ?>" rel="stylesheet">
	<!-- Gritter -->

	<!-- Data Tables -->
	<link href="<?= base_url(); ?>assets/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

	<!--<link rel="stylesheet" href="<?/*= base_url(); */?>assets/admin/css/plugins/fileinput/fileinput.css"/>
	<link rel="stylesheet" href="<?/*= base_url(); */?>assets/admin/css/plugins/fileinput/themes/explorer-fa/theme.css"/>-->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/plugins/timepicker/mdtimepicker.css"/>

	<link href="<?= base_url(); ?>assets/admin/css/main.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/animate.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/css/util.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/timeline.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/css/spectrum.css">


	<!-- JS --->
	<!-- Mainly scripts -->
	<script src="<?= base_url(); ?>assets/admin/js/plugins/jquery/jquery-2.1.1.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/jquery.mask.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/jquery.mask.min.js"></script>
	<!--<script src="<? /*=base_url();*/ ?>assets/admin/js/plugins/validate/jquery.validate.min.js"></script>-->
	<script src="<?= base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
	<!-- <script src="<? /*=base_url();*/ ?>assets/admin/js/plugins/sweetalert/sweetalert.min.js"></script>-->
	<script src="<?=base_url(); ?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url(); ?>assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Flot -->
	<script src="<?= base_url(); ?>assets/admin/js/plugins/iCheck/icheck.min.js"></script>
	<!-- Peity -->
	<!--<script src="<? /*=base_url();*/ ?>assets/admin/js/plugins/peity/jquery.peity.min.js"></script>-->
	<!-- jQuery UI -->
	<script src="<?= base_url(); ?>assets/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- GITTER -->
	<!--<script src="<? /*=base_url();*/ ?>assets/admin/js/plugins/gritter/jquery.gritter.min.js"></script>-->
	<!-- Sparkline -->
	<!--<script src="<? /*=base_url();*/ ?>assets/admin/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<? /*=base_url();*/ ?>assets/admin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src='<? /*=base_url();*/ ?>assets/admin/js/plugins/arrowtable/arrow-table.js'></script>-->

	<!-- PLUGINS -->
	<script src="<?= base_url(); ?>assets/admin/js/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url("assets/admin/libs/sweetalert2/sweetalert2.min.js") ?>"></script>
	<script src="<?= base_url("assets/admin/libs/izitoast/iziToast.min.js") ?>"></script>
	<script src="<?= base_url("assets/admin/libs/parsley/parsley.min.js") ?>"></script>
	<script src="<?= base_url("assets/admin/libs/parsley/parsley.es.js") ?>"></script>


	<!-- ChartJS-->
	<script src="<?= base_url(); ?>assets/admin/js/plugins/chartJs/Chart.js"></script>
	<!--<script src="<?/*= base_url("assets/admin/libs/sweetalert2/sweetalert2.min.js") */?>"></script>-->



	<!-- Data Tables -->
	<script src="<?= base_url(); ?>assets/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/plugins/dataTables/dataTables.responsive.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

	<!-- The basic File Upload plugin -->
	<!--<script src="<?/*= base_url(); */?>assets/admin/js/plugins/fileinput/fileinput.js"></script>
	<script src="<?/*= base_url(); */?>assets/admin/css/plugins/fileinput/themes/explorer-fa/theme.js"></script>-->
	<!-- The File Upload processing plugin -->
	<script src="<?= base_url(); ?>assets/admin/js/inspinia.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/plugins/pace/pace.min.js"></script>
	<script src='<?= base_url(); ?>assets/admin/js/plugins/typeahead11/bloodhound.js'></script>
	<script src='<?= base_url(); ?>assets/admin/js/plugins/typeahead11/typeahead.jquery.min.js'></script>
	<script src="<?= base_url(); ?>assets/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/plugins/datapicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/admin/js/plugins/timepicker/mdtimepicker.js"></script>

	<script type="text/javascript" src="<?= base_url(); ?>assets/admin/js/plugins/numeric/jquery.numeric.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/admin/js/main.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/admin/js/plugins/spectrum/spectrum.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/admin/js/plugins/spectrum/jquery.spectrum-fi.js"></script>

	<!--<script type="text/javascript" src="<? /*=base_url();*/ ?>assets/admin/js/plugins/fullcalendar/fullcalendar.js"></script>-->

	<!-- Moment js -->
	<script src="<?= base_url(); ?>assets/admin/js/moment.js"></script>
	<script>var base_url = '<?php echo base_url() ?>';</script>
	<!--script type="text/javascript" src="<?= base_url(); ?>assets/admin/js/plugins/fullcalendar/es.js"></script-->
	<?php if (isset($css)) : ?>
		<?php foreach ($css as $extra => $url) : ?>
			<link href="<?= base_url("assets/$url"); ?>" rel="stylesheet" type="text/css"/>
		<?php endforeach; ?>
	<?php endif; ?>
	<!-- Extra js -->
	<?php if (isset($js)): ?>
		<?php foreach ($js as $extra => $url): ?>
			<script src="<?= base_url("assets/$url"); ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>

</head>
<body id="page-top" class="fixed-sidebar fixed-navbar pace-done" landing-scrollspy="" ng-controller="MainCtrl as main">
