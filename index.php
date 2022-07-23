<!doctype html>
<html lang="en" class="h-100">
<?php include("cmp/head.php") ?>

<body class="d-flex flex-column h-100">
    <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 bg-dark text-white mb-4">
                        <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-48" viewBox='0 0 512 512'>
                            <title>ionicons-v5-i</title>
                            <path d='M80,212V448a16,16,0,0,0,16,16h96V328a24,24,0,0,1,24-24h80a24,24,0,0,1,24,24V464h96a16,16,0,0,0,16-16V212' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                            <path d='M480,256,266.89,52c-5-5.28-16.69-5.34-21.78,0L32,256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                            <polyline points='400 179 400 64 352 64 352 133' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                        </svg>
                    </div>
                    <h4 style="color:white">PixelQuest</h4>
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

            </div>
            <div class="text-left col">

            </div>
            <div class="ml-auto col-auto px-0">
                <a href="home" class="btn btn-link text-secondary">Skip</a>
            </div>
        </div>
    </header>

    <main class="flex-shrink-0">
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center pb-3">
                        <div class="image-circle">
                            <figure class="background">
                                <img src="assets/img/game/brtm.png" alt="">
                            </figure>
                            <div class="icon icon-100 bg-dark text-white">
                                <svg style="width:70%" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Game Controller</title><path d="M467.51 248.83c-18.4-83.18-45.69-136.24-89.43-149.17A91.5 91.5 0 00352 96c-26.89 0-48.11 16-96 16s-69.15-16-96-16a99.09 99.09 0 00-27.2 3.66C89 112.59 61.94 165.7 43.33 248.83c-19 84.91-15.56 152 21.58 164.88 26 9 49.25-9.61 71.27-37 25-31.2 55.79-40.8 119.82-40.8s93.62 9.6 118.66 40.8c22 27.41 46.11 45.79 71.42 37.16 41.02-14.01 40.44-79.13 21.43-165.04z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><circle cx="292" cy="224" r="20"/><path d="M336 288a20 20 0 1120-19.95A20 20 0 01336 288z"/><circle cx="336" cy="180" r="20"/><circle cx="380" cy="224" r="20"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M160 176v96M208 224h-96"/></svg>
                            </div>
                        </div>
                        <h4 class="mt-0 mb-3">Variety of games</h4>
                        <div class="row mb-3">
                            <div class="col-10 mx-auto">
                                <p class="small-font text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide text-center pb-3">
                        <div class="image-circle">
                            <figure class="background">
                                <img src="assets/img/game/euplayers.png" alt="">
                            </figure>
                            <div class="icon icon-100 bg-dark text-white">
                                <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-48" viewBox='0 0 512 512'>
                                    <title>ionicons-v5-i</title>
                                    <path d='M80,212V448a16,16,0,0,0,16,16h96V328a24,24,0,0,1,24-24h80a24,24,0,0,1,24,24V464h96a16,16,0,0,0,16-16V212' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                    <path d='M480,256,266.89,52c-5-5.28-16.69-5.34-21.78,0L32,256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                    <polyline points='400 179 400 64 352 64 352 133' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                </svg>
                            </div>
                        </div>
                        <h4 class="mt-0 mb-3">Pixel game</h4>
                        <div class="row mb-3">
                            <div class="col-10 mx-auto">
                                <p class="small-font text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="login" class="btn btn-block btn-info btn-lg">Sign In</a>
                </div>
                <div class="col">
                    <a href="signup" class="btn btn-block btn-danger btn-lg">Sign Up</a>
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
    </script>
</body>
</html>
