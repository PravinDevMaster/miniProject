<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" type="image/x-icon" href="./img/logo1.png">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


</head>

<body class="bg-primary">
    <section class="container-fluid ">
        <div class="formContainer col-xl-3 col-lg-4 col-sm-5 col-10">
            <div class="logo mb-4">
                <img src="./img/logo.jpg" alt="">
            </div>
            <form action="./authentication.php" method="post">
                <div class="inputField">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="userName" placeholder="username">
                        <label for="floatingInput">Staff Id</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                        <i class="fa fa-eye"></i>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="captcha" placeholder="captcha">
                                <label for="floatingInput">Captcha</label>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="captchaField d-flex justify-content-around d-flex align-items-center"
                                style="height: 70%;">
                                <img class="captchaImg" src="./include/captcha.php" alt="">
                                <i class="fa-solid fa-rotate-right refreshBtn btn btn-info"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <input type="submit" class="btn btn-primary w-100" value="Login">
                    </div>

                </div>
            </form>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('.refreshBtn').click(function () {
                $('.captchaImg').attr('src', './include/captcha.php');
                $(this).toggleClass("load");
            });

            var pwdField = document.querySelector(".form-floating input[type='password']");
            var toggleBtn = document.querySelector(".form-floating i");
            toggleBtn.onclick = () => {
                if (pwdField.type == "password") {
                    pwdField.type = "text";
                    toggleBtn.classList.add("active");
                } else {
                    pwdField.type = "password";
                    toggleBtn.classList.remove("active");
                }
            }
        });
    </script>
</body>

</html>