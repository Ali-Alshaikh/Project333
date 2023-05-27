<?php

require('requiredFiles/test_input.php');

?>

<!--

create the necessay database table so this page will work, refer to requiredFiles/connection.php
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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
    if (isset($_POST['submit'])){
      $uname = test_input($_POST['un']);
      $pass = test_input($_POST['ps']);
      $cpass = test_input($_POST['cps']);

    if(empty($uname)||empty($pass)||empty($cpass)){
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

        if(preg_match($pattPass,$cpass)!= 1){
        die("please enter a proper confirm password");
      }

    


      ?>
      <?php
      //Validation will be kept for you as an exercise
      //check name, username, password, cpassword, and the proceed
      try {
          require('requiredFiles/connection.php');
          $sql1="select * from users";
          $s = $db->prepare($sql1);
          $s->execute();
          $rows = $s->fetchAll(PDO::FETCH_NUM);

          
          foreach($rows as $row){
            if($row[1]==$uname){
              die("Error: this username exits");
            }
          }
          

          $sql = "insert into users values (
                    null,
                    '$uname',
                    '$pass',
                    'regular'
            )";
            
          $result = $db->exec($sql);
          if ($result == 1){
              echo "<h3 style='color:red;text-align:center'>Successful editing</h3>";
                header("location:index.php");
              }

          elseif ($result == 0) {
            echo "<h1>the user name is not exists</h1>";
          }

          $db=null;
      }
      catch(PDOException $e){

          die($e->getMessage());  
        }

      
    }
    ?>

    <div class="container">
      <form class="form"  method="post">
        <h2>Sign Up</h2>
        <div class="form-control">
          <label for="username">Username</label>
          <input type="text" name="un"id="username" placeholder="Enter username" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password">Password</label>
          <input type="password" name="ps"id="password" placeholder="Enter password" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password2">Confirm Password</label>
          <input type="password" name="cps"id="password2" placeholder="Enter password again" />
          <small>Error message</small>
        </div>
        <button type="submit" name="submit">Sign Up</button>
      </form>
    </div>

    <script>


    const form = document.getElementById('form');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    // Show input error message
    function showError(input, message) {
      const formControl = input.parentElement;
      formControl.className = 'form-control error';
      const small = formControl.querySelector('small');
      small.innerText = message;
    }

    // Show success outline
    function showSuccess(input) {
      const formControl = input.parentElement;
      formControl.className = 'form-control success';
    }




    // Check required fields
    function checkRequired(inputArr) {
      let error=0;
      inputArr.forEach(function(input) {
        if (input.value.trim() === '') {
          showError(input, `${getFieldName(input)} is required`);
          ++error;
        } else {
          showSuccess(input);
        }
      });
      return error;
    }

    // Check input length
    function checkLength(input, min, max) {
      let error=0;
      if (input.value.length < min) {
        showError(
          input,
          `${getFieldName(input)} must be at least ${min} characters`
        );
        ++error;
      } else if (input.value.length > max) {
        showError(
          input,
          `${getFieldName(input)} must be less than ${max} characters`
        );
        ++error;
      } else {
        showSuccess(input);
      }
      return error;
    }

    // Check passwords match
    function checkPasswordsMatch(input1, input2) {
      let error = 0;
      if (input1.value !== input2.value) {
        showError(input2, 'Passwords do not match');
        ++error;
      }
      return error;
    }

    // Get fieldname
    function getFieldName(input) {
      return input.id.charAt(0).toUpperCase() + input.id.slice(1);
    }

    // Event listeners
    form.addEventListener('submit', function(e) {
      e.preventDefault(); //prevents auto submit
      let allErrors = 0;
      allErrors+=checkRequired([username, password, password2]);
      allErrors+=checkLength(username, 3, 15);
      allErrors+=checkLength(password, 6, 25);
      allErrors+=checkPasswordsMatch(password, password2);

      //If all requirements are successful, submit the form
      if (allErrors)
          form.submit();
    });


    </script>
  </body>
</html>
