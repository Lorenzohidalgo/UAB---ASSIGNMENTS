<?php
	foreach ($products as $product) {
		?>
		<ul>
			<li>
				<a class="product" data-id = "<?php echo $product['id']; ?>">
					<div class="ProductPhoto" 
						<?php
							if ($product['img_src'] != '' && file_exists('/moixero-home/tdiw/tdiw-r4/public_html/'.$product['img_src'])) {
								echo'style="background: url(http://deic-dc0.uab.cat/~tdiw-r4/'.$product['img_src'].') no-repeat center; background-size: contain"';
							}
						?>
					></div>
					<div class="ProductInfo">
						<h3><?php echo $product['name']; ?></h3> 
						<?php if ($LongDesc) {
							?> <p>Product Description: <?php echo $product['large_description']; ?></p> <?php
						}elseif ($Full) {?>
							<p class="ProductCategory" data-id="<?php echo $product['category_id']; ?>"><?php echo $CatName; ?></p> 
							<p>Product Description: <?php echo $product['large_description']; ?></p> 
							<?php
						}else{
							?> <p><?php echo $product['description']; ?></p> <?php
						}?>						
					</div>
				</a>
				<div class="ProductPrice">
					<?php echo $product['price']; ?>€ Amount:<input type="number" value="1" min="1" max="<?php if($product['stock'] >= 10){ echo 10;}else{ echo $product['stock'];} ?>" id="amount_<?php echo $product['id']; ?>" name="amount">
					<button class="btn-addcart" data-id="<?php echo $product['id']; ?>"> ADD TO <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
				</div>
			</li>
		</ul>
		<?php
	}
	?>