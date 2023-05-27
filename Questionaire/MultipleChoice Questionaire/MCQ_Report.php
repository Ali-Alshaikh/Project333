<?php //this page is working, if time allows put a container + some css, it's Done 
session_start();

if(!isset( $_SESSION['MC_Qnum'])) {die("Error: please solve the 'MCQ.php' questionaire");}
// we are inside here
//the number of rows inserted for 1 simple questionaire 
$rowNum= $_SESSION['MC_Qnum']; 
//echo $rowNum."<br>";

//the uniqueID that the user entered to be able to know which form to calculate the results from. 
$uniqueNum = $_SESSION['MC_uniqueNum'];
//echo $uniqueNum."<br>";


try{
  require('../connection.php');
  //read the from the MCQ_ans table
  $sql1= "select * from MCQ_ans";
  $s = $db->prepare($sql1);
  $s->execute();
  $rs = $s->fetchAll(PDO::FETCH_NUM); //all the values from the answers table

  //read all the values from the questionaire table
  $sql2= "select * from questionaire";
  $s1 = $db->prepare($sql2);
  $s1->execute();
  $rows = $s1->fetchAll(PDO::FETCH_NUM); //all the values from the questionaire table

  //counting the number or rows/answers inside the db MCQ_ans for every unique ID that matches the id in
  //table 1 and table 2 
  $sql3="select count(*) from MCQ_ans where uniqueNum=?"; //for the current moment we don't need a for loop,
                                                          //do to this uniqueNum=? wonderful solution
  $s2 = $db->prepare($sql3); 
  $s2->bindParam(1,$uniqueNum);
  $s2->execute(); 
  $numOfAns = $s2->fetchColumn();//number of rows answered per uniqueNum
  $perUser = $numOfAns/$rowNum; //this will give us the number of reponses to the form



  $qC=0; //count for the question repeat because it is answered multiple times 
  $c1 = 0; //count for option1 answers
  $c2 = 0; //count for option2 answers
  $c3 = 0; //count for option3 answers
  $c4 = 0; //count for option4 answers

  $op1Avg =0; //number of times options option 1 is chosen
  $op2Avg =0; //number of times options option 2 is chosen
  $op3Avg =0; //number of times options option 3 is chosen
  $op4Avg =0; //number of times options option 4 is chosen

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
          echo"<br> <b>uniqueNum = </b>". $uniqueNum."<br>";
          echo"<br> <b>number of responses = </b>". $perUser."<br>";
          echo"<br> <b>number of rows answered per uniqueNum = </b>". $numOfAns."<br>";
          
  //keeping it for later use!
  //Alhamdulliah it works , see nothing is impossible, nothing is hard, allah is with me. 
  foreach($rows as $row){
    foreach($rs as $r){
      //comparing the uniqueNum in both tables
      if($row[8]==$r[3]){
        //comparing the id of the questions
        if($row[0]==$r[1]){
          $qC++; 

          //option1 is chosen by a user ?
          if($row[3]==$r[2]){
            $c1++; 
          }

          //option2 is chosen by a user ?
          if($row[4]==$r[2]){
            $c2++; 
          }

          //option3 is chosen by a user ?
          if($row[5]==$r[2]){
            $c3++; 
          }

          //option4 is chosen by a user ?
          if($row[6]==$r[2]){
            $c4++; 
          }



        }//end of id check
      }//end of uniqueNum check
    }//end of loop for the MCQ_ans

    //comparing the uniqueNum in both tables
    if($row[8]==$uniqueNum){

        if($qC>0){
          echo"<br> <b>$row[2]</b><br>";
          

          //getting the % of times option1 is chosen
          if($c1 >0){
            $op1Avg = ($c1/$qC)*100;
            echo"1. the % of <b>".$row[3]. "= </b> $op1Avg%<br>";
          }


          //getting the % of times option2 is chosen
          if($c2 >0){
            $op2Avg = ($c2/$qC)*100;
            echo"2.the % of <b>".$row[4]. "= </b> $op2Avg% <br>";
          }

          //getting the % of times option3 is chosen
          if($c3 >0){
            $op3Avg = ($c3/$qC)*100;
            echo"3.the % of <b>".$row[5]. "= </b> $op3Avg%<br>";
          }

          //getting the % of times option4 is chosen
          if($c4 >0){
            $op4Avg = ($c4/$qC)*100;
            echo"4.the % of <b>".$row[6]. "= </b> $op4Avg% <br>";
          }

        } // end of checking that we are not dividing by 0

  }

    //reset all the following values 

    $qC=0; //count for the question repeat because it is answered multiple times 
    $c1 = 0; //count for option1 answers
    $c2 = 0; //count for option2 answers
    $c3 = 0; //count for option3 answers
    $c4 = 0; //count for option4 answers
  
    $op1Avg =0; //number of times options option 1 is chosen
    $op2Avg =0; //number of times options option 2 is chosen
    $op3Avg =0; //number of times options option 3 is chosen
    $op4Avg =0; //number of times options option 4 is chosen

  

  }//end of loop for the questionaire table
  ?>
        </div>
    </div>
  </div>

  </body>
  </html>
<?php
}

catch(PDOException $e){
  die("Error:".$e->getMessage());
}

?>