@extends('admin.layout.base')

@section('title')
 Admin | Insert staff 
@endsection


@section('content')

<div class="ml-40">
  <div class="row">
    <h2 class="text-black-100">Insert Staff</h2>
    <a href="{{route('admin.staff.manage')}}" class="text-black-100">Go Back</a>
  </div>
  <div class="container">
     {{-- form here --}}
     
                              <form action="" method="post">
                                  @csrf
                                  <div class="row">
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Name</label>
                                          <div class="ml-2">
                                              <input type="text" name="name" value="{{$data->name}}" class="">
                                          </div>
                                      </div>
                                      <div class="w-full row ml-20">
                                          <label for="" class="text-black-100">Email</label>
                                          <div class="ml-2">
                                              <input type="email" name="email" value="{{$data->email}}" class="" >
                                          </div>
                                      </div>
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Contact</label>
                                          <div class="ml-2">
                                              <input type="number" name="contact" value="{{$data->contact}}" class="">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Salary</label>
                                          <div class="ml-2">
                                              <input type="text" name="salary" value="{{$data->salary}}" class="">
                                          </div>
                                      </div>
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Type</label>
                                          <div class="ml-2">
                                              <input type="text" name="type" value="{{$data->type}}" class="">
                                          </div>
                                      </div>
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Addhar no</label>
                                          <div class="ml-2">
                                              <input type="text" name="aadhar" value="{{$data->aadhar}}" class="">
                                          </div>
                                      </div>
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Pan card no</label>
                                          <div class="ml-2">
                                              <input type="text" name="pan" value="{{$data->pan}}" class="">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Address</label>
                                          <div class="ml-2">
                                              <input type="text" name="address" value="{{$data->address}}" class="">
                                          </div>
                                      </div>
                                      <div class="w-full row">
                                          <label for="" class="text-black-100">Status</label>
                                          <div class="ml-2">
                                              <input type="text" name="status" value="{{$data->status}}" class="">
                                          </div>
                                      </div>
                                  </div>
                                
                              </form>
                         
     {{-- form end --}}

  </div>
</div>
@endsection

