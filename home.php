<!doctype html>
<html lang="en" class="h-100">

<?php include("cmp/head.html") ?>

<body class="body-scroll d-flex flex-column h-100 menu-overlay">

    <?php include("cmp/leftmenu.html")?>
    <main class="flex-shrink-0" id="homeListing">
        <?php include("cmp/top.html")?>


        <!--<div class="container mt-4">
            <div class="form-group mb-0">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control search" placeholder="Search Property">
                    </div>
                    <div class="col-auto pl-0">
                        <button class="sqaure-btn btn btn-info text-white filter-btn" type="button">
                            <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-24" viewBox='0 0 512 512'>
                                <title>ionicons-v5-i</title>
                                <line x1='368' y1='128' x2='448' y2='128' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='64' y1='128' x2='304' y2='128' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='368' y1='384' x2='448' y2='384' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='64' y1='384' x2='304' y2='384' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='208' y1='256' x2='448' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <line x1='64' y1='256' x2='144' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <circle cx='336' cy='128' r='32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <circle cx='176' cy='256' r='32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                <circle cx='336' cy='384' r='32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>-->

        

        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-dark my-1">
                                <ion-icon name="grid"></ion-icon>
                                <span class="vm ml-2">Categories</span>
                            </h6>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="col-4 col-sm-3 col-md-2 col-lg-2 px-2 mt-3 mt-md-0">
                            <input type="radio" name="itemtype" class="checkbox-boxed" id="mygames" @click="openCat(0)">
                            <label class="checkbox-lable" for="mygames">
                                <span class="image-boxed">
                                    <span class="h-180 background">
                                        <img src="assets/img/listings/image-4.jpg" alt="">
                                    </span>
                                </span>
                                <span class="p">My Games</span>
                            </label>
                        </div>
                        <div v-for="cat in categories" class="col-4 col-sm-3 col-md-2 col-lg-2 px-2">
                            <input type="radio" name="itemtype" class="checkbox-boxed" :id="'cat'+cat.name" @click="openCat(cat.ID)">
                            <label class="checkbox-lable" :for="'cat'+cat.name">
                                <span class="image-boxed">
                                    <span class="h-180 background">
                                        <img :src="cat.icon" alt="">
                                    </span>
                                </span>
                                <span class="p">{{cat.name}}</span>
                            </label>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-dark my-1">
                                <ion-icon name="trending-up"></ion-icon>
                                <span class="vm ml-2">Trending</span>
                            </h6>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-0 mt-2">
            <div class="swiper-container swiper-products">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" v-for="game in games">
                        <div class="card product-card-large">
                            <div class="offers">
                                <p class="mb-0 font-weight-medium">Jogue</p>
                                <p class="mb-0 font-weight-medium">Agora</p>
                                <!--<p class="small ">Agora</p>-->
                            </div>
                            <div class="card-body p-0">
                                <div class="product-image-large">
                                    <div class="">
                                        <img :src="game.icon" alt="" style="width:100%;">
                                    </div>
                                    <div class="tag-images-count text-white bg-dark">
                                        <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-16 vm" viewBox='0 0 512 512'>
                                            <title>ionicons-v5-e</title>
                                            <path d='M432,112V96a48.14,48.14,0,0,0-48-48H64A48.14,48.14,0,0,0,16,96V352a48.14,48.14,0,0,0,48,48H80' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px' />
                                            <rect x='96' y='128' width='400' height='336' rx='45.99' ry='45.99' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px' />
                                            <ellipse cx='372.92' cy='219.64' rx='30.77' ry='30.55' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px' />
                                            <path d='M342.15,372.17,255,285.78a30.93,30.93,0,0,0-42.18-1.21L96,387.64' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <path d='M265.23,464,383.82,346.27a31,31,0,0,1,41.46-1.87L496,402.91' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        </svg>
                                        <span class="vm">{{game.rounds}}</span>
                                    </div>
                                    <button class="small-btn btn btn-danger text-white">
                                        <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-16 vm" viewBox='0 0 512 512'>
                                            <title>ionicons-v5-f</title>
                                            <path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <a :href="'/game?id='+game.ID" class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-dark">{{game.name}}</p>
                                    </div>
                                    <div class="col-auto">
                                        <p class="small text-secondary">
                                            <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-16" viewBox='0 0 512 512'>
                                                <title>ionicons-v5-l</title>
                                                <rect x='32' y='80' width='448' height='256' rx='16' ry='16' transform='translate(512 416) rotate(180)' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px' />
                                                <line x1='64' y1='384' x2='448' y2='384' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                <line x1='96' y1='432' x2='416' y2='432' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                <circle cx='256' cy='208' r='80' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                <path d='M480,160a80,80,0,0,1-80-80' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                <path d='M32,160a80,80,0,0,0,80-80' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                <path d='M480,256a80,80,0,0,0-80,80' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                <path d='M32,256a80,80,0,0,1,80,80' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            </svg>
                                        </p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="small vm">
                                            <span class=" text-secondary">5</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-12 vm" viewBox="0 0 24 24">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path fill="#FFD500" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" /></svg>
                                            <span class=" text-secondary">| {{game.owner}}</span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <p class="small text-secondary">{{game.listingType == 0 ? 'Privado' : (game.listingType == 1 ? 'Não listado' : "Público") }}</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer border-top border-color">
                                <div class="row">
                                    <div class="col-auto text-dark text-center">
                                        <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-24" viewBox='0 0 512 512'>
                                            <title>ionicons-v5-h</title>
                                            <path d='M469.71,234.6c-7.33-9.73-34.56-16.43-46.08-33.94s-20.95-55.43-50.27-70S288,112,256,112s-88,4-117.36,18.63-38.75,52.52-50.27,70S49.62,224.87,42.29,234.6,29.8,305.84,32.94,336s9,48,9,48h86c14.08,0,18.66-5.29,47.46-8C207,373,238,372,256,372s50,1,81.58,4c28.8,2.73,33.53,8,47.46,8h85s5.86-17.84,9-48S477,244.33,469.71,234.6Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <rect x='400' y='384' width='56' height='16' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <rect x='56' y='384' width='56' height='16' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <path d='M364.47,309.16c-5.91-6.83-25.17-12.53-50.67-16.35S279,288,256.2,288s-33.17,1.64-57.61,4.81-42.79,8.81-50.66,16.35C136.12,320.6,153.42,333.44,167,335c13.16,1.5,39.47.95,89.31.95s76.15.55,89.31-.95C359.18,333.35,375.24,321.4,364.47,309.16Z' />
                                            <path d='M431.57,243.05a3.23,3.23,0,0,0-3.1-3c-11.81-.42-23.8.42-45.07,6.69a93.88,93.88,0,0,0-30.08,15.06c-2.28,1.78-1.47,6.59,1.39,7.1A455.32,455.32,0,0,0,407.53,272c10.59,0,21.52-3,23.55-12.44A52.41,52.41,0,0,0,431.57,243.05Z' />
                                            <path d='M80.43,243.05a3.23,3.23,0,0,1,3.1-3c11.81-.42,23.8.42,45.07,6.69a93.88,93.88,0,0,1,30.08,15.06c2.28,1.78,1.47,6.59-1.39,7.1A455.32,455.32,0,0,1,104.47,272c-10.59,0-21.52-3-23.55-12.44A52.41,52.41,0,0,1,80.43,243.05Z' />
                                            <line x1='432' y1='192' x2='448' y2='192' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <line x1='64' y1='192' x2='80' y2='192' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <path d='M78,211s46.35-12,178-12,178,12,178,12' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        </svg>
                                        <p class="small"><small>Cars</small></p>
                                    </div>
                                    <div class="col-auto text-dark text-center pl-0">
                                        <svg xmlns='http://www.w3.org/2000/svg' class="icon-size-24" viewBox='0 0 512 512'>
                                            <title>ionicons-v5-n</title>
                                            <circle cx='256' cy='256' r='192' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px' />
                                            <polygon points='256 175.15 179.91 238.98 200 320 256 320 312 320 332.09 238.98 256 175.15' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <polyline points='332.09 238.98 384.96 216.58 410.74 143.32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <line x1='447' y1='269.97' x2='384.96' y2='216.58' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <polyline points='179.91 238.98 127.04 216.58 101.26 143.32' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <line x1='65' y1='269.97' x2='127.04' y2='216.58' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <polyline points='256 175.15 256 117.58 320 74.94' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <line x1='192' y1='74.93' x2='256' y2='117.58' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <polyline points='312 320 340 368 312 439' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <line x1='410.74' y1='368' x2='342' y2='368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <polyline points='200 320 172 368 200.37 439.5' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                            <line x1='101.63' y1='368' x2='172' y2='368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                        </svg>
                                        <p class="small"><small>Sports</small></p>
                                    </div>
                                    <div class="col-auto ml-auto">
                                        <p class="small text-secondary">
                                            
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-dark my-1">
                                <ion-icon name="cube"></ion-icon>
                                <span class="vm ml-2">More content</span>
                            </h6>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6" v-for="game in games">
                    <div class="card product-card-small mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="product-image-small">
                                        <div class="background" :style="'background-image: url('+game.icon+');'">
                                            <img :src="game.icon" alt="" style="display: none;">
                                        </div>
                                        <div class="tag-images-count text-white bg-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16 vm" viewBox="0 0 512 512">
                                                <title>ionicons-v5-e</title>
                                                <path d="M432,112V96a48.14,48.14,0,0,0-48-48H64A48.14,48.14,0,0,0,16,96V352a48.14,48.14,0,0,0,48,48H80" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></path>
                                                <rect x="96" y="128" width="400" height="336" rx="45.99" ry="45.99" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect>
                                                <ellipse cx="372.92" cy="219.64" rx="30.77" ry="30.55" style="fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px"></ellipse>
                                                <path d="M342.15,372.17,255,285.78a30.93,30.93,0,0,0-42.18-1.21L96,387.64" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                                <path d="M265.23,464,383.82,346.27a31,31,0,0,1,41.46-1.87L496,402.91" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                            </svg>
                                            <span class="vm">{{game.rounds}}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col pl-0">
                                    <div class="row">
                                        <div class="col">
                                            <p class="small"><a :href="'/game?id='+game.ID" class="text-dark">{{game.name}}</a> </p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="small vm">
                                                <span class=" text-secondary">5</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-12 vm" viewBox="0 0 24 24">
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path fill="#FFD500" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <p class="small vm">
                                                <span class="text-secondary">{{game.description}}</span>
                                            </p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="small text-secondary"><small>{{game.listingType == 0 ? 'Privado' : (game.listingType == 1 ? 'Não listado' : "Público") }}</small></p>
                                        </div>
                                    </div>
                                    <hr class="border-top border-color my-2">
                                    <div class="row no-gutters">
                                        <p class="small vm">
                                            <span class="text-secondary">Feito por: {{game.owner}}</span>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto text-dark text-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16" viewBox="0 0 512 512">
                                                <title>ionicons-v5-h</title>
                                                <path d="M469.71,234.6c-7.33-9.73-34.56-16.43-46.08-33.94s-20.95-55.43-50.27-70S288,112,256,112s-88,4-117.36,18.63-38.75,52.52-50.27,70S49.62,224.87,42.29,234.6,29.8,305.84,32.94,336s9,48,9,48h86c14.08,0,18.66-5.29,47.46-8C207,373,238,372,256,372s50,1,81.58,4c28.8,2.73,33.53,8,47.46,8h85s5.86-17.84,9-48S477,244.33,469.71,234.6Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                                <rect x="400" y="384" width="56" height="16" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></rect>
                                                <rect x="56" y="384" width="56" height="16" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></rect>
                                                <path d="M364.47,309.16c-5.91-6.83-25.17-12.53-50.67-16.35S279,288,256.2,288s-33.17,1.64-57.61,4.81-42.79,8.81-50.66,16.35C136.12,320.6,153.42,333.44,167,335c13.16,1.5,39.47.95,89.31.95s76.15.55,89.31-.95C359.18,333.35,375.24,321.4,364.47,309.16Z"></path>
                                                <path d="M431.57,243.05a3.23,3.23,0,0,0-3.1-3c-11.81-.42-23.8.42-45.07,6.69a93.88,93.88,0,0,0-30.08,15.06c-2.28,1.78-1.47,6.59,1.39,7.1A455.32,455.32,0,0,0,407.53,272c10.59,0,21.52-3,23.55-12.44A52.41,52.41,0,0,0,431.57,243.05Z"></path>
                                                <path d="M80.43,243.05a3.23,3.23,0,0,1,3.1-3c11.81-.42,23.8.42,45.07,6.69a93.88,93.88,0,0,1,30.08,15.06c2.28,1.78,1.47,6.59-1.39,7.1A455.32,455.32,0,0,1,104.47,272c-10.59,0-21.52-3-23.55-12.44A52.41,52.41,0,0,1,80.43,243.05Z"></path>
                                                <line x1="432" y1="192" x2="448" y2="192" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                                <line x1="64" y1="192" x2="80" y2="192" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                                <path d="M78,211s46.35-12,178-12,178,12,178,12" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                            </svg>
                                        </div>
                                        <div class="col-auto text-dark text-center pl-0 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16" viewBox="0 0 512 512">
                                                <title>ionicons-v5-n</title>
                                                <circle cx="256" cy="256" r="192" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></circle>
                                                <polygon points="256 175.15 179.91 238.98 200 320 256 320 312 320 332.09 238.98 256 175.15" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polygon>
                                                <polyline points="332.09 238.98 384.96 216.58 410.74 143.32" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                                                <line x1="447" y1="269.97" x2="384.96" y2="216.58" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                                <polyline points="179.91 238.98 127.04 216.58 101.26 143.32" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                                                <line x1="65" y1="269.97" x2="127.04" y2="216.58" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                                <polyline points="256 175.15 256 117.58 320 74.94" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                                                <line x1="192" y1="74.93" x2="256" y2="117.58" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                                <polyline points="312 320 340 368 312 439" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                                                <line x1="410.74" y1="368" x2="342" y2="368" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                                <polyline points="200 320 172 368 200.37 439.5" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                                                <line x1="101.63" y1="368" x2="172" y2="368" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                            </svg>
                                        </div>
                                        
                                        <div class="col-auto ml-auto ">
                                            <button class="btn btn-link text-danger p-0 vm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16 vm" viewBox="0 0 512 512">
                                                    <title>ionicons-v5-f</title>
                                                    <path d="M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                                </svg>
                                            </button>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- PWA add to home display -->
        <div class="container mt-2">
            <div class="card" id="addtodevice">               
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto align-self-center">
                            <img src="img/favicon72.png" class="rounded mr-2 " alt="...">
                        </div>
                        <div class="col text-secondary pl-0">
                            <h6 class="text-dark">Add to <span class="font-weight-bold">Home screen</span></h6>
                            <p class=" text-secondary">See PWA app as in fullscreen on your device.</p>
                            <button class="btn btn-sm btn-primary px-4" id="addtohome">Install</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PWA add to home display -->
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
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/color-scheme-demo.js"></script>
    <script src="js/pwa-services.js"></script>

    <script>
        "use strict"
        $(window).on('load', function() {


            /* carousel */
            var swiper = new Swiper('.swiper-products', {
                slidesPerView: 'auto',
                spaceBetween: 0,
                pagination: 'false'
            });
            
        });
        
        const homeVue = new Vue({
            name: 'homeListing',
            el: '#homeListing',
            data: {
                categories: [],
                trending: [],
                games: [],
                selectedCateg: "1",
            },
            methods: {
                openCat: function(cat){
                    var _e = this
                    fetch("/API/LIST/games?cat="+cat,{
                        headers : { 
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        cache: "reload"
                    })
                    .then(function(response){
                        return response.json();
                    })
                    .then(function(json) {
                        if(json.success){
                            _e.games = json.response
                            _e.selectedCateg = cat
                        }
                    });
                }
            },
            created() {
                var _e = this
                fetch("/API/LIST/categories",{
                    headers : { 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    cache: "reload"
                })
                .then(function(response){
                    return response.json();
                })
                .then(function(json) {
                    if(json.success){
                        _e.categories = json.response
                    } else {
                        if(json.response.includes("Not auth")){
                            location.href = "/login"
                        }
                    }
                    $("#mygames").prop("checked", true);
                });
                _e.openCat(0)
            }
        })


    </script>
</body>
</html>
