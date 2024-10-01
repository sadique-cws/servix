@extends('layouts.layout')
@section('title')
{{ env('APP_NAME') }} - Laptop Desktop Printer Smartphone Reparing Center in Purnea
@endsection
@section('contents')

    <div class="container" style="margin-top: 200px;">
        <div class="text-center">
            <h1 class="ser_vices"><span style="color:#e87605; font-weight: 400;">All Services</span> Under</h1>
            <h1 class="ser_vices1">one roof</h1>
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 col-12">
                    <h1 class="all_service pt-4">Get all services for your electronics</h1>
                </div>
            </div>
            {{--- BTN ON SMALL SCREEN ONLY---}}
            {{-- <div class="justify-content-center d-flex items-center p-3 d-xs-block d-block d-sm-none">
                <div class="btn fs-poppins fw-bold p-2 " style="letter-spacing: 1px; background-color: #e87605; color:  #fff">Hello Btn</div>
            </div> --}}
            {{--- /BTN ON SMALL SCREEN ONLY---}}
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col-lg-8 col-md-8 col-12">
                <div class="text-center pt-5">
                    <img src="Assets/Main%20image.png" class="img-fluid" alt="logo">
                </div>
            </div>
        </div>
    </div>

    <div class="container " style="margin-top: 150px;">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="ser_pro_data">
                    <h3 class="my-0 ser_provide pl-3">Services</h3>
                    <h2 class="pro_vide pl-3"><b>Provided</b></h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center laptop_section " style="margin-top: 150px;">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-6 mb-3">
                        <div class="card card_service p-4">
                            <div class="text-center">
                                <img src="Assets/Laptop.png" class="img-fluid img_first" alt="laptop">
                            </div>
                            <div class="">
                                <h2 class="pro_vide1 my-0 pt-2"><b>Laptop</b></h2>
                                <h3 class="title_serv">Service</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 mb-3">
                        <div class="card card_service1 p-4">
                            <div class="text-center">
                                <img src="Assets/Desktop.png" class="img-fluid img_first1" alt="laptop">
                            </div>
                            <div class="">
                                <h2 class="pro_vide1 my-0 pt-2"><b>Desktop</b></h2>
                                <h3 class="title_serv">Service</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center printer_section">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-6 mb-3">
                        <div class="card card_printer p-4">
                            <div class="text-center">
                                <img src="Assets/Printer.png" class="img-fluid img_first2" alt="laptop">
                            </div>
                            <div class="">
                                <h2 class="pro_vide1 my-0 pt-2"><b>Printer</b></h2>
                                <h3 class="title_serv">Service</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 mb-3">
                        <div class="card card_mobile p-4">
                            <div class="text-center">
                                <img src="Assets/mobile2.png" class="img-fluid img_first1" alt="laptop">
                            </div>
                            <div class="">
                                <h2 class="pro_vide1 my-0 pt-2"><b>Mobile</b></h2>
                                <h3 class="title_serv">Service</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center lcs_section">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-6 mb-3">
                        <div class="card card_lcd p-4">
                            <div class="text-center">
                                <img src="Assets/lcd.png" class="img-fluid img_first" alt="laptop">
                            </div>
                            <div class="">
                                <h2 class="pro_vide1 my-0 pt-2"><b>LCD TV</b></h2>
                                <h3 class="title_serv">Service</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 mb-3">
                        <div class="card card_tablet p-4">
                            <div class="text-center">
                                <img src="Assets/tablet.html" class="img-fluid img_first1" alt="laptop">
                            </div>
                            <div class="">
                                <h2 class="pro_vide1 my-0 pt-2"><b>Tablet</b></h2>
                                <h3 class="title_serv">Service</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="experience_back py-5" style="margin-top: 70px;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="ser_pro_data">
                        <h3 class="my-0 ser_provide pl-3">Services</h3>
                        <h2 class="pro_vide pl-3"><b>Experience</b></h2>
                    </div>
                    <div class="pl-4 pr-5 content_details">
                        <h3 class="con_tent pt-3">Welcome to our repair service! We understand that having something
                            break down can be frustrating, and that's why we're here to help. Our
                            team of experienced technicians is dedicated to providing high-quality
                            repair services for a wide range of products and devices.</h3>
                        <ul class="navbar-nav mt-4">
                            <li class="nav-item">
                                <a class="link_contact" href="{{ route('home.contact') }}">
                                    <button class="btn btn_primary"><b>Contact</b> </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="ser_pro_data">
                    <h3 class="my-0 ser_provide pl-3">Services</h3>
                    <h2 class="pro_vide pl-3"><b>Benefits</b></h2>
                </div>
                <div class="row justify-content-center" style="margin-top: 70px;">
                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <div class="card benifit_card px-2 py-4">
                            <div class="text-center">
                                <img src="Assets/6%20Months.svg" class="benifit_image" alt="img">
                                <h5 class="pt-3 benifit_data"> 6 Months warranty <br> of service</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <div class="card benifit_card1 px-2 py-4">
                            <div class="text-center">
                                <img src="Assets/Genuien%20Product.svg" class="benifit_image" alt="img">
                                <h5 class="pt-3 benifit_data"> We use genuine parts <br> for repair</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <div class="card benifit_card2 px-2 py-4">
                            <div class="text-center">
                                <img src="Assets/Genuine%20charges.svg" class="benifit_image" alt="img">
                                <h5 class="pt-3 benifit_data"> Genuine charges <br> for repairing</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <div class="card benifit_card3 px-2 py-4">
                            <div class="text-center">
                                <img src="Assets/Do%20not%20worry.svg" class="benifit_image" alt="img">
                                <h5 class="pt-3 benifit_data"> Do not worry about <br> parts exchange</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <a href="{{Route('track.status')}}" class="card benifit_card4 px-2 py-4">
                            <div class="text-center">
                                <img src="Assets/Track%20live.svg" class="benifit_image" alt="img">
                                <h5 class="pt-3 benifit_data"> Track live status of <br> your products</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <div class="card benifit_card5 px-2 py-4">
                            <div class="text-center">
                                <img src="Assets/Chip%20level%20repairing.svg" class="benifit_image" alt="img">
                                <h5 class="pt-3 benifit_data"> Chip level repairing <br> for all products</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="text-center py-5">
            <h1 class="it_repair">Do you wish to learn</h1>
            <h1 class="it_repair">IT repairing?</h1>
        </div>
        <div class="row justify-content-center pt-3">
            <div class="col-12">
                <div class="card card_big_image">
                    <img src="Assets/repairing-laptop-image.png" class="img-fluid img_banner" alt="banner">
                </div>
                <h4 class="con_tent2 mt-4">Take your IT skills to the next level with our expert-
                    led training courses designed to help you becomemain_logo_image1
                    an IT repairing service pro.</h4>

                <ul class="navbar-nav mt-4">
                    <li class="nav-item">
                        <a class="link_contact" href="{{ route('home.learn') }}">
                            <button class="btn btn_primary">Enroll Now</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="training_padding">
            <div class="text-center py-5">
                <h1 class="it_repair">We provide best service </h1>
                <h1 class="it_repair">& Training</h1>
            </div>
        </div>
    </div>

@endsection