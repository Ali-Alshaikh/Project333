<?php
    session_start(); //always at the top !

    require 'requiredFiles/connection.php';
    //make the required tables in the database we have created so things can work

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>update user</title>
</head>
<body>
        <div class="container">
        <div class="profile">
            <?php
            $select = $pdo->prepare( "SELECT * FROM `user` WHERE `id` = $user_id");
            $select->execute() or die('query failed');

            $result = $select->fetch();

            // print_r($result);
            // print_r($result['id']); 
            $user_id = $result['id'];
            $user_name = $result['name'];
            $user_password = $result['password'];
            $user_pic = $result['image'];

            // img stander
            if (isset($user_pic) && !empty($user_pic)) {
                echo '<img src="' . $user_pic . '" alt="Image">';
            } else {
                echo '<img src="pic-profile.png" alt="Default image">';
            }
            ?>
            <div class="form-control"> 
             <form class="form"  method="post" enctype="multipart/form-data">
                <h2 style color="blue" >Update Profile</h2>
                <div class="form-control">
                <label for="username">Username </label>
                <input type="text" name="username"id="username" placeholder="<?php echo $user_name ?>" />
                
                </div>

                <div class="form-control">
                <label for="password">New Password</label>
                <input type="password" name="Password"id="password" placeholder="Enter password" />
                </div>

                <div class="form-control">
                <label for="password2">Confirm Password</label>
                <input type="password" name="Password2"id="password2" placeholder="Enter password again" />      
                </div>
                
                <div class=" takeImage">
                    <label for="image"> uplode image as png or jpg</label> <br>
                    <input type="file" name="image" id="image">
                </div>
                <button type="submit" name="submit"> update</button>
             <?php
                // Get the new name, password, and image from the form data
                $new_name = $_POST['username'];
                $new_password = $_POST['Password'];
                $new_image = $_FILES['image']['name'];

                // Update the user's information in the database
                $update = $pdo->prepare("UPDATE `user` SET `name` = :name, `password` = :password, `image` = :image WHERE `id` = :id");
                $update->execute(array(
                  ':name' => $new_name,
                  ':password' => $new_password,
                  ':image' => $new_image,
                  ':id' => $user_id
                 ));

                // Upload the new image file to the server
                if (!empty($new_image)) {
                  $target_dir = "uploads/";
                  $target_file = $target_dir . basename($_FILES['image']['name']);
                  move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                }
             ?>
             <a href="profile.php"> profile</a>
             <a href="index.html"> home</a>
            </div>
        </div>

    </div>
</body>
</html>