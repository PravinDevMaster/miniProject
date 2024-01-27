<?php
include("../include/auth.php");
include("../include/config.php");

$query = "SELECT c.class_id, c.class_name, c.department, c.section, s.sem_num, s.active, s.highest_sem , s.sem4_end, s.sem6_end, s.sem_complete
FROM class c 
LEFT JOIN semester s ON s.class_id = c.class_id  WHERE s.sem_complete =0 ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  $classCount = mysqli_num_rows($result);
} else {
  $classCount = 0;
}
$query1 = "SELECT * FROM staff WHERE role_id = 1";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {
  $adminCount = mysqli_num_rows($result1);
} else {
  $adminCount = 0;
}


$query2 = "SELECT * FROM staff WHERE role_id != 1";
$result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($result2) > 0) {
  $staffCount = mysqli_num_rows($result2);
} else {
  $staffCount = 0;
}
$roleId = $_SESSION['role_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="icon" type="image/x-icon" href="../img/logo1.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="./style.css">
  <script src="../js/jquery.min.js"></script>

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
  <div class="container">
    <div class="row  d-flex justify-content-around">
      <?php
      if ($roleId == 1) {
        ?>
        <a href="./createAdmin.php" class="fields col-10 col-lg-3  m-2 mb-5 admin">
          <p class="txt">Admin</p>
          <span class="count">
            <?php echo $adminCount; ?>
          </span>
        </a>
        <?php
      }
      ?>
      <a href="./createClass.php" class="fields col-10 col-lg-3  m-2 mb-5 classes">
        <p class="txt">Classes</p>
        <span class="count">
          <?php echo $classCount; ?>
        </span>
      </a>
      <!-- <i class="fa-solid fa-users icon"></i> -->
      <?php
      if ($roleId == 1 || $roleId == 2) {
        ?>
        <a href="./staff.php" class="fields col-10 col-lg-3  m-2 mb-5 staff">

          <p class="txt">Staff</p>
          <span class="count">
            <?php echo $staffCount; ?>
          </span>
        </a>

        <?php
      }
      ?>
      <a href="./classes.php" class="fields col-10 col-lg-3  m-2 mb-5 students">
        <p class="txt">Students</p>
        <span class="count">

        </span>
      </a>
    </div>
  </div>

  <script src="../js/script.js"></script>
</body>

</html>