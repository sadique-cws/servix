@extends('layouts.layout')
@section('title') 
{{ env('APP_NAME') }} - Learn
@endsection
@section('contents')

<div class="container" style="margin-top: 200px;">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9 col-12">
            <h1 class="look_ing my-0 pl-5">Looking to start a career in IT repairing service?</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9 col-12">
            <h4 class="train_ing pt-2 pl-5">Our comprehensive training program will provide you with the skills and
                knowledge needed to succeed</h4>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 100px;">
    <div class="text-center" style="margin-bottom: 170px">
        <h1 class="Ad_vance">Advance <span class="ser_vicess">chip level</span> </h1>
        <h1 class="ser_vices11">training in</h1>
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
                            <h2 class="pro_vide1 my-0 pt-2 sm-text-sm"><b>Laptop</b></h2>
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
<div class="experience_back py-5">
    <div class="container py-5">
        <div class="text-center">
            <h1 class="Ad_vance">Module of training</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <h3 class="con_tent text-center pt-4"> <i class="fa-regular fa-hand-point-right"></i> Basic
                    Electronics! <i class="fa-regular fa-hand-point-right pl-4"></i> Practical Use Of Tools! <i class="fa-regular fa-hand-point-right pl-4"></i>
                    Card Level Training! <i class="fa-regular fa-hand-point-right pl-5"></i>
                    Advanced Chip Level Training! <i class="fa-regular fa-hand-point-right pl-4"></i>
                    Parts &amp; Technology! <i class="fa-regular fa-hand-point-right pl-4"></i>
                    Hardware Training! <i class="fa-regular fa-hand-point-right pl-4"></i>
                    Software Installation Repairing! <i class="fa-regular fa-hand-point-right pl-4"></i>
                    Fault Finding!</h3>
            </div>
        </div>
    </div>
</div>
<div class="container py-3 px-5" style="margin-top: 100px;">
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
                            <img src="Assets/6 Months.svg" class="benifit_image" alt="img">
                            <h5 class="pt-3 benifit_data">Greater job security due <br> to constant demand for <br>
                                repair technicians.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6 mb-4">
                    <div class="card benifit_card1 px-2 py-4">
                        <div class="text-center">
                            <img src="Assets/Reduced environmental.svg" class="benifit_image" alt="img">
                            <h5 class="pt-3 benifit_data"> Reduced environmental <br> impact by repairing rather
                                <br> than replacing devices.
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6 mb-4">
                    <div class="card benifit_card2 px-2 py-4">
                        <div class="text-center">
                            <img src="Assets/Improved understanding.svg" class="benifit_image" alt="img">
                            <h5 class="pt-3 benifit_data"> Improved understanding <br> of how technology works <br>
                                and how to maintain it</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-6 mb-4">
                    <div class="card benifit_card3 px-2 py-4">
                        <div class="text-center">
                            <img src="Assets/Opportunity to work.svg" class="benifit_image" alt="img">
                            <h5 class="pt-3 benifit_data"> Opportunity to work with <br> a variety of tools and <br>
                                equipment.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6 mb-4">
                    <div class="card benifit_card4 px-2 py-4">
                        <div class="text-center">
                            <img src="Assets/Ability to earn money.svg" class="benifit_image" alt="img">
                            <h5 class="pt-3 benifit_data">Ability to earn money by <br> offering repair services
                                <br> to others
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6 mb-4">
                    <div class="card benifit_card5 px-2 py-4">
                        <div class="text-center">
                            <img src="Assets/Development of problem.svg" class="benifit_image" alt="img">
                            <h5 class="pt-3 benifit_data"> Development of problem <br> solving and critical <br>
                                thinking skills.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="experience_back py-5 mt-5 ">
    <div class="container py-5 px-5">
        <div class="row ">
            <div class="col-lg-8 col-md-10 col-12">
                <h1 class="look_ing2">Join advance chip level repairing course</h1>
            </div>
        </div>

        <div class="pt-2">
            <h3 class="con_tent pr-5">oin our chip level training program and become part of a
                community of IT repairing service experts who are passionate
                about delivering top quality repair services.</h3>
            <ul class="navbar-nav mt-4">
                <li class="nav-item">
                    <a class="link_contact" href="ContactPage.html">
                        <button class="btn btn_primary px-5">Join Now </button>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
<div class="container my-5">
    <div class="text-center py-5">
        <h1 class="it_repair">We provide best service </h1>
        <h1 class="it_repair">&amp; Training</h1>
    </div>
</div>
<hr class="my-0" style="color: #7a7979 !important;">

@endsection