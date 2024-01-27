<?php
include("../include/auth.php");
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta required name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
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
  <form action="" id="form" method="POST">
    <div class="header d-flex justify-content-between text-white pt-0 pb-0 p-5">
      <div class="titel ">
        <h3>Create Staff</h3>
      </div>
      <div class="return ">
        <p><a href="./index.php">Home</a> / Create Staff</p>
      </div>
    </div>
    <div class="row  d-flex justify-content-center">
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating">
          <input type="text" class="form-control" id="first_name" required name="first_name" placeholder="First Name">
          <label for="floatingInput">First Name</label>
        </div>
      </div>
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating ">
          <input type="text" class="form-control" id="last_name" required name="last_name" placeholder="Last Name">
          <label for="floatingInput">Last Name</label>
        </div>
      </div>
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating ">
          <input type="email" class="form-control" id="email" required name="email" placeholder="sample@gmail.com">
          <label for="floatingInput">Email</label>
        </div>
      </div>
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating ">
          <input type="number" class="form-control" id="mobile_no" required name="mobile_no" placeholder="Mobile No">
          <label for="floatingInput">Mobile No</label>
        </div>
      </div>
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating ">
          <input type="text" class="form-control" id="staff_id" required name="staff_id" placeholder="Staff Id"
            oninput="this.value = this.value.toUpperCase()">
          <label for="floatingInput">Staff Id</label>
        </div>
      </div>
      <div class="col-lg-5 col-10 m-2">
        <div class="form-floating ">
          <input type="password" class="form-control" id="pass" required name="pass" placeholder="Password">
          <label for="floatingInput">Password</label>
        </div>
      </div>
      <div class="form-floating col-lg-5 col-10 m-2">
        <select class="form-select" id="role_id" required name="role_id" aria-label="Floating label select example">
          <option></option>
          <option value="2">H.O.D</option>
          <option value="3">Staff</option>
        </select>
        <label for="floatingSelect">Roles</label>
      </div>
      <div class="col-lg-5 col-10 m-2 " style="text-align: left;">
        <input type="button" value="Add" class="btn btn-warning col-3 p-2">
      </div>
      <input type="hidden" name="id" id="id" value="0">
      <input type="hidden" name="create_by" id="id1" value="<?php echo $user_id; ?>">
    </div>
  </form>
  <div class="pt-0 pb-0 p-5">
    <div class="table-responsive bg-light mt-2" style="border-radius: 5px; height: 300px;">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Staff Id</th>
            <th>Role</th>
            <th>Email</th>
            <th>Mobile NO</th>
            <th>Password</th>
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
      $("tbody").load("staffCrud.php?action=view");
      $(".btn").click(() => {
        var id = $("#id").val();
        if (id == 0) {
          $.ajax({
            type: "POST",
            url: "staffCrud.php?action=new",
            data: $("#form").serialize(),
            success: function (data) {
              alert(data);
              $("#form")[0].reset();
              $("#id").val("0");
              $("tbody").load("staffCrud.php?action=view");
            },
            error: function () {
              alert("error");
            }
          });
        }
        else {
          $.ajax({
            type: "POST",
            url: "staffCrud.php?action=update",
            data: $("#form").serialize(),
            success: function (data) {
              alert(data);
              $("#form")[0].reset();
              $("#id").val("0");
              $(".btn").val("Add");
              $("tbody").load("staffCrud.php?action=view");
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

        var first_name = row.closest("tr").find("#first_name").text();
        $("#first_name").val(first_name);
        var last_name = row.closest("tr").find("#last_name").text();
        $("#last_name").val(last_name);
        var email = row.closest("tr").find("#email").text();
        $("#email").val(email);
        var mobile_no = row.closest("tr").find("#mobile_no").text();
        $("#mobile_no").val(mobile_no);
        var staff_id = row.closest("tr").find("#staff_id").text();
        $("#staff_id").val(staff_id);
        var pass = row.closest("tr").find("#pass").text();
        $("#pass").val(pass);
        var first_name = row.closest("tr").find("#first_name").text();
        $("#first_name").val(first_name);
        var role_id = row.closest("tr").find("#role_id").attr("data-role_id");
        $("#role_id").val(role_id);
      });
      $(document).on("click", ".dlt", function () {
        var del = $(this);
        var id = $(this).attr("data-id");
        $.ajax({
          url: "staffCrud.php?action=delete",
          type: "post",
          data: { id: id },
          success: function (data) {
            alert(data);
            $("tbody").load("staffCrud.php?action=view");
          }
        });
      });
    });
  </script>
  <script src="../js/script.js"></script>

</body>

</html>