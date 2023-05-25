<?php
session_start();
require("test_input.php");
if(!isset($_POST['done'])){die("Error: please complete 'generate.php' ");}
try{
  require('connection.php');

}

catch(PDOException $e){
  die("Error: ".$e->getMessage());
}




?>
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
		<?php

if(isset($_POST['done'])){

      //add validation here please!!
      $type = $_POST['type']; //already validated in the generate.php
      $qnum = $_POST['qnum'];//already validated in the generate.php
      $uniqueNum = $_POST['unique']; //already validated in the generate.php
      $options = $_POST['option']; //needs validation
      
			if($type =='multiple_choice'){

        //validate the questions 
        //check the questions
        for($i =1;$i<=$qnum;$i++){
          $q = 'question'.$i; //validate the question to prevent sql injection! slide 223, it's done!
          $question = test_input($_POST[$q]);
        
          if(empty($question)){ die('no question can be left empty!'); }
        
          $pattQuestion ="/^[a-zA-Z0-9\?\-\s]*$/";
          if(preg_match($pattQuestion,$question)!= 1){
            die('please enter a question of the appropriate format!');
          }
        } //end of the for loop that validates the question 

        //using the test_input to check the options
        for($i=0 ; $i < count($options);$i++){
          $options[$i] = test_input($options[$i]); 
        }

        //using the empty  to check that no options is empty
        for($i=0 ; $i < count($options);$i++){
          if(empty($options[$i])){
            die("Error: you cannot leave an option empty for the multiple choice questions");
          }
        }



        //using the regualar expression for options
        //always end $i < n-1  
        $pattOp= "/^[a-zA-Z0-9\?\-\s]*$/";
        for($i=0 ; $i < count($options);$i++){
          if(preg_match($pattOp , $options[$i])!=1){
            die("Error: you have to stick to the rules for OPTIONS");
          }
        }








        try{

              $db->beginTransaction();
              $sql = "Insert into questionaire values (null,:type,:question,
              :option1,:option2,:option3,:option4,:qnum,:unique)";
              $stmt = $db->prepare($sql);

              //bind the parameter to insert into the database
              $stmt->bindParam(':type',$type);
              $stmt->bindParam(':question',$question); //put it in a for loop! done:)
              $stmt->bindParam(':option1',$option1);
              $stmt->bindParam(':option2',$option2);
              $stmt->bindParam(':option3',$option3);
              $stmt->bindParam(':option4',$option4);
              $stmt->bindParam(':qnum',$qnum);
              $stmt->bindParam(':unique',$uniqueNum);


            echo "<form method='post' action=''>"; //this loop is a bit helpful... 
            $y = 0;
            $x =0;
            for($i = 1; $i <= $qnum;$i++){
              $q = "question".$i;
              $question = $_POST[$q]; //we will if this works
              $count =0;
              for($x; $x <count($options);$x++){

                $option1= $options[$x+$y];
                $y++;
                $option2 = $options[$x+$y];
                $y++;
                $option3 = $options[$x+$y];
                $y++;
                $option4 = $options[$x+$y];
                $count+=4;

                if($count == 4){
                    $count =0;
                    $x++;
                    break;
                }
              } //end of the for loop that loops through the options array which contains the answer to be printed to the user. 
              
              ?>
              <div class="question-box">
                <p> <b><?php echo $question?></b></p>
                <input type="radio" name="answer<?php echo $i?>" value="<?php echo $option1?>"> <?php echo $option1?>
                <input type="radio" name="answer<?php echo $i?>"  value="<?php echo $option2?>" > <?php echo $option2?>
                <input type="radio" name="answer<?php echo $i?>"  value="<?php echo $option3?>" > <?php echo $option3?>
                <input type="radio" name="answer<?php echo $i?>"  value="<?php echo $option4?>" > <?php echo $option4?>
              </div>
    <?php

              $stmt->execute();
              $rows = $stmt->rowCount();
           
            } //end for the for loop that loops for the questions separately
            $db->commit();
            unset($db); //good practice
      }//end of the try
      catch(PDOException $e){
        $db->rollBack();
        die("Error: ".$e->getMessage());

      }
      echo $rows . ' rows inserted';
?>
          
        <input type='hidden' name='QN' value='<?php echo $qnum?>'>
        <input type="submit" name='sb' value="sumbit answers">

        </form>
        <?php
        $_SESSION['MC_uniqueNum']=$uniqueNum;
         header("location:Createquestionaires.html"); //redirects me -----------------------------------

    } //end of if $type multiple_choice ----------------------------------------------------------------


        if($type == 'Yes_No'){
          try{
            require("connection.php");
            $sql= "insert into Yes_No values(null,:question,'Yes','No',:uniqueNum,'')";
            $stmt1= $db->prepare($sql);
            $stmt1->bindParam(':question',$question);
            $stmt1->bindParam(':uniqueNum',$uniqueNum);
          }

          catch(PDOException $e){
            die("Error:".$e->getMessage());
          }

          //check the questions
          for($i =1;$i<=$qnum;$i++){
            $q = 'question'.$i; //validate the question to prevent sql injection! slide 223, it's done!
            $question = test_input($_POST[$q]);

            if(empty($question)){ die('no question can be left empty!'); }

            $pattQuestion ="/^[a-zA-Z\?\-\s]*$/";
            if(preg_match($pattQuestion,$question)!= 1){
              die('please enter a question of the appropriate format!');
            }
          }


          for($i =1;$i<=$qnum;$i++){
              $q = 'question'.$i; //validate the question to prevent sql injection! slide 223, it's done!
            
              $question = test_input($_POST[$q]);

              $stmt1->execute();
              $row = $stmt1->rowCount();
              echo $row."inserted successfully!";
            
          }
          $_SESSION['yes'] = $uniqueNum; //we can remove the questions and add new ones. -- use doctor example as refrence.. 
          $_SESSION['qnum'] = $qnum;
          
          header("location:Createquestionaires.html");
        }


















      
    }

  
		?>
	</div>
</body>
</html>


