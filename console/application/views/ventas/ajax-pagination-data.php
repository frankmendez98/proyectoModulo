<?php if(!empty($ventas)): foreach($ventas as $producto): ?>
    <div class="list-item"><a href="javascript:void(0);"><h2><?php echo $producto['descripcion']; ?></h2></a></div>
<?php endforeach; else: ?>
<p>Post(s) not available.</p>
<?php endif; ?>
<?php echo $this->ajax_pagination->create_links(); ?>
