<?php
include("../include/auth.php");

include("../include/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta required name="viewport" content="width=device-width, initial-scale=1.0">
  <title>classes</title>
  <link rel="icon" type="image/x-icon" href="../img/logo1.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="./style.css">

</head>

<body class="bg-primary">
  <!-- top menu bar -->
  <?php
  include_once("../include/navBar.php");
  ?>
  <!-- side nav bar -->
  <?php
  include_once("../include/sideBar.php");
  ?>
  <div class="header d-flex justify-content-between text-white pt-0 pb-0 p-5">
    <div class="titel ">
      <h3>Classes</h3>
    </div>
    <div class="return ">
      <p><a href="./index.php">Home</a> / Classes</p>
    </div>
  </div>
  <div class="container">
    <div class="row  d-flex justify-content-center">
      <?php
      $query = "SELECT c.class_id, c.class_name, c.department, c.section, s.sem_num, s.active, s.highest_sem , s.sem_complete
      FROM class c 
      LEFT JOIN semester s ON s.class_id = c.class_id 
      WHERE s.sem_complete = 0  ORDER BY s.active DESC";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['sem_num'] == 1 || $row['sem_num'] == 2) {
            $year = "I";
          } elseif ($row['sem_num'] == 3 || $row['sem_num'] == 4) {
            $year = "II";
          } elseif ($row['sem_num'] == 5 || $row['sem_num'] == 6) {
            $year = "III";
          } else {
            $year = "I";
          }


          if ($row['sem_num'] != 0) {
            $semester = "Semester - " . $row['sem_num'];
          } else {
            $semester = 'Semester - 1';
          }
          ?>
          <a href="./student.php?class_id=<?php echo $row['class_id']; ?>" class="fields1 col-10 col-lg-3  m-4 mt-3 mb-3">
            <p class="txt1">
              <?php echo $year . " " . $row['class_name']; ?>
            </p>
            <p class="txt2">
              <?php echo $row['department']; ?> Sec - "
              <?php echo $row['section']; ?> "
            </p>
            <div class="txt3 pt-0 pb-0 p-4">
              <span>
                <?php echo $semester; ?>
              </span>
            </div>
          </a>

          <?php

        }
      }
      ?>

      <div class="fields1 col-10 col-lg-2  m-4 mt-3 mb-3 p-5" style="display:none;">

      </div>
    </div>
  </div>
  <script src="../js/script.js"></script>
</body>

</html>