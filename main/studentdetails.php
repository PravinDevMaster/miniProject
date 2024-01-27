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
  <title>Students Details</title>
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
  $query = "select * from class where class_id = $classid";
  $result = mysqli_query($conn, $query);
  $getClass = mysqli_fetch_assoc($result);
  $className = $getClass['class_name'] . " " . $getClass['department'] . " Sec - " . $getClass['section'];
  $hodid = $getClass['hod_id'];
  $staffid = $getClass['staff_id'];
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
  ?>
  <div class="header d-flex justify-content-between text-white pt-0 pb-0 p-5">
    <div class="titel ">
      <h3>
        <?php echo $className; ?>
      </h3>
    </div>
    <div class="return ">
      <p><a
          href="<?php if (isset($_GET['action']) && $_GET['action'] == "passedout") {
            echo "./passedOut.php";
          } else {
            echo "./takeAttendance.php";
          } ?>">Back</a>
        / Student Details</p>
    </div>
  </div>
  <div class="container">


    <div class="d-flex justify-content-between">
      <p class="text-light"><b>HOD Name: </b>
        <?php echo $hodname; ?>
      </p>
      <p class="text-light"><b>Class Incharge Name: </b>
        <?php echo $staffname; ?>
      </p>
      <p class="text-light"><b>No Of Student: </b>
        <?php echo $stucount; ?>
      </p>
      <?php if (isset($_GET['action']) && $_GET['action'] == "active") { ?>
        <a class="btn btn-light text-dark" href="./classlist.php?action=active&class_id=<?php echo $_GET['class_id']; ?>">
          Present Details
        </a>
        <?php
      } ?>
    </div>
    <div class=" mt-2 p-3 bg-light " style="border-radius: 5px;max-height: 60vh;height:100%;">
      <div>
        <button class="btn btn-success" style="float:right" onclick="ExportToExcel('xlsx','studenttable')"> <i
            class="fas fa-file-download"></i> Download</button>
      </div>
      <table id="studenttable" class="table table-hover">
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Register No</th>
          <th>Adhaar Card No</th>
          <th>DOB</th>
          <th>Gender</th>
          <th>Contact</th>
          <th>Father Name</th>
          <th>Mother Name</th>
          <th>Guardian Contact</th>
        </tr>
        <?php
        $query = "SELECT * FROM student WHERE class_id=$classid";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            $i++;
            ?>
            <tr>
              <td>
                <?php echo $i; ?>
              </td>
              <td>
                <?php echo $row['name'] . " " . $row['initial']; ?>
              </td>
              <td>
                <?php echo $row['register_no']; ?>
              </td>
              <td>
                <?php echo $row['adhaar_card_no']; ?>
              </td>
              <td>
                <?php echo $row['dob']; ?>
              </td>
              <td>
                <?php echo $row['gender']; ?>
              </td>
              <td>
                <?php echo $row['mobile_no']; ?>
              </td>
              <td>
                <?php echo $row['father_name']; ?>
              </td>
              <td>
                <?php echo $row['mother_name']; ?>
              </td>
              <td>
                <?php echo $row['guardian_mobile_no']; ?>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </table>
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