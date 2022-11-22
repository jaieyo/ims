<?php

  function emptyInputCreateAccount($employeeID, $firstName, $lastName, $jobTitle, $password1, $password2){
    $result;
    if(empty($employeeID) || empty($firstName) || empty($lastName) || empty($jobTitle) || empty($password1) || empty($password2)){
      $result = true;
    }
    else{
      $result = false;
    }
    return $result;
  }


  function invalidEmployeeId($employeeID){
      $result;
      if(!preg_match("/^[a-zA-Z0-9\-]*$/", $employeeID)){
        $result = true;
      }
      else{
        $result = false;
      }
      return $result;
  }


  function passwordMatch($password1, $password2){
      $result;
      if($password1 !== $password2){
        $result = true;
      }
      else{
        $result = false;
      }
      return $result;
  }

  function employeeIDExist($conn, $employeeID){

    if(str_contains($employeeID, '-')){
      $employeeID = str_replace("-","",$employeeID);
    }

    $sql = "SELECT * FROM employee WHERE employeeID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../createAccount.php?error=alreadyexist");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $employeeID);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
      return $row;
    }
    else{
      $result = false;
      return $result;
    }

    mysqli_stmt_close($stmt);

  }

  function createUserAccount($conn, $employeeID, $firstName, $lastName, $jobTitle, $password1){

    if(str_contains($employeeID, '-')){
      $employeeID = str_replace("-","",$employeeID);
    }

    $sql = "INSERT INTO employee (employeeID, first_name, last_name, job_title, password) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
//      header("location: ../createAccount.php?error=stmtfailed");
      echo "<script type='text/javascript'>alert('Something went wrong! Please try again.');location='../createAccount.php';</script>";
      exit();
    }

    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $employeeID, $firstName, $lastName, $jobTitle, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
//    header("location: ../createAccount.php?error=none");
    echo "<script type='text/javascript'>alert('Account created successfully!');location='../createAccount.php';</script>";
    exit();

  }


  function emptyInputLogin($employeeID, $password){
    $result;
    if(empty($employeeID) || empty($password)){
      $result = true;
    }
    else{
      $result = false;
    }
    return $result;
  }

  function loginUser($conn, $employeeID, $password){
    $employeeIDExist = employeeIDExist($conn, $employeeID);

    if($employeeIDExist === false){
      echo "<script type='text/javascript'>alert('The employee ID that you have inputted did not match any of our records.');location='../login.php';</script>";
      exit();
    }

    if(str_contains($employeeID, '-')){
      $employeeID = str_replace("-","",$employeeID);
    }

    $passwordHashed = $employeeIDExist["password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
      echo "<script type='text/javascript'>alert('Error! Incorrect Password.');location='../login.php';</script>";
      exit();
    }
    else if($checkPassword === true){
      session_start();
      $_SESSION["userid"] = $employeeIDExist["userID"]; //this will be used to check whether the user is already logged in the website
      $_SESSION["employeeID"] = $employeeIDExist["employeeID"];
      header("location: ../dashboard.php");
      exit();
    }
  }

///////////////////////////////////////////////////////////////




















  // spaces
