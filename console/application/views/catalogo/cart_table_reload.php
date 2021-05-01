<?php
	$output = '';
	$no = 0;
foreach ($listaprod as $items):
	$no++;
	?>
	<tr>
		<td class="product-thumbnail text-left">
			<a class="photo" href="#">
				<img class="cart-thumb" src="<?php echo $items['image']?>" alt="..." >
			</a>
			<p class="text1">
				<?php echo $items['name']; if($items["add"]!=""){ echo " ".$items["add"]; }?>
			</p>
		</td>

		<td class="text-left text-uppercase font-weight-500 head_first">
			<input id="id_prod" type="hidden" value="<?php echo $items['rowid']?>"/>
			<input id="id_producto" type="hidden" value="<?php echo $items['id']?>"/>
			<?php echo $items['name']; if($items["add"]!=""){ echo " ".$items["add"]; }?>
		</td>

		<td class="head_first"> <input id="pprice" type="hidden" value="<?php echo $items['price']?>"/>
			<p id="product_price"><span>$</span><?=dinero($items['price'])?></p>

		</td>

		<td class="text-right">
			<div class="number-input cantidad">
				<button onclick="this.parentNode.querySelector('input[type=number]').stepDown();" class="minus btn_qty"></button>
				<input type="number"  id="quantity" name="quantity" class="quantity" value="<?php echo $items['qty']?>" readonly />
				<button onclick="this.parentNode.querySelector('input[type=number]').stepUp();" class="plus btn_qty"></button>
			</div>
			<p class="text1">
				<span class="texto_oculto">Precio: <?php echo "$".dinero($items['price'])?></span><br>
				<span class="texto_oculto totalCar">SubTotal: <?="$".dinero($items['subtotal'])?></span>
			</p>
		</td>

		<td class="text-center head_first totalCar"><input id="subtot" type="hidden" value="<?php echo $items['subtotal']?>"/>
			<?="$".dinero($items['subtotal'])?>

		</td>
		<td class="text-center">
			<button type="button" id="<?php echo $items['rowid']?>" class="romove_cart btn  btn btn-link btn-sm"> <i class="fas fa-trash"></i></button>
		</td>
	</tr>

<?php endforeach; ?>
