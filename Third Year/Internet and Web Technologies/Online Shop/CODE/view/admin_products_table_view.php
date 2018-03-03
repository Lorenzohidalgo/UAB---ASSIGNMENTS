<table style="border: 0">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Price</th>
	<th>Stock</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?php
foreach ($products as $product){?>
<tr class="product_row">
	<td><?php echo $product['id'];?></td>
	<td><?php echo $product['name'];?></td>
	<td><?php echo $product['price'];?></td>
	<td><?php echo $product['stock'];?></td>
	<td><a data-id="<?php echo $product['id'];?>" class="product_detail" href="./Administration.php?product=<?php echo $product['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
	<td><a data-id="<?php echo $product['id'];?>" class="product_delete" href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
</tr>
<?php	}?>
</table>