<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</div>
<!-- end main-wrapper section -->

<!-- start scroll to top -->
<a href="home-shop-1.html#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<!-- end scroll to top -->

<!-- all js include start -->

<!-- jQuery -->
<script src="<?=base_url("assets/js/jquery.min.js")?>"></script>
<script src="<?=base_url("assets/js/jquery-migrate.min.js")?>"></script>

<!-- Java script -->
<script src="<?=base_url("assets/js/core.min.js")?>"></script>

<!-- revolution slider js files start -->
<script src="<?=base_url("assets/js/rev_slider/jquery.themepunch.tools.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/jquery.themepunch.revolution.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.actions.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.carousel.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.kenburn.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.layeranimation.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.migration.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.navigation.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.parallax.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.slideanims.min.js")?>"></script>
<script src="<?=base_url("assets/js/rev_slider/extensions/revolution.extension.video.min.js")?>"></script>
<script src="<?=base_url("assets/libs/izitoast/iziToast.min.js")?>"></script>
<!-- revolution slider js files end -->
<script src="<?=base_url("assets/js/sweetalert.min.js")?>"></script>
<!-- custom scripts -->
<script src="<?=base_url("assets/js/main.js")?>"></script>
<script src="<?=base_url("assets/js/page.js")?>"></script>
<script src="<?=base_url("assets/js/parsley.min.js")?>"></script>
<script src="<?=base_url("assets/js/parsley.es.js")?>"></script>

<script>
	var base_url = "<?php echo base_url() ?>";
</script>
<!-- Extra js -->
<?php if(isset($css)):?>
	<?php foreach ($js as $extra => $url): ?>
		<script src="<?=base_url("assets/$url");?>"></script>
	<?php endforeach; ?>
<?php endif; ?>

</body>

</html>
