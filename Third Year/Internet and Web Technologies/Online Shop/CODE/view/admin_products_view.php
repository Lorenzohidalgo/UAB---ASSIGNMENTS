<div class="registration_page">
	<h1>Welcome to the administration Site</h1>
	<p>In here you can check all products stored in the DB.</p>
		<fieldset class="products_information">
			<legend><select name="category" class="category_select">
				<option value="">Select a Category</option>
			<?php
				foreach ($categories as $category) {
				?>
				<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
				<?php
				}?>
			</select></legend>
			<div class="product_list">
				<?php require("/moixero-home/tdiw/tdiw-r4/public_html/controller/admin_products_table.php");?>
			</div>			
		</fieldset>
		<br/>
	</form>
</div>