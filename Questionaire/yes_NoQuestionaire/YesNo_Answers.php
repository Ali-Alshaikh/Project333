<?php //it works!!
session_start();
$uniqueNum = $_SESSION['yes'];
/*
    //put a header so that the user cannot see this page
    //save into a session the: 
      - response times 
      - % of yes and no answers
      - use a session to check that the user does not enter this page in anyform
*/
    $response =0;
    if(isset($_POST['sb'])){
      //insert the answers to the database!
      //calculate the number of responses 
      //calculate the average of yes 
      //calculate the average of the No answers 
      try{
        require('../connection.php');
        $sql="insert into yes_no_Ans values(null,:qid,:answer,:unique)"; //finally it works
        $s = $db->prepare($sql);
        $s->bindParam(':answer',$answer);
        $s->bindParam(':qid',$qid1);
        $s->bindParam(':unique',$uniqueNum);

        $sql1= 'select * from Yes_No'; //from the main table with questions
        $s1 = $db->prepare($sql1);
        $s1->execute();
        $rows = $s1->fetchAll(PDO::FETCH_NUM);



        

        $id = $_POST['id']; //this is an array
        $check =0;
        $num_id = 0;
        $countYes=0;
        $countNo=0;
       
        //ALHAMDULLIAH IT WORKS
        foreach($rows as $row){

              for($i =0 ; $i < count($id);$i++){
                  $a = 'answer'.$i;
                  $answer= $_POST[$a]; 
                  $qid1 = $id[$i];
                    if($row[0]==$qid1){
                      $s->execute();
                      $check += $s->rowCount();
                    }
                  
                  /*
                  if($r[0]==$qid1){
                    $s->execute();
                    $i++;
                    $check = $s->rowCount();
                    echo $check." rows updated <br>";
                  }
                  */

              } //for loop for the array id's
  
      }// end of the database for loop!
      echo"this is the number of rows inserted: ".$check."<br>";
      echo "your answers have been saved successfully!<bR>";

      $_SESSION['nQuestions'] = $check;

      
    }




      catch(PDOException $e){
        die("Error:".$e->getMessage());
      }
  

    





    }

    else{
      die('you need to answer the yes_no questionaire first!');
    }
    
?>