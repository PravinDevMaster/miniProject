<?php
include("../include/auth.php");
include("../include/config.php");
$class_id = $_SESSION['SESS_CLASS_ID'];

if ($_GET['action'] == "new") {
    if ($_POST['class_id'] && $_POST['name'] && $_POST['initial'] && $_POST['register_no'] && $_POST['mobile_no'] && $_POST['father_name'] && $_POST['guardian_mobile_no'] && $_POST['id1'] && $_POST['gender'] && $_POST['dob'] && $_POST['adhaar_card_no']) {
        $class_id = $_POST['class_id'];
        $name = $_POST['name'];
        $initial = $_POST['initial'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $register_no = $_POST['register_no'];
        $mobile_no = $_POST['mobile_no'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $guardian_mobile_no = $_POST['guardian_mobile_no'];
        $adhaar_card_no = $_POST['adhaar_card_no'];
        $create_by = $_POST['id1'];

        $query1 = "SELECT * FROM student WHERE register_no = $register_no";
        $result1 = mysqli_query($conn, $query1);
        if (mysqli_num_rows($result1) > 0) {
            echo "Student Already Exist";
        } else {
            $query = "INSERT INTO student (class_id, name, initial, gender, dob, register_no, mobile_no, father_name, mother_name, guardian_mobile_no, adhaar_card_no, create_by, created_date) VALUES ($class_id, '$name', '$initial', '$gender','$dob', $register_no, $mobile_no,'$father_name','$mother_name' , $guardian_mobile_no,$adhaar_card_no, '$create_by', CURRENT_TIMESTAMP());";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "Create Student Successfully!";
            }
        }
    } else {
        echo "All Fields are Required";
    }

} elseif (isset($_GET['action']) && $_GET['action'] == 'view') {
    $query = "SELECT * FROM student WHERE class_id=$class_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td id='name'>" . $row["name"] . "</td>";
            echo "<td id='initial'>" . $row["initial"] . "</td>";
            echo "<td id='gender'>" . $row["gender"] . "</td>";
            echo "<td id='dob'>" . date("d-m-Y", strtotime($row["dob"])) . "</td>";
            echo "<td id='register_no'>" . $row["register_no"] . "</td>";
            echo "<td id='mobile_no' >" . $row["mobile_no"] . "</td>";
            echo "<td id='father_name'>" . $row['father_name'] . "</td>";
            echo "<td id='mother_name'>" . $row['mother_name'] . "</td>";
            echo "<td id='guardian_mobile_no'>" . $row["guardian_mobile_no"] . "</td>";
            echo "<td id='adhaar_card_no'>" . $row["adhaar_card_no"] . "</td>";
            ?>

            <td class="d-flex justify-content-around"><button class="edit" data-id="<?php echo $row["student_id"]; ?>"><i
                        class="fa-solid fa-square-pen "></i></button>
                <button class="dlt" data-id="<?php echo $row["student_id"]; ?>"><i class="fa-solid fa-trash"></i></button>
            </td>
            <?php
            echo "</tr>";
        }
    }
} elseif ($_GET['action'] == "update") {
    if ($_POST['id'] && $_POST['name'] && $_POST['initial'] && $_POST['register_no'] && $_POST['mobile_no'] && $_POST['father_name'] && $_POST['guardian_mobile_no'] && $_POST['id1'] && $_POST['gender'] && $_POST['dob'] && $_POST['adhaar_card_no']) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $initial = $_POST['initial'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $register_no = $_POST['register_no'];
        $mobile_no = $_POST['mobile_no'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $guardian_mobile_no = $_POST['guardian_mobile_no'];
        $adhaar_card_no = $_POST['adhaar_card_no'];
        $modify_by = $_POST['id1'];

        $query1 = "SELECT * FROM student WHERE student_id != $id AND register_no = $register_no";
        $result1 = mysqli_query($conn, $query1);
        if (mysqli_num_rows($result1) > 0) {
            echo "Student Already Exist";
        } else {
            $query = "UPDATE student SET name = '$name', initial = '$initial', gender = '$gender', dob = '$dob',register_no= $register_no, mobile_no = $mobile_no, father_name = '$father_name', mother_name = '$mother_name',  guardian_mobile_no = '$guardian_mobile_no',adhaar_card_no = $adhaar_card_no, modify_by = $modify_by, modify_date = CURRENT_TIMESTAMP() WHERE student_id = $id";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "Student Details Update successfully!";
            }
        }
    } else {
        echo "All Fields are Required";
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_POST['id'];

    $query = "DELETE FROM student WHERE student_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Student Details Delete Successfully!";
    }
}

?>