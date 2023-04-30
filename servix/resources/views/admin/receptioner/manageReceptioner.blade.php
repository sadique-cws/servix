@extends('admin.layout.base')

@section('title')
    Manage Receptionist
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All receptioner</h3>

                    <div class="card-tools">
                        <form action="">
                            
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="{{ route('receptioner.add') }}"
                                    role="button"class="mr-12 btn btn-secondary btn-sm">Add receptioner </a>

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
                                <th>Addhar</th>
                                <th>pan</th>
                                <th>address</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receptioner as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                  
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->contact }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->aadhar }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->pan }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->address }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->salary }}</td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        {{-- status button  --}}
                                        {{-- <input type="button" id="status" name="status" value="{{$staff->status ? 'Active' : 'Inactive' }}"> --}}
                                        <a role="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ban{{ $item->id }}">{{($item->status==1)?"Active":"DeActive"}}</a>
                                        {{-- edit button --}}
                                        <a role="button" class="btn btn-warning" href="{{ route('receptioner.edit', $item->id) }}">Edit</a>
                                        {{-- View button  --}}
                                        <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                                            class=" btn btn-info">View</a>
                                        <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Receptioner Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex flex-row col-12">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <td>{{$item->id}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <td>{{$item->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{$item->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Contact</th>
                                                                    <td>{{$item->contact}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Addhar</th>
                                                                    <td>{{$item->aadhar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pan No</th>
                                                                    <td>{{$item->pan}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Salary</th>
                                                                    <td>{{$item->salary}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Address</th>
                                                                    <td>{{$item->address}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Delete button  --}}
                                        <a href="{{ route('admin.crm.delete', $item->id) }}"  role="button"
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
                                <div class="modal fade" id="ban{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">Alert</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           Do you really want to {{ $item->status == 0 ? 'activate' : 'deactivate' }} this account
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">no</button>
                                          <a href="{{ route('receptioner.status',$item)}}" type="button" class="btn btn-primary">yes</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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
