<?php

if(isset($_POST["submit"])) {

  $employeeID = $_POST["employeeID"];
  $password = $_POST["password"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';



  if(emptyInputLogin($employeeID, $password) !== false){
    echo "<script type='text/javascript'>alert('Error! There are empty fields.');location='../login.php';</script>";
    exit();
  }

  loginUser($conn, $employeeID, $password);
}

else{
  header("location: ../trial.php");
//  echo "<script type='text/javascript'>alert('Error! Incorrecttt Password.');location='../login.php';</script>";
  exit();
}
