<!--Add the necessary tables to make thing work here! -->
<?php
 session_start();
require('requiredFiles/test_input.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    :root {
      --success-color: #2ecc71;
      --error-color: #e74c3c;
    }

    * {
      box-sizing: border-box;
    }

    body {
      background-color: #f9fafb;
      font-family: 'Open Sans', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
      width: 400px;
    }

    h2 {
      text-align: center;
      margin: 0 0 20px;
    }

    .form {
      padding: 30px 40px;
    }

    .form-control {
      margin-bottom: 10px;
      padding-bottom: 20px;
      position: relative;
    }

    .form-control label {
      color: #777;
      display: block;
      margin-bottom: 5px;
    }

    .form-control input {
      border: 2px solid #f0f0f0;
      border-radius: 4px;
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 14px;
    }

    .form-control input:focus {
      outline: 0;
      border-color: #777;
    }

    .form-control.success input {
      border-color: var(--success-color);
    }

    .form-control.error input {
      border-color: var(--error-color);
    }

    .form-control small {
      color: var(--error-color);
      position: absolute;
      bottom: 0;
      left: 0;
      visibility: hidden;
    }

    .form-control.error small {
      visibility: visible;
    }

    .form button {
      cursor: pointer;
      background-color: #04AA6D;
      border: 2px solid #04AA6D;
      border-radius: 4px;
      color: #fff;
      display: block;
      font-size: 16px;
      padding: 10px;
      margin-top: 20px;
      width: 100%;
    }
    .form button a{
      text-decoration: none;
      color: white;
    }

    </style>

  </head>
  <body>
    <?php
   
   //validating something
    $msg="";
    if(isset($_GET['error']))
    {  if ($_GET['error']==1)
          $msg="<p style='color:red;'>You must login first</p>";
      else
          $msg="Unknown error";
    }
    echo $msg;



//checking the button to start working php, and validating
    if (isset($_POST['sbtn'])){
      $uname = test_input($_POST['un']);
      $pass = test_input($_POST['ps']);

      if(empty($uname)||empty($pass)){
        die("Error: no input should be left empty");
      }

      //regular expressions
      $pattUn = "/^[a-zA-Z0-9\_\-\@]{3,10}$/";
      $pattPass = "/^[a-zA-Z0-9\@\#]{3,10}$/";

      if(preg_match($pattUn,$uname)!= 1){
        die("please enter a proper username");
      }

      if(preg_match($pattPass,$pass)!= 1){
        die("please enter a proper password");
      }


      try {
          require('requiredFiles/connection.php');
          $sql="select * from users where username ='$uname'";
          $rs=$db->prepare($sql);
          $rs->execute();
          $rows =$rs->fetch(PDO::FETCH_NUM);
          if($rows)
          {
            
            //username exits
            if(password_verify($pass,$rows[2]))
            {
              foreach($rows as $row){
                if($row[3]=='admin')
                  header("location:HomePage_admin.php");
                else if($row[3]=='regular')
                  header("location:HomePage.php");
              }

            } //end of the username and password check 
           

            //another technique
            if($pass == $rows[2])
            {
              while($rows){
                if($rows[3]=='admin')
                  header("location:HomePage_admin.php");
                else if($rows[3]=='regular')
                  header("location:HomePage.php");
                  die("sup");
              }

            } //end of the username and password check 

            if($pass != $rows[2]){
              die('Error:wrong password!');
            }
          }

          else{
            die("<br>please check your login details<br>");
          }
          


          
          $db=null;
      }
      catch(PDOException $e){
        die($e->getMessage());
      }
    }
    ?>
    <div class="container">
      <form  class="form" method="post">
        <h2>Sign In</h2>
        <div class="form-control">
          <label for="username">Username</label>
          <input type="text" name="un" id="username" placeholder="Enter username" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password">Password</label>
          <input type="password" name="ps" id="password" placeholder="Enter password" />
          <small>Error message</small>
        </div>
        <button type="submit" name="sbtn">Sign In</button>
        <button type="button"><a href="signup2.php">Signup?</a></button>
      </form>
    </div>



  </body>
</html>
