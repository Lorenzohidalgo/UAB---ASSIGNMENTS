<div class="registration_page">
	<h1>Let's check your order history!</h1>
	<p>Please click on the "go back" symbol to check see all the orders.</p>
		<fieldset class="products_information">
			<div class="product_list">
			<p>Checking the products for the following order:</p>
				<table>
					<tr>
						<th>ID</th>
						<th>Order placement Date</th>
						<th>Shipping Address</th>
						<th>Total Price</th>
						<th>Go Back</th>
					</tr>
					<tr>
						<td><?php echo $order['id'];?></td>
						<td><?php echo $order['order_date'];?></td>
						<td><?php echo $order['shipping_address'];?></td>
						<td><?php echo $order['total_price'];?>€</td>
						<td><a class="order_go_back" href="./index.php?user_orders"><i class="fa fa-reply" aria-hidden="true"></i></a></td>
					</tr>
				</table>
				<br>
				<p>The following products where shipped to you:</p>
				<table>
					<tr>
						<th>Product Name</th>
						<th>Product description</th>
						<th>Product Amount</th>
						<th>Product Price</th>
					</tr>
					<?php
					foreach ($products as $product){?>
					<tr>
						<td><?php echo $product['product_name'];?></td>
						<td style="font-weight: normal; font-size: 10px"><?php echo $product['product_description'];?></td>
						<td><?php echo $product['product_amount'];?></td>
						<td><?php echo $product['product_price'];?>€/unit</td>
						</tr>
					<?php	}?>
				</table>
			</div>			
		</fieldset>
		<br/>
	</form>
</div>