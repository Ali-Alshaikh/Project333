<?php
session_start();

if(!isset($_SESSION['MC_uniqueNum'])){ die("Error: please complete page 'submit.php' first! ");}
$uniqueNum = $_SESSION['MC_uniqueNum'];
echo "the unique number entered by the user is: ".$uniqueNum;
//get the variables passed with the $_POST[]; :>)
//echo"<br>";
//echo"welcome you made it here:)<br>";


if(isset($_POST['sb'])){

    //insert the answers to table 
    try{
      require('../connection.php');
      //a loop for the id's 
      $id = $_POST['id']; 
    
      if(empty($id)){
        die('Error: no id is avaliable...');
      }

      //insert into the MCQ_ans table
      $sql ="insert into MCQ_ans values(null,:Qid,:answer,:uniqueNum)";
      $s= $db ->prepare($sql); 
      $s->bindParam(':Qid',$qid2);
      $s->bindParam(':answer',$answer);
      $s->bindParam(':uniqueNum',$uniqueNum);



      //accessing the questionaire table
      $sql1 = 'select * from questionaire';
      
      $stmt1 = $db->prepare($sql1);
      $stmt1->execute();
      $rows = $stmt1->fetchAll(PDO::FETCH_NUM);


      //validate the answers
      for($i =0 ;$i<count($id);$i++){
        $a = 'answer'.$i;
        if(empty($_POST[$a])){
          die('<br>Error: no answer in short should be left empty <br>');
        } 

        //$answer= $_POST[$a]; 
       
      }//end of the for loop for validating the answers
    
      $rInserted =0;

      foreach($rows as $row){
        
        //the number of id's is the number of insertions to be done so....!
        for($i =0 ;$i<count($id);$i++){
            $a = 'answer'.$i;
            $answer= $_POST[$a]; 
            $qid2 = $id[$i];
            if($row[0]==$qid2){
//the problem is here! :) ------------Fixed!------------------the problem was a single space in the key inside bindParam :) ------------------------------------------------
              $s->execute();
              $rInserted += $s->rowCount();
              
              
            }
          
        } //end of for loop 

      } //end of foreach loop
      echo $rInserted." rows Inserted!<br>";
      $_SESSION['MC_Qnum']= $rInserted;
      unset($db); //good practice?
      header("location:../Quser.php");


    } //end of try

    catch(PDOException $e){
      die("Error:" .$e->getMessage());
    }

}
?>