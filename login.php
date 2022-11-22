<?php
  session_start();
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login - ICS Property Management Inventory System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/login.css">
  </head>
  <body>

      <div class="row no-gutters">

        <div class="col-md-6 no-gutters">
          <div class="leftside">
             <img class="logo" src="images/logo-graphics.png" alt="ICS Logo">
          </div>
        </div>

        <div class="col-md-6 no-gutters">
          <div class="rightside">
            <div class="contents">
              <h1>Welcome Back</h1>
              <p class="text1">Login to your account</p>

              <form method="POST" action="includes/login.inc.php">
                <label for="employeeID"></label><br>
                <input type="text" id="employeeID" name="employeeID" value="" placeholder="Employee ID"><br>
                <label for="password"></label><br>
                <input type="password" id="password" name="password" value="" placeholder="Password" />
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <br><br>
                <input class="button" type="submit" name="submit" value="Login">
              </form>

              <hr>


              <p class="text3">Doesn't have an account? <a href="createAccount.php">Create an account here.</a></p>

            </div>
          </div>
        </div>

      </div>

  <script>
      const togglePassword = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      togglePassword.addEventListener("click", function () {
          // toggle the type attribute
          const type = password.getAttribute("type") === "password" ? "text" : "password";
          password.setAttribute("type", type);

          // toggle the icon
          this.classList.toggle("bi-eye");
      });

      // prevent form submit

  </script>
  </body>
</html>
