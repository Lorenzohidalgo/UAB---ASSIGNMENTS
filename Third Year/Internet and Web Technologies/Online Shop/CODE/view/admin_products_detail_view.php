<div class="registration_page">
	<form class="update_product" action="./ajax/admin_product_RUD_ajax.php" method="post">
		<fieldset>
			<legend>You can change or check the product details:</legend>
			Product ID: <input type="text" id="id" name="id" value="<?php echo $product['id'];?>" style="width: 5%" readonly />
			Name: <input type="text" id="name" name="name" placeholder="Product name Name" value="<?php echo $product['name'];?>"  /> 
			Actual Category: <?php echo $CatName;?>  <select name="category">
				<option value="">Select a new category</option>
			<?php
				foreach ($categories as $category) {
				?>
				<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
				<?php
				}?>
			</select>
			</br><br/>
			The image can't be changed from this interface, this is the referenced picture: <?php echo $product['img_src'];?>
			</br><br/>
			<label for="description">Short description: </label><br />
			<textarea id="description" name="description" placeholder="<?php echo $product['description'];?>" class="input" name="message" rows="2" cols="90" ></textarea><br/><br/>
			<label for="large_description">Full description: </label><br />
			<textarea id="large_description" name="large_description" placeholder="<?php echo $product['large_description'];?>" class="input" name="message" rows="5" cols="90" ></textarea><br/><br/>
			Price: <input type="number" id="price" name="price" value="<?php echo $product['price'];?>" placeholder="15.95" step="0.01"  />€<br/>
			Stock: <input type="number" id="stock" name="stock" value="<?php echo $product['stock'];?>" placeholder="15"  />
			
		</fieldset>
		<br/>
		<input type="submit" value="Change the details" />
	</form>
</div>