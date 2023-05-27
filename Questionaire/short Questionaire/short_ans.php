<?php
session_start();
require('../test_input.php');
/*
    - get the id 
    - unique num 
    - isset sb button? 
    -  retreive the id[] 
    - try & catch 
    - insert answers 
    - select all from the short table
    - make a for loop and insert stuff into the short_ans table
*/
if(!isset($_SESSION['yes_uni']) || !isset($_SESSION['qnum'])){
  die(' <br> Error: please complete page "Generate.php" <br>');
}
$uniqueNum = $_SESSION['yes_uni']; 
$qnum = $_SESSION['qnum']; 

echo "<br> the unique num = $uniqueNum and the question number = $qnum <br>";

if(!isset($_POST['sb'])){
  die('<br> Error: please finish page short.php first!<br>');
}

try{
  require('../connection.php'); 

  //id array
  $id =$_POST['id'];
  
  //insert into short_ans the answers
  $sql = 'insert into short_ans values(null,:qid,:answer,:uniqueNum)';
  $s = $db->prepare($sql);
  $s->bindParam(':qid',$qid);
  $s->bindParam(':answer',$answer);
  $s->bindParam(':uniqueNum',$uniqueNum);

  //select * from the short table, look and learn 
  $sql1 = "select * from short";
  $s1 = $db->prepare($sql1);
  $s1->execute();
  $rows = $s1->fetchAll(PDO::FETCH_NUM);

  // validate the answers
  for($i =0 ;$i<count($id);$i++){
    $a = 'answer'.$i;
    $answer= test_input($_POST[$a]);

    if(empty($answer)){
      die('<br>Error: no answer in short should be left empty<br>');
    } 

    //regular expressions
    //only letter, number, -  are allowed
    $patt ="/^[a-zA-Z0-9\,\.\-\s\:!]*$/";
    
    if(preg_match($patt,$answer)!=1){
      die("Error:please follow the rules for writing the answer");
    }
    
  
} //end of for loop 



  //num of rows inserted
  $shortRowInsert = 0;
  //looping through the short table which contains the questions
  foreach($rows as $row){

    //the number of id's is the number of insertions to be done so....!
    for($i =0 ;$i<count($id);$i++){
        $a = 'answer'.$i; // validate the answers, done:)
        $answer= $_POST[$a]; 
        $qid = $id[$i];
        if($row[0]==$qid){
          $s->execute();
          $shortRowInsert += $s->rowCount();
        }


    }// end of the for loop 
  }//end of the foreach loop for short table
 
  echo "<br> $shortRowInsert inserted successfully";
  $_SESSION['sh_qnum']=$shortRowInsert; //number of questions answered...useful for the report page
  unset($db); //good practice ?
  header("location:../Quser.php");

}

catch(PDOException $e){
  die('Error:'.$e->getMessage()); 

}






?>