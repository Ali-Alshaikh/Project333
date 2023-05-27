<?php 
//function that validates the input
function test_input($data){
  $data = trim($data); 
  $data = htmlspecialchars($data); 
  $data = stripslashes($data); 
  return $data;

}

?>