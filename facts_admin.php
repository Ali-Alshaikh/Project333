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
			margin-top:70px;
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
		.facts {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			margin-top: 20px;
		}
		.fact {
			width: 48%;
			margin-bottom: 20px;
			padding: 10px;
			background-color: #f2f2f2;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
		}
		.fact h2 {
			margin-top: 0;
			font-size: 20px;
			color: #333;
		}
		.fact p {
			margin: 10px 0;
			font-size: 16px;
			color: #666;
		}
		@media screen and (max-width: 768px) {
			.fact {
				width: 100%;
			}
		}
	</style>

	<div class="container">
		<h1> &#9917; 20 Interesting Facts About Football &#9917; </h1>
		<div class="facts">
			<div class="fact">
				<h2>Fact #1</h2>
				<p>Football is the most popular sport in the world.</p>
			</div>
			<div class="fact">
				<h2>Fact #2</h2>
				<p>The first ever international football match was played in 1872 between Scotland and England.</p>
			</div>
			<div class="fact">
				<h2>Fact #3</h2>
				<p>The highest scoring football match in history was in 1885 when Arbroath beat Bon Accord 36-0.</p>
			</div>
			<div class="fact">
				<h2>Fact #4</h2>
				<p>The fastest goal in football history was scored by Ricardo Olivera just 2.8 seconds after the game started.</p>
			</div>
			<div class="fact">
				<h2>Fact #5</h2>
				<p>The first World Cup was held in 1930 in Uruguay and was won by the host nation.</p>
			</div>
			<div class="fact">
				<h2>Fact #6</h2>
				<p>The most goals ever scored in a single football match by one player was 16, by Stephan Stanis of France in 1942.</p>
			</div>
			<div class="fact">
				<h2>Fact #7</h2>
				<p>The first red card in football history was given to Chilean player Carlos Caszely in 1972.</p>
			</div>
			<div class="fact">
				<h2>Fact #8</h2>
				<p>The most expensive football transfer ever was Neymar's move to Paris Saint-Germain for €222 million in 2017.</p>
			</div>
			<div class="fact">
				<h2>Fact #9</h2>
				<p>The fastest recorded football shot was by Ronny Heberson of Brazil, who kicked the ball at a speed of 131 mph.</p>
			</div>
			<div class="fact">
				<h2>Fact #10</h2>
				<p>The oldest football club in the world is Sheffield FC, founded in 1857.</p>
			</div>
			<div class="fact">
				<h2>Fact #11</h2>
				<p>The first football league in the world was the English Football League, established in 1888.</p>
			</div>
			<div class="fact">
				<h2>Fact #12</h2>
				<p>The first African team to qualify for the World Cup was Egypt in 1934.</p>
			</div>
			<div class="fact">
				<h2>Fact #13</h2>
				<p>The most successful football club in history is Real Madrid, with 13 Champions League titles.</p>
			</div>
			<div class="fact">
				<h2>Fact #14</h2>
				<p>The oldest football stadium in the world is Sandygate Road in Sheffield, England, which has been used since 1860.</p>
			</div>
			<div class="fact">
				<h2>Fact #15</h2>
				<p>The only player to have won the World Cup three times is Pelé of Brazil.</p>
			</div>
			<div class="fact">
				<h2>Fact #16</h2>
				<p>The first football match to be broadcast live on television was a friendly between Arsenal and Arsenal Reserves in 1937.</p>
			</div>
			<div class="fact">
				<h2>Fact #17</h2>
				<p>The most successful national team in history is Brazil, with 5 World Cup titles.</p>
			</div>
			<div class="fact">
				<h2>Fact #18</h2>
				<p>The first football boots were made by King Henry VIII's shoemaker in 1525.</p>
			</div>
			<div class="fact">
				<h2>Fact #19</h2>
				<p>The record for the most expensive football ticket ever sold was $1,375 for the 2014 World Cup final in Brazil.</p>
			</div>
			<div class="fact">
				<h2>Fact #20</h2>
				<p>The first ever football game to be played under floodlights was in 1878 at Bramall Lane in Sheffield, England.</p>
			</div>
		</div>
	</div>

	<?php 
  require('requiredFiles/footer_admin.php');
	?>

