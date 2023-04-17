@extends('layouts.layout')

@section('contents')
    <div class="d-flex  fixed" style="margin-top: 27%">
        <!-- Button to Open the Modal -->
        @foreach ($track as $item)
            <div class="position-absolute top-50 start-50 translate-middle">

                <form action="{{ route('track.status') }}" method="get">
                    @csrf
                    <input type="search" id="form1" name="status_code" placeholder="Enter status code" class="form-control">
                    <button type="submit" class="btn btn-primary d-flex mx-auto btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#view{{ $item->id }}"> Track your order</button>
                </form>

            </div>

            <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content bg-info">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-row col-12">
                                <div class="col-6">
                                    <div class="border border-dark p-1 text-center">
                                        <label for="">ID</label>
                                        <h5>{{ $item->owner_name }}</h5>
                                    </div>
                                    <div class="border border-dark p-1 text-center">
                                        <label for="">Email</label>
                                        <h5>{{ $item->email }}</h5>
                                    </div>
                                    <div class="border border-dark p-1 text-center">
                                        <label for="">Product Name</label>
                                        <h5>{{ $item->contact }}</h5>
                                    </div>
                                    <div class="border border-dark p-1 text-center">
                                        <label for="">
                                            
                                            Email</label>
                                        <h5>{{ $item->email }}</h5>
                                    </div>

                                    <!-- The Modal -->
                                    {{-- <div class="modal fade" id="view{{ $item->id }}" >
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content bg-info"> --}}

                                    {{-- <h1>{{$item->contact}}</h1> --}}
                                    <!-- Modal Header -->

                                    <!-- Modal body -->

                                    {{-- <div class="modal-body"> --}}
                                    {{-- <div class="progress-trackd-flex justify-content-start ">
                            <div id="progressbar d-flex flex-column bd-highlight mb-3">
                                <div class="step0 active p-2 bd-highlight " id="step1">Order placed</div>
                                <div class="step0 active  p-2 bd-highlight" id="step2">Order working</div>
                                <div class="step0 active  p-2 bd-highlight" id="step3"><span id="three">Out for order</span></div>
                                <div class="step0  p-2 bd-highlight" id="step4">Delivered</div>
                            </div>
                        </div> --}}
                                    {{-- <div class="row">
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
                        </div> --}}
                                    {{-- </div> --}}

                                    {{-- </div>
            </div>
        </div> --}}
        @endforeach
    </div>
@endsection

@section('footer')
@endsection
