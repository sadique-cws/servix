@extends('layouts.layout')

@section('contents')
    <div class="d-flex  fixed" style="margin-top: 27%">
        <!-- Button to Open the Modal -->

        <div class="position-absolute top-50 start-50 translate-middle">

            <form action="{{ route('track.status') }}" method="POST">
                @csrf
                <input type="search" name="search" placeholder="Enter status code" class="form-control" value={{($searchStatus)?"$searchStatus":""}}  >
                <button type="submit" class="btn btn-primary d-flex mx-auto btn-lg mt-2"> Track your order</button>
            </form>

            @if ($item!='')  
                           
                {{-- <td>{{$item->service_code}}</td>
                <td>{{$item->owner_name}}</td>
                <td>{{$item->status}}</td> --}}

                <div class="card mb-3 mt-2" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="https://picsum.photos/200/300" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex flex-row gap-5">
                                <p class="card-text">Status</p>
                                <p class="card-text">{{$item->status}}</p>
                            </div>
                            <div class="d-flex flex-row gap-4 mt-4">
                                <p class="card-text">Owner Name => </p>
                                <p class="card-text">{{$item->owner_name}}</p>
                            </div>
                            <div class="d-flex flex-row gap-4">
                                <p class="card-text">Product Name => </p>
                                <p class="card-text">{{$item->product_name}}</p>
                            </div>
                            <div class="d-flex flex-row gap-4">
                                <p class="card-text">Deliver Date => </p>
                                <p class="card-text">{{$item->date_of_delivery}}</p>
                            </div>
                            
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
