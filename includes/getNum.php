<?php

    require_once 'dbh.inc.php';

      //This will get the total of number of items in the inventory
  //  function getTotalItems(){

  //    $query = "SELECT COUNT(item_code) AS NumberOfItems FROM all_items;"



//    }

    //This will get the total quantity of all items in the inventory
    function getTotalAllItems(){

      $query = "SELECT COUNT(*) AS quantityOfItems FROM all_items";

      $result = mysqli_query($conn, $query);

      $data =mysqli_fetch_assoc($result);
      echo $data['quantityOfItems'];


    }



?>
