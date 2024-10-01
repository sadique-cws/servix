@extends('layouts.layout')
@section('title')
{{ env('APP_NAME') }} - Track Request
@endsection
@section('contents')
    <div class="container mt-5">
        <div class="row mt-5 py-5">
            <div class="col-6 card p-5 mx-auto mt-5 rounded-5">
                <div class="d-flex justify-content-center">
                    <h1 class="font-bold text-3xl text-gray-900 mb-4">Service Request</h1>
                </div>
                <form action="{{route('request.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="text-xs font-semibold px-1">Name</label>
                            <input type="text" name="owner_name" class="form-control" value="{{old('owner_name')}}">
                            @error('owner_name')
                                <p class="text-danger small">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="text-xs font-semibold px-1">Product Name</label>
                            <input type="text" name="product_name" class="form-control">
                            @error('product_name')
                            <p class="text-danger small">{{$message}} </p>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="text-xs font-semibold px-1">Contact</label>
                            <input type="number" name="contact" class="form-control">
                            @error('contact')
                            <p class="text-danger small">{{$message}} </p>
                        @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                            <p class="text-danger small">{{$message}} </p>
                        @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <div class="mb-3 col-4">
                            <label for="" class="text-xs font-semibold px-1">Brand</label>
                            <input type="text" name="brand" class="form-control">
                            @error('brand')
                            <p class="text-danger small">{{$message}} </p>
                        @enderror
                        </div>
                        <div class="mb-3 col-4">
                            <label for="" class="text-xs font-semibold px-1">Color</label>
                            <div class="flex">
                                <input type="text" name="color" class="form-control">
                                @error('color')
                            <p class="text-danger small">{{$message}} </p>
                        @enderror
                            </div>
                        </div> 
                        <div class="mb-3 col-4">
                            <label for="" class="text-xs font-semibold px-1">Type</label>
                            <select name="type_id" class="form-select font-semibold text-xs px-1">
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
                
                        <div class="mb-3">
                            <label for="" class="text-xs font-semibold px-1">Problem</label>
                                <textarea type="text" name="problem"
                                    class="form-control"></textarea>
                                    @error('problem')
                                    <p class="text-danger small">{{$message}} </p>
                                @enderror
                        </div>
                        <div class="w-full">
                            <button
                                class="btn btn-success w-100">Raise Request</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <<--  CREDIT - DON'T REMOVE -->> --}}
{{-- 
    
    
    ©  All rights reserved. Developer team -  
    intkhab Ahmad ->> <a href="https://github.com/LazyDeveloperr">view profile</a> 

    Aditya Sekhar ->> <a href="https://github.com/aditya-shekhar773">view profile</a>

    Wasik Alam ->> <a href="https://github.com/md-wasik-alam">view profile</a> 
    
    
--}}
