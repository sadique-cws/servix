@extends('receptioner.layouts.base')
@section('title')
    {{ $title }}
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
                           <a href="{{ route('receipt.view',$item->id) }}" class="btn btn-success">Print Reciept</a>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 71vh !important">
                    <table class="table table-hover text-nowrap">
                        <tr>
                            <th>S CODE</th>
                            <td class="text-uppercase text-success fw-bold">{{ $item->service_code }}</td>
                        </tr>
                        <tr>
                            <th>owner_name</th>
                            <td>{{ $item->owner_name }}</td>
                        </tr>
                        <tr>
                            <th>product_name</th>
                            <td>{{ $item->product_name }}</td>
                        </tr>
                        <th>Contact</th>
                        <td>{{ $item->contact }}</td>
                        <tr>
                            <th>problem</th>
                            <td>{{ $item->problem }}</td>
                        </tr>
                        <th>Status</th>
                        <td>{{ $item->getStatus() }}</td>
                        </tr>
                        <th>Remark</th>
                        <td>{{ $item->remark }}</td>
                        </tr>
                        <th>created_at</th>
                        <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                        </tr>
                        <th>Action</th>
                        <td class=" p-1.5  items-center justify-center flex btn-group" role="group">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    @if (($item->status == 4) | ($item->status == 3))
                                        <a href="{{ route('crm.request.deliver', $item->id) }}" role="button"
                                            class=" btn btn-success btn-group ">Deliver</a>
                                    @endif
                                    <a href="{{ route('receptioner.all.request') }}" role="button"
                                        class=" btn btn-info btn-group ">Go Back</a>

                                    <a href="{{ route('receptioner.request.edit', $item->id) }}" role="button"
                                        class=" btn btn-warning btn-group ">Edit</a>

                                </div>
                            </div>
                        </td>
                        </tr>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
