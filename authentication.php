<?php
include_once('./include/config.php');
include('./include/encryption.php');
session_start();
$encryption = new Encryption();
$captcha = $_SESSION['captcha'];

if ($captcha == $_POST['captcha']) {
    $username = $_POST['userName'];
    $password = $encryption->encrypt($_POST['pwd']);
    $query = "select * from staff where staff_id='$username' and password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['unique_staff_id'];
        $_SESSION['role_id'] = $row['role_id'];
        $_SESSION['user_name'] = $row['first_name'] . " " . $row['last_name'];
        ?>
        <script>
            window.location.href = "./main/index.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Username and password incorrect");
            window.location.href = "./index.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("Invalid Captcha!");
        window.location.href = "./index.php";
    </script>
    <?php
}
?>