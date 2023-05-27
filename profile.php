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
        /* Base styles */
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
        /* Button styles */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0069d9;
        }


   /* Media queries */
   @media only screen and (max-width: 768px) {
        /* Adjust container  */
        .container {
            padding: 50px;
        }
        
        /* Adjust image size  */
        .container img {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }

        /* Adjust font size  */
        .container .form-control {
            font-size: 18px;
            margin-bottom: 10px;
        }
    }

    @media only screen and (max-width: 480px) {
        /* Adjust container padding  */
        .container {
            padding: 30px;
        }

        /* Adjust image size  */
        .container img {
            width: 100px;
            height: 100px;
            margin-bottom: 5px;
        }

        /* Adjust font size  */
        .container .form-control {
            font-size: 16px;
            margin-bottom: 5px;
        }
    }

    @media only screen and (max-width: 320px) {
        /* Adjust container padding  */
        .container {
            padding: 20px;
        }

        /* Adjust image size  */
        .container img {
            width: 80px;
            height: 80px;
            margin-bottom: 3px;
        }

        /* Adjust font size */
        .container .form-control {
            font-size: 14px;
            margin-bottom: 3px;
        }
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