<?php
include("../include/auth.php");

include("../include/config.php");

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM staff";
$result = mysqli_query($conn, $query);
$data1;
$data2;
$HOD = array();
$staff = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data1 = 0;
    $data2 = 0;
    if ($row['role_id'] == 2) {
      $data1 = [
        "hod_id" => $row['unique_staff_id'],
        "hod_name" => $row['first_name'] . $row['last_name']
      ];
      array_push($HOD, $data1);
    } elseif ($row['role_id'] == 3) {
      $data2 = [
        "staff_id" => $row['unique_staff_id'],
        "staff_name" => $row['first_name'] . " " . $row['last_name']
      ];
      array_push($staff, $data2);
    }
  }
}
$sem6 = date("Y") . " to " . date("Y", strtotime("+3 years"));
$sem4 = date("Y") . " to " . date("Y", strtotime("+2 years"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta required name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Class</title>
  <link rel="icon" type="image/x-icon" href="../img/logo1.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <style>
    td,
    th {
      text-align: center;
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
  <form action="" id="form" method="POST" onsubmit="return false">
    <div class="header d-flex justify-content-between text-white pt-0 pb-0 p-5">
      <div class="titel ">
        <h3>Create Class</h3>
      </div>
      <div class="return ">
        <p><a href="./index.php">Home</a> / Create Class</p>
      </div>
    </div>
    <div class="row  d-flex justify-content-center">
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating">
          <input type="text" class="form-control" id="class_name" required name="class_name" placeholder="Class Name">
          <label for="floatingInput">Class Name</label>
        </div>
      </div>
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating">
          <input type="text" class="form-control" id="section" oninput="this.value=this.value.toUpperCase()" required
            name="section" placeholder="Section">
          <label for="floatingInput">Section</label>
        </div>
      </div>
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating">
          <input type="text" class="form-control" id="department" required name="department" placeholder="Department">
          <label for="floatingInput">Department</label>
        </div>
      </div>
      <div class="form-floating col-lg-5 col-10 m-2">
        <select class="form-select" id="year" required aria-label="Floating label select example">
          <option value=""></option>
          <option value="<?php echo $sem4; ?>" data-semid="4"><?php echo $sem4; ?></option>
          <option value="<?php echo $sem6; ?>" data-semid="6"><?php echo $sem6; ?></option>
        </select>
        <label for="floatingSelect">Year</label>
      </div>
      <div class="form-floating col-lg-5 col-10 m-2">
        <select class="form-select" id="hod_id" required name="hod_id" aria-label="Floating label select example">
          <option></option>
          <?php
          foreach ($HOD as $item) {
            ?>
            <option value="<?php echo $item['hod_id']; ?>"><?php echo $item['hod_name']; ?></option>
            <?php
          }
          ?>
        </select>
        <label for="floatingSelect">H.O.D</label>
      </div>
      <div class="form-floating col-lg-5 col-10 m-2">
        <select class="form-select" id="staff_id" required name="staff_id" aria-label="Floating label select example">
          <option></option>
          <?php
          foreach ($staff as $item) {
            ?>
            <option value="<?php echo $item['staff_id']; ?>"><?php echo $item['staff_name']; ?></option>
            <?php
          }
          ?>
        </select>
        <label for="floatingSelect">Staff</label>
      </div>
      <div class="col-lg-5 col-10 m-2"></div>
      <div class="col-lg-5 col-10 m-2 " style="text-align:right;">
        <input type="submit" name='action' value="Add" class="btn btn-warning col-3 p-2">
      </div>
      <input type="hidden" required name="id" id="id" value="0">
      <input type="hidden" required name="create_by" id="id1" value="<?php echo $user_id; ?>">
      <input type="hidden" name="year" id="year1">
      <input type="hidden" name="highest_sem" id="highest_sem">
    </div>
  </form>
  <div class="pt-0 pb-0 p-5">
    <div class="table-responsive bg-light mt-2 " style="border-radius: 5px; height: 300px;">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Class Name</th>
            <th>Section</th>
            <th>Department</th>
            <th>Year</th>
            <th>H.O.D</th>
            <th>Staff</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  <script>
    $(document).ready(() => {
      $(document).on("change", "#year", function () {
        var highestSem = $('option:selected', this).attr("data-semid");
        var option = $('option:selected', this).val();
        $("#year1").val(option);
        $("#highest_sem").val(highestSem);
      });
      $("tbody").load("classCrud.php?action=view");

      $(".btn").click(() => {
        var id = $("#id").val();
        if (id == 0) {
          $.ajax({
            type: "POST",
            url: "classCrud.php?action=new",
            data: $("#form").serialize(),
            success: function (data) {
              if (data == 'Class Create Successfully!') {
                alert(data);
                $("#form")[0].reset();
                $("#id").val("0");
                $("tbody").load("classCrud.php?action=view");
              }

            },
            error: function () {
              alert("error");
            }
          });
        }
        else {
          $.ajax({
            type: "POST",
            url: "classCrud.php?action=update",
            data: $("#form").serialize(),
            success: function (data) {
              alert(data)
              $("#form")[0].reset();
              $("#id").val("0");
              $(".btn").val("Add");
              $("tbody").load("classCrud.php?action=view");
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

        var class_name = row.closest("tr").find("#class_name").text();
        $("#class_name").val(class_name);
        var section = row.closest("tr").find("#section").text();
        $("#section").val(section);
        var department = row.closest("tr").find("#department").text();
        $("#department").val(department);
        var year = row.closest("tr").find("#year").text();
        $("#year").val(year);
        $("#year").attr('disabled', true);
        var hod_id = row.closest("tr").find("#hod_id").attr("data-id");
        $("#hod_id").val(hod_id);
        var staff_id = row.closest("tr").find("#staff_id").attr("data-id");
        $("#staff_id").val(staff_id);
      });


      $(document).on("click", ".dlt", function () {
        var del = $(this);
        var id = $(this).attr("data-id");
        $.ajax({
          url: "classCrud.php?action=delete",
          type: "post",
          data: { id: id },
          success: function (data) {
            alert(data);
            $("#form")[0].reset();
            $("#id").val("0");
            $(".btn").val("Add");
            $("tbody").load("classCrud.php?action=view");
          }
        });
      });
    });
  </script>
  <script src="../js/script.js"></script>
</body>

</html>