<?php
    session_start();
    require('requiredFiles/connection.php');
    

    $user_id = $_SESSION['activeUser'];
    

    if(!isset($user_id)){
        header('location:login2.php');
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="profileStyle.css">
    <style>
        .container {
  display: flex;
  flex-direction: column;
  align-items: center;
  border: 2px solid #2b2b2b;
  margin: 2px;
  background-color: lightblue;
  padding: 100px;
  }

 .container img {
  width: 200px;
  height: 200px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 20px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
 }

 .container .form-control {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  text-align: center;
 }

 .container .btn {
  padding: 10px 20px;
  background-color: #2b2b2b;
  color: white;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
 }

 .container .btn:hover {
  background-color: #333;
 }
    </style>
    <title>user profile</title>
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php
            $select = $db->prepare( "SELECT * FROM `users` WHERE `id` = $user_id");
            $select->execute() or die('query failed');

            $result = $select->fetch();

            
            $user_id = $result['id'];
            $user_name = $result['username'];
            $user_password = $result['password'];
            
            if (isset($user_pic) && !empty($user_pic)) {
                echo '<img src="' . $user_pic . '" alt="Image">';
            } else {
                echo '<img src="pic-profile.png" alt="Default image">';
            }
            ?>
            <div class="form-control"> 
            <?php echo $user_name ?>
            </div>
            <a href="index.php" class="btn"> Login! </a>
            <a href="profileupdate.php" class="btn"> update profile</a>
        </div>

    </div>
</body>
</html>