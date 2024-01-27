<?php
include("../include/auth.php");

include("../include/config.php");
?>
<?php
if (isset($_GET['class_id'])) {
  $classid = $_GET['class_id'];
} else {
  header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta required name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Details</title>
  <link rel="icon" type="image/x-icon" href="../img/logo1.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="../js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <style>
    table th,
    td {
      text-align: center;
      vertical-align: middle;
    }
  </style>
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
      <h3>Report Details</h3>
    </div>
    <div class="return ">
      <p><a href="./report.php">Back</a> / Report Details</p>
    </div>
  </div>
  <div class="container">
    <div class="row  d-flex justify-content-center">
      <?php
      $query = "SELECT sem_num FROM semester WHERE class_id=$classid";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $semnum = $row['sem_num'];
        }
      }
      ?>
      <ul class="nav nav-tabs" style="background-color:white;border-radius:10px" role="tablist">
        <?php
        for ($i = 0; $i < $semnum; $i++) {
          ?>
          <li class="nav-item" style="overflow-y: hidden;">
            <a class="nav-link <?php if ($i == 0)
              echo "active"; ?>" data-bs-toggle="tab"
              href="#sem<?php echo $i + 1; ?>">Semester <?php echo $i + 1; ?></a>
          </li>

          <?php
        }
        ?>
      </ul>
    </div>
    <div class="tab-content">
      <?php
      for ($i = 0; $i < $semnum; $i++) {
        $query = "SELECT DISTINCT(date) FROM attendance WHERE class_id=$classid and 	sem_num=$i+1";
        $result = mysqli_query($conn, $query);
        $totalworkingday = mysqli_num_rows($result);
        $hodid = 0;
        $staffid = 0;
        $stucount = 0;
        $hodname = '';
        $staffname = '';
        $query1 = "SELECT * FROM class WHERE class_id=$classid";
        $result1 = mysqli_query($conn, $query1);
        if (mysqli_num_rows($result1)) {
          while ($row = mysqli_fetch_array($result1)) {
            $hodid = $row['hod_id'];
            $staffid = $row['staff_id'];
          }
          $hodquery = "SELECT * FROM staff WHERE unique_staff_id=$hodid";
          $hodresult = mysqli_query($conn, $hodquery);
          if (mysqli_num_rows($hodresult)) {
            $row = mysqli_fetch_array($hodresult);
            $hodname = $row['first_name'] . " " . $row['last_name'];
          }
          $staffquery = "SELECT * FROM staff WHERE unique_staff_id=$staffid";
          $staffresult = mysqli_query($conn, $staffquery);
          if (mysqli_num_rows($staffresult)) {
            $row = mysqli_fetch_array($staffresult);
            $staffname = $row['first_name'] . " " . $row['last_name'];
          }
          $stucountquery = "SELECT * FROM student WHERE class_id=$classid";
          $stucountresult = mysqli_query($conn, $stucountquery);
          $stucount = mysqli_num_rows($stucountresult);
        }
        ?>
        <div id="sem<?php echo $i + 1; ?>" class="container tab-pane <?php if ($i == 0)
            echo "active"; ?>">
          <br>
          <div class="d-flex justify-content-between">
            <p class="text-light"><b>HOD Name: </b>
              <?php echo $hodname; ?>
            </p>
            <p class="text-light"><b>Total Working Days:</b>
              <?php echo $totalworkingday; ?>
            </p>
            <p class="text-light"><b>Class Incharge Name: </b>
              <?php echo $staffname; ?>
            </p>
            <p class="text-light"><b>No Of Student: </b>
              <?php echo $stucount; ?>
            </p>

          </div>
          <div class="container mt-2 p-3 bg-light " style="border-radius: 5px;max-height: 60vh;height:100%;">
            <button class="btn btn-success" style="float:right"
              onclick="ExportToExcel('xlsx','semtable<?php echo $i + 1; ?>')"> <i class="fas fa-file-download"></i>
              Download</button>
            <table id="semtable<?php echo $i + 1; ?>" class="table table-hover">

              <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Register No</th>
                <th>Present Count</th>
                <th>Percentage</th>
                <th>More</th>
              </tr>

              <?php
              $query = "SELECT * FROM student WHERE class_id=$classid";
              $result = mysqli_query($conn, $query);
              if (mysqli_num_rows($result) > 0) {
                $a = 0;
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo ++$a; ?>
                    </td>
                    <td>
                      <?php echo $row['name'] . " " . $row['initial']; ?>
                    </td>
                    <td>
                      <?php echo $row['register_no']; ?>
                    </td>

                    <?php
                    $studentId = $row['student_id'];
                    $query1 = "SELECT * FROM attendance WHERE student_id=$studentId and sem_num=$i+1";
                    $precount = 0;
                    $result1 = mysqli_query($conn, $query1);
                    if (mysqli_num_rows($result1) > 0) {
                      while ($row1 = mysqli_fetch_array($result1)) {
                        // print_r($row1);
                        if ($row1['p1'] + $row1['p2'] + $row1['p3'] + $row1['p4'] + $row1['p5'] >= 3) {
                          $precount += 1;
                        }
                      }
                    }
                    echo "<td> $precount</td>";
                    $precentage = 0;
                    if ($totalworkingday > 0) {
                      $precentage = round(($precount / $totalworkingday) * 100);
                    }
                    echo "<td> $precentage % </td>";
                    echo "<td><a href='./dashboard.php?student_id=$studentId'><i class='fa-solid fa-ellipsis'></i></a>
    </td>";
                    echo "</tr>";

                }
              }
              ?>
            </table>
          </div><!-- table div close -->
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <script src="../js/script.js"></script>
  <script>
    function ExportToExcel(type, id, fn, dl) {
      var elt = document.getElementById(id);
      var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1"
      });
      return dl ?
        XLSX.write(wb, {
          bookType: type,
          bookSST: true,
          type: 'base64'
        }) :
        XLSX.writeFile(wb, fn || ('Report.' + (type || 'xlsx')));
    }
  </script>
</body>

</html>