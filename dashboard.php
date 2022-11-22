<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            <div class="overview">
                <div class="title">
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-box"></i>
                        <span class="text">Total Number of Items</span>
                        <span class="number">

                          <?php
                          global $conn;
                          $query = "SELECT COUNT(*) AS numberOfItems FROM items";

                          $result = mysqli_query($conn, $query);

                          $data =mysqli_fetch_assoc($result);
                          echo $data['numberOfItems'];

                          ?>

                      </span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-layers"></i>
                        <span class="text">Total Quantity of Items</span>
                        <span class="number">

                          <?php
                          global $conn;
                          $query = "SELECT COUNT(*) AS quantityOfItems FROM all_items";

                          $result = mysqli_query($conn, $query);

                          $data =mysqli_fetch_assoc($result);
                          echo $data['quantityOfItems'];

                          ?>


                        </span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-arrow-down-right"></i>
                        <span class="text">Items Low on Stock</span>
                        <span class="number">

                          <?php
                          global $conn;
                          $query = "SELECT COUNT(item_name) AS lowStock FROM items WHERE quantity < min_stock;";

                          $result = mysqli_query($conn, $query);

                          $data =mysqli_fetch_assoc($result);
                          echo $data['lowStock'];

                          ?>

                        </span>
                    </div>
                </div>
            </div>

            <div class="graph">

                <div class="title">
                    <span class="text">Category Summary</span>
                </div>

            <!-- BAR CHART -->

                <div class ="chartBox">
                  <canvas id="myChart"></canvas>
                </div>

                <div class="chartDescription">
                    <p><em>This graph shows the category of item that has the highest number of quantity in all items.</em></p>
                </div>

            <!-- LINE CHART -->

                <div class="title">
                    <span class="text">Item Summary</span>
                </div>

                <div class ="chartBox">
                  <canvas id="lineChart"></canvas>
                </div>

                <div class="chartDescription">
                    <p><em>This graph shows the item that has the highest number of quantity.</em></p>
                </div>

                <?php
                  global $conn;

                  $query = $conn->query("
                  SELECT
                    category_ID AS Category, SUM(quantity) AS Quantity
                  FROM
                    items
                  GROUP BY
                    category_ID;
                  ");

                  foreach($query as $data)
                  {
                    $category[] = $data['Category'];
                    $quantity[] = $data['Quantity'];
                  }

                ?>

                <?php
                  global $conn;

                  $query = $conn->query("
                  SELECT
                      item_name AS 'Item Name', quantity AS Quantity
                  FROM
                      `items`;
                  ");

                  foreach($query as $data)
                  {
                    $itemName[] = $data['Item Name'];
                    $quantity2[] = $data['Quantity'];
                  }

                ?>

                <script>

// BAR CHART FOR CATEGORY SUMMARY
                  // === include 'setup' then 'config' above ===
                  const labels = <?php echo json_encode($category) ?>;
                  const data = {
                    labels: labels,
                    datasets: [{
                      label: 'Total Number of Items Per Category',
                      data: <?php echo json_encode($quantity) ?>,
                      backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                      ],
                      borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                      ],
                      borderWidth: 1
                    }]
                  };


                  const config = {
                    type: 'bar',
                    data: data,
                    options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    },
                  };

                  const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                  );

// LINE CHART FOR INVENTORY SUMMARY

                  const labels2 = <?php echo json_encode($itemName) ?>;
                  const data2 = {
                    labels: labels2,
                    datasets: [{
                      label: 'Total Number of Items',
                      data: <?php echo json_encode($quantity2) ?>,
                      backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                      ],
                      borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                      ],
                      borderWidth: 1
                    }]
                  };


                  const config2 = {
                    type: 'line',
                    data: data2,
                    options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    },
                  };

                  const lineChart = new Chart(
                    document.getElementById('lineChart'),
                    config2
                  );


                </script>

            </div>
        </div>
    </section>

    <script src="script/navbarscript.js"></script>

</body>
</html>
