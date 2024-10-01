<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('Assets/faviconn.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/lottie.js') }}"></script>
</head>

<body>
    <div class="main_background fixed-top py-1">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h1 class="fw-bold text-dark">NovaFix</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto gap-2">
                        <li class="pt-2">
                            <a class="nav_link btn" href="{{ route('home.contact') }}">Contact</a>
                        </li>
                        <li class="pt-2">
                            <a class="nav_link btn" href="{{ route('home.learn') }}">Learn</a>
                        </li>
                        <li class="pt-2">
                            <a class="nav_link btn" href="{{ route('track.status') }}">Track-Status</a>
                        </li>
                        <li class=" pt-2 float-right ">
                            <button class="btn btn-block " style="background-color: #e87605;">
                                <a class="nav_link text-white" href="{{ route('request.form') }}">Request For Repair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @section('contents')
        <!-- Don't write code here ! Also Don't remove space for commit credit 😀 -->
    @show

    <!-- Footer Section -->
    @section('footer')
        <div class="background-footer">
            <div class="container pt-5 pb-2">
                <div class="row justify-content-center pt-3 all_text-center">
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="pl-0">
                            <a href="#" class="nav-link p-0">
                                <h1 class="fw-bold text-dark">NovaFix</h1>
                            </a>
                        </div>
                        <ul class="navbar-nav pt-3">
                            <li class="nav-item py-1"><a href="{{ route('home.warranty') }}"
                                    class="nav-lnk footer--art">Warranty Policy</a></li>
                            <li class="nav-item py-1"><a href="{{ route('home.termsAndCondition') }}"
                                    class="nav-lnk footer--art">Terms & Conditions</a></li>
                            <li class="nav-item py-1"><a href="{{ route('home.privacyPolicy') }}"
                                    class="nav-lnk footer--art">Privacy Policy</a></li>
                            <li class="nav-item py-1"><a href="{{ route('home.ourTeam') }}" class="nav-lnk footer--art">Our
                                    Team</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="font-size:31px; color: #000;"><b>+91 7856802002</b></li>
                            <li class="nav-item"><a href="#" class="nav-link "><b
                                        class="footer--art">novafixteam@gmail.com</b></a></li>
                            <li class="nav-item footer--art1">Zila School Road, Near BSNL tower, Purnea (Bihar) - 854301
                            </li>
                            <div class="d-flex ml-0 pt-3 social_media_data">
                                <a href="#" class="mx-3"><i class="fa-brands fa-facebook-f balagi-media"></i></a>
                                <a href="#" class="mx-3"><i class="fa-brands fa-instagram balagi-media1"></i></a>
                                <a href="#" class="mx-3"><i class="fa-brands fa-twitter balagi-media2"></i></a>
                                <a href="#" class="mx-3"><i class="fa-brands fa-youtube balagi-media3"></i></a>
                            </div>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14371.57498641261!2d87.4794637!3d25.7740729!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eff97483b0bacd%3A0x2b53bef0d8594e2d!2sBalaji%20Laptop%20Service!5e0!3m2!1sen!2sin!4v1682415521793!5m2!1sen!2sin"
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
                        id="aftab"></span> All rights reserved.</p>
            </div>
        </div>
    @show

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        let msg = '{{ Session::get('btn') }}';
        let exist = '{{ Session::has('btn') }}';
        if (exist) {
            alert(msg);
        }
    </script>
</body>

</html>
