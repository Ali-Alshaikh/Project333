<?php
/*
we put these lines in a separte files because: 
when we want to host our website we just change this document 
and this would be much easier, than chaning lots of files
*/
$db = new PDO('mysql:host=localhost;dbname=project_333;charset=utf8', 'root', '');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // by default the PDO will not fire the errors that happens
 // at the hosting stage you will need to comment this line out
  //bucz the user do not need to see the errors in the database
  
?>