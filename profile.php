<!doctype html>
<html lang="en" class="h-100">
<?php include("cmp/head.html") ?>

<body class="d-flex flex-column h-100 menu-overlay">
    <?php include("cmp/leftmenu.html") ?>
    <main class="flex-shrink-0">
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <a href="/home" class="btn btn-link text-dark">
                        <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-24" viewBox='0 0 512 512'>
                            <title>ionicons-v5-a</title>
                            <polyline points='244 400 100 256 244 112' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
                            <line x1='120' y1='256' x2='412' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
                        </svg>
                    </a>
                </div>
                <div class="text-left col align-self-center">
                    <h5>My Profile</h5>
                </div>
                <div class="ml-auto col-auto align-self-center">

                </div>
            </div>
        </header>

        <div class="container mt-4 text-center">
            <div class="icon icon-100 position-relative">
                <figure class="background">
                    <img src="img/user-1.jpg" alt="">
                </figure>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row mt-">
                <div class="col-12 col-md-6">
                    <div class="form-group floating-form-group active">
                        <p class="form-text">...</p>
                        <label class="floating-label">Name</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group floating-form-group active">
                        <p class="form-text">...</p>
                        <label class="floating-label">Email Address</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group floating-form-group active">
                        <div class="row">
                            <div class="col-auto">
                                <p class="form-text">+55</p>
                            </div>
                            <div class="col">
                                <p class="form-text">000 000 0000 0000</p>
                            </div>
                        </div>
                        <label class="floating-label">Phone Number</label>
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group floating-form-group active">
                        <p class="form-text">27/11/99</p>
                        <label class="floating-label">Birthdate</label>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include("cmp/footer.html") ?>

    <button type="button" class="btn btn-info colorsettings" style="color: #262626;">
        <ion-icon name="add-circle" style="height: 100%;width: 100%;"></ion-icon>
    </button>

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
    </script>
</body>
</html>
