<?php
session_start();
if(!isset($_SESSION['nQuestions'])){ die("please go and answer page 'yes_no.php' "); }
else{
  $check = $_SESSION['nQuestions']; //number of rows inserted
  $uniqueNum = $_SESSION['yes']; // the  unique ID that the user entered to be able to know which form to calculate results from
  //echo "the uniqueNum= $uniqueNum <br>";

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

  /*no need for a loop we made a simple solution */ 
  //count the number of rows inside the database
  $sql2="select count(*) from yes_no_Ans where uniqueNum=? ";
  $NumOfRes = $db->prepare($sql2); //get the num of responses inside the table
  $NumOfRes->bindParam(1,$uniqueNum);
  $NumOfRes->execute();
  $colNum = $NumOfRes->fetchColumn();//number of rows answered per uniqueNum
  $perUser= $colNum/$check; //this will give us the number of reponses to the form 
  /* testing print
  echo "number of questions inside the questionaire: ". $check; //this is correct
  echo"<br><br>";
  echo "number of responses to this questionaire: ".$perUser."<br>"; //fixed, correct number should be yeilded
  echo "<br>";
  echo "total answers per unique Number for this questionaire: ". $colNum."<br>"; //total rows of to the answers per questionaire per Unique id
  echo "<br>";
  */
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
        echo "<bR><b>Total answers for this questionaire: </b>". $colNum."<br><br>";
        echo "<b>Number of responses to this questionaire: </b>".$perUser."<br><br>"; 


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
      if($row[4]==$uniqueNum){
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
        } //end of the $Qcount if statment
      }//end of checking that the unique number is the same when printing and calculating.

      //reset everything down here
      $countYes = 0;
      $countNo = 0;
      $Qcount = 0;
      $yesAverage =0;
      $noAverage =0;



    }//end of the 1st loop 
?>
        </div>
    </div>
  </div>
</body>
</html>
<?php
  
}//end of try

catch(PDOException $e){

die("Error: ".$e->getMessage());

}
}




?>