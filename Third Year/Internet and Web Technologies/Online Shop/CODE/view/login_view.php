<div class="login_page">
	<h1>Welcome to Get it Done!</h1>
	<p>Before you can start shopping at our on-line shop, you will need to log in.</p>
	<div class="handling_errors"></div>
	<form class="login" action="./ajax/login_ajax.php" method="post">
		<fieldset>
			<legend>Let's Log In to your account!</legend>
			Username: <input type="text" id="username" name="username" placeholder="GetItDone" pattern="[a-zA-Z0-9]+" autocomplete="off" required /><br/>
			Password: <input type="password" id="password" name="password" placeholder="SecretStuff" pattern="[a-zA-Z0-9]+" title="Remember, short passwords are not safe!" autocomplete="off" required /><br/>
		</fieldset>
		<br/>
		<input type="submit" value="Log me in!" />
	</form>
</div>