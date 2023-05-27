<?php
session_start();
require('../test_input.php'); 
if(!isset($_SESSION['range_uni'])){ 
  echo $_SESSION['range_uni'];  
  die('Error: please create a form in the proper manner!');
}

$uniqueNum = $_SESSION['range_uni']; 
$qnum  = $_SESSION['qnum'];

if(isset($_POST['sb'])){

  try{
    require('../connection.php');

    ////validate the id array and the answers
    $id = $_POST['id']; 

    if(empty($id)){
      die('Error: no id is avaliable...');
    }

    for($i =0 ;$i<count($id);$i++){
      $a = 'answer'.$i;
      $answer= test_input($_POST[$a]); 

      if(empty($answer)){
        die("no answer shall be empty");
      }

    
  } //end of for loop 




    //insert into table scale_ans table
    $sql ="insert into scale_ans values(null,:Qid,:answer,:uniqueNum)";
    $s= $db ->prepare($sql); 
    $s->bindParam(':Qid',$qid);
    $s->bindParam(':answer',$answer);
    $s->bindParam(':uniqueNum',$uniqueNum);

    
      //accessing the scale table
      $sql1 = 'select * from scale';
      $s1 = $db->prepare($sql1);
      $s1->execute();
      $rows = $s1->fetchAll(PDO::FETCH_NUM);

      //answers inserted!
      $rInserted =0;
      foreach($rows as $row){

        //the number of id's is the number of insertions to be done so....!
        for($i =0 ;$i<count($id);$i++){
          $a = 'answer'.$i;
          $answer= $_POST[$a]; 
          $qid = $id[$i];
          if($row[0]==$qid){
            $s->execute();
            $rInserted += $s->rowCount();
          }//end of the id == $qid condition
        
      } //end of for loop 
    }//end of the foreach loop

    echo $rInserted." rows Inserted!<br>";
    $_SESSION['scale_ans']= $rInserted;
    unset($db); //good practice?
    header("location:../Quser.php");




  }

 
  catch(PDOException $e){
    die("Error:" .$e->getMessage());
  }

}



?>