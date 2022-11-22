<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create An Account - ICS Property Management Inventory System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/createAccount.css">
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
              <h1>Create An Account</h1>

              <form method="POST" action="includes/createAccount.inc.php">
                <label class ="label" for="employeeID">Employee ID Number</label><br>
                <input type="text" id="employeeID" name="employeeID" value=""><br>

                <label class ="label" for="firstName">First Name</label><br>
                <input type="text" id="firstName" name="firstName" value=""><br>

                <label class ="label" for="lastName">Last Name</label><br>
                <input type="text" id="lastName" name="lastName" value=""><br>

                <label class ="label" for="jobTitle">Job Title</label><br>
                <input type="text" id="jobTitle" name="jobTitle" value=""><br>

                <label class ="label" for="password">Password</label><br>
                <input type="password" id="password" name="password" value="" />
                <i class="bi bi-eye-slash" id="togglePassword1"></i>
                <br>

                <label class ="label" for="password">Confirm Password</label><br>
                <input type="password" id="password2" name="password2" value="" />
                <i class="bi bi-eye-slash" id="togglePassword2"></i>
                <br><br>


                <input type="submit" name="submit" value="Create Account" class="button">
              </form>

              <hr>


              <p class="text3">Already have an account? <a href="login.php">Log In here.</a></p>

              </div>
            </div>
          </div>

      </div>

  <script>
      var togglePassword1 = document.querySelector("#togglePassword1");
      var password1 = document.querySelector("#password");

      togglePassword1.addEventListener("click", function () {
          // toggle the type attribute
          const type = password1.getAttribute("type") === "password" ? "text" : "password";
          password1.setAttribute("type", type);

          // toggle the icon
          this.classList.toggle("bi-eye");
      });

      var togglePassword2 = document.querySelector("#togglePassword2");
      var password2 = document.querySelector("#password2");

      togglePassword2.addEventListener("click", function () {
          // toggle the type attribute
          const type = password2.getAttribute("type") === "password" ? "text" : "password";
          password2.setAttribute("type", type);

          // toggle the icon
          this.classList.toggle("bi-eye");
      });

  </script>
  </body>
</html>
