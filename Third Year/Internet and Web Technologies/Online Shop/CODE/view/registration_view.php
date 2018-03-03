<div class="registration_page">
	<h1>Welcome to Get it Done!</h1>
	<p>Before you can start shopping at our on-line shop, we will need you to give us some information about you.</p>
	<div class="handling_errors"></div>
	<form class="register" action="./ajax/registration_ajax.php" method="post">
		<fieldset>
			<legend>Let's start with some simple information!</legend>
			<p>Something about you:</p>
			First Name: <input type="text" id="firstname" name="firstname" placeholder="First Name" pattern="[\u00c0-\u01ffa-zA-Z ]+" required />
			Last Name: <input type="text" id="lastname" name="lastname" placeholder="Last Name" pattern="[\u00c0-\u01ffa-zA-Z ]+" style="width: 30%" required /> </br>
			Birthday: <input type="date" id="birthday" name="birthday" min="1930-12-31" max="1999-12-31" placeholder="1995-05-15" required /><br/><br/>
			<p>Where are you from?</p>
			Address: <input type="text" id="address" name="address" placeholder="My street nº 1" maxlength="30" pattern="[\u00c0-\u01ffa-zA-Z0-9,.ºª ]+" required />
			Town: <input type="text" id="town" name="town" placeholder="My town" maxlength="30" pattern="[\u00c0-\u01ffa-zA-Z,. ]+" required />
			Postal Code: <input type="text" id="postal_code" name="postal_code" placeholder="00000" maxlength="5" pattern="[0-9]{5}" required /><br/><br/>
			<p>How may we contact you?</p>
			Telephone Number: <input type="text" id="telephone" name="telephone" placeholder="600 000 000" maxlength="9" pattern="[0-9]{9}" required /><br/>
			Email address: <input type="email" name="email" placeholder="info@getitdone.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="You should try entering a correct address!" autocomplete="off" style="width: 30%" required><br/><br/>
			<p>Now some billing information...</p>
			Credit Card Number: <input type="text" id="credit_card" name="credit_card" placeholder="0000 0000 0000 0000" maxlength="16" pattern="[0-9]{16}" autocomplete="off" required /><br/><br/>
			<p>Lets create your account now</p>
			Username: <input type="text" id="username" name="username" placeholder="GetItDone" pattern="[a-zA-Z0-9]+" autocomplete="off" required /><br/>
			Password: <input type="password" id="password" name="password" placeholder="SecretStuff" pattern="[a-zA-Z0-9]+" title="Remember, short passwords are not safe!" autocomplete="off" required /><br/>
		</fieldset>
		<br/>
		<input type="submit" value="Create my account!" />
	</form>
</div>