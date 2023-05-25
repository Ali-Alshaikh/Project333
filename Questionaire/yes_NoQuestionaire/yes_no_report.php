<?php
session_start();
if(!isset($_SESSION['nQuestions'])){ die("please go and answer page 'yes_no.php' "); }
else{
  $check = $_SESSION['nQuestions'];
  $uniqueNum = $_SESSION['yes'];
try{
  require("../connection.php");
  

  //getting all the information in table yes_no
  $sql1= 'select * from Yes_No'; //from the main table with questions
  $s1 = $db->prepare($sql1);
  $s1->execute();
  $rows = $s1->fetchAll(PDO::FETCH_NUM);

  //select everything from the yes_no_answers
  $sql5="select * from yes_no_Ans";
  $stmt0 = $db->prepare($sql5);
  $stmt0->execute();
  $rs = $stmt0->fetchAll(PDO::FETCH_NUM);

  //count the number of rows inside the database
  $sql2="select count(*) from yes_no_Ans";
  $NumOfRes = $db->prepare($sql2); //get the num of responses inside the table
  $NumOfRes->execute();
  $colNum = $NumOfRes->fetchColumn();
  $perUser= $colNum/$check;
  echo "number of questions inside the form: ". $check;
  echo"<br><br>";
  echo "the number of responses to this form: ".$perUser."<br>";
  echo "<br>";
  echo "total rows: ". $colNum."<br>";
  echo "<br>";


    //count the number of rows inside the database where answer = yes
    $sql3="select count(*) from yes_no_Ans where answer='Yes' ";
    $NumOfRes = $db->prepare($sql3); //get the num of responses inside the table
    $NumOfRes->execute();
    $yesNum = $NumOfRes->fetchColumn();
    echo "the number answers that represent yes =".$yesNum."<br>";

  echo "<br>";



    //count the number of rows inside the database where answer = no
    $sql4="select count(*) from yes_no_Ans where answer='No' ";
    $NumOfRes = $db->prepare($sql4); //get the num of responses inside the table
    $NumOfRes->execute();
    $noNum = $NumOfRes->fetchColumn();
    echo "the number answers that represent no =".$noNum."<br>";
    echo "<br>";

    //calculate the number of yes's that this form generates in total 
    //calculate the number of no's that this form generates in total


    //get the percentage of yes and no for each question! 
    //Looping through the table yes_no 
    $countYes = 0;
    $countNo = 0;
    $Qcount = 0;
    $yesAverage =0;
    $noAverage =0;
    foreach($rows as $row){

      //looping through the table yes_no_answers
      foreach($rs as $r){

        //compare the unique num in table 1 and uniqueNum in table2
        if($row[4] ==$r[3]){
        //comparing the id of row id of 1st table  with 2nd table 
        if($row[0]==$r[1]){
            $Qcount++; //number of times the question is answered
            //number of yes
            if($r[2]=='Yes'){
              $countYes++;
            }
            //number of No
            if($r[2]=='No'){
              $countNo++;
            }

 

        } //end of if inside loop 

      }//end of the uniqueNum condition

      }//end of the 2nd loop
      if($Qcount >0){

      
        echo"<b>".$row[1]."</b> <br>";

        if($countYes>0){
          $yesAverage = ($countYes/$Qcount)*100;
          echo  "the % of Yes is: ".$yesAverage." <br>";
        }
        if($countNo>0){
          $noAverage = ($countNo/$Qcount)*100;
          echo "the % of No is: ".$noAverage." <br>";
        }
    }
      $countYes = 0;
      $countNo = 0;
      $Qcount = 0;
      $yesAverage =0;
      $noAverage =0;



    }//end of the 1st loop 

  
}

catch(PDOException $e){

die("Error: ".$e->getMessage());

}
}




?>