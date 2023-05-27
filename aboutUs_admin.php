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
			padding: 0;
			margin-top:120px;
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
			margin-bottom: 10px;
			
		}
		.badge {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
			align-items: center;
			width: 100%;
		
		}
		.badge img {
			width: 80px;
			height: 80px;
			margin-right: 20px;
			border-radius: 50%;
		}
		.badge p {
			font-size: 16px;
			color: #666;
			margin: 0;
		}
		.contact {
			margin-top: 20px;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
		}
		.contact p {
			margin: 10px 0;
			font-size: 16px;
			color: #666;
			margin-right: 20px;
			margin-left: 10px;
		}
		.contact a {
			display: inline-block;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			text-decoration: none;
		}
		.contact a:hover {
			background-color: #3e8e41;
		}
		@media screen and (max-width: 768px) {
			.badge {
				flex-direction: column;
				align-items: flex-start;
			}
			.badge img {
				margin-right: 0;
				margin-bottom: 10px;
			}
			.contact p {
				margin-right: 0;
				margin-bottom: 10px;
			}
		}
	</style>

	<div class="container">
		<h1>About Us</h1>
		<div class="badge">
            <img src="styles/images/Logo/champions-league football.png" alt="football Quiz logo">
			<p>Welcome to Football Quiz, the ultimate destination for football fans who want to test their knowledge and have fun. Our quizzes cover everything from the history of the game to current events, and we're constantly adding new questions to keep things fresh. So whether you're a die-hard supporter or a casual fan, get ready to put your skills to the test and see how you stack up against the competition.</p>
		</div>
		<div class="contact">
			<p>For any questions or inquiries, please contact us:</p>
			<p>Email: <a href="mailto:info@footballquiz.com">info@footballquiz.com</a></p>
			<p>Instagram: <a href="https://www.instagram.com/footballquiz/">@footballquiz</a></p>
			<p>Phone: +1 (555) 555-5555</p>
		</div>
	</div>


<?php   require('requiredFiles/footer_admin.php');
?>

