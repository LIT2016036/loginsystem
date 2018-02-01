<?php
include_once 'header.php';
?>
		<section class="main-container">
			<div class="main-wrapper">
				<h1>Signup</h1>
					<form class="signup-form" action="includes/signup.inc.php" method="POST">
						<input type="text" name="first" placeholder="FirstName"></input><br>
						<input type="text" name="last" placeholder="LastName"></input><br>
						<input type="text" name="email" placeholder="Email"></input><br>
						<input type="text" name="uid" placeholder="Username"></input><br>
						<input type="password" name="password" placeholder="Password"></input><br>
						<button type="submit" name="submit" placeholder="submit">Sign up</button>
					</form>
			</div>
		</section>
<?php
include_once 'footer.php';
?>