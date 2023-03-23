@extends('admin.layout.base')



@section('content')


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Responsive Hover Table</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <button class="mr-12">Staff Add</button>
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
              <th>Addhar</th>
              <th>Pan No</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($staffs as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td class="border border-slate-700 p-1.5 pl-10">{{$item->contact}}</td>
                <td class="border border-slate-700 p-1.5 pl-10">{{$item->salary}}</td>
                <td>{{$item->addhar}}</td>
                <td>{{$item->pan}}</td>
                <td>{{$item->address}}</td>
                <td class="border border-slate-700 p-1.5  items-center justify-center flex ">
                  <a href="{{route('admin.staff.edit',$item->id)}}" class="h-5 w-5  mt-1">
                    <button>View</button>
                  <form action="{{route('admin.staff.delete',$item)}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type='submit' value=''/>
                    </form>
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
