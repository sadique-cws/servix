@extends('layouts.layout')

@section('contents')
    <div class="d-flex  fixed" style="margin-top: 27%">
        <!-- Button to Open the Modal -->
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="input-group">
                <div class="form-outline">
                  <input type="search" id="form1" class="form-control" placeholder="search" />
                </div>
            </div>
            <button type="button" class="btn btn-primary d-flex mx-auto btn-lg mt-2" data-bs-toggle="modal"
                data-bs-target="#myModal">
                Track your order
            </button>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content bg-info">

                    <!-- Modal Header -->
                    <div class="modal-header d-flex flex-column">
                        <h3 class="fw-bold text-white">Welcome To Servix Status<h1>
                        <div class="d-flex justify-content-center">
                            <h5 class="text-uppercase">Service Code - {{ $service_code }}</h5>
                        </div>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button> --}}
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="progress-trackd-flex justify-content-start ">
                            <div id="progressbar d-flex flex-column bd-highlight mb-3">
                                <div class="step0 active p-2 bd-highlight " id="step1">Order placed</div>
                                <div class="step0 active  p-2 bd-highlight" id="step2">Order working</div>
                                <div class="step0 active  p-2 bd-highlight" id="step3"><span id="three">Out for order</span></div>
                                <div class="step0  p-2 bd-highlight" id="step4">Delivered</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <div class="details d-table">
                                    <div class="d-table-row">
                                        <div class="d-table-cell">
                                            Technician Name
                                        </div>
                                        <div class="d-table-cell">
                                            UPS Expedited
                                        </div>
                                    </div>
                                    <div class="d-table-row">
                                        <div class="d-table-cell">
                                            Estimated Delivery
                                        </div>
                                        <div class="d-table-cell">
                                            02/12/2017
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="d-table-row">
                                    <a href=#><i class="fa fa-phone" aria-hidden="true"></i></a>
                                </div>
                                <div class="d-table-row">
                                    <a href=#><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('footer')
@endsection --}}