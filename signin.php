<!doctype html>
<html lang="en" class="h-100">


<?php include("cmp/head.html") ?>

<body class="d-flex flex-column h-100">
    <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 bg-dark text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Cube</title><path d="M440.9 136.3a4 4 0 000-6.91L288.16 40.65a64.14 64.14 0 00-64.33 0L71.12 129.39a4 4 0 000 6.91L254 243.88a4 4 0 004.06 0zM54 163.51a4 4 0 00-6 3.49v173.89a48 48 0 0023.84 41.39L234 479.51a4 4 0 006-3.46V274.3a4 4 0 00-2-3.46zM272 275v201a4 4 0 006 3.46l162.15-97.23A48 48 0 00464 340.89V167a4 4 0 00-6-3.45l-184 108a4 4 0 00-2 3.45z"/></svg>
                    </div>
                    <h4>PixelQuest</h4>
                    <div class="loader-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header">
        <div class="row">
            <div class="col-auto px-0">
                <a href="/" class="btn menu-btn btn-link text-dark">
                    <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-24" viewBox='0 0 512 512'>
                        <title>ionicons-v5-a</title>
                        <polyline points='244 400 100 256 244 112' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
                        <line x1='120' y1='256' x2='412' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
                    </svg>
                </a>
            </div>
            <div class="text-left col">

            </div>
            <div class="ml-auto col-auto px-0">

            </div>
        </div>
    </header>

    <main class="flex-shrink-0">
        <div class="container text-center  mt-4">
            <div class="icon icon-100 bg-dark text-white mb-4 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Cube</title><path d="M440.9 136.3a4 4 0 000-6.91L288.16 40.65a64.14 64.14 0 00-64.33 0L71.12 129.39a4 4 0 000 6.91L254 243.88a4 4 0 004.06 0zM54 163.51a4 4 0 00-6 3.49v173.89a48 48 0 0023.84 41.39L234 479.51a4 4 0 006-3.46V274.3a4 4 0 00-2-3.46zM272 275v201a4 4 0 006 3.46l162.15-97.23A48 48 0 00464 340.89V167a4 4 0 00-6-3.45l-184 108a4 4 0 00-2 3.45z"/></svg>
            </div>
            <h4 class="mb-4">PixelQuest</h4>
        </div>
        <div class="container">
            <div class="login-box">
                <div class="form-group my-4 text-secondary feedbackCaption" style="color:red !important">
                </div>
                <div class="form-group floating-form-group">
                    <input id="user" type="email" class="form-control floating-input" value="">
                    <label class="floating-label">Email / nickname</label>
                </div>
                <div class="form-group floating-form-group">
                    <input id="passw" type="password" class="form-control floating-input"  autofocus>
                    <label class="floating-label">Password</label>
                </div>
                <div class="form-group my-4">
                    <a href="#" class="link">Forget password?</a>
                </div>
                <a href="#" class="btn btn-block btn-info btn-lg signinpbtn">Sign In</a>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a href="/signup" class="link">Create Account</a>
                </div>
            </div>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="vendor/swiper/js/swiper.min.js"></script>
    <script src="vendor/masonry/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/color-scheme-demo.js"></script>

    <script>
        "use strict"
        $(window).on('load', function() {
            var swiper = new Swiper('.swiper-container', {
                pagination: {
                    el: '.swiper-pagination',
                },
            });
        });
        $(".signinpbtn").on("click", function(e){
            e.preventDefault();
            var user = $("#user").val(),
                pass = $("#passw").val();
            if(user != "" && pass != ""){
                $.post("/API/AUT/login", {u: user, p: pass}).done(function(data){
                    $(".feedbackCaption").text(data.response);
                    setTimeout((data) => {
                        $(".feedbackCaption").text("");
                        if(data.success){
                            location.href = "/home"
                        }
                    }, 3000, data);
                })
            } else {
                $(".feedbackCaption").text("Preencha todos os campos");
                setTimeout(() => {
                    $(".feedbackCaption").text("");
                }, 5000);
            }
        })
    </script>
</body>
</html>
