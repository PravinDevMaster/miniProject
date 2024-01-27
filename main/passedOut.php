<?php
include("../include/auth.php");
include("../include/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta required name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passed Out</title>
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
    <div class="container">
        <div class="header d-flex justify-content-between text-white pt-0 pb-0">
            <div class="titel ">
                <h3>Passed Out</h3>
            </div>
            <div class="return ">
                <p><a href="./index.php">Back</a> / Passed Out</p>
            </div>
        </div>
        <div class="table-responsive bg-light mt-2 " style="border-radius: 5px; height: 500px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Class Name</th>
                        <th>Department</th>
                        <th>Section</th>
                        <th>H.O.D</th>
                        <th>Staff</th>
                        <th>Total semester</th>
                        <th>Year</th>
                        <th class="text-center">More</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT c.class_id, c.class_name, c.department, c.section, c.hod_id, c.staff_id, s.sem_num, s.active, s.highest_sem, c.year, s.sem_complete
                        FROM class c 
                        LEFT JOIN semester s ON s.class_id = c.class_id
                        WHERE s.sem_complete = 1";
                    $result = mysqli_query($conn, $query);
                    $i = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            $hod_id = $row['hod_id'];
                            $query1 = "SELECT * FROM staff WHERE unique_staff_id = $hod_id";
                            $result1 = mysqli_query($conn, $query1);
                            if (mysqli_num_rows($result1) > 0) {
                                $row1 = mysqli_fetch_assoc($result1);
                                $hodName = $row1['first_name'] . " " . $row1['last_name'];
                            } else {
                                $hodName = " - ";
                            }
                            $staff_id = $row['staff_id'];
                            $query2 = "SELECT * FROM staff WHERE unique_staff_id = $staff_id";
                            $result2 = mysqli_query($conn, $query2);
                            if (mysqli_num_rows($result2) > 0) {
                                $row1 = mysqli_fetch_assoc($result2);
                                $staffName = $row1['first_name'] . " " . $row1['last_name'];
                            } else {
                                $staffName = " - ";
                            }
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $row['class_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['department']; ?>
                                </td>
                                <td>
                                    <?php echo $row['section']; ?>
                                </td>
                                <td>
                                    <?php echo $hodName; ?>
                                </td>
                                <td>
                                    <?php echo $staffName; ?>
                                </td>
                                <td>
                                    <?php echo $row['highest_sem']; ?>
                                </td>
                                <td>
                                    <?php echo $row['year']; ?>
                                </td>
                                <td><a href="./studentdetails.php?action=passedout&class_id=<?php echo $row['class_id']; ?>"><i
                                            class="fa-solid fa-ellipsis"></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>





    <script src="../js/script.js"></script>

</body>

</html>