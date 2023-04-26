@extends('layouts.layout')

@section('title')
    Contact Us | 
@endsection
@section('contents')

    <div class="container px-5" style="margin-top: 200px">
        <div class="row justify-content-center px-auto">
            <div class="col-lg-6 col-md-9 col-12">
                <h1 class="look_ing my-0 pl-5">We'd love to hear <br> from you</h1>
                <h4 class="train_ing pt-2 pl-5">You have ant question, comments or feedback please don't hesitate to get
                    in touch with us.</h4>
            </div>
        </div>
        <div class="container" style="margin-top: 150px;">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-12 mb-3">
                            <div class="card card_contact px-4 py-3">
                                <h3 class="my-0"><b>Services</b></h3>
                                <h4 class="my-0">Query</h4>
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
                        <div class="col-md-6 col-12 mb-3">
                            <div class="card card_contact1 p-3">
                                <h3 class="my-0"><b>Training</b></h3>
                                <h4 class="my-0">Query</h4>
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
                    <div class="card card_contact2 p-3 mt-4">
                        <div class="text-center">
                            <img src="Assets/map.svg" class="img_whats2" alt="logo">
                            <h3 class="pt-3 zila_school">Zila School Road, Near BSNL tower,</h3>
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

    </div>

@endsection