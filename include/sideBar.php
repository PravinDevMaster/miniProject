<div class="sideBar p-0 pt-5 pb-0">
    <div class="menu pt-4 p-0 pb-0">
        <div class="closeBtn"><i class="fa-solid fa-xmark"></i></div>

        <div class="logo mt-4">
            <div class="img">
                <img src="../img/logo1.png" alt="">
            </div>
        </div>
        <div class="menuList">
            <a href="./index.php" class="menuList">
                <span><i class="fa-solid fa-gauge"></i></span>
                <span>Dashboard</span>
            </a>
        </div>
        <div class="menuList" id="classesMenu">
            <a href="#" class="menuList">
                <span><i class="fa-solid fa-book"></i></span>
                <span>Classes</span>
            </a>
        </div>
        <div class="subMenu">
            <?php
            if ($_SESSION['role_id'] != 1) {
                ?>
                <div class="submenuList">
                    <a href="./takeAttendance.php">
                        <span><i class="fa-solid fa-clipboard-user"></i></span>
                        <span>Attendance</span>
                    </a>
                </div>
                <?php
            }
            ?>
            <div class="submenuList">
                <a href="./report.php">
                    <span><i class="fa-solid fa-file-lines"></i></span>
                    <span>Report</span>
                </a>
            </div>

            <div class="submenuList">
                <a href="./passedOut.php">
                    <span><i class="fa-solid fa-user-graduate"></i></span>
                    <span>Passed Out</span>
                </a>
            </div>
        </div>
        <?php
        if ($_SESSION['role_id'] == 1) {
            ?>
            <div class="menuList">
                <a href="./viewSemester.php" class="menuList">
                    <span><i class="fa-solid fa-clipboard-user"></i></span>
                    <span>Semester</span>
                </a>
            </div>
            <?php
        }
        ?>

    </div>
</div>