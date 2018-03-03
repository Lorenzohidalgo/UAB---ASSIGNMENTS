<div class="registration_page">
	<h1>Let's check your clients order history!</h1>
	<p>Please click on the magnifying glass symbol to check the prodcuts of the orders.</p>
		<fieldset class="products_information">
			<div class="product_list">
				<table style="border: 0">
					<tr>
						<th>ID</th>
						<th>Client Name</th>
						<th>Order placement Date</th>
						<th>Shipping Address</th>
						<th>Total Price</th>
						<th>Check the products</th>
					</tr>
					<?php
					foreach ($OrdersWithName as $order){?>
					<tr>
						<td><?php echo $order['id'];?></td>
						<td><?php echo $order['user_name'];?></td>
						<td><?php echo $order['order_date'];?></td>
						<td><?php echo $order['shipping_address'];?></td>
						<td><?php echo $order['total_price'];?>€</td>
						<td><a data-id="<?php echo $order['id'];?>" class="admin_check_products" href="./Administration.php?orders&order_id=<?php echo $order['id'];?>"><i class="fa fa-search" aria-hidden="true"></i></a></td>
					</tr>
					<?php	}?>
				</table>	
			</div>			
		</fieldset>
		<br/>
	</form>
</div>