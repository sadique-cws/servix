@extends('admin.layout.base')

@section('title')
    Edit Receptionist
@endsection


@section('content')
    <div class="ml-40">

        <div class="container">
            {{-- form here --}}
            <div class="d-flex justify-content-between ">
                <div class=" mt-2">
                    <h2 class="text-black-100">Edit Receptioner</h2>
                </div>
                <div class="mt-3">
                    <a href="" role="button" class="btn btn-primary btn-sm">Go Back</a>
                </div>
            </div>

            <form action="{{ route('receptioner.update', $data['id']) }}" method="post">
                @csrf
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Name</label>
                        <div class="flex">
                            <input type="text" name="name" value="{{ $data->name }}"
                                class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Email</label>
                        <div class="flex">
                            <input type="email" name="email" value="{{ $data->email }}"
                                class="form-control"
                                placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Contact</label>
                        <div class="flex">
                            <input type="number" name="contact" value="{{ $data->contact }}"
                                class="form-control"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Salary</label>
                        <div class="flex">
                            <input type="text" name="salary" value="{{ $data->salary }}"
                                class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5">

                      


                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Addhar no</label>
                        <div class="flex">
                            <input type="text" name="aadhar" value="{{ $data->aadhar }}"
                                class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Pan card no</label>
                        <div class="flex">
                            <input type="text" name="pan" value="{{ $data->pan }}"
                                class="form-control"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Address</label>
                        <div class="flex">
                            <input type="text" name="address" value="{{ $data->address }}"
                                class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Status</label>
                       
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" value="1" >
                            <label class="form-check-label" for="defaultCheck1">
                              Active
                            </label>
                          </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="w-full px-3 mb-5 col">

                        <input type="submit" name="submit" class="btn btn-success w-100" />

                    </div>
                </div>

            </form>

            {{-- form end --}}

        </div>
    </div>
@endsection
