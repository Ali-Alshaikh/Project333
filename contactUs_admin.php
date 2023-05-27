<?php 
  require('requiredFiles/check_login.php');
	require('requiredFiles/check_admin.php');
  require('requiredFiles/header_admin.php');
?>
<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 10px;
			margin-top:80px;
		}
		h1 {
			text-align: center;
			margin-top: 20px;
		}
		.container {
			width: 90%;
			margin: auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}
		form {
			margin-top: 20px;
		}
		label {
			display: block;
			font-size: 16px;
			margin-bottom: 5px;
			color: #333;
		}
		input[type="text"], input[type="email"], textarea {
			display: block;
			width: 100%;
			padding: 10px;
			font-size: 16px;
			border: 2px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
			box-sizing: border-box;
		}
		textarea {
			height: 100px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		@media screen and (max-width: 768px) {
			input[type="text"], input[type="email"], textarea {
				margin-bottom: 10px;
			}
		}
	</style>


	<div class="container">
		<h1>Contact Us</h1>
		<form>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" placeholder="Enter your name" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" placeholder="Enter your email" required>

			<label for="message">Message:</label>
			<textarea id="message" name="message" placeholder="Enter your message" required></textarea>

			<input type="submit" value="Submit">
		</form>
	</div>

	<?php 
	
  require('requiredFiles/footer_admin.php');

	?>

