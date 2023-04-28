@extends('admin.layout.base')



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card p-0 m-0">
                <div class="card-header">
                    <h3 class="card-title">All Staffs</h3>

                    <div class="card-tools">
                        <form action="{{ route('admin.staff.search') }}">
                            
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="{{ route('admin.staff.create') }}"
                                    role="button"class="mr-12 btn btn-secondary btn-sm">Staff Add</a>

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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Salary</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset('storage/images/'.$item->image) }}" style="height: 50px; width:70px;" class="rounded-circle">
                                        @else 
                                            <span>No image found!</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->contact }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->salary }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->type->typename }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->status }}</td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        {{-- status button  --}}
                                        {{-- <input type="button" id="status" name="status" value="{{$staff->status ? 'Active' : 'Inactive' }}"> --}}
                                        <a role="button" class="btn btn-info" href="{{ route('admin.staff.status',$item)}}">{{($item->status==0)?"Active":"DeActive"}}</a>
                                        {{-- edit button --}}
                                        <a role="button" class="btn btn-warning" href="{{ route('admin.staff.edit', $item->id) }}">Edit</a>
                                        {{-- View button  --}}
                                        <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                                            class=" btn btn-info">View</a>
                                        <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content bg-info">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Staff Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="flex-row col-12">
                                                            <table class="table">
                                                            <tr>
                                                                <th>Name</th>
                                                                <td>{{ $item->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td>{{ $item->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact</th>
                                                                <td>{{ $item->contact }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Salary</th>
                                                                <td>{{ $item->salary }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status</th>
                                                                <td>{{ (!$item->status)? "Pending" : (($item->status == 1)? "Delivered" : "Reject") }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Type</th>
                                                                <td>{{ $item->type_id }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Aadhar Card No</th>
                                                                <td>{{ $item->MAC }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Color</th>
                                                                <td>{{ $item->color }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Create At</th>
                                                                <td>{{($item->created_at)? date('d M Y', strtotime($item->estimate_delivery)) : "N/A"  }}</td>
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
                                        {{-- Delete button  --}}
                                        <a href="{{ route('admin.staff.delete', $item->id) }}"  role="button"
                                            class="btn btn-danger"><svg width="20" height="20" viewBox="0 0 24 24"
                                                class="NSy2Hd cdByRd RTiFqe undefined">
                                                <path fill='#b8c2cc'
                                                    d="M15 4V3H9v1H4v2h1v13c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V6h1V4h-5zm2 15H7V6h10v13z">
                                                </path>
                                                <path fill='#b8c2cc' d="M9 8h2v9H9zm4 0h2v9h-2z"></path>
                                            </svg>
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
