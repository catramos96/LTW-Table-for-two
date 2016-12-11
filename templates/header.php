<!DOCTYPE html>
<html>
	<head>
		<title>Table for Two</title>
		<link rel="stylesheet" href="css/site.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="js/page_definitions.js"></script>
		<script src="js/other.js"></script>
	</head>
	<body>
		<div id="header">
			
			<h1> Table for Two </h1>
			
			<div id="search_bar">
				<input type="text" name="search">
				<input type="submit" class="button_search button" value=""/>
			</div>
			
			<div id="menu">
				<ul>
					<li><input id="go_home" class="header_button button" action="index.php" type="submit" value="Home" /></li> 
					<li><input id="go_restaurants" class="header_button button" action="restaurants.php" type="submit" value="Restaurants" /></li>
					<li><input id="go_advanced_search" class="header_button button" action="advanced_search.php" type="submit" value="Advanced Search" /> </li>
					<li><input id="go_information" class="header_button button" action="information.php" type="submit" value="Information" /></li>
					<?php
					if (isset($_SESSION['id_account'])){
						if($_SESSION['type'] == 'owner')
								echo '<li><input id="go_my_restaurants" class="header_button button" action="my_restaurants.php" type="submit" value="My Restaurants" /></li>';
						echo '<li><input id="go_my_account" class="header_button button" action="my_account.php" type="submit" value="' . $_SESSION['name'] .'" /></li>';
						echo '<li><input id="do_logout" class="header_button button" action="action_logout.php" type="submit" value="Logout" /></li>';
					}
					else{
						echo '<li><input id="do_login" class="header_button button" type="submit" value="Login" /></li>';
						echo '<li><input id="do_signup" class="header_button button" action="signup.php" type="submit" value="SignUp" /></li>';		
					}
					?>
				</ul>
			</div>
			
			<form id="loginform" class="small_form" method="post" action="action_login.php">
				<label id="loginform_content" for="username">Username</label>
				<input id="loginform_content" class="insert_info" type="text" name="username" required="required">
				<label id="loginform_content" for="password">Password</label>
				<input id="loginform_content"class="insert_info" type="password" name="password" required="required">
				<input id="login_button loginform_content" class="button_1 button" type="submit" value="Login">
			</form>
			
			<input id="button_top" type="submit" class="button_top button" value=""/>
		</div>