<?php
session_start();
require('../test_input.php');
if(!isset( $_SESSION['scale_ans'])) {die("Error: please solve the 'range.php' questionaire");}

// we are inside here
//the number of rows inserted for 1 simple questionaire 
$rowNum = $_SESSION['scale_ans']; 

//unique id that the user entered.. 
$uniqueNum = $_SESSION['range_uni'];

try{

  require('../connection.php');

  //read the scale_ ans table
    $sql ="select * from scale_ans";
    $s1 =$db->prepare($sql);
    $s1->execute();
    $rs = $s1->fetchAll(PDO::FETCH_NUM); //numeric access

  //One of the most amazing ideas i have ever gotten
  //read the number of answers per uniqueNum, in other words the answers to one form of questions, not for every. this helps in the accuracy of the report.
  $sql2 ="select count(*) from scale_ans where uniqueNum=?";
  $s3 =$db->prepare($sql2);
  $s3->bindParam(1,$uniqueNum);
  $s3->execute();
  $numOfAns = $s3->fetchColumn(); //numeric access
  $perUser= $numOfAns/$rowNum;

  //read all the values from the questionaire table
  $sql2= "select * from scale";
  $s1 = $db->prepare($sql2);
  $s1->execute();
  $rows = $s1->fetchAll(PDO::FETCH_NUM); //all the values from the questionaire table

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
  <div class="box1-container">
    <div class="question-box">


<?php
//loops here
echo "<br> <b>Number of respnses to this form: </b> ". $perUser."<br>";

$qC=0; //count for the question repeat because it is answered multiple times 
$c1 = 0; //count for option1 answers
$c2 = 0; //count for option2 answers
$c3 = 0; //count for option3 answers
$c4 = 0; //count for option4 answers
$c5 = 0; //count for option5 answers


$sumOfScale =0 ;
$scaleAvg =0 ;

$op1Avg =0; //number of times options option 1 is chosen
$op2Avg =0; //number of times options option 2 is chosen
$op3Avg =0; //number of times options option 3 is chosen
$op4Avg =0; //number of times options option 4 is chosen
$op5Avg =0; //number of times options option 4 is chosen



//the average of the range scale works! 

foreach($rows as $row){
  foreach($rs as $r){
    //comparing the uniqueNum in both tables
    if($row[7]==$r[3]){
      //id comparison 
      if($row[0]==$r[1]){
          //question count
          if($row[7] ==$uniqueNum){
              $qC++; 

              //option1 is chosen by a user ?
              if($row[2]==$r[2]){
                $c1++; 
              }

              //option2 is chosen by a user ?
              if($row[3]==$r[2]){
                $c2++; 
              }

              //option3 is chosen by a user ?
              if($row[4]==$r[2]){
                $c3++; 
              }

              //option4 is chosen by a user ?
              if($row[5]==$r[2]){
                $c4++; 
              }
              //option5 is chosen by a user ?
              if($row[6]==$r[2]){
                $c5++; 
              }

        }//re-check that we are dealing with one form only!!!

      }//end of the id comparison 
    } // end of uniqueNum comparison 
  }//end of the scale_ans table

      //comparing the uniqueNum in both tables
      if($row[7]==$uniqueNum){

        if($qC>0){
            
            echo"<br> <b>$row[1]</b><br>";
            

            //getting the % of times option1 is chosen
            if($c1 > 0){
              $op1Avg = ($c1*1);
            }


            //getting the % of times option2 is chosen
            if($c2 >0){
              $op2Avg = ($c2*2);
            }

            //getting the % of times option3 is chosen
            if($c3 >0){
              $op3Avg = ($c3*3);
              
            }

            //getting the % of times option4 is chosen
            if($c4 >0){
              $op4Avg = ($c4*4);
            }

            //getting the % of times option5 is chosen
            if($c5 >0){
              $op5Avg = ($c5*5);
            }

            $sumOfScale = ($op1Avg +$op2Avg +$op3Avg +$op4Avg +$op5Avg ); 
            $scaleAvg = $sumOfScale /$qC; 
            echo "the scale Avgerage is = $scaleAvg";
            echo"<input type='range' value='$scaleAvg' min='0' max='5' step=''> ";

        } // end of checking that we are not dividing by 0

        //reset all the values

        $qC=0; //count for the question repeat because it is answered multiple times 
        $c1 = 0; //count for option1 answers
        $c2 = 0; //count for option2 answers
        $c3 = 0; //count for option3 answers
        $c4 = 0; //count for option4 answers
        $c5 = 0; //count for option5 answers


        $sumOfScale =0 ;
        $scaleAvg =0 ;

        $op1Avg =0; //number of times options option 1 is chosen
        $op2Avg =0; //number of times options option 2 is chosen
        $op3Avg =0; //number of times options option 3 is chosen
        $op4Avg =0; //number of times options option 4 is chosen
        $op5Avg =0; //number of times options option 4 is chosen


  }//checking that questions targeted has the same uniqueId that's in the session

}//end of the loop for scale table






?>




      </div>
    </div>
  </div>
</body>
</html>
<?php
unset($db);

}//end of try


catch(PDOException $e){
  die("Error:".$e->getMessage());
}

?>