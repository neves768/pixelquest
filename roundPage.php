<!doctype html>
<html lang="en" class="h-100">

<?php include("cmp/head.php") ?>

<body class="body-scroll d-flex flex-column h-100 menu-overlay">
    <?php include("cmp/leftmenu.html") ?>

    <main class="flex-shrink-0" id="gameMain">
        <?php include("cmp/top.html") ?>

        <div>
            <img :src="image" alt="" style="width: 100%">
        </div>
        <!-- page content start -->
        <div class="container" style="top: -10px;position: relative;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p>{{game.name}}</p>
                        </div>
                        <div class="col-auto">
                            <p class="small text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-16" viewBox="0 0 512 512">
                                    <title>ionicons-v5-l</title>
                                    <rect x="32" y="80" width="448" height="256" rx="16" ry="16" transform="translate(512 416) rotate(180)" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect>
                                    <line x1="64" y1="384" x2="448" y2="384" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                    <line x1="96" y1="432" x2="416" y2="432" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line>
                                    <circle cx="256" cy="208" r="80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></circle>
                                    <path d="M480,160a80,80,0,0,1-80-80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                    <path d="M32,160a80,80,0,0,0,80-80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                    <path d="M480,256a80,80,0,0,0-80,80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                    <path d="M32,256a80,80,0,0,1,80,80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                </svg>
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="small vm">
                                <span class=" text-secondary">5</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-size-12 vm" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path fill="#FFD500" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                </svg>
                                <span class=" text-secondary">| Publisher: {{game.owner}}</span>
                            </p>
                        </div>
                        <div class="col-auto">
                            <p class="small text-secondary">{{game.listingType == 0 ? 'Privado' : (game.listingType == 1 ? 'Não listado' : "Público") }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top border-color">
                    <div class="row">
                        
                    </div>
                </div>
                <div class="card-body border-top border-color">
                    <h6>Description</h6>
                    <div class="text-secondary">
                        <p class="mb-1">{{game.description}}</p>
                    </div>                    
                    <a href="#" class="mt-4 btn btn-info btn-block btn-lg">Guess</a>
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
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/color-scheme-demo.js"></script>


    <script>
        "use strict"
        $(window).on('load', function() {

        });

        const homeVue = new Vue({
            name: 'gameMain',
            el: '#gameMain',
            data: {
                game: {},
                currentRound: {},
                image: "",
                selectedCateg: "1",
            },
            methods: {
                loadRound: function(gameID, round){
                    var _e = this
                    fetch("API/GAM/round?id="+<?=$_GET['id'] ?? -1?>+"&round=1",{
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
                            _e.currentRound = json.response
                        } else {
                            if(json.response.includes("Not auth")){
                                location.href = "login"
                            }
                        }
                    });
                    _e.image = 'API/GAM/image?id=<?=$_GET['id'] ?? -1?>&round=1'
                }
            },
            created() {
                var _e = this
                fetch("API/GAM/gameDt?id="+<?=$_GET['id'] ?? -1?>,{
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
                        _e.game = json.response
                    } else {
                        if(json.response.includes("Not auth")){
                            location.href = "login"
                        }
                    }
                    $("#mygames").prop("checked", true);
                });
                _e.loadRound('<?=$_GET['id'] ?? -1?>', '0')
            }
        })
    </script>
</body>
</html>
