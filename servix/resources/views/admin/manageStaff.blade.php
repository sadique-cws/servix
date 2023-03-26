@extends('admin.layout.base')



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Staffs</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 300px;">
                            <a href="{{ route('admin.staff.create') }}" role="button"
                                class="mr-12 btn btn-secondary btn-sm">Staff Add</a>

                            <input type="text" name="table_search" class="form-control float-right w-25"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>
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
                            @foreach ($staffs as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->contact }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->salary }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->type }}</td>
                                    <td>{{ $item->aadhar }}</td>
                                    <td>{{ $item->pan }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        {{-- edit button  --}}
                                        <a role="button" class="btn btn-warning"
                                            href="{{ route('admin.staff.edit', $item->id) }}">Edit</a>
                                        {{-- View button  --}}
                                        <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                                            class=" btn btn-info">View</a>
                                        <div class="modal fade" id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Staff Details
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex flex-row col-12">
                                                            <div class="col-6">
                                                                <div class="border p-1">
                                                                    <label for="">Id</label>
                                                                    <h5>{{ $item->id }}</h5>
                                                                </div>
                                                                <div class="border p-1">
                                                                    <label for="">Email</label>
                                                                    <h5>{{ $item->email }}</h5>
                                                                </div>
                                                                <div class="border p-1">
                                                                    <label for="">Salary</label>
                                                                    <h5>{{ $item->salary }}</h5>
                                                                </div>
                                                                <div class="border p-1">
                                                                    <label for="">Aadhar</label>
                                                                    <h5>{{ $item->aadhar }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="border p-1 ">
                                                                    <label for="">Name</label>
                                                                    <h5>{{ $item->name }}</h5>
                                                                </div>
                                                                <div class="border p-1 ">
                                                                    <label for="">Contact</label>
                                                                    <h5>{{ $item->contact }}</h5>
                                                                </div>
                                                                <div class="border p-1 ">
                                                                    <label for="">Type</label>
                                                                    <h5>{{ $item->type }}</h5>
                                                                </div>
                                                                <div class="border p-1 ">
                                                                    <label for="">PAN</label>
                                                                    <h5>{{ $item->pan }}</h5>
                                                                </div>

                                                            </div>
                                                          </div>
                                                          <div class="text-center border">
                                                              <label for="">Address</label>
                                                              <h5>{{ $item->address }}</h5>
                                                          </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Delete button  --}}
                                        <a href="{{ route('admin.staff.delete', $item->id) }}" role="button"
                                            class="btn btn-danger"><svg width="20" height="20" viewBox="0 0 24 24"
                                                class="NSy2Hd cdByRd RTiFqe undefined">
                                                <path fill='#b8c2cc'
                                                    d="M15 4V3H9v1H4v2h1v13c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V6h1V4h-5zm2 15H7V6h10v13z">
                                                </path>
                                                <path fill='#b8c2cc' d="M9 8h2v9H9zm4 0h2v9h-2z"></path>
                                            </svg></a>
                                        {{-- <form action="{{route('admin.staff.delete',$item)}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type='submit' value='delete'/>
                  </form> --}}

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
