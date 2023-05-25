<!DOCTYPE html>
<html>
<head>
	<title>Questionnaire Generator</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Questionnaire Generator</h1>
		<form action="generate.php" method="post"> 

			<label for="type">Select Questionnaire Type:</label>
			<select name="type" id="type">
				<option value="multiple_choice">Multiple Choice</option>
				<option value="Yes_No">Yes or No</option>
				<option value="short_answer">Short Answer</option>
			</select>

			<p><b>Enter a number from 1-6 for the questions</b></p>
      Enter Questions Number: <input name="QN"> <!--validation added on page generate.php-->
			<p><b>Enter a number from 1-49, make sure to enter a different number everytime!</b></p>
			Enter a Unique number: <input name="unique"><!--validation added on page generate.php-->
			<br>
			<input type="submit" name ="sb" value="Generate Questionnaire">
		</form>
	</div>
</body>
</html>