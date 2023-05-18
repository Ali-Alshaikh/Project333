<!--Done by: Ali Alshaikh-->
<?php
  //require 'requiredFiles/check_login.php';
  require('requiredFiles/header.php');
  require('requiredFiles/sidebar.php');
 


  echo "this is the edit we added.";
?>




<div class="container">
  <main class="main-section">
      <div class="top">
        <div class="left-section">
          <p>Welcome to <b>Football Quizes</b>, this website will test your 
            <span class="yellow">footballing knowledge</span> and will allow to discover <span class="highlight">how much you know
              about <b>Football</b>.</span> 
          </p>
         
        </div>
        <a class="right-section">
          <p> This is a quick quiz on your 
            knowledge to the champions league competition 
          </p>
          <img class="champions" src="styles/images/quiz-thumbnail/champions-league.png">
        </a>
      </div>
      
      
      <div class="middle">
        <a class="middle-left">
          <p> This is a quick quiz on your 
            knowledge to the world cup competition 
          </p>
          <img class="champions" src="styles/images/quiz-thumbnail/qatar-wc.png">
        </a>

        <a class="middle-right">
          <p> This is a quick quiz on your 
            knowledge to how well you know football
          </p>
          <img class="champions" src="styles/images/quiz-thumbnail/medium_5719174e-7929-48eb-bdf4-c1cb35ed3293.jpg">
        </a>
      </div>

      <div class="bottom">

        <a class="middle-left">
          <p> This is a quick quiz on your 
            knowledge to the player Lionel Messi
          </p>
          <img class="champions" src="styles/images/quiz-thumbnail/messi.jpg">
        </a>

        <a class="middle-right">
          <p> This is a quick quiz on your 
            knowledge to the player Cristiano Ronaldo 
          </p>
          <img class="champions" src="styles/images/quiz-thumbnail/ronaldo.jpg">
        </a>

      </div>

    </main>
  </div>

</div>

<?php
  require('requiredFiles/footer.php');

?>