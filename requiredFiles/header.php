<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--the reset sheet by someone please add his name here-->
  <link rel="stylesheet" href="styles/css-reset.css">
  <!--css header styling-->
  <link rel ="stylesheet" href="styles/header.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="styles/sidebar.css">
 <link rel="stylesheet" href="styles/general.css">
<link rel="stylesheet" href="styles/footer.css">
<link rel="stylesheet" href="styles/main.css">
<script src="https://kit.fontawesome.com/58aa1d359e.js" crossorigin="anonymous"></script>



 <title>Football Quiz</title>

  <style>
      /* Default styles */
      .header {
        display: flex;
flex-direction: row;
        align-items: center;
        justify-content: space-between;
        background-color: #333;
        color: #fff;
        padding: 20px;
      }

      .Left {
        display: flex;
        align-items: center;
      }

      .football-image {
        height: 50px;
        margin-right: 10px;
      }

      .website-name {
        font-size: 22px;
        font-weight: 700;
        text-decoration: none;
        color: #fff;
      }

      .Right {
        display: flex;
        flex-direction: row;
        align-items: center;
      }

      .menu-link {
        text-decoration: none;
        color: #fff;
        margin-left: 10px;
        font-size: 18px;
        font-weight: 400;
      }

      .home-box,
      .quiz-box,
      .jokes-box,
      .fact-box {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin: 0 10px;
      }

      .home-box:hover,
      .quiz-box:hover,
      .jokes-box:hover,
      .fact-box:hover {
        cursor: pointer;
      }

      /* Media queries */
      @media only screen and (max-width: 768px) {
        .Left {
          margin-right: auto;
        }

        .burger {
          display: block;
        }

        .Right {
          display: none;
        }

        .website-name {
          font-size: 18px;
        }

        .header {
          padding: 10px;
        }

        .football-image {
          height: 40px;
        }

        .menu-link {
          font-size: 16px;
        }
      }

      @media only screen and (min-width: 769px) and (max-width: 1024px) {
        .menu-link {
          font-size: 16px;
        }

        .football-image {
          height: 45px;
        }

        .website-name {
          font-size: 20px;
        }
      }

      @media only screen and (min-width: 1025px) {
        .menu-link {
          font-size: 18px;
        }

        .football-image {
          height: 50px;
        }

        .website-name {
          font-size: 22px;
        }
      }
    </style>
  
</head>

<body>


<div class="header">
        <div class="Left">
          <img class="burger" src="styles/images/Icons/hamburger-menu.svg">
          <img class="football-image" src="styles/images/Logo/champions-league football.png" >
          <a class="website-name" href="HomePage.php" >Questionaire Website</a>
        </div>
     
        <div class="Right">
          
            <div class="home-box">
              <i class="fa-solid fa-house home"></i>
              <a href="HomePage.php" class="menu-link">Home</a>
            </div>
            <div class="quiz-box">
              <i class="fa-solid fa-circle-question"></i>
              <a href="Questionaire/Quser.php" target="_blank" class="menu-link">Quizes</a>
            </div>
            
            <div class="jokes-box">
              <i class="fa-regular fa-face-laugh-squint"></i>
              <a href="jokes2.php"  class="menu-link">Jokes</a>
              
            </div>
            
            <div class="fact-box">
              <i class="fa-regular fa-lightbulb"></i>
              <a href="facts.php"  class="menu-link">Facts</a>
            </div>
            
      
        </div>
    </div>
