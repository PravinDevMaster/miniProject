<?php
include("../include/auth.php");
include("../include/config.php");

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
  <title>Create Student</title>
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
  <form action="" id="form" method="POST" onsubmit="return false">
    <div class="header d-flex justify-content-between text-white pt-0 pb-0 p-5">
      <div class="titel ">
        <h3>Create Student</h3>
      </div>
      <div class="return ">
        <p><a href="./classes.php">Classes</a> / Create Student</p>
      </div>
    </div>
    <div class="row  d-flex justify-content-center">
      <div class="col-lg-4 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control" id="class_name" required name="class_name" placeholder="Class Name"
            value="<?php echo $className; ?>" readonly>
          <label for="floatingInput">Class</label>
          <input type="hidden" name="class_id" value="<?php echo $row['class_id']; ?>">
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control" id="hod" required name="hod" placeholder="hod"
            value="<?php echo $hodName; ?>" readonly>
          <label for="floatingInput">H.O.D</label>
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control " id="class_incharge" required name="class_incharge"
            placeholder="class_incharge" value="<?php echo $classIncharge; ?>" readonly>
          <label for="floatingInput">Class Incharge</label>
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control" id="name" required name="name" placeholder="name" value="">
          <label for="floatingInput">Name</label>
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control" id="initial" required name="initial" placeholder="initial" value="">
          <label for="floatingInput">Initial</label>
        </div>
      </div>
      <div class="col-lg-2 col-5 m-0 mt-3">
        <div class="form-floating col-12">
          <select class="form-select" id="gender" required name="gender" aria-label="Floating label select example">
            <option></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <label for="floatingSelect">Gender</label>
        </div>
      </div>
      <div class="col-lg-2 col-5 m-0 mt-3">
        <div class="form-floating">
          <input type="date" class="form-control " id="dob" required name="dob" placeholder="dob" value="">
          <label for="floatingInput">D.O.B</label>
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control " id="register_no" required name="register_no"
            placeholder="register_no" value="">
          <label for="floatingInput">Register No</label>
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="number" class="form-control " id="mobile_no" required name="mobile_no" placeholder="mobile_no"
            value="">
          <label for="floatingInput">Contact</label>
        </div>
      </div>
      <div class="col-lg-2 col-5 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control" id="father_name" required name="father_name"
            placeholder="Father Name">
          <label for="floatingInput">Father Name</label>
        </div>
      </div>
      <div class="col-lg-2 col-5 m-0 mt-3">
        <div class="form-floating">
          <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="mother_name">
          <label for="floatingInput">Mother Name</label>
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="number" class="form-control" id="guardian_mobile_no" required name="guardian_mobile_no"
            placeholder="guardian_mobile_no" value="">
          <label for="floatingInput">Father or Guardian Contact</label>
        </div>
      </div>
      <div class="col-lg-3 col-10 m-0 mt-3">
        <div class="form-floating">
          <input type="number" class="form-control" id="adhaar_card_no" required name="adhaar_card_no"
            placeholder="adhaar_card_no" value="" min="1" max="12" oninput="maxLengthCheck(this)">
          <label for="floatingInput">Adhaar Card No</label>
        </div>
      </div>
      <div class="col-lg-4 col-10 m-0 mt-3 " style="text-align: left;">
        <input type="submit" name='action' value="Add" class="submit btn btn-warning col-3 p-2">
        <a href="./studentBulkUpload.php?class_id=<?php echo $_GET['class_id']; ?>"
          class="btn btn-success col-3 p-2">Bulk Upload</a>
      </div>
      <div class="col-lg-0"></div>
      <input type="hidden" required name="id" id="id" value="0">
      <input type="hidden" required name="id1" id="id1" value="<?php echo $user_id; ?>">
    </div>
  </form>
  <div class="pt-0 pb-0 p-5">
    <div class="table-responsive bg-light mt-2 " style="border-radius: 5px; height: 300px;">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Initial</th>
            <th>Gender</th>
            <th>D.O.B</th>
            <th>Register No</th>
            <th>Contact</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>Guardian Contact</th>
            <th>Adhaar Card No</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  <script>
    function maxLengthCheck(object) {
      if (object.value.length > object.max)
        object.value = object.value.slice(0, object.max)
    }
    $(document).ready(() => {
      $("tbody").load("studentCrud.php?action=view");
      $(".submit").click(() => {
        var id = $("#id").val();
        if (id == 0) {
          $.ajax({
            type: "POST",
            url: "studentCrud.php?action=new",
            data: $("#form").serialize(),
            success: function (data) {
              alert(data);
              $("#form")[0].reset();
              $("#id").val("0");
              $("tbody").load("studentCrud.php?action=view");


            },
            error: function () {
              alert("error");
            }
          });
        }
        else {
          $.ajax({
            type: "POST",
            url: "studentCrud.php?action=update",
            data: $("#form").serialize(),
            success: function (data) {
              alert(data);
              $("#form")[0].reset();
              $("#id").val("0");
              $(".btn").val("Add");
              $("tbody").load("studentCrud.php?action=view");

            },
            error: function () {
              alert("error");
            }
          });
        }

      });
      $(document).on("click", ".edit", function () {
        $(".btn").val("Save");
        var row = $(this);
        var id = $(this).attr("data-id");
        $("#id").val(id);

        var name = row.closest("tr").find("#name").text();
        $("#name").val(name);
        var initial = row.closest("tr").find("#initial").text();
        $("#initial").val(initial);
        var gender = row.closest("tr").find("#gender").text();
        $("#gender").val(gender);
        var dob = row.closest("tr").find("#dob").text();
        var dodDate = dob.split("-").reverse().join("-");
        $("#dob").val(dodDate);
        var register_no = row.closest("tr").find("#register_no").text();
        $("#register_no").val(register_no);
        var mobile_no = row.closest("tr").find("#mobile_no").text();
        $("#mobile_no").val(mobile_no);
        var father_name = row.closest("tr").find("#father_name").text();
        $("#father_name").val(father_name);
        var mother_name = row.closest("tr").find("#mother_name").text();
        $("#mother_name").val(mother_name);
        var adhaar_card_no = row.closest("tr").find("#adhaar_card_no").text();
        $("#adhaar_card_no").val(adhaar_card_no);
        var guardian_mobile_no = row.closest("tr").find("#guardian_mobile_no").text();
        $("#guardian_mobile_no").val(guardian_mobile_no);
      });
      $(document).on("click", ".dlt", function () {
        var del = $(this);
        var id = $(this).attr("data-id");
        $.ajax({
          url: "studentCrud.php?action=delete",
          type: "post",
          data: { id: id },
          success: function (data) {
            alert(data);
            $("tbody").load("studentCrud.php?action=view");
          }
        });
      });
    });
  </script>
  <script src="../js/script.js"></script>

</body>

</html>