<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Villa&Resto</title>
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
    <!-- Font awesome CDN for icons-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <section class="login-block">
        <div class="container-fluid login-wrapper ">
            <div class="row login-row">
                <div class="col-md-4 login-sec ">
                    <h2>Villa & Resto</h2>
                    <p class="text-secondary"><small><strong>Langkah-langkah lupa password</strong></small></p>
                    <ul>
                        @mobile
                            <li><small>klik <a target="_blank"
                                        href="http://wa.me/+14155238886?text=join%20breathe-report">disini</a> lalu
                                    kirim
                                    pesan "join breathe-report"</small></li>
                        @endmobile
                        @desktop
                            <li><small>klik <a target="_blank"
                                        href="https://web.whatsapp.com/send/?phone=%2B14155238886&text=join+breathe-report">disini</a>
                                    lalu
                                    kirim
                                    pesan "join breathe-report"</small></li>
                        @enddesktop
                        <li><small>pastikan mendapat balasan seperti gambar <a target="_blank"
                                    href="{{ asset('img/help/wa_reset_pass.png') }}">lihat</a></small></li>
                        <li><small>setelah itu masukkan wa di form dibawah</small></li>
                        <li><small>anda akan mendapatkan link seperti <a
                                    href="{{ asset('img/help/wa_reset_pass2.png') }}" target="_blank"
                                    rel="noopener noreferrer">ini</a></small></li>
                        <li><small>buka link tersebut dan lakukan reset password</small></li>
                    </ul>
                    @if ($response)
                        @if ($response == 200)
                            <p class="m-0 mt-3 p-0 text-success">wa reset password telah dikirim ke wa anda, <span
                                    class="text-warning">Jika tidak masuk klik <a target="_blank"
                                        href="http://wa.me/+14155238886?text=join%20breathe-report">disini</a></span>
                            </p>
                        @elseif ($response == 500)
                            <p class="m-0 mt-3 p-0 text-danger">Terjadi kesalahan ...</p>
                        @else
                            <p></p>
                        @endif
                    @endif
                    @if (session('success'))
                        <p class="m-0 mt-3 p-0 text-success">{{ session('success') }}</p>
                    @endif
                    @if (session('error'))
                        <p class="m-0 mt-3 p-0 text-danger">{{ session('error') }}</p>
                    @endif
                    @if (session('fail'))
                        <p class="text-danger"><small>{{ session('fail') }}</small></p>
                    @endif
                    <form method="POST" action="{{ route('kirim-konfirmasi-wa') }}">
                        @csrf

                        <div class="form-group text-secondary">
                            <i class="fa fa-user" style="font-size: 12px"></i>
                            <label for="wa" class="text-uppercase "><strong>wa</strong></label>
                            <input name="wa" type="text" class="form-control border-0"
                                placeholder="Masukkan wa anda">

                        </div>
                        <a href="{{ URL::to('/login') }}" class="forgot"><u> Kembali ke halaman Login?</u></a>
                        <button type="submit" class="btn btn-block login-button main-radius">Kirim</button>
                    </form>
                    <div class="copy-text">Copyright © 2022 ♦ .</div>
                </div>
                <div class="col-md-8 banner-sec d-flex flex-column text-center">
                    <img src="{{ asset('img/login_img/login.png') }}" alt="" width="400">
                    <p class="text-secondary"><strong>Villa & Resto</strong></p>
                    <small class="px-5 text-secondary">Selamat datang di aplikasi pemantauan villa dan resto! Kami
                        senang Anda sudah bergabung bersama kami. Silakan login untuk melanjutkan.</small>
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
