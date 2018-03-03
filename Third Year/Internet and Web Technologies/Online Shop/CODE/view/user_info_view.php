<div class="registration_page">
	<h1>Hello <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']?>!</h1>
	<p>In this page you can modify the informatio you gave us in the registration form, if you don't want to change your password leave it blank.</p>
	<div class="h_errors"></div>
	<form class="change_info" action="./ajax/change_info_ajax.php" method="post">
		<fieldset>
			<legend>Let's change some of your information!</legend>
			<p>Just in case you forgot to be honest the last time...</p>
			First Name: <input type="text" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $user['firstname']?>" pattern="[\u00c0-\u01ffa-zA-Z ]+" required />
			Last Name: <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo $user['lastname']?>" pattern="[\u00c0-\u01ffa-zA-Z ]+" style="width: 30%" required /> </br>
			Birthday: <input type="date" id="birthday" name="birthday" min="1930-12-31" max="1999-12-31" placeholder="1995-05-15" value="<?php echo $user['birthday']?>" required /><br/><br/>
			<p>Well, if this aint correct you wont get your products...</p>
			Address: <input type="text" id="address" name="address" placeholder="My street nº 1" maxlength="30" value="<?php echo $user['address']?>" pattern="[\u00c0-\u01ffa-zA-Z0-9,.ºª ]+" required />
			Town: <input type="text" id="town" name="town" placeholder="My town" maxlength="30" value="<?php echo $user['town']?>" pattern="[\u00c0-\u01ffa-zA-Z,. ]+" required />
			Postal Code: <input type="text" id="postal_code" name="postal_code" placeholder="00000" maxlength="5" value="<?php echo $user['postal_code']?>" pattern="[0-9]{5}" required /><br/><br/>
			<p>You may change the Telephone number, but not the e-mail, sorry!</p>
			Telephone Number: <input type="text" id="telephone" name="telephone" placeholder="600 000 000" maxlength="9" value="<?php echo $user['telephone']?>" pattern="[0-9]{9}" required /><br/>
			Email address: <input type="email" name="email" placeholder="info@getitdone.com" value="<?php echo $user['email']?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="You should try entering a correct address!" autocomplete="off" style="width: 30%" readonly><br/><br/>
			<p>Now some billing information...</p>
			Credit Card Number: <input type="text" id="credit_card" name="credit_card" placeholder="0000 0000 0000 0000" maxlength="16" value="<?php echo $user['credit_card']?>" pattern="[0-9]{16}" autocomplete="off" required /><br/><br/>
			<p>You may change the password, but not the username, sorry!</p>
			Username: <input type="text" id="username" name="username" placeholder="GetItDone" pattern="[a-zA-Z0-9]+" value="<?php echo $user['username']?>" autocomplete="off" readonly /><br/>
			Password: <input type="password" id="password" name="password" placeholder="Password" pattern="[a-zA-Z0-9]+" title="Remember, short passwords are not safe!" autocomplete="off"/><br/>
		</fieldset>
		<br/>
		<input type="submit" value="Change my Information!" />
	</form>
</div>