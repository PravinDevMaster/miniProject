<?php
include("../include/auth.php");
include('../include/encryption.php');
include("../include/config.php");

$encryption = new Encryption();
if (isset($_GET['action']) && $_GET['action'] == "new") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $staff_id = $_POST['staff_id'];
    $pass = $encryption->encrypt($_POST['pass']);
    $role_id = $_POST['role_id'];
    $create_by = $_POST['create_by'];

    $query1 = "SELECT * FROM staff WHERE staff_id = '$staff_id' AND role_id != 1";
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result1) > 0) {
        echo "User Already Exist";
    } else {
        $query = "INSERT INTO staff (first_name, last_name, email, mobile, staff_id, role_id, password, create_by, created_date) VALUE ('$first_name', '$last_name', '$email', '$mobile_no', '$staff_id', $role_id, '$pass', $create_by, CURRENT_TIMESTAMP())";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "User Create Successfully";
        }
    }


} elseif (isset($_GET['action']) && $_GET['action'] == "view") {

    $query = "SELECT * FROM staff WHERE role_id != 1 ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        $pass = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            $role_id = $row['role_id'];
            $pass = $encryption->decrypt($row["password"]);
            $query1 = "SELECT * FROM user_role where role_id=$role_id";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_assoc($result1);
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td id='first_name'>" . $row["first_name"] . "</td>";
            echo "<td id='last_name'>" . $row["last_name"] . "</td>";
            echo "<td id='staff_id'>" . $row["staff_id"] . "</td>";
            echo "<td id='role_id' data-role_id='" . $row['role_id'] . "'>" . $row1["user_role_name"] . "</td>";
            echo "<td id='email'>" . $row["email"] . "</td>";
            echo "<td id='mobile_no'>" . $row["mobile"] . "</td>";
            echo "<td id='pass'>" . $pass . "</td>";
            ?>

            <td class="d-flex justify-content-around"><button class="edit" data-id="<?php echo $row["unique_staff_id"]; ?>"><i
                        class="fa-solid fa-square-pen "></i></button>
                <button style="display:none;" class="dlt" data-id="<?php echo $row["unique_staff_id"]; ?>"><i
                        class="fa-solid fa-trash"></i></button>
            </td>
            <?php
            echo "</tr>";
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $staff_id = $_POST['staff_id'];
    $pass = $encryption->encrypt($_POST['pass']);
    $role_id = $_POST['role_id'];
    $modify_by = $_POST['create_by'];
    $id = $_POST['id'];
    $query1 = "SELECT * FROM staff WHERE staff_id = '$staff_id' AND role_id != 1 AND unique_staff_id != $id";
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result1) > 0) {
        echo "User Already Exist";
    } else {
        $query = "UPDATE staff SET first_name = '$first_name', last_name = '$last_name', email = '$email', mobile = '$mobile_no', staff_id = '$staff_id', password = '$pass', role_id = $role_id, modify_by = $modify_by WHERE unique_staff_id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "User Details Update Successfully!";
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_POST['id'];

    $query = "DELETE FROM staff WHERE unique_staff_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "User Delete Successfully!";
    }

}
?>