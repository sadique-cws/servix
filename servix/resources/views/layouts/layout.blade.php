<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from servixc.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2023 09:46:29 GMT -->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service App</title>
    {{-- <link href="../unpkg.com/aos%402.3.1/dist/aos.css" rel="stylesheet">
    <script src="../unpkg.com/aos%402.3.1/dist/aos.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    {{-- <script src="../cdn.jsdelivr.net/npm/jquery%403.5.1/dist/jquery.slim.min.js"integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"crossorigin="anonymous"></script><script src="../kit.fontawesome.com/20cdb0d9fc.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="../cdn.jsdelivr.net/npm/bootstrap%404.6.2/dist/js/bootstrap.bundle.min.js" --}}
    {{-- integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" --}}
    {{-- crossorigin="anonymous"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/lottie.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


</head>

<body>
    <div class="main_background fixed-top py-1">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand" href="#">
                    <img src="Assets/logo-black.png" class="img-logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav justify-content-end float ms-auto d-flex gap-2">
                        <li class=" pt-2 float-right ">
                            <button type="button" class="btn" style="">
                                <a class="nav_link btn-block" href="">Contact</a>
                            </button>
                        </li>
                        <li class=" pt-2 float-right ">
                            <button type="button" class="btn" style="">
                                <a class="nav_link " href="{{ route('track.status') }}">Track Status</a>
                            </button>
                        </li>
                        <li class=" pt-2 float-right ">
                            <button class="btn btn-block " style="background-color: #e87605;">
                                <a class="nav_link text-white" href="{{ route('request.form') }}">Request form</a>
                            </button>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>
    </div>



   

    @section('contents')
            <!-- Don't write code here \\ -->
    @show


    <!-- Page Contents -->


    <!-- Footer Section -->
    @section('footer')
        <div class="background-footer">
            <div class="container pt-5 pb-2">
                <div class="row justify-content-center pt-3 all_text-center">
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="pl-0">
                            <a href="#" class="nav-link p-0"><img src="Assets/logo-black.png" class="img-logo"
                                    alt="logo"></a>
                        </div>
                        <ul class="navbar-nav pt-3">
                            <li class="nav-item py-1"><a href="#" class="nav-lnk footer--art">Warranty Policy</a></li>
                            <li class="nav-item py-1"><a href="#" class="nav-lnk footer--art">Terms & Conditions</a>
                            </li>
                            <li class="nav-item py-1"><a href="#" class="nav-lnk footer--art">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="font-size:31px; color: #000;"><b>+91 6207488382</b></li>
                            <li class="nav-item"><a href="#" class="nav-link "><b
                                        class="footer--art">Help@digitalservices.com</b></a>
                            </li>
                            <li class="nav-item footer--art1">R.P.C High Scool, Naka Chowk Road Purnia City
                                Purnia 854301 Bihar</li>
                            <div class="d-flex ml-0 pt-3 social_media_data">
                                <a href="#" class=" mx-3"><i class="fa-brands fa-facebook-f balagi-media"></i></a>
                                <a href="#" class="mx-3"><i class="fa-brands fa-instagram balagi-media1"></i></a>
                                <a href="#" class="mx-3"><i class="fa-brands fa-twitter balagi-media2"></i></a>
                                <a href="#" class="mx-3"><i class="fa-brands fa-youtube balagi-media3"></i></a>
                            </div>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4396.685617846691!2d87.51066725826163!3d25.80666475613152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eff8423776e975%3A0xe5d31a1d855095c0!2sEVOLUTION%20OFFICE!5e0!3m2!1sen!2sin!4v1676654884083!5m2!1sen!2sin"
                                height="170" style="border:0; box-shadow: 7px 11px 9px #12111178;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-0" style="color: #5e5b5b !important;">
        <div class="background-footer pt-0">
            <div class="container py-2">
                <p class="text-center pb-2 pt-3 m-0" style="font-size:17px; color: #000;">Copyright ©<span
                        id="aftab"></span> All
                    rights reserved.</p>
            </div>
        </div>

    @show

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
