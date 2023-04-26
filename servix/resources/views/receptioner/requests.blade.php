@extends('receptioner.layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>

                    <div class="card-tools">
                        <form action="{{ route('receptioner.request.filterbyinput') }}">

                            <div class="input-group input-group-sm" style="width: 300px;">


                                <input type="text" name="search" value="{{$search_value}}"
                                    class="form-control float-right w-25"placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>


                      {{-- date and time filter --}}

                      <div class=" d-flex justify-content-around mt-3">

                        <form action="{{ route('receptioner.request.filterbydate') }}" method="get" class="">
                            <div class=" d-flex justify-content-evenly">
                                <div class="md-form md-outline d-flex input-with-post-icon datepicker" inline="true">
                                    <label for="example" class="text-sm ml-4">from Date</label>
                                    <input placeholder="Select date" type="date" name="startAt" class="form-control">

                                </div>


                                <div class="md-form md-outline d-flex input-with-post-icon datepicker" inline="true">
                                    <label for="example" class="text-sm ml-4">to Date</label>
                                    <input placeholder="Select date" type="date" name="End" class="form-control">

                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary ml-4"> go</button>
                                </div>
                            </div>
                        </form>
                        {{-- select to filter  --}}
                        <form action="{{ route('receptioner.request.filterbyselect') }}" method="get" >
                            <div class="form-control">
                                <select onchange="this.form.submit();" class="form-select" name='dateFilter'>
                                    <option selected>All</option>
                                    <option {{$dateFilter=="today"? 'selected' : ''}} value="today">Today</option>
                                    <option {{$dateFilter=="yesterday"? 'selected' : ''}} value="yesterday">Yesterday</option>
                                    <option {{$dateFilter=="this_week"? 'selected' : ''}} value="this_week">Last 7 Day</option>
                                    <option {{$dateFilter=="this_month"? 'selected' : ''}} value="this_month">This Month</option>
                                    <option {{$dateFilter=="last_month"? 'selected' : ''}} value="last_month">Last Month</option>
                                    <option {{$dateFilter=="this_year"? 'selected' : ''}} value="this_year">This Year</option>
                                    <option {{$dateFilter=="last_year"? 'selected' : ''}} value="last_year">Last Year</option>
                                    
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>S CODE</th>
                                <th>owner_name</th>
                                <th>product_name</th>
                                <th>Contact</th>
                                <th>color</th>
                                <th>brand</th>
                                <th>problem</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allRequests as $item)
                                <tr>
                                    <td class="text-uppercase text-success fw-bold">{{ $item->service_code }}</td>
                                    <td>{{ $item->owner_name }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->problem }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->remark }}</td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        <div class="btn-group" role="group"
                                            aria-label="Button group with nested dropdown">


                                            <div class="btn-group" role="group">
                                              
                                            
                                                  
                                                    <a data-toggle="modal" data-target="#view{{ $item->id }}"
                                                   
                                                        role="button" class=" btn btn-info btn-group ">View</a>
                                                  
                                                    <a 
                                                        href="{{ route('receptioner.request.edit',$item->id) }}"
                                                        role="button" class=" btn btn-warning btn-group ">Edit</a>
                                                  

                                                
                                            </div>
                                        </div>





                                        <div class="modal fade w-100 " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable " role="document">
                                                <div class="modal-content bg-light w-full h-100">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                          <div class="container mb-5 mt-3">
                                                            <div class="row d-flex align-items-baseline">
                                                              <div class="col-xl-9">
                                                                <p style="color: #7e8d9f;font-size: 20px;">Receving No >> ID: <strong class="text-uppercase">{{$item->service_code}} </strong></p>
                                                              </div>
                                                              <div class="col-xl-3 float-end">
                                                                <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                                                    class="fas fa-print text-primary"></i> Print</a>
                                                                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                                                    class="far fa-file-pdf text-danger"></i> Export</a>
                                                              </div>
                                                              <hr>
                                                            </div>
                                                      
                                                            <div class="container">
                                                              <div class="col-md-12">
                                                                <div class="text-center">
                                                                  <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                                                  <p class="pt-0">servixcenter@gmail.com</p>
                                                                </div>
                                                      
                                                              </div>
                                                      
                                                      
                                                              <div class="row">
                                                                <div class="col-xl-8">
                                                                  <ul class="list-unstyled">
                                                                    <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$item->owner_name}}</span></li>
                                                                    {{-- <li class="text-muted">Street, City</li>
                                                                    <li class="text-muted">State, Country</li> --}}
                                                                    <li class="text-muted"><i class="fas fa-phone"></i>{{$item->contact}}</li>
                                                                    <li class="text-muted"><i class="bi bi-envelope"></i>{{$item->email}}</li>
                                                                  </ul>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                  {{-- <p class="text-muted"></p> --}}
                                                                  <ul class="list-unstyled">
                                                                    {{-- <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                                        class="fw-bold">ID:</span>#123-456</li> --}}
                                                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                                        class="fw-bold">Creation Date: </span>{{$item->created_at}}</li>
                                                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                                        class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                                                        {{}}</span></li>
                                                                  </ul>
                                                                </div>
                                                              </div>
                                                      
                                                              <div class="row my-2 mx-1 justify-content-center">
                                                                <table class="table table-striped table-borderless">
                                                                  <thead style="background-color:#84B0CA ;" class="text-white">
                                                                    <tr>
                                                                      <th scope="col">S code</th>
                                                                      <th scope="col">brand</th>
                                                                      <th scope="col">Type</th>
                                                                      <th scope="col">S.N</th>
                                                                      <th scope="col">MAC</th>
                                                                      <th scope="col">D. Date</th>
                                                                      
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                     <td class="text-uppercase" ></td>
                                                                     
                                                    
                                                                  </tbody>
                                                      
                                                                </table>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-xl-8">
                                                                  <p class="ms-3">Add additional notes and payment information</p>
                                                      
                                                                </div>
                                                                <div class="col-xl-3">
                                                                  <ul class="list-unstyled">
                                                                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                                                                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
                                                                  </ul>
                                                                  <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                                                                      style="font-size: 25px;">$1221</span></p>
                                                                </div>
                                                              </div>
                                                              <hr>
                                                              <div class="row">
                                                                <div class="col-xl-10">
                                                                  <p>Thank you for your purchase</p>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                  
                                                                </div>
                                                              </div>
                                                      
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>

                                                </div>
                                            </div>
                                        </div>
                                    
                                       
                                    </td>
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
