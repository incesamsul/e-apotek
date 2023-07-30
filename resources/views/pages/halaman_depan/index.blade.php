<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/eventalk-master/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">E-apotek<span>.</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Faq</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Contact</a></li>
                    <li class="nav-item cta mr-md-2"><a href="{{ URL::to('/login') }}" class="nav-link">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-xl-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> E-Apotek
                        <br><span>APT. Wahid Farma</span>
                    </h1>
                    <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">E-apotek | Point
                        of sales | Inventory
                    </p>
                    <div id="timer">
                        <small class="text-sm">E-apotek, point of sales and inventory of apt wahid farma.</small>
                    </div>
                    <!-- <div id="timer" class="d-flex mb-3">
      <div class="time" id="days"></div>
      <div class="time pl-4" id="hours"></div>
      <div class="time pl-4" id="minutes"></div>
      <div class="time pl-4" id="seconds"></div>
      </div> -->
                </div>
                <div class="col-sm-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/login_img/med.svg') }}" alt="" width="400">
                </div>
            </div>
        </div>
    </div>






    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | made with <i class="icon-heart color-danger"
                            aria-hidden="true"></i> by Somebody
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('template/eventalk-master/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/aos.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('template/eventalk-master/js/google-map.js') }}"></script>
    <script src="{{ asset('template/eventalk-master/js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/3423f55a30.js" crossorigin="anonymous"></script>

</body>

</html>
