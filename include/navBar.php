<nav class="navbar navbar-light bg-light justify-content-between pt-0 pb-0 p-3 mb-4" style="height: 60px;">
    <div class="d-flex">
        <a href="#" class="navbar-brand bar mt-1">
            <i class="fa-solid fa-bars"></i>
        </a>
        <a class="navbar-brand mt-0" href="#">
            <img src="../img/logo.jpg" style="width: 150px;" alt="">
        </a>
    </div>
    <div class="d-flex">
        <div class="navHeader">
            <p>Hello,
                <?php echo $_SESSION['user_name']; ?>
            </p>
        </div>
        <div class="logoutBtn mt-2" onclick="window.location.href='./logout.php'">
            <i class="fa-solid fa-right-from-bracket"></i>
        </div>
    </div>

</nav>