@extends('admin.layout.base')

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
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
        
                                <th>Service code</th>
                                <th>Owner name</th>
                                <th>Product name</th>
        
                                <th>Contact</th>
                                <th>Type</th>
        
                                <th>Problem</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($new as $item)
                                <tr>
        
                                    <td class="text-uppercase">{{ $item->service_code }}</td>
                                    <td>{{ $item->owner_name }}</td>
                                    <td>{{ $item->product_name }}</td>
        
                                    <td>{{ $item->contact }}</td>
                                    <td>
                                        {{ $item->type->typename }}
                                        {{-- <span class="font-weight-bold">({{ $item->technician->name }})</span> --}}
                                    </td>
                                    <td>{{ $item->problem }}</td>
                                    <td>{{ $item->getStatus() }}</td>
                                    <td>
        
                                        <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                                            class=" btn btn-info"><i class="fas fa-eye"></i> View</a>
                                        <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content bg-info">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">All new
                                                            Request</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex flex-row col-12">
                                                            <div class="col-6">
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for="">ID</label>
                                                                    <h5>{{ $item->id }}</h5>
                                                                </div>
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for=""><span></span>Remark</label>
                                                                    <h5>{{ $item->remark }}</h5>
                                                                </div>
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for="">Product Name</label>
                                                                    <h5>{{ $item->product_name }}</h5>
                                                                </div>
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for="">Email</label>
                                                                    <h5>{{ $item->email }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for="">Owner Name</label>
                                                                    <h5>{{ $item->owner_name }}</h5>
                                                                </div>
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for="">Contact</label>
                                                                    <h5>{{ $item->contact }}</h5>
                                                                </div>
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for="">Brand</label>
                                                                    <h5>{{ $item->brand }}</h5>
                                                                </div>
                                                                <div class="border border-dark p-1 text-center ">
                                                                    <label for="">
        
                                                                        Service Code</label>
                                                                    <h5>{{ $item->service_code }}</h5>
                                                                </div>
        
                                                            </div>
                                                        </div>
                                                        <div class="text-center border-dark border">
                                                            <label for="">Problem</label>
                                                            <h5>{{ $item->problem }}</h5>
                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Delete button  --}}
                                        <a href="{{ route('admin.request.delete', $item->id) }}" role="button"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
        
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
