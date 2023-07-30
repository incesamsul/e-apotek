<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pos</title>
    <!-- Bootstrap CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="/favicon.png" />
    <link rel="icon" type="image/png" href="https://example.com/favicon.png" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <!-- OwlCarousel CDN for image slider-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

</head>

<body>
    <section class="login-block">
        <div class="container-fluid login-wrapper ">
            <div class="row login-row">
                <div class="col-md-4 login-sec ">
                    <h2>Pos</h2>
                    <p class="text-secondary"><small>Daftar dengan google atau masukkan data anda</small></p>
                    @if (session('fail'))
                        <p class="text-danger"><small>{{ session('fail') }}</small></p>
                    @endif
                    @if (session('success'))
                        <p class="m-0 mt-3 p-0 text-success">{{ session('success') }}</p>
                    @endif
                    <div class="socialite-wrapper mb-3">
                        <button type="submit" class="btn form-control btn-socialite main-radius">
                            <i class="google-color fa-brands fa-google"></i>
                            <strong>Daftar Dengan Google</strong>
                        </button>
                    </div>

                    <div class="text-center my-3">
                        <div class="or or--x" aria-role="presentation">Atau</div>
                    </div>
                    <form action="{{ URL::to('/postlogin') }}" method="post">
                        @csrf
                        <div class="form-group text-secondary">
                            <i class="fa fa-user" style="font-size: 12px"></i>
                            <label for="nama" class="text-uppercase "><strong>Nama</strong></label>
                            <input name="nama" type="text" class="form-control border-0"
                                placeholder="Masukkan nama anda">

                        </div>
                        <div class="form-group text-secondary">
                            <i class="fa fa-user" style="font-size: 12px"></i>
                            <label for="email" class="text-uppercase "><strong>Email</strong></label>
                            <input name="email" type="text" class="form-control border-0"
                                placeholder="Masukkan email anda">

                        </div>
                        <div class="form-group text-secondary">
                            <i class="fa fa-key" style="font-size: 12px"></i>
                            <label for="text" class="text-uppercase"><strong>Nama usaha</strong></label>
                            <input name="text" type="text" class="form-control border-0" placeholder="Nama usaha">
                        </div>
                        <div class="form-group text-secondary">
                            <i class="fa fa-key" style="font-size: 12px"></i>
                            <label for="text" class="text-uppercase"><strong>Nomor telepon</strong></label>
                            <input name="text" type="text" class="form-control border-0"
                                placeholder="Nomor telepon">
                        </div>
                        <div class="form-group text-secondary">
                            <i class="fa fa-key" style="font-size: 12px"></i>
                            <label for="password" class="text-uppercase"><strong>Password</strong></label>
                            <input name="password" type="password" class="form-control border-0"
                                placeholder="Masukkan password anda">
                        </div>
                        <a href="{{ URL::to('/lupa-kata-sandi') }}" class="forgot"><u> Forgot Your Password?</u></a>
                        <button type="submit" class="btn btn-block login-button main-radius">Login</button>
                    </form>
                </div>
                <div class="col-md-8 banner-sec d-flex flex-column text-center">
                    <img src="{{ asset('img/login_img/retail.png') }}" alt="" width="500">
                    <p class="text-secondary"><strong>Pos</strong></p>
                    <small class="pb-5 text-secondary">Kami hadir untuk menemani anda menjual, ayo gunakan pos, hanya
                        tinggal satu klik sat set sot set your head.</small>
                </div>
            </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
    {{-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> --}}
    <script src="https://kit.fontawesome.com/3423f55a30.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            // $('.owl-carousel').owlCarousel({
            //     loop: true
            //     , autoplay: true
            //     , autoplayTimeout: 5000
            //     , autoplayHoverPause: true
            //     , items: 1
            //     , animateOut: 'fadeOut'
            //     , animateIn: 'fadeOut',
            // });

            // function getPageWidth(){
            //     let lebarHalaman = $(window).width();
            //     if(lebarHalaman <= 1100){
            //         $('.banner-sec').remove();
            //     }
            // };

            // $(window).resize(getPageWidth);

        });
    </script>
</body>

</html>
