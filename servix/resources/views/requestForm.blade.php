@extends("layouts.layout")

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
                                <label for="" class="text-xs font-semibold px-1">Owner Name</label>
                                <input type="text" name="owner_name" class="form-control">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="text-xs font-semibold px-1">Product Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="mb-3 col-6">
                                <label for="" class="text-xs font-semibold px-1">Brand</label>
                                <input type="text" name="brand" class="form-control">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="text-xs font-semibold px-1">Color</label>
                                <div class="flex">
                                    <input type="text" name="color" class="form-control">
                                </div>
                            </div> 
                        </div>
                       
                            <div class="mb-3">
                                <label for="" class="text-xs font-semibold px-1">Problem</label>
                                    <textarea type="text" name="problem"
                                        class="form-control"></textarea>
                            </div>
                            <div class="w-full">
                                <button
                                    class="btn btn-success w-100">Raise Request</button>
                            </div>
                    </form>
                    <div class="d-flex mt-5 ">
                        <div class="w-100 ">
                            <div class="text-center ">
                                <span class="text-xs">Is New user ? </span>
                                <span class="font-semibold text-blue-600 mx-2"><a href="" >Register User</a></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



</div>



@endsection