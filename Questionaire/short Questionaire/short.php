<?php
session_start();
if(!isset($_SESSION['yes_uni']) || !isset($_SESSION['qnum'])){
  die('Error: please complete page "Generate.php" ');
}
//if(!isset($_POST['sb'])){die('Error: please head to generate.php and create a new questionaire');}
$uniqueNum = $_SESSION['yes_uni']; 
$qnum = $_SESSION['qnum']; 

echo "the unique num = $uniqueNum and the question number = $qnum";

try{

  require('../connection.php');
  //select * from the short table and display the questions
  $sql= "select * from short";
  $s = $db->prepare($sql); 
  $s->execute();
  $rows = $s->fetchAll(PDO::FETCH_NUM); //get all the rows of the database, remember how the while loop works
  unset($db); //is it good practice to end this here? 

}

catch(PDOException $e){
  die('Error:'.$e->getMessage());
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="../style.css">
  <title>short Questionaire</title>
</head>
<body>
  <div class="container">

    <form method="post" action="short_ans.php">
      <?php
      $i =0;
      foreach($rows as $row){

        //check the unique ID
        if($row[2]==$uniqueNum){
          //get the question from the short table
          $question = $row[1];
          ?>
          <!-- print the question -->
            <div class="question-box">
              <p> <b><?php echo $question?></b> </p>
              <!--validate this input-->
               <input class ="short-text" type="text" name="answer<?php echo $i?>"
                placeholder="write your answer here!"> 
            </div>
    <?php
            $i++;
            echo "<input type='hidden' name='id[]' value='$row[0]' >";
        } //end of the if for unique number
        

      } //end of the loop of the short table
      
      ?>

      <input type="submit" name="sb" value="Submit">
    </form>

  </div>
</body>
</html>