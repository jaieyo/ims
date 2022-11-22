<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tableGridCSS.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <?php

    require_once 'includes/dbh.inc.php';
  //  require_once 'includes/getNum.php';

    ?>


    <title>Dashboard</title>
</head>
<body>
    <nav>
        <?php include 'sidebar.php'?>
    </nav>

    <section class="page">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
        </div>

        <div class="page-content">

          <div class="title">
              <span class="text">Search Item</span>
          </div>


            <div class="searchSection">

              <?php

              global $conn;

              function searchTable(){

                global $conn;

                $selected = " ";
    //            $valueChecked = " ";
                $textValue =" ";
                $checker=" ";

                if(!empty($_POST['sTable'])){
                  $selected = $_POST['sTable'];
                }

                if(!empty($_POST['valueText'])){
                    $textValue = $_POST['valueText'];
                }

          //			$name = "ace";


                if(!empty('textValue')){

                  $query = "SELECT * FROM items WHERE $selected LIKE CONCAT( '%',?,'%')";

                  $stmt = mysqli_stmt_init($conn);

                  if(!mysqli_stmt_prepare($stmt, $query)){
                    echo "SQL statement failed";
                  } else{
                    mysqli_stmt_bind_param($stmt, "s", $textValue);

                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                  }

          //        $result2 = mysqli_query($conn, $query) or die('SQL Error :: '.mysql_error());




                  if($result-> num_rows > 0){
                    echo "<table>";
                    echo "<tr>";

                    echo 	"<th>Item Id</th>" .
                        "<th>Item Name</th>" .
                        "<th>Category</th>" .
                        "<th>Description</th>" .
                        "<th>Quantity</th>" .
                        "<th>Status</th>" .
                        "<th>Date Received</th>" ;

                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)){
                      echo "<tr><td>" .  $row["item_ID"] .
                         "</td><td>" . $row["item_name"]  .
                         "</td><td>" . $row["category_ID"] .
                         "</td><td>" . $row["item_description"] .
                         "</td><td>" . $row["quantity"] .
                         "</td><td>" . $row["item_status"] .
                         "</td><td>" . $row["date_received"] .
                         "</td></tr>";
                    }
                      echo "</table>";
                  } else{
                    //	echo "0 result</div>";
                    echo '<script>alert("Error! The value you have inputted did not match any record.")</script>';
                    //	echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
                  }


                $conn-> close();

              }

              }

              ?>

      <!--        <h1> text </h1> -->

              <form method= "POST">

                  <div class="searchItemBy">
                    <label for="searchTable">Search by:</label>
                    <select name="sTable" id="sTable">
                      <option value="item_ID">Item Id</option>
                      <option value="item_name">Item Name</option>
                      <option value="category_ID">Category</option>
                      <option value="item_description">Description</option>
                      <option value="quantity">Quantity</option>
                      <option value="item_status">Status</option>
                      <option value="date_received">Date Received</option>
                    </select>
                  </div>

                  <div class="valueBox">
                    <label for="searchTable">Search Item:</label>
                    <input type="text" name="valueText" id="textBox" placeholder="Type value to search...">
                  </div>

                  <div class="formButtons">
                    <input type="submit" name="searchBtn" class="searchBtn" value="Search"/>
                    <input type="submit" name="viewBtn" class="viewBtn" value="View All"/>
                  </div>

              </form>

              <div class="contViewDB">
                  <div class="viewDB1">

                        <?php

                        global $conn;

                        if(isset($_POST["searchBtn"])){

                          searchTable();
                        }

                        if(isset($_POST["viewBtn"])){

                          viewAll();
                        }

                        ?>

                  </div>

            </div>
            </div>


            <div class="title">
                <span class="text">Search Item By Unit</span>
            </div>


            <div class="searchSection">

              <?php

              global $conn;

              function searchTable2(){

                global $conn;

                $selected = " ";
    //            $valueChecked = " ";
                $textValue =" ";
    //            $checker=" ";

                if(!empty($_POST['sTable2'])){
                  $selected = $_POST['sTable2'];
                }

                if(!empty($_POST['valueText2'])){
                    $textValue = $_POST['valueText2'];
                }

          //			$name = "ace";


                if(!empty('textValue')){

                  $query = "SELECT * FROM all_items WHERE $selected = ?;";

                  $stmt = mysqli_stmt_init($conn);

                  if(!mysqli_stmt_prepare($stmt, $query)){
                    echo "SQL statement failed";
                  } else{
                    mysqli_stmt_bind_param($stmt, "s", $textValue);

                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                  }

  //                $result2 = mysqli_query($conn, $query) or die('SQL Error :: '.mysql_error());


                  if($result-> num_rows > 0){
                    echo "<table>";
                    echo "<tr>";

                    echo 	"<th>Item Id</th>" .
                        "<th>Item Code</th>" ;

                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)){
                      echo "<tr><td>" .  $row["item_ID"] .
                         "</td><td>" . $row["item_code"]  .
                         "</td></tr>";
                    }
                      echo "</table>";
                  } else{
                    //	echo "0 result</div>";
                    echo '<script>alert("Error! The value you have inputted did not match any record.")</script>';
                    //	echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
                  }


                $conn-> close();

              }

              }

              ?>

              <form method= "POST">

                  <div class="searchItemBy">
                    <label for="searchTable">Search by:</label>
                    <select name="sTable2" id="sTable2">
                      <option value="item_ID">Item Id</option>
                      <option value="item_code">Item code</option>
                    </select>
                  </div>

                  <div class="valueBox">
                    <label for="searchTable">Search Unit:</label>
                    <input type="text" name="valueText2" id="textBox" placeholder="Type value to search...">
                  </div>

                  <div class="formButtons">
                    <input type="submit" name="searchBtn2" class="searchBtn" value="Search"/>
                    <input type="submit" name="viewBtn2" class="viewBtn" value="View All"/>
                  </div>

              </form>

              <div class="contViewDB">
                  <div class="viewDB1">

                        <?php

                        global $conn;

                        if(isset($_POST["searchBtn2"])){

                          searchTable2();
                        }

                        if(isset($_POST["viewBtn2"])){

                          viewAll2();
                        }

                        ?>

                  </div>
              </div>
            </div>

            <div class="title">
                <span class="text">Search Via QR Code</span>
            </div>


            <div class="searchSection">


            </div>

        </div>

    </section>

    <script src="script/navbarscript.js"></script>

</body>
</html>
