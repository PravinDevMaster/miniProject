<?php
include("../include/auth.php");

if ($_GET['class_id']) {
    $class_id = $_GET['class_id'];
    $sem_num = $_GET['sem_num'];
} else {
    header("location:./classes.php");
}

$user_id = $_SESSION['user_id'];
$status1 = "active";
$status2 = " ";
$status3 = " ";
$status4 = " ";
$status5 = " ";
$p1_staff_id = $user_id;
$p2_staff_id = 0;
$p3_staff_id = 0;
$p4_staff_id = 0;
$p5_staff_id = 0;
include("../include/config.php");
$date = date("Y-m-d");
$action = "new";
$query = "SELECT * FROM attendance WHERE class_id=$class_id AND date='$date'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $action = "edit";
    $row = mysqli_fetch_assoc($result);
    if ($row['p1_staff_id'] == 0 && $row['p2_staff_id'] == 0 && $row['p3_staff_id'] == 0 && $row['p4_staff_id'] == 0 && $row['p5_staff_id'] == 0) {
        $p1_staff_id = $user_id;
        $status1 = "active";
    } else {
        $p1_staff_id = $row['p1_staff_id'];
        $status1 = "";

    }
    if ($row['p1_staff_id'] != 0 && $row['p2_staff_id'] == 0 && $row['p3_staff_id'] == 0 && $row['p4_staff_id'] == 0 && $row['p5_staff_id'] == 0) {
        $p2_staff_id = $user_id;
        $status2 = "active";
    } else {
        $p2_staff_id = $row['p2_staff_id'];
        $status2 = "";
    }
    if ($row['p1_staff_id'] != 0 && $row['p2_staff_id'] != 0 && $row['p3_staff_id'] == 0 && $row['p4_staff_id'] == 0 && $row['p5_staff_id'] == 0) {
        $p3_staff_id = $user_id;
        $status3 = "active";
    } else {
        $p3_staff_id = $row['p3_staff_id'];
        $status3 = "";
    }
    if ($row['p1_staff_id'] != 0 && $row['p2_staff_id'] != 0 && $row['p3_staff_id'] != 0 && $row['p4_staff_id'] == 0 && $row['p5_staff_id'] == 0) {
        $p4_staff_id = $user_id;
        $status4 = "active";
    } else {
        $p4_staff_id = $row['p4_staff_id'];
        $status4 = "";
    }
    if ($row['p1_staff_id'] != 0 && $row['p2_staff_id'] != 0 && $row['p3_staff_id'] != 0 && $row['p4_staff_id'] != 0 && $row['p5_staff_id'] == 0) {
        $p5_staff_id = $user_id;
        $status5 = "active";
    } else {
        $p5_staff_id = $row['p5_staff_id'];
        $status5 = "";
    }
    if ($row['p1_staff_id'] != 0 && $row['p2_staff_id'] != 0 && $row['p3_staff_id'] != 0 && $row['p4_staff_id'] != 0 && $row['p5_staff_id'] != 0) {
        $status = "active";
    }
}

$query = "select * from class where class_id = $class_id";
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
$stucountquery = "SELECT * FROM student WHERE class_id=$class_id";
$stucountresult = mysqli_query($conn, $stucountquery);
$stucount = mysqli_num_rows($stucountresult);


if ($sem_num == 1 || $sem_num == 2) {
    $year = "I";
} elseif ($sem_num == 3 || $sem_num == 4) {
    $year = "II";
} elseif ($sem_num == 5 || $sem_num == 6) {
    $year = "III";
} else {
    $year = "I";
}

if ($sem_num != 0) {
    $semester = "Semester - " . $sem_num;
} else {
    $semester = 'Semester - 1';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance</title>
    <link rel="icon" type="image/x-icon" href="../img/logo1.png">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="../js/jquery.min.js"></script>
    <style>
        input[type=checkbox] {
            zoom: 1.5;
        }
    </style>
    <style>
        table th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        .item {
            cursor: pointer;
        }

        .item.active {
            background-color: #0d6efd;
            color: #fff;
        }

        .subItem {
            pointer-events: none;
            opacity: .2;
        }

        .p1.subItem.active,
        .p2.subItem.active,
        .p3.subItem.active,
        .p4.subItem.active,
        .p5.subItem.active {
            pointer-events: all;
            opacity: 1;
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
    <div class="container">
        <form action="./attendanceCrud.php?action=<?php echo $action; ?>" method="POST">
            <div class="header d-flex justify-content-between text-white pt-0 pb-0 p-5">
                <div class="titel ">
                    <h3>
                        <?php echo $year . " " . $className; ?>
                    </h3>
                </div>
                <div class="return ">
                    <p><a href="./takeAttendance.php">Back</a> / Take Attendance</p>
                </div>
            </div>
    </div>
    <div class="container mt-2">

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
            <a class="btn btn-light text-dark"
                href="./studentdetails.php?action=active&class_id=<?php echo $_GET['class_id']; ?>">
                Students Details
            </a>
        </div>
    </div>
    <div class="container table-responsive bg-light mt-2 " style="border-radius: 5px;height: 80vh;">

        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2">S.No</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Register No</th>
                    <th colspan="5">Period</th>
                    <th rowspan="2">More</th>
                </tr>
                <tr>
                    <th data-id="p1" class="item <?php if (!empty($status)) {
                        echo $status;
                    }
                    echo $status1; ?>">P1</th>
                    <th data-id="p2" class="item <?php if (!empty($status)) {
                        echo $status;
                    }
                    echo $status2; ?>">P2</th>
                    <th data-id="p3" class="item <?php if (!empty($status)) {
                        echo $status;
                    }
                    echo $status3; ?>">P3</th>
                    <th data-id="p4" class="item <?php if (!empty($status)) {
                        echo $status;
                    }
                    echo $status4; ?>">P4</th>
                    <th data-id="p5" class="item <?php if (!empty($status)) {
                        echo $status;
                    }
                    echo $status5; ?>">P5</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM student WHERE class_id=$class_id";
                $result = mysqli_query($conn, $query);
                $i = 0;
                $disable = ' ';
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        $id = $row['student_id'];
                        if ($action == "edit") {
                            $query1 = "SELECT * FROM attendance WHERE student_id=$id AND date='$date'";
                            $result1 = mysqli_query($conn, $query1);
                            if (mysqli_num_rows($result1) > 0) {
                                $row1 = mysqli_fetch_assoc($result1);
                            }
                        }
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $row['name'] . "  " . $row['initial']; ?>
                            </td>
                            <td>
                                <?php echo $row['register_no']; ?>
                            </td>
                            <input type="hidden" value="<?php echo $row['student_id']; ?>" name="student_id[]">
                            <td class="p1 subItem <?php if (!empty($status)) {
                                echo $status;
                            }
                            echo $status1; ?>">
                                <input type="checkbox" <?php if (isset($row1['p1']) && $row1['p1'] == 1) {
                                    echo "checked";
                                } ?>>
                                <input type="hidden" value="0" name="period1[]">
                            </td>
                            <td class="p2 subItem <?php if (!empty($status)) {
                                echo $status;
                            }
                            echo $status2; ?>">
                                <input type="checkbox" <?php if (isset($row1['p2']) && $row1['p2'] == 1) {
                                    echo "checked";
                                } ?>>
                                <input type="hidden" value="0" name="period2[]">
                            </td>
                            <td class="p3 subItem <?php if (!empty($status)) {
                                echo $status;
                            }
                            echo $status3; ?>">
                                <input type="checkbox" <?php if (isset($row1['p3']) && $row1['p3'] == 1) {
                                    echo "checked";
                                } ?>>
                                <input type="hidden" value="0" name="period3[]">
                            </td>
                            <td class="p4 subItem <?php if (!empty($status)) {
                                echo $status;
                            }
                            echo $status4; ?>">
                                <input type="checkbox" <?php if (isset($row1['p4']) && $row1['p4'] == 1) {
                                    echo "checked";
                                } ?>>
                                <input type="hidden" value="0" name="period4[]">
                            </td>
                            <td class="p5 subItem <?php if (!empty($status)) {
                                echo $status;
                            }
                            echo $status5; ?>">
                                <input type="checkbox" <?php if (isset($row1['p5']) && $row1['p5'] == 1) {
                                    echo "checked";
                                } ?>>
                                <input type="hidden" value="0" name="period5[]">
                            </td>
                            <td><a
                                    href="./indistudent.php?class_id=<?php echo $_GET['class_id']; ?>&student_id=<?php echo $id; ?>"><i
                                        class="fa-solid fa-ellipsis"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    $disable = 'disabled';
                }
                ?>
                <tr>
                    <input type="hidden" value="<?php echo $class_id; ?>" name="class_id">
                    <input type="hidden" value="<?php echo $sem_num; ?>" name="sem_num">
                    <input type="hidden" value="<?php echo $p1_staff_id; ?>" name="p1_staff_id">
                    <input type="hidden" value="<?php echo $p2_staff_id; ?>" name="p2_staff_id">
                    <input type="hidden" value="<?php echo $p3_staff_id; ?>" name="p3_staff_id">
                    <input type="hidden" value="<?php echo $p4_staff_id; ?>" name="p4_staff_id">
                    <input type="hidden" value="<?php echo $p5_staff_id; ?>" name="p5_staff_id">
                    <input type="hidden" value="<?php echo $date; ?>" name="date">
                    <td colspan="7">
                        <?php
                        if ($disable == 'disabled') {
                            ?>
                            <h3>Student's Not Available in the Class</h3>
                            <?php
                        }
                        ?>
                    </td>
                    <td colspan="2" class="text-start"><input class="btn btn-success" <?php echo $disable; ?>
                            type="submit" value="Save"></td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
    <script src="../js/period.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>