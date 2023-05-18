<!--Add the necessary tables to make thing work here! -->

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

    </style>

  </head>
  <body>
    <?php
    session_start();
    $msg="";

    if(isset($_GET['error']))
    {  if ($_GET['error']==1)
          $msg="<p style='color:red;'>You must login first</p>";
      else
          $msg="Unknown error";
    }
    echo $msg;

    if (isset($_POST['sbtn'])){
      $uname = $_POST['un'];
      $pass = $_POST['ps'];
      //Validation will be kept for you as an exercise
      try {
          require('requiredFiles/connection.php');
          $rs=$db->query("select * from users");
          $id=0;
          foreach($rs as $row)
          {
            if($row[1]==$uname && $pass==$row[2])
            {
            $r=$db->query("select id from users where username='$row[1]'");
                 foreach($r as $ro)
               $id=$ro[0];
               $user=$row[1];
                 $_SESSION['activeUser']=$id;
                 $_SESSION['username']=$user;


            if($row[3]=='admin')
              header("location:adminpage.php");
            else if($row[3]=='regular')
              header("location:project333.php");
            }
                else
              echo "<p> password or username is wrong</p>";

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
      </form>
    </div>



  </body>
</html>
