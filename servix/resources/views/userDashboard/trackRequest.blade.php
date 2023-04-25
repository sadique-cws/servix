@extends('layouts.layout')

@section('contents')
    <div class="" style="margin-top: 10%">
        <!-- Button to Open the Modal -->

        <div class="text-center p-10"  >

            <form action="{{ route('track.status') }}" method="POST" class="text-center p-10" style="width:40%; height:100%; margin-left:30%;">
                @csrf
                    <h3 class="text-uppercase font-weight-bold">Enter Your Servic Code</h3>
                    <input type="search" name="search" placeholder="Enter status code" class="form-control text-center" style="margin-top: 5%" value={{($searchStatus)?"$searchStatus":""}}  >
                    <button type="submit" class="btn btn-primary d-flex mx-auto btn-lg mt-2"> Track your order</button>
                    @error('search')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
               
            </form>

            @if ($item!='')  
                           
                <div class="card mb-3 mt-2" style="max-width: 540px; margin-left:30%">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="https://picsum.photos/200/300" class="card-img" alt="...">
                        </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex flex-row gap-5 bg-success text-white rounded-lg">
                                <p class="card-text fs-4 mt-3 ml-2">Status</p>
                                <p class="card-text fs-4 mt-3">{{$item->status}}</p>
                            </div>
                            <div class="d-flex flex-row gap-4">
                                <p class="card-text">Owner Name => </p>
                                <p class="card-text">{{$item->owner_name}}</p>
                            </div>
                            <div class="d-flex flex-row gap-4">
                                <p class="card-text">Product Name => </p>
                                <p class="card-text">{{$item->product_name}}</p>
                            </div>
                            <div class="d-flex flex-row gap-4">
                                <p class="card-text">Deliver Date => </p>
                                <p class="card-text">{{$item->estimate_delivery}}</p>
                            </div>
                            
                            <p class="card-text"><small class="text-muted">Last updated 1 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                </div>
            @else
            @endif

        </div>
    </div>
@endsection

@section('footer')
@endsection
