@extends('receptioner.layouts.base')

@section('title')
    {{ $title  }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header d-flex flex-column">

                    <h3 class="card-title mb-3">{{ $title }}</h3>
                    <div class="d-flex justify-content-between align-items-center" style="gap:15px">

                        <form action="{{ route('receptioner.request.filterbyinput') }}">
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
                            <form action="{{ route('receptioner.request.filterbydate') }}" method="get" class="">
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
                            <form action="{{ route('receptioner.request.filterbyselect') }}" method="get">
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
                                <th>S CODE</th>
                                <th>owner_name</th>
                                <th>product_name</th>
                                <th>Contact</th>
                                <th>problem</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>created_at</th>
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
                                    <td>{{ $item->problem }}</td>
                                    <td>
                                        <span class="font-weight-bold   rounded px-2 py-1
                            " style="color:{{StatusColor($item->status)}}; ">{{ $item->getStatus() }}</span>
                                     </td>
                                    <td>{{ $item->remark }}</td>
                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                    <td class=" p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        <div class="btn-group" role="group"
                                            aria-label="Button group with nested dropdown">


                                            <div class="btn-group" role="group">



                                                {{-- <a data-toggle="modal" data-target="#view{{ $item->id }}"
                                                    role="button" class=" btn btn-info btn-group ">View</a> --}}
                                                @if ($item->status==4 | $item->status==3)
                                                <a href="{{ route('crm.request.deliver', $item->id) }}" role="button"
                                                    class=" btn btn-success btn-group ">Deliver</a>
                                                @endif
                                                <a href="{{ route('receptioner.viewRequest', $item->id) }}" role="button"
                                                    class=" btn btn-info btn-group ">View</a>

                                                <a href="{{ route('receptioner.request.edit', $item->id) }}" role="button"
                                                    class=" btn btn-warning btn-group ">Edit</a>



                                            </div>
                                        </div>





                                        <div class="modal fade w-100 " id="view{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable "
                                                role="document">
                                                <div class="modal-content bg-light w-full h-100">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body" id="printable-content">

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
    <div class=" " style="justify-items: center; display: flex; justify-content: center">
        {{$allRequests->links()}}
    </div>
@endsection
