<?php
include("../include/auth.php");

include("../include/config.php");
$studen_id = $_POST['student_id'];
$class_id = $_POST['class_id'];
$sem_num = $_POST['sem_num'];
$data = [];
for ($i = 0; $i < count($studen_id); $i++) {
    $data[$i]['student_id'] = $studen_id[$i];
    $data[$i]['class_id'] = $class_id;
    $data[$i]['period1'] = $_POST['period1'][$i];
    $data[$i]['period2'] = $_POST['period2'][$i];
    $data[$i]['period3'] = $_POST['period3'][$i];
    $data[$i]['period4'] = $_POST['period4'][$i];
    $data[$i]['period5'] = $_POST['period5'][$i];
    $data[$i]['p1_staff_id'] = $_POST['p1_staff_id'];
    $data[$i]['p2_staff_id'] = $_POST['p2_staff_id'];
    $data[$i]['p3_staff_id'] = $_POST['p3_staff_id'];
    $data[$i]['p4_staff_id'] = $_POST['p4_staff_id'];
    $data[$i]['p5_staff_id'] = $_POST['p5_staff_id'];
    $data[$i]['date'] = $_POST['date'];
}

if (isset($_GET['action']) && $_GET['action'] == "new") {
    for ($i = 0; $i < count($data); $i++) {
        $student_id = $data[$i]['student_id'];
        $class_id = $data[$i]['class_id'];
        $p1 = $data[$i]['period1'];
        $p2 = $data[$i]['period2'];
        $p3 = $data[$i]['period3'];
        $p4 = $data[$i]['period4'];
        $p5 = $data[$i]['period5'];
        $p1_staff_id = $data[$i]['p1_staff_id'];
        $p2_staff_id = $data[$i]['p2_staff_id'];
        $p3_staff_id = $data[$i]['p3_staff_id'];
        $p4_staff_id = $data[$i]['p4_staff_id'];
        $p5_staff_id = $data[$i]['p5_staff_id'];
        $date = $data[$i]['date'];

        $query = "INSERT INTO attendance (student_id, class_id, sem_num, p1, p2, p3, p4, p5, p1_staff_id, p2_staff_id, p3_staff_id, p4_staff_id, p5_staff_id, date) VALUE ($student_id, $class_id, $sem_num, $p1, $p2, $p3, $p4, $p5, $p1_staff_id, $p2_staff_id, $p3_staff_id, $p4_staff_id, $p5_staff_id, '$date')";
        $result = mysqli_query($conn, $query);
    }
    echo "<script> alert('insert successfully!');</script>";
    header("location:./attendance.php?class_id=" . $class_id . "&sem_num=" . $sem_num);
} elseif (isset($_GET['action']) && $_GET['action'] == "edit") {
    for ($i = 0; $i < count($data); $i++) {
        $student_id = $data[$i]['student_id'];
        $class_id = $data[$i]['class_id'];
        $p1 = $data[$i]['period1'];
        $p2 = $data[$i]['period2'];
        $p3 = $data[$i]['period3'];
        $p4 = $data[$i]['period4'];
        $p5 = $data[$i]['period5'];
        $p1_staff_id = $data[$i]['p1_staff_id'];
        $p2_staff_id = $data[$i]['p2_staff_id'];
        $p3_staff_id = $data[$i]['p3_staff_id'];
        $p4_staff_id = $data[$i]['p4_staff_id'];
        $p5_staff_id = $data[$i]['p5_staff_id'];
        $date = $data[$i]['date'];

        $query = "UPDATE attendance SET class_id=$class_id, sem_num=$sem_num, p1=$p1, p2=$p2, p3=$p3, p4=$p4, p5=$p5, p1_staff_id=$p1_staff_id, p2_staff_id=$p2_staff_id, p3_staff_id=$p3_staff_id, p4_staff_id=$p4_staff_id, p5_staff_id=$p5_staff_id WHERE student_id = $student_id AND date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    echo "<script> alert('Update successfully!');</script>";
    header("location:./attendance.php?class_id=" . $class_id . "&sem_num=" . $sem_num);
} else {
    echo "404 Error!";
}


?>