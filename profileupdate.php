<?php
    session_start();
    require('requiredFiles/connection.php');
    

    $user_id = $_SESSION['activeUser'];
    
    if(!isset($user_id)){
        header('location:login2.php');
    }

    $select = $db->prepare( "SELECT * FROM `users` WHERE `id` = $user_id");
            $select->execute() or die('query failed');

            $result = $select->fetch();

            $user_name = $result['username'];

    if (isset($_POST['submit'])) {
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];

        // Validate input
        $errors = array();

        if (empty($new_username)) {
            $errors['new_username'] = "Please enter a new username.";
        } else if (strlen($new_username) < 3 || strlen($new_username) > 50) {
            $errors['new_username'] = "Username must be between 3 and 50 characters.";
        }

        if (empty($new_password)) {
            $errors['new_password'] = "Please enter a new password.";
        } else if (strlen($new_password) < 8 || strlen($new_password) > 50) {
            $errors['new_password'] = "Password must be between 8 and 50 characters.";
        }

        if (count($errors) == 0) {
            // Update user information in database
            $update = $db->prepare("UPDATE `users` SET `username` = :username, `password` = :password WHERE `id` = :id");
            $update->bindParam(':username', $new_username);
            $update->bindParam(':password', $new_password);
            $update->bindParam(':id', $user_id);
            $result = $update->execute();

            if ($result) {
                // Redirect to profile page
                header('location:profile.php');
            } else {
                $error = "Failed to update user information.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Style the container */
        .container {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 720px;
        }

        /* Style the form */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Style the form controls */
        .form-control {
            margin: 10px 0;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="password"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        button[type="submit"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        small {
            font-size: 14px;
            color: #999;
            margin-top: 5px;
        }

        /* Media queries */
        @media(max-width: 720px) {
        .container {
            width: 90%;
            max-width: 720px;
        }
    }

    @media(max-width: 480px) {
        .container {
            width: 90%;
            max-width: 480px;
        }

        input[type="password"], input[type="text"], button[type="submit"] {
            font-size: 14px;
            padding: 8px;
        }
    }
    </style>
    <title>Update Profile</title>
</head>
<body>
    <div class="container">
        <h2>Update Profile</h2>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error ?></div>
        <?php } ?>
        <form method="post">
            <div class="form-control">
                <label for="new_username">Current Username : <?php echo $user_name ?> <br> New Username:</label>
                <input type="text" name="new_username" id="new_username" value="<?php if(isset($_POST['new_username'])) { echo $_POST['new_username']; } ?>" maxlength="50" required>
                <?php if (isset($errors['new_username'])) { ?>
                    <div class="error"><?php echo $errors['new_username'] ?></div>
                <?php } ?>
            </div>
            <div class="form-control">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" id="new_password" maxlength="50" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
                <?php if (isset($errors['new_password'])) { ?>
                    <div class="error"><?php echo $errors['new_password'] ?></div>
                <?php } ?>
                <small>Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.</small>
            </div>
            <button type="submit" name="submit">Update</button>
            
        </form>
    </div>
</body>
</html>