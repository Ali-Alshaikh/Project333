<?php
session_start();

if(!isset($_SESSION['range_uni'])){ 
  die('Error: please create a form in the proper manner!');
}

$uniqueNum = $_SESSION['range_uni']; 
$qnum  = $_SESSION['qnum'];

try{
  require('../connection.php');
  $sql ='select * from scale';
  $s =$db->prepare($sql); 
  $s->execute();
  $rows= $s->fetchAll(PDO::FETCH_NUM);
  
}

catch(PDOException $e){
  die('Error: '.$e->getMessage());
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

    echo "<form method='post' action='range_ans.php'>";
        foreach($rows as $row){
          //this loops through the q'uestions by itself soo... 
          if($row[7] == $uniqueNum){
            $question = $row[1];
            ?>
            <div class="question-box">
              <p> <b><?php echo $question?></b></p>
              <p>From 1 to 5(<b>default is 0 move the scale to accept your answer</b>):</p>
               <input type="range" name="answer<?php echo $i?>" value="0" min="0" max="5" step="1"> 
            </div>
        <?php
            $i++;
            echo "<input type='hidden' name='id[]' value='$row[0]'>";
            
            
        }
        } //end of foreach loop

        //$_SESSION['range_qnum'] = $qnum;
        ?>
      
        <input type="submit" name='sb' value="Submit">
    </form>
</div>
</body>
</html>