<?php
session_start();
if(!isset($_SESSION['sh_qnum'])){
  die('Error: please complete page "short.php" ');
}
// number of answers inserted for 1 simple form --- able to change it's form ... is it good though? 
$answerNum =$_SESSION['sh_qnum']; 
$uniqueNum = $_SESSION['yes_uni']; //this is super cool, you'll see why 
$qnum = $_SESSION['qnum']; // this is the number of questions, since HOMEPAGE.PHP 
/*
echo"this is the number of questions: $answerNum <br>
     this is the unique number used: $uniqueNum<br>
     this is the qnum: $qnum<br>
";
*/

try{
  require('../connection.php');

  //read the short_ans table
  $sql ="select * from short_ans";
  $s1 =$db->prepare($sql);
  $s1->execute();
  $rs = $s1->fetchAll(PDO::FETCH_NUM); //numeric access

  //read the short table
  $sql1 ="select * from short";
  $s2 =$db->prepare($sql1);
  $s2->execute();
  $rows = $s2->fetchAll(PDO::FETCH_NUM); //numeric access

  //One of the most amazing ideas i have ever gotten
  //read the number of answers per uniqueNum, in other words the answers to one form of questions, not for every. this helps in the accuracy of the report.
    $sql2 ="select count(*) from short_ans where uniqueNum=?";
    $s3 =$db->prepare($sql2);
    $s3->bindParam(1,$uniqueNum);
    $s3->execute();
    $numOfAns = $s3->fetchColumn(); //numeric access
    $perUser= $numOfAns/$answerNum;

    /*echo "number of answers for this form = $numOfAns <br>
          number of responses = $perUser<br>";*/
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

        echo"
        <b>This is the unique number used: </b> $uniqueNum<br>
        <b>Number of answers for this form: </b> $numOfAns <br>
        <b>Number of responses: </b>$perUser<br>

        ";

        $qC=0; //count for the question repeat because it may be answered multiple times 
        $ansC= 0; 
        
        //looping through the short table
        foreach($rows as $row){

          //looping through the short_ans table, it will when it goes through all the rows. [assume?]
          foreach($rs as $r){


            //compare the uniqueNum in both tables
            if($row[2]==$r[3]){

              //compare the id's of both tables
              if($row[0]==$r[1]){
                //compare the uniqueNum in from short table with $uniqueNum
                if($row[2]==$uniqueNum){
                if($qC ==0){ 
                  
                  echo"<br> <b> $row[1] </b><br>"; 
                 
                }
                $qC++; //question count times
                //how to check if there is an answer? 
                if(!empty($r[2])){
                  $ansC++; //increment the answer count.. 
                echo " answer $ansC: $r[2] <br>";  //print the answer
                }  
                } //again
              }//end of id's comparison

            }//end of uniqueNum comparison 


          }//end of the loop of the short_ans

          $qC =0;
          $ansC =0 ;

          

        }//end of the loop of the short table

          ?>
    </div>
    </div>
  </div>
</body>
</html>
    <?php
} //end of try

catch(PDOException $e){
  die('Error'.$e->getMessage()); //developer friendly errors check 

}

?>