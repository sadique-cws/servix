@extends('admin.layout.base')



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



            <form action="{{ route('admin.staff.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Name</label>
                        <div class="flex">
                            <input type="text" name="name"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('name')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Email</label>
                        <div class="flex">
                            <input type="email" name="email"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="example@gmail.com">
                        </div>
                        @error('email')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Contact</label>
                        <div class="flex">
                            <input type="number" name="contact"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('contact')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Salary</label>
                        <div class="flex">
                            <input type="text" name="salary"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('salary')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Addhar no</label>
                        <div class="flex">
                            <input type="text" name="aadhar"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('aadhar')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Pan card no</label>
                        <div class="flex">
                            <input type="text" name="pan"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('pan')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Address</label>
                        <div class="flex">
                            <input type="text" name="address"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('salary')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Status</label>
                        <div class="flex">
                            <input type="text" name="status"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('status')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-5">

                        <label for="inputState" class="text-black-100">Type</label>
                        <div class="flex w-full">
                            {{-- <input type="text" name="type" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder=""> --}}
                            <select id="inputState" name="type"
                                class=" w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                <option selected>Choose...</option>
                                <option>Mobile</option>
                                <option>Laptop</option>
                                <option>Assessories</option>
                            </select>
                        </div>


                    </div>
                    @error('type')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Password</label>
                        <div class="flex">
                            <input type="password" name="password"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                        @error('password')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <div class="flex">
                            <input type="submit" name="submit" class="text-black-100" />
                        </div>
                    </div>
                </div>

            </form>

            {{-- form end --}}

        </div>
    </div>
@endsection
