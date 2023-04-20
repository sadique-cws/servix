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
                <table class="table">
                    <thead>
                        <tr>
                            <th >S CODE</th>
                            <th >NAME</th>
                            <th >STATUS</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           
                            <td>{{$item->service_code}}</td>
                            <td>{{$item->owner_name}}</td>
                            <td>{{$item->status}}</td>
                          
                        </tr>
                       
                    </tbody>
                </table>
                
            @else
                
           
            @endif

        </div>


    </div>
@endsection

@section('footer')
@endsection
