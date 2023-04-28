@extends('staff.layout.base')

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card h-100">


                {{-- card header --}}
                <div class="card-header d-flex flex-column">

                    <h3 class="card-title mb-3">{{ $title }}</h3>
                    <div class="d-flex justify-content-between align-items-center" style="gap:15px">

                        <form action="{{ route('staff.request.filterbyinput') }}">
                            <div class="input-group" style="width: 300px;">
                                <input type="text" name="search" value="{{ $search_value }}"
                                    class="form-control float-right w-25"placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                        {{-- date and time filter --}}

                        <div class=" d-flex" style="gap:10px">
                            <form action="{{ route('staff.request.filterbydate') }}" method="get" class="">
                                <div class="d-flex justify-centent-center" style="gap:10px">
                                    <div class="input-group" inline="true">
                                        <div class="input-group-prepend">
                                            <label for="example" class=" input-group-text">from Date</label>
                                        </div>
                                        <input placeholder="Select date" type="date" name="startAt" class="form-control">

                                    </div>


                                    <div class="input-group" inline="true">
                                        <div class="input-group-prepend">
                                            <label for="example" class="input-group-text">to Date</label>
                                        </div>
                                        <input placeholder="Select date" type="date" name="End" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">GO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- select to filter  --}}
                            <form action="{{ route('staff.request.filterbyselect') }}" method="get">
                                <select onchange="this.form.submit();" class="form-control" name='dateFilter'>
                                    <option selected>All</option>
                                    <option {{ $dateFilter == 'today' ? 'selected' : '' }} value="today">Today</option>
                                    <option {{ $dateFilter == 'yesterday' ? 'selected' : '' }} value="yesterday">Yesterday
                                    </option>
                                    <option {{ $dateFilter == 'this_week' ? 'selected' : '' }} value="this_week">Last 7 Day
                                    </option>
                                    <option {{ $dateFilter == 'this_month' ? 'selected' : '' }} value="this_month">This
                                        Month
                                    </option>
                                    <option {{ $dateFilter == 'last_month' ? 'selected' : '' }} value="last_month">Last
                                        Month
                                    </option>
                                    <option {{ $dateFilter == 'this_year' ? 'selected' : '' }} value="this_year">This Year
                                    </option>
                                    <option {{ $dateFilter == 'last_year' ? 'selected' : '' }} value="last_year">Last Year
                                    </option>

                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 " style="height: 68vh !important">
                    <table class="table table-hover text-nowrap ">
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
                                <th>type</th>
                                <th>Remark</th>

                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($allRequests as $item)
                                <tr>
                                    <td class="text-uppercase text-success fw-bold">{{ $item->service_code }}</td>
                                    <td>{{ $item->owner_name }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->problem }}</td>
                                    <td>{{ $item->getStatus() }}</td>
                                    <td>{{ $item->type->typename }}</td>
                                    <td>{{ $item->remark }}</td>

                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        <div class="btn-group" role="group"
                                            aria-label="Button group with nested dropdown">


                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu text-center " style="z-index:6;">

                                                    {{-- Conform button --}}
                                                    @if ($item->status != 5 & $item->status != 4 )
                                                        @if (!$item->technician_id)
                                                            <li>
                                                                <a role="button"
                                                                    href="{{ route('request.confirm', $item->id) }}"
                                                                    class="btn btn-success dropdown-item"
                                                                    href="">Confirm</a>
                                                            </li>
                                                        @endif
                                                        {{-- //delivered --}}
                                                        @if ($item->technician_id)
                                                        <li>
                                                            <a role="button"
                                                                href="{{ route('request.workProgress', $item->id) }}"
                                                                class="btn btn-success dropdown-item"
                                                                href="">Work in progress</a>
                                                        </li>
                                                        @endif
                                                        {{-- Pending button --}}
                                                        @if (($item->status != 0) | ($title == 'All Request'))
                                                            <li> <a role="button" class="btn btn-warning dropdown-item"
                                                                    href="{{ route('request.pending', $item) }}">Pending</a>
                                                            </li>
                                                        @endif
                                                        {{-- Reject button --}}
                                                        @if (($item->status != 3) | ($title == 'All Request'))
                                                            <li> <a role="button" class="btn btn-danger dropdown-item"
                                                                    href="{{ route('request.reject', $item) }}">Reject</a>
                                                            </li>
                                                        @endif
                                                        {{-- Edit button --}}
                                                        @if ($item->technician_id)
                                                            <li> <a role="button" class="btn btn-success dropdown-item"
                                                                    href="{{ route('request.edit', $item->id) }}">Edit</a>
                                                            </li>
                                                        @endif
                                                    @endif

                                                    {{-- view button  --}}
                                                    <li> <a data-toggle="modal" data-target="#view{{ $item->id }}"
                                                            role="button" class=" btn btn-info dropdown-item">View</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content bg-light w-100 h-100">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Request Details ~ {{$item->owner_name}}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="d-flex flex-row col-12">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Service Code</th>
                                                                    <td class="text-uppercase">{{$item->service_code}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Owner Name</th>
                                                                    <td>{{$item->owner_name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Product name</th>
                                                                    <td>{{$item->product_name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Contact</th>
                                                                    <td>{{$item->contact}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{$item->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Color</th>
                                                                    <td>{{$item->color}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Brand</th>
                                                                    <td>{{$item->brand}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td>{{$item->status}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Type</th>
                                                                    <td>{{$item->type_id}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Remarks</th>
                                                                    <td>{{$item->remark}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Serial No</th>
                                                                    <td>{{$item->serial_no}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>MAC No</th>
                                                                    <td>{{$item->MAC}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Problem</th>
                                                                    <td>{{$item->problem}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Estimted Date</th>
                                                                    <td>{{ ($item->estimate_delivery)? date('d M Y', strtotime($item->estimate_delivery)) : "N/A" }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Delivery Date</th>
                                                                    <td>{{ ($item->date_of_delivery)? date('d M Y', strtotime($item->date_of_delivery)) : "N/A" }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <td>
                                                                        @if($item->image)
                                                                            <img src="{{ asset('storage/uploads/'.$item->image) }}" style="height: 80px; width:100px;">
                                                                        @else 
                                                                            <span>No image found!</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>
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
