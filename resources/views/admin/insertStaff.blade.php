@extends('admin.layout.base')

@section('title')
    Insert Staff
@endsection


@section('content')
    <div class="ml-40">

        <div class="container">
            <div class="d-flex justify-content-between ">
                <div class=" mt-2">
                    <h2 class="text-black-100">Insert Staff</h2>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.staff.manage') }}" role="button" class="btn btn-primary btn-sm">Go Back</a>
                </div>
            </div>
            {{-- form here --}}



            <form action="{{ route('admin.staff.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Name</label>
                        <div class="flex">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="">
                        </div>
                        @error('name')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Email</label>
                        <div class="flex">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="example@gmail.com">
                        </div>
                        @error('email')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Contact</label>
                        <div class="flex">
                            <input type="number" name="contact" class="form-control" value="{{ old('contact') }}" placeholder="">
                        </div>
                        @error('contact')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Salary</label>
                        <div class="flex">
                            <input type="text" name="salary" class="form-control" value="{{ old('salary') }}" placeholder="">
                        </div>
                        @error('salary')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Aadhar no</label>
                        <div class="flex">
                            <input type="text" name="aadhar" class="form-control" value="{{old('aadhar')}}" placeholder="">
                        </div>
                        @error('aadhar')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Pan card no</label>
                        <div class="flex">
                            <input type="text" name="pan" class="form-control" value="{{ old('pan') }}" placeholder="">
                        </div>
                        @error('pan')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Address</label>
                        <div class="flex">
                            <input type="text" name="address" class="form-control"  value="{{ old('address') }}" placeholder="">
                        </div>
                        @error('salary')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   
                    <div class="w-full px-3 mb-5 col">

                        <label for="inputState" class="text-black-100">Type</label>
                        <div class="flex w-full">
                            {{-- <input type="text" name="type_id" class="form-control" placeholder=""> --}}
                            <select id="inputState" name="type_id" {{old('type_id')}} class=" form-control">
                                <option selected>Choose...</option>
                                @foreach ($Types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                                {{-- <option>Mobile</option>
                                <option>Laptop</option>
                                <option>Assessories</option> --}}
                            </select>
                        </div>
                    </div>
                    @error('type')
                        <p class="text-error text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Image</label>
                        <div class="flex">
                            <input type="file" name="image">
                        </div>
                        @error('image')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Password</label>
                        <div class="flex">
                            <input type="password" name="password"  value="{{ old('password') }}" class="form-control">
                        </div>
                        @error('password')
                            <p class="text-error text-danger">{{ $message }}</p>
                        @enderror
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
