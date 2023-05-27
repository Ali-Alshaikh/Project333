<?php 
session_start();
$qnum_MCQ = 0; 
$qnum_ran = 0; 
$qnum_short = 0;
$qnum_yes =0;


if(isset($_SESSION['qnum_MCQ'])){
  $qnum_MCQ = $_SESSION['qnum_MCQ'];
}

if(isset($_SESSION['range_qnum'])){
  $qnum_ran =$_SESSION['range_qnum'];

}

if(isset($_SESSION['yes_qnum'])){
  $qnum_yes =$_SESSION['yes_qnum'];
}

if(isset($_SESSION['short_qnum'])){
  $qnum_short =$_SESSION['short_qnum'];

}


//get the questions number for each of the questionaires 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div class="container">

    <div class="box1-container">

      <div class="links-box1">
        <!--number of questions for each of them-->
        <p><b>The admin must do all 4 questionaire, then these will work! </b></p>
        <?php if($qnum_MCQ > 0){?>
        <a href="MultipleChoice Questionaire/MCQ.php"> answer the multiple choice questionaire (<?php echo "Question number: $qnum_MCQ"; ?>) </a>
        <?php } 
          if($qnum_yes > 0){
        ?>

        <a href="yes_NoQuestionaire/yes_no.php"> answer the yes/no questionaire(<?php echo "Question number: $qnum_yes"; ?>)</a>
        <?php } 
        
        if($qnum_short > 0){
        ?>
        <a href="short Questionaire/short.php"> answer the short questionaire(<?php echo "Question number: $qnum_short"; ?>)</a>
        <?php }
        
        if($qnum_ran > 0){
        ?>
        <a href="range questionaire/range.php"> answer the range questionaire(<?php echo "Question number: $qnum_ran"; ?>)</a>
        <?php }
        
        if($qnum_yes==0 && $qnum_yes==0 && $qnum_yes==0 && $qnum_yes==0){
          echo"<p><b>Please contact the system admin to add questionaires using the contact us in the bottom of the home page</b></p>";
        }
        
        ?>



      </div>

    </div>

  </div>


</body>
</html>