<div class="registration_page">
	<h1>Welcome to the administration Site</h1>
	<p>Fill the form bellow to add new products.</p>
	<div class="handling_errors"></div>
	<form action="./ajax/admin_new_product_ajax.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>More products atract more clients!</legend>
			Name: <input type="text" id="name" name="name" placeholder="Product name Name" required /> 
			Category: <select name="category" >
			<?php
				foreach ($categories as $category) {
				?>
				<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
				<?php
				}?>
			</select>
			</br><br/>
			Select an image to upload:<input type="file" name="fileToUpload" id="fileToUpload">
			</br><br/>
			<label for="description">Short description: </label><br />
			<textarea id="description" name="description" placeholder="Short product description.." class="input" name="message" rows="2" cols="90" required></textarea><br/><br/>
			<label for="large_description">Full description: </label><br />
			<textarea id="large_description" name="large_description" placeholder="Full product description.." class="input" name="message" rows="5" cols="90" required></textarea><br/><br/>
			Price: <input type="number" id="price" name="price" placeholder="15.95" step="0.01" required />€<br/>
			Stock: <input type="number" id="stock" name="stock" placeholder="15" required />
			
		</fieldset>
		<br/>
		<input type="submit" value="Create the new product!" />
	</form>
</div>