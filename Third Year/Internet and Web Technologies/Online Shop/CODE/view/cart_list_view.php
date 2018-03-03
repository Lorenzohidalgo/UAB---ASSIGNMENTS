<div class="registration_page">
	<h1>Welcome to your shopping Cart</h1>
	<p>In here you can check all products stored in your cart and modify them.</p>
		<fieldset>
			<table style="border: 0">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Amount</th>
					<th>Edit Amount</th>
					<th>Delete</th>
				</tr>
				<?php $total_Price = 0;
				foreach ($_SESSION['products'] as $product){?>
				<tr class="product_row">
					<td><?php echo $product['product_name'];?></td>
					<td style="font-weight: normal; font-size: 10px"><?php echo $product['product_description'];?></td>
					<td><?php echo $product['product_price'];?> €</td>
					<td id="prod_amount_<?php echo $product['product_id'];?>"><?php echo $product['product_amount'];?> units</td>
					<td class="amount"><input type="number" min="1" max="10" data-id="<?php echo $product['product_id'];?>" id="modify_product" value="<?php echo $product['product_amount'];?>"></td>
					<td><a data-id="<?php echo $product['product_id'];?>" class="cart_delete" href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
				</tr>
				<?php 
				$total_Price = $total_Price + $product['product_price'] * $product['product_amount'];
				}?>
			</table>
		</fieldset>
		<br/>
		<h3>The total price is: <?php echo ' '.$total_Price;?> €</h3>
		<ul>
			<?php if(isset($_SESSION['id'])){?>
			<li>Shipping address: <input type="text" id="address" name="address" placeholder="My street nº 1" maxlength="30" value="<?php echo $user['address']?>" pattern="[\u00c0-\u01ffa-zA-Z0-9,.ºª ]+" required /> Town: <input type="text" id="town" name="town" placeholder="My town" maxlength="30" value="<?php echo $user['town']?>" pattern="[\u00c0-\u01ffa-zA-Z,. ]+" required style="width: 20%"/>
			Postal Code: <input type="text" id="postal_code" name="postal_code" placeholder="00000" maxlength="5" value="<?php echo $user['postal_code']?>" pattern="[0-9]{5}" required style="width: 10%" /></li>
			<li><input type="submit" data-price="<?php echo $total_Price;?>" class="cart_buy" value="Let's buy!"></li>
			<?php }else{?>
			<li>Please Log in or Register to process an order.</li>
			<?php } ?>
		</ul>
		<br/>
	</form>
</div>

