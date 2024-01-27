<?php
include("../include/auth.php");

include("../include/config.php");
if (isset($_GET['action']) && $_GET['action'] == 'new') {
    if ($_POST['class_name'] && $_POST['section'] && $_POST['department'] && $_POST['year'] && $_POST['hod_id'] && $_POST['staff_id']) {
        $class_name = $_POST['class_name'];
        $section = $_POST['section'];
        $department = $_POST['department'];
        $year = $_POST['year'];
        $staff_id = $_POST['staff_id'];
        $hod_id = $_POST['hod_id'];
        $create_by = $_POST['create_by'];
        $highest_sem = $_POST['highest_sem'];

        $query = "INSERT INTO class (class_name, section, department, year, hod_id, staff_id, create_by, created_date) VALUES ('$class_name', '$section', '$department', '$year', '$hod_id','$staff_id' , '$create_by', CURRENT_TIMESTAMP());";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $id = mysqli_insert_id($conn);

            $query1 = "INSERT INTO semester ( class_id, sem1_start, sem1_end, sem2_start, sem2_end, sem3_start, sem3_end, sem4_start, sem4_end, sem5_start, sem5_end, sem6_start, sem6_end, sem_num, active, highest_sem, create_date, create_by) VALUES ($id, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-','-','-',0,0,$highest_sem, CURRENT_TIMESTAMP(), '$create_by')
            ";
            $result1 = mysqli_query($conn, $query1);
            echo "Class Create Successfully!";
        }


    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'view') {
    $query = "SELECT c.class_id, c.class_name, c.department, c.section, c.hod_id, c.staff_id, s.sem_num, s.active, s.highest_sem, c.year, s.sem_complete
    FROM class c 
    LEFT JOIN semester s ON s.class_id = c.class_id
    WHERE s.sem_complete = 0";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            $hod_id = $row['hod_id'];
            $staff_id = $row['staff_id'];
            $query1 = "SELECT * FROM staff WHERE unique_staff_id = $hod_id";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_assoc($result1);
            $query2 = "SELECT * FROM staff WHERE unique_staff_id = $staff_id";
            $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td id='class_name'>" . $row["class_name"] . "</td>";
            echo "<td id='section'>" . $row["section"] . "</td>";
            echo "<td id='department'>" . $row["department"] . "</td>";
            echo "<td id='year' >" . $row["year"] . "</td>";
            echo "<td id='hod_id' data-id='" . $row['hod_id'] . "'>" . $row1["first_name"] . " " . $row1['last_name'] . "</td>";
            echo "<td id='staff_id' data-id='" . $row['staff_id'] . "'>" . $row2["first_name"] . " " . $row2['last_name'] . "</td>";
            ?>

            <td class="d-flex justify-content-around"><button class="edit" data-id="<?php echo $row["class_id"]; ?>"><i
                        class="fa-solid fa-square-pen "></i></button>
                <button class="dlt" style="display:none;" data-id="<?php echo $row["class_id"]; ?>"><i
                        class="fa-solid fa-trash"></i></button>
            </td>
            <?php
            echo "</tr>";
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    if ($_POST['class_name'] && $_POST['section'] && $_POST['department'] && $_POST['hod_id'] && $_POST['staff_id']) {
        $class_name = $_POST['class_name'];
        $section = $_POST['section'];
        $department = $_POST['department'];
        $staff_id = $_POST['staff_id'];
        $hod_id = $_POST['hod_id'];
        $motify_by = $_POST['create_by'];
        $id = $_POST['id'];

        $query = "UPDATE class SET class_name = '$class_name', section = '$section', department= '$department', hod_id = $hod_id, staff_id = $staff_id, modify_by = $motify_by, modify_date = CURRENT_TIMESTAMP() WHERE class_id = $id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Class Update Successfully!";
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_POST['id'];

    $query = "DELETE FROM class WHERE class_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $query1 = "DELETE FROM semester WHERE class_id = $id";
        $result1 = mysqli_query($conn, $query1);

        echo "Class Delete Successfully!";
    }
}
?>