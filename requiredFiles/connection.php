<?php
//Step 1 Connection Instance
$db = new PDO('mysql:host=localhost;dbname=Project333;charset=utf8', 'root', '');
//Step 2 for error handling
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
