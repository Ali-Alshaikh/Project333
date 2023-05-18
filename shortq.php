<?php
    try{
    require('requiredFiles/connection.php');

    }

    catch(PDOException $ex)
    {
        die($ex->getMessage());
    }
    $sql="select * from shortq";
    $rs=$db->query($sql);
    $db=null;
       foreach($rs as $row)
        {   
            echo "<form action='' method='post'";
            echo "<br>quistion".$row[0]."<br>";
            echo $row[1]."<br>";
            echo "<input type='text' name='an'>";

        }
        echo "<br><input type='submit' value='submit quiz'>";
            echo "</form>";
          
    
?>