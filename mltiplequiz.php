<?php
    require 'requiredFiles/header.php';



    try{
    require('requiredFiles/connection.php');
    

    }

    catch(PDOException $ex)
    {
        die($ex->getMessage());
    }
    $sql="select * from quiz";
    $rs=$db->query($sql);
    $db=null;
        foreach($rs as $row)
        {   
            echo "<form action='' method='post'";
            echo "<br><p>quistion".$row[0]."</p>";
            echo $row[1]."<br>";
            echo " <input type='radio' name='qui.$row[0].'>".$row[2]."<br>";
            echo " <input type='radio' name='qui.$row[0].'>".$row[3]."<br>";
            echo " <input type='radio' name='qui.$row[0].'>".$row[4]."<br>";
            echo " <input type='radio' name='qui.$row[0].'>".$row[5]."<br>";
        }
        echo "<br><input type='submit' value='submit quiz'>";
            echo "</form>";



 //footer -- must be at the end
 require 'requiredFiles/footer.php';   
?>

