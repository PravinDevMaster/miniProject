<?php
include("../include/auth.php");
include("../include/config.php");
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
$query = "SELECT c.class_id, c.class_name, c.department, c.section, c.hod_id, c.staff_id, s.sem_num, s.active, s.highest_sem
FROM class c 
LEFT JOIN semester s ON s.class_id = c.class_id 
WHERE c.class_id = $class_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['sem_num'] == 1 || $row['sem_num'] == 2) {
        $year = "I";
    } elseif ($row['sem_num'] == 3 || $row['sem_num'] == 4) {
        $year = "II";
    } elseif ($row['sem_num'] == 5 || $row['sem_num'] == 6) {
        $year = "III";
    } else {
        $year = "I";
    }

    $hod_id = $row["hod_id"];
    $query1 = "SELECT * FROM staff WHERE unique_staff_id =$hod_id";
    $result1 = mysqli_query($conn, $query1);
    $hod = mysqli_fetch_assoc($result1);

    $staff_id = $row['staff_id'];
    $query1 = "SELECT * FROM staff WHERE unique_staff_id =$staff_id";
    $result1 = mysqli_query($conn, $query1);
    $staff = mysqli_fetch_assoc($result1);

    $className = $year . " " . $row["department"] . ' ' . $row["class_name"] . ' &quot;' . $row["section"] . '&quot;';
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
    <title>Semester</title>
    <link rel="icon" type="image/x-icon" href="../img/logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <style>
        table th,
        td {
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
                <h3>Assign Semester</h3>
            </div>
            <div class="return ">
                <p><a href="./viewSemester.php">Back</a> / Assign Semester</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-10 m-0 mt-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="class_name" required name="class_name"
                        placeholder="Class Name" value="<?php echo $className; ?>" readonly>
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
                        placeholder="class_incharge" value=" <?php echo $classIncharge; ?>" readonly>
                    <label for="floatingInput">Class Incharge</label>
                </div>
            </div>
            <input type="hidden" name="class_id" id="class_id" value="<?php echo $class_id; ?>">
            <div class="col-10 mt-4">
                <div class="table-responsive bg-light mt-2 " style="border-radius: 5px; height: 400px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Semester</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Active</th>
                                <th>Close</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(() => {
            var class_id = $("#class_id").val();
            $("tbody").load("semesterCrud.php?action=view&class_id=" + class_id);

            $(document).on("click", ".start", function () {
                var row = $(this);
                var id = $(this).attr("data-id");
                var num = $(this).attr("data-num");

                $.ajax({
                    type: "POST",
                    url: "semesterCrud.php?action=start",
                    data: {
                        id: id,
                        num: num,
                    },
                    success: function (data) {
                        alert(data);
                        $("tbody").load("semesterCrud.php?action=view&class_id=" + class_id);
                    }
                });
            });

            $(document).on("click", ".end", function () {
                var row = $(this);
                var id = $(this).attr("data-id");
                var num = $(this).attr("data-num");
                var highestSem = $(this).attr("data-highestsem");
                $.ajax({
                    type: "POST",
                    url: "semesterCrud.php?action=end",
                    data: {
                        id: id,
                        num: num,
                        highest_sem: highestSem
                    },
                    success: function (data) {
                        alert(data);
                        $("tbody").load("semesterCrud.php?action=view&class_id=" + class_id);
                    }
                });
            });
        });
    </script>

    <script src="../js/script.js"></script>

</body>

</html>