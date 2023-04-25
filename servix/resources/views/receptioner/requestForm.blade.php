@extends('receptioner.layouts.base')

@section('content')
<<<<<<< HEAD
    <div class="">
        <div class="row">
            <div class="card p-5 mx-auto mt-5 rounded-5">
                <div class="d-flex justify-content-center">
                    <h1 class="font-bold text-3xl text-gray-900 mb-4">Service Request</h1>
=======
    <div class="ml-40">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h1 class="mt-2">Service Request</h1>
>>>>>>> f14ee4588d07e03a8cf91bbcbfe1ed00c79cafc5
                </div>
                <form action="{{ route('receptioner.request.form') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-black-100">Name</label>
                            <input type="text" name="owner_name" class="form-control" value="{{old('owner_name')}}">
                            @error('owner_name')
                                <p class="text-danger small">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="mb-3 px-3">
                            <label for="" class="text-black-100">Product Name</label>
                            <input type="text" name="product_name" class="form-control">
                            @error('product_name')
                            <p class="text-danger small">{{$message}} </p>
                        @enderror
                        </div>
                        <div class="mb-3 px-3">
                            <label for="" class="text-black-100">Contact</label>
                            <input type="number" name="contact" class="form-control">
                            @error('contact')
                                <p class="text-danger small">{{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 px-3">
                            <label for="" class="text-black-100">Email</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                                <p class="text-danger small">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="mb-3 px-3">
                            <label for="" class="text-black-100">Brand</label>
                            <input type="text" name="brand" class="form-control">
                            @error('email')
                                <p class="text-danger small">{{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <div class="mb-3 px-3">
                            <label for="" class="text-black-100">Color</label>
                            <div class="flex">
                                <input type="text" name="color" class="form-control">
                                @error('color')
                                    <p class="text-danger small">{{$message}} </p>
                                @enderror
                            </div>
                        </div> 
                        
                        <div class="mb-3 px-3">
                            <label for="" class="text-black-100">Type</label>
                            <select name="type_id" class="form-control">
                                <option value="">Select Type</option>
                                @foreach ($Types as $item)
                                    <option value="{{$item->id}}">{{$item->typename}}</option>
                                @endforeach
                            
                            </select>
                            @error('type_id')
                            <p class="text-danger small">{{$message}} </p>
                        @enderror
                        </div> 
                         
                        
                    </div>
                
                        <div class="mb-3 px-3">
                            <label for="" class="text-black-100">Problem</label>
                                <textarea type="text" name="problem"
                                    class="form-control"></textarea>
                                    @error('problem')
                                    <p class="text-danger small">{{$message}} </p>
                                @enderror
                        </div>
                        <div class="w-full">
                            <button class="btn btn-success w-100">Raise Request</button>
                        </div>
                </form>
                </div>
            </div>
       
    </div>
@endsection

