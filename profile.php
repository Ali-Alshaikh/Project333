<?php
    session_start(); //always start with session start 
    //use try and catch :)
    require("requiredFiles/connection.php");
    //add the necessary tables into the database that we have
  

    $user_id = $_SESSION['activeUser'];
    // $user_id = 1;

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
            // make a table in the database we have created 
            $select = $pdo->prepare( "SELECT * FROM `user` WHERE `id` = $user_id");

            $select->execute() or die('query failed');

            $result = $select->fetch();

            // print_r($result);
            // print_r($result['id']); 
            $user_id = $result['id'];
            $user_name = $result['name'];
            $user_password = $result['password'];
            $user_pic = $result['image'];
            // if(mysqli_num_row() > 0){
            //     $fetch = mysqli_fetch_assoc($select);

            // }
            // if($fetch['image'] == ''){
            //     echo '<img src="/pic-profile.png">';
            // }
            // else{
            //     echo '<img src="uploaded_img/'.fetch['image'].'">';
            // }
            if (isset($user_pic) && !empty($user_pic)) {
                echo '<img src="' . $user_pic . '" alt="Image">';
            } else {
                echo '<img src="pic-profile.png" alt="Default image">';
            }
            ?>
            <div class="form-control"> 
            <?php echo $user_name ?>
            </div>
            <!-- <h3><?php echo $fetch['name']; ?></h3> -->
            <a href="update_profile.php" class="btn"> update profile</a>
            <!-- <a href="index.html?logut=<?php echo $user_id; ?>" class="delete-btn">logout</a> -->
            <!-- <p>new <a href="login2.php">login</a> or <a href="signup2.php">signup</a></p>             -->
        </div>

    </div>
</body>
</html>