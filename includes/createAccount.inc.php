<?php

if(isset($_POST["submit"])) {
//    echo "It works";

    $employeeID = $_POST["employeeID"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $jobTitle = $_POST["jobTitle"];
    $password1 = $_POST["password"];
    $password2 = $_POST["password2"]; //this is the repeat password checker

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //check if the fields are empty
    if(emptyInputCreateAccount($employeeID, $firstName, $lastName, $jobTitle, $password1, $password2) !== false){
//      header("location: ../createAccount.php?error=emptyinput");
      echo "<script type='text/javascript'>alert('Error! There are empty fields.');location='../createAccount.php';</script>";
      exit();
    }
    //check if the employee ID is invalid
    if(invalidEmployeeID($employeeID) !== false){
//      header("location: ../createAccount.php?error=invalidEmployeeID");
      echo "<script type='text/javascript'>alert('Error! You have inputted an invalid employee ID.');location='../createAccount.php';</script>";
      exit();
    }
    //check if passwords match
    if(passwordMatch($password1, $password2) !== false){
//      header("location: ../createAccount.php?error=passwordsdontmatch");
      echo "<script type='text/javascript'>alert('Error! Passwords did not match.');location='../createAccount.php';</script>";
      exit();
    }
    //check if the employee ID already exist in database
    if(employeeIDExist($conn, $employeeID) !== false){
//      header("location: ../createAccount.php?error=employeeIDAlreadyExist");
      echo "<script type='text/javascript'>alert('Error! Employee ID already exist.');location='../createAccount.php';</script>";
      exit();
    }

    createUserAccount($conn, $employeeID, $firstName, $lastName, $jobTitle, $password1);


}
else {
  header("location: ../createAccount.php");
  exit();
}
