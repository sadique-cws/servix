@extends('admin.layout.base')

@section('title')
    All New Requests
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex flex-column">

                    <h3 class="card-title mb-3">{{ $title }}</h3>
                    <div class="d-flex justify-content-between align-items-center" style="gap:15px">

                        <form action="{{ route('admin.request.filterbyinput') }}">
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
                            <form action="{{ route('admin.request.filterbydate') }}" method="get" class="">
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
                            <form action="{{ route('admin.request.filterbyselect') }}" method="get">
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
                <div class="card-body table-responsive p-0" style="height: 61vh !important">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>


                                <th>Service code</th>
                                <th>Owner name</th>
                                <th>Product name</th>
                                <th>Contact</th>
                                <th>Type</th>
                                <th>Problem</th>
                                <th>Create_At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($new as $item)
                                <tr>
                                    <td class="text-uppercase">{{ $item->service_code }}</td>
                                    <td>{{ $item->owner_name }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->contact }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->type->typename }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->problem }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">
                                        {{ date('d M Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">

                                    
                                        {{-- View button  --}}
                                        <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button" class=" btn btn-info">View</a>
                                        <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                                                <div class="modal-content" style="background: #eee">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Request Details ~ <span class="text-uppercase">{{ $item->owner_name }}</></h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="flex-row col-12">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Service Code</th>
                                                                    <td class="text-uppercase">{{ $item->service_code }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Owner Name</th>
                                                                    <td>{{ $item->owner_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Product Name</th>
                                                                    <td>{{ $item->product_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Brand</th>
                                                                    <td>{{ $item->brand }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Contact</th>
                                                                    <td>{{ $item->contact }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{ $item->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td><span class="font-weight-bold   rounded px-2 py-1
                                                                        " style="color:{{StatusColor($item->status)}}; ">{{ $item->getStatus() }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Serial No</th>
                                                                    <td>{{($item->serial_no)? "$item->serial_no" : "N/A"  }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>MAC No</th>
                                                                    <td>{{($item->MAC)? "$item->MAC" : "N/A"  }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Problem</th>
                                                                    <td>{{($item->problem)? "$item->problem" : "N/A"  }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Remark</th>
                                                                    <td>{{($item->remark)? "$item->remark" : "N/A"  }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Color</th>
                                                                    <td>{{ $item->color }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Estimate_delivery </th>
                                                                    <td>{{($item->estimate_delivery)? date('d M Y', strtotime($item->estimate_delivery)) : "N/A"  }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Create At</th>
                                                                    <td>{{($item->created_at)? date('d M Y', strtotime($item->created_at)) : "N/A"  }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Last update</th>
                                                                    <td>{{($item->updated_at)? date('d M Y', strtotime($item->updated_at)) : "N/A"  }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Product Image</th>
                                                                    <td>
                                                                        @if($item->image)
                                                                            <img src="{{ asset('storage/uploads/'.$item->image) }}" style="height: 80px; width:100px;" class="img-thumbnail">
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
    <div class=" " style="justify-items: center; display: flex; justify-content: center">
        {{$new->links()}}
    </div>
@endsection
