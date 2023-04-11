@extends('staff.layout.base')



@section('content')
    <div class="ml-40">

        <div class="container">
            {{-- form here --}}
            <div class="d-flex justify-content-between ">
                <div class=" mt-2">
                    <h2 class="text-black-100">Edit Request</h2>
                </div>
                <div class="mt-3">
                    <a href="{{ route('request.all') }}" role="button" class="btn btn-primary btn-sm">Go Back</a>
                </div>
            </div>

            <form action="{{ route('request.update', $data['id']) }}" method="post">
                @csrf
                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Owner Name</label>
                        <div class="flex">
                            <input type="text" name="owner_name" value="{{ $data->owner_name }}" class="form-control"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Product Name</label>
                        <div class="flex">
                            <input type="text" name="product_name" value="{{ $data->product_name }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Contact</label>
                        <div class="flex">
                            <input type="number" name="contact" value="{{ $data->contact }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Email</label>
                        <div class="flex">
                            <input type="email" name="email" value="{{ $data->email }}" class="form-control"
                                placeholder="example@gmail.com">
                        </div>
                    </div>

                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Color</label>
                        <div class="flex">
                            <input type="text" name="color" value="{{ $data->color }}"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Brand</label>
                        <div class="flex">
                            <input type="text" name="brand" value="{{ $data->brand }}"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5">
                        <label for="" class="text-black-100">Problem</label>
                        <div class="flex">
                            <input type="text" name="problem" value="{{ $data->problem }}"
                                class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5">

                        <input type="submit" name="submit" class="btn btn-success w-100" />

                    </div>
                </div>

            </form>

            {{-- form end --}}

        </div>
    </div>
@endsection
