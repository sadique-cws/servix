<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('Assets/faviconn.png') }}" type="image/x-icon">
    <title>@yield('title') {{ env('APP_NAME') }} - Contact us</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="main_background fixed-top py-1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h1 class="fw-bold text-dark">NovaFix</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
    


    {{-- @section('title')
        Contact Us |
    @endsection --}}

    <div class="container px-5" style="margin-top: 200px">
        <div class="row justify-content-center px-auto">
            <div class="col-lg-6 col-md-9 col-12">
                <h1 class="look_ing my-0 pl-5 font-semibold">We'd love to hear <br> from you</h1>
                <h4 class="train_ing pt-2 pl-5 text-[28px] text-gray-800">You have any question, comments or feedback
                    please don't hesitate to get
                    in touch with us.</h4>
            </div>
        </div>
        <div class="container" style="margin-top: 150px;">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="row justify-content-center">
                        <div
                            class="col-md-6 col-12 mb-3 hover:scale-110 overflow-hidden hover:-translate-x-[10px] hover:-translate-y-[5px] transition-all duration-500 ease-in-out">
                            <div class="card card_contact px-4 py-3">
                                <h3 class="my-0 lg:text-[30px] text-[25px] tracking-wide"><b>Services</b></h3>
                                <h4 class="my-0">Ask Query</h4>
                                {{-- <div class="d-flex pt-5">
                                    <img src="Assets/Whatsapp.svg" class="img_whats" alt="logo">
                                    <h5 class="pt-2 pl-2"><b>+91 7480897732</b></h5>
                                </div> --}}
                                <div class="d-flex">
                                    <img src="Assets/call.svg" class="img_whats" alt="logo">
                                    <h5 class="pt-2 pl-2"><b>+91 7856802002</b></h5>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-md-6 col-12 mb-3 hover:scale-110 overflow-hidden hover:translate-x-[10px] hover:-translate-y-[5px] transition-all duration-500 ease-in-out">
                            <div class="card card_contact1 p-3">
                                <h3 class="my-0 lg:text-[30px] text-[25px] tracking-wide"><b>Training</b></h3>
                                <h4 class="my-0">Ask Query</h4>
                                {{-- <div class="d-flex pt-5">
                                    <img src="Assets/Whatsapp.svg" class="img_whats" alt="logo">
                                    <h5 class="pt-2 pl-2"><b>+91 7856802002</b></h5>
                                </div> --}}
                                <div class="d-flex">
                                    <img src="Assets/call.svg" class="img_whats" alt="logo">
                                    <h5 class="pt-2 pl-2"><b>+91 7856802002</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group card card_contact2 p-3 mt-4 hover:scale-110 overflow-hidden hover:-translate-y-[5px] transition-all duration-500 ease-in-out">
                        <div class="text-center self-center self-center ites-center justify-center">
                            <img src="Assets/map.svg"
                                class="img_whats2 group-hover:scale-150 transition-all ease-in-out duration-500"
                                alt="logo">
                            <h3 class="pt-3 zila_school font-semibold">Zila School Road, Near BSNL tower,</h3>
                            <h3 class="zila_school">Purnea (Bihar) - 854301</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="text-center py-5">
                <h1 class="it_repair">We provide best service </h1>
                <h1 class="it_repair">&amp; Training</h1>
            </div>
        </div>

        {{-- Contact us form  --}}
        <div class="gap-2 lg:px-32  group sm:px-1 grid col-12">
            <div class="bg-gray-800 lg:px-32 px-3 py-12 rounded-lg">
                <div class="text-slate-300 text-[30px] w-full  text-center font-semibold py-4 mb-3">
                    Touch with us
                </div>
                <form action="{{ route('home.contact') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input value="{{ old('first_name') }}" type="text" name="first_name" id="first_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="first_name"
                                class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                name</label>
                            @error('first_name')
                                <div
                                    class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input value="{{ old('last_name') }}" type="text" name="last_name" id="last_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="last_name"
                                class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                name</label>
                            @error('last_name')
                                <div
                                    class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input value="{{ old('contact') }}" type="phone" pattern="[0-9]{10}" name="contact"
                                id="phone"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="phone"
                                class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                                number (7808912076)</label>
                            @error('phone')
                                <div
                                    class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input value="{{ old('company') }}" type="text" name="company" id="company"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="company"
                                class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company
                                (Ex. Google) <span
                                    class="text-[12px] text-center item-center  text-white py-0 px-2 rounded-lg bg-yellow-600"><small>optional</small>
                                </span> </label>
                            @error('company')
                                <div
                                    class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-6">
                        <input value="{{ old('email') }}" type="email" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="email"
                            class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            address</label>
                        @error('email')
                            <div
                                class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6">
                        <input value="{{ old('subject') }}" type="text" name="subject" id="subject"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="subject"
                            class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Subject</label>
                        @error('subject')
                            <div
                                class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6">
                        <input value="{{ old('message') }}" type="text" name="message" id="message"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="message"
                            class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Message/Inquiry</label>
                        @error('message')
                            <div
                                class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input value="{{ old('inspired_from') }}" type="inspired_from" name="inspired_from"
                            id="inspired_from"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="inspired_from"
                            class="group-hover:text-[18px] peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">How
                            did you hear about us?</label>
                        @error('inspired_from')
                            <div
                                class="text-slate-100 bg-red-500/30 p-2 rounded-b-lg transition-all duration-300 ease-in tracking-wide">
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="py-2.5 my-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 self-end ease-in-out duration-300 hover:tracking-widest">Submit</button>

                </form>
            </div>
        </div>

    </div>



    <!-- Footer Section -->
    <div class="background-footer mt-2">
        <div class="container pt-5 pb-2">
            <div class="row justify-content-center pt-3 all_text-center lg:px-20">
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="pl-0">
                        <a href="{{ route('home') }}" class="text-dark text-decoration-none h1">
                            <h1 class="fw-bold">NovaFix</h1>
                        </a>

                    </div>
                    <ul class="navbar-nav pt-3">
                        <li class="nav-item py-1"><a href="{{ route('home.warranty') }}"
                                class="nav-lnk footer--art">Warranty Policy</a></li>
                        <li class="nav-item py-1"><a href="{{ route('home.termsAndCondition') }}"
                                class="nav-lnk footer--art">Terms & Conditions</a>
                        </li>
                        <li class="nav-item py-1"><a href="{{ route('home.privacyPolicy') }}"
                                class="nav-lnk footer--art">Privacy Policy</a></li>
                        <li class="nav-item py-1"><a href="{{ route('home.ourTeam') }}"
                                class="nav-lnk footer--art">Our Team</a></li>

                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="font-size:31px; color: #000;"><b>+91 7856802002</b></li>
                        <li class="nav-item"><a href="#" class="nav-link "><b
                                    class="footer--art">novafixteam@gmail.com</b></a>
                        </li>
                        <li class="nav-item footer--art1">Zila School Road, Near BSNL tower, Purnea (Bihar) - 854301
                        </li>
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
                    id="aftab"></span> All
                rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
