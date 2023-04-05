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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Salary</th>
                                <th>Type</th>
                                <th>Addhar</th>
                                <th>Pan No</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($requests as $item)
                           <tr>
                            <th>requst id</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Salary</th>
                            <th>Type</th>
                            <th>Addhar</th>
                            <th>Pan No</th>
                            <th>Address</th>
                            <th>Action</th>
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