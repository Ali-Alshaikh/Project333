<?php
session_start();
if(isset($_SESSION['yes'])){
try{
  require('../connection.php');
  $sql='select * from Yes_No';
  $stmt= $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_NUM); 
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
  <link rel="stylesheet" href="../style.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <?php


    $i =0; 

    echo "<form method='post' action='YesNo_Answers.php'>";
        foreach($rows as $row){
          //this loops through the questions by itself soo... 
          if($row[4] == $_SESSION['yes']){
            $question = $row[1];
            $option1 = $row[2];
            $option2 = $row[3];
            ?>
            <div class="question-box">
              <p> <b><?php echo $question?></b></p>
              <input type="radio" name="answer<?php echo $i?>" value="<?php echo $option1?>"> <?php echo $option1?>
              <input type="radio" name="answer<?php echo $i?>"  value="<?php echo $option2?>" > <?php echo $option2?>
            </div>
        <?php
            $i++;
            echo "<input type='hidden' name='id[]' value='$row[0]'>";
            
            
        }
        } //end of foreach loop


        ?>
      
        <input type="submit" name='sb' value="Submit">
    </form>
</div>
</body>
</html>

<?php
} //end of the session check

else{
  die("Error: <B>Make sure that you have created somthing in the submit.php page</B>");
}
?>

