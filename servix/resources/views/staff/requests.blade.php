@extends('staff.layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Requests</h3>

                    <div class="card-tools">
                        <form action="">
                            
                            <div class="input-group input-group-sm" style="width: 300px;">
                               

                                <input type="text" name="search"
                                    class="form-control float-right w-25"placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>owner_name</th>
                                <th>product_name</th>
                                <th>Contact</th>
                                <th>email</th>
                                <th>Type</th>
                                <th>color</th>
                                <th>brand</th>
                                <th>problem</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($allRequests as $item)
                           <tr>
                            <td>{{$item->service_code}}</td>
                            <td>{{$item->owner_name}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->contact}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->brand}}</td>
                            <td>{{$item->problem}}</td>
                            
                        </tr>
                               
                           @endforeach
                          
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection