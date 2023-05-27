<?php
// printing the questionaire, use a form -> forward the questionaire to save the answers of it in a separate table
// create a multiple_choice_report.php file and fill it. 
session_start();
if(!isset($_SESSION['MC_uniqueNum'])){ die("Error: please complete page 'submit.php' first! ");}

$uniqueNum = $_SESSION['MC_uniqueNum'];
echo "the unique number entered by the user is: ".$uniqueNum;
try{
  require('../connection.php');
  $sql = 'select * from questionaire';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_NUM);
  //die($stmt->rowCount()) method to test your mistakes
  unset($db);

}

catch(PDOException $e){
  die('Error'.$e->getMessage());
}


?>
<html>
  <head>
    <link rel="stylesheet" href="../style.css">
  </head>
<body>
<div class="container">
    <form method="post" action="MC_Ans.php">
    <?php
    $i =0;
    $qnum = 0;
    foreach($rows as $row){
      //this loops through the questions by itself soo... 
    if($row[8]==$uniqueNum){
      if($row[1] =='multiple_choice'){
          $question = $row[2];
          $option1 = $row[3];
          $option2 = $row[4];
          $option3 = $row[5]; 
          $option4 = $row[6];
        
          ?>
          <div class="question-box">
            <p> <b><?php echo $question?></b></p>
            <input type="radio" name="answer<?php echo $i?>" value="<?php echo $option1?>"> <?php echo $option1?>
            <input type="radio" name="answer<?php echo $i?>"  value="<?php echo $option2?>" > <?php echo $option2?>
            <input type="radio" name="answer<?php echo $i?>"  value="<?php echo $option3?>" > <?php echo $option3?>
            <input type="radio" name="answer<?php echo $i?>"  value="<?php echo $option4?>" > <?php echo $option4?>
          </div>
      <?php
      $qnum++;
          $i++;
          echo "<input type='hidden' name='id[]' value='$row[0]' >";
      }
    }
  } //end of the foreach loop that prints the values of the DB 

      //$_SESSION['qnum_MCQ'] = $qnum;

      

    ?>

      <input type="submit" name="sb" value="Submit">
    </form>
</div>
</body>
</html>