@extends('admin.layout.base')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row d-flex justify-content-between">
                    <h2 class="text-black-100">Insert Staff</h2>
                    <a href="{{ route('admin.staff.manage') }}" class="text-black-100">Go Back</a>
                </div>

                <div class="container">
                    <form action="{{ route('admin.staff.store') }}" method="post" class="d-flex flex-column">
                        @csrf
                        <div class="row">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Name</label>
                                <div class="flex">
                                    <input type="text" name="name"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Email</label>
                                <div class="flex">
                                    <input type="email" name="email"
                                        class="form-control"
                                        placeholder="example@gmail.com">
                                </div>
                            </div>
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Contact</label>
                                <div class="flex">
                                    <input type="number" name="contact"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Salary</label>
                                <div class="flex">
                                    <input type="text" name="salary"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Type</label>
                                <div class="flex">
                                    <input type="text" name="type"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Addhar no</label>
                                <div class="flex">
                                    <input type="text" name="aadhar"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Pan card no</label>
                                <div class="flex">
                                    <input type="text" name="pan"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Address</label>
                                <div class="flex">
                                    <input type="text" name="address"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Status</label>
                                <div class="flex">
                                    <input type="text" name="status"
                                        class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-black-100">Password</label>
                                <div class="flex">
                                    <input type="password" name="password"
                                        class="form-control"
                                        placeholder="">
                                </div>
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
