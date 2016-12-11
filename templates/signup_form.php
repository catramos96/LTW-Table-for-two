	<div id="content">
			<h1 class="title"> Sign Up </h1>
			<form action="action_signup.php" class="big_form" method="post">
				<fieldset>
					<legend>Account Information</legend>
					<p><label>Username: 
						<input type="text" class="max_width" name="username" required="required">
					</label></p>
					<p><label>Name: 
						<input type="text" class="max_width" name="name" required="required">
					</label></p>
					<p><label>Password: 
						<input type="password" class="max_width" name="password" required="required">
					</label></p>
					<p><label>Age: 
						<input type="number" name="age" value="25" min="18" max="90" step="1">
					</label></p>
					<div>
						<label> Gender </label>
						<input type="radio" name="gender" value="1" checked="checked">Male
						<input type="radio" name="gender" value="2">Female
					</div>
					<div>
						<label> Type </label>
						<input type="radio" name="type" value="reviewer" checked="checked">Reviewer
						<input type="radio" name="type" value="owner">Owner
					</div>
				</fieldset>
				<input class= "button_1 button" type="submit" value="Register"/>
			</form>
	</div>