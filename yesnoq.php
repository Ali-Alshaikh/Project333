<?php
    try{
    require('requiredFiles/connection.php');


    }

    catch(PDOException $ex)
    {
        die($ex->getMessage());
    }
    $sql="select * from ynq";
    $rs=$db->query($sql);
    $db=null;
       foreach($rs as $row)
        {   
            echo "<form action='' method='post'";
            echo "<br><p>quistion".$row[0]."</p>";
            echo $row[1]."<br>";
            echo " <input type='radio' name='qui.$row[0].'>".$row[2]."<br>";
            echo " <input type='radio' name='qui.$row[0].'>".$row[3]."<br>";

        }
        echo "<br><input type='submit' value='submit quiz'>";
            echo "</form>";
          
    
?>