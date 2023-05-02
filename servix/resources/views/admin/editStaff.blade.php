@extends('admin.layout.base')

@section('title')
    Edit Staffs
@endsection


@section('content')
    <div class="ml-40">

        <div class="container">
            {{-- form here --}}
            <div class="d-flex justify-content-between ">
                <div class=" mt-2">
                    <h2 class="text-black-100">Edit Staff</h2>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.staff.manage') }}" role="button" class="btn btn-primary btn-sm">Go Back</a>
                </div>
            </div>

            <form action="{{ route('admin.staff.update', $data['id']) }}" method="post">
                @csrf
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Name</label>
                        <div class="flex">
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Email</label>
                        <div class="flex">
                            <input type="email" name="email" value="{{ $data->email }}" class="form-control"
                                placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Contact</label>
                        <div class="flex">
                            <input type="number" name="contact" value="{{ $data->contact }}" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Salary</label>
                        <div class="flex">
                            <input type="text" name="salary" value="{{ $data->salary }}" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">

                        <label for="inputState" class="text-black-100">Type</label>
                        <div class="flex w-full">
                            {{-- <input type="text" name="type" class="form-control" placeholder=""> --}}
                            <select id="inputState" name="type_id" class="form-control">
                                <option selected value="{{ $data->type_id }}">{{ $data->type->typename }}</option>
                                <option disabled>Choose...</option>
                                @foreach ($Types as $item)
                                    <option value="{{ $item->id }}">{{ $item->typename }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Aadhar no</label>
                        <div class="flex">
                            <input type="text" name="aadhar" value="{{ $data->aadhar }}" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Pan card no</label>
                        <div class="flex">
                            <input type="text" name="pan" value="{{ $data->pan }}" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" value="1">
                            <label class="form-check-label" for="defaultCheck1">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Address</label>
                        <div class="flex">
                            <input type="text" name="address" value="{{ $data->address }}" class="form-control"
                                placeholder="">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">

                        <input type="submit" name="submit" class="btn btn-success w-100" />

                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
