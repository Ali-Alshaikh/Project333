<?php
require('test_input.php');

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
    if(isset($_POST['sb'])){
      //validation for the homePage.php
			$type = test_input($_POST['type']);
      $qnum = test_input($_POST['QN']);
      $uniqueNum = test_input($_POST['unique']);


      // if these question number or the type is empty kill the program... 
      if(empty($qnum)||empty($type || empty($uniqueNum))){ die('you did not enter a question number!');}

      //now use regular expressions

      $patt = '/^[1-6]{1}$/';
      if(preg_match($patt,$qnum)!= 1){
        die("enter values between 1 - 6 only");
      }

      $pattUnique="/^([1-9]{1})$|^[1-4]{1}[0-9]{1}$/";
      if(preg_match($pattUnique,$uniqueNum)!= 1){
        die("enter values between 1 - 49 only");
      }

      
			if($type == 'multiple_choice'){ ?>

					<form action="submit.php" method="post">
            <?php 
              echo"<p><b>For Questions: use only charachters a-z or A-Z, ? , -, 0 ~ 9 </b></p>";
              echo"<p><b>For Options: use only charachters a-z or A-Z, ? , -, 0 ~ 9 </b></p>";
              for($i=1 ; $i<= $qnum;$i++){
                ?>
                <label for="question">Enter Question: <?php echo $i?> </label> 
                <input type="text" name="question<?php echo $i?>" id="question">
              
              <label>Option 1:</label>
                <input type="text" name="option[]" id="option1">
              
              <label>Option 2:</label>
                <input type="text" name="option[]" id="option2">
              
              <label >Option 3:</label>
                <input type="text" name="option[]" id="option3">
            
              <label>Option 4:</label>
                <input type="text" name="option[]" id="option4">


              <?php
              } 
            

            
            ?>
            <input type ='hidden' name= 'type' value='<?php echo $type?>'>
            <input type="hidden" name='qnum' value="<?php echo $qnum?>">
            <input type="hidden" name='unique' value="<?php echo $uniqueNum?>">
            <input type="submit" value="Submit" name='done'>
					</form>
          <?php
            
      } // end of multiple choice 
        /*
        things that is compeleted: 
            - question validation [empty and regular expression]
            - unique number validation[done!]
            -
        */
        
				if($type =='Yes_No'){?>
					<form action="submit.php" method="post">
          <p> Enter Only Charaters Small or Capital,? , - to create your question</p>
            <?php for($i =1 ;$i<= $qnum;$i++){?>
              <label for="question">Enter Question: <?php echo $i?></label>
              <input type="text" name="question<?php echo $i?>" id="question">
              

          <?php
            } //end of the for loop
            ?>
              <input type ='hidden' name= 'type' value='<?php echo $type?>'>
              <input type="hidden" name='qnum' value="<?php echo $qnum?>">
            <input type="hidden" name='unique' value="<?php echo $uniqueNum?>">
            <input type="submit" value="Submit" name ='done'>
            </form> <!--end of the form for yes/no-->
            <?php
        }

        //short type
        if($type =='short'){?>
					<form action="submit.php" method="post">
              <p> Enter Only Charaters Small or Capital,? , - to create your question</p>
                <?php for($i =1 ;$i<= $qnum;$i++){?>
                  <label for="question">Enter Question: <?php echo $i?></label>
                  <input type="text" name="question<?php echo $i?>" id="question">
                  

              <?php
                } //end of the for loop
                ?>
                  <input type ='hidden' name= 'type' value='<?php echo $type?>'>
                  <input type="hidden" name='qnum' value="<?php echo $qnum?>">
                <input type="hidden" name='unique' value="<?php echo $uniqueNum?>">
                <input type="submit" value="Submit" name ='done'>
            </form> <!--end of the form for short-->
            <?php
        }



        //range type
        if($type =='range'){?>
					<form action="submit.php" method="post">
              <p> Enter Only Charaters Small or Capital,? , - to create your question</p>
                <?php for($i =1 ;$i<= $qnum;$i++){?>
                  <label for="question">Enter Question: <?php echo $i?></label>
                  <input type="text" name="question<?php echo $i?>" id="question">
                  

              <?php
                } //end of the for loop
                ?>
                  <input type ='hidden' name= 'type' value='<?php echo $type?>'>
                  <input type="hidden" name='qnum' value="<?php echo $qnum?>">
                <input type="hidden" name='unique' value="<?php echo $uniqueNum?>">
                <input type="submit" value="Submit" name ='done'>
            </form> <!--end of the form for short-->
            <?php
        }









    }
    else{
      die("Error: please complete 'homePage.php' ");
    }
		?>
	</div>
</body>
</html>