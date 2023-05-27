
<footer class="footer">
    <div class="footer-menu">
      <!--i used the same class for the header to save time and effort-->
      <a href="requiredFiles/underCons.php"  class = "menu-link">FAQs</a>
      <a href="aboutUs.php"  class = "menu-link">About Us</a>
      <a href="contactUs.php"  class = "menu-link">Contact Us</a>
      <a href="requiredFiles/underCons.php" class = "menu-link">Tell Us Your Opinion</a>


    </div>
    <div class="poweredBy">
      <p>Powered By ITCS33 - group 5</p>
    </div>

    <style>
  .footer {
    background-color: #f2f2f2;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .menu-link {
    color: #333;
    text-decoration: none;
    margin-right: 20px;
  }

  .poweredBy {
    margin-top: 10px;
    text-align: center;
  }

  /* Media queries for smaller screens */
  @media only screen and (max-width: 768px) {
    .footer {
      flex-direction: column;
      align-items: center;
    }
    .menu-link{
      margin: 10px 0;
    }
  }

  /* Media queries for medium screens */
  @media only screen and (min-width: 768px) and (max-width: 1024px) {
    .menu-link {
      margin-right: 10px;
    }
  }

  /* Media queries for larger screens */
  @media only screen and (min-width: 1024px) {
    .menu-link {
      margin-right: 20px;
    }
  }
</style>

  </footer>


</body>
</html>
