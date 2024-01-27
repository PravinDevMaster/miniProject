<?php
include("../include/auth.php");
include("../include/config.php");
require "./excelControle/excel_conversion_class1.php";
require "./excelControle/excel_conversion_class2.php";
use Shuchkin\SimpleXLSX;

$user_id = $_SESSION['user_id'];
if (empty($_GET['class_id'])) {
  ?>
  <script>
    alert("Choose the class!");
    window.location.href = "./classes.php";
  </script>
  <?php
} else {
  $_SESSION['SESS_CLASS_ID'] = $_GET['class_id'];
}
$class_id = $_GET['class_id'];
$query = "SELECT * FROM class WHERE class_id = $class_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  $hod_id = $row["hod_id"];
  $query1 = "SELECT * FROM staff WHERE unique_staff_id =$hod_id";
  $result1 = mysqli_query($conn, $query1);
  $hod = mysqli_fetch_assoc($result1);

  $staff_id = $row['staff_id'];
  $query1 = "SELECT * FROM staff WHERE unique_staff_id =$staff_id";
  $result1 = mysqli_query($conn, $query1);
  $staff = mysqli_fetch_assoc($result1);

  $className = $row["department"] . ' ' . $row["class_name"] . ' &quot;' . $row["section"] . '&quot;';
  $hodName = $hod['first_name'] . " " . $hod['last_name'];
  $classIncharge = $staff['first_name'] . " " . $staff['last_name'];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta required name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Bulk Upload</title>
  <link rel="icon" type="image/x-icon" href="../img/logo1.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href)
    }
  </script>

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
      <h3>Student Bulk Upload</h3>
    </div>
    <div class="return ">
      <p><a href="./student.php?class_id=<?php echo $class_id; ?>">Back</a> / Student Bulk Upload</p>
    </div>
  </div>
  <div class="container">

    <form action="" id="form" method="POST" enctype="multipart/form-data">

      <div class="row ">
        <div class="col-4 p-2">
          <input type="hidden" value="<?php echo $_GET['class_id']; ?>" name="classId">
          <input type="file" class="btn btn-dark" name="file" required>
        </div>
        <div class="col-2 p-2">
          <input type="submit" name="submit" class="btn btn-light text-dark" value="Upload Student">
        </div>
      </div>
    </form>
    <br><br>
    <a href="./excelControle/downloadExcel.php?path=../sampleExcel/Student.xlsx" class="btn btn-success">Sample
      Excel</a>
    <?php
    if (isset($_POST['submit']) && $_FILES['file']) {
      ?>

      <div id="table">
        <?php
        $fileArray = explode(".", $_FILES['file']['name']);
        $extension = end($fileArray);
        if ($extension === 'xlsx' || $extension === 'xls') {

          $filedir = $_FILES['file']['tmp_name'];
          $xlsx = SimpleXLSX::parse($filedir);


          $demo = $xlsx->rows();
          $excelarray = array();
          for ($i = 0; $i < count($demo); $i++) {
            if ($demo[$i][0]) {
              $excelarray[$i] = array();
              for ($j = 0; $j <= 9; $j++) {
                array_push($excelarray[$i], $demo[$i][$j]);
              }
            }

          }
          $error = 0;
          $error1 = 0;
          $classId = $_POST['classId'];
          $regno = array();
          $query = "SELECT register_no FROM student WHERE class_id=$classId";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
              array_push($regno, $row['register_no']);
            }
          }
          for ($i = 1; $i < count($excelarray); $i++) {
            if (in_array($excelarray[$i][2], $regno)) {
              $error = 1;
            }
          }
          for ($i = 1; $i < count($excelarray); $i++) {
            for ($j = $i + 1; $j < count($excelarray); $j++) {
              if ($excelarray[$i][2] === $excelarray[$j][2]) {
                $error1 = 1;
              }
            }
          }
          if ($error > 0 || $error1 > 0) {
            if ($error == 1) {
              ?>
              <br>
              <br>
              <br>
              <div class="alert alert-danger" id="danger">
                The Register No is Duplicate.
              </div>
              <?php
            }
            if ($error1 == 1) {
              ?>
              <br>
              <br>
              <br>
              <div class="alert alert-danger" id="danger">
                The Register No is Duplicate in Excel.
              </div>

              <?php
            }
          } else {
            $query = '';
            $userId = $_SESSION['user_id'];
            $classId = $_POST['classId'];
            for ($i = 1; $i < count($excelarray); $i++) {
              $name = strtoupper($excelarray[$i][0]);
              $initial = strtoupper($excelarray[$i][1]);
              $register_no = $excelarray[$i][2];
              $adhaar_card_no = $excelarray[$i][3];
              $dob = date_format(date_create($excelarray[$i][4]), "Y-m-d");
              $gender = $excelarray[$i][5];
              $mobile_no = $excelarray[$i][6];
              $father_name = strtoupper($excelarray[$i][7]);
              $mother_name = strtoupper($excelarray[$i][8]);
              $guardian_mobile_no = $excelarray[$i][9];
              $create_by = $_SESSION['user_id'];
              $query .= "INSERT INTO student (class_id, name, initial, gender, dob, register_no, mobile_no, father_name, mother_name, guardian_mobile_no, adhaar_card_no, create_by, created_date) VALUES ($classId, '$name', '$initial', '$gender','$dob', $register_no, $mobile_no,'$father_name','$mother_name' , $guardian_mobile_no,$adhaar_card_no, '$create_by', CURRENT_TIMESTAMP());";
            }
            if (mysqli_multi_query($conn, $query)) {
              ?>
              <br>
              <br>
              <br>
              <div class="alert alert-success">Data Upload Successfully.</div>
              <?php
            }
          }
        } else {
          ?>
          <br>
          <br>
          <br>
          <div class="alert alert-danger" id="danger">
            Choose <strong>xlsx</strong> or <strong>xls</strong> formate file.
          </div>
          <?php
        }
    }
    ?>
    </div>
  </div>

  <script src="../js/script.js"></script>

</body>

</html>