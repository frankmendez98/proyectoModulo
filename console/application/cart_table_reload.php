
					<?php
					$output = '';
					$no = 0;
					foreach ($listaprod as $items) {
							$no++; 
					?>	
								<tr>
							  <td class="product-thumbnail text-left">
                                        <a class="photo" href="#"><img class="cart-thumb" src="<?php echo $items['image']?>" alt="..." ></a></td>
                                    
							  	 <td class="text-left text-uppercase font-weight-500"><input id="id_prod" type="hidden" value="<?php echo $items['rowid']?>"/><input id="id_producto" type="hidden" value="<?php echo $items['id']?>"/><?php echo $items['name']?></td>
								 <td class="text-left"><?php echo number_format($items['price'], 2, '.', '')?></td>
								<td> 
                                        <div class="col-lg-12">
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number btn_qty"  data-type="minus" data-field="">-</button>
                                    </span>
                                    <input type="text"  id="quantity" name="quantity" class="form-control col-md-4 input-number" value="<?php echo $items['qty']?>" min="1" max="100000" disabled />
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number btn_qty" data-type="plus" data-field="">+</button>
                                    </span>
									</div></div></td>
									
									 
									 <td class="text-left" class="totalCar"><?php echo number_format($items['subtotal'], 2, '.', '')?></td>
									 <td class="text-left"><button type="button" id="<?php echo $items['rowid']?>" class="romove_cart btn  btn btn-link btn-sm"> <i class="fas fa-trash"></i></button></td>
						<?php } ?>
								
							</tr>
		
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
