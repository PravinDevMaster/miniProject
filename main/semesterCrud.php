<?php
include("../include/config.php");
session_start();
$user_id = $_SESSION['user_id'];
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $class_id = $_GET['class_id'];

    $query = "SELECT * FROM semester WHERE class_id = $class_id";
    $result = mysqli_query($conn, $query);
    $i = 0;
    $st_date = '';
    $end_date = '';
    $preenddate = '-';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td>1</td>
                <td>Semester 1</td>
                <td>
                    <?php if ($row['sem1_start'] == '-') {
                        echo $row['sem1_start'];
                    } else {
                        $a = date_create($row['sem1_start']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td>
                    <?php if ($row['sem1_end'] == '-') {
                        echo $row['sem1_end'];
                    } else {
                        $a = date_create($row['sem1_end']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td><button type="button" data-num="1" data-id="<?php echo $row['semester_id']; ?>" class="btn btn-success start"
                        <?php if ($row['sem1_start'] != '-')
                            echo 'disabled'; ?>> Start </button></td>
                <td><button type="button" data-num="1" data-highestsem="<?php echo $row['highest_sem']; ?>"
                        data-id="<?php echo $row['semester_id']; ?>" class="btn btn-danger end" <?php if ($row['sem1_start'] == '-' || $row['sem1_end'] != '-')
                              echo 'disabled'; ?>> End </button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Semester 2</td>
                <td>
                    <?php if ($row['sem2_start'] == '-') {
                        echo $row['sem2_start'];
                    } else {
                        $a = date_create($row['sem2_start']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td>
                    <?php if ($row['sem2_end'] == '-') {
                        echo $row['sem2_end'];
                    } else {
                        $a = date_create($row['sem2_end']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td><button type="button" data-num="2" data-id="<?php echo $row['semester_id']; ?>" class="btn btn-success start"
                        <?php if ($row['sem2_start'] != '-' || $row['sem1_end'] == '-')
                            echo 'disabled'; ?>> Start </button></td>
                <td><button type="button" data-num="2" data-highestsem="<?php echo $row['highest_sem']; ?>"
                        data-id="<?php echo $row['semester_id']; ?>" class="btn btn-danger end" <?php if ($row['sem2_start'] == '-' || $row['sem2_end'] != '-')
                              echo 'disabled'; ?>> End </button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Semester 3</td>
                <td>
                    <?php if ($row['sem3_start'] == '-') {
                        echo $row['sem3_start'];
                    } else {
                        $a = date_create($row['sem3_start']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td>
                    <?php if ($row['sem3_end'] == '-') {
                        echo $row['sem3_end'];
                    } else {
                        $a = date_create($row['sem3_end']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td><button type="button" data-num="3" data-id="<?php echo $row['semester_id']; ?>" class="btn btn-success start"
                        <?php if ($row['sem3_start'] != '-' || $row['sem2_end'] == '-')
                            echo 'disabled'; ?>> Start </button></td>
                <td><button type="button" data-num="3" data-highestsem="<?php echo $row['highest_sem']; ?>"
                        data-id="<?php echo $row['semester_id']; ?>" class="btn btn-danger end" <?php if ($row['sem3_start'] == '-' || $row['sem3_end'] != '-')
                              echo 'disabled'; ?>> End </button></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Semester 4</td>
                <td>
                    <?php if ($row['sem4_start'] == '-') {
                        echo $row['sem4_start'];
                    } else {
                        $a = date_create($row['sem4_start']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td>
                    <?php if ($row['sem4_end'] == '-') {
                        echo $row['sem4_end'];
                    } else {
                        $a = date_create($row['sem4_end']);
                        echo date_format($a, "Y-m-d");
                    } ?>
                </td>
                <td><button type="button" data-num="4" data-id="<?php echo $row['semester_id']; ?>" class="btn btn-success start"
                        <?php if ($row['sem4_start'] != '-' || $row['sem3_end'] == '-')
                            echo 'disabled'; ?>> Start </button></td>
                <td><button type="button" data-num="4" data-highestsem="<?php echo $row['highest_sem']; ?>"
                        data-id="<?php echo $row['semester_id']; ?>" class="btn btn-danger end" <?php if ($row['sem4_start'] == '-' || $row['sem4_end'] != '-')
                              echo 'disabled'; ?>> End </button></td>
            </tr>
            <?php
            if ($row['highest_sem'] == 6) {
                ?>
                <tr>
                    <td>5</td>
                    <td>Semester 5</td>
                    <td>
                        <?php if ($row['sem5_start'] == '-') {
                            echo $row['sem5_start'];
                        } else {
                            $a = date_create($row['sem5_start']);
                            echo date_format($a, "Y-m-d");
                        } ?>
                    </td>
                    <td>
                        <?php if ($row['sem5_end'] == '-') {
                            echo $row['sem5_end'];
                        } else {
                            $a = date_create($row['sem5_end']);
                            echo date_format($a, "Y-m-d");
                        } ?>
                    </td>
                    <td><button type="button" data-num="5" data-id="<?php echo $row['semester_id']; ?>" class="btn btn-success start"
                            <?php if ($row['sem5_start'] != '-' || $row['sem4_end'] == '-')
                                echo 'disabled'; ?>> Start </button></td>
                    <td><button type="button" data-num="5" data-highestsem="<?php echo $row['highest_sem']; ?>"
                            data-id="<?php echo $row['semester_id']; ?>" class="btn btn-danger end" <?php if ($row['sem5_start'] == '-' || $row['sem5_end'] != '-')
                                  echo 'disabled'; ?>> End </button></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Semester 6</td>
                    <td>
                        <?php if ($row['sem6_start'] == '-') {
                            echo $row['sem6_start'];
                        } else {
                            $a = date_create($row['sem6_start']);
                            echo date_format($a, "Y-m-d");
                        } ?>
                    </td>
                    <td>
                        <?php if ($row['sem6_end'] == '-') {
                            echo $row['sem6_end'];
                        } else {
                            $a = date_create($row['sem6_end']);
                            echo date_format($a, "Y-m-d");
                        } ?>
                    </td>
                    <td><button type="button" data-num="6" data-id="<?php echo $row['semester_id']; ?>" class="btn btn-success start"
                            <?php if ($row['sem6_start'] != '-' || $row['sem5_end'] == '-')
                                echo 'disabled'; ?>> Start </button></td>
                    <td><button type="button" data-num="6" data-highestsem="<?php echo $row['highest_sem']; ?>"
                            data-id="<?php echo $row['semester_id']; ?>" class="btn btn-danger end" <?php if ($row['sem6_start'] == '-' || $row['sem6_end'] != '-')
                                  echo 'disabled'; ?>> End </button></td>
                </tr>

                <?php
            }
        }
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'start') {
    $id = $_POST['id'];
    $num = $_POST['num'];
    $sem = "sem$num" . "_start";
    $query = "UPDATE semester SET $sem = CURRENT_TIMESTAMP(), sem_num =$num, active=1, modify_by = $user_id, modify_date = CURRENT_TIMESTAMP() WHERE semester_id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Semester Start Successfully";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'end') {
    $id = $_POST['id'];
    $num = $_POST['num'];
    $sem = "sem$num" . "_end";
    $highest_sem = $_POST['highest_sem'];
    if ($num == $highest_sem) {
        $sem_complete = 1;
    } else {
        $sem_complete = 0;
    }
    $query = "UPDATE semester SET $sem = CURRENT_TIMESTAMP(), active=0,sem_complete = $sem_complete, modify_by = $user_id, modify_date = CURRENT_TIMESTAMP() WHERE semester_id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Semester End Successfully";
    }
}
?>